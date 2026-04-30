/**
 * Sons de acerto / erro (Web Audio API — sem ficheiros externos).
 */
(function () {
    'use strict';

    function getCtx() {
        var Ctx = window.AudioContext || window.webkitAudioContext;
        if (!Ctx) {
            return null;
        }
        if (!window.__duoAudioCtx) {
            window.__duoAudioCtx = new Ctx();
        }
        return window.__duoAudioCtx;
    }

    function resume(ctx) {
        if (ctx && ctx.state === 'suspended') {
            ctx.resume();
        }
    }

    /**
     * Som agradável ascendente (acerto).
     */
    window.duoPlayCorrect = function () {
        var ctx = getCtx();
        if (!ctx) {
            return;
        }
        resume(ctx);
        var t0 = ctx.currentTime;
        var osc = ctx.createOscillator();
        var g = ctx.createGain();
        osc.type = 'sine';
        osc.frequency.setValueAtTime(523.25, t0);
        osc.frequency.exponentialRampToValueAtTime(659.25, t0 + 0.08);
        osc.frequency.exponentialRampToValueAtTime(783.99, t0 + 0.18);
        g.gain.setValueAtTime(0, t0);
        g.gain.linearRampToValueAtTime(0.2, t0 + 0.02);
        g.gain.exponentialRampToValueAtTime(0.001, t0 + 0.35);
        osc.connect(g);
        g.connect(ctx.destination);
        osc.start(t0);
        osc.stop(t0 + 0.4);
    };

    /**
     * Som mais baixo / “thud” (erro).
     */
    window.duoPlayWrong = function () {
        var ctx = getCtx();
        if (!ctx) {
            return;
        }
        resume(ctx);
        var t0 = ctx.currentTime;
        var osc = ctx.createOscillator();
        var g = ctx.createGain();
        osc.type = 'triangle';
        osc.frequency.setValueAtTime(180, t0);
        osc.frequency.exponentialRampToValueAtTime(120, t0 + 0.12);
        g.gain.setValueAtTime(0, t0);
        g.gain.linearRampToValueAtTime(0.22, t0 + 0.02);
        g.gain.exponentialRampToValueAtTime(0.001, t0 + 0.25);
        osc.connect(g);
        g.connect(ctx.destination);
        osc.start(t0);
        osc.stop(t0 + 0.28);
    };

    document.addEventListener('click', function first() {
        resume(getCtx());
        document.removeEventListener('click', first);
    }, { once: true });
})();
