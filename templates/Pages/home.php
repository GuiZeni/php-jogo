<?php
/** @var array<string, array> $lessons */
?>
<div class="duo-app">
    <header class="duo-topbar duo-topbar-home">
        <div class="container duo-topbar-inner">
            <div class="duo-topbar-row d-flex align-items-center justify-content-between py-2 gap-2">
                <div class="duo-topbar-left flex-shrink-0">
                    <a href="index.php?r=home" class="duo-brand text-decoration-none">
                        <span class="duo-brand-text">DuoLearn</span>
                    </a>
                </div>
                <div class="duo-topbar-center flex-grow-1 d-flex justify-content-center">
                    <div class="duo-streak-pill-home" title="Ofensiva">
                        <span class="fw-bold duo-streak-num">0</span>
                    </div>
                </div>
                <div class="duo-topbar-right flex-shrink-0">
                    <div class="duo-xp-row d-flex align-items-center gap-2">
                        <div class="duo-xp-mini-track" title="Progresso de XP">
                            <div class="duo-xp-mini-fill" id="duo-xp-bar-fill" style="width: 0%"></div>
                        </div>
                        <span class="duo-xp-label-row text-nowrap">
                            <span class="duo-xp-word">XP</span>
                            <span class="fw-bold duo-xp-num">0</span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="duo-topbar-rule duo-topbar-rule-thin" aria-hidden="true"></div>
    </header>

    <main class="duo-home-outer py-3 py-md-4 px-2 px-md-3 pb-5">
        <div class="container duo-main-home px-0">
            <div class="duo-home-shell">
                <div class="duo-hero-band text-center">
                    <h1 class="duo-hero-title mb-2 mb-md-3">Aprenda no seu ritmo</h1>
                    <p class="duo-hero-sub mb-0">Lições curtas, feedback na hora — inspirado no que você já conhece.</p>
                </div>
                <div class="duo-path-shell">
                    <div class="duo-path">
                        <?php foreach ($lessons as $slug => $meta): ?>
                            <div class="duo-path-node mb-3">
                                <a href="index.php?r=lesson&amp;slug=<?= rawurlencode($slug) ?>"
                                   class="duo-lesson-btn text-decoration-none text-start">
                                    <span class="duo-lesson-icon-wrap" aria-hidden="true">
                                        <span class="duo-lesson-icon"><?= htmlspecialchars($meta['icon'] ?? '📘', ENT_QUOTES, 'UTF-8') ?></span>
                                    </span>
                                    <span class="duo-lesson-texts flex-grow-1">
                                        <span class="duo-lesson-title d-block"><?= htmlspecialchars($meta['title'], ENT_QUOTES, 'UTF-8') ?></span>
                                        <span class="duo-lesson-sub d-block"><?= htmlspecialchars($meta['subtitle'] ?? '', ENT_QUOTES, 'UTF-8') ?></span>
                                    </span>
                                    <span class="duo-lesson-chevron-wrap" aria-hidden="true">
                                        <span class="duo-chevron">›</span>
                                    </span>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
