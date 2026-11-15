<?php
// Local preview only: php -S localhost:8000 router.php
// The live site uses .htaccess instead and does not need this file.

$path = (string) parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ((str_starts_with($path, '/assets/') || str_starts_with($path, '/images/')) && is_file(__DIR__ . $path)) {
    return false;
}

require __DIR__ . '/index.php';
