/**
 * Header & Navigation Scripts
 * サトー建装テーマ v3.0.0
 */

(function() {
    'use strict';

    // DOM Elements
    const header = document.getElementById('header');
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const fixedContact = document.getElementById('fixed-contact');
    const closeMenuButtons = document.querySelectorAll('[data-close-menu]');

    // State
    let lastScrollY = 0;
    let isMenuOpen = false;

    /**
     * Initialize Header Scripts
     */
    function init() {
        if (!header) return;

        setupScrollBehavior();
        setupMobileMenu();
        setupSmoothScroll();
        setupFixedContact();
    }

    /**
     * Scroll Behavior
     */
    function setupScrollBehavior() {
        const topBar = document.querySelector('.top-bar');
        const topBarHeight = topBar ? topBar.offsetHeight : 0;

        window.addEventListener('scroll', throttle(function() {
            const currentScrollY = window.scrollY;

            // Add scrolled class when past top bar
            if (currentScrollY > topBarHeight) {
                header.classList.add('is-scrolled');
                document.body.classList.add('scrolled');
            } else {
                header.classList.remove('is-scrolled');
                document.body.classList.remove('scrolled');
            }

            // Hide/show header on scroll direction
            if (currentScrollY > 300) {
                if (currentScrollY > lastScrollY && !isMenuOpen) {
                    // Scrolling down
                    header.style.transform = 'translateY(-100%)';
                } else {
                    // Scrolling up
                    header.style.transform = 'translateY(0)';
                }
            } else {
                header.style.transform = 'translateY(0)';
            }

            lastScrollY = currentScrollY;
        }, 100));
    }

    /**
     * Mobile Menu
     */
    function setupMobileMenu() {
        if (!menuToggle || !mobileMenu) return;

        // Toggle menu
        menuToggle.addEventListener('click', function() {
            toggleMenu();
        });

        // Close menu buttons
        closeMenuButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                closeMenu();
            });
        });

        // Close on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && isMenuOpen) {
                closeMenu();
            }
        });

        // Close on outside click
        mobileMenu.addEventListener('click', function(e) {
            if (e.target === mobileMenu.querySelector('.mobile-nav__overlay')) {
                closeMenu();
            }
        });
    }

    function toggleMenu() {
        isMenuOpen = !isMenuOpen;
        
        menuToggle.setAttribute('aria-expanded', isMenuOpen);
        mobileMenu.classList.toggle('is-open', isMenuOpen);
        document.body.style.overflow = isMenuOpen ? 'hidden' : '';

        if (isMenuOpen) {
            // Focus first link when menu opens
            const firstLink = mobileMenu.querySelector('.mobile-nav__link');
            if (firstLink) {
                setTimeout(function() {
                    firstLink.focus();
                }, 300);
            }
        }
    }

    function closeMenu() {
        isMenuOpen = false;
        menuToggle.setAttribute('aria-expanded', 'false');
        mobileMenu.classList.remove('is-open');
        document.body.style.overflow = '';
        menuToggle.focus();
    }

    /**
     * Smooth Scroll for Anchor Links
     */
    function setupSmoothScroll() {
        const anchors = document.querySelectorAll('a[href^="#"], a[href*="/#"]');

        anchors.forEach(function(anchor) {
            anchor.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                let targetId;

                // Handle both "#id" and "page/#id" formats
                if (href.includes('/#')) {
                    const currentPath = window.location.pathname;
                    const linkPath = href.split('/#')[0] || '/';
                    
                    // If we're on a different page, let the link work normally
                    if (currentPath !== linkPath && currentPath !== linkPath + '/') {
                        return;
                    }
                    targetId = href.split('/#')[1];
                } else {
                    targetId = href.slice(1);
                }

                if (!targetId) return;

                const target = document.getElementById(targetId);
                if (!target) return;

                e.preventDefault();

                // Close mobile menu if open
                if (isMenuOpen) {
                    closeMenu();
                }

                // Calculate offset (header height)
                const headerHeight = header.offsetHeight;
                const targetPosition = target.getBoundingClientRect().top + window.scrollY - headerHeight - 20;

                // Smooth scroll
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });

                // Update URL
                history.pushState(null, null, '#' + targetId);
            });
        });
    }

    /**
     * Fixed Contact Bar
     */
    function setupFixedContact() {
        if (!fixedContact) return;

        window.addEventListener('scroll', throttle(function() {
            if (window.scrollY > 300) {
                fixedContact.classList.add('is-visible');
            } else {
                fixedContact.classList.remove('is-visible');
            }
        }, 100));
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
