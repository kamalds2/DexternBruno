#!/bin/bash
# run_dev_server.sh
# Quick script to run DexternBruno with PHP built-in server

echo "==================================="
echo "DexternBruno Development Server"
echo "==================================="
echo ""

# Check if PHP is installed
if ! command -v php &> /dev/null; then
    echo "ERROR: PHP is not installed or not in PATH"
    echo "Please install PHP 7.0 or higher"
    exit 1
fi

# Show PHP version
PHP_VERSION=$(php -v | head -n 1)
echo "Using: $PHP_VERSION"
echo ""

# Check if config exists
if [ ! -f "libs/config.php" ]; then
    echo "WARNING: libs/config.php not found"
    echo "Please copy libs/config.example.php to libs/config.php and configure it"
    echo ""
    
    # Ask if user wants to continue anyway
    read -p "Continue anyway? (y/n) " -n 1 -r
    echo
    if [[ ! $REPLY =~ ^[Yy]$ ]]; then
        exit 1
    fi
fi

# Determine port
PORT=${1:-8000}

echo "Starting PHP development server on port $PORT..."
echo "URL: http://localhost:$PORT/"
echo ""
echo "Press Ctrl+C to stop the server"
echo "==================================="
echo ""

# Start PHP server
php -S localhost:$PORT -t .
