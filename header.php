<?php
/**
 * Header Template
 * サトー建装 公式Webサイトテーマ
 * 
 * @package Sato_Kenso
 * @version 3.0.0
 */

// テーマ設定を取得
$phone = sato_get_phone();
$phone_link = sato_get_phone_link();
$hours = get_theme_mod('company_hours', '9:00〜18:00');
$holiday = get_theme_mod('company_holiday', '日曜・祝日');
$line_url = sato_get_line_url();
$instagram_url = get_theme_mod('instagram_url', '');
$facebook_url = get_theme_mod('facebook_url', '');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no">
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="<?php echo is_front_page() ? esc_attr(get_theme_mod('meta_description', '静岡県御殿場市の外壁塗装・屋根塗装専門店「サトー建装」。地域密着20年以上の実績で、お客様の大切な住まいを守ります。')) : esc_attr(get_the_excerpt()); ?>">
    
    <!-- OGP -->
    <meta property="og:title" content="<?php wp_title('|', true, 'right'); bloginfo('name'); ?>">
    <meta property="og:description" content="<?php echo is_front_page() ? esc_attr(get_theme_mod('meta_description', '静岡県御殿場市の外壁塗装・屋根塗装専門店「サトー建装」')) : esc_attr(get_the_excerpt()); ?>">
    <meta property="og:type" content="<?php echo is_front_page() ? 'website' : 'article'; ?>">
    <meta property="og:url" content="<?php echo esc_url(get_permalink()); ?>">
    <meta property="og:image" content="<?php echo has_post_thumbnail() ? esc_url(get_the_post_thumbnail_url(null, 'large')) : esc_url(get_template_directory_uri() . '/assets/images/ogp.jpg'); ?>">
    <meta property="og:site_name" content="<?php bloginfo('name'); ?>">
    <meta property="og:locale" content="ja_JP">
    
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/favicon.svg">
    <link rel="icon" type="image/png" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/favicon.png">
    <link rel="apple-touch-icon" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/apple-touch-icon.png">
    
    <!-- Preconnect -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Skip Link -->
<a href="#main-content" class="skip-link screen-reader-text">
    <?php esc_html_e('メインコンテンツへスキップ', 'sato-kenso'); ?>
</a>

<!-- ============================================
     トップバー（デスクトップのみ）
============================================= -->
<div class="top-bar">
    <div class="container top-bar__inner">
        <div class="top-bar__left">
            <span class="top-bar__hours">
                <?php echo sato_get_svg_icon('clock', 14); ?>
                <span>営業時間：<?php echo esc_html($hours); ?></span>
            </span>
            <span class="top-bar__holiday">
                <?php echo sato_get_svg_icon('calendar', 14); ?>
                <span>定休日：<?php echo esc_html($holiday); ?></span>
            </span>
        </div>
        
        <div class="top-bar__right">
            <?php if ($instagram_url) : ?>
            <a href="<?php echo esc_url($instagram_url); ?>" target="_blank" rel="noopener noreferrer" class="top-bar__social" aria-label="Instagram">
                <?php echo sato_get_svg_icon('instagram', 16); ?>
            </a>
            <?php endif; ?>
            
            <?php if ($facebook_url) : ?>
            <a href="<?php echo esc_url($facebook_url); ?>" target="_blank" rel="noopener noreferrer" class="top-bar__social" aria-label="Facebook">
                <?php echo sato_get_svg_icon('facebook', 16); ?>
            </a>
            <?php endif; ?>
            
            <?php if ($line_url) : ?>
            <a href="<?php echo esc_url($line_url); ?>" target="_blank" rel="noopener noreferrer" class="top-bar__social top-bar__social--line" aria-label="LINE">
                <?php echo sato_get_svg_icon('line', 16); ?>
            </a>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- ============================================
     メインヘッダー
============================================= -->
<header class="header" id="header" role="banner">
    <div class="container header__inner">
        
        <!-- ロゴ -->
        <div class="header__brand">
            <?php if (is_front_page()) : ?>
            <h1 class="header__logo">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="header__logo-link">
                    <?php if (has_custom_logo()) : ?>
                        <?php 
                        $custom_logo_id = get_theme_mod('custom_logo');
                        $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                        ?>
                        <img src="<?php echo esc_url($logo[0]); ?>" alt="<?php bloginfo('name'); ?>" class="header__logo-img" width="180" height="45">
                    <?php else : ?>
                        <span class="header__logo-text">
                            <span class="header__logo-main">サトー建装</span>
                            <span class="header__logo-sub">外壁塗装・屋根塗装専門店</span>
                        </span>
                    <?php endif; ?>
                </a>
            </h1>
            <?php else : ?>
            <div class="header__logo">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="header__logo-link">
                    <?php if (has_custom_logo()) : ?>
                        <?php 
                        $custom_logo_id = get_theme_mod('custom_logo');
                        $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                        ?>
                        <img src="<?php echo esc_url($logo[0]); ?>" alt="<?php bloginfo('name'); ?>" class="header__logo-img" width="180" height="45">
                    <?php else : ?>
                        <span class="header__logo-text">
                            <span class="header__logo-main">サトー建装</span>
                            <span class="header__logo-sub">外壁塗装・屋根塗装専門店</span>
                        </span>
                    <?php endif; ?>
                </a>
            </div>
            <?php endif; ?>
        </div>
        
        <!-- デスクトップナビゲーション -->
        <nav class="header__nav" id="primary-nav" role="navigation" aria-label="メインナビゲーション">
            <ul class="header__nav-list">
                <li class="header__nav-item">
                    <a href="<?php echo is_front_page() ? '#about' : esc_url(home_url('/#about')); ?>" class="header__nav-link">
                        <span class="header__nav-en">About</span>
                        <span class="header__nav-ja">選ばれる理由</span>
                    </a>
                </li>
                <li class="header__nav-item">
                    <a href="<?php echo is_front_page() ? '#service' : esc_url(home_url('/#service')); ?>" class="header__nav-link">
                        <span class="header__nav-en">Service</span>
                        <span class="header__nav-ja">サービス</span>
                    </a>
                </li>
                <li class="header__nav-item">
                    <a href="<?php echo esc_url(home_url('/works/')); ?>" class="header__nav-link">
                        <span class="header__nav-en">Works</span>
                        <span class="header__nav-ja">施工実績</span>
                    </a>
                </li>
                <li class="header__nav-item">
                    <a href="<?php echo is_front_page() ? '#price' : esc_url(home_url('/#price')); ?>" class="header__nav-link">
                        <span class="header__nav-en">Price</span>
                        <span class="header__nav-ja">料金</span>
                    </a>
                </li>
                <li class="header__nav-item">
                    <a href="<?php echo is_front_page() ? '#voice' : esc_url(home_url('/#voice')); ?>" class="header__nav-link">
                        <span class="header__nav-en">Voice</span>
                        <span class="header__nav-ja">お客様の声</span>
                    </a>
                </li>
                <li class="header__nav-item">
                    <a href="<?php echo is_front_page() ? '#faq' : esc_url(home_url('/#faq')); ?>" class="header__nav-link">
                        <span class="header__nav-en">FAQ</span>
                        <span class="header__nav-ja">よくある質問</span>
                    </a>
                </li>
                <li class="header__nav-item">
                    <a href="<?php echo esc_url(home_url('/company/')); ?>" class="header__nav-link">
                        <span class="header__nav-en">Company</span>
                        <span class="header__nav-ja">会社概要</span>
                    </a>
                </li>
            </ul>
        </nav>
        
        <!-- ヘッダー右側：連絡先・CTA -->
        <div class="header__actions">
            <!-- 電話番号 -->
            <a href="<?php echo esc_url($phone_link); ?>" class="header__phone">
                <span class="header__phone-icon">
                    <?php echo sato_get_svg_icon('phone', 20); ?>
                </span>
                <span class="header__phone-info">
                    <span class="header__phone-label">お気軽にお電話ください</span>
                    <span class="header__phone-number"><?php echo esc_html($phone); ?></span>
                </span>
            </a>
            
            <!-- 見積もりボタン -->
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="header__cta btn btn--primary">
                <?php echo sato_get_svg_icon('mail', 18); ?>
                <span>無料見積り</span>
            </a>
        </div>
        
        <!-- モバイルメニューボタン -->
        <button type="button" class="header__hamburger" id="menu-toggle" aria-expanded="false" aria-controls="mobile-menu" aria-label="メニューを開く">
            <span class="header__hamburger-box">
                <span class="header__hamburger-line"></span>
                <span class="header__hamburger-line"></span>
                <span class="header__hamburger-line"></span>
            </span>
            <span class="header__hamburger-text">MENU</span>
        </button>
    </div>
</header>

<!-- ============================================
     モバイルナビゲーション
============================================= -->
<div class="mobile-nav" id="mobile-menu" role="dialog" aria-modal="true" aria-label="モバイルメニュー">
    <div class="mobile-nav__overlay" data-close-menu></div>
    
    <div class="mobile-nav__container">
        <!-- 閉じるボタン -->
        <button type="button" class="mobile-nav__close" data-close-menu aria-label="メニューを閉じる">
            <?php echo sato_get_svg_icon('close', 24); ?>
        </button>
        
        <!-- モバイルナビ上部：連絡先 -->
        <div class="mobile-nav__header">
            <a href="<?php echo esc_url($phone_link); ?>" class="mobile-nav__phone">
                <?php echo sato_get_svg_icon('phone', 24); ?>
                <span><?php echo esc_html($phone); ?></span>
            </a>
            <p class="mobile-nav__hours">
                営業時間：<?php echo esc_html($hours); ?>（<?php echo esc_html($holiday); ?>休）
            </p>
        </div>
        
        <!-- モバイルナビメニュー -->
        <nav class="mobile-nav__nav" role="navigation" aria-label="モバイルナビゲーション">
            <ul class="mobile-nav__list">
                <li class="mobile-nav__item">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="mobile-nav__link" data-close-menu>
                        <?php echo sato_get_svg_icon('home', 20); ?>
                        <span>ホーム</span>
                    </a>
                </li>
                <li class="mobile-nav__item">
                    <a href="<?php echo is_front_page() ? '#about' : esc_url(home_url('/#about')); ?>" class="mobile-nav__link" data-close-menu>
                        <?php echo sato_get_svg_icon('check-circle', 20); ?>
                        <span>選ばれる理由</span>
                    </a>
                </li>
                <li class="mobile-nav__item">
                    <a href="<?php echo is_front_page() ? '#service' : esc_url(home_url('/#service')); ?>" class="mobile-nav__link" data-close-menu>
                        <?php echo sato_get_svg_icon('paint-roller', 20); ?>
                        <span>サービス</span>
                    </a>
                </li>
                <li class="mobile-nav__item">
                    <a href="<?php echo esc_url(home_url('/works/')); ?>" class="mobile-nav__link" data-close-menu>
                        <?php echo sato_get_svg_icon('images', 20); ?>
                        <span>施工実績</span>
                    </a>
                </li>
                <li class="mobile-nav__item">
                    <a href="<?php echo is_front_page() ? '#price' : esc_url(home_url('/#price')); ?>" class="mobile-nav__link" data-close-menu>
                        <?php echo sato_get_svg_icon('yen', 20); ?>
                        <span>料金プラン</span>
                    </a>
                </li>
                <li class="mobile-nav__item">
                    <a href="<?php echo is_front_page() ? '#voice' : esc_url(home_url('/#voice')); ?>" class="mobile-nav__link" data-close-menu>
                        <?php echo sato_get_svg_icon('message-circle', 20); ?>
                        <span>お客様の声</span>
                    </a>
                </li>
                <li class="mobile-nav__item">
                    <a href="<?php echo is_front_page() ? '#faq' : esc_url(home_url('/#faq')); ?>" class="mobile-nav__link" data-close-menu>
                        <?php echo sato_get_svg_icon('help-circle', 20); ?>
                        <span>よくある質問</span>
                    </a>
                </li>
                <li class="mobile-nav__item">
                    <a href="<?php echo is_front_page() ? '#flow' : esc_url(home_url('/#flow')); ?>" class="mobile-nav__link" data-close-menu>
                        <?php echo sato_get_svg_icon('list-ordered', 20); ?>
                        <span>ご依頼の流れ</span>
                    </a>
                </li>
                <li class="mobile-nav__item">
                    <a href="<?php echo esc_url(home_url('/company/')); ?>" class="mobile-nav__link" data-close-menu>
                        <?php echo sato_get_svg_icon('building', 20); ?>
                        <span>会社概要</span>
                    </a>
                </li>
                <li class="mobile-nav__item">
                    <a href="<?php echo esc_url(home_url('/news/')); ?>" class="mobile-nav__link" data-close-menu>
                        <?php echo sato_get_svg_icon('newspaper', 20); ?>
                        <span>お知らせ</span>
                    </a>
                </li>
            </ul>
        </nav>
        
        <!-- CTAボタン -->
        <div class="mobile-nav__cta">
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn--primary btn--lg btn--full" data-close-menu>
                <?php echo sato_get_svg_icon('mail', 20); ?>
                <span>無料お見積り・ご相談</span>
            </a>
            
            <?php if ($line_url) : ?>
            <a href="<?php echo esc_url($line_url); ?>" target="_blank" rel="noopener noreferrer" class="btn btn--line btn--lg btn--full">
                <?php echo sato_get_svg_icon('line', 20); ?>
                <span>LINEでお問い合わせ</span>
            </a>
            <?php endif; ?>
        </div>
        
        <!-- SNSリンク -->
        <div class="mobile-nav__social">
            <?php if ($instagram_url) : ?>
            <a href="<?php echo esc_url($instagram_url); ?>" target="_blank" rel="noopener noreferrer" class="mobile-nav__social-link" aria-label="Instagram">
                <?php echo sato_get_svg_icon('instagram', 24); ?>
            </a>
            <?php endif; ?>
            
            <?php if ($facebook_url) : ?>
            <a href="<?php echo esc_url($facebook_url); ?>" target="_blank" rel="noopener noreferrer" class="mobile-nav__social-link" aria-label="Facebook">
                <?php echo sato_get_svg_icon('facebook', 24); ?>
            </a>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- ============================================
     固定電話・LINEボタン（モバイル）
============================================= -->
<div class="fixed-contact" id="fixed-contact">
    <a href="<?php echo esc_url($phone_link); ?>" class="fixed-contact__btn fixed-contact__btn--phone">
        <?php echo sato_get_svg_icon('phone', 24); ?>
        <span>電話</span>
    </a>
    
    <?php if ($line_url) : ?>
    <a href="<?php echo esc_url($line_url); ?>" target="_blank" rel="noopener noreferrer" class="fixed-contact__btn fixed-contact__btn--line">
        <?php echo sato_get_svg_icon('line', 24); ?>
        <span>LINE</span>
    </a>
    <?php endif; ?>
    
    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="fixed-contact__btn fixed-contact__btn--mail">
        <?php echo sato_get_svg_icon('mail', 24); ?>
        <span>見積り</span>
    </a>
</div>

<main id="main-content" role="main">
