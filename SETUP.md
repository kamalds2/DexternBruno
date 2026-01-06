# DexternBruno - Detailed Setup Guide

This guide provides step-by-step instructions to get the DexternBruno application running on your system.

## Quick Start Checklist

- [ ] PHP 7.0+ installed
- [ ] MySQL/MariaDB installed and running
- [ ] Apache with mod_rewrite (production) OR PHP CLI (development)
- [ ] Database created
- [ ] Configuration updated
- [ ] Application tested

## Detailed Setup Instructions

### Step 1: Verify PHP Installation

Open a terminal/command prompt and check your PHP version:

```bash
php --version
```

You should see PHP 7.0 or higher. If not installed, download from [php.net](https://www.php.net/downloads.php).

Check for required extensions:

```bash
php -m | grep -E "pdo|mysqli"
```

You should see `PDO`, `pdo_mysql`, and optionally `mysqli` in the output.

### Step 2: Verify Database Installation

Check if MySQL is running:

```bash
# On Linux/Mac
mysql --version
sudo systemctl status mysql  # or mariadb

# On Windows
mysql --version
# Check Services for MySQL service
```

### Step 3: Clone and Navigate

```bash
git clone https://github.com/kamalds2/DexternBruno.git
cd DexternBruno
```

### Step 4: Database Setup

#### Option A: Using MySQL Command Line

```bash
# Login to MySQL
mysql -u root -p

# Create database
CREATE DATABASE pickdata_dextern_bruno CHARACTER SET utf8 COLLATE utf8_general_ci;

# Verify
SHOW DATABASES;

# Exit
EXIT;
```

#### Option B: Using phpMyAdmin

1. Open phpMyAdmin in your browser (usually http://localhost/phpmyadmin)
2. Click "New" in the left sidebar
3. Database name: `pickdata_dextern_bruno`
4. Collation: `utf8_general_ci`
5. Click "Create"

### Step 5: Configure the Application

Edit `libs/config.php` with your favorite text editor:

#### For Apache (Production/Standard Setup):

```php
// Database settings
define("DB_SERVER", "localhost");
define("DB_USERNAME", "root");           // Your MySQL username
define("DB_PASSWORD", "");               // Your MySQL password
define("DB_NAME", "pickdata_dextern_bruno");
define("DB_PORT", "3306");

// URL settings (adjust based on your setup)
define('MAINURL', $_SERVER['DOCUMENT_ROOT']."/DexternBruno/");
define("SITEURL", "http://" . $_SERVER['HTTP_HOST'] . '/DexternBruno/');
define('BASE', $_SERVER['DOCUMENT_ROOT']."/DexternBruno/");
define("RESTURL","http://" . $_SERVER['HTTP_HOST'] . '/DexternBruno/'."restful/");
define('PATH', "http://" . $_SERVER['HTTP_HOST'] ."/DexternBruno/");
```

#### For PHP Built-in Server (Development/Testing):

```php
// Database settings (same as above)
define("DB_SERVER", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "pickdata_dextern_bruno");
define("DB_PORT", "3306");

// URL settings for built-in server
define('MAINURL', __DIR__ . "/../");
define("SITEURL", "http://" . $_SERVER['HTTP_HOST'] . '/');
define('BASE', __DIR__ . "/../");
define("RESTURL","http://" . $_SERVER['HTTP_HOST'] . '/'."restful/");
define('PATH', "http://" . $_SERVER['HTTP_HOST'] ."/");
```

### Step 6: Set File Permissions (Linux/Mac only)

```bash
# Make uploads and logs directories writable
chmod -R 755 uploads/
chmod -R 755 logs/
chmod -R 755 admin/logs/

# If needed, change ownership to web server user
# sudo chown -R www-data:www-data uploads/ logs/ admin/logs/
```

### Step 7: Running the Application

#### Method 1: Apache Web Server

**On XAMPP/WAMP:**
1. Copy the DexternBruno folder to `htdocs/` (XAMPP) or `www/` (WAMP)
2. Start Apache from the control panel
3. Visit: http://localhost/DexternBruno/

**On Linux with Apache:**
1. Copy to `/var/www/html/` or configure a virtual host
2. Enable mod_rewrite: `sudo a2enmod rewrite`
3. Restart Apache: `sudo systemctl restart apache2`
4. Visit: http://localhost/DexternBruno/

**Virtual Host Setup (Optional but Recommended):**

Create `/etc/apache2/sites-available/dexternbruno.conf`:

```apache
<VirtualHost *:80>
    ServerName dexternbruno.local
    DocumentRoot /path/to/DexternBruno
    
    <Directory /path/to/DexternBruno>
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>
    
    ErrorLog ${APACHE_LOG_DIR}/dexternbruno-error.log
    CustomLog ${APACHE_LOG_DIR}/dexternbruno-access.log combined
</VirtualHost>
```

Enable and restart:
```bash
sudo a2ensite dexternbruno
sudo systemctl restart apache2
```

Add to `/etc/hosts`:
```
127.0.0.1 dexternbruno.local
```

Access: http://dexternbruno.local/

#### Method 2: PHP Built-in Server (Development)

```bash
# From the DexternBruno directory
php -S localhost:8000 -t .

# Or use a different port if 8000 is busy
php -S localhost:9000 -t .
```

**Important**: Remember to update `libs/config.php` as mentioned in Step 5 for the built-in server.

Access: http://localhost:8000/

### Step 8: Initial Testing

1. **Test Homepage:**
   - Navigate to your configured URL
   - You should see the homepage (even if it's blank or has errors due to missing data)

2. **Check for PHP Errors:**
   - If you see a blank page, enable error reporting in `index.php`:
   ```php
   error_reporting(E_ALL);
   ini_set('display_errors', '1');
   ```

3. **Test Admin Panel:**
   - Navigate to `/admin/` (e.g., http://localhost/DexternBruno/admin/)
   - You should see a login page or admin interface

4. **Check Logs:**
   - Look in `logs/` and `admin/logs/` for any error messages

### Step 9: Verify Installation

Run these checks:

```bash
# Check PHP syntax of main files
php -l index.php
php -l core/Wrapper.php
php -l core/Controller.php

# Should output "No syntax errors detected" for each
```

## Common Issues and Solutions

### Error: "Failed to connect to database"

**Cause:** Database credentials are incorrect or MySQL is not running.

**Solution:**
1. Verify MySQL is running: `sudo systemctl status mysql`
2. Test connection: `mysql -u root -p`
3. Check credentials in `libs/config.php`
4. Verify database exists: `SHOW DATABASES;` in MySQL

### Error: "Class 'http:' not found" or similar URL-related errors

**Cause:** URL configuration doesn't match your setup.

**Solution:**
1. Check that `SITEURL` in `libs/config.php` matches your actual URL
2. If using PHP built-in server, ensure paths don't include subdirectories
3. Add debug output to see what URLs are being generated:
   ```php
   echo "SITEURL: " . SITEURL . "<br>";
   echo "URL: " . URL . "<br>";
   die();
   ```

### Error: 404 on any page except homepage

**Cause:** Apache mod_rewrite not working or .htaccess not being read.

**Solution:**
1. Enable mod_rewrite: `sudo a2enmod rewrite`
2. Check Apache config allows .htaccess: `AllowOverride All`
3. Restart Apache: `sudo systemctl restart apache2`
4. Verify .htaccess file exists in the root directory

### Error: Permission denied when uploading files

**Cause:** Web server doesn't have write permissions.

**Solution:**
```bash
chmod -R 755 uploads/
# Or for more permissive (less secure):
chmod -R 777 uploads/
```

### Blank page with no errors

**Cause:** PHP error reporting is disabled.

**Solution:**
Edit `index.php` and add at the top:
```php
error_reporting(E_ALL);
ini_set('display_errors', '1');
```

## Testing the Application

### Basic Functionality Test

1. **Homepage:** Should load without fatal errors
2. **Navigation:** Test links in the menu
3. **Admin Panel:** Access `/admin/` and verify login page loads
4. **API:** Test REST endpoints at `/restful/`

### Manual Testing Commands

```bash
# Test PHP syntax of all core files
find . -name "*.php" -not -path "./vendor/*" -exec php -l {} \;

# Check database connection (create a test script)
php -r "
require_once 'libs/config.php';
try {
    \$pdo = new PDO('mysql:host='.DB_SERVER.';dbname='.DB_NAME, DB_USERNAME, DB_PASSWORD);
    echo 'Database connection successful!';
} catch (PDOException \$e) {
    echo 'Database connection failed: ' . \$e->getMessage();
}
"
```

## Next Steps

After successful setup:

1. **Import Sample Data:** If you have SQL dump files, import them
2. **Configure Settings:** Check admin panel for additional settings
3. **Set Up Email:** Configure email settings in `libs/config.php`
4. **Security:** Change default passwords and security keys
5. **Backups:** Set up regular database backups

## Production Deployment

For production environments:

1. **Disable Error Display:**
   ```php
   error_reporting(0);
   ini_set('display_errors', '0');
   ```

2. **Use HTTPS:** Configure SSL certificate
3. **Secure Database:** Use strong passwords and limited privileges
4. **File Permissions:** Set appropriate permissions (755 for directories, 644 for files)
5. **Enable Logging:** Monitor error logs regularly
6. **Update Config:** Set `ENVIRONMENT` to 'production' in `libs/config.php`

## Getting Help

If you encounter issues:

1. Check the logs in `logs/` and `admin/logs/`
2. Review this guide and README.md
3. Open an issue on GitHub with:
   - Your PHP version (`php --version`)
   - Your MySQL version (`mysql --version`)
   - Error messages from logs or browser console
   - Steps you've already tried

## Additional Resources

- PHP Documentation: https://www.php.net/docs.php
- MySQL Documentation: https://dev.mysql.com/doc/
- Apache mod_rewrite: https://httpd.apache.org/docs/current/mod/mod_rewrite.html
