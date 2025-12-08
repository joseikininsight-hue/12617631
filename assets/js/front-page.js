/**
 * Front Page JavaScript
 * サトー建装 公式Webサイトテーマ
 * 
 * @package     SatoKenso
 * @version     3.0.0
 * @description フロントページ専用スクリプト - パフォーマンス/アクセシビリティ最適化
 */

(function() {
    'use strict';

    /* =========================================================================
       Configuration & State
       ========================================================================= */
    
    const CONFIG = {
        // アニメーション設定
        animation: {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px',
            duration: 500,
            stagger: 100
        },
        // スムーススクロール設定
        smoothScroll: {
            offset: 80,
            duration: 800
        },
        // スライダー設定
        slider: {
            autoplay: true,
            autoplaySpeed: 5000,
            pauseOnHover: true
        },
        // カウンター設定
        counter: {
            duration: 2000,
            easing: 'easeOutQuart'
        },
        // デバウンス/スロットル設定
        debounceDelay: 150,
        throttleDelay: 100
    };

    const STATE = {
        isLoaded: false,
        isMobile: window.innerWidth < 768,
        isReducedMotion: window.matchMedia('(prefers-reduced-motion: reduce)').matches,
        observers: [],
        eventListeners: []
    };

    /* =========================================================================
       Utility Functions
       ========================================================================= */

    /**
     * デバウンス関数
     * @param {Function} func - 実行する関数
     * @param {number} wait - 待機時間（ミリ秒）
     * @returns {Function}
     */
    function debounce(func, wait = CONFIG.debounceDelay) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func.apply(this, args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    /**
     * スロットル関数
     * @param {Function} func - 実行する関数
     * @param {number} limit - 制限時間（ミリ秒）
     * @returns {Function}
     */
    function throttle(func, limit = CONFIG.throttleDelay) {
        let inThrottle;
        return function executedFunction(...args) {
            if (!inThrottle) {
                func.apply(this, args);
                inThrottle = true;
                setTimeout(() => inThrottle = false, limit);
            }
        };
    }

    /**
     * 要素が存在するか確認
     * @param {string} selector - セレクター
     * @returns {boolean}
     */
    function elementExists(selector) {
        return document.querySelector(selector) !== null;
    }

    /**
     * 複数要素を取得
     * @param {string} selector - セレクター
     * @returns {NodeList}
     */
    function getElements(selector) {
        return document.querySelectorAll(selector);
    }

    /**
     * 単一要素を取得
     * @param {string} selector - セレクター
     * @returns {Element|null}
     */
    function getElement(selector) {
        return document.querySelector(selector);
    }

    /**
     * イージング関数
     */
    const Easing = {
        linear: t => t,
        easeInQuad: t => t * t,
        easeOutQuad: t => t * (2 - t),
        easeInOutQuad: t => t < 0.5 ? 2 * t * t : -1 + (4 - 2 * t) * t,
        easeOutQuart: t => 1 - (--t) * t * t * t,
        easeInOutQuart: t => t < 0.5 ? 8 * t * t * t * t : 1 - 8 * (--t) * t * t * t,
        easeOutExpo: t => t === 1 ? 1 : 1 - Math.pow(2, -10 * t)
    };

    /**
     * 数値をフォーマット（カンマ区切り）
     * @param {number} num - 数値
     * @returns {string}
     */
    function formatNumber(num) {
        return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    }

    /**
     * イベントリスナーを安全に追加
     * @param {Element} element - 要素
     * @param {string} event - イベント名
     * @param {Function} handler - ハンドラー
     * @param {Object} options - オプション
     */
    function addEvent(element, event, handler, options = {}) {
        if (element) {
            element.addEventListener(event, handler, options);
            STATE.eventListeners.push({ element, event, handler, options });
        }
    }

    /* =========================================================================
       Scroll Animations (Intersection Observer)
       ========================================================================= */

    /**
     * スクロールアニメーションの初期化
     */
    function initScrollAnimations() {
        // Reduced Motion が有効な場合はアニメーションをスキップ
        if (STATE.isReducedMotion) {
            getElements('.fade-in-up').forEach(el => {
                el.classList.add('is-visible');
            });
            return;
        }

        const observerOptions = {
            threshold: CONFIG.animation.threshold,
            rootMargin: CONFIG.animation.rootMargin
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const element = entry.target;
                    
                    // 遅延を取得（CSS変数から）
                    const delay = getComputedStyle(element).getPropertyValue('--delay') || '0';
                    const delayMs = parseFloat(delay) * 1000;
                    
                    setTimeout(() => {
                        element.classList.add('is-visible');
                    }, delayMs);
                    
                    // 一度表示したら監視を解除
                    observer.unobserve(element);
                }
            });
        }, observerOptions);

        // 監視対象の要素を登録
        getElements('.fade-in-up').forEach(el => {
            observer.observe(el);
        });

        STATE.observers.push(observer);
    }

    /* =========================================================================
       Smooth Scroll
       ========================================================================= */

    /**
     * スムーススクロールの初期化
     */
    function initSmoothScroll() {
        // アンカーリンクを取得
        const anchorLinks = getElements('a[href^="#"]:not([href="#"])');
        
        anchorLinks.forEach(link => {
            addEvent(link, 'click', handleSmoothScroll);
        });
    }

    /**
     * スムーススクロールのハンドラー
     * @param {Event} e - イベントオブジェクト
     */
    function handleSmoothScroll(e) {
        const href = this.getAttribute('href');
        const target = getElement(href);
        
        if (!target) return;
        
        e.preventDefault();
        
        const headerHeight = getElement('.site-header')?.offsetHeight || CONFIG.smoothScroll.offset;
        const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - headerHeight;
        
        // ネイティブのスムーススクロールを使用（Reduced Motionの場合は即座に移動）
        if (STATE.isReducedMotion) {
            window.scrollTo(0, targetPosition);
        } else {
            window.scrollTo({
                top: targetPosition,
                behavior: 'smooth'
            });
        }
        
        // フォーカスを移動（アクセシビリティ）
        target.setAttribute('tabindex', '-1');
        target.focus({ preventScroll: true });
        
        // URL のハッシュを更新
        history.pushState(null, '', href);
    }

    /* =========================================================================
       FAQ Accordion
       ========================================================================= */

    /**
     * FAQアコーディオンの初期化
     */
    function initFAQAccordion() {
        const faqItems = getElements('.faq-item');
        
        if (faqItems.length === 0) return;
        
        faqItems.forEach(item => {
            const summary = item.querySelector('summary');
            
            if (summary) {
                addEvent(summary, 'click', function(e) {
                    handleFAQToggle(e, item, faqItems);
                });
                
                // キーボードアクセシビリティ
                addEvent(summary, 'keydown', function(e) {
                    if (e.key === 'Enter' || e.key === ' ') {
                        e.preventDefault();
                        handleFAQToggle(e, item, faqItems);
                    }
                });
            }
        });
    }

    /**
     * FAQトグルのハンドラー
     * @param {Event} e - イベントオブジェクト
     * @param {Element} currentItem - 現在のアイテム
     * @param {NodeList} allItems - 全アイテム
     */
    function handleFAQToggle(e, currentItem, allItems) {
        // 他のアイテムを閉じる（アコーディオン動作）
        allItems.forEach(item => {
            if (item !== currentItem && item.hasAttribute('open')) {
                // アニメーション付きで閉じる
                if (!STATE.isReducedMotion) {
                    const answer = item.querySelector('.faq-item__answer');
                    if (answer) {
                        answer.style.maxHeight = answer.scrollHeight + 'px';
                        requestAnimationFrame(() => {
                            answer.style.maxHeight = '0';
                            answer.style.opacity = '0';
                        });
                        setTimeout(() => {
                            item.removeAttribute('open');
                            answer.style.maxHeight = '';
                            answer.style.opacity = '';
                        }, 300);
                    }
                } else {
                    item.removeAttribute('open');
                }
            }
        });
    }

    /* =========================================================================
       Hero Section Animations
       ========================================================================= */

    /**
     * ヒーローセクションのアニメーション初期化
     */
    function initHeroAnimations() {
        const hero = getElement('.hero');
        
        if (!hero || STATE.isReducedMotion) return;
        
        // ヒーローコンテンツのアニメーション
        const heroInner = hero.querySelector('.hero__inner');
        if (heroInner) {
            heroInner.classList.add('is-visible');
        }
        
        // パララックス効果（デスクトップのみ）
        if (!STATE.isMobile) {
            initHeroParallax(hero);
        }
    }

    /**
     * ヒーローパララックス効果
     * @param {Element} hero - ヒーロー要素
     */
    function initHeroParallax(hero) {
        const bg = hero.querySelector('.hero__bg');
        
        if (!bg) return;
        
        const handleScroll = throttle(() => {
            const scrolled = window.pageYOffset;
            const heroHeight = hero.offsetHeight;
            
            if (scrolled < heroHeight) {
                const translateY = scrolled * 0.4;
                bg.style.transform = `translateY(${translateY}px) scale(1.1)`;
            }
        }, 16);
        
        addEvent(window, 'scroll', handleScroll, { passive: true });
    }

    /* =========================================================================
       Counter Animation
       ========================================================================= */

    /**
     * カウンターアニメーションの初期化
     */
    function initCounterAnimations() {
        const counters = getElements('[data-counter]');
        
        if (counters.length === 0) return;
        
        const observerOptions = {
            threshold: 0.5
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    animateCounter(counter);
                    observer.unobserve(counter);
                }
            });
        }, observerOptions);
        
        counters.forEach(counter => observer.observe(counter));
        STATE.observers.push(observer);
    }

    /**
     * カウンターをアニメーション
     * @param {Element} element - カウンター要素
     */
    function animateCounter(element) {
        const target = parseInt(element.dataset.counter, 10);
        const duration = CONFIG.counter.duration;
        const startTime = performance.now();
        const startValue = 0;
        
        if (STATE.isReducedMotion) {
            element.textContent = formatNumber(target);
            return;
        }
        
        function updateCounter(currentTime) {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);
            const easedProgress = Easing[CONFIG.counter.easing](progress);
            const currentValue = Math.floor(startValue + (target - startValue) * easedProgress);
            
            element.textContent = formatNumber(currentValue);
            
            if (progress < 1) {
                requestAnimationFrame(updateCounter);
            } else {
                element.textContent = formatNumber(target);
            }
        }
        
        requestAnimationFrame(updateCounter);
    }

    /* =========================================================================
       Voice Slider (if using Slick)
       ========================================================================= */

    /**
     * お客様の声スライダーの初期化
     */
    function initVoiceSlider() {
        const voiceSlider = getElement('.voice__slider');
        
        if (!voiceSlider) return;
        
        // Slickスライダーが読み込まれているか確認
        if (typeof jQuery !== 'undefined' && typeof jQuery.fn.slick !== 'undefined') {
            initSlickSlider(voiceSlider);
        } else {
            // Slickがない場合はシンプルなスクロールスナップを使用
            initSimpleSlider(voiceSlider);
        }
    }

    /**
     * Slickスライダーの初期化
     * @param {Element} container - コンテナ要素
     */
    function initSlickSlider(container) {
        const $slider = jQuery(container);
        
        // グリッドレイアウトを解除
        container.style.display = 'block';
        
        $slider.slick({
            dots: true,
            arrows: true,
            infinite: true,
            speed: 500,
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: CONFIG.slider.autoplay && !STATE.isReducedMotion,
            autoplaySpeed: CONFIG.slider.autoplaySpeed,
            pauseOnHover: CONFIG.slider.pauseOnHover,
            adaptiveHeight: false,
            prevArrow: '<button type="button" class="slick-prev" aria-label="前へ"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="15 18 9 12 15 6"></polyline></svg></button>',
            nextArrow: '<button type="button" class="slick-next" aria-label="次へ"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"></polyline></svg></button>',
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 640,
                    settings: {
                        slidesToShow: 1,
                        arrows: false
                    }
                }
            ]
        });
    }

    /**
     * シンプルなスライダー（フォールバック）
     * @param {Element} container - コンテナ要素
     */
    function initSimpleSlider(container) {
        // CSSのスクロールスナップを活用するため、追加のJSは不要
        // 必要に応じてナビゲーションボタンを追加
        container.style.overflowX = 'auto';
        container.style.scrollSnapType = 'x mandatory';
        container.style.display = 'flex';
        container.style.gap = '1.5rem';
        
        const cards = container.querySelectorAll('.voice-card');
        cards.forEach(card => {
            card.style.scrollSnapAlign = 'start';
            card.style.flexShrink = '0';
            card.style.width = STATE.isMobile ? '85%' : 'calc(33.333% - 1rem)';
        });
    }

    /* =========================================================================
       Works Load More (AJAX)
       ========================================================================= */

    /**
     * 施工実績「もっと見る」機能の初期化
     */
    function initWorksLoadMore() {
        const loadMoreBtn = getElement('#load-more-works');
        
        if (!loadMoreBtn) return;
        
        addEvent(loadMoreBtn, 'click', handleLoadMoreWorks);
    }

    /**
     * 施工実績読み込みハンドラー
     * @param {Event} e - イベントオブジェクト
     */
    async function handleLoadMoreWorks(e) {
        e.preventDefault();
        
        const button = e.currentTarget;
        const page = parseInt(button.dataset.page, 10) || 1;
        const nextPage = page + 1;
        
        // ローディング状態
        button.classList.add('is-loading');
        button.disabled = true;
        const originalText = button.innerHTML;
        button.innerHTML = '<span class="spinner"></span> 読み込み中...';
        
        try {
            const response = await fetch(satoSite.ajaxUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: new URLSearchParams({
                    action: 'sato_load_more_works',
                    nonce: satoSite.nonce,
                    page: nextPage
                })
            });
            
            const data = await response.json();
            
            if (data.success && data.data.html) {
                const worksGrid = getElement('.works__grid');
                
                if (worksGrid) {
                    // 新しい要素を追加
                    const tempContainer = document.createElement('div');
                    tempContainer.innerHTML = data.data.html;
                    
                    const newCards = tempContainer.querySelectorAll('.works-card');
                    newCards.forEach((card, index) => {
                        card.style.setProperty('--delay', (index * 0.1).toString());
                        card.classList.add('fade-in-up');
                        worksGrid.appendChild(card);
                        
                        // アニメーション実行
                        requestAnimationFrame(() => {
                            setTimeout(() => {
                                card.classList.add('is-visible');
                            }, index * 100);
                        });
                    });
                    
                    // ページ番号を更新
                    button.dataset.page = nextPage;
                    
                    // もう投稿がない場合はボタンを非表示
                    if (!data.data.hasMore) {
                        button.style.display = 'none';
                    }
                }
            }
        } catch (error) {
            console.error('Works load error:', error);
            showNotification('読み込みに失敗しました。もう一度お試しください。', 'error');
        } finally {
            // ローディング状態を解除
            button.classList.remove('is-loading');
            button.disabled = false;
            button.innerHTML = originalText;
        }
    }

    /* =========================================================================
       Lazy Loading Images
       ========================================================================= */

    /**
     * 画像の遅延読み込み初期化
     */
    function initLazyLoad() {
        // ネイティブの lazy loading をサポートしていないブラウザ用
        if ('loading' in HTMLImageElement.prototype) {
            // ネイティブサポートあり - 何もしない
            return;
        }
        
        // フォールバック: Intersection Observer を使用
        const lazyImages = getElements('img[loading="lazy"]');
        
        if (lazyImages.length === 0) return;
        
        const imageObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    
                    if (img.dataset.src) {
                        img.src = img.dataset.src;
                        img.removeAttribute('data-src');
                    }
                    
                    img.classList.add('is-loaded');
                    imageObserver.unobserve(img);
                }
            });
        }, {
            rootMargin: '50px 0px'
        });
        
        lazyImages.forEach(img => imageObserver.observe(img));
        STATE.observers.push(imageObserver);
    }

    /* =========================================================================
       Header Scroll Effect
       ========================================================================= */

    /**
     * ヘッダースクロール効果の初期化
     */
    function initHeaderScroll() {
        const header = getElement('.site-header');
        
        if (!header) return;
        
        let lastScrollY = 0;
        const scrollThreshold = 100;
        
        const handleScroll = throttle(() => {
            const currentScrollY = window.pageYOffset;
            
            // スクロール方向を検出
            if (currentScrollY > scrollThreshold) {
                header.classList.add('is-scrolled');
                
                if (currentScrollY > lastScrollY && currentScrollY > 300) {
                    // 下スクロール - ヘッダーを隠す
                    header.classList.add('is-hidden');
                } else {
                    // 上スクロール - ヘッダーを表示
                    header.classList.remove('is-hidden');
                }
            } else {
                header.classList.remove('is-scrolled', 'is-hidden');
            }
            
            lastScrollY = currentScrollY;
        }, 100);
        
        addEvent(window, 'scroll', handleScroll, { passive: true });
    }

    /* =========================================================================
       Mobile Menu
       ========================================================================= */

    /**
     * モバイルメニューの初期化
     */
    function initMobileMenu() {
        const menuToggle = getElement('.mobile-menu-toggle');
        const mobileMenu = getElement('.mobile-menu');
        const menuOverlay = getElement('.mobile-menu-overlay');
        
        if (!menuToggle || !mobileMenu) return;
        
        // トグルボタンのクリック
        addEvent(menuToggle, 'click', () => {
            toggleMobileMenu(menuToggle, mobileMenu, menuOverlay);
        });
        
        // オーバーレイのクリック
        if (menuOverlay) {
            addEvent(menuOverlay, 'click', () => {
                closeMobileMenu(menuToggle, mobileMenu, menuOverlay);
            });
        }
        
        // メニュー内リンクのクリック
        const menuLinks = mobileMenu.querySelectorAll('a');
        menuLinks.forEach(link => {
            addEvent(link, 'click', () => {
                closeMobileMenu(menuToggle, mobileMenu, menuOverlay);
            });
        });
        
        // ESCキーで閉じる
        addEvent(document, 'keydown', (e) => {
            if (e.key === 'Escape' && mobileMenu.classList.contains('is-open')) {
                closeMobileMenu(menuToggle, mobileMenu, menuOverlay);
            }
        });
    }

    /**
     * モバイルメニューのトグル
     */
    function toggleMobileMenu(toggle, menu, overlay) {
        const isOpen = menu.classList.contains('is-open');
        
        if (isOpen) {
            closeMobileMenu(toggle, menu, overlay);
        } else {
            openMobileMenu(toggle, menu, overlay);
        }
    }

    /**
     * モバイルメニューを開く
     */
    function openMobileMenu(toggle, menu, overlay) {
        toggle.classList.add('is-active');
        toggle.setAttribute('aria-expanded', 'true');
        menu.classList.add('is-open');
        if (overlay) overlay.classList.add('is-visible');
        document.body.style.overflow = 'hidden';
        
        // フォーカストラップ
        const firstFocusable = menu.querySelector('a, button');
        if (firstFocusable) firstFocusable.focus();
    }

    /**
     * モバイルメニューを閉じる
     */
    function closeMobileMenu(toggle, menu, overlay) {
        toggle.classList.remove('is-active');
        toggle.setAttribute('aria-expanded', 'false');
        menu.classList.remove('is-open');
        if (overlay) overlay.classList.remove('is-visible');
        document.body.style.overflow = '';
        toggle.focus();
    }

    /* =========================================================================
       Phone Number Click Tracking
       ========================================================================= */

    /**
     * 電話番号クリックトラッキングの初期化
     */
    function initPhoneTracking() {
        const phoneLinks = getElements('a[href^="tel:"]');
        
        phoneLinks.forEach(link => {
            addEvent(link, 'click', () => {
                // Google Analytics イベント送信
                if (typeof gtag !== 'undefined') {
                    gtag('event', 'click', {
                        event_category: 'Contact',
                        event_label: 'Phone Call',
                        value: link.href.replace('tel:', '')
                    });
                }
                
                // Google Tag Manager イベント送信
                if (typeof dataLayer !== 'undefined') {
                    dataLayer.push({
                        event: 'phone_click',
                        phone_number: link.href.replace('tel:', '')
                    });
                }
            });
        });
    }

    /* =========================================================================
       CTA Button Tracking
       ========================================================================= */

    /**
     * CTAボタントラッキングの初期化
     */
    function initCTATracking() {
        const ctaButtons = getElements('.btn--accent, .btn--primary');
        
        ctaButtons.forEach(button => {
            addEvent(button, 'click', () => {
                const buttonText = button.textContent.trim();
                const buttonHref = button.getAttribute('href') || '';
                
                // Google Analytics
                if (typeof gtag !== 'undefined') {
                    gtag('event', 'click', {
                        event_category: 'CTA',
                        event_label: buttonText,
                        value: buttonHref
                    });
                }
                
                // Google Tag Manager
                if (typeof dataLayer !== 'undefined') {
                    dataLayer.push({
                        event: 'cta_click',
                        cta_text: buttonText,
                        cta_url: buttonHref
                    });
                }
            });
        });
    }

    /* =========================================================================
       Notification System
       ========================================================================= */

    /**
     * 通知を表示
     * @param {string} message - メッセージ
     * @param {string} type - タイプ（success, error, warning, info）
     * @param {number} duration - 表示時間（ミリ秒）
     */
    function showNotification(message, type = 'info', duration = 5000) {
        const container = getOrCreateNotificationContainer();
        
        const notification = document.createElement('div');
        notification.className = `notification notification--${type}`;
        notification.setAttribute('role', 'alert');
        notification.innerHTML = `
            <span class="notification__message">${message}</span>
            <button class="notification__close" aria-label="閉じる">&times;</button>
        `;
        
        container.appendChild(notification);
        
        // 表示アニメーション
        requestAnimationFrame(() => {
            notification.classList.add('is-visible');
        });
        
        // 閉じるボタン
        const closeBtn = notification.querySelector('.notification__close');
        addEvent(closeBtn, 'click', () => {
            removeNotification(notification);
        });
        
        // 自動で閉じる
        if (duration > 0) {
            setTimeout(() => {
                removeNotification(notification);
            }, duration);
        }
    }

    /**
     * 通知を削除
     * @param {Element} notification - 通知要素
     */
    function removeNotification(notification) {
        notification.classList.remove('is-visible');
        notification.classList.add('is-hiding');
        
        setTimeout(() => {
            notification.remove();
        }, 300);
    }

    /**
     * 通知コンテナを取得または作成
     * @returns {Element}
     */
    function getOrCreateNotificationContainer() {
        let container = getElement('.notification-container');
        
        if (!container) {
            container = document.createElement('div');
            container.className = 'notification-container';
            container.setAttribute('aria-live', 'polite');
            document.body.appendChild(container);
        }
        
        return container;
    }

    /* =========================================================================
       Scroll to Top Button
       ========================================================================= */

    /**
     * トップへ戻るボタンの初期化
     */
    function initScrollToTop() {
        const scrollToTopBtn = getElement('.scroll-to-top');
        
        if (!scrollToTopBtn) {
            createScrollToTopButton();
            return;
        }
        
        setupScrollToTopButton(scrollToTopBtn);
    }

    /**
     * トップへ戻るボタンを作成
     */
    function createScrollToTopButton() {
        const button = document.createElement('button');
        button.className = 'scroll-to-top';
        button.setAttribute('aria-label', 'ページトップへ戻る');
        button.innerHTML = `
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <polyline points="18 15 12 9 6 15"></polyline>
            </svg>
        `;
        
        document.body.appendChild(button);
        setupScrollToTopButton(button);
    }

    /**
     * トップへ戻るボタンの設定
     * @param {Element} button - ボタン要素
     */
    function setupScrollToTopButton(button) {
        // スクロール位置に応じて表示/非表示
        const handleScroll = throttle(() => {
            if (window.pageYOffset > 500) {
                button.classList.add('is-visible');
            } else {
                button.classList.remove('is-visible');
            }
        }, 100);
        
        addEvent(window, 'scroll', handleScroll, { passive: true });
        
        // クリックでトップへスクロール
        addEvent(button, 'click', () => {
            if (STATE.isReducedMotion) {
                window.scrollTo(0, 0);
            } else {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            }
        });
    }

    /* =========================================================================
       Form Validation Enhancement
       ========================================================================= */

    /**
     * フォームバリデーションの強化
     */
    function initFormValidation() {
        const forms = getElements('form[data-validate]');
        
        forms.forEach(form => {
            const inputs = form.querySelectorAll('input, textarea, select');
            
            inputs.forEach(input => {
                // リアルタイムバリデーション
                addEvent(input, 'blur', () => validateInput(input));
                addEvent(input, 'input', debounce(() => validateInput(input), 300));
            });
            
            // 送信時のバリデーション
            addEvent(form, 'submit', (e) => {
                let isValid = true;
                
                inputs.forEach(input => {
                    if (!validateInput(input)) {
                        isValid = false;
                    }
                });
                
                if (!isValid) {
                    e.preventDefault();
                    const firstError = form.querySelector('.is-invalid');
                    if (firstError) firstError.focus();
                }
            });
        });
    }

    /**
     * 入力フィールドをバリデート
     * @param {Element} input - 入力要素
     * @returns {boolean}
     */
    function validateInput(input) {
        const value = input.value.trim();
        const isRequired = input.hasAttribute('required');
        const type = input.type;
        let isValid = true;
        let errorMessage = '';
        
        // 必須チェック
        if (isRequired && !value) {
            isValid = false;
            errorMessage = 'この項目は必須です';
        }
        
        // メールチェック
        if (isValid && type === 'email' && value) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(value)) {
                isValid = false;
                errorMessage = '正しいメールアドレスを入力してください';
            }
        }
        
        // 電話番号チェック
        if (isValid && type === 'tel' && value) {
            const telRegex = /^[0-9\-]+$/;
            if (!telRegex.test(value)) {
                isValid = false;
                errorMessage = '正しい電話番号を入力してください';
            }
        }
        
        // エラー表示
        updateInputValidation(input, isValid, errorMessage);
        
        return isValid;
    }

    /**
     * 入力フィールドのバリデーション状態を更新
     * @param {Element} input - 入力要素
     * @param {boolean} isValid - 有効かどうか
     * @param {string} errorMessage - エラーメッセージ
     */
    function updateInputValidation(input, isValid, errorMessage) {
        const wrapper = input.closest('.form-group') || input.parentElement;
        let errorEl = wrapper.querySelector('.form-error');
        
        if (isValid) {
            input.classList.remove('is-invalid');
            input.classList.add('is-valid');
            if (errorEl) errorEl.remove();
        } else {
            input.classList.add('is-invalid');
            input.classList.remove('is-valid');
            
            if (!errorEl) {
                errorEl = document.createElement('span');
                errorEl.className = 'form-error';
                errorEl.setAttribute('role', 'alert');
                wrapper.appendChild(errorEl);
            }
            
            errorEl.textContent = errorMessage;
        }
    }

    /* =========================================================================
       Performance Monitoring
       ========================================================================= */

    /**
     * パフォーマンス監視
     */
    function initPerformanceMonitoring() {
        // Core Web Vitals の計測（開発時のみ）
        if (process.env.NODE_ENV === 'development' || window.location.search.includes('debug')) {
            if ('PerformanceObserver' in window) {
                // LCP (Largest Contentful Paint)
                try {
                    const lcpObserver = new PerformanceObserver((entryList) => {
                        const entries = entryList.getEntries();
                        const lastEntry = entries[entries.length - 1];
                        console.log('LCP:', lastEntry.renderTime || lastEntry.loadTime);
                    });
                    lcpObserver.observe({ entryTypes: ['largest-contentful-paint'] });
                } catch (e) {}
                
                // FID (First Input Delay)
                try {
                    const fidObserver = new PerformanceObserver((entryList) => {
                        const entries = entryList.getEntries();
                        entries.forEach(entry => {
                            console.log('FID:', entry.processingStart - entry.startTime);
                        });
                    });
                    fidObserver.observe({ entryTypes: ['first-input'] });
                } catch (e) {}
                
                // CLS (Cumulative Layout Shift)
                try {
                    let clsValue = 0;
                    const clsObserver = new PerformanceObserver((entryList) => {
                        const entries = entryList.getEntries();
                        entries.forEach(entry => {
                            if (!entry.hadRecentInput) {
                                clsValue += entry.value;
                            }
                        });
                        console.log('CLS:', clsValue);
                    });
                    clsObserver.observe({ entryTypes: ['layout-shift'] });
                } catch (e) {}
            }
        }
    }

    /* =========================================================================
       GSAP Animations (if available)
       ========================================================================= */

    /**
     * GSAPアニメーションの初期化
     */
    function initGSAPAnimations() {
        if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') {
            return;
        }
        
        if (STATE.isReducedMotion) {
            return;
        }
        
        // GSAPプラグインを登録
        gsap.registerPlugin(ScrollTrigger);
        
        // セクションタイトルのアニメーション
        gsap.utils.toArray('.section__title').forEach(title => {
            gsap.from(title, {
                scrollTrigger: {
                    trigger: title,
                    start: 'top 80%',
                    toggleActions: 'play none none none'
                },
                y: 50,
                opacity: 0,
                duration: 0.8,
                ease: 'power3.out'
            });
        });
        
        // カードのスタガーアニメーション
        const cardGrids = ['.problems__grid', '.services__grid', '.works__grid', '.news__grid'];
        
        cardGrids.forEach(gridSelector => {
            const grid = getElement(gridSelector);
            if (!grid) return;
            
            const cards = grid.children;
            
            gsap.from(cards, {
                scrollTrigger: {
                    trigger: grid,
                    start: 'top 80%',
                    toggleActions: 'play none none none'
                },
                y: 60,
                opacity: 0,
                duration: 0.6,
                stagger: 0.1,
                ease: 'power3.out'
            });
        });
        
        // 理由カードのアニメーション
        gsap.utils.toArray('.reason-card').forEach((card, index) => {
            const image = card.querySelector('.reason-card__image');
            const content = card.querySelector('.reason-card__content');
            const isReverse = card.classList.contains('reason-card--reverse');
            
            const tl = gsap.timeline({
                scrollTrigger: {
                    trigger: card,
                    start: 'top 70%',
                    toggleActions: 'play none none none'
                }
            });
            
            tl.from(image, {
                x: isReverse ? 100 : -100,
                opacity: 0,
                duration: 0.8,
                ease: 'power3.out'
            })
            .from(content, {
                x: isReverse ? -100 : 100,
                opacity: 0,
                duration: 0.8,
                ease: 'power3.out'
            }, '-=0.6');
        });
        
        // フローのタイムラインアニメーション
        gsap.utils.toArray('.flow-step').forEach((step, index) => {
            gsap.from(step, {
                scrollTrigger: {
                    trigger: step,
                    start: 'top 80%',
                    toggleActions: 'play none none none'
                },
                x: -50,
                opacity: 0,
                duration: 0.6,
                delay: index * 0.1,
                ease: 'power3.out'
            });
        });
    }

    /* =========================================================================
       Cleanup & Destroy
       ========================================================================= */

    /**
     * クリーンアップ処理
     */
    function cleanup() {
        // Observers を解除
        STATE.observers.forEach(observer => {
            if (observer && observer.disconnect) {
                observer.disconnect();
            }
        });
        STATE.observers = [];
        
        // Event Listeners を解除
        STATE.eventListeners.forEach(({ element, event, handler, options }) => {
            if (element) {
                element.removeEventListener(event, handler, options);
            }
        });
        STATE.eventListeners = [];
    }

    /* =========================================================================
       Initialization
       ========================================================================= */

    /**
     * メイン初期化関数
     */
    function init() {
        // すでに初期化済みの場合はスキップ
        if (STATE.isLoaded) return;
        
        // Reduced Motion の設定を監視
        const motionQuery = window.matchMedia('(prefers-reduced-motion: reduce)');
        motionQuery.addEventListener('change', () => {
            STATE.isReducedMotion = motionQuery.matches;
        });
        
        // リサイズ監視
        addEvent(window, 'resize', debounce(() => {
            STATE.isMobile = window.innerWidth < 768;
        }, 250));
        
        // 各機能を初期化
        try {
            initScrollAnimations();
            initSmoothScroll();
            initFAQAccordion();
            initHeroAnimations();
            initCounterAnimations();
            initVoiceSlider();
            initWorksLoadMore();
            initLazyLoad();
            initHeaderScroll();
            initMobileMenu();
            initScrollToTop();
            initPhoneTracking();
            initCTATracking();
            initFormValidation();
            initGSAPAnimations();
            
            // 開発モードでのみパフォーマンス監視
            if (window.location.hostname === 'localhost' || window.location.search.includes('debug')) {
                initPerformanceMonitoring();
            }
        } catch (error) {
            console.error('Front page initialization error:', error);
        }
        
        STATE.isLoaded = true;
        
        // 初期化完了イベントを発火
        document.dispatchEvent(new CustomEvent('satoFrontPageReady'));
    }

    /**
     * DOM読み込み完了時に初期化
     */
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

    /**
     * ページ離脱時にクリーンアップ
     */
    window.addEventListener('beforeunload', cleanup);

    /* =========================================================================
       Public API
       ========================================================================= */

    /**
     * グローバルに公開するAPI
     */
    window.SatoFrontPage = {
        init: init,
        cleanup: cleanup,
        showNotification: showNotification,
        getState: () => ({ ...STATE }),
        getConfig: () => ({ ...CONFIG })
    };

})();
