<?php
declare(strict_types=1);

require dirname(__DIR__) . '/config/bootstrap.php';

use App\Controller\LessonsController;
use App\Controller\PagesController;

$r = $_GET['r'] ?? 'home';

match ($r) {
    'home' => (new PagesController())->home(),
    'lesson' => (new LessonsController())->play($_GET['slug'] ?? ''),
    'api-lessons' => (new LessonsController())->apiLessonsJson(),
    default => (static function (): void {
        http_response_code(404);
        echo 'Página não encontrada.';
    })(),
};
