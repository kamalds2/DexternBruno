# DexternBruno - Quick Start Guide

Get DexternBruno up and running in 5 minutes!

## Prerequisites Check

Run this command to check if you have PHP installed:
```bash
php --version
```

You need PHP 7.0 or higher.

## Installation Steps

### 1. Get the Code
```bash
git clone https://github.com/kamalds2/DexternBruno.git
cd DexternBruno
```

### 2. Setup Database
```bash
# Login to MySQL
mysql -u root -p

# Run these SQL commands:
CREATE DATABASE pickdata_dextern_bruno;
EXIT;
```

### 3. Configure Database Connection
Edit `libs/config.php` and update these lines with your database credentials:
```php
define("DB_SERVER", "localhost");
define("DB_USERNAME", "root");        // Your MySQL username
define("DB_PASSWORD", "");            // Your MySQL password
define("DB_NAME", "pickdata_dextern_bruno");
```

### 4. Run Installation Checker
```bash
php check_installation.php > check_result.html
# Open check_result.html in your browser to see the results
```

Or visit: http://localhost/DexternBruno/check_installation.php (if running on Apache)

### 5. Start the Application

**Option A: Using PHP Built-in Server (Quick Test)**
```bash
php -S localhost:8000 -t .
```
Then visit: http://localhost:8000/

**Option B: Using Apache (Recommended)**
- Copy the DexternBruno folder to your web root (`htdocs` or `/var/www/html`)
- Visit: http://localhost/DexternBruno/

## What You Can Do Now

- **Homepage**: http://localhost:8000/ (or your configured URL)
- **Admin Panel**: http://localhost:8000/admin/
- **REST API**: http://localhost:8000/restful/

## Having Issues?

### Quick Fixes:

**Database connection error?**
- Check MySQL is running: `sudo systemctl status mysql`
- Verify credentials in `libs/config.php`

**Blank page?**
- Enable error display in `index.php`:
  ```php
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
  ```

**URL not working?**
- For PHP built-in server, update `libs/config.php`:
  ```php
  define("SITEURL", "http://" . $_SERVER['HTTP_HOST'] . '/');
  ```

## Complete Documentation

For detailed setup instructions, see:
- **README.md** - Overview and basic setup
- **SETUP.md** - Detailed step-by-step guide with troubleshooting

## Production Deployment

⚠️ **Important**: The PHP built-in server is for development only!

For production:
1. Use Apache or Nginx web server
2. Enable HTTPS
3. Disable error display
4. Set appropriate file permissions
5. Remove `check_installation.php`

See SETUP.md for production deployment instructions.

## Need Help?

1. Check the error logs in `logs/` directory
2. Review SETUP.md troubleshooting section
3. Open an issue on GitHub with error details

---

**Quick Reference:**

| Task | Command |
|------|---------|
| Start dev server | `php -S localhost:8000 -t .` |
| Check PHP version | `php --version` |
| Check MySQL | `mysql --version` |
| Test syntax | `php -l index.php` |
| View error logs | `tail -f logs/*.log` |
