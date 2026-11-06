/**
 * Trendz Eventz — Master Client Application
 */
document.addEventListener('DOMContentLoaded', function() {
    'use strict';

    // Mark JS enabled
    document.documentElement.classList.remove('no-js');
    document.documentElement.classList.add('js');

    // Initialize modules
    if (window.TrendzNav && typeof window.TrendzNav.init === 'function') {
        window.TrendzNav.init();
    }

    if (window.TrendzMotion && typeof window.TrendzMotion.init === 'function') {
        window.TrendzMotion.init();
    }

    if (window.TrendzPortfolio && typeof window.TrendzPortfolio.init === 'function') {
        window.TrendzPortfolio.init();
    }

    if (window.TrendzForms && typeof window.TrendzForms.init === 'function') {
        window.TrendzForms.init();
    }
});

