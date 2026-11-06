/**
 * Trendz Eventz — Purposeful Motion & Micro-Interactions Controller
 * Supports prefers-reduced-motion and gracefully degrades.
 */
(function() {
    'use strict';

    function initMotion() {
        const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        // 1. Scroll-Triggered Reveal Animations
        const revealElements = document.querySelectorAll('.reveal-init');
        if (revealElements.length > 0) {
            if (prefersReducedMotion || !('IntersectionObserver' in window)) {
                revealElements.forEach(el => el.classList.add('reveal-visible'));
            } else {
                const observer = new IntersectionObserver((entries, obs) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('reveal-visible');
                            obs.unobserve(entry.target);
                        }
                    });
                }, {
                    threshold: 0.12,
                    rootMargin: '0px 0px -40px 0px'
                });

                revealElements.forEach(el => observer.observe(el));
            }
        }

        // 2. Stat Card Numeric Counters
        const statCounters = document.querySelectorAll('.stat-card__number');
        if (statCounters.length > 0) {
            if (prefersReducedMotion || !('IntersectionObserver' in window)) {
                // If reduced motion, leave target values as is
                return;
            }

            const counterObserver = new IntersectionObserver((entries, obs) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const target = parseInt(entry.target.getAttribute('data-target') || '0', 10);
                        if (target > 0) {
                            animateCounter(entry.target, target);
                        }
                        obs.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.25 });

            statCounters.forEach(counter => counterObserver.observe(counter));
        }

        function animateCounter(el, target) {
            if (typeof window.anime !== 'undefined') {
                const obj = { val: 0 };
                window.anime({
                    targets: obj,
                    val: target,
                    round: 1,
                    easing: 'easeOutExpo',
                    duration: 1800,
                    update: function() {
                        el.textContent = obj.val;
                    }
                });
            } else {
                let start = 0;
                const duration = 1400;
                const startTime = performance.now();

                function step(currentTime) {
                    const elapsed = currentTime - startTime;
                    const progress = Math.min(elapsed / duration, 1);
                    // easeOutQuad
                    const ease = progress * (2 - progress);
                    el.textContent = Math.floor(ease * target);
                    if (progress < 1) {
                        requestAnimationFrame(step);
                    } else {
                        el.textContent = target;
                    }
                }
                requestAnimationFrame(step);
            }
        }
    }

    window.TrendzMotion = { init: initMotion };
})();

