<?php
/**
 * Local preview router, for PHP's built-in server only.
 * It reproduces the clean-URL rewriting that .htaccess does on the real host.
 *
 *   php -S localhost:8000 router.php
 *
 * Do NOT upload this file to production; Apache uses .htaccess instead.
 */
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$file = __DIR__ . $path;

// Never serve server-side directories.
if (preg_match('#^/(includes|storage)(/|$)#', $path)) {
    http_response_code(404);
    require __DIR__ . '/404.php';
    return true;
}

// Real file (CSS, JS, images). Let the server handle it.
if ($path !== '/' && is_file($file)) {
    return false;
}

if ($path === '/' || $path === '') {
    require __DIR__ . '/index.php';
    return true;
}

$clean = rtrim($path, '/');
if (is_file(__DIR__ . $clean . '.php')) {
    require __DIR__ . $clean . '.php';
    return true;
}

http_response_code(404);
require __DIR__ . '/404.php';
return true;
