@echo off
REM run_dev_server.bat
REM Quick script to run DexternBruno with PHP built-in server on Windows

echo ===================================
echo DexternBruno Development Server
echo ===================================
echo.

REM Check if PHP is installed
where php >nul 2>nul
if %ERRORLEVEL% NEQ 0 (
    echo ERROR: PHP is not installed or not in PATH
    echo Please install PHP 7.0 or higher and add it to PATH
    pause
    exit /b 1
)

REM Show PHP version
php -v | findstr PHP
echo.

REM Check if config exists
if not exist "libs\config.php" (
    echo WARNING: libs\config.php not found
    echo Please copy libs\config.example.php to libs\config.php and configure it
    echo.
    set /p CONTINUE=Continue anyway? (y/n): 
    if /i not "%CONTINUE%"=="y" exit /b 1
)

REM Determine port
set PORT=%1
if "%PORT%"=="" set PORT=8000

echo Starting PHP development server on port %PORT%...
echo URL: http://localhost:%PORT%/
echo.
echo Press Ctrl+C to stop the server
echo ===================================
echo.

REM Start PHP server
php -S localhost:%PORT% -t .
