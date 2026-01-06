<?php
// This is the main Web application configuration file
// Copy this file to config.php and update the values according to your setup

define('ENVIRONMENT', 'development'); // Set to 'production' in production
define('VERSION', '1.0');

// ============================================
// URL Configuration
// ============================================
// For Apache with subdirectory (e.g., http://localhost/DexternBruno/):
define('MAINURL', $_SERVER['DOCUMENT_ROOT']."/DexternBruno/");
define("SITEURL", "http://" . $_SERVER['HTTP_HOST'] . '/DexternBruno/');
define('BASE', $_SERVER['DOCUMENT_ROOT']."/DexternBruno/");
define("RESTURL","http://" . $_SERVER['HTTP_HOST'] . '/DexternBruno/'."restful/");
define('PATH', "http://" . $_SERVER['HTTP_HOST'] ."/DexternBruno/");

// For PHP built-in server or Apache at root (e.g., http://localhost/):
// Uncomment these lines and comment out the above lines:
// define('MAINURL', __DIR__ . "/../");
// define("SITEURL", "http://" . $_SERVER['HTTP_HOST'] . '/');
// define('BASE', __DIR__ . "/../");
// define("RESTURL","http://" . $_SERVER['HTTP_HOST'] . '/'."restful/");
// define('PATH', "http://" . $_SERVER['HTTP_HOST'] ."/");

// ============================================
// Path Configuration
// ============================================
define("URL", "http://" . $_SERVER['HTTP_HOST'] . str_replace("index.php/", "", $_SERVER['REQUEST_URI']));
define('REALPATH', str_replace("index.php", "", realpath('index.php')));
define('UPLOADPATH', REALPATH.'uploads/');
define('UPLOADURL', SITEURL.'uploads/');
define("THEMEURL", SITEURL."views/basic/");
define("THEMEDIR", BASE."views/basic/");
define("CONTROLLERSDIR", BASE."controllers/");
define("MODELSDIR", BASE."models/");
define("LIBS", BASE."libs/"); 
define("CORE", BASE."core/");
define("VIEWSDIR", BASE."views/");
define("PLUGINSDIR", BASE."plugins/");
define("MODULESDIR", BASE."modules/");

// ============================================
// Security Configuration
// ============================================
define("SALT", "B9S4N8A7S3R9C3V9S5I7R3I9"); // Don't change unless you know what you're doing
define("PASSKEY","SS1623FAIL"); // Change this in production
define("RESTAPYKEY","cde2df70369703fa8068f03fc15475cea516af26c3c7a68af61529f7235f7113"); // REST API key

// ============================================
// General Configuration
// ============================================
define("TIMEZONE", "Asia/Calcutta"); // Change to your timezone
define("DEFAULTCONTROLLER", "index");
define("DIRECT", true);
define("SITEEMAIL","info@siriinnovations.com"); // Change to your email

// ============================================
// Database Configuration
// ============================================
// Update these values with your MySQL database credentials
define("DB_SERVER", "localhost");     // Database server (usually 'localhost')
define("DB_USERNAME", "root");        // Database username
define("DB_PASSWORD", "");            // Database password
define("DB_NAME", "pickdata_dextern_bruno"); // Database name
define("DB_PORT", "3306");           // MySQL port (usually 3306)
define("DB_DRIVER", "pdo");          // Driver: 'pdo', 'mysqli', or 'mysql'
define("DB_PREFIX", "tbl_");         // Table prefix
define("DBPREFIX", "tbl");
define("DB_PCONNECT", TRUE);
define("DB_DEBUG", TRUE);            // Set to FALSE in production
define("DB_CACHEON", FALSE);
define("DB_CHACHEDIR", "");
define("DB_CHARSET", "utf8");
define("DB_COLLAT", "utf8_general_ci");
define("DB_SWAPPRE", "B9S4N8A7S3R9C3V9S5I7R3I9");
define("DB_AUTOINIT", TRUE);
define("DB_STRCTON", FALSE);
?>
