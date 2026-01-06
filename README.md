# DexternBruno

A PHP MVC web application for managing job postings and company information.

## System Requirements

- **PHP**: Version 7.0 or higher (tested with PHP 8.3.6)
- **Database**: MySQL/MariaDB
- **Web Server**: Apache with mod_rewrite enabled OR PHP built-in server for development
- **PHP Extensions**: 
  - PDO (PHP Data Objects)
  - pdo_mysql
  - mysqli (optional, if using mysqli driver)

## Installation

### 1. Clone the Repository

```bash
git clone https://github.com/kamalds2/DexternBruno.git
cd DexternBruno
```

### 2. Database Setup

1. Create a MySQL database:
```sql
CREATE DATABASE pickdata_dextern_bruno;
```

2. Import the database schema (if available) or configure the database connection in `libs/config.php`

3. Update database credentials in `libs/config.php`:
```php
define("DB_SERVER", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "pickdata_dextern_bruno");
define("DB_PORT", "3306");
```

### 3. Configuration

Edit `libs/config.php` to match your environment:

- Set the correct `MAINURL` and `SITEURL` based on your server setup
- Adjust timezone if needed (default: Asia/Kolkata)
- Configure email settings if sending emails

## Running the Application

### Option 1: Using Apache (Recommended for Production)

1. Configure Apache virtual host or place the application in your web root directory
2. Ensure `.htaccess` is enabled and mod_rewrite is active
3. Update `libs/config.php` paths to match your Apache setup:
```php
define('MAINURL', $_SERVER['DOCUMENT_ROOT']."/DexternBruno/");
define("SITEURL", "http://" . $_SERVER['HTTP_HOST'] . '/DexternBruno/');
```
4. Access the application: `http://localhost/DexternBruno/`

### Option 2: Using PHP Built-in Server (Development Only)

For quick testing without Apache:

1. Update `libs/config.php` to remove the subdirectory path:
```php
define('MAINURL', $_SERVER['DOCUMENT_ROOT']."/");
define("SITEURL", "http://" . $_SERVER['HTTP_HOST'] . '/');
define('BASE', $_SERVER['DOCUMENT_ROOT']."/");
define("RESTURL","http://" . $_SERVER['HTTP_HOST'] . '/'."restful/");
define('PATH', "http://" . $_SERVER['HTTP_HOST'] ."/");
```

2. Start the PHP built-in server:
```bash
php -S localhost:8000 -t .
```

3. Access the application: `http://localhost:8000/`

**Note**: The PHP built-in server is for development only and should not be used in production.

## Project Structure

```
DexternBruno/
├── admin/              # Admin panel
│   ├── controllers/    # Admin controllers
│   ├── models/         # Admin models
│   ├── views/          # Admin views
│   └── core/          # Admin core files
├── controllers/        # Public-facing controllers
├── models/            # Public-facing models
├── views/             # Public-facing views
├── core/              # Core MVC framework files
├── libs/              # Libraries and helpers
│   ├── config.php     # Main configuration file
│   ├── drivers/       # Database drivers
│   └── helpers/       # Helper functions
├── restful/           # RESTful API
├── uploads/           # User uploaded files
├── logs/              # Application logs
├── .htaccess          # Apache rewrite rules
└── index.php          # Application entry point
```

## Troubleshooting

### Issue: "Class not found" errors
- **Cause**: URL parsing issues or incorrect configuration
- **Solution**: Ensure `SITEURL` in `libs/config.php` matches your actual URL structure

### Issue: Database connection errors
- **Cause**: Incorrect database credentials or database doesn't exist
- **Solution**: Verify database settings in `libs/config.php` and ensure the database exists

### Issue: 404 errors or routing not working
- **Cause**: Apache mod_rewrite not enabled or .htaccess not being read
- **Solution**: Enable mod_rewrite in Apache and ensure AllowOverride is set correctly

### Issue: Blank page or PHP errors
- **Cause**: PHP error reporting is disabled in production
- **Solution**: Enable errors temporarily by editing `index.php`:
```php
error_reporting(E_ALL);
ini_set('display_errors', '1');
```

## Features

- Job posting management
- Services showcase
- Content pages management
- Slider/carousel management
- Admin panel for content management
- RESTful API endpoints
- File upload functionality

## License

Please refer to the repository owner for licensing information.

## Support

For issues or questions, please open an issue on the GitHub repository.
