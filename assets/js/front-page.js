/**
 * Front Page JavaScript
 * サトー建装 フロントページ専用スクリプト
 * @version 3.0.0
 */

(function() {
    'use strict';

    /**
     * DOM Ready
     */
    document.addEventListener('DOMContentLoaded', function() {
        initScrollAnimations();
        initSmoothScroll();
        initFAQAccordion();
        initLazyLoad();
    });

    /**
     * Scroll Animations using Intersection Observer
     */
    function initScrollAnimations() {
        const animatedElements = document.querySelectorAll('.fade-in-up');
        
        if (!animatedElements.length) return;
        
        // Check for reduced motion preference
        const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        
        if (prefersReducedMotion) {
            // If user prefers reduced motion, just show elements
            animatedElements.forEach(function(el) {
                el.classList.add('is-visible');
            });
            return;
        }
        
        const observerOptions = {
            root: null,
            rootMargin: '0px 0px -50px 0px',
            threshold: 0.1
        };
        
        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);
        
        animatedElements.forEach(function(el) {
            observer.observe(el);
        });
    }

    /**
     * Smooth Scroll for Anchor Links
     */
    function initSmoothScroll() {
        const anchorLinks = document.querySelectorAll('a[href^="#"]');
        
        anchorLinks.forEach(function(link) {
            link.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                
                if (href === '#' || href === '#top') {
                    e.preventDefault();
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                    return;
                }
                
                const target = document.querySelector(href);
                
                if (target) {
                    e.preventDefault();
                    
                    const headerHeight = getHeaderHeight();
                    const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - headerHeight;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                    
                    // Update URL without scroll jump
                    if (history.pushState) {
                        history.pushState(null, null, href);
                    }
                }
            });
        });
    }

    /**
     * Get Header Height for Offset Calculation
     */
    function getHeaderHeight() {
        const header = document.querySelector('.site-header');
        if (header) {
            return header.offsetHeight;
        }
        return 0;
    }

    /**
     * FAQ Accordion Enhancement
     */
    function initFAQAccordion() {
        const faqItems = document.querySelectorAll('.faq-item');
        
        faqItems.forEach(function(item) {
            const summary = item.querySelector('summary');
            
            if (summary) {
                summary.addEventListener('click', function(e) {
                    // Smooth height animation
                    const answer = item.querySelector('.faq-item__answer');
                    
                    if (item.open) {
                        // Closing
                        answer.style.maxHeight = answer.scrollHeight + 'px';
                        requestAnimationFrame(function() {
                            answer.style.maxHeight = '0';
                        });
                    } else {
                        // Opening
                        requestAnimationFrame(function() {
                            answer.style.maxHeight = answer.scrollHeight + 'px';
                        });
                    }
                });
            }
        });
    }

    /**
     * Lazy Load Images
     */
    function initLazyLoad() {
        // Native lazy loading support check
        if ('loading' in HTMLImageElement.prototype) {
            const images = document.querySelectorAll('img[loading="lazy"]');
            images.forEach(function(img) {
                if (img.dataset.src) {
                    img.src = img.dataset.src;
                }
            });
        } else {
            // Fallback for older browsers
            const lazyImages = document.querySelectorAll('img[loading="lazy"]');
            
            const imageObserver = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        if (img.dataset.src) {
                            img.src = img.dataset.src;
                        }
                        img.removeAttribute('loading');
                        imageObserver.unobserve(img);
                    }
                });
            });
            
            lazyImages.forEach(function(img) {
                imageObserver.observe(img);
            });
        }
    }

    /**
     * Throttle Function for Performance
     */
    function throttle(func, wait) {
        let timeout
