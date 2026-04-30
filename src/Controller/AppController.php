<?php
declare(strict_types=1);

namespace App\Controller;

abstract class AppController
{
    protected function render(string $template, array $vars = []): void
    {
        extract($vars, EXTR_SKIP);
        $layout = ROOT . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'layout' . DIRECTORY_SEPARATOR . 'default.php';
        $tpl = ROOT . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $template) . '.php';
        if (!is_file($tpl)) {
            http_response_code(500);
            echo 'Template em falta.';
            return;
        }
        ob_start();
        require $tpl;
        $content = ob_get_clean();
        require $layout;
    }
}
