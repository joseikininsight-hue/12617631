<?php
/**
 * Header Template
 * 
 * サトー建装 - プレミアムヘッダー
 * スティッキーヘッダー、メガメニュー、モバイルドロワー対応
 * 
 * @package Sato_Kenso
 * @version 2.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

// 会社情報取得
$company_name   = sato_get_company_name();
$phone          = sato_get_phone();
$phone_link     = sato_get_phone_link();
$line_url       = sato_get_line_url();
$business_hours = get_theme_mod('sato_business_hours', '8:00〜18:00');
$holiday_text   = get_theme_mod('sato_holiday', '日曜・祝日');

// ページ判定
$is_front       = is_front_page();
$is_transparent = $is_front; // フロントページでは透過ヘッダー
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- Preconnect for performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- Favicon -->
    <?php if (has_site_icon()) : ?>
        <?php wp_site_icon(); ?>
    <?php else : ?>
        <link rel="icon" type="image/svg+xml" href="<?php echo SATO_THEME_URI; ?>/assets/images/favicon.svg">
    <?php endif; ?>
    
    <?php wp_head(); ?>
</head>

<body <?php body_class($is_transparent ? 'has-transparent-header' : ''); ?>>
<?php wp_body_open(); ?>

<!-- Skip Link for Accessibility -->
<a href="#main" class="skip-link"><?php esc_html_e('メインコンテンツへスキップ', 'sato-kenso'); ?></a>

<!-- =========================================================================
     HEADER
     ========================================================================= -->
<header id="site-header" class="site-header <?php echo $is_transparent ? 'site-header--transparent' : ''; ?>" role="banner">
    
    <!-- Top Bar (PC Only) -->
    <div class="header-topbar">
        <div class="container header-topbar__inner">
            <div class="header-topbar__left">
                <span class="header-topbar__info">
                    <?php sato_icon('clock', 14); ?>
                    <span><?php echo esc_html($business_hours); ?>（<?php echo esc_html($holiday_text); ?>休）</span>
                </span>
                <span class="header-topbar__info">
                    <?php sato_icon('map-pin', 14); ?>
                    <span>御殿場市・裾野市・静岡県東部対応</span>
                </span>
            </div>
            <div class="header-topbar__right">
                <?php if ($line_url) : ?>
                <a href="<?php echo esc_url($line_url); ?>" class="header-topbar__link header-topbar__link--line" target="_blank" rel="noopener noreferrer">
                    <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M19.365 9.863c.349 0 .63.285.63.631 0 .345-.281.63-.63.63H17.61v1.125h1.755c.349 0 .63.283.63.63 0 .344-.281.629-.63.629h-2.386c-.345 0-.627-.285-.627-.629V8.108c0-.345.282-.63.627-.63h2.386c.349 0 .63.285.63.63 0 .349-.281.63-.63.63H17.61v1.125h1.755zm-3.855 3.016c0 .27-.174.51-.432.596-.064.021-.133.031-.199.031-.211 0-.391-.09-.51-.25l-2.443-3.317v2.94c0 .344-.279.629-.631.629-.346 0-.626-.285-.626-.629V8.108c0-.27.173-.51.43-.595.06-.023.136-.033.194-.033.195 0 .375.104.495.254l2.462 3.33V8.108c0-.345.282-.63.63-.63.345 0 .63.285.63.63v4.771zm-5.741 0c0 .344-.282.629-.631.629-.345 0-.627-.285-.627-.629V8.108c0-.345.282-.63.627-.63.349 0 .631.285.631.63v4.771zm-2.466.629H4.917c-.345 0-.63-.285-.63-.629V8.108c0-.345.285-.63.63-.63.349 0 .63.285.63.63v4.141h1.756c.348 0 .629.283.629.63 0 .344-.281.629-.629.629M24 10.314C24 4.943 18.615.572 12 .572S0 4.943 0 10.314c0 4.811 4.27 8.842 10.035 9.608.391.082.923.258 1.058.59.12.301.079.766.038 1.08l-.164 1.02c-.045.301-.24 1.186 1.049.645 1.291-.539 6.916-4.078 9.436-6.975C23.176 14.393 24 12.458 24 10.314"/></svg>
                    LINE相談
                </a>
                <?php endif; ?>
                
                <!-- SNSリンク -->
                <?php
                $instagram = get_theme_mod('sato_instagram', '');
                $facebook = get_theme_mod('sato_facebook', '');
                if ($instagram || $facebook) :
                ?>
                <div class="header-topbar__social">
                    <?php if ($instagram) : ?>
                    <a href="<?php echo esc_url($instagram); ?>" class="header-topbar__social-link" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                        <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                    <?php endif; ?>
                    <?php if ($facebook) : ?>
                    <a href="<?php echo esc_url($facebook); ?>" class="header-topbar__social-link" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                        <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Main Header -->
    <div class="header-main">
        <div class="container header-main__inner">
            
            <!-- Logo -->
            <div class="header-logo">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="header-logo__link" rel="home">
                        <span class="header-logo__text"><?php echo esc_html($company_name); ?></span>
                        <span class="header-logo__tagline">外壁塗装・屋根塗装専門店</span>
                    </a>
                <?php endif; ?>
            </div>

            <!-- Desktop Navigation -->
            <nav class="header-nav" role="navigation" aria-label="メインナビゲーション">
                <?php
                if (has_nav_menu('primary')) {
                    wp_nav_menu([
                        'theme_location' => 'primary',
                        'menu_class'     => 'header-nav__list',
                        'container'      => false,
                        'fallback_cb'    => false,
                        'depth'          => 2,
                        'walker'         => new Sato_Nav_Walker(),
                    ]);
                } else {
                    // デフォルトメニュー
                    ?>
                    <ul class="header-nav__list">
                        <li class="header-nav__item">
                            <a href="<?php echo esc_url(home_url('/')); ?>" class="header-nav__link <?php echo $is_front ? 'is-current' : ''; ?>">
                                <span>ホーム</span>
                            </a>
                        </li>
                        <li class="header-nav__item header-nav__item--has-children">
                            <a href="<?php echo esc_url(home_url('/service/')); ?>" class="header-nav__link">
                                <span>サービス</span>
                                <?php sato_icon('chevron-down', 14); ?>
                            </a>
                            <ul class="header-nav__submenu">
                                <li><a href="<?php echo esc_url(home_url('/service/exterior/')); ?>">外壁塗装</a></li>
                                <li><a href="<?php echo esc_url(home_url('/service/roof/')); ?>">屋根塗装</a></li>
                                <li><a href="<?php echo esc_url(home_url('/service/waterproof/')); ?>">防水工事</a></li>
                                <li><a href="<?php echo esc_url(home_url('/service/repair/')); ?>">補修・修繕</a></li>
                            </ul>
                        </li>
                        <li class="header-nav__item">
                            <a href="<?php echo esc_url(home_url('/works/')); ?>" class="header-nav__link <?php echo is_post_type_archive('works') || is_singular('works') ? 'is-current' : ''; ?>">
                                <span>施工事例</span>
                            </a>
                        </li>
                        <li class="header-nav__item">
                            <a href="<?php echo esc_url(home_url('/price/')); ?>" class="header-nav__link">
                                <span>料金案内</span>
                            </a>
                        </li>
                        <li class="header-nav__item">
                            <a href="<?php echo esc_url(home_url('/voice/')); ?>" class="header-nav__link <?php echo is_post_type_archive('voice') || is_singular('voice') ? 'is-current' : ''; ?>">
                                <span>お客様の声</span>
                            </a>
                        </li>
                        <li class="header-nav__item">
                            <a href="<?php echo esc_url(home_url('/company/')); ?>" class="header-nav__link">
                                <span>会社案内</span>
                            </a>
                        </li>
                        <li class="header-nav__item">
                            <a href="<?php echo esc_url(home_url('/faq/')); ?>" class="header-nav__link <?php echo is_post_type_archive('faq') || is_singular('faq') ? 'is-current' : ''; ?>">
                                <span>よくある質問</span>
                            </a>
                        </li>
                    </ul>
                    <?php
                }
                ?>
            </nav>

            <!-- Header Actions (PC) -->
            <div class="header-actions">
                <a href="<?php echo esc_attr($phone_link); ?>" class="header-phone">
                    <span class="header-phone__icon">
                        <?php sato_icon('phone', 20); ?>
                    </span>
                    <span class="header-phone__content">
                        <span class="header-phone__label">お電話でのご相談</span>
                        <span class="header-phone__number"><?php echo esc_html($phone); ?></span>
                    </span>
                </a>
                
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn--primary btn--header">
                    <?php sato_icon('mail', 18); ?>
                    <span>無料相談</span>
                </a>
            </div>

            <!-- Mobile Menu Toggle -->
            <button type="button" class="header-toggle" id="mobile-menu-toggle" aria-expanded="false" aria-controls="mobile-menu" aria-label="メニューを開く">
                <span class="header-toggle__bar"></span>
                <span class="header-toggle__bar"></span>
                <span class="header-toggle__bar"></span>
            </button>
        </div>
    </div>
</header>

<!-- =========================================================================
     MOBILE MENU (Drawer)
     ========================================================================= -->
<div class="mobile-menu" id="mobile-menu" aria-hidden="true">
    <div class="mobile-menu__overlay" data-close-menu></div>
    
    <div class="mobile-menu__drawer">
        <!-- Drawer Header -->
        <div class="mobile-menu__header">
            <div class="mobile-menu__logo">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <span class="mobile-menu__logo-text"><?php echo esc_html($company_name); ?></span>
                <?php endif; ?>
            </div>
            <button type="button" class="mobile-menu__close" data-close-menu aria-label="メニューを閉じる">
                <?php sato_icon('close', 24); ?>
            </button>
        </div>

        <!-- Drawer Content -->
        <div class="mobile-menu__content">
            <!-- Navigation -->
            <nav class="mobile-menu__nav" role="navigation" aria-label="モバイルナビゲーション">
                <?php
                if (has_nav_menu('mobile')) {
                    wp_nav_menu([
                        'theme_location' => 'mobile',
                        'menu_class'     => 'mobile-menu__list',
                        'container'      => false,
                        'fallback_cb'    => false,
                        'depth'          => 2,
                    ]);
                } else {
                    // デフォルトモバイルメニュー
                    ?>
                    <ul class="mobile-menu__list">
                        <li class="mobile-menu__item">
                            <a href="<?php echo esc_url(home_url('/')); ?>" class="mobile-menu__link">
                                <?php sato_icon('home', 20); ?>
                                <span>ホーム</span>
                            </a>
                        </li>
                        <li class="mobile-menu__item mobile-menu__item--has-children">
                            <button type="button" class="mobile-menu__link mobile-menu__toggle-sub" aria-expanded="false">
                                <?php sato_icon('tool', 20); ?>
                                <span>サービス</span>
                                <?php sato_icon('chevron-down', 18); ?>
                            </button>
                            <ul class="mobile-menu__submenu">
                                <li><a href="<?php echo esc_url(home_url('/service/exterior/')); ?>">外壁塗装</a></li>
                                <li><a href="<?php echo esc_url(home_url('/service/roof/')); ?>">屋根塗装</a></li>
                                <li><a href="<?php echo esc_url(home_url('/service/waterproof/')); ?>">防水工事</a></li>
                                <li><a href="<?php echo esc_url(home_url('/service/repair/')); ?>">補修・修繕</a></li>
                            </ul>
                        </li>
                        <li class="mobile-menu__item">
                            <a href="<?php echo esc_url(home_url('/works/')); ?>" class="mobile-menu__link">
                                <?php sato_icon('image', 20); ?>
                                <span>施工事例</span>
                            </a>
                        </li>
                        <li class="mobile-menu__item">
                            <a href="<?php echo esc_url(home_url('/price/')); ?>" class="mobile-menu__link">
                                <?php sato_icon('certificate', 20); ?>
                                <span>料金案内</span>
                            </a>
                        </li>
                        <li class="mobile-menu__item">
                            <a href="<?php echo esc_url(home_url('/voice/')); ?>" class="mobile-menu__link">
                                <?php sato_icon('award', 20); ?>
                                <span>お客様の声</span>
                            </a>
                        </li>
                        <li class="mobile-menu__item">
                            <a href="<?php echo esc_url(home_url('/company/')); ?>" class="mobile-menu__link">
                                <?php sato_icon('home', 20); ?>
                                <span>会社案内</span>
                            </a>
                        </li>
                        <li class="mobile-menu__item">
                            <a href="<?php echo esc_url(home_url('/faq/')); ?>" class="mobile-menu__link">
                                <?php sato_icon('info', 20); ?>
                                <span>よくある質問</span>
                            </a>
                        </li>
                        <li class="mobile-menu__item">
                            <a href="<?php echo esc_url(home_url('/news/')); ?>" class="mobile-menu__link">
                                <?php sato_icon('calendar', 20); ?>
                                <span>お知らせ</span>
                            </a>
                        </li>
                    </ul>
                    <?php
                }
                ?>
            </nav>

            <!-- CTA Buttons -->
            <div class="mobile-menu__cta">
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn--primary btn--block btn--lg">
                    <?php sato_icon('mail', 20); ?>
                    無料お見積り・相談
                </a>
                
                <?php if ($line_url) : ?>
                <a href="<?php echo esc_url($line_url); ?>" class="btn btn--line btn--block" target="_blank" rel="noopener noreferrer">
                    <svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor"><path d="M19.365 9.863c.349 0 .63.285.63.631 0 .345-.281.63-.63.63H17.61v1.125h1.755c.349 0 .63.283.63.63 0 .344-.281.629-.63.629h-2.386c-.345 0-.627-.285-.627-.629V8.108c0-.345.282-.63.627-.63h2.386c.349 0 .63.285.63.63 0 .349-.281.63-.63.63H17.61v1.125h1.755zm-3.855 3.016c0 .27-.174.51-.432.596-.064.021-.133.031-.199.031-.211 0-.391-.09-.51-.25l-2.443-3.317v2.94c0 .344-.279.629-.631.629-.346 0-.626-.285-.626-.629V8.108c0-.27.173-.51.43-.595.06-.023.136-.033.194-.033.195 0 .375.104.495.254l2.462 3.33V8.108c0-.345.282-.63.63-.63.345 0 .63.285.63.63v4.771zm-5.741 0c0 .344-.282.629-.631.629-.345 0-.627-.285-.627-.629V8.108c0-.345.282-.63.627-.63.349 0 .631.285.631.63v4.771zm-2.466.629H4.917c-.345 0-.63-.285-.63-.629V8.108c0-.345.285-.63.63-.63.349 0 .63.285.63.63v4.141h1.756c.348 0 .629.283.629.63 0 .344-.281.629-.629.629M24 10.314C24 4.943 18.615.572 12 .572S0 4.943 0 10.314c0 4.811 4.27 8.842 10.035 9.608.391.082.923.258 1.058.59.12.301.079.766.038 1.08l-.164 1.02c-.045.301-.24 1.186 1.049.645 1.291-.539 6.916-4.078 9.436-6.975C23.176 14.393 24 12.458 24 10.314"/></svg>
                    LINEで気軽に相談
                </a>
                <?php endif; ?>
            </div>

            <!-- Contact Info -->
            <div class="mobile-menu__contact">
                <a href="<?php echo esc_attr($phone_link); ?>" class="mobile-menu__phone">
                    <span class="mobile-menu__phone-icon">
                        <?php sato_icon('phone', 24); ?>
                    </span>
                    <span class="mobile-menu__phone-content">
                        <span class="mobile-menu__phone-number"><?php echo esc_html($phone); ?></span>
                        <span class="mobile-menu__phone-hours"><?php echo esc_html($business_hours); ?>（<?php echo esc_html($holiday_text); ?>休）</span>
                    </span>
                </a>
            </div>

            <!-- Company Info -->
            <div class="mobile-menu__info">
                <p class="mobile-menu__company"><?php echo esc_html(sato_get_company_name(true)); ?></p>
                <p class="mobile-menu__address"><?php echo esc_html(get_theme_mod('sato_address', '')); ?></p>
            </div>
        </div>
    </div>
</div>

<!-- =========================================================================
     FIXED CTA (Mobile)
     ========================================================================= -->
<div class="fixed-cta" id="fixed-cta">
    <a href="<?php echo esc_attr($phone_link); ?>" class="fixed-cta__btn fixed-cta__btn--phone">
        <?php sato_icon('phone', 22); ?>
        <span>電話</span>
    </a>
    <?php if ($line_url) : ?>
    <a href="<?php echo esc_url($line_url); ?>" class="fixed-cta__btn fixed-cta__btn--line" target="_blank" rel="noopener noreferrer">
        <svg viewBox="0 0 24 24" width="22" height="22" fill="currentColor"><path d="M19.365 9.863c.349 0 .63.285.63.631 0 .345-.281.63-.63.63H17.61v1.125h1.755c.349 0 .63.283.63.63 0 .344-.281.629-.63.629h-2.386c-.345 0-.627-.285-.627-.629V8.108c0-.345.282-.63.627-.63h2.386c.349 0 .63.285.63.63 0 .349-.281.63-.63.63H17.61v1.125h1.755zm-3.855 3.016c0 .27-.174.51-.432.596-.064.021-.133.031-.199.031-.211 0-.391-.09-.51-.25l-2.443-3.317v2.94c0 .344-.279.629-.631.629-.346 0-.626-.285-.626-.629V8.108c0-.27.173-.51.43-.595.06-.023.136-.033.194-.033.195 0 .375.104.495.254l2.462 3.33V8.108c0-.345.282-.63.63-.63.345 0 .63.285.63.63v4.771zm-5.741 0c0 .344-.282.629-.631.629-.345 0-.627-.285-.627-.629V8.108c0-.345.282-.63.627-.63.349 0 .631.285.631.63v4.771zm-2.466.629H4.917c-.345 0-.63-.285-.63-.629V8.108c0-.345.285-.63.63-.63.349 0 .63.285.63.63v4.141h1.756c.348 0 .629.283.629.63 0 .344-.281.629-.629.629M24 10.314C24 4.943 18.615.572 12 .572S0 4.943 0 10.314c0 4.811 4.27 8.842 10.035 9.608.391.082.923.258 1.058.59.12.301.079.766.038 1.08l-.164 1.02c-.045.301-.24 1.186 1.049.645 1.291-.539 6.916-4.078 9.436-6.975C23.176 14.393 24 12.458 24 10.314"/></svg>
        <span>LINE</span>
    </a>
    <?php endif; ?>
    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="fixed-cta__btn fixed-cta__btn--contact">
        <?php sato_icon('mail', 22); ?>
        <span>無料相談</span>
    </a>
</div>

<!-- =========================================================================
     HEADER STYLES
     ========================================================================= -->
<style>
/* =============================================================================
   Header Variables
   ============================================================================= */
:root {
    --header-height: 80px;
    --header-height-scrolled: 70px;
    --header-topbar-height: 36px;
    --header-bg: #ffffff;
    --header-bg-scrolled: rgba(255, 255, 255, 0.98);
    --header-shadow: 0 2px 20px rgba(0, 0, 0, 0.08);
    --header-transition: 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    --mobile-menu-width: 320px;
    --fixed-cta-height: 60px;
}

/* =============================================================================
   Skip Link
   ============================================================================= */
.skip-link {
    position: fixed;
    top: -100%;
    left: 50%;
    transform: translateX(-50%);
    padding: 1rem 2rem;
    background: var(--color-primary);
    color: #fff;
    font-weight: 700;
    border-radius: var(--radius-md);
    z-index: 99999;
    transition: top 0.3s ease;
}

.skip-link:focus {
    top: 10px;
}

/* =============================================================================
   Body States
   ============================================================================= */
body.has-transparent-header {
    --header-initial-bg: transparent;
}

body.menu-open {
    overflow: hidden;
}

body.has-fixed-cta {
    padding-bottom: var(--fixed-cta-height);
}

@media (min-width: 1025px) {
    body.has-fixed-cta {
        padding-bottom: 0;
    }
}

/* =============================================================================
   Site Header
   ============================================================================= */
.site-header {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1000;
    background: var(--header-bg);
    transition: var(--header-transition);
}

.site-header--transparent {
    background: transparent;
}

.site-header--transparent .header-topbar {
    background: rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(10px);
}

.site-header--transparent .header-main {
    background: transparent;
}

.site-header--transparent .header-logo__text,
.site-header--transparent .header-nav__link,
.site-header--transparent .header-phone__number {
    color: var(--color-text);
}

/* Scrolled State */
.site-header.is-scrolled {
    background: var(--header-bg-scrolled);
    box-shadow: var(--header-shadow);
    backdrop-filter: blur(20px);
}

.site-header.is-scrolled .header-topbar {
    height: 0;
    padding: 0;
    overflow: hidden;
    opacity: 0;
}

.site-header.is-scrolled .header-main__inner {
    height: var(--header-height-scrolled);
}

/* Hidden State */
.site-header.is-hidden {
    transform: translateY(-100%);
}

/* =============================================================================
   Header Topbar
   ============================================================================= */
.header-topbar {
    background: var(--color-bg-light);
    border-bottom: 1px solid var(--color-border);
    height: var(--header-topbar-height);
    transition: var(--header-transition);
}

.header-topbar__inner {
    display: flex;
    align-items: center;
    justify-content: space-between;
    height: 100%;
}

.header-topbar__left {
    display: flex;
    align-items: center;
    gap: 1.5rem;
}

.header-topbar__info {
    display: flex;
    align-items: center;
    gap: 0.375rem;
    font-size: 0.75rem;
    color: var(--color-text-light);
}

.header-topbar__info .icon {
    color: var(--color-primary);
}

.header-topbar__right {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.header-topbar__link {
    display: inline-flex;
    align-items: center;
    gap: 0.375rem;
    font-size: 0.75rem;
    font-weight: 600;
    color: var(--color-text);
    padding: 0.25rem 0.75rem;
    border-radius: var(--radius-full);
    transition: var(--transition-base);
}

.header-topbar__link:hover {
    background: var(--color-bg);
}

.header-topbar__link--line {
    color: var(--color-line);
}

.header-topbar__social {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.header-topbar__social-link {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 28px;
    height: 28px;
    color: var(--color-text-light);
    border-radius: 50%;
    transition: var(--transition-base);
}

.header-topbar__social-link:hover {
    color: var(--color-primary);
    background: var(--color-bg);
}

@media (max-width: 1024px) {
    .header-topbar {
        display: none;
    }
}

/* =============================================================================
   Header Main
   ============================================================================= */
.header-main {
    background: var(--header-bg);
    transition: var(--header-transition);
}

.site-header.is-scrolled .header-main {
    background: transparent;
}

.header-main__inner {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 2rem;
    height: var(--header-height);
    transition: var(--header-transition);
}

/* =============================================================================
   Header Logo
   ============================================================================= */
.header-logo {
    flex-shrink: 0;
}

.header-logo a {
    display: flex;
    align-items: center;
}

.header-logo img {
    max-height: 50px;
    width: auto;
}

.header-logo__link {
    display: flex;
    flex-direction: column;
    gap: 0.125rem;
}

.header-logo__text {
    font-size: 1.5rem;
    font-weight: 900;
    color: var(--color-primary);
    line-height: 1.2;
    letter-spacing: -0.02em;
}

.header-logo__tagline {
    font-size: 0.6875rem;
    color: var(--color-text-light);
    letter-spacing: 0.05em;
}

@media (max-width: 768px) {
    .header-logo img {
        max-height: 40px;
    }
    
    .header-logo__text {
        font-size: 1.25rem;
    }
    
    .header-logo__tagline {
        font-size: 0.625rem;
    }
}

/* =============================================================================
   Header Navigation
   ============================================================================= */
.header-nav {
    flex: 1;
    display: flex;
    justify-content: center;
}

.header-nav__list {
    display: flex;
    align-items: center;
    gap: 0.25rem;
    list-style: none;
    margin: 0;
    padding: 0;
}

.header-nav__item {
    position: relative;
}

.header-nav__link {
    display: flex;
    align-items: center;
    gap: 0.25rem;
    padding: 0.625rem 1rem;
    font-size: 0.9375rem;
    font-weight: 600;
    color: var(--color-text);
    border-radius: var(--radius-md);
    transition: var(--transition-base);
}

.header-nav__link:hover,
.header-nav__link.is-current {
    color: var(--color-primary);
    background: rgba(13, 71, 161, 0.05);
}

.header-nav__link .icon {
    transition: transform var(--transition-base);
}

.header-nav__item--has-children:hover .header-nav__link .icon {
    transform: rotate(180deg);
}

/* Dropdown Menu */
.header-nav__submenu {
    position: absolute;
    top: 100%;
    left: 0;
    min-width: 200px;
    background: var(--header-bg);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-xl);
    padding: 0.5rem;
    opacity: 0;
    visibility: hidden;
    transform: translateY(10px);
    transition: var(--transition-base);
    list-style: none;
    margin: 0;
    z-index: 100;
}

.header-nav__item--has-children:hover .header-nav__submenu {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.header-nav__submenu li {
    margin: 0;
}

.header-nav__submenu a {
    display: block;
    padding: 0.75rem 1rem;
    font-size: 0.875rem;
    font-weight: 500;
    color: var(--color-text);
    border-radius: var(--radius-md);
    transition: var(--transition-base);
}

.header-nav__submenu a:hover {
    color: var(--color-primary);
    background: rgba(13, 71, 161, 0.05);
}

@media (max-width: 1200px) {
    .header-nav__link {
        padding: 0.5rem 0.75rem;
        font-size: 0.875rem;
    }
}

@media (max-width: 1024px) {
    .header-nav {
        display: none;
    }
}

/* =============================================================================
   Header Actions
   ============================================================================= */
.header-actions {
    display: flex;
    align-items: center;
    gap: 1rem;
    flex-shrink: 0;
}

.header-phone {
    display: flex;
    align-items: center;
    gap: 0.625rem;
    padding: 0.5rem;
    border-radius: var(--radius-lg);
    transition: var(--transition-base);
}

.header-phone:hover {
    background: rgba(13, 71, 161, 0.05);
}

.header-phone__icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    background: var(--color-primary);
    color: #fff;
    border-radius: 50%;
}

.header-phone__content {
    display: flex;
    flex-direction: column;
}

.header-phone__label {
    font-size: 0.6875rem;
    color: var(--color-text-light);
}

.header-phone__number {
    font-family: var(--font-en);
    font-size: 1.25rem;
    font-weight: 900;
    color: var(--color-primary);
    letter-spacing: 0.02em;
    line-height: 1.2;
}

.btn--header {
    padding: 0.75rem 1.5rem;
}

@media (max-width: 1200px) {
    .header-phone__content {
        display: none;
    }
}

@media (max-width: 1024px) {
    .header-actions {
        display: none;
    }
}

/* =============================================================================
   Mobile Menu Toggle
   ============================================================================= */
.header-toggle {
    display: none;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 5px;
    width: 44px;
    height: 44px;
    background: transparent;
    border: none;
    cursor: pointer;
    padding: 0;
    z-index: 1001;
}

.header-toggle__bar {
    display: block;
    width: 24px;
    height: 2px;
    background: var(--color-text);
    border-radius: 2px;
    transition: var(--transition-base);
}

.header-toggle.is-active .header-toggle__bar:nth-child(1) {
    transform: translateY(7px) rotate(45deg);
}

.header-toggle.is-active .header-toggle__bar:nth-child(2) {
    opacity: 0;
    transform: scaleX(0);
}

.header-toggle.is-active .header-toggle__bar:nth-child(3) {
    transform: translateY(-7px) rotate(-45deg);
}

@media (max-width: 1024px) {
    .header-toggle {
        display: flex;
    }
}

/* =============================================================================
   Mobile Menu
   ============================================================================= */
.mobile-menu {
    position: fixed;
    inset: 0;
    z-index: 9999;
    visibility: hidden;
    pointer-events: none;
}

.mobile-menu.is-open {
    visibility: visible;
    pointer-events: auto;
}

.mobile-menu__overlay {
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, 0.5);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.mobile-menu.is-open .mobile-menu__overlay {
    opacity: 1;
}

.mobile-menu__drawer {
    position: absolute;
    top: 0;
    right: 0;
    width: var(--mobile-menu-width);
    max-width: 100%;
    height: 100%;
    background: var(--header-bg);
    transform: translateX(100%);
    transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    display: flex;
    flex-direction: column;
    overflow: hidden;
}

.mobile-menu.is-open .mobile-menu__drawer {
    transform: translateX(0);
}

.mobile-menu__header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 1rem 1.25rem;
    border-bottom: 1px solid var(--color-border);
    flex-shrink: 0;
}

.mobile-menu__logo {
    max-width: 150px;
}

.mobile-menu__logo img {
    max-height: 36px;
    width: auto;
}

.mobile-menu__logo-text {
    font-size: 1.125rem;
    font-weight: 900;
    color: var(--color-primary);
}

.mobile-menu__close {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    background: var(--color-bg-light);
    border: none;
    border-radius: 50%;
    color: var(--color-text);
    cursor: pointer;
    transition: var(--transition-base);
}

.mobile-menu__close:hover {
    background: var(--color-border);
}

.mobile-menu__content {
    flex: 1;
    overflow-y: auto;
    -webkit-overflow-scrolling: touch;
    padding: 1.25rem;
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

/* Mobile Navigation */
.mobile-menu__nav {
    flex: 1;
}

.mobile-menu__list {
    list-style: none;
    margin: 0;
    padding: 0;
}

.mobile-menu__item {
    border-bottom: 1px solid var(--color-border);
}

.mobile-menu__item:last-child {
    border-bottom: none;
}

.mobile-menu__link {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    width: 100%;
    padding: 1rem 0;
    font-size: 1rem;
    font-weight: 600;
    color: var(--color-text);
    background: transparent;
    border: none;
    cursor: pointer;
    text-align: left;
    transition: var(--transition-base);
}

.mobile-menu__link:hover {
    color: var(--color-primary);
}

.mobile-menu__link .icon:last-child {
    margin-left: auto;
    transition: transform var(--transition-base);
}

.mobile-menu__toggle-sub[aria-expanded="true"] .icon:last-child {
    transform: rotate(180deg);
}

/* Mobile Submenu */
.mobile-menu__submenu {
    display: none;
    list-style: none;
    margin: 0;
    padding: 0 0 0.5rem 2.5rem;
}

.mobile-menu__item--has-children.is-open .mobile-menu__submenu {
    display: block;
}

.mobile-menu__submenu li {
    margin: 0;
}

.mobile-menu__submenu a {
    display: block;
    padding: 0.75rem 0;
    font-size: 0.9375rem;
    font-weight: 500;
    color: var(--color-text-light);
    border-bottom: 1px dashed var(--color-border);
    transition: var(--transition-base);
}

.mobile-menu__submenu li:last-child a {
    border-bottom: none;
}

.mobile-menu__submenu a:hover {
    color: var(--color-primary);
}

/* Mobile CTA */
.mobile-menu__cta {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}

/* Mobile Phone */
.mobile-menu__phone {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1rem;
    background: var(--color-bg-light);
    border-radius: var(--radius-lg);
    transition: var(--transition-base);
}

.mobile-menu__phone:hover {
    background: var(--color-border);
}

.mobile-menu__phone-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 48px;
    height: 48px;
    background: var(--color-primary);
    color: #fff;
    border-radius: 50%;
}

.mobile-menu__phone-content {
    display: flex;
    flex-direction: column;
}

.mobile-menu__phone-number {
    font-family: var(--font-en);
    font-size: 1.5rem;
    font-weight: 900;
    color: var(--color-primary);
    line-height: 1.2;
}

.mobile-menu__phone-hours {
    font-size: 0.75rem;
    color: var(--color-text-light);
}

/* Mobile Info */
.mobile-menu__info {
    padding-top: 1rem;
    border-top: 1px solid var(--color-border);
    text-align: center;
}

.mobile-menu__company {
    font-size: 0.875rem;
    font-weight: 600;
    color: var(--color-text);
    margin: 0 0 0.25rem;
}

.mobile-menu__address {
    font-size: 0.75rem;
    color: var(--color-text-light);
    margin: 0;
}

/* =============================================================================
   Fixed CTA (Mobile)
   ============================================================================= */
.fixed-cta {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    display: flex;
    background: var(--header-bg);
    box-shadow: 0 -2px 20px rgba(0, 0, 0, 0.1);
    z-index: 900;
    height: var(--fixed-cta-height);
    transform: translateY(100%);
    transition: transform 0.3s ease;
}

.fixed-cta.is-visible {
    transform: translateY(0);
}

.fixed-cta__btn {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 0.25rem;
    padding: 0.5rem;
    font-size: 0.6875rem;
    font-weight: 600;
    color: #fff;
    text-align: center;
    transition: var(--transition-base);
}

.fixed-cta__btn--phone {
    background: var(--color-primary);
}

.fixed-cta__btn--phone:hover {
    background: var(--color-primary-dark);
}

.fixed-cta__btn--line {
    background: var(--color-line);
}

.fixed-cta__btn--line:hover {
    background: #05b04a;
}

.fixed-cta__btn--contact {
    background: var(--color-accent);
}

.fixed-cta__btn--contact:hover {
    background: var(--color-secondary-dark);
}

@media (min-width: 1025px) {
    .fixed-cta {
        display: none;
    }
}

/* =============================================================================
   Button Styles (Header specific)
   ============================================================================= */
.btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.5em;
    padding: 0.75em 1.5em;
    font-size: 0.9375rem;
    font-weight: 700;
    line-height: 1.5;
    border: 2px solid transparent;
    border-radius: var(--radius-full);
    cursor: pointer;
    transition: var(--transition-base);
    text-decoration: none;
    white-space: nowrap;
}

.btn--primary {
    background: var(--color-primary);
    color: #fff;
}

.btn--primary:hover {
    background: var(--color-primary-dark);
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
}

.btn--line {
    background: var(--color-line);
    color: #fff;
}

.btn--line:hover {
    background: #05b04a;
}

.btn--block {
    width: 100%;
}

.btn--lg {
    padding: 1em 2em;
    font-size: 1rem;
}

/* =============================================================================
   Utility for spacing header
   ============================================================================= */
body:not(.has-transparent-header) {
    padding-top: calc(var(--header-height) + var(--header-topbar-height));
}

@media (max-width: 1024px) {
    body:not(.has-transparent-header) {
        padding-top: var(--header-height);
    }
}

/* =============================================================================
   Print Styles
   ============================================================================= */
@media print {
    .site-header,
    .mobile-menu,
    .fixed-cta {
        display: none !important;
    }
    
    body {
        padding-top: 0 !important;
    }
}

/* =============================================================================
   Reduced Motion
   ============================================================================= */
@media (prefers-reduced-motion: reduce) {
    .site-header,
    .mobile-menu__drawer,
    .mobile-menu__overlay,
    .header-nav__submenu {
        transition: none;
    }
}
</style>

<!-- =========================================================================
     HEADER JAVASCRIPT
     ========================================================================= -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    'use strict';

    // =========================================================================
    // Header Elements
    // =========================================================================
    const header = document.getElementById('site-header');
    const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const fixedCta = document.getElementById('fixed-cta');
    const body = document.body;

    // =========================================================================
    // Scroll Handling - Sticky Header
    // =========================================================================
    let lastScrollY = 0;
    let ticking = false;

    const handleScroll = () => {
        const currentScrollY = window.pageYOffset;

        // Add/remove scrolled class
        if (currentScrollY > 50) {
            header.classList.add('is-scrolled');
        } else {
            header.classList.remove('is-scrolled');
        }

        // Hide/show header on scroll
        if (currentScrollY > lastScrollY && currentScrollY > 300) {
            header.classList.add('is-hidden');
        } else {
            header.classList.remove('is-hidden');
        }

        // Show/hide fixed CTA
        if (fixedCta) {
            if (currentScrollY > 500) {
                fixedCta.classList.add('is-visible');
                body.classList.add('has-fixed-cta');
            } else {
                fixedCta.classList.remove('is-visible');
                body.classList.remove('has-fixed-cta');
            }
        }

        lastScrollY = currentScrollY;
        ticking = false;
    };

    window.addEventListener('scroll', () => {
        if (!ticking) {
            requestAnimationFrame(handleScroll);
            ticking = true;
        }
    }, { passive: true });

    // Initial check
    handleScroll();

    // =========================================================================
    // Mobile Menu Toggle
    // =========================================================================
    const openMobileMenu = () => {
        mobileMenu.classList.add('is-open');
        mobileMenu.setAttribute('aria-hidden', 'false');
        mobileMenuToggle.classList.add('is-active');
        mobileMenuToggle.setAttribute('aria-expanded', 'true');
        mobileMenuToggle.setAttribute('aria-label', 'メニューを閉じる');
        body.classList.add('menu-open');
        
        // Focus trap
        const firstFocusable = mobileMenu.querySelector('button, a, input');
        if (firstFocusable) {
            setTimeout(() => firstFocusable.focus(), 100);
        }
    };

    const closeMobileMenu = () => {
        mobileMenu.classList.remove('is-open');
        mobileMenu.setAttribute('aria-hidden', 'true');
        mobileMenuToggle.classList.remove('is-active');
        mobileMenuToggle.setAttribute('aria-expanded', 'false');
        mobileMenuToggle.setAttribute('aria-label', 'メニューを開く');
        body.classList.remove('menu-open');
        mobileMenuToggle.focus();
    };

    if (mobileMenuToggle) {
        mobileMenuToggle.addEventListener('click', () => {
            if (mobileMenu.classList.contains('is-open')) {
                closeMobileMenu();
            } else {
                openMobileMenu();
            }
        });
    }

    // Close menu on overlay click or close button
    document.querySelectorAll('[data-close-menu]').forEach(el => {
        el.addEventListener('click', closeMobileMenu);
    });

    // Close menu on escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && mobileMenu.classList.contains('is-open')) {
            closeMobileMenu();
        }
    });

    // =========================================================================
    // Mobile Submenu Toggle
    // =========================================================================
    document.querySelectorAll('.mobile-menu__toggle-sub').forEach(toggle => {
        toggle.addEventListener('click', function() {
            const parent = this.closest('.mobile-menu__item--has-children');
            const isOpen = parent.classList.contains('is-open');
            
            // Close all other submenus
            document.querySelectorAll('.mobile-menu__item--has-children.is-open').forEach(item => {
                if (item !== parent) {
                    item.classList.remove('is-open');
                    item.querySelector('.mobile-menu__toggle-sub').setAttribute('aria-expanded', 'false');
                }
            });
            
            // Toggle current
            parent.classList.toggle('is-open');
            this.setAttribute('aria-expanded', !isOpen);
        });
    });

    // =========================================================================
    // Close mobile menu on link click
    // =========================================================================
    mobileMenu.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            setTimeout(closeMobileMenu, 100);
        });
    });

    // =========================================================================
    // Window Resize Handler
    // =========================================================================
    let resizeTimer;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(() => {
            if (window.innerWidth > 1024 && mobileMenu.classList.contains('is-open')) {
                closeMobileMenu();
            }
        }, 250);
    }, { passive: true });

    // =========================================================================
    // Accessibility: Focus management
    // =========================================================================
    // Trap focus within mobile menu when open
    mobileMenu.addEventListener('keydown', (e) => {
        if (e.key !== 'Tab') return;
        
        const focusable = mobileMenu.querySelectorAll('button, a, input, [tabindex]:not([tabindex="-1"])');
        const firstFocusable = focusable[0];
        const lastFocusable = focusable[focusable.length - 1];
        
        if (e.shiftKey && document.activeElement === firstFocusable) {
            e.preventDefault();
            lastFocusable.focus();
        } else if (!e.shiftKey && document.activeElement === lastFocusable) {
            e.preventDefault();
            firstFocusable.focus();
        }
    });
});
</script>
