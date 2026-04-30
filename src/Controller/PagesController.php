<?php
declare(strict_types=1);

namespace App\Controller;

class PagesController extends AppController
{
    public function home(): void
    {
        $lessons = require CONFIG . 'lessons.php';
        $this->render('Pages/home', [
            'title' => 'DuoLearn — Aprenda idiomas',
            'lessons' => $lessons,
            'bodyClass' => 'duo-page-home',
            'extraScripts' => ['js/home-stats.js'],
        ]);
    }
}
