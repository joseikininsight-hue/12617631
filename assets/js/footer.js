/**
 * Footer Scripts
 * サトー建装テーマ v3.0.0
 */

(function() {
    'use strict';

    const backToTop = document.getElementById('back-to-top');

    /**
     * Initialize Footer Scripts
     */
    function init() {
        setupBackToTop();
    }

    /**
     * Back to Top Button
     */
    function setupBackToTop() {
        if (!backToTop) return;

        // Show/hide based on scroll position
        window.addEventListener('scroll', throttle(function() {
            if (window.scrollY > 500) {
                backToTop.classList.add('is-visible');
            } else {
                backToTop.classList.remove('is-visible');
            }
        }, 100));

        // Smooth scroll to top
        backToTop.addEventListener('click', function(e) {
            e.preventDefault();
            
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });

            // Focus on skip link or body for accessibility
            document.body.focus();
        });
    }

    /**
     * Utility: Throttle
     */
    function throttle(func, limit) {
        let inThrottle;
        return function() {
            const args = arguments;
            const context = this;
            if (!inThrottle) {
                func.apply(context, args);
                inThrottle = true;
                setTimeout(function() {
                    inThrottle = false;
                }, limit);
            }
        };
    }

    // Initialize on DOM ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

})();
