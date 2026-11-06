/**
 * Trendz Eventz — Accessible Navigation Controller
 * Handles sticky header transitions, mobile drawer menu, focus trapping, and keyboard controls.
 */
(function() {
    'use strict';

    function initNavigation() {
        const header = document.getElementById('site-header');
        const toggleBtn = document.getElementById('mobile-toggle');
        const drawer = document.getElementById('mobile-drawer');
        const closeBtn = document.getElementById('mobile-drawer-close');
        const backdrop = document.getElementById('mobile-drawer-backdrop');

        if (!header) return;

        // 1. Scroll-triggered Header Minimization & Shadow
        let lastScrollY = window.scrollY;
        function onScroll() {
            if (window.scrollY > 30) {
                header.classList.add('site-header--scrolled');
            } else {
                header.classList.remove('site-header--scrolled');
            }
            lastScrollY = window.scrollY;
        }

        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll(); // initial state check

        // 2. Mobile Drawer Controls
        if (!toggleBtn || !drawer) return;

        function openDrawer() {
            drawer.classList.add('mobile-drawer--open');
            drawer.setAttribute('aria-hidden', 'false');
            toggleBtn.setAttribute('aria-expanded', 'true');
            document.body.style.overflow = 'hidden';
            if (closeBtn) closeBtn.focus();
        }

        function closeDrawer() {
            drawer.classList.remove('mobile-drawer--open');
            drawer.setAttribute('aria-hidden', 'true');
            toggleBtn.setAttribute('aria-expanded', 'false');
            document.body.style.overflow = '';
            toggleBtn.focus();
        }

        toggleBtn.addEventListener('click', function() {
            const isOpen = drawer.classList.contains('mobile-drawer--open');
            if (isOpen) {
                closeDrawer();
            } else {
                openDrawer();
            }
        });

        if (closeBtn) closeBtn.addEventListener('click', closeDrawer);
        if (backdrop) backdrop.addEventListener('click', closeDrawer);

        // Escape Key Listener
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && drawer.classList.contains('mobile-drawer--open')) {
                closeDrawer();
            }
        });
    }

    window.TrendzNav = { init: initNavigation };
})();

