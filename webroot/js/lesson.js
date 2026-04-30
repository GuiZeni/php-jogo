/**
 * Fluxo da lição: perguntas, feedback, sons, progresso (alinhado à app Unity).
 */
(function () {
    'use strict';

    function duoLessonInit() {
        var root = document.getElementById('lesson-app');
        if (!root) {
            return;
        }

        var jsonEl = document.getElementById('duo-lesson-questions-json');
        var raw = '';
        if (jsonEl && typeof jsonEl.value === 'string') {
            raw = jsonEl.value.trim();
        } else if (jsonEl) {
            raw = (jsonEl.textContent || '').trim();
        }
        if (!raw) {
            raw = (root.getAttribute('data-questions') || '').trim();
        }

        var questions;
        try {
            questions = JSON.parse(raw);
        } catch (e) {
            var err = document.getElementById('q-prompt-label');
            var ph = document.getElementById('q-phrase');
            if (err) err.textContent = 'Erro ao carregar a lição';
            if (ph) ph.textContent = 'Recarregue a página ou volte ao início. Detalhe: JSON inválido.';
            return;
        }

        if (!Array.isArray(questions)) {
            var el1 = document.getElementById('q-prompt-label');
            var el2 = document.getElementById('q-phrase');
            if (el1) el1.textContent = 'Erro ao carregar a lição';
            if (el2) el2.textContent = 'Formato de dados inválido.';
            return;
        }

        var idx = 0;
        var total = questions.length;
        var progressEl = document.getElementById('lesson-progress');
        var qCounter = document.getElementById('q-counter');
        var promptLabel = document.getElementById('q-prompt-label');
        var phraseEl = document.getElementById('q-phrase');
        var choicesEl = document.getElementById('q-choices');
        var footer = document.getElementById('feedback-footer');
        var feedbackMsg = document.getElementById('feedback-msg');
        var btnNext = document.getElementById('btn-next');

        var answered = false;
        var lastCorrect = false;

        function setProgressBarFillClass(ratio) {
            if (!progressEl) return;
            progressEl.classList.toggle('duo-progress-bar--inactive', ratio <= 0.001);
        }

        /** Barra e contador alinhados: pergunta atual / total (ex.: 1/5 → 20%). */
        function setProgress() {
            if (total <= 0) {
                if (progressEl) {
                    progressEl.style.width = '0%';
                }
                setProgressBarFillClass(0);
                if (qCounter) {
                    qCounter.textContent = '0 / 0';
                }
                return;
            }
            var denom = total;
            var step = Math.min(idx + 1, denom);
            var ratio = step / denom;
            var p = ratio * 100;
            if (progressEl) {
                progressEl.style.width = Math.min(100, p) + '%';
            }
            setProgressBarFillClass(ratio);
            if (qCounter) {
                qCounter.textContent = String(Math.min(idx + 1, Math.max(1, total))) + ' / ' + String(Math.max(1, total));
            }
        }

        function shuffleIndices(n) {
            var a = [];
            for (var i = 0; i < n; i++) {
                a.push(i);
            }
            for (var j = a.length - 1; j > 0; j--) {
                var k = Math.floor(Math.random() * (j + 1));
                var t = a[j];
                a[j] = a[k];
                a[k] = t;
            }
            return a;
        }

        function renderQuestion() {
            answered = false;
            lastCorrect = false;
            if (footer) footer.classList.add('d-none');
            if (footer) footer.classList.remove('is-correct', 'is-wrong');
            if (feedbackMsg) feedbackMsg.className = 'fw-bold duo-feedback-msg';
            if (btnNext) btnNext.classList.add('d-none');

            if (total === 0) {
                if (promptLabel) promptLabel.textContent = 'Lição vazia';
                if (phraseEl) phraseEl.textContent = 'Não há perguntas nesta lição.';
                if (choicesEl) choicesEl.innerHTML = '';
                return;
            }

            if (idx >= total) {
                if (promptLabel) promptLabel.textContent = 'Lição concluída';
                if (phraseEl) phraseEl.textContent = 'Bom trabalho! 🎉';
                if (choicesEl) choicesEl.innerHTML = '';
                if (progressEl) progressEl.style.width = '100%';
                setProgressBarFillClass(1);
                if (qCounter) {
                    qCounter.textContent = String(total) + ' / ' + String(total);
                }
                if (footer) footer.classList.remove('d-none');
                if (footer) footer.classList.add('is-correct');
                if (feedbackMsg) {
                    feedbackMsg.textContent = 'Ganhou XP nesta lição!';
                    feedbackMsg.classList.add('is-correct-text');
                }
                if (btnNext) {
                    btnNext.textContent = 'Voltar ao início';
                    btnNext.classList.remove('d-none');
                }
                if (btnNext) btnNext.onclick = function () {
                    var xp = parseInt(localStorage.getItem('duo_xp') || '0', 10) + total * 10;
                    var st = parseInt(localStorage.getItem('duo_streak') || '0', 10) + 1;
                    localStorage.setItem('duo_xp', String(xp));
                    localStorage.setItem('duo_streak', String(st));
                    window.location.href = 'index.php?r=home';
                };
                if (typeof window.duoPlayCorrect === 'function') {
                    window.duoPlayCorrect();
                }
                return;
            }

            var q = questions[idx];
            if (!q || typeof q !== 'object') {
                if (promptLabel) promptLabel.textContent = 'ERRO';
                if (phraseEl) phraseEl.textContent = 'Pergunta inválida.';
                if (choicesEl) choicesEl.innerHTML = '';
                setProgress();
                return;
            }
            if (promptLabel) promptLabel.textContent = q.prompt || 'Escolha a opção correta';
            if (phraseEl) phraseEl.textContent = q.phrase != null ? String(q.phrase) : '';

            if (choicesEl) choicesEl.innerHTML = '';
            var rawChoices = q.choices;
            var labels = Array.isArray(rawChoices) ? rawChoices.slice() : (rawChoices && rawChoices.items ? rawChoices.items.slice() : []);
            var correctIndex = typeof q.correct === 'number' ? q.correct : parseInt(q.correct, 10) || 0;
            if (labels.length < 2) {
                if (promptLabel) promptLabel.textContent = 'Dados incompletos';
                if (phraseEl) phraseEl.textContent = 'Esta pergunta não tem opções.';
                if (choicesEl) choicesEl.innerHTML = '';
                setProgress();
                return;
            }
            correctIndex = Math.max(0, Math.min(labels.length - 1, correctIndex));
            var order = shuffleIndices(labels.length);
            var correctShuffled = order.indexOf(correctIndex);

            order.forEach(function (orig, btnPos) {
                var btn = document.createElement('button');
                btn.type = 'button';
                btn.className = 'btn duo-choice w-100';
                btn.textContent = labels[orig];
                btn.dataset.shuffled = String(btnPos);
                btn.addEventListener('click', function () {
                    if (answered) {
                        return;
                    }
                    onPick(btnPos, correctShuffled, btn);
                });
                if (choicesEl) choicesEl.appendChild(btn);
            });

            setProgress();
        }

        function onPick(picked, correctShuffled, btnEl) {
            answered = true;
            lastCorrect = picked === correctShuffled;
            if (choicesEl) {
                var buttons = choicesEl.querySelectorAll('.duo-choice');
                buttons.forEach(function (b) {
                    b.disabled = true;
                    var sh = parseInt(b.dataset.shuffled, 10);
                    if (sh === correctShuffled) {
                        b.classList.add('is-correct');
                    }
                });
            }
            if (!lastCorrect && btnEl) {
                btnEl.classList.add('is-wrong');
                if (typeof window.duoPlayWrong === 'function') {
                    window.duoPlayWrong();
                }
            } else if (lastCorrect) {
                if (typeof window.duoPlayCorrect === 'function') {
                    window.duoPlayCorrect();
                }
            }

            if (footer) footer.classList.remove('d-none', 'is-correct', 'is-wrong');
            if (feedbackMsg) feedbackMsg.className = 'fw-bold duo-feedback-msg';

            if (lastCorrect) {
                if (footer) footer.classList.add('is-correct');
                if (feedbackMsg) {
                    feedbackMsg.textContent = 'Excelente!';
                    feedbackMsg.classList.add('is-correct-text');
                }
            } else {
                if (footer) footer.classList.add('is-wrong');
                if (feedbackMsg) {
                    feedbackMsg.textContent = 'Resposta errada';
                    feedbackMsg.classList.add('is-wrong-text');
                }
            }
            if (btnNext) {
                btnNext.textContent = 'Continuar';
                btnNext.classList.remove('d-none');
                btnNext.onclick = function () {
                    idx += 1;
                    renderQuestion();
                };
            }
        }

        renderQuestion();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', duoLessonInit);
    } else {
        duoLessonInit();
    }
})();
