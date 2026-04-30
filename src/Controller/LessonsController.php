<?php
declare(strict_types=1);

namespace App\Controller;

class LessonsController extends AppController
{
    /**
     * Fase 3 — JSON no formato esperado pela app Unity (choices.items, etc.).
     * URL exemplo: webroot/index.php?r=api-lessons
     */
    public function apiLessonsJson(): void
    {
        header('Content-Type: application/json; charset=utf-8');
        header('Access-Control-Allow-Origin: *');

        $all = require CONFIG . 'lessons.php';
        $lessons = [];
        foreach ($all as $slug => $lesson) {
            $questions = [];
            foreach ($lesson['questions'] ?? [] as $q) {
                $choices = $q['choices'] ?? [];
                $questions[] = [
                    'type' => $q['type'] ?? 'translate',
                    'prompt' => $q['prompt'] ?? '',
                    'phrase' => $q['phrase'] ?? '',
                    'choices' => ['items' => array_values(is_array($choices) ? $choices : [])],
                    'correct' => (int) ($q['correct'] ?? 0),
                ];
            }
            $lessons[] = [
                'slug' => (string) $slug,
                'title' => $lesson['title'] ?? '',
                'subtitle' => $lesson['subtitle'] ?? '',
                'icon' => $lesson['icon'] ?? '',
                'questions' => $questions,
            ];
        }

        echo json_encode(['lessons' => $lessons], JSON_THROW_ON_ERROR | JSON_UNESCAPED_UNICODE);
    }

    public function play(string $slug): void
    {
        $all = require CONFIG . 'lessons.php';
        if ($slug === '' || !isset($all[$slug])) {
            http_response_code(404);
            echo 'Lição não encontrada.';
            return;
        }
        $lesson = $all[$slug];
        $this->render('Lessons/play', [
            'title' => $lesson['title'] . ' — DuoLearn',
            'lesson' => $lesson,
            'slug' => $slug,
            'bodyClass' => 'duo-page-lesson',
            'extraScripts' => ['js/lesson.js'],
        ]);
    }
}
