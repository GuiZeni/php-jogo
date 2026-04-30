<?php
declare(strict_types=1);

/**
 * Servidor embutido PHP: php -S localhost:8765 router.php
 */
if (PHP_SAPI !== 'cli-server') {
    return false;
}

$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '/');
if ($uri !== '/' && file_exists(__DIR__ . $uri)) {
    return false;
}

require __DIR__ . '/index.php';
