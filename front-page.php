<?php
/**
 * Front Page Template
 * サトー建装 公式Webサイトテーマ
 * 
 * @package     SatoKenso
 * @version     3.0.0
 * @description functions.php v3.0.0 に完全対応した最適化版フロントページ
 */

// 直接アクセス防止
if (!defined('ABSPATH')) {
    exit;
}

get_header();

/*==============================================================================
 * カスタマイザー設定の取得（functions.phpのヘルパー関数を使用）
 *============================================================================*/

// 会社情報
$company_name = sato_get_company_name();
$phone_number = sato_get_phone_number();
$phone_link = sato_get_phone_link();
$line_url = sato_get_line_url();
$years_in_business = sato_get_years_in_business();
$warranty_years = sato_get_warranty_years();

// ヒーローセクション
$hero_catchphrase = get_theme_mod('hero_catchphrase', '地域密着20年の信頼と実績');
$hero_subcatch = get_theme_mod('hero_subcatch', '外壁・屋根塗装のことなら');
$hero_image = get_theme_mod('hero_image', '');
$hero_image_mobile = get_theme_mod('hero_image_mobile', '');

// デフォルトヒーロー画像
if (empty($hero_image)) {
    $hero_image = 'https://satokens.jp/wp-content/uploads/2025/12/Gemini_Generated_Image_wzbnsjwzbnsjwzbn.png';
}

// サービスエリア
$service_areas = sato_get_service_areas();
$service_area_description = get_theme_mod('service_area_description', '静岡県東部エリアを中心に対応');
$google_map_embed = get_theme_mod('google_map_embed', '');

// 選ばれる理由
$reason_1_title = get_theme_mod('reason_1_title', '完全自社施工');
$reason_1_description = get_theme_mod('reason_1_description', '中間マージンなしの適正価格');
$reason_1_image = get_theme_mod('reason_1_image', '');

$reason_2_title = get_theme_mod('reason_2_title', '一級塗装技能士在籍');
$reason_2_description = get_theme_mod('reason_2_description', '国家資格保有の職人が施工');
$reason_2_image = get_theme_mod('reason_2_image', '');

$reason_3_title = get_theme_mod('reason_3_title', '安心の10年保証');
$reason_3_description = get_theme_mod('reason_3_description', '施工後のアフターフォローも万全');
$reason_3_image = get_theme_mod('reason_3_image', '');

// CTA設定
$cta_heading = get_theme_mod('cta_heading', 'まずは無料でご相談ください');
$cta_description = get_theme_mod('cta_description', 'お見積りは無料です。お気軽にお問い合わせください。');

// 代表挨拶
$greeting_message = get_theme_mod('greeting_message', '');
$greeting_image = get_theme_mod('greeting_image', '');
$representative_name = get_theme_mod('representative_name', '');

// 営業情報
$business_hours = get_theme_mod('business_hours', '9:00〜18:00');
$closed_days = get_theme_mod('closed_days', '日曜・祝日');

// 問題セクション画像
$problems_image_url = 'https://satokens.jp/wp-content/uploads/2025/12/Gemini_Generated_Image_i2horvi2horvi2ho.png';

// 年数表示（創業年が設定されていれば計算、なければデフォルト20年）
$years_display = !empty($years_in_business) ? $years_in_business : '20';
?>

<main class="front-page" id="main-content" role="main">

    <!-- ============================================
         HERO SECTION
    ============================================= -->
    <section class="hero" aria-label="<?php esc_attr_e('メインビジュアル', 'sato-kenso'); ?>">
        <picture class="hero__bg-picture">
            <?php if (!empty($hero_image_mobile)) : ?>
            <source media="(max-width: 768px)" srcset="<?php echo esc_url($hero_image_mobile); ?>">
            <?php endif; ?>
            <img src="<?php echo esc_url($hero_image); ?>" alt="<?php echo esc_attr($company_name); ?>の塗装職人が作業する風景" class="hero__bg" loading="eager" fetchpriority="high">
        </picture>
        <div class="hero__overlay" aria-hidden="true"></div>
        
        <div class="hero__content">
            <div class="container">
                <div class="hero__inner fade-in-up">
                    <p class="hero__subcatch"><?php echo esc_html($hero_subcatch); ?></p>
                    <h1 class="hero__catchphrase">
                        <?php echo nl2br(esc_html($hero_catchphrase)); ?>
                    </h1>
                    
                    <div class="hero__badges" role="list">
                        <span class="badge badge--primary" role="listitem">
                            <?php echo sato_get_svg_icon('location', 'badge__icon'); ?>
                            地域密着<?php echo esc_html($years_display); ?>年
                        </span>
                        <span class="badge badge--primary" role="listitem">
                            <?php echo sato_get_svg_icon('handshake', 'badge__icon'); ?>
                            完全自社施工
                        </span>
                        <span class="badge badge--accent" role="listitem">
                            <?php echo sato_get_svg_icon('certificate', 'badge__icon'); ?>
                            一級塗装技能士
                        </span>
                    </div>
                    
                    <div class="hero__cta">
                        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn--accent btn--xl btn--glow">
                            <?php echo sato_get_svg_icon('mail', 'btn__icon'); ?>
                            <span>無料お見積り・ご相談</span>
                        </a>
                        <a href="<?php echo esc_url($phone_link); ?>" class="btn btn--white btn--xl">
                            <?php echo sato_get_svg_icon('phone', 'btn__icon'); ?>
                            <span><?php echo esc_html($phone_number); ?></span>
                        </a>
                    </div>
                    
                    <p class="hero__note">
                        <?php echo sato_get_svg_icon('check', 'hero__note-icon'); ?>
                        しつこい営業は一切いたしません
                    </p>
                </div>
            </div>
        </div>
        
        <div class="hero__scroll" aria-hidden="true">
            <span>Scroll</span>
            <div class="hero__scroll-line"></div>
        </div>
    </section>

    <!-- ============================================
         PROBLEMS SECTION（お悩み）
    ============================================= -->
    <section class="section section--problems" id="problems" aria-labelledby="problems-title">
        <div class="container">
            <header class="section__header">
                <span class="section__label">PROBLEMS</span>
                <h2 class="section__title" id="problems-title">
                    こんな<span class="text-accent">お悩み</span>ありませんか？
                </h2>
                <p class="section__description">
                    外壁や屋根の劣化は、放っておくと建物の寿命を縮める原因になります。<br>
                    少しでも気になる症状があれば、お早めにご相談ください。
                </p>
            </header>
            
            <!-- 問題ビジュアル画像 -->
            <div class="problems__visual fade-in-up">
                <img 
                    src="<?php echo esc_url($problems_image_url); ?>" 
                    alt="外壁の劣化症状：ひび割れ、チョーキング、コケ、色褪せなどの例" 
                    class="problems__image" 
                    loading="lazy" 
                    width="1200" 
                    height="600"
                >
            </div>
            
            <div class="problems__grid">
                <article class="problem-card fade-in-up" style="--delay: 0.1s">
                    <div class="problem-card__icon" aria-hidden="true">
                        <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M32 8L8 24V56H56V24L32 8Z" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M20 32L32 44L44 32" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M24 36L32 44L40 36" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" opacity="0.5"/>
                        </svg>
                    </div>
                    <h3 class="problem-card__title">外壁のひび割れ</h3>
                    <p class="problem-card__text">小さなひび割れ（クラック）から雨水が浸入し、建物の構造部分を腐食させる可能性があります。</p>
                </article>
                
                <article class="problem-card fade-in-up" style="--delay: 0.2s">
                    <div class="problem-card__icon" aria-hidden="true">
                        <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="32" cy="32" r="20" stroke="currentColor" stroke-width="3"/>
                            <path d="M24 28C26 24 30 22 32 22" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            <circle cx="28" cy="36" r="2" fill="currentColor"/>
                            <circle cx="36" cy="32" r="2" fill="currentColor"/>
                            <circle cx="32" cy="40" r="2" fill="currentColor"/>
                        </svg>
                    </div>
                    <h3 class="problem-card__title">壁を触ると白い粉がつく</h3>
                    <p class="problem-card__text">チョーキング現象と呼ばれ、塗膜の防水機能が低下しているサインです。塗り替え時期の目安になります。</p>
                </article>
                
                <article class="problem-card fade-in-up" style="--delay: 0.3s">
                    <div class="problem-card__icon" aria-hidden="true">
                        <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <ellipse cx="32" cy="40" rx="20" ry="12" stroke="currentColor" stroke-width="3"/>
                            <path d="M20 36C22 30 26 26 32 24C38 26 42 30 44 36" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            <circle cx="28" cy="38" r="3" fill="currentColor" opacity="0.5"/>
                            <circle cx="38" cy="42" r="4" fill="currentColor" opacity="0.5"/>
                        </svg>
                    </div>
                    <h3 class="problem-card__title">コケ・カビ・藻の発生</h3>
                    <p class="problem-card__text">日当たりが悪い場所に発生しやすく、塗膜の劣化や美観を損なう原因になります。</p>
                </article>
                
                <article class="problem-card fade-in-up" style="--delay: 0.4s">
                    <div class="problem-card__icon" aria-hidden="true">
                        <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M32 12C24 20 16 28 16 40C16 48 23 54 32 54C41 54 48 48 48 40C48 28 40 20 32 12Z" stroke="currentColor" stroke-width="3"/>
                            <path d="M24 40C24 44 27 48 32 48" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <h3 class="problem-card__title">雨漏り・シミ</h3>
                    <p class="problem-card__text">天井や壁にシミができている場合、すでに雨漏りが進行している危険性があります。早急な対応が必要です。</p>
                </article>
            </div>
            
            <div class="problems__cta fade-in-up">
                <p class="problems__cta-text">
                    そのお悩み、<strong class="text-accent"><?php echo esc_html($company_name); ?></strong>にお任せください！
                </p>
                <div class="problems__cta-arrow" aria-hidden="true">
                    <?php echo sato_get_svg_icon('chevron-down', 'problems__arrow-icon'); ?>
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
                <h2 class="section__title" id="reasons-title">
                    <?php echo esc_html($company_name); ?>が選ばれる<span class="text-accent">3つの理由</span>
                </h2>
                <p class="section__description">
                    お客様に安心して工事をお任せいただくために、<br>
                    私たちは「品質」「価格」「安心」に徹底的にこだわっています。
                </p>
            </header>
            
            <div class="reasons__list">
                <!-- 理由1：完全自社施工 -->
                <article class="reason-card fade-in-up">
                    <div class="reason-card__number" aria-hidden="true">01</div>
                    <div class="reason-card__image">
                        <?php if (!empty($reason_1_image)) : ?>
                        <img src="<?php echo esc_url($reason_1_image); ?>" alt="<?php echo esc_attr($reason_1_title); ?>" loading="lazy" width="600" height="400">
                        <?php else : ?>
                        <img src="<?php echo esc_url(SATO_ASSETS_URI . '/images/reason-01.jpg'); ?>" alt="自社職人による丁寧な施工風景" loading="lazy" width="600" height="400">
                        <?php endif; ?>
                    </div>
                    <div class="reason-card__content">
                        <h3 class="reason-card__title">
                            <?php echo sato_get_svg_icon('handshake', 'reason-card__icon'); ?>
                            <?php echo esc_html($reason_1_title); ?>
                        </h3>
                        <p class="reason-card__text"><?php echo esc_html($reason_1_description); ?></p>
                        <p class="reason-card__detail">
                            当社では下請け業者を使わず、すべての工事を自社の職人が直接施工いたします。
                            中間マージンをカットすることで、高品質な施工を適正価格でご提供。
                            また、現場との連携がスムーズなため、お客様のご要望にも迅速に対応できます。
                        </p>
                        <ul class="reason-card__points" role="list">
                            <li role="listitem"><?php echo sato_get_svg_icon('check', 'reason-card__check'); ?>中間マージン0円</li>
                            <li role="listitem"><?php echo sato_get_svg_icon('check', 'reason-card__check'); ?>責任施工で安心</li>
                            <li role="listitem"><?php echo sato_get_svg_icon('check', 'reason-card__check'); ?>迅速な対応力</li>
                        </ul>
                    </div>
                </article>
                
                <!-- 理由2：一級塗装技能士 -->
                <article class="reason-card reason-card--reverse fade-in-up">
                    <div class="reason-card__number" aria-hidden="true">02</div>
                    <div class="reason-card__image">
                        <?php if (!empty($reason_2_image)) : ?>
                        <img src="<?php echo esc_url($reason_2_image); ?>" alt="<?php echo esc_attr($reason_2_title); ?>" loading="lazy" width="600" height="400">
                        <?php else : ?>
                        <img src="<?php echo esc_url(SATO_ASSETS_URI . '/images/reason-02.jpg'); ?>" alt="国家資格を持つ職人の丁寧な作業" loading="lazy" width="600" height="400">
                        <?php endif; ?>
                    </div>
                    <div class="reason-card__content">
                        <h3 class="reason-card__title">
                            <?php echo sato_get_svg_icon('certificate', 'reason-card__icon'); ?>
                            <?php echo esc_html($reason_2_title); ?>
                        </h3>
                        <p class="reason-card__text"><?php echo esc_html($reason_2_description); ?></p>
                        <p class="reason-card__detail">
                            代表をはじめ、当社の職人は国家資格である「一級塗装技能士」を保有。
                            長年の経験と確かな技術で、お客様の大切な住まいを守ります。
                            塗料の特性を熟知し、建物の状態に合わせた最適な施工をご提案いたします。
                        </p>
                        <ul class="reason-card__points" role="list">
                            <li role="listitem"><?php echo sato_get_svg_icon('check', 'reason-card__check'); ?>国家資格保有者が施工</li>
                            <li role="listitem"><?php echo sato_get_svg_icon('check', 'reason-card__check'); ?><?php echo esc_html($years_display); ?>年以上の実績</li>
                            <li role="listitem"><?php echo sato_get_svg_icon('check', 'reason-card__check'); ?>丁寧な下地処理</li>
                        </ul>
                    </div>
                </article>
                
                <!-- 理由3：地域密着・アフター保証 -->
                <article class="reason-card fade-in-up">
                    <div class="reason-card__number" aria-hidden="true">03</div>
                    <div class="reason-card__image">
                        <?php if (!empty($reason_3_image)) : ?>
                        <img src="<?php echo esc_url($reason_3_image); ?>" alt="<?php echo esc_attr($reason_3_title); ?>" loading="lazy" width="600" height="400">
                        <?php else : ?>
                        <img src="<?php echo esc_url(SATO_ASSETS_URI . '/images/reason-03.jpg'); ?>" alt="地域密着のアフターサポート" loading="lazy" width="600" height="400">
                        <?php endif; ?>
                    </div>
                    <div class="reason-card__content">
                        <h3 class="reason-card__title">
                            <?php echo sato_get_svg_icon('shield', 'reason-card__icon'); ?>
                            <?php echo esc_html($reason_3_title); ?>
                        </h3>
                        <p class="reason-card__text"><?php echo esc_html($reason_3_description); ?></p>
                        <p class="reason-card__detail">
                            御殿場市を拠点に地域密着で営業しているからこそ、施工後のアフターフォローも万全です。
                            最長<?php echo esc_html($warranty_years); ?>年の保証をご用意し、定期点検や万が一の不具合にも迅速に対応。
                            地元で長く営業を続けてきた信頼と実績があります。
                        </p>
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
         SERVICE SECTION（サービス案内）
    ============================================= -->
    <section class="section section--service" id="service" aria-labelledby="service-title">
        <div class="container">
            <header class="section__header">
                <span class="section__label">SERVICE</span>
                <h2 class="section__title" id="service-title">サービス案内</h2>
                <p class="section__description">
                    戸建て住宅から店舗・アパートまで、<br>
                    塗装に関するあらゆる工事に対応いたします。
                </p>
            </header>
            
            <?php
            // サービスカスタム投稿タイプから取得
            $services_query = sato_get_custom_posts('service', array(
                'posts_per_page' => 4,
                'orderby' => 'menu_order',
                'order' => 'ASC'
            ));
            
            if ($services_query->have_posts()) :
            ?>
            <div class="services__grid">
                <?php 
                $delay = 0.1;
                $count = 0;
                while ($services_query->have_posts()) : $services_query->the_post();
                    $icon = get_post_meta(get_the_ID(), '_service_icon', true);
                    $price_from = get_post_meta(get_the_ID(), '_service_price_from', true);
                    $is_popular = ($count === 0); // 最初のサービスを人気として表示
                ?>
                <a href="<?php the_permalink(); ?>" class="service-card fade-in-up" style="--delay: <?php echo esc_attr($delay); ?>s">
                    <div class="service-card__image">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('works-card', array('class' => 'service-card__img', 'loading' => 'lazy')); ?>
                        <?php else : ?>
                            <img src="<?php echo esc_url(SATO_ASSETS_URI . '/images/service-default.jpg'); ?>" alt="<?php the_title_attribute(); ?>" class="service-card__img" loading="lazy">
                        <?php endif; ?>
                        <?php if ($is_popular) : ?>
                        <span class="service-card__badge">人気No.1</span>
                        <?php endif; ?>
                    </div>
                    <div class="service-card__content">
                        <h3 class="service-card__title">
                            <?php echo sato_get_svg_icon($icon ?: 'home', 'service-card__icon'); ?>
                            <?php the_title(); ?>
                        </h3>
                        <?php if (has_excerpt()) : ?>
                        <p class="service-card__text"><?php echo esc_html(get_the_excerpt()); ?></p>
                        <?php endif; ?>
                        <?php if ($price_from) : ?>
                        <p class="service-card__price">
                            <span class="price-label">参考価格</span>
                            <span class="price-value"><?php echo number_format(intval($price_from)); ?>円〜</span>
                        </p>
                        <?php endif; ?>
                        <span class="service-card__link">
                            詳しく見る
                            <?php echo sato_get_svg_icon('arrow-right', 'service-card__arrow'); ?>
                        </span>
                    </div>
                </a>
                <?php 
                $delay += 0.1;
                $count++;
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
            <?php else : ?>
            <!-- サービス投稿がない場合のフォールバック -->
            <div class="services__grid">
                <?php
                $default_services = array(
                    array(
                        'title' => '外壁塗装',
                        'icon' => 'home',
                        'text' => '美観の向上だけでなく、建物を雨風から守るための外壁塗装工事。シリコン・フッ素・無機塗料など、お客様のご予算とご要望に合わせた塗料をご提案します。',
                        'popular' => true,
                        'link' => '/service/exterior/'
                    ),
                    array(
                        'title' => '屋根塗装',
                        'icon' => 'roof',
                        'text' => '紫外線や雨風から建物を守る屋根。遮熱・断熱効果のある塗料で、夏は涼しく冬は暖かい快適な住環境を実現します。',
                        'popular' => false,
                        'link' => '/service/roof/'
                    ),
                    array(
                        'title' => '防水工事',
                        'icon' => 'waterproof',
                        'text' => 'ベランダや屋上、バルコニーの防水工事。FRP防水やウレタン防水など、場所や用途に応じた最適な工法で雨漏りを防ぎます。',
                        'popular' => false,
                        'link' => '/service/waterproof/'
                    ),
                    array(
                        'title' => '補修・修繕',
                        'icon' => 'repair',
                        'text' => '雨樋交換、コーキング打ち替え、外壁のひび割れ補修など。塗装と合わせて行うことで、建物の寿命を長く保ちます。',
                        'popular' => false,
                        'link' => '/service/repair/'
                    ),
                );
                
                $delay = 0.1;
                foreach ($default_services as $service) :
                ?>
                <a href="<?php echo esc_url(home_url($service['link'])); ?>" class="service-card fade-in-up" style="--delay: <?php echo esc_attr($delay); ?>s">
                    <div class="service-card__image">
                        <img src="<?php echo esc_url(SATO_ASSETS_URI . '/images/service-' . $service['icon'] . '.jpg'); ?>" alt="<?php echo esc_attr($service['title']); ?>の施工事例" class="service-card__img" loading="lazy" width="500" height="350">
                        <?php if ($service['popular']) : ?>
                        <span class="service-card__badge">人気No.1</span>
                        <?php endif; ?>
                    </div>
                    <div class="service-card__content">
                        <h3 class="service-card__title">
                            <?php echo sato_get_svg_icon($service['icon'], 'service-card__icon'); ?>
                            <?php echo esc_html($service['title']); ?>
                        </h3>
                        <p class="service-card__text"><?php echo esc_html($service['text']); ?></p>
                        <span class="service-card__link">
                            詳しく見る
                            <?php echo sato_get_svg_icon('arrow-right', 'service-card__arrow'); ?>
                        </span>
                    </div>
                </a>
                <?php 
                $delay += 0.1;
                endforeach;
                ?>
            </div>
            <?php endif; ?>
            
            <div class="section__footer fade-in-up">
                <a href="<?php echo esc_url(home_url('/service/')); ?>" class="btn btn--primary btn--lg">
                    サービス一覧を見る
                    <?php echo sato_get_svg_icon('arrow-right', 'btn__icon'); ?>
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
                <p class="section__description">
                    御殿場市周辺での豊富な施工実績をご紹介します。<br>
                    ビフォーアフターの違いをご覧ください。
                </p>
            </header>
            
            <?php
            // 注目の施工実績を取得
            $works_query = sato_get_featured_works(6);
            
            if ($works_query->have_posts()) :
            ?>
            <div class="works__grid">
                <?php 
                $delay = 0.1;
                while ($works_query->have_posts()) : $works_query->the_post();
                    // カスタムフィールド取得
                    $price = get_post_meta(get_the_ID(), '_works_price', true);
                    $price_display = get_post_meta(get_the_ID(), '_works_price_display', true);
                    $period = get_post_meta(get_the_ID(), '_works_period', true);
                    $paint_brand = get_post_meta(get_the_ID(), '_works_paint_brand', true);
                    $client = get_post_meta(get_the_ID(), '_works_client', true);
                    $construction_year = get_post_meta(get_the_ID(), '_works_year', true);
                    $is_featured = get_post_meta(get_the_ID(), '_works_featured', true);
                    
                    // タクソノミー取得
                    $categories = get_the_terms(get_the_ID(), 'works_category');
                    $areas = get_the_terms(get_the_ID(), 'works_area');
                    $buildings = get_the_terms(get_the_ID(), 'works_building');
                    
                    $cat_name = ($categories && !is_wp_error($categories)) ? $categories[0]->name : '施工実績';
                    $area_name = ($areas && !is_wp_error($areas)) ? $areas[0]->name : '';
                    $building_name = ($buildings && !is_wp_error($buildings)) ? $buildings[0]->name : '';
                    
                    // 施工年月の表示フォーマット
                    $date_display = '';
                    if ($construction_year) {
                        $date_display = date_i18n('Y年n月', strtotime($construction_year . '-01'));
                    }
                ?>
                <article class="works-card fade-in-up<?php echo $is_featured ? ' works-card--featured' : ''; ?>" style="--delay: <?php echo esc_attr($delay); ?>s">
                    <a href="<?php the_permalink(); ?>" class="works-card__link">
                        <div class="works-card__image">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('works-card', array('class' => 'works-card__img', 'loading' => 'lazy')); ?>
                            <?php else : ?>
                                <img src="<?php echo esc_url(SATO_ASSETS_URI . '/images/works-default.jpg'); ?>" alt="<?php the_title_attribute(); ?>" class="works-card__img" loading="lazy">
                            <?php endif; ?>
                            <span class="works-card__category"><?php echo esc_html($cat_name); ?></span>
                            <?php if ($is_featured) : ?>
                            <span class="works-card__featured-badge">おすすめ</span>
                            <?php endif; ?>
                        </div>
                        <div class="works-card__content">
                            <div class="works-card__meta">
                                <?php if ($area_name) : ?>
                                <span class="works-card__area">
                                    <?php echo sato_get_svg_icon('location', 'works-card__meta-icon'); ?>
                                    <?php echo esc_html($area_name); ?>
                                </span>
                                <?php endif; ?>
                                <?php if ($date_display) : ?>
                                <time class="works-card__date" datetime="<?php echo esc_attr($construction_year); ?>">
                                    <?php echo esc_html($date_display); ?>
                                </time>
                                <?php endif; ?>
                            </div>
                            <h3 class="works-card__title"><?php the_title(); ?></h3>
                            <?php if ($building_name) : ?>
                            <span class="works-card__type"><?php echo esc_html($building_name); ?></span>
                            <?php endif; ?>
                            <?php if ($price_display || $price) : ?>
                            <p class="works-card__price">
                                <?php echo esc_html($price_display ?: number_format(intval($price)) . '円'); ?>
                            </p>
                            <?php endif; ?>
                        </div>
                    </a>
                </article>
                <?php 
                $delay += 0.1;
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
            
            <div class="section__footer fade-in-up">
                <a href="<?php echo esc_url(home_url('/works/')); ?>" class="btn btn--outline btn--lg" id="load-more-works" data-page="1">
                    施工実績をもっと見る
                    <?php echo sato_get_svg_icon('arrow-right', 'btn__icon'); ?>
                </a>
            </div>
            
            <?php else : ?>
            <p class="section__empty"><?php esc_html_e('施工実績は準備中です。', 'sato-kenso'); ?></p>
            <?php endif; ?>
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
                <p class="section__description">
                    お問い合わせから施工完了まで、<br>
                    お客様に寄り添った丁寧な対応を心がけています。
                </p>
            </header>
            
            <ol class="flow__timeline" role="list">
                <li class="flow-step fade-in-up" style="--delay: 0.1s">
                    <div class="flow-step__number" aria-hidden="true">
                        <span>01</span>
                    </div>
                    <div class="flow-step__image">
                        <img src="<?php echo esc_url(SATO_ASSETS_URI . '/images/flow-01.jpg'); ?>" alt="お問い合わせのイメージ" loading="lazy" width="300" height="200">
                    </div>
                    <div class="flow-step__content">
                        <h3 class="flow-step__title">お問い合わせ・ご相談</h3>
                        <p class="flow-step__text">
                            お電話・メール・LINEからお気軽にご連絡ください。
                            ご質問やご不安な点は、何でもお聞きください。
                        </p>
                        <div class="flow-step__contact">
                            <a href="<?php echo esc_url($phone_link); ?>" class="flow-step__phone">
                                <?php echo sato_get_svg_icon('phone', 'flow-step__icon'); ?>
                                <?php echo esc_html($phone_number); ?>
                            </a>
                        </div>
                    </div>
                </li>
                
                <li class="flow-step fade-in-up" style="--delay: 0.2s">
                    <div class="flow-step__number" aria-hidden="true">
                        <span>02</span>
                    </div>
                    <div class="flow-step__image">
                        <img src="<?php echo esc_url(SATO_ASSETS_URI . '/images/flow-02.jpg'); ?>" alt="現地調査のイメージ" loading="lazy" width="300" height="200">
                    </div>
                    <div class="flow-step__content">
                        <h3 class="flow-step__title">現地調査・診断<span class="flow-step__badge">無料</span></h3>
                        <p class="flow-step__text">
                            専門スタッフがご自宅にお伺いし、建物の状態を詳しく診断いたします。
                            調査・診断は完全無料です。
                        </p>
                    </div>
                </li>
                
                <li class="flow-step fade-in-up" style="--delay: 0.3s">
                    <div class="flow-step__number" aria-hidden="true">
                        <span>03</span>
                    </div>
                    <div class="flow-step__image">
                        <img src="<?php echo esc_url(SATO_ASSETS_URI . '/images/flow-03.jpg'); ?>" alt="お見積もりのイメージ" loading="lazy" width="300" height="200">
                    </div>
                    <div class="flow-step__content">
                        <h3 class="flow-step__title">お見積もり・ご提案</h3>
                        <p class="flow-step__text">
                            診断結果をもとに、最適なプランと詳細なお見積もりをご提案。
                            無理な営業は一切いたしません。
                        </p>
                    </div>
                </li>
                
                <li class="flow-step fade-in-up" style="--delay: 0.4s">
                    <div class="flow-step__number" aria-hidden="true">
                        <span>04</span>
                    </div>
                    <div class="flow-step__image">
                        <img src="<?php echo esc_url(SATO_ASSETS_URI . '/images/flow-04.jpg'); ?>" alt="ご契約のイメージ" loading="lazy" width="300" height="200">
                    </div>
                    <div class="flow-step__content">
                        <h3 class="flow-step__title">ご契約・打ち合わせ</h3>
                        <p class="flow-step__text">
                            ご納得いただけましたらご契約。
                            色選びのアドバイスやスケジュールの調整を行います。
                        </p>
                    </div>
                </li>
                
                <li class="flow-step fade-in-up" style="--delay: 0.5s">
                    <div class="flow-step__number" aria-hidden="true">
                        <span>05</span>
                    </div>
                    <div class="flow-step__image">
                        <img src="<?php echo esc_url(SATO_ASSETS_URI . '/images/flow-05.jpg'); ?>" alt="施工開始のイメージ" loading="lazy" width="300" height="200">
                    </div>
                    <div class="flow-step__content">
                        <h3 class="flow-step__title">施工開始</h3>
                        <p class="flow-step__text">
                            近隣へのご挨拶後、丁寧に施工を進めます。
                            進捗状況は随時ご報告いたします。
                        </p>
                    </div>
                </li>
                
                <li class="flow-step fade-in-up" style="--delay: 0.6s">
                    <div class="flow-step__number" aria-hidden="true">
                        <span>06</span>
                    </div>
                    <div class="flow-step__image">
                        <img src="<?php echo esc_url(SATO_ASSETS_URI . '/images/flow-06.jpg'); ?>" alt="完工・お引き渡しのイメージ" loading="lazy" width="300" height="200">
                    </div>
                    <div class="flow-step__content">
                        <h3 class="flow-step__title">完工・検査・お引き渡し</h3>
                        <p class="flow-step__text">
                            施工完了後、お客様立ち会いのもと最終検査。
                            保証書をお渡しし、アフターサポートもお任せください。
                        </p>
                        <p class="flow-step__warranty">
                            <?php echo sato_get_svg_icon('shield', 'flow-step__warranty-icon'); ?>
                            最長<?php echo esc_html($warranty_years); ?>年保証
                        </p>
                    </div>
                </li>
            </ol>
        </div>
    </section>

    <!-- ============================================
         CTA SECTION（中間）
    ============================================= -->
    <section class="section section--cta" aria-labelledby="cta-mid-title">
        <div class="container">
            <div class="cta-box fade-in-up">
                <h2 class="cta-box__title" id="cta-mid-title"><?php echo nl2br(esc_html($cta_heading)); ?></h2>
                <p class="cta-box__text"><?php echo nl2br(esc_html($cta_description)); ?></p>
                
                <div class="cta-box__buttons">
                    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn--accent btn--xl btn--glow">
                        <?php echo sato_get_svg_icon('mail', 'btn__icon'); ?>
                        <span>無料お見積り・ご相談</span>
                    </a>
                    <a href="<?php echo esc_url($phone_link); ?>" class="btn btn--white btn--xl">
                        <?php echo sato_get_svg_icon('phone', 'btn__icon'); ?>
                        <span><?php echo esc_html($phone_number); ?></span>
                    </a>
                    <?php if (!empty($line_url)) : ?>
                    <a href="<?php echo esc_url($line_url); ?>" target="_blank" rel="noopener noreferrer" class="btn btn--line btn--xl">
                        <?php echo sato_get_svg_icon('line', 'btn__icon'); ?>
                        <span>LINEで相談</span>
                    </a>
                    <?php endif; ?>
                </div>
                
                <p class="cta-box__hours">
                    <?php echo sato_get_svg_icon('clock', 'cta-box__hours-icon'); ?>
                    受付時間：<?php echo esc_html($business_hours); ?>（<?php echo esc_html($closed_days); ?>定休）
                </p>
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
                <p class="section__description">
                    実際に施工させていただいたお客様から<br>
                    喜びのお声をいただいております。
                </p>
            </header>
            
            <?php
            $voice_query = sato_get_custom_posts('voice', array(
                'posts_per_page' => 3
            ));
            
            if ($voice_query->have_posts()) :
            ?>
            <div class="voice__slider">
                <?php 
                $delay = 0.1;
                while ($voice_query->have_posts()) : $voice_query->the_post();
                    // カスタムフィールド取得
                    $client_name = get_post_meta(get_the_ID(), '_voice_client_name', true);
                    $client_area = get_post_meta(get_the_ID(), '_voice_client_area', true);
                    $client_age = get_post_meta(get_the_ID(), '_voice_client_age', true);
                    $rating = get_post_meta(get_the_ID(), '_voice_rating', true);
                    $work_type = get_post_meta(get_the_ID(), '_voice_work_type', true);
                    $linked_work = get_post_meta(get_the_ID(), '_voice_linked_work', true);
                    
                    $rating = $rating ? intval($rating) : 5;
                ?>
                <article class="voice-card fade-in-up" style="--delay: <?php echo esc_attr($delay); ?>s">
                    <div class="voice-card__header">
                        <div class="voice-card__rating">
                            <?php echo sato_get_rating_stars($rating); ?>
                        </div>
                        <div class="voice-card__info">
                            <span class="voice-card__client">
                                <?php echo esc_html($client_area ?: '御殿場市'); ?> 
                                <?php echo esc_html($client_name ?: 'お客様'); ?>
                                <?php if ($client_age) : ?>
                                （<?php echo esc_html($client_age); ?>）
                                <?php endif; ?>
                            </span>
                            <?php if ($work_type) : ?>
                            <span class="voice-card__service"><?php echo esc_html($work_type); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="voice-card__content">
                        <h3 class="voice-card__title"><?php the_title(); ?></h3>
                        <div class="voice-card__text">
                            <?php echo wp_trim_words(get_the_content(), 100, '...'); ?>
                        </div>
                    </div>
                    <footer class="voice-card__footer">
                        <a href="<?php the_permalink(); ?>" class="voice-card__link">
                            続きを読む
                            <?php echo sato_get_svg_icon('arrow-right', 'voice-card__link-icon'); ?>
                        </a>
                        <?php if ($linked_work) : ?>
                        <a href="<?php echo esc_url(get_permalink($linked_work)); ?>" class="voice-card__work-link">
                            施工事例を見る
                        </a>
                        <?php endif; ?>
                    </footer>
                </article>
                <?php 
                $delay += 0.15;
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
            <?php else : ?>
            <!-- サンプルお客様の声 -->
            <div class="voice__slider">
                <?php
                $sample_voices = array(
                    array(
                        'name' => 'K様',
                        'area' => '御殿場市',
                        'age' => '50代',
                        'service' => '外壁塗装',
                        'rating' => 5,
                        'title' => '丁寧な仕事に大満足です',
                        'text' => '初めての外壁塗装で不安でしたが、佐藤さんが丁寧に説明してくださり、安心してお任せできました。仕上がりも想像以上で、近所の方からも褒められました。'
                    ),
                    array(
                        'name' => 'S様',
                        'area' => '裾野市',
                        'age' => '40代',
                        'service' => '屋根塗装',
                        'rating' => 5,
                        'title' => '誠実な対応に感謝',
                        'text' => '他社よりも丁寧な現地調査と、わかりやすい見積もり説明が決め手でした。職人さんの技術も素晴らしく、屋根が見違えるようになりました。'
                    ),
                    array(
                        'name' => 'T様',
                        'area' => '三島市',
                        'age' => '60代',
                        'service' => '外壁・屋根塗装',
                        'rating' => 5,
                        'title' => 'アフターフォローも安心',
                        'text' => '施工後も定期的に様子を見に来てくださり、長く付き合える業者さんだと感じました。次回もぜひサトー建装さんにお願いしたいです。'
                    ),
                );
                
                $delay = 0.1;
                foreach ($sample_voices as $voice) :
                ?>
                <article class="voice-card fade-in-up" style="--delay: <?php echo esc_attr($delay); ?>s">
                    <div class="voice-card__header">
                        <div class="voice-card__rating">
                            <?php echo sato_get_rating_stars($voice['rating']); ?>
                        </div>
                        <div class="voice-card__info">
                            <span class="voice-card__client">
                                <?php echo esc_html($voice['area']); ?> <?php echo esc_html($voice['name']); ?>（<?php echo esc_html($voice['age']); ?>）
                            </span>
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
            <?php endif; ?>
            
            <div class="section__footer fade-in-up">
                <a href="<?php echo esc_url(home_url('/voice/')); ?>" class="btn btn--outline btn--lg">
                    お客様の声をもっと見る
                    <?php echo sato_get_svg_icon('arrow-right', 'btn__icon'); ?>
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
            
            <div class="faq__list fade-in-up" role="list">
                <?php
                // 注目FAQを取得
                $faq_query = sato_get_featured_faqs(5);
                
                if ($faq_query->have_posts()) :
                    while ($faq_query->have_posts()) : $faq_query->the_post();
                ?>
                <details class="faq-item" role="listitem">
                    <summary class="faq-item__question">
                        <span class="faq-item__icon-q" aria-hidden="true">Q</span>
                        <span class="faq-item__title"><?php the_title(); ?></span>
                        <span class="faq-item__toggle" aria-hidden="true">
                            <?php echo sato_get_svg_icon('chevron-down', 'faq-item__toggle-icon'); ?>
                        </span>
                    </summary>
                    <div class="faq-item__answer">
                        <span class="faq-item__icon-a" aria-hidden="true">A</span>
                        <div class="faq-item__content">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </details>
                <?php 
                    endwhile;
                    wp_reset_postdata();
                else :
                    // サンプルFAQ
                    $sample_faqs = array(
                        array(
                            'q' => '見積もりは無料ですか？',
                            'a' => 'はい、現地調査・お見積もりは完全無料です。お気軽にお問い合わせください。'
                        ),
                        array(
                            'q' => '工事期間はどれくらいかかりますか？',
                            'a' => '一般的な戸建住宅の場合、外壁塗装で約2週間程度が目安です。天候や建物の大きさにより前後します。'
                        ),
                        array(
                            'q' => '塗料はどのように選べばいいですか？',
                            'a' => 'ご予算や建物の状態、ご要望に合わせて最適な塗料をご提案いたします。無料診断時にご相談ください。'
                        ),
                        array(
                            'q' => '工事中は家にいる必要がありますか？',
                            'a' => '基本的に外での作業となりますので、ご不在でも問題ありません。ただし、鍵の受け渡しなど必要な場合はご相談させていただきます。'
                        ),
                        array(
                            'q' => '保証はありますか？',
                            'a' => 'はい、施工内容に応じて最長' . esc_html($warranty_years) . '年の保証をご用意しております。詳しくはお見積もり時にご説明いたします。'
                        ),
                    );
                    
                    foreach ($sample_faqs as $faq) :
                ?>
                <details class="faq-item" role="listitem">
                    <summary class="faq-item__question">
                        <span class="faq-item__icon-q" aria-hidden="true">Q</span>
                        <span class="faq-item__title"><?php echo esc_html($faq['q']); ?></span>
                        <span class="faq-item__toggle" aria-hidden="true">
                            <?php echo sato_get_svg_icon('chevron-down', 'faq-item__toggle-icon'); ?>
                        </span>
                    </summary>
                    <div class="faq-item__answer">
                        <span class="faq-item__icon-a" aria-hidden="true">A</span>
                        <div class="faq-item__content">
                            <p><?php echo esc_html($faq['a']); ?></p>
                        </div>
                    </div>
                </details>
                <?php 
                    endforeach;
                endif;
                ?>
            </div>
            
            <div class="section__footer fade-in-up">
                <a href="<?php echo esc_url(home_url('/faq/')); ?>" class="btn btn--primary btn--lg">
                    よくある質問一覧
                    <?php echo sato_get_svg_icon('arrow-right', 'btn__icon'); ?>
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
                <p class="section__description"><?php echo esc_html($service_area_description); ?></p>
            </header>
            
            <div class="area__content fade-in-up">
                <div class="area__info">
                    <h3 class="area__subtitle">
                        <?php echo sato_get_svg_icon('location', 'area__icon'); ?>
                        主な対応エリア
                    </h3>
                    <ul class="area__list" role="list">
                        <?php foreach ($service_areas as $area) : ?>
                        <li role="listitem">
                            <?php echo sato_get_svg_icon('check', 'area__check-icon'); ?>
                            <?php echo esc_html($area); ?>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <p class="area__note">
                        <?php echo sato_get_svg_icon('check', 'area__note-icon'); ?>
                        その他、静岡県東部エリアもご対応可能です。<br>
                        まずはお気軽にお問い合わせください。
                    </p>
                    
                    <div class="area__cta">
                        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn--primary btn--md">
                            <?php echo sato_get_svg_icon('mail', 'btn__icon'); ?>
                            対応可能かお問い合わせ
                        </a>
                    </div>
                </div>
                
                <div class="area__map">
                    <?php if (!empty($google_map_embed)) : ?>
                        <?php echo wp_kses_post($google_map_embed); ?>
                    <?php else : ?>
                    <div class="area__map-placeholder">
                        <img 
                            src="https://maps.googleapis.com/maps/api/staticmap?center=御殿場市,静岡県,Japan&zoom=10&size=600x400&maptype=roadmap&language=ja&key=" 
                            alt="<?php echo esc_attr($company_name); ?>の対応エリアマップ" 
                            loading="lazy"
                            width="600"
                            height="400"
                        >
                        <p class="area__map-note">
                            <?php echo sato_get_svg_icon('location', 'area__map-note-icon'); ?>
                            御殿場市を中心に静岡県東部エリアに対応
                        </p>
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
            $news_query = sato_get_custom_posts('news', array(
                'posts_per_page' => 3
            ));
            
            if ($news_query->have_posts()) :
            ?>
            <div class="news__grid fade-in-up">
                <?php 
                while ($news_query->have_posts()) : $news_query->the_post();
                    $categories = get_the_terms(get_the_ID(), 'news_category');
                    $cat_name = ($categories && !is_wp_error($categories)) ? $categories[0]->name : 'お知らせ';
                    $cat_slug = ($categories && !is_wp_error($categories)) ? $categories[0]->slug : 'info';
                ?>
                <article class="news-card">
                    <a href="<?php the_permalink(); ?>" class="news-card__link">
                        <div class="news-card__image">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium', array('class' => 'news-card__img', 'loading' => 'lazy')); ?>
                            <?php else : ?>
                                <img src="<?php echo esc_url(SATO_ASSETS_URI . '/images/news-default.jpg'); ?>" alt="<?php the_title_attribute(); ?>" class="news-card__img" loading="lazy">
                            <?php endif; ?>
                        </div>
                        <div class="news-card__content">
                            <div class="news-card__meta">
                                <time class="news-card__date" datetime="<?php echo esc_attr(get_the_date('Y-m-d')); ?>">
                                    <?php echo esc_html(get_the_date('Y.m.d')); ?>
                                </time>
                                <span class="news-card__category news-card__category--<?php echo esc_attr($cat_slug); ?>">
                                    <?php echo esc_html($cat_name); ?>
                                </span>
                            </div>
                            <h3 class="news-card__title"><?php the_title(); ?></h3>
                        </div>
                    </a>
                </article>
                <?php 
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
            <?php else : ?>
            <p class="section__empty"><?php esc_html_e('現在お知らせはありません。', 'sato-kenso'); ?></p>
            <?php endif; ?>
            
            <div class="section__footer fade-in-up">
                <a href="<?php echo esc_url(home_url('/news/')); ?>" class="btn btn--outline btn--lg">
                    記事一覧を見る
                    <?php echo sato_get_svg_icon('arrow-right', 'btn__icon'); ?>
                </a>
            </div>
        </div>
    </section>

    <!-- ============================================
         FINAL CTA SECTION
    ============================================= -->
    <section class="section section--final-cta" aria-labelledby="final-cta-title">
        <div class="container">
            <div class="final-cta fade-in-up">
                <h2 class="final-cta__title" id="final-cta-title">
                    塗装のことなら<br>
                    <span class="text-accent"><?php echo esc_html($company_name); ?></span>にお任せください
                </h2>
                <p class="final-cta__text">
                    現地調査・お見積もりは無料です。<br>
                    しつこい営業は一切いたしませんので、まずはお気軽にご相談ください。
                </p>
                
                <div class="final-cta__buttons">
                    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn--accent btn--xxl btn--glow">
                        <?php echo sato_get_svg_icon('mail', 'btn__icon'); ?>
                        <span>無料お見積り・ご相談</span>
                    </a>
                    <a href="<?php echo esc_url($phone_link); ?>" class="btn btn--white btn--xxl">
                        <?php echo sato_get_svg_icon('phone', 'btn__icon'); ?>
                        <span><?php echo esc_html($phone_number); ?></span>
                    </a>
                </div>
                
                <ul class="final-cta__features" role="list">
                    <li role="listitem">
                        <?php echo sato_get_svg_icon('check', 'final-cta__check'); ?>
                        外壁の汚れ・色あせが気になる
                    </li>
                    <li role="listitem">
                        <?php echo sato_get_svg_icon('check', 'final-cta__check'); ?>
                        屋根の状態が心配
                    </li>
                    <li role="listitem">
                        <?php echo sato_get_svg_icon('check', 'final-cta__check'); ?>
                        他社の見積もりが適正か確認したい
                    </li>
                    <li role="listitem">
                        <?php echo sato_get_svg_icon('check', 'final-cta__check'); ?>
                        長く付き合える業者を探している
                    </li>
                </ul>
                
                <p class="final-cta__hours">
                    <?php echo sato_get_svg_icon('clock', 'final-cta__hours-icon'); ?>
                    受付時間：<?php echo esc_html($business_hours); ?>（<?php echo esc_html($closed_days); ?>定休）
                </p>
            </div>
        </div>
    </section>

</main>

<?php
/*==============================================================================
 * SEO: 構造化データ（JSON-LD）
 *============================================================================*/
$company_address = get_theme_mod('company_address', '');
$company_zip = get_theme_mod('company_zip', '');
$company_email = get_theme_mod('company_email', '');
$founding_year = get_theme_mod('founding_year', '');

// LocalBusiness構造化データ
$schema = array(
    '@context' => 'https://schema.org',
    '@type' => 'LocalBusiness',
    '@id' => home_url('/#organization'),
    'name' => $company_name,
    'description' => get_theme_mod('site_description', $company_name . 'は、御殿場市を中心に静岡県東部で外壁塗装・屋根塗装を行う塗装専門店です。一級塗装技能士が在籍し、完全自社施工で高品質な塗装工事をご提供しています。'),
    'url' => home_url('/'),
    'telephone' => $phone_number,
    'priceRange' => '¥¥',
    'image' => get_theme_mod('default_ogp_image', ''),
    'sameAs' => array_filter(array(
        get_theme_mod('facebook_url', ''),
        get_theme_mod('instagram_url', ''),
        get_theme_mod('youtube_url', ''),
        get_theme_mod('google_business_url', ''),
    )),
    'areaServed' => array_map(function($area) {
        return array(
            '@type' => 'City',
            'name' => $area,
            'containedInPlace' => array(
                '@type' => 'State',
                'name' => '静岡県'
            )
        );
    }, $service_areas),
    'hasOfferCatalog' => array(
        '@type' => 'OfferCatalog',
        'name' => '塗装サービス',
        'itemListElement' => array(
            array(
                '@type' => 'Offer',
                'itemOffered' => array(
                    '@type' => 'Service',
                    'name' => '外壁塗装',
                    'description' => '住宅・店舗・アパートの外壁塗装工事'
                )
            ),
            array(
                '@type' => 'Offer',
                'itemOffered' => array(
                    '@type' => 'Service',
                    'name' => '屋根塗装',
                    'description' => '各種屋根材の塗装工事'
                )
            ),
            array(
                '@type' => 'Offer',
                'itemOffered' => array(
                    '@type' => 'Service',
                    'name' => '防水工事',
                    'description' => 'ベランダ・屋上の防水工事'
                )
            ),
        )
    ),
    'openingHoursSpecification' => array(
        '@type' => 'OpeningHoursSpecification',
        'dayOfWeek' => array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'),
        'opens' => '09:00',
        'closes' => '18:00'
    ),
);

// 住所情報
if (!empty($company_address)) {
    $schema['address'] = array(
        '@type' => 'PostalAddress',
        'streetAddress' => $company_address,
        'addressLocality' => '御殿場市',
        'addressRegion' => '静岡県',
        'postalCode' => $company_zip,
        'addressCountry' => 'JP'
    );
}

// メールアドレス
if (!empty($company_email)) {
    $schema['email'] = $company_email;
}

// 創業年
if (!empty($founding_year)) {
    $schema['foundingDate'] = $founding_year;
}
?>

<script type="application/ld+json">
<?php echo wp_json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT); ?>
</script>

<?php get_footer(); ?>
