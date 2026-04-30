<?php
declare(strict_types=1);

define('ROOT', dirname(__DIR__));
define('CONFIG', ROOT . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR);
define('TMP', ROOT . DIRECTORY_SEPARATOR . 'tmp' . DIRECTORY_SEPARATOR);
define('LOGS', ROOT . DIRECTORY_SEPARATOR . 'logs' . DIRECTORY_SEPARATOR);

spl_autoload_register(static function (string $class): void {
    $prefix = 'App\\';
    $baseDir = ROOT . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR;
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }
    $relative = substr($class, $len);
    $file = $baseDir . str_replace('\\', DIRECTORY_SEPARATOR, $relative) . '.php';
    if (is_file($file)) {
        require $file;
    }
});
