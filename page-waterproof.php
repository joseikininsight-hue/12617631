<?php
/**
 * Template Name: 防水工事サービスページ
 * Template Post Type: page, service
 * Description: 防水工事サービスの詳細ページ - プロフェッショナルな塗装会社向けデザイン
 * Author: Senior WordPress Engineer
 * Version: 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

// =============================================================================
// 設定・データ取得
// =============================================================================
$company_name    = sato_get_company_name();
$phone           = sato_get_phone();
$phone_link      = sato_get_phone_link();
$line_url        = sato_get_line_url();
$business_hours  = get_theme_mod('sato_business_hours', '8:00〜18:00');
$warranty_years  = sato_get_warranty_years();

// 構造化データ
$schema_service = [
    '@context' => 'https://schema.org',
    '@type' => 'Service',
    'name' => '防水工事',
    'description' => '御殿場市・静岡県東部エリアの防水工事専門。ベランダ・屋上・外壁の雨漏り対策から大規模防水まで、一級防水施工技能士が対応。',
    'provider' => [
        '@type' => 'LocalBusiness',
        'name' => sato_get_company_name(true),
        'telephone' => $phone,
        'address' => [
            '@type' => 'PostalAddress',
            'addressLocality' => '御殿場市',
            'addressRegion' => '静岡県',
            'addressCountry' => 'JP',
        ],
    ],
    'areaServed' => [
        '@type' => 'State',
        'name' => '静岡県東部',
    ],
    'serviceType' => '防水工事',
];
?>

<script type="application/ld+json">
<?php echo wp_json_encode($schema_service, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT); ?>
</script>

<main id="main" class="service-page service-page--waterproof" role="main">

    <!-- =========================================================================
         PAGE HERO
         ========================================================================= -->
    <section class="page-hero" aria-label="ページヘッダー">
        <div class="page-hero__bg">
            <div class="page-hero__bg-image" style="background-image: url('https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&q=80&w=1920');"></div>
            <div class="page-hero__bg-overlay"></div>
        </div>
        
        <div class="container">
            <div class="page-hero__content">
                <!-- パンくずリスト -->
                <nav class="breadcrumb" aria-label="パンくずリスト">
                    <ol class="breadcrumb__list">
                        <li class="breadcrumb__item">
                            <a href="<?php echo home_url('/'); ?>" class="breadcrumb__link">
                                <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                                ホーム
                            </a>
                            <span class="breadcrumb__separator">
                                <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
                            </span>
                        </li>
                        <li class="breadcrumb__item">
                            <a href="<?php echo home_url('/service/'); ?>" class="breadcrumb__link">サービス</a>
                            <span class="breadcrumb__separator">
                                <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
                            </span>
                        </li>
                        <li class="breadcrumb__item">
                            <span class="breadcrumb__current" aria-current="page">防水工事</span>
                        </li>
                    </ol>
                </nav>

                <span class="page-hero__label">WATERPROOFING</span>
                <h1 class="page-hero__title">防水工事</h1>
                <p class="page-hero__lead">
                    ベランダ・屋上・外壁からの雨漏りを根本解決。<br>
                    一級防水施工技能士が、建物を水害から守ります。
                </p>

                <div class="page-hero__badges">
                    <span class="page-hero__badge">
                        <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg>
                        最長<?php echo esc_html($warranty_years); ?>年保証
                    </span>
                    <span class="page-hero__badge">
                        <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="8" r="7"/><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"/></svg>
                        一級防水施工技能士
                    </span>
                    <span class="page-hero__badge">
                        <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                        完全自社施工
                    </span>
                </div>
            </div>
        </div>

        <!-- 波形装飾 -->
        <div class="page-hero__wave">
            <svg viewBox="0 0 1440 120" preserveAspectRatio="none">
                <path d="M0,60 C360,120 720,0 1080,60 C1260,90 1380,90 1440,60 L1440,120 L0,120 Z" fill="#ffffff"/>
            </svg>
        </div>
    </section>

    <!-- =========================================================================
         TROUBLE SECTION - こんなお悩みありませんか
         ========================================================================= -->
    <section class="section trouble" aria-labelledby="trouble-heading">
        <div class="container">
            <header class="section__header section__header--center">
                <span class="section__label">TROUBLE</span>
                <h2 class="section__title" id="trouble-heading">
                    こんな<span class="marker marker--warning">症状</span>ありませんか？
                </h2>
                <p class="section__lead">
                    雨漏りは早期発見・早期対処が重要です。<br>
                    以下の症状が見られたら、すぐにご相談ください。
                </p>
            </header>

            <div class="trouble__grid">
                <div class="trouble-card">
                    <div class="trouble-card__icon">
                        <svg viewBox="0 0 24 24" width="48" height="48" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"/>
                            <path d="M12 22v-6" stroke-dasharray="2 2"/>
                        </svg>
                    </div>
                    <h3 class="trouble-card__title">天井にシミがある</h3>
                    <p class="trouble-card__text">
                        天井や壁に茶色いシミが出現していませんか？これは雨水が内部に侵入しているサインです。放置すると構造材が腐食します。
                    </p>
                </div>

                <div class="trouble-card">
                    <div class="trouble-card__icon">
                        <svg viewBox="0 0 24 24" width="48" height="48" fill="none" stroke="currentColor" stroke-width="1.5">
                            <rect x="3" y="3" width="18" height="18" rx="2"/>
                            <path d="M3 9h18"/>
                            <path d="M9 21V9"/>
                            <circle cx="6" cy="6" r="1" fill="currentColor"/>
                        </svg>
                    </div>
                    <h3 class="trouble-card__title">ベランダの床がひび割れ</h3>
                    <p class="trouble-card__text">
                        FRP防水やウレタン防水の床面にひび割れや浮きが発生。水が浸透し、下階への雨漏りや構造体の劣化を招きます。
                    </p>
                </div>

                <div class="trouble-card">
                    <div class="trouble-card__icon">
                        <svg viewBox="0 0 24 24" width="48" height="48" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M12 3v18"/>
                            <path d="M5 8l7-5 7 5"/>
                            <path d="M5 12h14"/>
                            <path d="M7 16c0 2 2.5 4 5 4s5-2 5-4"/>
                        </svg>
                    </div>
                    <h3 class="trouble-card__title">屋上の水たまり</h3>
                    <p class="trouble-card__text">
                        屋上やルーフバルコニーに水が溜まりやすくなっていませんか？排水不良や防水層の劣化が進行している可能性があります。
                    </p>
                </div>

                <div class="trouble-card">
                    <div class="trouble-card__icon">
                        <svg viewBox="0 0 24 24" width="48" height="48" fill="none" stroke="currentColor" stroke-width="1.5">
                            <circle cx="12" cy="12" r="10"/>
                            <path d="M12 6v6l4 2"/>
                        </svg>
                    </div>
                    <h3 class="trouble-card__title">前回の防水から10年以上</h3>
                    <p class="trouble-card__text">
                        一般的な防水工事の耐用年数は10〜15年。定期的なメンテナンスで、大規模修繕を防ぎ、建物の資産価値を守れます。
                    </p>
                </div>

                <div class="trouble-card">
                    <div class="trouble-card__icon">
                        <svg viewBox="0 0 24 24" width="48" height="48" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/>
                            <path d="M12 5v14" stroke-dasharray="3 3"/>
                        </svg>
                    </div>
                    <h3 class="trouble-card__title">カビ・異臭が発生</h3>
                    <p class="trouble-card__text">
                        室内にカビが発生したり、湿った臭いがする場合は、壁内や天井裏に水が入り込んでいる可能性大。健康被害の原因にも。
                    </p>
                </div>

                <div class="trouble-card">
                    <div class="trouble-card__icon">
                        <svg viewBox="0 0 24 24" width="48" height="48" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/>
                            <line x1="12" y1="9" x2="12" y2="13"/>
                            <line x1="12" y1="17" x2="12.01" y2="17"/>
                        </svg>
                    </div>
                    <h3 class="trouble-card__title">雨の日に雨漏り</h3>
                    <p class="trouble-card__text">
                        大雨や台風のたびに雨漏りが発生するなら、すでに防水層が機能していません。至急の対応が必要です。
                    </p>
                </div>
            </div>

            <div class="trouble__cta">
                <div class="trouble__cta-box">
                    <div class="trouble__cta-icon">
                        <svg viewBox="0 0 24 24" width="40" height="40" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"/>
                            <line x1="12" y1="8" x2="12" y2="12"/>
                            <line x1="12" y1="16" x2="12.01" y2="16"/>
                        </svg>
                    </div>
                    <div class="trouble__cta-content">
                        <p class="trouble__cta-text">
                            <strong>雨漏りは放置厳禁！</strong><br>
                            被害が拡大する前に、まずは無料診断をご利用ください。<br>
                            原因特定から最適な工法のご提案まで、プロが丁寧に対応します。
                        </p>
                    </div>
                    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn--primary btn--lg">
                        <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                        無料診断を申し込む
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- =========================================================================
         WATERPROOF TYPES - 防水工法の種類
         ========================================================================= -->
    <section class="section waterproof-types" aria-labelledby="types-heading">
        <div class="waterproof-types__bg"></div>
        
        <div class="container">
            <header class="section__header section__header--center">
                <span class="section__label">WATERPROOFING TYPES</span>
                <h2 class="section__title" id="types-heading">
                    <span class="marker marker--primary">防水工法</span>の種類
                </h2>
                <p class="section__lead">
                    建物の状態や用途に応じて、最適な防水工法をご提案します。<br>
                    各工法のメリット・デメリットを熟知した職人が施工いたします。
                </p>
            </header>

            <div class="waterproof-types__list">
                <!-- ウレタン防水 -->
                <article class="type-card">
                    <div class="type-card__image">
                        <img src="https://images.unsplash.com/photo-1621905252507-b35492cc74b4?auto=format&fit=crop&q=80&w=800" 
                             alt="ウレタン防水の施工イメージ" 
                             loading="lazy"
                             width="400"
                             height="300">
                        <span class="type-card__badge type-card__badge--popular">人気No.1</span>
                    </div>
                    <div class="type-card__body">
                        <div class="type-card__header">
                            <h3 class="type-card__title">ウレタン防水</h3>
                            <span class="type-card__subtitle">URETHANE WATERPROOFING</span>
                        </div>
                        
                        <p class="type-card__desc">
                            液状のウレタン樹脂を塗布して防水層を形成。複雑な形状にも対応でき、継ぎ目のないシームレスな仕上がりが特徴です。
                        </p>

                        <div class="type-card__specs">
                            <div class="type-card__spec">
                                <span class="type-card__spec-label">耐用年数</span>
                                <span class="type-card__spec-value">10〜12年</span>
                            </div>
                            <div class="type-card__spec">
                                <span class="type-card__spec-label">適用箇所</span>
                                <span class="type-card__spec-value">ベランダ・屋上・陸屋根</span>
                            </div>
                        </div>

                        <div class="type-card__features">
                            <h4 class="type-card__features-title">特徴・メリット</h4>
                            <ul class="type-card__features-list">
                                <li>
                                    <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                                    複雑な形状にも対応可能
                                </li>
                                <li>
                                    <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                                    軽量で建物に負担をかけない
                                </li>
                                <li>
                                    <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                                    改修工事にも最適
                                </li>
                                <li>
                                    <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                                    比較的コストを抑えられる
                                </li>
                            </ul>
                        </div>

                        <div class="type-card__price">
                            <span class="type-card__price-label">参考価格</span>
                            <span class="type-card__price-value">¥4,500〜/㎡</span>
                            <span class="type-card__price-note">（税込・トップコート込）</span>
                        </div>
                    </div>
                </article>

                <!-- FRP防水 -->
                <article class="type-card">
                    <div class="type-card__image">
                        <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?auto=format&fit=crop&q=80&w=800" 
                             alt="FRP防水の施工イメージ" 
                             loading="lazy"
                             width="400"
                             height="300">
                        <span class="type-card__badge type-card__badge--strong">高耐久</span>
                    </div>
                    <div class="type-card__body">
                        <div class="type-card__header">
                            <h3 class="type-card__title">FRP防水</h3>
                            <span class="type-card__subtitle">FRP WATERPROOFING</span>
                        </div>
                        
                        <p class="type-card__desc">
                            ガラス繊維で強化されたプラスチック（FRP）で防水層を形成。船舶にも使用される高い強度と防水性が特徴です。
                        </p>

                        <div class="type-card__specs">
                            <div class="type-card__spec">
                                <span class="type-card__spec-label">耐用年数</span>
                                <span class="type-card__spec-value">10〜15年</span>
                            </div>
                            <div class="type-card__spec">
                                <span class="type-card__spec-label">適用箇所</span>
                                <span class="type-card__spec-value">ベランダ・バルコニー</span>
                            </div>
                        </div>

                        <div class="type-card__features">
                            <h4 class="type-card__features-title">特徴・メリット</h4>
                            <ul class="type-card__features-list">
                                <li>
                                    <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                                    非常に高い強度と耐久性
                                </li>
                                <li>
                                    <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                                    歩行による摩耗に強い
                                </li>
                                <li>
                                    <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                                    軽量で工期が短い
                                </li>
                                <li>
                                    <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                                    戸建住宅に最適
                                </li>
                            </ul>
                        </div>

                        <div class="type-card__price">
                            <span class="type-card__price-label">参考価格</span>
                            <span class="type-card__price-value">¥5,500〜/㎡</span>
                            <span class="type-card__price-note">（税込・トップコート込）</span>
                        </div>
                    </div>
                </article>

                <!-- シート防水 -->
                <article class="type-card">
                    <div class="type-card__image">
                        <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&q=80&w=800" 
                             alt="シート防水の施工イメージ" 
                             loading="lazy"
                             width="400"
                             height="300">
                        <span class="type-card__badge type-card__badge--eco">広い面積に</span>
                    </div>
                    <div class="type-card__body">
                        <div class="type-card__header">
                            <h3 class="type-card__title">シート防水</h3>
                            <span class="type-card__subtitle">SHEET WATERPROOFING</span>
                        </div>
                        
                        <p class="type-card__desc">
                            塩化ビニールやゴムシートを貼り付けて防水層を形成。工場生産のシートにより、安定した品質が得られます。
                        </p>

                        <div class="type-card__specs">
                            <div class="type-card__spec">
                                <span class="type-card__spec-label">耐用年数</span>
                                <span class="type-card__spec-value">12〜15年</span>
                            </div>
                            <div class="type-card__spec">
                                <span class="type-card__spec-label">適用箇所</span>
                                <span class="type-card__spec-value">屋上・陸屋根・大規模施設</span>
                            </div>
                        </div>

                        <div class="type-card__features">
                            <h4 class="type-card__features-title">特徴・メリット</h4>
                            <ul class="type-card__features-list">
                                <li>
                                    <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                                    広い面積を効率的に施工
                                </li>
                                <li>
                                    <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                                    紫外線・熱に強い
                                </li>
                                <li>
                                    <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                                    メンテナンスが容易
                                </li>
                                <li>
                                    <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                                    改修工事にも対応
                                </li>
                            </ul>
                        </div>

                        <div class="type-card__price">
                            <span class="type-card__price-label">参考価格</span>
                            <span class="type-card__price-value">¥5,000〜/㎡</span>
                            <span class="type-card__price-note">（税込・密着工法の場合）</span>
                        </div>
                    </div>
                </article>

                <!-- アスファルト防水 -->
                <article class="type-card">
                    <div class="type-card__image">
                        <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?auto=format&fit=crop&q=80&w=800" 
                             alt="アスファルト防水の施工イメージ" 
                             loading="lazy"
                             width="400"
                             height="300">
                        <span class="type-card__badge type-card__badge--premium">最高耐久</span>
                    </div>
                    <div class="type-card__body">
                        <div class="type-card__header">
                            <h3 class="type-card__title">アスファルト防水</h3>
                            <span class="type-card__subtitle">ASPHALT WATERPROOFING</span>
                        </div>
                        
                        <p class="type-card__desc">
                            100年以上の歴史を持つ最も信頼性の高い防水工法。複数の層を重ねることで、高い耐久性と防水性を実現します。
                        </p>

                        <div class="type-card__specs">
                            <div class="type-card__spec">
                                <span class="type-card__spec-label">耐用年数</span>
                                <span class="type-card__spec-value">15〜25年</span>
                            </div>
                            <div class="type-card__spec">
                                <span class="type-card__spec-label">適用箇所</span>
                                <span class="type-card__spec-value">大規模屋上・ビル・マンション</span>
                            </div>
                        </div>

                        <div class="type-card__features">
                            <h4 class="type-card__features-title">特徴・メリット</h4>
                            <ul class="type-card__features-list">
                                <li>
                                    <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                                    最も実績のある工法
                                </li>
                                <li>
                                    <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                                    耐久性が非常に高い
                                </li>
                                <li>
                                    <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                                    防水層が厚く信頼性高
                                </li>
                                <li>
                                    <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                                    大規模建築に最適
                                </li>
                            </ul>
                        </div>

                        <div class="type-card__price">
                            <span class="type-card__price-label">参考価格</span>
                            <span class="type-card__price-value">¥7,000〜/㎡</span>
                            <span class="type-card__price-note">（税込・トーチ工法の場合）</span>
                        </div>
                    </div>
                </article>
            </div>

            <p class="waterproof-types__note">
                ※価格は目安です。建物の状態・既存防水層の種類・面積により変動します。正確な金額は現地調査後にお見積りいたします。
            </p>
        </div>
    </section>

    <!-- =========================================================================
         COMPARISON TABLE - 工法比較表
         ========================================================================= -->
    <section class="section comparison" aria-labelledby="comparison-heading">
        <div class="container">
            <header class="section__header section__header--center">
                <span class="section__label">COMPARISON</span>
                <h2 class="section__title" id="comparison-heading">
                    防水工法<span class="marker marker--accent">比較表</span>
                </h2>
                <p class="section__lead">
                    各工法の特性を一覧で比較できます。<br>
                    お客様の建物に最適な工法をご提案いたします。
                </p>
            </header>

            <div class="comparison__table-wrapper">
                <table class="comparison__table">
                    <thead>
                        <tr>
                            <th>工法</th>
                            <th>耐用年数</th>
                            <th>コスト</th>
                            <th>強度</th>
                            <th>適用場所</th>
                            <th>特徴</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td data-label="工法">
                                <strong>ウレタン防水</strong>
                            </td>
                            <td data-label="耐用年数">10〜12年</td>
                            <td data-label="コスト">
                                <span class="cost-indicator">
                                    <span class="cost-dot cost-dot--active"></span>
                                    <span class="cost-dot cost-dot--active"></span>
                                    <span class="cost-dot"></span>
                                    <span class="cost-dot"></span>
                                </span>
                            </td>
                            <td data-label="強度">
                                <span class="strength-indicator">
                                    <span class="strength-bar strength-bar--active"></span>
                                    <span class="strength-bar strength-bar--active"></span>
                                    <span class="strength-bar strength-bar--active"></span>
                                    <span class="strength-bar"></span>
                                </span>
                            </td>
                            <td data-label="適用場所">ベランダ・屋上</td>
                            <td data-label="特徴">複雑な形状に対応可</td>
                        </tr>
                        <tr>
                            <td data-label="工法">
                                <strong>FRP防水</strong>
                            </td>
                            <td data-label="耐用年数">10〜15年</td>
                            <td data-label="コスト">
                                <span class="cost-indicator">
                                    <span class="cost-dot cost-dot--active"></span>
                                    <span class="cost-dot cost-dot--active"></span>
                                    <span class="cost-dot cost-dot--active"></span>
                                    <span class="cost-dot"></span>
                                </span>
                            </td>
                            <td data-label="強度">
                                <span class="strength-indicator">
                                    <span class="strength-bar strength-bar--active"></span>
                                    <span class="strength-bar strength-bar--active"></span>
                                    <span class="strength-bar strength-bar--active"></span>
                                    <span class="strength-bar strength-bar--active"></span>
                                </span>
                            </td>
                            <td data-label="適用場所">ベランダ・バルコニー</td>
                            <td data-label="特徴">歩行頻度が高い場所向け</td>
                        </tr>
                        <tr>
                            <td data-label="工法">
                                <strong>シート防水</strong>
                            </td>
                            <td data-label="耐用年数">12〜15年</td>
                            <td data-label="コスト">
                                <span class="cost-indicator">
                                    <span class="cost-dot cost-dot--active"></span>
                                    <span class="cost-dot cost-dot--active"></span>
                                    <span class="cost-dot cost-dot--active"></span>
                                    <span class="cost-dot"></span>
                                </span>
                            </td>
                            <td data-label="強度">
                                <span class="strength-indicator">
                                    <span class="strength-bar strength-bar--active"></span>
                                    <span class="strength-bar strength-bar--active"></span>
                                    <span class="strength-bar strength-bar--active"></span>
                                    <span class="strength-bar"></span>
                                </span>
                            </td>
                            <td data-label="適用場所">屋上・陸屋根</td>
                            <td data-label="特徴">広い面積を効率施工</td>
                        </tr>
                        <tr>
                            <td data-label="工法">
                                <strong>アスファルト防水</strong>
                            </td>
                            <td data-label="耐用年数">15〜25年</td>
                            <td data-label="コスト">
                                <span class="cost-indicator">
                                    <span class="cost-dot cost-dot--active"></span>
                                    <span class="cost-dot cost-dot--active"></span>
                                    <span class="cost-dot cost-dot--active"></span>
                                    <span class="cost-dot cost-dot--active"></span>
                                </span>
                            </td>
                            <td data-label="強度">
                                <span class="strength-indicator">
                                    <span class="strength-bar strength-bar--active"></span>
                                    <span class="strength-bar strength-bar--active"></span>
                                    <span class="strength-bar strength-bar--active"></span>
                                    <span class="strength-bar strength-bar--active"></span>
                                </span>
                            </td>
                            <td data-label="適用場所">大規模屋上・ビル</td>
                            <td data-label="特徴">最高の耐久性・信頼性</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- =========================================================================
         WORK FLOW - 施工の流れ
         ========================================================================= -->
    <section class="section work-flow" aria-labelledby="workflow-heading">
        <div class="work-flow__bg"></div>
        
        <div class="container">
            <header class="section__header section__header--center">
                <span class="section__label">WORK FLOW</span>
                <h2 class="section__title" id="workflow-heading">
                    防水工事の<span class="marker marker--primary">流れ</span>
                </h2>
                <p class="section__lead">
                    ウレタン防水（通気緩衝工法）の施工工程をご紹介。<br>
                    すべての工程を自社職人が責任を持って施工します。
                </p>
            </header>

            <div class="work-flow__timeline">
                <article class="flow-step">
                    <div class="flow-step__marker">
                        <span class="flow-step__number">01</span>
                    </div>
                    <div class="flow-step__content">
                        <div class="flow-step__image">
                            <img src="https://images.unsplash.com/photo-1581578731548-c64695cc6952?auto=format&fit=crop&q=80&w=600" 
                                 alt="高圧洗浄作業" 
                                 loading="lazy"
                                 width="300"
                                 height="200">
                        </div>
                        <div class="flow-step__text">
                            <h3 class="flow-step__title">高圧洗浄・下地処理</h3>
                            <p class="flow-step__desc">
                                高圧洗浄機で汚れ・コケ・カビを徹底除去。既存防水層の浮きや剥がれを補修し、新しい防水層がしっかり密着する下地を作ります。
                            </p>
                        </div>
                    </div>
                </article>

                <article class="flow-step">
                    <div class="flow-step__marker">
                        <span class="flow-step__number">02</span>
                    </div>
                    <div class="flow-step__content">
                        <div class="flow-step__image">
                            <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&q=80&w=600" 
                                 alt="プライマー塗布" 
                                 loading="lazy"
                                 width="300"
                                 height="200">
                        </div>
                        <div class="flow-step__text">
                            <h3 class="flow-step__title">プライマー塗布</h3>
                            <p class="flow-step__desc">
                                下地と防水材の接着力を高める下塗り材を丁寧に塗布。均一に塗ることで、防水層の剥がれを防ぎます。
                            </p>
                        </div>
                    </div>
                </article>

                <article class="flow-step">
                    <div class="flow-step__marker">
                        <span class="flow-step__number">03</span>
                    </div>
                    <div class="flow-step__content">
                        <div class="flow-step__image">
                            <img src="https://images.unsplash.com/photo-1621905252507-b35492cc74b4?auto=format&fit=crop&q=80&w=600" 
                                 alt="通気緩衝シート貼り" 
                                 loading="lazy"
                                 width="300"
                                 height="200">
                        </div>
                        <div class="flow-step__text">
                            <h3 class="flow-step__title">通気緩衝シート貼り付け</h3>
                            <p class="flow-step__desc">
                                下地からの湿気を逃がす通気緩衝シートを全面に貼り付け。脱気筒を設置し、防水層の膨れを防止します。
                            </p>
                        </div>
                    </div>
                </article>

                <article class="flow-step">
                    <div class="flow-step__marker">
                        <span class="flow-step__number">04</span>
                    </div>
                    <div class="flow-step__content">
                        <div class="flow-step__image">
                            <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?auto=format&fit=crop&q=80&w=600" 
                                 alt="ウレタン塗膜1層目" 
                                 loading="lazy"
                                 width="300"
                                 height="200">
                        </div>
                        <div class="flow-step__text">
                            <h3 class="flow-step__title">ウレタン塗膜1層目</h3>
                            <p class="flow-step__desc">
                                ウレタン防水材を均一な厚さで塗布。1層目は下地との密着を重視し、隅々まで丁寧に施工します。
                            </p>
                        </div>
                    </div>
                </article>

                <article class="flow-step">
                    <div class="flow-step__marker">
                        <span class="flow-step__number">05</span>
                    </div>
                    <div class="flow-step__content">
                        <div class="flow-step__image">
                            <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&q=80&w=600" 
                                 alt="ウレタン塗膜2層目" 
                                 loading="lazy"
                                 width="300"
                                 height="200">
                        </div>
                        <div class="flow-step__text">
                            <h3 class="flow-step__title">ウレタン塗膜2層目</h3>
                            <p class="flow-step__desc">
                                1層目が完全に乾燥した後、2層目を塗布。規定の膜厚を確保し、防水性能を最大限に発揮させます。
                            </p>
                        </div>
                    </div>
                </article>

                <article class="flow-step">
                    <div class="flow-step__marker">
                        <span class="flow-step__number">06</span>
                    </div>
                    <div class="flow-step__content">
                        <div class="flow-step__image">
                            <img src="https://images.unsplash.com/photo-1621905252507-b35492cc74b4?auto=format&fit=crop&q=80&w=600" 
                                 alt="トップコート仕上げ" 
                                 loading="lazy"
                                 width="300"
                                 height="200">
                        </div>
                        <div class="flow-step__text">
                            <h3 class="flow-step__title">トップコート仕上げ</h3>
                            <p class="flow-step__desc">
                                紫外線や摩耗から防水層を守るトップコートを塗布。美しい仕上がりと長寿命を両立させます。
                            </p>
                        </div>
                    </div>
                </article>

                <article class="flow-step">
                    <div class="flow-step__marker">
                        <span class="flow-step__number">07</span>
                    </div>
                    <div class="flow-step__content">
                        <div class="flow-step__image">
                            <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&q=80&w=600" 
                                 alt="完了検査・お引き渡し" 
                                 loading="lazy"
                                 width="300"
                                 height="200">
                        </div>
                        <div class="flow-step__text">
                            <h3 class="flow-step__title">完了検査・お引き渡し</h3>
                            <p class="flow-step__desc">
                                仕上がりを細部までチェック。お客様立ち会いのもと確認後、保証書を発行してお引き渡しします。
                            </p>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- =========================================================================
         WORKS GALLERY - 施工事例
         ========================================================================= -->
    <section class="section works-gallery" aria-labelledby="works-heading">
        <div class="container">
            <header class="section__header">
                <div class="section__header-left">
                    <span class="section__label">WORKS</span>
                    <h2 class="section__title" id="works-heading">防水工事の施工事例</h2>
                </div>
                <a href="<?php echo esc_url(home_url('/works/?category=waterproof')); ?>" class="section__header-link">
                    すべての防水工事事例を見る
                    <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
                </a>
            </header>

            <div class="works-gallery__grid">
                <?php
                $waterproof_works = new WP_Query([
                    'post_type'      => 'works',
                    'posts_per_page' => 3,
                    'post_status'    => 'publish',
                    'tax_query'      => [
                        [
                            'taxonomy' => 'works_category',
                            'field'    => 'slug',
                            'terms'    => 'waterproof',
                        ],
                    ],
                ]);

                if ($waterproof_works->have_posts()) :
                    while ($waterproof_works->have_posts()) : $waterproof_works->the_post();
                        $client_name = get_post_meta(get_the_ID(), '_works_client_name', true);
                        $work_cost   = get_post_meta(get_the_ID(), '_works_cost', true);
                        $areas       = get_the_terms(get_the_ID(), 'works_area');
                        $area_name   = (!empty($areas) && !is_wp_error($areas)) ? $areas[0]->name : '';
                ?>
                <article class="works-gallery__item">
                    <a href="<?php the_permalink(); ?>" class="works-gallery__link">
                        <div class="works-gallery__image">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('works-card', ['loading' => 'lazy']); ?>
                            <?php else : ?>
                                <img src="https://images.unsplash.com/photo-1621905252507-b35492cc74b4?auto=format&fit=crop&q=80&w=400" 
                                     alt="<?php the_title_attribute(); ?>" 
                                     loading="lazy">
                            <?php endif; ?>
                        </div>
                        <div class="works-gallery__body">
                            <h3 class="works-gallery__title"><?php the_title(); ?></h3>
                            <div class="works-gallery__meta">
                                <?php if ($area_name) : ?>
                                <span class="works-gallery__area">
                                    <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                    <?php echo esc_html($area_name); ?>
                                </span>
                                <?php endif; ?>
                                <?php if ($work_cost) : ?>
                                <span class="works-gallery__cost"><?php echo esc_html($work_cost); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </a>
                </article>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                ?>
                <!-- サンプル事例カード -->
                <article class="works-gallery__item">
                    <a href="#" class="works-gallery__link">
                        <div class="works-gallery__image">
                            <img src="https://images.unsplash.com/photo-1621905252507-b35492cc74b4?auto=format&fit=crop&q=80&w=400" 
                                 alt="ベランダ防水工事" 
                                 loading="lazy">
                        </div>
                        <div class="works-gallery__body">
                            <h3 class="works-gallery__title">ベランダFRP防水 - 御殿場市K様邸</h3>
                            <div class="works-gallery__meta">
                                <span class="works-gallery__area">
                                    <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                    御殿場市
                                </span>
                                <span class="works-gallery__cost">約15万円</span>
                            </div>
                        </div>
                    </a>
                </article>

                <article class="works-gallery__item">
                    <a href="#" class="works-gallery__link">
                        <div class="works-gallery__image">
                            <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?auto=format&fit=crop&q=80&w=400" 
                                 alt="屋上ウレタン防水" 
                                 loading="lazy">
                        </div>
                        <div class="works-gallery__body">
                            <h3 class="works-gallery__title">屋上ウレタン防水 - 裾野市S様邸</h3>
                            <div class="works-gallery__meta">
                                <span class="works-gallery__area">
                                    <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                    裾野市
                                </span>
                                <span class="works-gallery__cost">約35万円</span>
                            </div>
                        </div>
                    </a>
                </article>

                <article class="works-gallery__item">
                    <a href="#" class="works-gallery__link">
                        <div class="works-gallery__image">
                            <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&q=80&w=400" 
                                 alt="陸屋根シート防水" 
                                 loading="lazy">
                        </div>
                        <div class="works-gallery__body">
                            <h3 class="works-gallery__title">陸屋根シート防水 - 三島市M様邸</h3>
                            <div class="works-gallery__meta">
                                <span class="works-gallery__area">
                                    <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                    三島市
                                </span>
                                <span class="works-gallery__cost">約50万円</span>
                            </div>
                        </div>
                    </a>
                </article>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- =========================================================================
         FEATURES - サトー建装の防水工事が選ばれる理由
         ========================================================================= -->
    <section class="section features" aria-labelledby="features-heading">
        <div class="features__bg"></div>
        
        <div class="container">
            <header class="section__header section__header--center">
                <span class="section__label">WHY CHOOSE US</span>
                <h2 class="section__title" id="features-heading">
                    <?php echo esc_html($company_name); ?>の防水工事が<br>
                    <span class="marker marker--accent">選ばれる理由</span>
                </h2>
            </header>

            <div class="features__grid">
                <article class="feature-card">
                    <div class="feature-card__icon">
                        <svg viewBox="0 0 24 24" width="48" height="48" fill="none" stroke="currentColor" stroke-width="1.5">
                            <circle cx="12" cy="8" r="7"/>
                            <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"/>
                            <path d="M12 4v4M10 6h4" stroke-width="2"/>
                        </svg>
                    </div>
                    <h3 class="feature-card__title">有資格者による確かな施工</h3>
                    <p class="feature-card__text">
                        一級防水施工技能士・一級塗装技能士が在籍。国家資格を持つ職人だからこそできる、確実で長持ちする防水工事をお約束します。
                    </p>
                </article>

                <article class="feature-card">
                    <div class="feature-card__icon">
                        <svg viewBox="0 0 24 24" width="48" height="48" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                            <path d="M9 12l2 2 4-4"/>
                        </svg>
                    </div>
                    <h3 class="feature-card__title">最長<?php echo esc_html($warranty_years); ?>年の長期保証</h3>
                    <p class="feature-card__text">
                        施工箇所・工法に応じて最長<?php echo esc_html($warranty_years); ?>年の保証書を発行。万が一の不具合も迅速に対応いたします。
                    </p>
                </article>

                <article class="feature-card">
                    <div class="feature-card__icon">
                        <svg viewBox="0 0 24 24" width="48" height="48" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"/>
                            <path d="M12 8v8M8 12h8"/>
                        </svg>
                    </div>
                    <h3 class="feature-card__title">徹底した原因調査</h3>
                    <p class="feature-card__text">
                        雨漏りの原因を特定せずに施工しても、根本解決にはなりません。赤外線カメラや散水試験で原因を徹底的に突き止めます。
                    </p>
                </article>

                <article class="feature-card">
                    <div class="feature-card__icon">
                        <svg viewBox="0 0 24 24" width="48" height="48" fill="none" stroke="currentColor" stroke-width="1.5">
                            <rect x="2" y="3" width="20" height="14" rx="2"/>
                            <line x1="8" y1="21" x2="16" y2="21"/>
                            <line x1="12" y1="17" x2="12" y2="21"/>
                            <path d="M6 8h4M6 11h8"/>
                        </svg>
                    </div>
                    <h3 class="feature-card__title">詳細な見積書・報告書</h3>
                    <p class="feature-card__text">
                        使用材料・施工範囲・単価まで明記した見積書をご提示。施工後は写真付き報告書で工事内容をご確認いただけます。
                    </p>
                </article>

                <article class="feature-card">
                    <div class="feature-card__icon">
                        <svg viewBox="0 0 24 24" width="48" height="48" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                            <polyline points="9 22 9 12 15 12 15 22"/>
                            <circle cx="12" cy="8" r="2"/>
                        </svg>
                    </div>
                    <h3 class="feature-card__title">完全自社施工</h3>
                    <p class="feature-card__text">
                        下請けに丸投げせず、自社職人が責任を持って施工。中間マージンがないから、高品質を適正価格で実現できます。
                    </p>
                </article>

                <article class="feature-card">
                    <div class="feature-card__icon">
                        <svg viewBox="0 0 24 24" width="48" height="48" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                            <circle cx="12" cy="10" r="3"/>
                        </svg>
                    </div>
                    <h3 class="feature-card__title">地域密着で迅速対応</h3>
                    <p class="feature-card__text">
                        御殿場市・裾野市・三島市など静岡県東部エリアに特化。急な雨漏りにも素早く駆けつけ、応急処置から本工事まで対応します。
                    </p>
                </article>
            </div>
        </div>
    </section>

    <!-- =========================================================================
         PRICE GUIDE - 料金目安
         ========================================================================= -->
    <section class="section price-guide" aria-labelledby="price-heading">
        <div class="container">
            <header class="section__header section__header--center">
                <span class="section__label">PRICE</span>
                <h2 class="section__title" id="price-heading">
                    防水工事の<span class="marker marker--primary">料金目安</span>
                </h2>
                <p class="section__lead">
                    代表的な施工箇所別の参考価格です。<br>
                    正確な金額は現地調査後にお見積りいたします。
                </p>
            </header>

            <div class="price-guide__grid">
                <article class="price-box">
                    <div class="price-box__header">
                        <div class="price-box__icon">
                            <svg viewBox="0 0 24 24" width="32" height="32" fill="none" stroke="currentColor" stroke-width="1.5">
                                <rect x="3" y="10" width="18" height="11" rx="2"/>
                                <path d="M3 10V6a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v4"/>
                                <line x1="12" y1="4" x2="12" y2="10"/>
                            </svg>
                        </div>
                        <h3 class="price-box__title">ベランダ防水</h3>
                        <span class="price-box__size">（5〜10㎡程度）</span>
                    </div>
                    <div class="price-box__body">
                        <div class="price-box__price">
                            <span class="price-box__from">¥</span>
                            <span class="price-box__amount">8</span>
                            <span class="price-box__unit">万円〜</span>
                        </div>
                        <p class="price-box__note">税込 / ウレタン or FRP</p>
                        <ul class="price-box__includes">
                            <li>高圧洗浄</li>
                            <li>下地補修</li>
                            <li>防水塗布</li>
                            <li>トップコート</li>
                        </ul>
                    </div>
                </article>

                <article class="price-box price-box--featured">
                    <span class="price-box__badge">よくあるご依頼</span>
                    <div class="price-box__header">
                        <div class="price-box__icon">
                            <svg viewBox="0 0 24 24" width="32" height="32" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                                <line x1="3" y1="9" x2="21" y2="9"/>
                            </svg>
                        </div>
                        <h3 class="price-box__title">屋上防水</h3>
                        <span class="price-box__size">（20〜50㎡程度）</span>
                    </div>
                    <div class="price-box__body">
                        <div class="price-box__price">
                            <span class="price-box__from">¥</span>
                            <span class="price-box__amount">25</span>
                            <span class="price-box__unit">万円〜</span>
                        </div>
                        <p class="price-box__note">税込 / ウレタン通気緩衝工法</p>
                        <ul class="price-box__includes">
                            <li>高圧洗浄</li>
                            <li>既存撤去・下地補修</li>
                            <li>通気緩衝シート</li>
                            <li>ウレタン2層</li>
                            <li>トップコート</li>
                            <li>脱気筒設置</li>
                        </ul>
                    </div>
                </article>

                <article class="price-box">
                    <div class="price-box__header">
                        <div class="price-box__icon">
                            <svg viewBox="0 0 24 24" width="32" height="32" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M2 20h20"/>
                                <path d="M5 20V8l7-5 7 5v12"/>
                                <rect x="9" y="12" width="6" height="8"/>
                            </svg>
                        </div>
                        <h3 class="price-box__title">大規模屋上</h3>
                        <span class="price-box__size">（100㎡以上）</span>
                    </div>
                    <div class="price-box__body">
                        <div class="price-box__price">
                            <span class="price-box__from">¥</span>
                            <span class="price-box__amount">50</span>
                            <span class="price-box__unit">万円〜</span>
                        </div>
                        <p class="price-box__note">税込 / シート or アスファルト</p>
                        <ul class="price-box__includes">
                            <li>高圧洗浄</li>
                            <li>既存撤去・下地補修</li>
                            <li>シート or アスファルト</li>
                            <li>端部処理</li>
                            <li>ドレン改修</li>
                        </ul>
                    </div>
                </article>
            </div>

            <div class="price-guide__note">
                <div class="price-guide__note-icon">
                    <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"/>
                        <line x1="12" y1="16" x2="12" y2="12"/>
                        <line x1="12" y1="8" x2="12.01" y2="8"/>
                    </svg>
                </div>
                <p>
                    上記は参考価格です。建物の状態・既存防水の種類・施工面積・アクセス条件などにより変動いたします。<br>
                    <strong>正確なお見積りは無料現地調査にてご案内いたします。</strong>お気軽にお問い合わせください。
                </p>
            </div>
        </div>
    </section>

    <!-- =========================================================================
         FAQ SECTION - よくある質問
         ========================================================================= -->
    <section class="section faq" aria-labelledby="faq-heading">
        <div class="faq__bg"></div>
        
        <div class="container">
            <header class="section__header section__header--center">
                <span class="section__label">FAQ</span>
                <h2 class="section__title" id="faq-heading">
                    防水工事の<span class="marker marker--primary">よくある質問</span>
                </h2>
            </header>

            <div class="faq__list">
                <details class="faq-item">
                    <summary class="faq-item__question">
                        <span class="faq-item__q">Q</span>
                        <span class="faq-item__text">防水工事の耐用年数はどのくらいですか？</span>
                        <span class="faq-item__toggle">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                        </span>
                    </summary>
                    <div class="faq-item__answer">
                        <span class="faq-item__a">A</span>
                        <div class="faq-item__content">
                            <p>工法によって異なりますが、一般的な目安は以下の通りです。</p>
                            <ul>
                                <li>ウレタン防水：10〜12年</li>
                                <li>FRP防水：10〜15年</li>
                                <li>シート防水：12〜15年</li>
                                <li>アスファルト防水：15〜25年</li>
                            </ul>
                            <p>ただし、定期的なトップコートの塗り替え（5年程度ごと）を行うことで、寿命を延ばすことができます。</p>
                        </div>
                    </div>
                </details>

                <details class="faq-item">
                    <summary class="faq-item__question">
                        <span class="faq-item__q">Q</span>
                        <span class="faq-item__text">工事中は家にいなくても大丈夫ですか？</span>
                        <span class="faq-item__toggle">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                        </span>
                    </summary>
                    <div class="faq-item__answer">
                        <span class="faq-item__a">A</span>
                        <div class="faq-item__content">
                            <p>はい、お留守でも問題ありません。屋上やベランダなど屋外からの作業が中心ですので、室内への立ち入りは基本的にございません。ただし、作業前後のご確認をいただけると安心です。鍵の管理や作業時間についてはご相談の上で調整いたします。</p>
                        </div>
                    </div>
                </details>

                <details class="faq-item">
                    <summary class="faq-item__question">
                        <span class="faq-item__q">Q</span>
                        <span class="faq-item__text">雨の日でも工事はできますか？</span>
                        <span class="faq-item__toggle">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                        </span>
                    </summary>
                    <div class="faq-item__answer">
                        <span class="faq-item__a">A</span>
                        <div class="faq-item__content">
                            <p>防水工事は乾燥した状態で施工する必要があるため、雨天時は作業を中止いたします。下地が濡れた状態での施工は密着不良の原因となり、本来の性能を発揮できません。天候による工期延長の可能性もありますが、品質を最優先に対応させていただきます。</p>
                        </div>
                    </div>
                </details>

                <details class="faq-item">
                    <summary class="faq-item__question">
                        <span class="faq-item__q">Q</span>
                        <span class="faq-item__text">ベランダの防水工事中は使用できませんか？</span>
                        <span class="faq-item__toggle">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                        </span>
                    </summary>
                    <div class="faq-item__answer">
                        <span class="faq-item__a">A</span>
                        <div class="faq-item__content">
                            <p>工事期間中（通常2〜3日程度）はベランダのご使用をお控えいただきます。洗濯物の干し場所など、事前にご相談いただければ対応策をご提案いたします。完全硬化後（通常24〜48時間後）から通常どおりご使用いただけます。</p>
                        </div>
                    </div>
                </details>

                <details class="faq-item">
                    <summary class="faq-item__question">
                        <span class="faq-item__q">Q</span>
                        <span class="faq-item__text">防水工事と外壁塗装を同時に依頼できますか？</span>
                        <span class="faq-item__toggle">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                        </span>
                    </summary>
                    <div class="faq-item__answer">
                        <span class="faq-item__a">A</span>
                        <div class="faq-item__content">
                            <p>はい、むしろ同時施工をおすすめしております。足場を一度設置すれば、防水工事と外壁塗装を効率よく行えるため、別々に行うよりコストを抑えられます。また、建物全体のメンテナンスを一度に完了できるので、管理も楽になります。</p>
                        </div>
                    </div>
                </details>

                <details class="faq-item">
                    <summary class="faq-item__question">
                        <span class="faq-item__q">Q</span>
                        <span class="faq-item__text">保証はどのような内容ですか？</span>
                        <span class="faq-item__toggle">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                        </span>
                    </summary>
                    <div class="faq-item__answer">
                        <span class="faq-item__a">A</span>
                        <div class="faq-item__content">
                            <p>施工箇所・使用材料・工法に応じて、5年〜最長<?php echo esc_html($warranty_years); ?>年の品質保証書を発行いたします。保証期間中に施工起因の雨漏りが発生した場合は、無償で補修対応いたします。保証書には保証対象・期間・条件を明記しておりますので、安心してお任せください。</p>
                        </div>
                    </div>
                </details>
            </div>

            <div class="faq__more">
                <a href="<?php echo esc_url(home_url('/faq/')); ?>" class="btn btn--outline btn--lg">
                    その他のFAQを見る
                    <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </a>
            </div>
        </div>
    </section>

    <!-- =========================================================================
         CTA SECTION - お問い合わせ誘導
         ========================================================================= -->
    <section class="cta" aria-labelledby="cta-heading">
        <div class="cta__bg">
            <div class="cta__bg-gradient"></div>
            <div class="cta__bg-pattern"></div>
        </div>

        <div class="container">
            <div class="cta__content">
                <header class="cta__header">
                    <div class="cta__icon">
                        <svg viewBox="0 0 24 24" width="64" height="64" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"/>
                        </svg>
                    </div>
                    <h2 class="cta__title" id="cta-heading">
                        雨漏り・防水のお悩み<br>
                        <span class="cta__title-highlight">無料</span>で診断いたします
                    </h2>
                    <p class="cta__lead">
                        「まずは原因を知りたい」「費用だけ確認したい」<br>
                        どんな小さなご相談でもお気軽にどうぞ。
                    </p>
                </header>

                <div class="cta__actions">
                    <div class="cta__phone">
                        <span class="cta__phone-label">お電話でのご相談</span>
                        <a href="<?php echo esc_attr($phone_link); ?>" class="cta__phone-number">
                            <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                            <span><?php echo esc_html($phone); ?></span>
                        </a>
                        <span class="cta__phone-hours">受付 <?php echo esc_html($business_hours); ?></span>
                    </div>

                    <div class="cta__divider">
                        <span>または</span>
                    </div>

                    <div class="cta__buttons">
                        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn--accent btn--xl btn--block">
                            <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                            無料診断・お見積り依頼
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                        </a>
                        
                        <?php if ($line_url) : ?>
                        <a href="<?php echo esc_url($line_url); ?>" class="btn btn--line btn--lg btn--block" target="_blank" rel="noopener noreferrer">
                            <svg viewBox="0 0 24 24" width="22" height="22" fill="currentColor"><path d="M19.365 9.863c.349 0 .63.285.63.631 0 .345-.281.63-.63.63H17.61v1.125h1.755c.349 0 .63.283.63.63 0 .344-.281.629-.63.629h-2.386c-.345 0-.627-.285-.627-.629V8.108c0-.345.282-.63.627-.63h2.386c.349 0 .63.285.63.63 0 .349-.281.63-.63.63H17.61v1.125h1.755zm-3.855 3.016c0 .27-.174.51-.432.596-.064.021-.133.031-.199.031-.211 0-.391-.09-.51-.25l-2.443-3.317v2.94c0 .344-.279.629-.631.629-.346 0-.626-.285-.626-.629V8.108c0-.27.173-.51.43-.595.06-.023.136-.033.194-.033.195 0 .375.104.495.254l2.462 3.33V8.108c0-.345.282-.63.63-.63.345 0 .63.285.63.63v4.771zm-5.741 0c0 .344-.282.629-.631.629-.345 0-.627-.285-.627-.629V8.108c0-.345.282-.63.627-.63.349 0 .631.285.631.63v4.771zm-2.466.629H4.917c-.345 0-.63-.285-.63-.629V8.108c0-.345.285-.63.63-.63.349 0 .63.285.63.63v4.141h1.756c.348 0 .629.283.629.63 0 .344-.281.629-.629.629M24 10.314C24 4.943 18.615.572 12 .572S0 4.943 0 10.314c0 4.811 4.27 8.842 10.035 9.608.391.082.923.258 1.058.59.12.301.079.766.038 1.08l-.164 1.02c-.045.301-.24 1.186 1.049.645 1.291-.539 6.916-4.078 9.436-6.975C23.176 14.393 24 12.458 24 10.314"/></svg>
                            LINEで気軽に相談
                        </a>
                        <?php endif; ?>
                    </div>
                </div>

                <ul class="cta__assurance">
                    <li>
                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                        見積り無料
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                        現地調査無料
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                        しつこい営業なし
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                        最長<?php echo esc_html($warranty_years); ?>年保証
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- =========================================================================
         RELATED SERVICES - 関連サービス
         ========================================================================= -->
    <section class="section related-services" aria-labelledby="related-heading">
        <div class="container">
            <header class="section__header section__header--center">
                <span class="section__label">RELATED SERVICES</span>
                <h2 class="section__title" id="related-heading">関連サービス</h2>
            </header>

            <div class="related-services__grid">
                <a href="<?php echo esc_url(home_url('/service/exterior/')); ?>" class="related-card">
                    <div class="related-card__image">
                        <img src="https://images.unsplash.com/photo-1589939705384-5185137a7f0f?auto=format&fit=crop&q=80&w=400" 
                             alt="外壁塗装" 
                             loading="lazy">
                    </div>
                    <div class="related-card__body">
                        <h3 class="related-card__title">外壁塗装</h3>
                        <p class="related-card__text">防水工事と同時施工で足場代を節約できます</p>
                        <span class="related-card__link">
                            詳しく見る
                            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
                        </span>
                    </div>
                </a>

                <a href="<?php echo esc_url(home_url('/service/roof/')); ?>" class="related-card">
                    <div class="related-card__image">
                        <img src="https://images.unsplash.com/photo-1632759145354-f424eb5b3f11?auto=format&fit=crop&q=80&w=400" 
                             alt="屋根塗装" 
                             loading="lazy">
                    </div>
                    <div class="related-card__body">
                        <h3 class="related-card__title">屋根塗装</h3>
                        <p class="related-card__text">屋根からの雨漏りは塗装で解決することも</p>
                        <span class="related-card__link">
                            詳しく見る
                            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
                        </span>
                    </div>
                </a>

                <a href="<?php echo esc_url(home_url('/service/sealant/')); ?>" class="related-card">
                    <div class="related-card__image">
                        <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&q=80&w=400" 
                             alt="シーリング工事" 
                             loading="lazy">
                    </div>
                    <div class="related-card__body">
                        <h3 class="related-card__title">シーリング工事</h3>
                        <p class="related-card__text">目地・サッシ周りの雨水侵入を防止</p>
                        <span class="related-card__link">
                            詳しく見る
                            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
                        </span>
                    </div>
                </a>
            </div>
        </div>
    </section>

</main>

<!-- =============================================================================
     STYLES
     ============================================================================= -->
<style>
/* =============================================================================
   CSS Variables (Service Page Specific)
   ============================================================================= */
:root {
    --color-primary: #0d47a1;
    --color-primary-dark: #002171;
    --color-primary-light: #5472d3;
    --color-secondary: #ff6f00;
    --color-accent: #f59e0b;
    --color-success: #22c55e;
    --color-warning: #eab308;
    --color-danger: #ef4444;
    --color-line: #06c755;
    --color-water: #0ea5e9;
    --color-water-dark: #0284c7;
    --color-water-light: #7dd3fc;
    
    --color-text: #1a1a1a;
    --color-text-light: #666666;
    --color-text-muted: #999999;
    --color-bg: #ffffff;
    --color-bg-light: #f8fafc;
    --color-border: #e2e8f0;
    
    --font-base: 'Noto Sans JP', -apple-system, BlinkMacSystemFont, sans-serif;
    --font-en: 'Inter', 'Roboto', sans-serif;
    
    --section-padding: 100px;
    --container-width: 1200px;
    --container-padding: 20px;
    
    --radius-sm: 4px;
    --radius-md: 8px;
    --radius-lg: 16px;
    --radius-xl: 24px;
    --radius-full: 9999px;
    
    --shadow-sm: 0 1px 2px rgba(0,0,0,0.05);
    --shadow-md: 0 4px 6px -1px rgba(0,0,0,0.1);
    --shadow-lg: 0 10px 15px -3px rgba(0,0,0,0.1);
    --shadow-xl: 0 20px 25px -5px rgba(0,0,0,0.1);
    
    --transition-base: 0.3s ease;
}

/* =============================================================================
   Base Styles
   ============================================================================= */
.service-page {
    overflow-x: hidden;
}

.container {
    max-width: var(--container-width);
    margin: 0 auto;
    padding: 0 var(--container-padding);
}

.section {
    padding: var(--section-padding) 0;
    position: relative;
}

@media (max-width: 768px) {
    .section {
        padding: 60px 0;
    }
}

/* Section Header */
.section__header {
    margin-bottom: 3rem;
}

.section__header--center {
    text-align: center;
}

.section__label {
    display: inline-block;
    font-family: var(--font-en);
    font-size: 0.875rem;
    font-weight: 600;
    letter-spacing: 0.15em;
    color: var(--color-primary);
    margin-bottom: 0.5rem;
}

.section__title {
    font-size: clamp(1.75rem, 4vw, 2.5rem);
    font-weight: 900;
    line-height: 1.3;
    margin: 0 0 1rem;
}

.section__lead {
    font-size: 1rem;
    color: var(--color-text-light);
    margin: 0;
    max-width: 600px;
}

.section__header--center .section__lead {
    margin-left: auto;
    margin-right: auto;
}

.section__header-left {
    display: inline-block;
}

.section__header-link {
    display: inline-flex;
    align-items: center;
    gap: 0.5em;
    font-weight: 600;
    color: var(--color-primary);
}

.section__header-link:hover {
    gap: 0.75em;
}

@media (min-width: 768px) {
    .section__header:not(.section__header--center) {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
    }
}

/* Marker */
.marker {
    position: relative;
    padding: 0 0.2em;
}

.marker::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 100%;
    height: 40%;
    z-index: -1;
}

.marker--primary::after {
    background: rgba(14, 165, 233, 0.2);
}

.marker--accent::after {
    background: rgba(245, 158, 11, 0.3);
}

.marker--warning::after {
    background: rgba(239, 68, 68, 0.2);
}

/* =============================================================================
   Buttons
   ============================================================================= */
.btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.5em;
    padding: 0.875em 2em;
    font-size: 1rem;
    font-weight: 700;
    line-height: 1.5;
    border: 2px solid transparent;
    border-radius: var(--radius-full);
    cursor: pointer;
    transition: all var(--transition-base);
    text-decoration: none;
}

.btn:hover {
    transform: translateY(-2px);
}

.btn--primary {
    background: var(--color-primary);
    color: #fff;
}

.btn--primary:hover {
    background: var(--color-primary-dark);
    box-shadow: var(--shadow-lg);
}

.btn--accent {
    background: var(--color-accent);
    color: #fff;
}

.btn--accent:hover {
    background: #d97706;
    box-shadow: var(--shadow-lg);
}

.btn--outline {
    background: transparent;
    border-color: var(--color-primary);
    color: var(--color-primary);
}

.btn--outline:hover {
    background: var(--color-primary);
    color: #fff;
}

.btn--line {
    background: var(--color-line);
    color: #fff;
}

.btn--line:hover {
    background: #05b04a;
}

.btn--lg {
    padding: 1em 2.5em;
    font-size: 1.0625rem;
}

.btn--xl {
    padding: 1.125em 3em;
    font-size: 1.125rem;
}

.btn--block {
    width: 100%;
}

/* =============================================================================
   PAGE HERO
   ============================================================================= */
.page-hero {
    position: relative;
    padding: 160px 0 100px;
    color: #fff;
    overflow: hidden;
}

.page-hero__bg {
    position: absolute;
    inset: 0;
}

.page-hero__bg-image {
    position: absolute;
    inset: 0;
    background-size: cover;
    background-position: center;
}

.page-hero__bg-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(14, 165, 233, 0.9) 0%, rgba(13, 71, 161, 0.95) 100%);
}

.page-hero__content {
    position: relative;
    z-index: 1;
    max-width: 800px;
}

/* Breadcrumb */
.breadcrumb {
    margin-bottom: 2rem;
}

.breadcrumb__list {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 0.25rem;
    list-style: none;
    margin: 0;
    padding: 0;
    font-size: 0.875rem;
}

.breadcrumb__item {
    display: flex;
    align-items: center;
    gap: 0.25rem;
}

.breadcrumb__link {
    display: flex;
    align-items: center;
    gap: 0.25rem;
    color: rgba(255,255,255,0.8);
    transition: var(--transition-base);
}

.breadcrumb__link:hover {
    color: #fff;
}

.breadcrumb__separator {
    color: rgba(255,255,255,0.5);
}

.breadcrumb__current {
    color: #fff;
    font-weight: 500;
}

.page-hero__label {
    display: inline-block;
    font-family: var(--font-en);
    font-size: 0.875rem;
    font-weight: 600;
    letter-spacing: 0.2em;
    opacity: 0.9;
    margin-bottom: 0.5rem;
}

.page-hero__title {
    font-size: clamp(2.5rem, 6vw, 4rem);
    font-weight: 900;
    margin: 0 0 1.5rem;
    line-height: 1.2;
}

.page-hero__lead {
    font-size: clamp(1rem, 2vw, 1.25rem);
    line-height: 1.8;
    margin: 0 0 2rem;
    opacity: 0.95;
}

.page-hero__badges {
    display: flex;
    flex-wrap: wrap;
    gap: 0.75rem;
}

.page-hero__badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    background: rgba(255,255,255,0.15);
    backdrop-filter: blur(10px);
    border-radius: var(--radius-full);
    font-size: 0.875rem;
    font-weight: 600;
}

.page-hero__wave {
    position: absolute;
    bottom: -1px;
    left: 0;
    width: 100%;
    line-height: 0;
}

.page-hero__wave svg {
    width: 100%;
    height: 80px;
}

@media (max-width: 768px) {
    .page-hero {
        padding: 120px 0 80px;
    }
    
    .page-hero__wave svg {
        height: 50px;
    }
}

/* =============================================================================
   TROUBLE SECTION
   ============================================================================= */
.trouble {
    background: var(--color-bg);
}

.trouble__grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
    margin-bottom: 3rem;
}

.trouble-card {
    padding: 2rem;
    background: var(--color-bg-light);
    border-radius: var(--radius-xl);
    border: 1px solid var(--color-border);
    transition: var(--transition-base);
}

.trouble-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-lg);
    border-color: var(--color-water-light);
}

.trouble-card__icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 72px;
    height: 72px;
    margin-bottom: 1.5rem;
    background: linear-gradient(135deg, #fef2f2 0%, #fee2e2 100%);
    border-radius: 50%;
    color: var(--color-danger);
}

.trouble-card__title {
    font-size: 1.125rem;
    font-weight: 700;
    margin: 0 0 0.75rem;
    color: var(--color-text);
}

.trouble-card__text {
    font-size: 0.9375rem;
    color: var(--color-text-light);
    margin: 0;
    line-height: 1.7;
}

.trouble__cta-box {
    display: flex;
    align-items: center;
    gap: 2rem;
    padding: 2rem;
    background: linear-gradient(135deg, #fef2f2 0%, #fff7ed 100%);
    border-radius: var(--radius-xl);
    border-left: 4px solid var(--color-danger);
}

.trouble__cta-icon {
    flex-shrink: 0;
    color: var(--color-danger);
}

.trouble__cta-content {
    flex: 1;
}

.trouble__cta-text {
    margin: 0;
    font-size: 1rem;
    line-height: 1.8;
}

@media (max-width: 1024px) {
    .trouble__grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .trouble__grid {
        grid-template-columns: 1fr;
    }
    
    .trouble__cta-box {
        flex-direction: column;
        text-align: center;
        gap: 1.5rem;
    }
}

/* =============================================================================
   WATERPROOF TYPES
   ============================================================================= */
.waterproof-types {
    background: var(--color-bg-light);
    position: relative;
}

.waterproof-types__bg {
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, transparent 0%, rgba(14, 165, 233, 0.03) 100%);
}

.waterproof-types__list {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 30px;
    position: relative;
}

.type-card {
    display: flex;
    flex-direction: column;
    background: var(--color-bg);
    border-radius: var(--radius-xl);
    overflow: hidden;
    box-shadow: var(--shadow-lg);
    transition: var(--transition-base);
}

.type-card:hover {
    transform: translateY(-6px);
    box-shadow: var(--shadow-xl);
}

.type-card__image {
    position: relative;
    height: 200px;
    overflow: hidden;
}

.type-card__image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.type-card:hover .type-card__image img {
    transform: scale(1.05);
}

.type-card__badge {
    position: absolute;
    top: 12px;
    left: 12px;
    padding: 0.375rem 0.875rem;
    font-size: 0.75rem;
    font-weight: 700;
    color: #fff;
    border-radius: var(--radius-full);
    z-index: 1;
}

.type-card__badge--popular {
    background: var(--color-danger);
}

.type-card__badge--strong {
    background: var(--color-primary);
}

.type-card__badge--eco {
    background: var(--color-success);
}

.type-card__badge--premium {
    background: linear-gradient(135deg, #8b5cf6 0%, #6366f1 100%);
}

.type-card__body {
    flex: 1;
    display: flex;
    flex-direction: column;
    padding: 1.5rem;
}

.type-card__header {
    margin-bottom: 1rem;
}

.type-card__title {
    font-size: 1.375rem;
    font-weight: 700;
    margin: 0 0 0.25rem;
    color: var(--color-text);
}

.type-card__subtitle {
    font-family: var(--font-en);
    font-size: 0.75rem;
    font-weight: 600;
    letter-spacing: 0.1em;
    color: var(--color-water);
}

.type-card__desc {
    font-size: 0.9375rem;
    color: var(--color-text-light);
    line-height: 1.7;
    margin: 0 0 1.25rem;
}

.type-card__specs {
    display: flex;
    gap: 1rem;
    padding: 1rem;
    background: var(--color-bg-light);
    border-radius: var(--radius-md);
    margin-bottom: 1.25rem;
}

.type-card__spec {
    flex: 1;
}

.type-card__spec-label {
    display: block;
    font-size: 0.75rem;
    color: var(--color-text-muted);
    margin-bottom: 0.25rem;
}

.type-card__spec-value {
    font-size: 0.875rem;
    font-weight: 600;
    color: var(--color-text);
}

.type-card__features {
    margin-bottom: 1.25rem;
}

.type-card__features-title {
    font-size: 0.8125rem;
    font-weight: 700;
    color: var(--color-text);
    margin: 0 0 0.75rem;
}

.type-card__features-list {
    list-style: none;
    margin: 0;
    padding: 0;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 0.5rem;
}

.type-card__features-list li {
    display: flex;
    align-items: center;
    gap: 0.375rem;
    font-size: 0.8125rem;
    color: var(--color-text);
}

.type-card__features-list svg {
    flex-shrink: 0;
    color: var(--color-success);
}

.type-card__price {
    margin-top: auto;
    padding-top: 1.25rem;
    border-top: 1px dashed var(--color-border);
    text-align: center;
}

.type-card__price-label {
    font-size: 0.75rem;
    color: var(--color-text-muted);
}

.type-card__price-value {
    display: block;
    font-family: var(--font-en);
    font-size: 1.5rem;
    font-weight: 900;
    color: var(--color-water-dark);
    margin: 0.25rem 0;
}

.type-card__price-note {
    font-size: 0.75rem;
    color: var(--color-text-muted);
}

.waterproof-types__note {
    text-align: center;
    font-size: 0.8125rem;
    color: var(--color-text-muted);
    margin-top: 2rem;
}

@media (max-width: 1024px) {
    .waterproof-types__list {
        grid-template-columns: 1fr;
        max-width: 600px;
        margin: 0 auto;
    }
}

@media (max-width: 640px) {
    .type-card__features-list {
        grid-template-columns: 1fr;
    }
}

/* =============================================================================
   COMPARISON TABLE
   ============================================================================= */
.comparison {
    background: var(--color-bg);
}

.comparison__table-wrapper {
    overflow-x: auto;
    margin: 0 -20px;
    padding: 0 20px;
}

.comparison__table {
    width: 100%;
    min-width: 700px;
    border-collapse: collapse;
    background: var(--color-bg);
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-lg);
}

.comparison__table thead {
    background: var(--color-primary);
    color: #fff;
}

.comparison__table th {
    padding: 1rem 1.25rem;
    font-size: 0.9375rem;
    font-weight: 700;
    text-align: left;
    white-space: nowrap;
}

.comparison__table tbody tr {
    border-bottom: 1px solid var(--color-border);
    transition: var(--transition-base);
}

.comparison__table tbody tr:last-child {
    border-bottom: none;
}

.comparison__table tbody tr:hover {
    background: var(--color-bg-light);
}

.comparison__table td {
    padding: 1.25rem;
    font-size: 0.9375rem;
    color: var(--color-text);
    vertical-align: middle;
}

.cost-indicator {
    display: flex;
    gap: 4px;
}

.cost-dot {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: var(--color-border);
}

.cost-dot--active {
    background: var(--color-accent);
}

.strength-indicator {
    display: flex;
    gap: 3px;
}

.strength-bar {
    width: 20px;
    height: 8px;
    border-radius: 4px;
    background: var(--color-border);
}

.strength-bar--active {
    background: var(--color-water);
}

@media (max-width: 768px) {
    .comparison__table {
        min-width: auto;
    }
    
    .comparison__table thead {
        display: none;
    }
    
    .comparison__table tbody tr {
        display: block;
        padding: 1rem;
        margin-bottom: 1rem;
        border: 1px solid var(--color-border);
        border-radius: var(--radius-md);
    }
    
    .comparison__table td {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.5rem 0;
        border-bottom: 1px dashed var(--color-border);
    }
    
    .comparison__table td:last-child {
        border-bottom: none;
    }
    
    .comparison__table td::before {
        content: attr(data-label);
        font-weight: 600;
        color: var(--color-text-muted);
        font-size: 0.8125rem;
    }
}

/* =============================================================================
   WORK FLOW
   ============================================================================= */
.work-flow {
    background: var(--color-bg-light);
    position: relative;
}

.work-flow__bg {
    position: absolute;
    inset: 0;
    background: radial-gradient(ellipse at center, rgba(14, 165, 233, 0.05) 0%, transparent 70%);
}

.work-flow__timeline {
    position: relative;
    max-width: 900px;
    margin: 0 auto;
}

.flow-step {
    display: flex;
    gap: 30px;
    margin-bottom: 40px;
    position: relative;
}

.flow-step:last-child {
    margin-bottom: 0;
}

.flow-step::before {
    content: '';
    position: absolute;
    left: 35px;
    top: 80px;
    width: 2px;
    height: calc(100% + 40px);
    background: linear-gradient(180deg, var(--color-water) 0%, var(--color-water-light) 100%);
}

.flow-step:last-child::before {
    display: none;
}

.flow-step__marker {
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 72px;
    height: 72px;
    background: linear-gradient(135deg, var(--color-water) 0%, var(--color-primary) 100%);
    border-radius: 50%;
    box-shadow: var(--shadow-lg);
    z-index: 1;
}

.flow-step__number {
    font-family: var(--font-en);
    font-size: 1.25rem;
    font-weight: 900;
    color: #fff;
}

.flow-step__content {
    flex: 1;
    display: flex;
    gap: 24px;
    background: var(--color-bg);
    border-radius: var(--radius-xl);
    overflow: hidden;
    box-shadow: var(--shadow-md);
}

.flow-step__image {
    flex-shrink: 0;
    width: 200px;
    height: 150px;
    overflow: hidden;
}

.flow-step__image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.flow-step__text {
    flex: 1;
    padding: 1.25rem 1.5rem 1.25rem 0;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.flow-step__title {
    font-size: 1.125rem;
    font-weight: 700;
    margin: 0 0 0.5rem;
    color: var(--color-text);
}

.flow-step__desc {
    font-size: 0.9375rem;
    color: var(--color-text-light);
    margin: 0;
    line-height: 1.7;
}

@media (max-width: 768px) {
    .flow-step {
        flex-direction: column;
        gap: 16px;
        margin-bottom: 24px;
    }
    
    .flow-step::before {
        left: 35px;
        top: 72px;
        height: calc(100% - 32px);
    }
    
    .flow-step__content {
        flex-direction: column;
        margin-left: 40px;
    }
    
    .flow-step__image {
        width: 100%;
        height: 180px;
    }
    
    .flow-step__text {
        padding: 1.25rem;
    }
}

/* =============================================================================
   WORKS GALLERY
   ============================================================================= */
.works-gallery {
    background: var(--color-bg);
}

.works-gallery__grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
}

.works-gallery__item {
    border-radius: var(--radius-xl);
    overflow: hidden;
    background: var(--color-bg);
    box-shadow: var(--shadow-md);
    transition: var(--transition-base);
}

.works-gallery__item:hover {
    transform: translateY(-6px);
    box-shadow: var(--shadow-xl);
}

.works-gallery__link {
    display: block;
}

.works-gallery__image {
    height: 200px;
    overflow: hidden;
}

.works-gallery__image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.works-gallery__item:hover .works-gallery__image img {
    transform: scale(1.05);
}

.works-gallery__body {
    padding: 1.25rem;
}

.works-gallery__title {
    font-size: 1rem;
    font-weight: 700;
    margin: 0 0 0.5rem;
    color: var(--color-text);
    line-height: 1.4;
}

.works-gallery__meta {
    display: flex;
    flex-wrap: wrap;
    gap: 0.75rem;
    font-size: 0.8125rem;
    color: var(--color-text-light);
}

.works-gallery__area {
    display: flex;
    align-items: center;
    gap: 0.25rem;
}

.works-gallery__cost {
    color: var(--color-water-dark);
    font-weight: 600;
}

@media (max-width: 1024px) {
    .works-gallery__grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 640px) {
    .works-gallery__grid {
        grid-template-columns: 1fr;
    }
}

/* =============================================================================
   FEATURES
   ============================================================================= */

.features {
    background: var(--color-bg-light);
    position: relative;
}

.features__bg {
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(14, 165, 233, 0.03) 0%, transparent 50%);
}

.features__grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
    position: relative;
}

.feature-card {
    padding: 2rem;
    background: var(--color-bg);
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-md);
    text-align: center;
    transition: var(--transition-base);
}

.feature-card:hover {
    transform: translateY(-6px);
    box-shadow: var(--shadow-xl);
}

.feature-card__icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 80px;
    height: 80px;
    margin: 0 auto 1.5rem;
    background: linear-gradient(135deg, #e0f2fe 0%, #bae6fd 100%);
    border-radius: 50%;
    color: var(--color-water-dark);
}

.feature-card__title {
    font-size: 1.125rem;
    font-weight: 700;
    margin: 0 0 0.75rem;
    color: var(--color-text);
}

.feature-card__text {
    font-size: 0.9375rem;
    color: var(--color-text-light);
    margin: 0;
    line-height: 1.7;
}

@media (max-width: 1024px) {
    .features__grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 640px) {
    .features__grid {
        grid-template-columns: 1fr;
    }
}

/* =============================================================================
   PRICE GUIDE
   ============================================================================= */
.price-guide {
    background: var(--color-bg);
}

.price-guide__grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
    margin-bottom: 2rem;
}

.price-box {
    position: relative;
    display: flex;
    flex-direction: column;
    background: var(--color-bg);
    border: 1px solid var(--color-border);
    border-radius: var(--radius-xl);
    overflow: hidden;
    transition: var(--transition-base);
}

.price-box:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-xl);
}

.price-box--featured {
    border: 2px solid var(--color-water);
    box-shadow: 0 10px 40px rgba(14, 165, 233, 0.15);
}

.price-box__badge {
    position: absolute;
    top: 16px;
    right: -28px;
    width: 110px;
    padding: 4px 0;
    background: var(--color-danger);
    color: #fff;
    font-size: 0.6875rem;
    font-weight: 700;
    text-align: center;
    transform: rotate(45deg);
}

.price-box__header {
    padding: 1.5rem;
    background: var(--color-bg-light);
    text-align: center;
    border-bottom: 1px solid var(--color-border);
}

.price-box--featured .price-box__header {
    background: linear-gradient(135deg, #e0f2fe 0%, #f0f9ff 100%);
}

.price-box__icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 56px;
    height: 56px;
    margin: 0 auto 1rem;
    background: var(--color-bg);
    border-radius: 50%;
    color: var(--color-water-dark);
    box-shadow: var(--shadow-sm);
}

.price-box__title {
    font-size: 1.25rem;
    font-weight: 700;
    margin: 0;
    color: var(--color-text);
}

.price-box__size {
    font-size: 0.8125rem;
    color: var(--color-text-muted);
}

.price-box__body {
    flex: 1;
    padding: 1.5rem;
    text-align: center;
}

.price-box__price {
    font-family: var(--font-en);
    margin-bottom: 0.5rem;
}

.price-box__from {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--color-water-dark);
    vertical-align: top;
}

.price-box__amount {
    font-size: 3rem;
    font-weight: 900;
    color: var(--color-water-dark);
    line-height: 1;
}

.price-box__unit {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--color-water-dark);
}

.price-box__note {
    font-size: 0.75rem;
    color: var(--color-text-muted);
    margin: 0 0 1.25rem;
}

.price-box__includes {
    list-style: none;
    margin: 0;
    padding: 0;
    text-align: left;
}

.price-box__includes li {
    position: relative;
    padding: 0.5rem 0 0.5rem 1.5rem;
    font-size: 0.875rem;
    color: var(--color-text);
    border-bottom: 1px dashed var(--color-border);
}

.price-box__includes li:last-child {
    border-bottom: none;
}

.price-box__includes li::before {
    content: '';
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    width: 16px;
    height: 16px;
    background: var(--color-success);
    border-radius: 50%;
    background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 24 24' width='10' height='10' fill='none' stroke='white' stroke-width='3' xmlns='http://www.w3.org/2000/svg'%3E%3Cpolyline points='20 6 9 17 4 12'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: center;
    background-size: 10px;
}

.price-guide__note {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    padding: 1.5rem;
    background: #fffbeb;
    border-radius: var(--radius-lg);
    border-left: 4px solid var(--color-accent);
}

.price-guide__note-icon {
    flex-shrink: 0;
    color: var(--color-accent);
}

.price-guide__note p {
    margin: 0;
    font-size: 0.9375rem;
    color: var(--color-text);
    line-height: 1.7;
}

@media (max-width: 1024px) {
    .price-guide__grid {
        grid-template-columns: 1fr;
        max-width: 400px;
        margin: 0 auto 2rem;
    }
    
    .price-box--featured {
        order: -1;
    }
}

/* =============================================================================
   FAQ SECTION
   ============================================================================= */
.faq {
    background: var(--color-bg-light);
    position: relative;
}

.faq__bg {
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, transparent 0%, rgba(14, 165, 233, 0.02) 100%);
}

.faq__list {
    max-width: 800px;
    margin: 0 auto;
    position: relative;
}

.faq-item {
    background: var(--color-bg);
    border-radius: var(--radius-lg);
    margin-bottom: 1rem;
    box-shadow: var(--shadow-sm);
    overflow: hidden;
}

.faq-item__question {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1.25rem 1.5rem;
    cursor: pointer;
    list-style: none;
    font-weight: 600;
    transition: var(--transition-base);
}

.faq-item__question::-webkit-details-marker {
    display: none;
}

.faq-item__question:hover {
    background: var(--color-bg-light);
}

.faq-item__q {
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
    background: var(--color-water);
    color: #fff;
    font-family: var(--font-en);
    font-size: 1rem;
    font-weight: 700;
    border-radius: 50%;
}

.faq-item__text {
    flex: 1;
    font-size: 1rem;
    color: var(--color-text);
}

.faq-item__toggle {
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
    color: var(--color-text-muted);
    transition: transform var(--transition-base);
}

.faq-item[open] .faq-item__toggle {
    transform: rotate(180deg);
}

.faq-item__answer {
    display: flex;
    gap: 1rem;
    padding: 0 1.5rem 1.5rem;
}

.faq-item__a {
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
    background: var(--color-accent);
    color: #fff;
    font-family: var(--font-en);
    font-size: 1rem;
    font-weight: 700;
    border-radius: 50%;
}

.faq-item__content {
    flex: 1;
    font-size: 0.9375rem;
    color: var(--color-text-light);
    line-height: 1.8;
}

.faq-item__content p {
    margin: 0 0 1em;
}

.faq-item__content p:last-child {
    margin-bottom: 0;
}

.faq-item__content ul {
    margin: 0.5em 0;
    padding-left: 1.5em;
}

.faq-item__content li {
    margin-bottom: 0.25em;
}

.faq__more {
    text-align: center;
    margin-top: 2rem;
}

/* =============================================================================
   CTA SECTION
   ============================================================================= */
.cta {
    position: relative;
    padding: 100px 0;
    color: #fff;
    overflow: hidden;
}

.cta__bg {
    position: absolute;
    inset: 0;
}

.cta__bg-gradient {
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, var(--color-water) 0%, var(--color-primary) 100%);
}

.cta__bg-pattern {
    position: absolute;
    inset: 0;
    opacity: 0.1;
    background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}

.cta__content {
    position: relative;
    z-index: 1;
    max-width: 900px;
    margin: 0 auto;
    text-align: center;
}

.cta__header {
    margin-bottom: 3rem;
}

.cta__icon {
    margin-bottom: 1.5rem;
    opacity: 0.9;
}

.cta__title {
    font-size: clamp(1.75rem, 4vw, 2.5rem);
    font-weight: 900;
    line-height: 1.3;
    margin: 0 0 1rem;
}

.cta__title-highlight {
    position: relative;
    display: inline-block;
}

.cta__title-highlight::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 100%;
    height: 8px;
    background: var(--color-accent);
    opacity: 0.8;
    z-index: -1;
}

.cta__lead {
    font-size: 1rem;
    opacity: 0.9;
    margin: 0;
    line-height: 1.8;
}

.cta__actions {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 2rem;
    flex-wrap: wrap;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border-radius: var(--radius-xl);
    padding: 2.5rem;
    margin-bottom: 2rem;
}

.cta__phone {
    text-align: center;
}

.cta__phone-label {
    display: block;
    font-size: 0.875rem;
    opacity: 0.8;
    margin-bottom: 0.5rem;
}

.cta__phone-number {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    font-family: var(--font-en);
    font-size: clamp(1.75rem, 4vw, 2.5rem);
    font-weight: 900;
    color: #fff;
    letter-spacing: 0.02em;
    transition: var(--transition-base);
}

.cta__phone-number:hover {
    transform: scale(1.05);
}

.cta__phone-hours {
    display: block;
    font-size: 0.8125rem;
    opacity: 0.7;
    margin-top: 0.5rem;
}

.cta__divider {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 60px;
    height: 60px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    font-size: 0.8125rem;
    opacity: 0.8;
}

.cta__buttons {
    min-width: 300px;
}

.cta__buttons .btn {
    margin-bottom: 0.75rem;
}

.cta__buttons .btn:last-child {
    margin-bottom: 0;
}

.cta__assurance {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 1rem 2rem;
    list-style: none;
    margin: 0;
    padding: 0;
}

.cta__assurance li {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.9375rem;
}

.cta__assurance svg {
    color: #86efac;
}

@media (max-width: 768px) {
    .cta {
        padding: 60px 0;
    }
    
    .cta__actions {
        flex-direction: column;
        padding: 1.5rem;
        gap: 1.5rem;
    }
    
    .cta__divider {
        width: 100%;
        height: auto;
        padding: 0.5rem;
        border-radius: var(--radius-full);
    }
    
    .cta__buttons {
        width: 100%;
        min-width: auto;
    }
}

/* =============================================================================
   RELATED SERVICES
   ============================================================================= */
.related-services {
    background: var(--color-bg);
    padding: 80px 0;
}

.related-services__grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
}

.related-card {
    display: block;
    background: var(--color-bg);
    border: 1px solid var(--color-border);
    border-radius: var(--radius-xl);
    overflow: hidden;
    transition: var(--transition-base);
}

.related-card:hover {
    transform: translateY(-6px);
    box-shadow: var(--shadow-xl);
    border-color: var(--color-water-light);
}

.related-card__image {
    height: 180px;
    overflow: hidden;
}

.related-card__image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.related-card:hover .related-card__image img {
    transform: scale(1.05);
}

.related-card__body {
    padding: 1.25rem;
}

.related-card__title {
    font-size: 1.125rem;
    font-weight: 700;
    margin: 0 0 0.5rem;
    color: var(--color-text);
}

.related-card__text {
    font-size: 0.875rem;
    color: var(--color-text-light);
    margin: 0 0 0.75rem;
    line-height: 1.6;
}

.related-card__link {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.875rem;
    font-weight: 600;
    color: var(--color-water-dark);
    transition: var(--transition-base);
}

.related-card:hover .related-card__link {
    gap: 0.75rem;
    color: var(--color-primary);
}

@media (max-width: 1024px) {
    .related-services__grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 640px) {
    .related-services__grid {
        grid-template-columns: 1fr;
    }
}

/* =============================================================================
   PRINT STYLES
   ============================================================================= */
@media print {
    .page-hero,
    .cta {
        background: #fff !important;
        color: #000 !important;
        -webkit-print-color-adjust: exact;
    }
    
    .page-hero__bg,
    .cta__bg {
        display: none;
    }
    
    .section {
        padding: 40px 0;
        page-break-inside: avoid;
    }
    
    .btn {
        border: 1px solid #000;
        background: transparent !important;
        color: #000 !important;
    }
}

/* =============================================================================
   ACCESSIBILITY
   ============================================================================= */
@media (prefers-reduced-motion: reduce) {
    *,
    *::before,
    *::after {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
    }
}

:focus-visible {
    outline: 3px solid var(--color-water);
    outline-offset: 2px;
}

.btn:focus-visible {
    outline: 3px solid var(--color-accent);
    outline-offset: 2px;
}
</style>

<?php get_footer(); ?>
