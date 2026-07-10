<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

// This file allows us to emulate Apache's "mod_rewrite" functionality from the
// built-in PHP web server. This provides a convenient way to test a Laravel
// application without having installed a "real" web server software here.
if ($uri !== '/') {
    $publicDir = realpath(__DIR__.'/public');
    $requestedPath = realpath($publicDir.$uri);

    if ($requestedPath !== false
        && $publicDir !== false
        && str_starts_with($requestedPath, $publicDir.DIRECTORY_SEPARATOR)
        && is_file($requestedPath)
    ) {
        return false;
    }
}

require_once __DIR__.'/public/index.php';
