<?php
/**
 * Front Page Template
 * サトー建装 公式Webサイトテーマ
 * @package Sato_Kenso
 * @version 3.0.0
 */

get_header();

// カスタマイザー設定の取得
$hero_catch1    = get_theme_mod('sato_hero_catch1', '住まいを守る、');
$hero_catch2    = get_theme_mod('sato_hero_catch2', '職人の技術と想い。');
$hero_subcatch  = get_theme_mod('sato_hero_subcatch', '国家資格 一級塗装技能士が施工する御殿場市の塗装専門店');

// ヒーロー画像
$custom_img_id = get_theme_mod('sato_hero_image_1');
$hero_bg_url = $custom_img_id 
    ? wp_get_attachment_image_url($custom_img_id, 'full') 
    : 'https://satokens.jp/wp-content/uploads/2025/12/Gemini_Generated_Image_wzbnsjwzbnsjwzbn.png';

// お悩み画像
$problems_image_url = 'https://satokens.jp/wp-content/uploads/2025/12/Gemini_Generated_Image_i2horvi2horvi2ho.png';

// 対応エリア
$service_areas  = get_theme_mod('sato_service_areas', "御殿場市\n裾野市\n三島市\n沼津市\n富士市\n富士宮市\n長泉町\n清水町");
$area_note      = get_theme_mod('sato_area_note', 'その他、静岡県東部エリアもご対応可能です。まずはお気軽にお問い合わせください。');
$google_map_url = get_theme_mod('sato_google_map', '');
$warranty_years = get_theme_mod('sato_warranty_years', '10');

// 電話番号取得関数（未定義の場合のフォールバック）
if (!function_exists('sato_get_phone')) {
    function sato_get_phone() {
        return get_theme_mod('sato_phone', '0550-XX-XXXX');
    }
}
if (!function_exists('sato_get_phone_link')) {
    function sato_get_phone_link() {
        return 'tel:' . preg_replace('/[^0-9]/', '', sato_get_phone());
    }
}
if (!function_exists('sato_get_line_url')) {
    function sato_get_line_url() {
        return get_theme_mod('sato_line_url', '');
    }
}

// SVGアイコン関数（未定義の場合）
if (!function_exists('sato_get_svg_icon')) {
    function sato_get_svg_icon($name, $size = 24) {
        $icons = [
            'phone' => '<svg xmlns="http://www.w3.org/2000/svg" width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>',
            'mail' => '<svg xmlns="http://www.w3.org/2000/svg" width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>',
            'check' => '<svg xmlns="http://www.w3.org/2000/svg" width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>',
            'check-circle' => '<svg xmlns="http://www.w3.org/2000/svg" width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>',
            'arrow-right' => '<svg xmlns="http://www.w3.org/2000/svg" width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>',
            'chevron-down' => '<svg xmlns="http://www.w3.org/2000/svg" width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>',
            'home' => '<svg xmlns="http://www.w3.org/2000/svg" width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>',
            'shield' => '<svg xmlns="http://www.w3.org/2000/svg" width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>',
            'users' => '<svg xmlns="http://www.w3.org/2000/svg" width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>',
            'award' => '<svg xmlns="http://www.w3.org/2000/svg" width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>',
            'map-pin' => '<svg xmlns="http://www.w3.org/2000/svg" width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>',
            'star' => '<svg xmlns="http://www.w3.org/2000/svg" width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>',
            'line' => '<svg xmlns="http://www.w3.org/2000/svg" width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="currentColor"><path d="M19.365 9.863c.349 0 .63.285.63.631 0 .345-.281.63-.63.63H17.61v1.125h1.755c.349 0 .63.283.63.63 0 .344-.281.629-.63.629h-2.386c-.345 0-.627-.285-.627-.629V8.108c0-.345.282-.63.63-.63h2.386c.346 0 .627.285.627.63 0 .349-.281.63-.63.63H17.61v1.125h1.755zm-3.855 3.016c0 .27-.174.51-.432.596-.064.021-.133.031-.199.031-.211 0-.391-.09-.51-.25l-2.443-3.317v2.94c0 .344-.279.629-.631.629-.346 0-.626-.285-.626-.629V8.108c0-.27.173-.51.43-.595.06-.023.136-.033.194-.033.195 0 .375.104.495.254l2.462 3.33V8.108c0-.345.282-.63.63-.63.345 0 .63.285.63.63v4.771zm-5.741 0c0 .344-.282.629-.631.629-.345 0-.627-.285-.627-.629V8.108c0-.345.282-.63.63-.63.346 0 .628.285.628.63v4.771zm-2.466.629H4.917c-.345 0-.63-.285-.63-.629V8.108c0-.345.285-.63.63-.63.348 0 .63.285.63.63v4.141h1.756c.348 0 .629.283.629.63 0 .344-.282.629-.629.629M24 10.314C24 4.943 18.615.572 12 .572S0 4.943 0 10.314c0 4.811 4.27 8.842 10.035 9.608.391.082.923.258 1.058.59.12.301.079.766.038 1.08l-.164 1.02c-.045.301-.24 1.186 1.049.645 1.291-.539 6.916-4.078 9.436-6.975C23.176 14.393 24 12.458 24 10.314"></path></svg>',
        ];
        return isset($icons[$name]) ? $icons[$name] : '';
    }
}

// 星評価関数
if (!function_exists('sato_rating_stars')) {
    function sato_rating_stars($rating) {
        $output = '<div class="rating-stars">';
        for ($i = 1; $i <= 5; $i++) {
            $class = $i <= $rating ? 'star--filled' : 'star--empty';
            $output .= '<span class="star ' . $class . '">' . sato_get_svg_icon('star', 16) . '</span>';
        }
        $output .= '</div>';
        return $output;
    }
}

// 施工実績取得関数
if (!function_exists('sato_get_works')) {
    function sato_get_works($args = []) {
        $defaults = [
            'post_type' => 'works',
            'posts_per_page' => 6,
            'post_status' => 'publish',
        ];
        return new WP_Query(array_merge($defaults, $args));
    }
}

// お客様の声取得関数
if (!function_exists('sato_get_voices')) {
    function sato_get_voices($args = []) {
        $defaults = [
            'post_type' => 'voice',
            'posts_per_page' => 3,
            'post_status' => 'publish',
        ];
        return new WP_Query(array_merge($defaults, $args));
    }
}

// ニュース取得関数
if (!function_exists('sato_get_news')) {
    function sato_get_news($args = []) {
        $defaults = [
            'post_type' => 'news',
            'posts_per_page' => 3,
            'post_status' => 'publish',
        ];
        return new WP_Query(array_merge($defaults, $args));
    }
}

// FAQ取得関数
if (!function_exists('sato_get_faqs')) {
    function sato_get_faqs($args = []) {
        $defaults = [
            'post_type' => 'faq',
            'posts_per_page' => 5,
            'post_status' => 'publish',
        ];
        return new WP_Query(array_merge($defaults, $args));
    }
}
?>

<main class="front-page" id="main-content">

    <!-- ============================================
         HERO SECTION
    ============================================= -->
    <section class="hero" aria-label="メインビジュアル">
        <div class="hero__bg" style="background-image: url('<?php echo esc_url($hero_bg_url); ?>');" role="img" aria-label="塗装職人の作業風景"></div>
        <div class="hero__overlay"></div>
        
        <div class="hero__content">
            <div class="container">
                <div class="hero__inner fade-in-up">
                    <h1 class="hero__catchphrase">
                        <span class="hero__catch-line"><?php echo esc_html($hero_catch1); ?></span>
                        <span class="hero__catch-line"><?php echo esc_html($hero_catch2); ?></span>
                    </h1>
                    <p class="hero__subcatch"><?php echo esc_html($hero_subcatch); ?></p>
                    
                    <div class="hero__badges">
                        <span class="badge">地域密着20年</span>
                        <span class="badge">完全自社施工</span>
                        <span class="badge">一級塗装技能士</span>
                    </div>
                    
                    <div class="hero__cta">
                        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn--accent btn--xl">
                            <?php echo sato_get_svg_icon('mail', 24); ?>
                            <span>無料お見積り・ご相談</span>
                        </a>
                        <a href="<?php echo esc_url(sato_get_phone_link()); ?>" class="btn btn--white btn--xl">
                            <?php echo sato_get_svg_icon('phone', 24); ?>
                            <span><?php echo esc_html(sato_get_phone()); ?></span>
                        </a>
                    </div>
                    <p class="hero__note">※しつこい営業は一切いたしません</p>
                </div>
            </div>
        </div>
        
        <div class="hero__scroll">
            <span>Scroll</span>
            <div class="hero__scroll-line"></div>
        </div>
    </section>

    <!-- ============================================
         PROBLEMS SECTION
    ============================================= -->
    <section class="section section--problems" id="problems" aria-labelledby="problems-title">
        <div class="container">
            <header class="section__header">
                <span class="section__label">PROBLEMS</span>
                <h2 class="section__title" id="problems-title">こんなお悩みありませんか？</h2>
                <p class="section__description">外壁や屋根の劣化は、放っておくと建物の寿命を縮める原因になります。<br>少しでも気になる症状があれば、お早めにご相談ください。</p>
            </header>
            
            <div class="problems__visual fade-in-up">
                <img src="<?php echo esc_url($problems_image_url); ?>" alt="外壁の劣化症状：ひび割れ、チョーキング、コケ、雨漏り" class="problems__image" loading="lazy" width="1200" height="600">
            </div>
            
            <div class="problems__grid">
                <article class="problem-card fade-in-up" style="--delay: 0.1s">
                    <div class="problem-card__icon">
                        <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M32 8L8 24V56H56V24L32 8Z" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M24 40L32 32L40 40" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M32 32V52" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <h3 class="problem-card__title">外壁のひび割れ</h3>
                    <p class="problem-card__text">小さなひび割れから雨水が浸入し、建物の構造部分を腐食させる可能性があります。</p>
                </article>
                
                <article class="problem-card fade-in-up" style="--delay: 0.2s">
                    <div class="problem-card__icon">
                        <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="32" cy="32" r="20" stroke="currentColor" stroke-width="3"/>
                            <path d="M32 20V32" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
                            <circle cx="32" cy="40" r="2" fill="currentColor"/>
                        </svg>
                    </div>
                    <h3 class="problem-card__title">壁を触ると白い粉がつく</h3>
                    <p class="problem-card__text">チョーキング現象と呼ばれ、塗膜の防水機能が低下しているサインです。</p>
                </article>
                
                <article class="problem-card fade-in-up" style="--delay: 0.3s">
                    <div class="problem-card__icon">
                        <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M32 12C20 20 12 32 12 44C12 52 20 56 32 56C44 56 52 52 52 44C52 32 44 20 32 12Z" stroke="currentColor" stroke-width="3"/>
                            <path d="M24 40C24 44 28 48 32 48" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <h3 class="problem-card__title">コケや藻の発生</h3>
                    <p class="problem-card__text">日当たりが悪い場所に発生しやすく、塗膜の劣化や美観を損なう原因になります。</p>
                </article>
                
                <article class="problem-card fade-in-up" style="--delay: 0.4s">
                    <div class="problem-card__icon">
                        <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 16L32 52L44 16" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M16 28H48" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
                            <circle cx="32" cy="52" r="4" fill="currentColor"/>
                        </svg>
                    </div>
                    <h3 class="problem-card__title">雨漏り・シミ</h3>
                    <p class="problem-card__text">天井や壁にシミができている場合、すでに雨漏りが進行している危険性があります。</p>
                </article>
            </div>
            
            <div class="problems__cta fade-in-up">
                <p class="problems__cta-text">そのお悩み、<strong>サトー建装</strong>にお任せください！</p>
                <div class="problems__cta-arrow">
                    <?php echo sato_get_svg_icon('chevron-down', 32); ?>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================
         REASONS SECTION（選ばれる理由）
    ============================================= -->
    <section class="section section--reasons" id="reasons" aria-labelledby="reasons-title">
        <div class="container">
            <header class="section__header">
                <span class="section__label">REASONS</span>
                <h2 class="section__title" id="reasons-title">サトー建装が選ばれる<span class="text-accent">3つの理由</span></h2>
                <p class="section__description">お客様に安心して工事をお任せいただくために、私たちは「品質」「価格」「安心」に徹底的にこだわっています。</p>
            </header>
            
            <div class="reasons__list">
                <!-- 理由1：完全自社施工 -->
                <article class="reason-card fade-in-up">
                    <div class="reason-card__number">01</div>
                    <div class="reason-card__image">
                        <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=600&h=400&fit=crop" alt="自社職人による丁寧な施工" loading="lazy" width="600" height="400">
                    </div>
                    <div class="reason-card__content">
                        <h3 class="reason-card__title">
                            <?php echo sato_get_svg_icon('users', 28); ?>
                            完全自社施工で中間マージンカット
                        </h3>
                        <p class="reason-card__text">当社では下請け業者を使わず、すべての工事を自社の職人が直接施工いたします。中間マージンをカットすることで、高品質な施工を適正価格でご提供。また、現場との連携がスムーズなため、お客様のご要望にも迅速に対応できます。</p>
                        <ul class="reason-card__points">
                            <li><?php echo sato_get_svg_icon('check', 18); ?>中間マージン0円</li>
                            <li><?php echo sato_get_svg_icon('check', 18); ?>責任施工で安心</li>
                            <li><?php echo sato_get_svg_icon('check', 18); ?>迅速な対応力</li>
                        </ul>
                    </div>
                </article>
                
                <!-- 理由2：一級塗装技能士 -->
                <article class="reason-card reason-card--reverse fade-in-up">
                    <div class="reason-card__number">02</div>
                    <div class="reason-card__image">
                        <img src="https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=600&h=400&fit=crop" alt="国家資格を持つ職人" loading="lazy" width="600" height="400">
                    </div>
                    <div class="reason-card__content">
                        <h3 class="reason-card__title">
                            <?php echo sato_get_svg_icon('award', 28); ?>
                            国家資格「一級塗装技能士」が施工
                        </h3>
                        <p class="reason-card__text">代表をはじめ、当社の職人は国家資格である「一級塗装技能士」を保有。長年の経験と確かな技術で、お客様の大切な住まいを守ります。塗料の特性を熟知し、建物の状態に合わせた最適な施工をご提案いたします。</p>
                        <ul class="reason-card__points">
                            <li><?php echo sato_get_svg_icon('check', 18); ?>国家資格保有者が施工</li>
                            <li><?php echo sato_get_svg_icon('check', 18); ?>20年以上の実績</li>
                            <li><?php echo sato_get_svg_icon('check', 18); ?>丁寧な下地処理</li>
                        </ul>
                    </div>
                </article>
                
                <!-- 理由3：地域密着・アフター保証 -->
                <article class="reason-card fade-in-up">
                    <div class="reason-card__number">03</div>
                    <div class="reason-card__image">
                        <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?w=600&h=400&fit=crop" alt="地域密着のアフターサポート" loading="lazy" width="600" height="400">
                    </div>
                    <div class="reason-card__content">
                        <h3 class="reason-card__title">
                            <?php echo sato_get_svg_icon('shield', 28); ?>
                            地域密着だからこそできる安心保証
                        </h3>
                        <p class="reason-card__text">御殿場市を拠点に地域密着で営業しているからこそ、施工後のアフターフォローも万全です。最長<?php echo esc_html($warranty_years); ?>年の保証をご用意し、定期点検や万が一の不具合にも迅速に対応。地元で長く営業を続けてきた信頼と実績があります。</p>
                        <div class="reason-card__warranty">
                            <span class="warranty-badge">
                                <span class="warranty-badge__years"><?php echo esc_html($warranty_years); ?></span>
                                <span class="warranty-badge__text">年保証</span>
                            </span>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- ============================================
         SERVICE SECTION
    ============================================= -->
    <section class="section section--service" id="service" aria-labelledby="service-title">
        <div class="container">
            <header class="section__header">
                <span class="section__label">SERVICE</span>
                <h2 class="section__title" id="service-title">サービス案内</h2>
                <p class="section__description">戸建て住宅から店舗・アパートまで、塗装に関するあらゆる工事に対応いたします。</p>
            </header>
            
            <div class="services__grid">
                <a href="<?php echo esc_url(home_url('/service/exterior/')); ?>" class="service-card fade-in-up" style="--delay: 0.1s">
                    <div class="service-card__image">
                        <img src="https://images.unsplash.com/photo-1562259949-e8e7689d7828?w=500&h=350&fit=crop" alt="外壁塗装の施工事例" loading="lazy" width="500" height="350">
                        <span class="service-card__badge">人気No.1</span>
                    </div>
                    <div class="service-card__content">
                        <h3 class="service-card__title">
                            <?php echo sato_get_svg_icon('home', 24); ?>
                            外壁塗装
                        </h3>
                        <p class="service-card__text">美観の向上だけでなく、建物を雨風から守るための外壁塗装工事。シリコン・フッ素・無機塗料など、お客様のご予算とご要望に合わせた塗料をご提案します。</p>
                        <span class="service-card__link">
                            詳しく見る
                            <?php echo sato_get_svg_icon('arrow-right', 16); ?>
                        </span>
                    </div>
                </a>
                
                <a href="<?php echo esc_url(home_url('/service/roof/')); ?>" class="service-card fade-in-up" style="--delay: 0.2s">
                    <div class="service-card__image">
                        <img src="https://images.unsplash.com/photo-1632759145351-1d592919f522?w=500&h=350&fit=crop" alt="屋根塗装の施工事例" loading="lazy" width="500" height="350">
                    </div>
                    <div class="service-card__content">
                        <h3 class="service-card__title">
                            <?php echo sato_get_svg_icon('home', 24); ?>
                            屋根塗装
                        </h3>
                        <p class="service-card__text">紫外線や雨風から建物を守る屋根。遮熱・断熱効果のある塗料で、夏は涼しく冬は暖かい快適な住環境を実現します。</p>
                        <span class="service-card__link">
                            詳しく見る
                            <?php echo sato_get_svg_icon('arrow-right', 16); ?>
                        </span>
                    </div>
                </a>
                
                <a href="<?php echo esc_url(home_url('/service/waterproof/')); ?>" class="service-card fade-in-up" style="--delay: 0.3s">
                    <div class="service-card__image">
                        <img src="https://images.unsplash.com/photo-1607400201889-565b1ee75f8e?w=500&h=350&fit=crop" alt="防水工事の施工事例" loading="lazy" width="500" height="350">
                    </div>
                    <div class="service-card__content">
                        <h3 class="service-card__title">
                            <?php echo sato_get_svg_icon('shield', 24); ?>
                            防水工事
                        </h3>
                        <p class="service-card__text">ベランダや屋上、バルコニーの防水工事。FRP防水やウレタン防水など、場所や用途に応じた最適な工法で雨漏りを防ぎます。</p>
                        <span class="service-card__link">
                            詳しく見る
                            <?php echo sato_get_svg_icon('arrow-right', 16); ?>
                        </span>
                    </div>
                </a>
                
                <a href="<?php echo esc_url(home_url('/service/repair/')); ?>" class="service-card fade-in-up" style="--delay: 0.4s">
                    <div class="service-card__image">
                        <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=500&h=350&fit=crop" alt="補修・修繕工事の様子" loading="lazy" width="500" height="350">
                    </div>
                    <div class="service-card__content">
                        <h3 class="service-card__title">
                            <?php echo sato_get_svg_icon('check-circle', 24); ?>
                            補修・修繕
                        </h3>
                        <p class="service-card__text">雨樋交換、コーキング打ち替え、外壁のひび割れ補修など。塗装と合わせて行うことで、建物の寿命を長く保ちます。</p>
                        <span class="service-card__link">
                            詳しく見る
                            <?php echo sato_get_svg_icon('arrow-right', 16); ?>
                        </span>
                    </div>
                </a>
            </div>
            
            <div class="section__footer fade-in-up">
                <a href="<?php echo esc_url(home_url('/service/')); ?>" class="btn btn--primary btn--lg">
                    サービス一覧を見る
                    <?php echo sato_get_svg_icon('arrow-right', 20); ?>
                </a>
            </div>
        </div>
    </section>

    <!-- ============================================
         WORKS SECTION（施工実績）
    ============================================= -->
    <section class="section section--works" id="works" aria-labelledby="works-title">
        <div class="container">
            <header class="section__header">
                <span class="section__label">WORKS</span>
                <h2 class="section__title" id="works-title">施工実績</h2>
                <p class="section__description">御殿場市周辺での豊富な施工実績をご紹介します。<br>ビフォーアフターの違いをご覧ください。</p>
            </header>
            
            <?php
            $works_query = sato_get_works(['posts_per_page' => 6]);
            
            if ($works_query->have_posts()) :
            ?>
            <div class="works__grid">
                <?php 
                $delay = 0.1;
                while ($works_query->have_posts()) : $works_query->the_post();
                    $terms = get_the_terms(get_the_ID(), 'works_category');
                    $cat_name = $terms && !is_wp_error($terms) ? $terms[0]->name : '施工実績';
                    $completion_date = get_post_meta(get_the_ID(), '_works_completion_date', true);
                    $area = get_post_meta(get_the_ID(), '_works_area', true);
                    $building_type = get_post_meta(get_the_ID(), '_works_building_type', true);
                ?>
                <article class="works-card fade-in-up" style="--delay: <?php echo $delay; ?>s">
                    <a href="<?php the_permalink(); ?>" class="works-card__link">
                        <div class="works-card__image">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium_large', ['class' => 'works-card__img', 'loading' => 'lazy']); ?>
                            <?php else : ?>
                                <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?w=400&h=300&fit=crop" alt="施工実績" class="works-card__img" loading="lazy">
                            <?php endif; ?>
                            <span class="works-card__category"><?php echo esc_html($cat_name); ?></span>
                        </div>
                        <div class="works-card__content">
                            <div class="works-card__meta">
                                <?php if ($area) : ?>
                                <span class="works-card__area">
                                    <?php echo sato_get_svg_icon('map-pin', 14); ?>
                                    <?php echo esc_html($area); ?>
                                </span>
                                <?php endif; ?>
                                <?php if ($completion_date) : ?>
                                <time class="works-card__date" datetime="<?php echo esc_attr($completion_date); ?>">
                                    <?php echo date_i18n('Y年n月', strtotime($completion_date)); ?>
                                </time>
                                <?php endif; ?>
                            </div>
                            <h3 class="works-card__title"><?php the_title(); ?></h3>
                            <?php if ($building_type) : ?>
                            <span class="works-card__type"><?php echo esc_html($building_type); ?></span>
                            <?php endif; ?>
                        </div>
                    </a>
                </article>
                <?php 
                $delay += 0.1;
                endwhile; 
                ?>
            </div>
            
            <div class="section__footer fade-in-up">
                <a href="<?php echo esc_url(home_url('/works/')); ?>" class="btn btn--outline btn--lg">
                    施工実績をもっと見る
                    <?php echo sato_get_svg_icon('arrow-right', 20); ?>
                </a>
            </div>
            <?php else : ?>
            
            <!-- サンプル施工実績（投稿がない場合） -->
            <div class="works__grid">
                <?php
                $sample_works = [
                    ['title' => '御殿場市 K様邸 外壁・屋根塗装', 'cat' => '外壁塗装', 'area' => '御殿場市', 'type' => '戸建住宅'],
                    ['title' => '裾野市 S様邸 外壁塗装', 'cat' => '外壁塗装', 'area' => '裾野市', 'type' => '戸建住宅'],
                    ['title' => '三島市 T様邸 屋根塗装', 'cat' => '屋根塗装', 'area' => '三島市', 'type' => '戸建住宅'],
                    ['title' => '御殿場市 アパートA棟 外壁塗装', 'cat' => '外壁塗装', 'area' => '御殿場市', 'type' => 'アパート'],
                    ['title' => '沼津市 M様邸 防水工事', 'cat' => '防水工事', 'area' => '沼津市', 'type' => '戸建住宅'],
                    ['title' => '富士市 店舗外壁塗装', 'cat' => '外壁塗装', 'area' => '富士市', 'type' => '店舗'],
                ];
                $delay = 0.1;
                foreach ($sample_works as $work) :
                ?>
                <article class="works-card fade-in-up" style="--delay: <?php echo $delay; ?>s">
                    <div class="works-card__link">
                        <div class="works-card__image">
                            <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?w=400&h=300&fit=crop" alt="<?php echo esc_attr($work['title']); ?>" class="works-card__img" loading="lazy">
                            <span class="works-card__category"><?php echo esc_html($work['cat']); ?></span>
                        </div>
                        <div class="works-card__content">
                            <div class="works-card__meta">
                                <span class="works-card__area">
                                    <?php echo sato_get_svg_icon('map-pin', 14); ?>
                                    <?php echo esc_html($work['area']); ?>
                                </span>
                                <time class="works-card__date">2024年12月</time>
                            </div>
                            <h3 class="works-card__title"><?php echo esc_html($work['title']); ?></h3>
                            <span class="works-card__type"><?php echo esc_html($work['type']); ?></span>
                        </div>
                    </div>
                </article>
                <?php 
                $delay += 0.1;
                endforeach; 
                ?>
            </div>
            
            <div class="section__footer fade-in-up">
                <a href="<?php echo esc_url(home_url('/works/')); ?>" class="btn btn--outline btn--lg">
                    施工実績をもっと見る
                    <?php echo sato_get_svg_icon('arrow-right', 20); ?>
                </a>
            </div>
            <?php endif; wp_reset_postdata(); ?>
        </div>
    </section>

    <!-- ============================================
         FLOW SECTION（ご依頼の流れ）
    ============================================= -->
    <section class="section section--flow" id="flow" aria-labelledby="flow-title">
        <div class="container">
            <header class="section__header">
                <span class="section__label">FLOW</span>
                <h2 class="section__title" id="flow-title">ご依頼の流れ</h2>
                <p class="section__description">お問い合わせから施工完了まで、<br>お客様に寄り添った丁寧な対応を心がけています。</p>
            </header>
            
            <div class="flow__timeline">
                <div class="flow-step fade-in-up" style="--delay: 0.1s">
                    <div class="flow-step__number">
                        <span>01</span>
                    </div>
                    <div class="flow-step__image">
                        <img src="https://images.unsplash.com/photo-1423666639041-f56000c27a9a?w=300&h=200&fit=crop" alt="お問い合わせ" loading="lazy" width="300" height="200">
                    </div>
                    <div class="flow-step__content">
                        <h3 class="flow-step__title">お問い合わせ・ご相談</h3>
                        <p class="flow-step__text">お電話・メール・LINEからお気軽にご連絡ください。ご質問やご不安な点は、何でもお聞きください。</p>
                    </div>
                </div>
                
                <div class="flow-step fade-in-up" style="--delay: 0.2s">
                    <div class="flow-step__number">
                        <span>02</span>
                    </div>
                    <div class="flow-step__image">
                        <img src="https://images.unsplash.com/photo-1581092160562-40aa08e78837?w=300&h=200&fit=crop" alt="現地調査" loading="lazy" width="300" height="200">
                    </div>
                    <div class="flow-step__content">
                        <h3 class="flow-step__title">現地調査・診断（無料）</h3>
                        <p class="flow-step__text">専門スタッフがご自宅にお伺いし、建物の状態を詳しく診断いたします。調査・診断は完全無料です。</p>
                    </div>
                </div>
                
                <div class="flow-step fade-in-up" style="--delay: 0.3s">
                    <div class="flow-step__number">
                        <span>03</span>
                    </div>
                    <div class="flow-step__image">
                        <img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=300&h=200&fit=crop" alt="お見積もり" loading="lazy" width="300" height="200">
                    </div>
                    <div class="flow-step__content">
                        <h3 class="flow-step__title">お見積もり・ご提案</h3>
                        <p class="flow-step__text">診断結果をもとに、最適なプランと詳細なお見積もりをご提案。無理な営業は一切いたしません。</p>
                    </div>
                </div>
                
                <div class="flow-step fade-in-up" style="--delay: 0.4s">
                    <div class="flow-step__number">
                        <span>04</span>
                    </div>
                    <div class="flow-step__image">
                        <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=300&h=200&fit=crop" alt="ご契約" loading="lazy" width="300" height="200">
                    </div>
                    <div class="flow-step__content">
                        <h3 class="flow-step__title">ご契約・打ち合わせ</h3>
                        <p class="flow-step__text">ご納得いただけましたらご契約。色選びのアドバイスやスケジュールの調整を行います。</p>
                    </div>
                </div>
                
                <div class="flow-step fade-in-up" style="--delay: 0.5s">
                    <div class="flow-step__number">
                        <span>05</span>
                    </div>
                    <div class="flow-step__image">
                        <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=300&h=200&fit=crop" alt="施工開始" loading="lazy" width="300" height="200">
                    </div>
                    <div class="flow-step__content">
                        <h3 class="flow-step__title">施工開始</h3>
                        <p class="flow-step__text">近隣へのご挨拶後、丁寧に施工を進めます。進捗状況は随時ご報告いたします。</p>
                    </div>
                </div>
                
                <div class="flow-step fade-in-up" style="--delay: 0.6s">
                    <div class="flow-step__number">
                        <span>06</span>
                    </div>
                    <div class="flow-step__image">
                        <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?w=300&h=200&fit=crop" alt="完工・お引き渡し" loading="lazy" width="300" height="200">
                    </div>
                    <div class="flow-step__content">
                        <h3 class="flow-step__title">完工・検査・お引き渡し</h3>
                        <p class="flow-step__text">施工完了後、お客様立ち会いのもと最終検査。保証書をお渡しし、アフターサポートもお任せください。</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================
         CTA SECTION（中間）
    ============================================= -->
    <section class="section section--cta" aria-label="お問い合わせ">
        <div class="container">
            <div class="cta-box fade-in-up">
                <h2 class="cta-box__title">まずは無料相談から<br class="sp-only">始めませんか？</h2>
                <p class="cta-box__text">現地調査・お見積もりは完全無料。<br>しつこい営業は一切いたしません。</p>
                
                <div class="cta-box__buttons">
                    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn--accent btn--xl">
                        <?php echo sato_get_svg_icon('mail', 24); ?>
                        <span>無料お見積り・ご相談</span>
                    </a>
                    <a href="<?php echo esc_url(sato_get_phone_link()); ?>" class="btn btn--white btn--xl">
                        <?php echo sato_get_svg_icon('phone', 24); ?>
                        <span><?php echo esc_html(sato_get_phone()); ?></span>
                    </a>
                    <?php if ($line_url = sato_get_line_url()) : ?>
                    <a href="<?php echo esc_url($line_url); ?>" target="_blank" rel="noopener noreferrer" class="btn btn--line btn--xl">
                        <?php echo sato_get_svg_icon('line', 24); ?>
                        <span>LINEで相談</span>
                    </a>
                    <?php endif; ?>
                </div>
                
                <p class="cta-box__hours">受付時間：8:00〜18:00（日曜・祝日定休）</p>
            </div>
        </div>
    </section>

    <!-- ============================================
         VOICE SECTION（お客様の声）
    ============================================= -->
    <section class="section section--voice" id="voice" aria-labelledby="voice-title">
        <div class="container">
            <header class="section__header">
                <span class="section__label">VOICE</span>
                <h2 class="section__title" id="voice-title">お客様の声</h2>
                <p class="section__description">実際に施工させていただいたお客様から<br>喜びのお声をいただいております。</p>
            </header>
            
            <?php
            $voice_query = sato_get_voices(['posts_per_page' => 3]);
            
            if ($voice_query->have_posts()) :
            ?>
            <div class="voice__grid">
                <?php 
                $delay = 0.1;
                while ($voice_query->have_posts()) : $voice_query->the_post();
                    $area = get_post_meta(get_the_ID(), '_voice_client_area', true);
                    $initial = get_post_meta(get_the_ID(), '_voice_client_initial', true);
                    $service = get_post_meta(get_the_ID(), '_voice_service_type', true);
                    $rating = get_post_meta(get_the_ID(), '_voice_rating', true);
                ?>
                <article class="voice-card fade-in-up" style="--delay: <?php echo $delay; ?>s">
                    <div class="voice-card__header">
                        <?php if ($rating) : ?>
                        <div class="voice-card__rating">
                            <?php echo sato_rating_stars($rating); ?>
                        </div>
                        <?php endif; ?>
                        <div class="voice-card__info">
                            <span class="voice-card__area"><?php echo esc_html($area ?: '御殿場市'); ?> <?php echo esc_html($initial ?: 'K様'); ?></span>
                            <span class="voice-card__service"><?php echo esc_html($service ?: '外壁塗装'); ?></span>
                        </div>
                    </div>
                    <div class="voice-card__content">
                        <h3 class="voice-card__title"><?php the_title(); ?></h3>
                        <p class="voice-card__text"><?php echo wp_trim_words(get_the_content(), 80, '...'); ?></p>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="voice-card__link">
                        続きを読む
                        <?php echo sato_get_svg_icon('arrow-right', 14); ?>
                    </a>
                </article>
                <?php 
                $delay += 0.15;
                endwhile; 
                ?>
            </div>
            <?php else : ?>
            
            <!-- サンプルお客様の声 -->
            <div class="voice__grid">
                <?php
                $sample_voices = [
                    [
                        'area' => '御殿場市',
                        'initial' => 'K様',
                        'service' => '外壁塗装',
                        'rating' => 5,
                        'title' => '丁寧な仕事に大満足です',
                        'text' => '初めての外壁塗装で不安でしたが、佐藤さんが丁寧に説明してくださり、安心してお任せできました。仕上がりも想像以上で、近所の方からも褒められました。'
                    ],
                    [
                        'area' => '裾野市',
                        'initial' => 'S様',
                        'service' => '屋根塗装',
                        'rating' => 5,
                        'title' => '誠実な対応に感謝',
                        'text' => '他社よりも丁寧な現地調査と、わかりやすい見積もり説明が決め手でした。職人さんの技術も素晴らしく、屋根が見違えるようになりました。'
                    ],
                    [
                        'area' => '三島市',
                        'initial' => 'T様',
                        'service' => '外壁・屋根塗装',
                        'rating' => 5,
                        'title' => 'アフターフォローも安心',
                        'text' => '施工後も定期的に様子を見に来てくださり、長く付き合える業者さんだと感じました。次回もぜひサトー建装さんにお願いしたいです。'
                    ],
                ];
                $delay = 0.1;
                foreach ($sample_voices as $voice) :
                ?>
                <article class="voice-card fade-in-up" style="--delay: <?php echo $delay; ?>s">
                    <div class="voice-card__header">
                        <div class="voice-card__rating">
                            <?php echo sato_rating_stars($voice['rating']); ?>
                        </div>
                        <div class="voice-card__info">
                            <span class="voice-card__area"><?php echo esc_html($voice['area']); ?> <?php echo esc_html($voice['initial']); ?></span>
                            <span class="voice-card__service"><?php echo esc_html($voice['service']); ?></span>
                        </div>
                    </div>
                    <div class="voice-card__content">
                        <h3 class="voice-card__title"><?php echo esc_html($voice['title']); ?></h3>
                        <p class="voice-card__text"><?php echo esc_html($voice['text']); ?></p>
                    </div>
                </article>
                <?php 
                $delay += 0.15;
                endforeach; 
                ?>
            </div>
            <?php endif; wp_reset_postdata(); ?>
            
            <div class="section__footer fade-in-up">
                <a href="<?php echo esc_url(home_url('/voice/')); ?>" class="btn btn--outline btn--lg">
                    お客様の声をもっと見る
                    <?php echo sato_get_svg_icon('arrow-right', 20); ?>
                </a>
            </div>
        </div>
    </section>

    <!-- ============================================
         FAQ SECTION
    ============================================= -->
    <section class="section section--faq" id="faq" aria-labelledby="faq-title">
        <div class="container">
            <header class="section__header">
                <span class="section__label">FAQ</span>
                <h2 class="section__title" id="faq-title">よくある質問</h2>
                <p class="section__description">お客様からよくいただくご質問をまとめました。</p>
            </header>
            
            <div class="faq__list fade-in-up">
                <?php
                $faq_query = sato_get_faqs(['posts_per_page' => 5]);
                
                if ($faq_query->have_posts()) :
                    while ($faq_query->have_posts()) : $faq_query->the_post();
                ?>
                <details class="faq-item">
                    <summary class="faq-item__question">
                        <span class="faq-item__icon-q">Q</span>
                        <span class="faq-item__title"><?php the_title(); ?></span>
                        <span class="faq-item__toggle">
                            <?php echo sato_get_svg_icon('chevron-down', 20); ?>
                        </span>
                    </summary>
                    <div class="faq-item__answer">
                        <span class="faq-item__icon-a">A</span>
                        <div class="faq-item__content">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </details>
                <?php 
                    endwhile;
                else :
                    // サンプルFAQ
                    $sample_faqs = [
                        ['q' => '見積もりは無料ですか？', 'a' => 'はい、現地調査・お見積もりは完全無料です。お気軽にお問い合わせください。'],
                        ['q' => '工事期間はどれくらいかかりますか？', 'a' => '一般的な戸建住宅の場合、外壁塗装で約2週間程度が目安です。天候や建物の大きさにより前後します。'],
                        ['q' => '塗料はどのように選べばいいですか？', 'a' => 'ご予算や建物の状態、ご要望に合わせて最適な塗料をご提案いたします。無料診断時にご相談ください。'],
                        ['q' => '工事中は家にいる必要がありますか？', 'a' => '基本的に外での作業となりますので、ご不在でも問題ありません。ただし、鍵の受け渡しなど必要な場合はご相談させていただきます。'],
                        ['q' => '保証はありますか？', 'a' => 'はい、施工内容に応じて最長' . $warranty_years . '年の保証をご用意しております。詳しくはお見積もり時にご説明いたします。'],
                    ];
                    foreach ($sample_faqs as $faq) :
                ?>
                <details class="faq-item">
                    <summary class="faq-item__question">
                        <span class="faq-item__icon-q">Q</span>
                        <span class="faq-item__title"><?php echo esc_html($faq['q']); ?></span>
                        <span class="faq-item__toggle">
                            <?php echo sato_get_svg_icon('chevron-down', 20); ?>
                        </span>
                    </summary>
                    <div class="faq-item__answer">
                        <span class="faq-item__icon-a">A</span>
                        <div class="faq-item__content">
                            <p><?php echo esc_html($faq['a']); ?></p>
                        </div>
                    </div>
                </details>
                <?php 
                    endforeach;
                endif;
                wp_reset_postdata();
                ?>
            </div>
            
            <div class="section__footer fade-in-up">
                <a href="<?php echo esc_url(home_url('/faq/')); ?>" class="btn btn--primary btn--lg">
                    よくある質問一覧
                    <?php echo sato_get_svg_icon('arrow-right', 20); ?>
                </a>
            </div>
        </div>
    </section>

    <!-- ============================================
         AREA SECTION（対応エリア）
    ============================================= -->
    <section class="section section--area" id="area" aria-labelledby="area-title">
        <div class="container">
            <header class="section__header">
                <span class="section__label">AREA</span>
                <h2 class="section__title" id="area-title">対応エリア</h2>
            </header>
            
            <div class="area__content fade-in-up">
                <div class="area__info">
                    <h3 class="area__subtitle">
                        <?php echo sato_get_svg_icon('map-pin', 24); ?>
                        静岡県東部エリアを中心に対応
                    </h3>
                    <ul class="area__list">
                        <?php 
                        $areas = explode("\n", $service_areas);
                        foreach ($areas as $city) :
                            if (!trim($city)) continue;
                        ?>
                        <li><?php echo esc_html(trim($city)); ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <p class="area__note"><?php echo nl2br(esc_html($area_note)); ?></p>
                </div>
                
                <div class="area__map">
                    <?php if ($google_map_url) : ?>
                    <iframe 
                        src="<?php echo esc_url($google_map_url); ?>" 
                        width="100%" 
                        height="400" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        title="サトー建装の対応エリアマップ"
                    ></iframe>
                    <?php else : ?>
                    <div class="area__map-placeholder">
                        <img src="https://maps.googleapis.com/maps/api/staticmap?center=御殿場市,静岡県&zoom=10&size=600x400&maptype=roadmap&language=ja" alt="対応エリアマップ" loading="lazy">
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================
         NEWS SECTION
    ============================================= -->
    <section class="section section--news" id="news" aria-labelledby="news-title">
        <div class="container">
            <header class="section__header">
                <span class="section__label">NEWS</span>
                <h2 class="section__title" id="news-title">お知らせ・ブログ</h2>
            </header>
            
            <?php
            $news_query = sato_get_news(['posts_per_page' => 3]);
            
            if ($news_query->have_posts()) :
            ?>
            <div class="news__grid fade-in-up">
                <?php while ($news_query->have_posts()) : $news_query->the_post();
                    $terms = get_the_terms(get_the_ID(), 'news_category');
                    $cat_name = $terms && !is_wp_error($terms) ? $terms[0]->name : 'お知らせ';
                ?>
                <article class="news-card">
                    <a href="<?php the_permalink(); ?>" class="news-card__link">
                        <div class="news-card__image">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium', ['loading' => 'lazy']); ?>
                            <?php else : ?>
                                <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?w=400&h=250&fit=crop" alt="お知らせ" loading="lazy">
                            <?php endif; ?>
                        </div>
                        <div class="news-card__content">
                            <div class="news-card__meta">
                                <time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date('Y.m.d'); ?></time>
                                <span class="news-card__category"><?php echo esc_html($cat_name); ?></span>
                            </div>
                            <h3 class="news-card__title"><?php the_title(); ?></h3>
                        </div>
                    </a>
                </article>
                <?php endwhile; ?>
            </div>
            <?php else : ?>
            <p class="text-center">現在お知らせはありません。</p>
            <?php endif; wp_reset_postdata(); ?>
            
            <div class="section__footer fade-in-up">
                <a href="<?php echo esc_url(home_url('/news/')); ?>" class="btn btn--outline btn--lg">
                    記事一覧を見る
                    <?php echo sato_get_svg_icon('arrow-right', 20); ?>
                </a>
            </div>
        </div>
    </section>

    <!-- ============================================
         FINAL CTA SECTION
    ============================================= -->
    <section class="section section--final-cta" aria-label="お問い合わせ">
        <div class="container">
            <div class="final-cta fade-in-up">
                <h2 class="final-cta__title">塗装のことなら<br>サトー建装にお任せください</h2>
                <p class="final-cta__text">現地調査・お見積もりは無料です。<br>しつこい営業は一切いたしませんので、まずはお気軽にご相談ください。</p>
                
                <div class="final-cta__buttons">
                    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn--accent btn--xxl">
                        <?php echo sato_get_svg_icon('mail', 28); ?>
                        <span>無料お見積り・ご相談</span>
                    </a>
                    <a href="<?php echo esc_url(sato_get_phone_link()); ?>" class="btn btn--white btn--xxl">
                        <?php echo sato_get_svg_icon('phone', 28); ?>
                        <span><?php echo esc_html(sato_get_phone()); ?></span>
                    </a>
                </div>
                
                <ul class="final-cta__features">
                    <li><?php echo sato_get_svg_icon('check-circle', 20); ?>外壁の汚れ・色あせが気になる</li>
                    <li><?php echo sato_get_svg_icon('check-circle', 20); ?>屋根の状態が心配</li>
                    <li><?php echo sato_get_svg_icon('check-circle', 20); ?>他社の見積もりが適正か確認したい</li>
                    <li><?php echo sato_get_svg_icon('check-circle', 20); ?>長く付き合える業者を探している</li>
                </ul>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
