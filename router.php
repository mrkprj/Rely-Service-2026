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
$path = rawurldecode((string) $path);

/* Collapse . and .. before any check, otherwise /assets/../includes/config.php
   slips past the block below and reaches a file it should not. Apache resolves
   these itself, so this only matters for the built-in server, but a guard that
   can be walked around is not a guard. */
$segments = [];
foreach (explode('/', $path) as $segment) {
    if ($segment === '' || $segment === '.') {
        continue;
    }
    if ($segment === '..') {
        array_pop($segments);
        continue;
    }
    $segments[] = $segment;
}
$path = '/' . implode('/', $segments);
$file = __DIR__ . $path;

// Never serve server-side directories.
// Server-side directories, and the file types .htaccess denies in production.
if (preg_match('#^/(includes|storage)(/|$)#', $path)
    || preg_match('#\.(csv|log|md|json|lock)$#i', $path)) {
    http_response_code(404);
    require __DIR__ . '/404.php';
    return true;
}

// Real file (CSS, JS, images). Let the server handle it.
if ($path !== '/' && is_file($file)) {
    return false;
}

// Matches the .htaccess canonical rules: /index redirects to /.
if ($path === '/index') {
    header('Location: /', true, 301);
    return true;
}

if ($path === '/' || $path === '') {
    require __DIR__ . '/index.php';
    return true;
}

/* Note: the normalisation above already collapses a trailing slash, so /about/
   and /about are the same path here. In production .htaccess issues a 301 from
   the slashed form so that only one URL is indexable. */
if (is_file(__DIR__ . $path . '.php')) {
    require __DIR__ . $path . '.php';
    return true;
}

http_response_code(404);
require __DIR__ . '/404.php';
return true;
