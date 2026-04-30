(function () {
    'use strict';
    var streakEl = document.querySelector('.duo-streak-num');
    var xpEl = document.querySelector('.duo-xp-num');
    var xpBarFill = document.getElementById('duo-xp-bar-fill');
    if (!streakEl || !xpEl) {
        return;
    }
    var xp = parseInt(localStorage.getItem('duo_xp') || '0', 10);
    var streak = parseInt(localStorage.getItem('duo_streak') || '0', 10);
    streakEl.textContent = String(streak);
    xpEl.textContent = String(xp);
    if (xpBarFill) {
        var cap = 1000;
        var pct = Math.min(100, Math.max(0, (xp / cap) * 100));
        xpBarFill.style.width = pct + '%';
    }
})();
