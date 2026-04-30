<?php
/** @var array $lesson */
/** @var string $slug */
$qTotal = isset($lesson['questions']) && is_array($lesson['questions']) ? count($lesson['questions']) : 1;
$qTotal = max(1, $qTotal);
$initialProgressPct = min(100, round(100 / $qTotal, 2));
$questionsJsonSafe = json_encode(
    $lesson['questions'] ?? [],
    JSON_THROW_ON_ERROR | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS
);
?>
<div class="duo-app duo-lesson-page" id="lesson-app"
     data-lesson-slug="<?= htmlspecialchars($slug, ENT_QUOTES, 'UTF-8') ?>">
    <!-- JSON em textarea: o parser HTML não interfere (evita lição vazia). -->
    <textarea id="duo-lesson-questions-json" class="visually-hidden" readonly aria-hidden="true"><?= $questionsJsonSafe ?></textarea>
    <header class="duo-lesson-header sticky-top">
        <div class="container duo-lesson-header-inner">
            <div class="duo-lesson-toolbar d-flex align-items-center gap-3 flex-wrap">
                <a href="index.php?r=home" class="duo-back-pill text-decoration-none" aria-label="Voltar">✕</a>
                <h2 class="duo-lesson-title-header flex-grow-1 mb-0 text-truncate"><?= htmlspecialchars($lesson['title'], ENT_QUOTES, 'UTF-8') ?></h2>
                <div class="duo-counter-pill fw-bold" id="q-counter">1 / <?= (int) $qTotal ?></div>
            </div>
            <div class="duo-progress-track-wrap mt-3">
                <div class="duo-progress duo-progress-lesson">
                    <div class="duo-progress-bar" id="lesson-progress" style="width: <?= htmlspecialchars((string) $initialProgressPct, ENT_QUOTES, 'UTF-8') ?>%"></div>
                </div>
            </div>
        </div>
        <div class="duo-lesson-header-rule" aria-hidden="true"></div>
    </header>

    <main class="container duo-lesson-main py-4 pb-140">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div id="question-card" class="duo-card duo-question-card">
                    <div class="duo-question-card-body">
                        <p class="duo-prompt-label small text-uppercase fw-bold mb-2" id="q-prompt-label"></p>
                        <h2 class="duo-phrase h4 fw-bold mb-4" id="q-phrase"></h2>
                        <div class="duo-choices d-grid gap-2" id="q-choices" role="group" aria-label="Opções"></div>
                    </div>
                </div>

                <div id="feedback-footer" class="duo-feedback-footer fixed-bottom d-none">
                    <div class="container py-3">
                        <div class="duo-feedback-row d-flex align-items-center justify-content-between flex-wrap gap-3">
                            <div id="feedback-msg" class="duo-feedback-msg fw-bold flex-grow-1"></div>
                            <button type="button" class="btn duo-btn-primary duo-btn-next" id="btn-next">Continuar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
