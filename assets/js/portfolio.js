/**
 * Trendz Eventz — Interactive Portfolio Filter Engine
 */
(function() {
    'use strict';

    function initPortfolioFilter() {
        const filterBtns = document.querySelectorAll('.filter-btn');
        const projectCards = document.querySelectorAll('.project-card');

        if (filterBtns.length === 0 || projectCards.length === 0) return;

        filterBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const selectedFilter = this.getAttribute('data-filter') || 'all';

                // 1. Update Buttons Active & ARIA states
                filterBtns.forEach(b => {
                    b.classList.remove('filter-btn--active');
                    b.setAttribute('aria-pressed', 'false');
                });
                this.classList.add('filter-btn--active');
                this.setAttribute('aria-pressed', 'true');

                // 2. Filter Cards with Smooth Visibility Transition
                projectCards.forEach(card => {
                    const cardCategory = card.getAttribute('data-category');
                    if (selectedFilter === 'all' || cardCategory === selectedFilter) {
                        card.classList.remove('project-card--hidden');
                        card.style.opacity = '0';
                        card.style.transform = 'translateY(12px)';
                        setTimeout(() => {
                            card.style.opacity = '1';
                            card.style.transform = 'translateY(0)';
                        }, 50);
                    } else {
                        card.classList.add('project-card--hidden');
                    }
                });
            });
        });
    }

    window.TrendzPortfolio = { init: initPortfolioFilter };
})();

