<?php
/**
 * DexternBruno Installation Checker
 * 
 * This script checks if your environment meets the requirements
 * to run the DexternBruno application.
 */

// Prevent direct access in production
// Remove or comment out this line to run the checker
// die("For security, this file should be removed in production.");

echo "<!DOCTYPE html>
<html>
<head>
    <title>DexternBruno - Installation Checker</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background: #f5f5f5; }
        .container { max-width: 800px; margin: 0 auto; background: white; padding: 20px; border-radius: 5px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        h1 { color: #333; border-bottom: 2px solid #4CAF50; padding-bottom: 10px; }
        .check { margin: 10px 0; padding: 10px; border-left: 4px solid #ddd; }
        .success { border-left-color: #4CAF50; background: #f1f8f4; }
        .error { border-left-color: #f44336; background: #fef1f0; }
        .warning { border-left-color: #ff9800; background: #fff8e1; }
        .icon { font-weight: bold; margin-right: 10px; }
        .success .icon { color: #4CAF50; }
        .error .icon { color: #f44336; }
        .warning .icon { color: #ff9800; }
        code { background: #f5f5f5; padding: 2px 5px; border-radius: 3px; }
        .info { background: #e3f2fd; padding: 15px; border-radius: 5px; margin: 20px 0; }
    </style>
</head>
<body>
    <div class='container'>
        <h1>DexternBruno - Installation Checker</h1>
        <p>This script checks if your system meets the requirements to run DexternBruno.</p>
";

$checks = [];
$errors = 0;
$warnings = 0;

// Check PHP Version
$phpVersion = phpversion();
$phpOk = version_compare($phpVersion, '7.0.0', '>=');
$checks[] = [
    'status' => $phpOk ? 'success' : 'error',
    'title' => 'PHP Version',
    'message' => $phpOk 
        ? "PHP $phpVersion - OK (7.0+ required)" 
        : "PHP $phpVersion - ERROR: PHP 7.0 or higher is required"
];
if (!$phpOk) $errors++;

// Check PDO Extension
$pdoLoaded = extension_loaded('pdo');
$checks[] = [
    'status' => $pdoLoaded ? 'success' : 'error',
    'title' => 'PDO Extension',
    'message' => $pdoLoaded ? 'PDO extension is loaded' : 'PDO extension is NOT loaded - Required for database access'
];
if (!$pdoLoaded) $errors++;

// Check PDO MySQL Driver
$pdoMysql = extension_loaded('pdo_mysql');
$checks[] = [
    'status' => $pdoMysql ? 'success' : 'error',
    'title' => 'PDO MySQL Driver',
    'message' => $pdoMysql ? 'PDO MySQL driver is loaded' : 'PDO MySQL driver is NOT loaded - Required for MySQL database'
];
if (!$pdoMysql) $errors++;

// Check MySQLi Extension (Optional)
$mysqliLoaded = extension_loaded('mysqli');
$checks[] = [
    'status' => $mysqliLoaded ? 'success' : 'warning',
    'title' => 'MySQLi Extension',
    'message' => $mysqliLoaded ? 'MySQLi extension is loaded' : 'MySQLi extension is NOT loaded - Optional but recommended'
];
if (!$mysqliLoaded) $warnings++;

// Check if config file exists
$configExists = file_exists('libs/config.php');
$checks[] = [
    'status' => $configExists ? 'success' : 'error',
    'title' => 'Configuration File',
    'message' => $configExists ? 'libs/config.php exists' : 'libs/config.php NOT found'
];
if (!$configExists) $errors++;

// If config exists, try to load it
if ($configExists) {
    require_once 'libs/config.php';
    
    // Check database connection
    try {
        $dsn = "mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME . ";port=" . DB_PORT;
        $pdo = new PDO($dsn, DB_USERNAME, DB_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $checks[] = [
            'status' => 'success',
            'title' => 'Database Connection',
            'message' => 'Successfully connected to database: ' . DB_NAME
        ];
        
        // Try to get some info about the database
        $stmt = $pdo->prepare("SELECT COUNT(*) as table_count FROM information_schema.tables WHERE table_schema = ?");
        $stmt->execute([DB_NAME]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $checks[] = [
            'status' => 'success',
            'title' => 'Database Tables',
            'message' => 'Database has ' . $result['table_count'] . ' table(s)'
        ];
        
    } catch (PDOException $e) {
        $checks[] = [
            'status' => 'error',
            'title' => 'Database Connection',
            'message' => 'Failed to connect to database: ' . $e->getMessage()
        ];
        $errors++;
    }
    
    // Check directory permissions
    $directories = ['uploads', 'logs', 'admin/logs'];
    foreach ($directories as $dir) {
        if (is_dir($dir)) {
            $writable = is_writable($dir);
            $checks[] = [
                'status' => $writable ? 'success' : 'warning',
                'title' => "Directory: $dir",
                'message' => $writable ? "$dir is writable" : "$dir is NOT writable - May cause issues with uploads/logs"
            ];
            if (!$writable) $warnings++;
        } else {
            $checks[] = [
                'status' => 'warning',
                'title' => "Directory: $dir",
                'message' => "$dir does not exist - May need to be created"
            ];
            $warnings++;
        }
    }
    
    // Check if .htaccess exists (for Apache)
    $htaccessExists = file_exists('.htaccess');
    $checks[] = [
        'status' => $htaccessExists ? 'success' : 'warning',
        'title' => '.htaccess File',
        'message' => $htaccessExists 
            ? '.htaccess file exists - URL rewriting should work on Apache' 
            : '.htaccess file NOT found - Required for Apache, not needed for PHP built-in server'
    ];
    if (!$htaccessExists) $warnings++;
}

// Display all checks
foreach ($checks as $check) {
    echo "<div class='check {$check['status']}'>
        <span class='icon'>" . ($check['status'] == 'success' ? '✓' : ($check['status'] == 'error' ? '✗' : '⚠')) . "</span>
        <strong>{$check['title']}:</strong> {$check['message']}
    </div>";
}

// Summary
echo "<div class='info' style='margin-top: 30px;'>";
if ($errors == 0 && $warnings == 0) {
    echo "<strong style='color: #4CAF50;'>✓ All checks passed!</strong><br>";
    echo "Your system meets all requirements to run DexternBruno.<br>";
    echo "You can now access the application through your web browser.";
} else {
    echo "<strong>Summary:</strong><br>";
    if ($errors > 0) {
        echo "<span style='color: #f44336;'>✗ $errors critical error(s) found</span><br>";
    }
    if ($warnings > 0) {
        echo "<span style='color: #ff9800;'>⚠ $warnings warning(s) found</span><br>";
    }
    if ($errors > 0) {
        echo "<br>Please fix the critical errors before running the application.";
    } else {
        echo "<br>You can run the application, but you may want to address the warnings.";
    }
}
echo "</div>";

// Additional info
echo "<div class='info'>
    <strong>Next Steps:</strong><br>
    <ol>
        <li>If all checks passed, delete or rename this file (check_installation.php) for security</li>
        <li>Access the application at: <code>" . (defined('SITEURL') ? SITEURL : 'your-configured-url') . "</code></li>
        <li>Check the admin panel at: <code>" . (defined('SITEURL') ? SITEURL . 'admin/' : 'your-configured-url/admin/') . "</code></li>
        <li>Refer to README.md and SETUP.md for detailed documentation</li>
    </ol>
</div>";

echo "<div class='info'>
    <strong>System Information:</strong><br>
    <ul>
        <li>PHP Version: $phpVersion</li>
        <li>Server Software: " . ($_SERVER['SERVER_SOFTWARE'] ?? 'Unknown') . "</li>
        <li>Document Root: " . ($_SERVER['DOCUMENT_ROOT'] ?? 'Unknown') . "</li>
        <li>Current Directory: " . getcwd() . "</li>
    </ul>
</div>";

echo "
    </div>
</body>
</html>";
?>
