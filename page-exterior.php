<?php
/**
 * Template Name: 外壁塗装サービスページ
 * Description: 外壁塗装専門サービスの詳細ページ
 * 
 * @package Sato_Kenso
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

// 会社情報
$company_name    = sato_get_company_name();
$phone           = sato_get_phone();
$phone_link      = sato_get_phone_link();
$line_url        = sato_get_line_url();
$warranty_years  = sato_get_warranty_years();

// 構造化データ
$schema_service = [
    '@context' => 'https://schema.org',
    '@type' => 'Service',
    'serviceType' => '外壁塗装',
    'provider' => [
        '@type' => 'LocalBusiness',
        'name' => sato_get_company_name(true),
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
    'description' => '静岡県御殿場市を中心に、一級塗装技能士による高品質な外壁塗装サービスを提供。最長10年保証付き。',
    'offers' => [
        '@type' => 'Offer',
        'priceSpecification' => [
            '@type' => 'PriceSpecification',
            'price' => '498000',
            'priceCurrency' => 'JPY',
            'minPrice' => '498000',
        ],
    ],
];
?>

<script type="application/ld+json">
<?php echo wp_json_encode($schema_service, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT); ?>
</script>

<main id="main" class="service-page service-exterior" role="main">

    <!-- =========================================================================
         HERO - サービスヒーロー
         ========================================================================= -->
    <section class="service-hero">
        <div class="service-hero__bg">
            <div class="service-hero__bg-image" style="background-image: url('https://images.unsplash.com/photo-1621905252507-b35492cc74b4?auto=format&fit=crop&q=80&w=1920');"></div>
            <div class="service-hero__bg-overlay"></div>
        </div>
        
        <div class="container">
            <!-- パンくずリスト -->
            <nav class="breadcrumb" aria-label="パンくずリスト">
                <ol class="breadcrumb__list">
                    <li class="breadcrumb__item">
                        <a href="<?php echo home_url('/'); ?>" class="breadcrumb__link">
                            <svg class="breadcrumb__icon" viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                                <polyline points="9 22 9 12 15 12 15 22"/>
                            </svg>
                            ホーム
                        </a>
                    </li>
                    <li class="breadcrumb__separator">
                        <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="9 18 15 12 9 6"/>
                        </svg>
                    </li>
                    <li class="breadcrumb__item">
                        <a href="<?php echo home_url('/service/'); ?>" class="breadcrumb__link">サービス</a>
                    </li>
                    <li class="breadcrumb__separator">
                        <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="9 18 15 12 9 6"/>
                        </svg>
                    </li>
                    <li class="breadcrumb__item">
                        <span class="breadcrumb__current" aria-current="page">外壁塗装</span>
                    </li>
                </ol>
            </nav>

            <div class="service-hero__content">
                <div class="service-hero__badge">
                    <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="8" r="7"/>
                        <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"/>
                    </svg>
                    <span>一級塗装技能士施工</span>
                </div>
                
                <h1 class="service-hero__title">
                    <span class="service-hero__title-en">Exterior Painting</span>
                    <span class="service-hero__title-main">外壁塗装</span>
                </h1>
                
                <p class="service-hero__lead">
                    大切なお住まいを守る外壁塗装。<br>
                    国家資格を持つ職人が、下地処理から仕上げまで<br class="pc-only">
                    責任を持って施工いたします。
                </p>

                <div class="service-hero__price">
                    <span class="service-hero__price-label">参考価格（税込）</span>
                    <div class="service-hero__price-value">
                        <span class="service-hero__price-number">49.8</span>
                        <span class="service-hero__price-unit">万円〜</span>
                    </div>
                    <span class="service-hero__price-note">※延床30坪の場合</span>
                </div>

                <div class="service-hero__cta">
                    <a href="<?php echo home_url('/contact/'); ?>" class="btn btn--primary btn--xl">
                        <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                            <polyline points="22,6 12,13 2,6"/>
                        </svg>
                        無料見積りを依頼する
                    </a>
                    <a href="<?php echo esc_attr($phone_link); ?>" class="btn btn--outline-white btn--lg">
                        <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                        </svg>
                        <?php echo esc_html($phone); ?>
                    </a>
                </div>
            </div>
        </div>

        <!-- 装飾的な波 -->
        <div class="service-hero__wave">
            <svg viewBox="0 0 1440 120" preserveAspectRatio="none">
                <path d="M0,60 C360,120 720,0 1080,60 C1260,90 1380,40 1440,60 L1440,120 L0,120 Z" fill="#ffffff"/>
            </svg>
        </div>
    </section>

    <!-- =========================================================================
         INTRO - サービス概要
         ========================================================================= -->
    <section class="section service-intro">
        <div class="container">
            <div class="service-intro__grid">
                <div class="service-intro__content">
                    <h2 class="service-intro__title">
                        外壁塗装で<br>
                        <span class="marker">住まいの寿命を延ばす</span>
                    </h2>
                    <div class="service-intro__text">
                        <p>
                            外壁塗装は、単なる「見た目を綺麗にする」だけの工事ではありません。
                            紫外線や雨風から建物を守り、住まいの寿命を大きく左右する重要なメンテナンスです。
                        </p>
                        <p>
                            <?php echo esc_html($company_name); ?>では、一級塗装技能士の資格を持つ職人が
                            現場調査から施工まで一貫して担当。下地処理を丁寧に行い、
                            高品質な塗料で美しく長持ちする仕上がりをお約束します。
                        </p>
                    </div>

                    <ul class="service-intro__features">
                        <li>
                            <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                                <polyline points="22 4 12 14.01 9 11.01"/>
                            </svg>
                            <span>完全自社施工で中間マージンなし</span>
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                                <polyline points="22 4 12 14.01 9 11.01"/>
                            </svg>
                            <span>最長<?php echo esc_html($warranty_years); ?>年の品質保証</span>
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                                <polyline points="22 4 12 14.01 9 11.01"/>
                            </svg>
                            <span>近隣への挨拶・配慮も当社で対応</span>
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                                <polyline points="22 4 12 14.01 9 11.01"/>
                            </svg>
                            <span>カラーシミュレーションで仕上がりを確認</span>
                        </li>
                    </ul>
                </div>

                <div class="service-intro__image">
                    <div class="service-intro__image-main">
                        <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?auto=format&fit=crop&q=80&w=800" 
                             alt="外壁塗装の施工風景" 
                             loading="lazy"
                             width="600"
                             height="450">
                    </div>
                    <div class="service-intro__image-badge">
                        <div class="service-intro__image-badge-inner">
                            <span class="service-intro__image-badge-number"><?php echo esc_html($warranty_years); ?></span>
                            <span class="service-intro__image-badge-text">年保証</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- =========================================================================
         SYMPTOMS - こんな症状ありませんか？
         ========================================================================= -->
    <section class="section service-symptoms">
        <div class="service-symptoms__bg"></div>
        
        <div class="container">
            <header class="section__header section__header--center">
                <span class="section__label">CHECK</span>
                <h2 class="section__title">
                    こんな<span class="text-danger">症状</span>はありませんか？
                </h2>
                <p class="section__lead">
                    以下の症状が見られたら、外壁塗装のサインです。<br>
                    放置すると修繕費用が大幅に増加する可能性があります。
                </p>
            </header>

            <div class="symptoms-grid">
                <!-- 症状1: チョーキング -->
                <article class="symptom-card">
                    <div class="symptom-card__image">
                        <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&q=80&w=400" 
                             alt="チョーキング現象（白い粉）" 
                             loading="lazy">
                        <span class="symptom-card__level symptom-card__level--warning">要注意</span>
                    </div>
                    <div class="symptom-card__body">
                        <h3 class="symptom-card__title">
                            <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"/>
                                <line x1="12" y1="8" x2="12" y2="12"/>
                                <line x1="12" y1="16" x2="12.01" y2="16"/>
                            </svg>
                            チョーキング
                        </h3>
                        <p class="symptom-card__desc">
                            外壁を触ると白い粉が手につく現象。塗膜が紫外線で劣化し、防水機能が低下しているサインです。
                        </p>
                        <div class="symptom-card__action">
                            <span class="symptom-card__action-icon">
                                <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="9 18 15 12 9 6"/>
                                </svg>
                            </span>
                            <span>早めの塗り替えをおすすめします</span>
                        </div>
                    </div>
                </article>

                <!-- 症状2: ひび割れ -->
                <article class="symptom-card">
                    <div class="symptom-card__image">
                        <img src="https://images.unsplash.com/photo-1558618047-3c8c76ca7d13?auto=format&fit=crop&q=80&w=400" 
                             alt="外壁のひび割れ（クラック）" 
                             loading="lazy">
                        <span class="symptom-card__level symptom-card__level--danger">危険</span>
                    </div>
                    <div class="symptom-card__body">
                        <h3 class="symptom-card__title">
                            <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"/>
                                <line x1="12" y1="8" x2="12" y2="12"/>
                                <line x1="12" y1="16" x2="12.01" y2="16"/>
                            </svg>
                            ひび割れ（クラック）
                        </h3>
                        <p class="symptom-card__desc">
                            外壁に入った亀裂。0.3mm以上のひび割れは雨水が侵入し、構造材の腐食や雨漏りの原因になります。
                        </p>
                        <div class="symptom-card__action symptom-card__action--urgent">
                            <span class="symptom-card__action-icon">
                                <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="9 18 15 12 9 6"/>
                                </svg>
                            </span>
                            <span>早急な補修が必要です</span>
                        </div>
                    </div>
                </article>

                <!-- 症状3: 色あせ・変色 -->
                <article class="symptom-card">
                    <div class="symptom-card__image">
                        <img src="https://images.unsplash.com/photo-1513694203232-719a280e022f?auto=format&fit=crop&q=80&w=400" 
                             alt="外壁の色あせ・変色" 
                             loading="lazy">
                        <span class="symptom-card__level symptom-card__level--caution">注意</span>
                    </div>
                    <div class="symptom-card__body">
                        <h3 class="symptom-card__title">
                            <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"/>
                                <line x1="12" y1="8" x2="12" y2="12"/>
                                <line x1="12" y1="16" x2="12.01" y2="16"/>
                            </svg>
                            色あせ・変色
                        </h3>
                        <p class="symptom-card__desc">
                            新築時と比べて明らかに色が褪せている状態。紫外線による塗膜劣化の初期症状です。
                        </p>
                        <div class="symptom-card__action">
                            <span class="symptom-card__action-icon">
                                <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="9 18 15 12 9 6"/>
                                </svg>
                            </span>
                            <span>塗り替え時期の目安です</span>
                        </div>
                    </div>
                </article>

                <!-- 症状4: カビ・コケ -->
                <article class="symptom-card">
                    <div class="symptom-card__image">
                        <img src="https://images.unsplash.com/photo-1516455590571-18256e5bb9ff?auto=format&fit=crop&q=80&w=400" 
                             alt="外壁のカビ・コケ" 
                             loading="lazy">
                        <span class="symptom-card__level symptom-card__level--warning">要注意</span>
                    </div>
                    <div class="symptom-card__body">
                        <h3 class="symptom-card__title">
                            <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"/>
                                <line x1="12" y1="8" x2="12" y2="12"/>
                                <line x1="12" y1="16" x2="12.01" y2="16"/>
                            </svg>
                            カビ・コケ・藻
                        </h3>
                        <p class="symptom-card__desc">
                            北面や日陰に発生しやすい緑や黒の汚れ。防水性が低下し、湿気を含みやすくなっている証拠です。
                        </p>
                        <div class="symptom-card__action">
                            <span class="symptom-card__action-icon">
                                <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="9 18 15 12 9 6"/>
                                </svg>
                            </span>
                            <span>防カビ塗料での塗装がおすすめ</span>
                        </div>
                    </div>
                </article>

                <!-- 症状5: 塗膜の剥がれ -->
                <article class="symptom-card">
                    <div class="symptom-card__image">
                        <img src="https://images.unsplash.com/photo-1565538810643-b5bdb714032a?auto=format&fit=crop&q=80&w=400" 
                             alt="塗膜の剥がれ・膨れ" 
                             loading="lazy">
                        <span class="symptom-card__level symptom-card__level--danger">危険</span>
                    </div>
                    <div class="symptom-card__body">
                        <h3 class="symptom-card__title">
                            <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"/>
                                <line x1="12" y1="8" x2="12" y2="12"/>
                                <line x1="12" y1="16" x2="12.01" y2="16"/>
                            </svg>
                            塗膜の剥がれ・膨れ
                        </h3>
                        <p class="symptom-card__desc">
                            塗装がペロペロと剥がれたり、膨れ上がっている状態。下地が露出し、急速に劣化が進行します。
                        </p>
                        <div class="symptom-card__action symptom-card__action--urgent">
                            <span class="symptom-card__action-icon">
                                <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="9 18 15 12 9 6"/>
                                </svg>
                            </span>
                            <span>至急ご相談ください</span>
                        </div>
                    </div>
                </article>

                <!-- 症状6: シーリング劣化 -->
                <article class="symptom-card">
                    <div class="symptom-card__image">
                        <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?auto=format&fit=crop&q=80&w=400" 
                             alt="シーリング（コーキング）の劣化" 
                             loading="lazy">
                        <span class="symptom-card__level symptom-card__level--warning">要注意</span>
                    </div>
                    <div class="symptom-card__body">
                        <h3 class="symptom-card__title">
                            <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"/>
                                <line x1="12" y1="8" x2="12" y2="12"/>
                                <line x1="12" y1="16" x2="12.01" y2="16"/>
                            </svg>
                            シーリングの劣化
                        </h3>
                        <p class="symptom-card__desc">
                            目地のゴム部分がひび割れ・痩せ・剥離している状態。ここからの雨水侵入が最も多い原因です。
                        </p>
                        <div class="symptom-card__action">
                            <span class="symptom-card__action-icon">
                                <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="9 18 15 12 9 6"/>
                                </svg>
                            </span>
                            <span>打ち替え工事をおすすめ</span>
                        </div>
                    </div>
                </article>
            </div>

            <div class="symptoms-cta">
                <div class="symptoms-cta__content">
                    <p class="symptoms-cta__text">
                        <strong>症状が気になる方は、まず無料診断を。</strong><br>
                        当社の専門スタッフが現地でしっかり確認し、最適なご提案をいたします。
                    </p>
                    <a href="<?php echo home_url('/contact/'); ?>" class="btn btn--accent btn--lg">
                        <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="11" cy="11" r="8"/>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                        </svg>
                        無料診断を申し込む
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- =========================================================================
         PROCESS - 施工の流れ
         ========================================================================= -->
    <section class="section service-process">
        <div class="container">
            <header class="section__header section__header--center">
                <span class="section__label">PROCESS</span>
                <h2 class="section__title">
                    外壁塗装の<span class="marker">施工工程</span>
                </h2>
                <p class="section__lead">
                    丁寧な下地処理と確かな技術で、<br>
                    長持ちする美しい仕上がりを実現します。
                </p>
            </header>

            <div class="process-timeline">
                <!-- 工程1 -->
                <article class="process-step">
                    <div class="process-step__number">
                        <span>01</span>
                    </div>
                    <div class="process-step__content">
                        <div class="process-step__image">
                            <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?auto=format&fit=crop&q=80&w=400" 
                                 alt="足場設置" 
                                 loading="lazy">
                        </div>
                        <div class="process-step__body">
                            <h3 class="process-step__title">足場設置・養生</h3>
                            <p class="process-step__desc">
                                安全で効率的な作業のため、しっかりとした足場を設置。飛散防止ネットで周辺への塗料飛散を防ぎ、窓やエアコン室外機などを丁寧に養生します。
                            </p>
                            <div class="process-step__duration">
                                <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="10"/>
                                    <polyline points="12 6 12 12 16 14"/>
                                </svg>
                                作業目安：1日
                            </div>
                        </div>
                    </div>
                </article>

                <!-- 工程2 -->
                <article class="process-step">
                    <div class="process-step__number">
                        <span>02</span>
                    </div>
                    <div class="process-step__content">
                        <div class="process-step__image">
                            <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?auto=format&fit=crop&q=80&w=400" 
                                 alt="高圧洗浄" 
                                 loading="lazy">
                        </div>
                        <div class="process-step__body">
                            <h3 class="process-step__title">高圧洗浄</h3>
                            <p class="process-step__desc">
                                業務用の高圧洗浄機で、外壁に付着した汚れ・カビ・コケ・古い塗膜を徹底的に除去。この工程が塗料の密着性を大きく左右します。
                            </p>
                            <div class="process-step__duration">
                                <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="10"/>
                                    <polyline points="12 6 12 12 16 14"/>
                                </svg>
                                作業目安：1日
                            </div>
                        </div>
                    </div>
                </article>

                <!-- 工程3 -->
                <article class="process-step">
                    <div class="process-step__number">
                        <span>03</span>
                    </div>
                    <div class="process-step__content">
                        <div class="process-step__image">
                            <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&q=80&w=400" 
                                 alt="下地処理・補修" 
                                 loading="lazy">
                        </div>
                        <div class="process-step__body">
                            <h3 class="process-step__title">下地処理・補修</h3>
                            <p class="process-step__desc">
                                ひび割れの補修、旧塗膜の剥離箇所の処理、鉄部のケレン（錆落とし）など、塗装前の下地を整えます。この工程が塗装の持ちを決める最重要工程です。
                            </p>
                            <div class="process-step__duration">
                                <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="10"/>
                                    <polyline points="12 6 12 12 16 14"/>
                                </svg>
                                作業目安：1〜2日
                            </div>
                        </div>
                    </div>
                </article>

                <!-- 工程4 -->
                <article class="process-step">
                    <div class="process-step__number">
                        <span>04</span>
                    </div>
                    <div class="process-step__content">
                        <div class="process-step__image">
                            <img src="https://images.unsplash.com/photo-1562259949-e8e7689d7828?auto=format&fit=crop&q=80&w=400" 
                                 alt="シーリング工事" 
                                 loading="lazy">
                        </div>
                        <div class="process-step__body">
                            <h3 class="process-step__title">シーリング工事</h3>
                            <p class="process-step__desc">
                                サイディングの目地やサッシ周りのシーリング（コーキング）を打ち替え。高耐久のシーリング材を使用し、雨水の侵入を確実に防ぎます。
                            </p>
                            <div class="process-step__duration">
                                <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="10"/>
                                    <polyline points="12 6 12 12 16 14"/>
                                </svg>
                                作業目安：1〜2日
                            </div>
                        </div>
                    </div>
                </article>

                <!-- 工程5 -->
                <article class="process-step">
                    <div class="process-step__number">
                        <span>05</span>
                    </div>
                    <div class="process-step__content">
                        <div class="process-step__image">
                            <img src="https://images.unsplash.com/photo-1589939705384-5185137a7f0f?auto=format&fit=crop&q=80&w=400" 
                                 alt="下塗り" 
                                 loading="lazy">
                        </div>
                        <div class="process-step__body">
                            <h3 class="process-step__title">下塗り</h3>
                            <p class="process-step__desc">
                                上塗り塗料と下地の密着性を高めるプライマー（下塗り材）を塗布。外壁材の種類に合わせた最適な下塗り材を選定します。
                            </p>
                            <div class="process-step__duration">
                                <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="10"/>
                                    <polyline points="12 6 12 12 16 14"/>
                                </svg>
                                作業目安：1日
                            </div>
                        </div>
                    </div>
                </article>

                <!-- 工程6 -->
                <article class="process-step">
                    <div class="process-step__number">
                        <span>06</span>
                    </div>
                    <div class="process-step__content">
                        <div class="process-step__image">
                            <img src="https://images.unsplash.com/photo-1562259949-e8e7689d7828?auto=format&fit=crop&q=80&w=400" 
                                 alt="中塗り・上塗り" 
                                 loading="lazy">
                        </div>
                        <div class="process-step__body">
                            <h3 class="process-step__title">中塗り・上塗り</h3>
                            <p class="process-step__desc">
                                ご選定いただいた仕上げ塗料を2回に分けて塗布。塗り残しや塗りムラがないよう、職人の目で丁寧に仕上げます。
                            </p>
                            <div class="process-step__duration">
                                <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="10"/>
                                    <polyline points="12 6 12 12 16 14"/>
                                </svg>
                                作業目安：2〜3日
                            </div>
                        </div>
                    </div>
                </article>

                <!-- 工程7 -->
                <article class="process-step">
                    <div class="process-step__number">
                        <span>07</span>
                    </div>
                    <div class="process-step__content">
                        <div class="process-step__image">
                            <img src="https://images.unsplash.com/photo-1621905252507-b35492cc74b4?auto=format&fit=crop&q=80&w=400" 
                                 alt="完了検査・お引き渡し" 
                                 loading="lazy">
                        </div>
                        <div class="process-step__body">
                            <h3 class="process-step__title">完了検査・お引き渡し</h3>
                            <p class="process-step__desc">
                                足場解体前に全体を確認し、塗り残しや気になる箇所をチェック。お客様にもご確認いただき、ご納得の上でお引き渡しとなります。
                            </p>
                            <div class="process-step__duration">
                                <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="10"/>
                                    <polyline points="12 6 12 12 16 14"/>
                                </svg>
                                作業目安：1日
                            </div>
                        </div>
                    </div>
                </article>
            </div>

            <div class="process-note">
                <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"/>
                    <line x1="12" y1="16" x2="12" y2="12"/>
                    <line x1="12" y1="8" x2="12.01" y2="8"/>
                </svg>
                <p>
                    標準的な戸建住宅（延床30坪程度）で、<strong>約10〜14日</strong>の工期となります。<br>
                    雨天時は作業を中断するため、実際の日数は天候により変動します。
                </p>
            </div>
        </div>
    </section>

    <!-- =========================================================================
         PAINT TYPES - 塗料の種類
         ========================================================================= -->
    <section class="section service-paints">
        <div class="service-paints__bg"></div>
        
        <div class="container">
            <header class="section__header section__header--center">
                <span class="section__label">PAINT</span>
                <h2 class="section__title">
                    取り扱い<span class="marker">塗料</span>のご紹介
                </h2>
                <p class="section__lead">
                    一流メーカーの高品質塗料から、<br>
                    お客様のご予算と目的に合わせて最適な塗料をご提案します。
                </p>
            </header>

            <div class="paints-comparison">
                <!-- シリコン -->
                <article class="paint-card">
                    <div class="paint-card__header">
                        <span class="paint-card__grade">STANDARD</span>
                        <h3 class="paint-card__name">シリコン塗料</h3>
                    </div>
                    <div class="paint-card__body">
                        <div class="paint-card__visual">
                            <div class="paint-card__color" style="background: linear-gradient(135deg, #6b7280 0%, #9ca3af 100%);"></div>
                        </div>
                        <div class="paint-card__specs">
                            <dl class="paint-card__spec-list">
                                <div class="paint-card__spec">
                                    <dt>耐久年数</dt>
                                    <dd><strong>8〜10年</strong></dd>
                                </div>
                                <div class="paint-card__spec">
                                    <dt>価格帯</dt>
                                    <dd>
                                        <span class="paint-card__price-bar">
                                            <span style="width: 40%;"></span>
                                        </span>
                                        お手頃
                                    </dd>
                                </div>
                            </dl>
                        </div>
                        <p class="paint-card__desc">
                            コストパフォーマンスに優れたスタンダード塗料。初期費用を抑えたい方におすすめです。
                        </p>
                        <ul class="paint-card__features">
                            <li>
                                <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="20 6 9 17 4 12"/>
                                </svg>
                                価格と耐久性のバランスが良い
                            </li>
                            <li>
                                <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="20 6 9 17 4 12"/>
                                </svg>
                                豊富なカラーバリエーション
                            </li>
                        </ul>
                    </div>
                </article>

                <!-- ラジカル -->
                <article class="paint-card paint-card--featured">
                    <div class="paint-card__ribbon">人気No.1</div>
                    <div class="paint-card__header">
                        <span class="paint-card__grade">RECOMMEND</span>
                        <h3 class="paint-card__name">ラジカル塗料</h3>
                    </div>
                    <div class="paint-card__body">
                        <div class="paint-card__visual">
                            <div class="paint-card__color" style="background: linear-gradient(135deg, #3b82f6 0%, #60a5fa 100%);"></div>
                        </div>
                        <div class="paint-card__specs">
                            <dl class="paint-card__spec-list">
                                <div class="paint-card__spec">
                                    <dt>耐久年数</dt>
                                    <dd><strong>12〜15年</strong></dd>
                                </div>
                                <div class="paint-card__spec">
                                    <dt>価格帯</dt>
                                    <dd>
                                        <span class="paint-card__price-bar">
                                            <span style="width: 60%;"></span>
                                        </span>
                                        中程度
                                    </dd>
                                </div>
                            </dl>
                        </div>
                        <p class="paint-card__desc">
                            シリコンより高耐久でフッ素よりお手頃。最もバランスの取れた人気の塗料です。
                        </p>
                        <ul class="paint-card__features">
                            <li>
                                <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="20 6 9 17 4 12"/>
                                </svg>
                                ラジカル制御で色あせしにくい
                            </li>
                            <li>
                                <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="20 6 9 17 4 12"/>
                                </svg>
                                光沢が長持ち
                            </li>
                            <li>
                                <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="20 6 9 17 4 12"/>
                                </svg>
                                当店一番人気
                            </li>
                        </ul>
                    </div>
                </article>

                <!-- フッ素 -->
                <article class="paint-card">
                    <div class="paint-card__header">
                        <span class="paint-card__grade">PREMIUM</span>
                        <h3 class="paint-card__name">フッ素塗料</h3>
                    </div>
                    <div class="paint-card__body">
                        <div class="paint-card__visual">
                            <div class="paint-card__color" style="background: linear-gradient(135deg, #f59e0b 0%, #fbbf24 100%);"></div>
                        </div>
                        <div class="paint-card__specs">
                            <dl class="paint-card__spec-list">
                                <div class="paint-card__spec">
                                    <dt>耐久年数</dt>
                                    <dd><strong>15〜20年</strong></dd>
                                </div>
                                <div class="paint-card__spec">
                                    <dt>価格帯</dt>
                                    <dd>
                                        <span class="paint-card__price-bar">
                                            <span style="width: 85%;"></span>
                                        </span>
                                        高価格
                                    </dd>
                                </div>
                            </dl>
                        </div>
                        <p class="paint-card__desc">
                            最高グレードの超高耐久塗料。長期間メンテナンス不要で、ライフサイクルコストを抑えます。
                        </p>
                        <ul class="paint-card__features">
                            <li>
                                <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="20 6 9 17 4 12"/>
                                </svg>
                                圧倒的な耐候性・耐久性
                            </li>
                            <li>
                                <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="20 6 9 17 4 12"/>
                                </svg>
                                汚れにくい親水性
                            </li>
                            <li>
                                <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="20 6 9 17 4 12"/>
                                </svg>
                                長期的にはコスパ◎
                            </li>
                        </ul>
                    </div>
                </article>

                <!-- 無機 -->
                <article class="paint-card">
                    <div class="paint-card__header">
                        <span class="paint-card__grade">HIGHEST</span>
                        <h3 class="paint-card__name">無機塗料</h3>
                    </div>
                    <div class="paint-card__body">
                        <div class="paint-card__visual">
                            <div class="paint-card__color" style="background: linear-gradient(135deg, #8b5cf6 0%, #a78bfa 100%);"></div>
                        </div>
                        <div class="paint-card__specs">
                            <dl class="paint-card__spec-list">
                                <div class="paint-card__spec">
                                    <dt>耐久年数</dt>
                                    <dd><strong>20〜25年</strong></dd>
                                </div>
                                <div class="paint-card__spec">
                                    <dt>価格帯</dt>
                                    <dd>
                                        <span class="paint-card__price-bar">
                                            <span style="width: 100%;"></span>
                                        </span>
                                        最高級
                                    </dd>
                                </div>
                            </dl>
                        </div>
                        <p class="paint-card__desc">
                            ガラスと同等の無機成分を配合した最上位塗料。次の塗り替えは20年以上先になります。
                        </p>
                        <ul class="paint-card__features">
                            <li>
                                <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="20 6 9 17 4 12"/>
                                </svg>
                                業界最高レベルの耐久性
                            </li>
                            <li>
                                <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="20 6 9 17 4 12"/>
                                </svg>
                                紫外線に強い
                            </li>
                            <li>
                                <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="20 6 9 17 4 12"/>
                                </svg>
                                将来の塗り替え回数を削減
                            </li>
                        </ul>
                    </div>
                </article>
            </div>

            <div class="paints-makers">
                <h3 class="paints-makers__title">取り扱いメーカー</h3>
                <ul class="paints-makers__list">
                    <li class="paints-makers__item">
                        <img src="https://via.placeholder.com/160x60/f3f4f6/666666?text=日本ペイント" alt="日本ペイント" loading="lazy">
                    </li>
                    <li class="paints-makers__item">
                        <img src="https://via.placeholder.com/160x60/f3f4f6/666666?text=関西ペイント" alt="関西ペイント" loading="lazy">
                    </li>
                    <li class="paints-makers__item">
                        <img src="https://via.placeholder.com/160x60/f3f4f6/666666?text=エスケー化研" alt="エスケー化研" loading="lazy">
                    </li>
                    <li class="paints-makers__item">
                        <img src="https://via.placeholder.com/160x60/f3f4f6/666666?text=アステック" alt="アステックペイント" loading="lazy">
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- =========================================================================
         PRICING - 料金プラン
         ========================================================================= -->
    <section class="section service-pricing">
        <div class="container">
            <header class="section__header section__header--center">
                <span class="section__label">PRICE</span>
                <h2 class="section__title">
                    外壁塗装の<span class="marker marker--accent">料金目安</span>
                </h2>
                <p class="section__lead">
                    足場・高圧洗浄・養生・シーリング・3回塗り・保証<br>
                    すべて含んだコミコミ価格です。
                </p>
            </header>

            <div class="pricing-table-wrap">
                <table class="pricing-table">
                    <thead>
                        <tr>
                            <th>延床面積</th>
                            <th>シリコン<span class="pricing-table__sub">8〜10年</span></th>
                            <th class="pricing-table__featured">ラジカル<span class="pricing-table__sub">12〜15年</span></th>
                            <th>フッ素<span class="pricing-table__sub">15〜20年</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>25坪</td>
                            <td>44.8万円〜</td>
                            <td class="pricing-table__featured">52.8万円〜</td>
                            <td>64.8万円〜</td>
                        </tr>
                        <tr>
                            <td>30坪</td>
                            <td>49.8万円〜</td>
                            <td class="pricing-table__featured">59.8万円〜</td>
                            <td>74.8万円〜</td>
                        </tr>
                        <tr>
                            <td>35坪</td>
                            <td>54.8万円〜</td>
                            <td class="pricing-table__featured">66.8万円〜</td>
                            <td>84.8万円〜</td>
                        </tr>
                        <tr>
                            <td>40坪</td>
                            <td>59.8万円〜</td>
                            <td class="pricing-table__featured">73.8万円〜</td>
                            <td>94.8万円〜</td>
                        </tr>
                        <tr>
                            <td>45坪</td>
                            <td>64.8万円〜</td>
                            <td class="pricing-table__featured">80.8万円〜</td>
                            <td>104.8万円〜</td>
                        </tr>
                        <tr>
                            <td>50坪以上</td>
                            <td colspan="3">お見積りにてご案内</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="pricing-includes">
                <h3 class="pricing-includes__title">
                    <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                        <polyline points="22 4 12 14.01 9 11.01"/>
                    </svg>
                    上記料金に含まれるもの
                </h3>
                <ul class="pricing-includes__list">
                    <li>足場設置・解体</li>
                    <li>飛散防止ネット</li>
                    <li>高圧洗浄</li>
                    <li>養生</li>
                    <li>下地補修</li>
                    <li>シーリング打替</li>
                    <li>下塗り</li>
                    <li>中塗り</li>
                    <li>上塗り</li>
                    <li>付帯部塗装</li>
                    <li>完了検査</li>
                    <li>品質保証</li>
                </ul>
            </div>

            <p class="pricing-note">
                ※価格はすべて税込表示です。建物の形状・劣化状況・付帯部の数量により変動します。<br>
                正確な金額は無料現地調査にてお見積りいたします。
            </p>

            <div class="pricing-cta">
                <a href="<?php echo home_url('/contact/'); ?>" class="btn btn--primary btn--xl">
                    <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                        <line x1="16" y1="2" x2="16" y2="6"/>
                        <line x1="8" y1="2" x2="8" y2="6"/>
                        <line x1="3" y1="10" x2="21" y2="10"/>
                    </svg>
                    無料見積りを依頼する
                </a>
            </div>
        </div>
    </section>

    <!-- =========================================================================
         WORKS - 施工事例
         ========================================================================= -->
    <section class="section service-works">
        <div class="service-works__bg"></div>
        
        <div class="container">
            <header class="section__header section__header--center">
                <span class="section__label">WORKS</span>
                <h2 class="section__title">
                    外壁塗装の<span class="marker">施工事例</span>
                </h2>
            </header>

            <div class="works-grid">
                <?php
                $works_args = [
                    'post_type'      => 'works',
                    'posts_per_page' => 4,
                    'post_status'    => 'publish',
                    'tax_query'      => [
                        [
                            'taxonomy' => 'works_category',
                            'field'    => 'slug',
                            'terms'    => 'exterior',
                        ],
                    ],
                ];
                $works_query = new WP_Query($works_args);
                
                if ($works_query->have_posts()) :
                    while ($works_query->have_posts()) : $works_query->the_post();
                        $before_id   = get_post_meta(get_the_ID(), '_works_before_image', true);
                        $after_id    = get_post_meta(get_the_ID(), '_works_after_image', true);
                        $client_name = get_post_meta(get_the_ID(), '_works_client_name', true);
                        $work_cost   = get_post_meta(get_the_ID(), '_works_cost', true);
                        
                        $before_url = $before_id ? wp_get_attachment_image_url($before_id, 'works-card') : 'https://via.placeholder.com/400x300/cccccc/666666?text=Before';
                        $after_url  = $after_id ? wp_get_attachment_image_url($after_id, 'works-card') : (has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'works-card') : 'https://via.placeholder.com/400x300/0d47a1/ffffff?text=After');
                ?>
                <article class="works-item">
                    <a href="<?php the_permalink(); ?>" class="works-item__link">
                        <div class="works-item__images">
                            <div class="works-item__before">
                                <img src="<?php echo esc_url($before_url); ?>" alt="施工前" loading="lazy">
                                <span class="works-item__label">Before</span>
                            </div>
                            <div class="works-item__after">
                                <img src="<?php echo esc_url($after_url); ?>" alt="施工後" loading="lazy">
                                <span class="works-item__label">After</span>
                            </div>
                        </div>
                        <div class="works-item__body">
                            <h3 class="works-item__title"><?php the_title(); ?></h3>
                            <?php if ($client_name || $work_cost) : ?>
                            <div class="works-item__meta">
                                <?php if ($client_name) : ?>
                                <span>
                                    <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                                        <circle cx="12" cy="10" r="3"/>
                                    </svg>
                                    <?php echo esc_html($client_name); ?>
                                </span>
                                <?php endif; ?>
                                <?php if ($work_cost) : ?>
                                <span>
                                    <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2">
                                        <line x1="12" y1="1" x2="12" y2="23"/>
                                        <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/>
                                    </svg>
                                    <?php echo esc_html($work_cost); ?>
                                </span>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </a>
                </article>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                ?>
                <!-- ダミー施工事例 -->
                <article class="works-item">
                    <a href="#" class="works-item__link">
                        <div class="works-item__images">
                            <div class="works-item__before">
                                <img src="https://via.placeholder.com/400x300/a0a0a0/666666?text=Before" alt="施工前" loading="lazy">
                                <span class="works-item__label">Before</span>
                            </div>
                            <div class="works-item__after">
                                <img src="https://via.placeholder.com/400x300/0d47a1/ffffff?text=After" alt="施工後" loading="lazy">
                                <span class="works-item__label">After</span>
                            </div>
                        </div>
                        <div class="works-item__body">
                            <h3 class="works-item__title">御殿場市 S様邸 外壁塗装工事</h3>
                            <div class="works-item__meta">
                                <span>
                                    <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                                        <circle cx="12" cy="10" r="3"/>
                                    </svg>
                                    御殿場市
                                </span>
                                <span>
                                    <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2">
                                        <line x1="12" y1="1" x2="12" y2="23"/>
                                        <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/>
                                    </svg>
                                    約65万円
                                </span>
                            </div>
                        </div>
                    </a>
                </article>
                <article class="works-item">
                    <a href="#" class="works-item__link">
                        <div class="works-item__images">
                            <div class="works-item__before">
                                <img src="https://via.placeholder.com/400x300/a0a0a0/666666?text=Before" alt="施工前" loading="lazy">
                                <span class="works-item__label">Before</span>
                            </div>
                            <div class="works-item__after">
                                <img src="https://via.placeholder.com/400x300/0d47a1/ffffff?text=After" alt="施工後" loading="lazy">
                                <span class="works-item__label">After</span>
                            </div>
                        </div>
                        <div class="works-item__body">
                            <h3 class="works-item__title">裾野市 T様邸 外壁塗装工事</h3>
                            <div class="works-item__meta">
                                <span>
                                    <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                                        <circle cx="12" cy="10" r="3"/>
                                    </svg>
                                    裾野市
                                </span>
                                <span>
                                    <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2">
                                        <line x1="12" y1="1" x2="12" y2="23"/>
                                        <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/>
                                    </svg>
                                    約72万円
                                </span>
                            </div>
                        </div>
                    </a>
                </article>
                <?php endif; ?>
            </div>

            <div class="section__footer">
                <a href="<?php echo home_url('/works/?category=exterior'); ?>" class="btn btn--outline btn--lg">
                    外壁塗装の施工事例をもっと見る
                    <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="5" y1="12" x2="19" y2="12"/>
                        <polyline points="12 5 19 12 12 19"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- =========================================================================
         FAQ - よくある質問
         ========================================================================= -->
    <section class="section service-faq">
        <div class="container">
            <header class="section__header section__header--center">
                <span class="section__label">FAQ</span>
                <h2 class="section__title">
                    外壁塗装の<span class="marker">よくある質問</span>
                </h2>
            </header>

            <div class="faq-list">
                <details class="faq-item">
                    <summary class="faq-item__question">
                        <span class="faq-item__q">Q</span>
                        <span class="faq-item__text">外壁塗装の塗り替え時期の目安は？</span>
                        <span class="faq-item__toggle">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="6 9 12 15 18 9"/>
                            </svg>
                        </span>
                    </summary>
                    <div class="faq-item__answer">
                        <span class="faq-item__a">A</span>
                        <div class="faq-item__content">
                            <p>一般的には新築から<strong>10年前後</strong>が塗り替えの目安です。ただし、使用している塗料のグレードや建物の立地条件（日当たり・海沿いなど）によって異なります。チョーキング（白い粉がつく）やひび割れが見られたら、早めの診断をおすすめします。</p>
                        </div>
                    </div>
                </details>

                <details class="faq-item">
                    <summary class="faq-item__question">
                        <span class="faq-item__q">Q</span>
                        <span class="faq-item__text">工事中は家にいなければなりませんか？</span>
                        <span class="faq-item__toggle">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="6 9 12 15 18 9"/>
                            </svg>
                        </span>
                    </summary>
                    <div class="faq-item__answer">
                        <span class="faq-item__a">A</span>
                        <div class="faq-item__content">
                            <p>基本的には<strong>ご不在でも問題ありません</strong>。外壁塗装は建物の外側の作業ですので、室内に入ることはありません。ただし、作業開始時と終了時のご確認、また色の確認などでお立ち会いいただく場面もあります。事前にスケジュールをお伝えしますので、ご都合の良い日時にご確認ください。</p>
                        </div>
                    </div>
                </details>

                <details class="faq-item">
                    <summary class="faq-item__question">
                        <span class="faq-item__q">Q</span>
                        <span class="faq-item__text">塗料のにおいは気になりますか？</span>
                        <span class="faq-item__toggle">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="6 9 12 15 18 9"/>
                            </svg>
                        </span>
                    </summary>
                    <div class="faq-item__answer">
                        <span class="faq-item__a">A</span>
                        <div class="faq-item__content">
                            <p>最近の塗料は<strong>水性塗料</strong>が主流で、従来の油性塗料に比べてにおいは大幅に軽減されています。それでも塗装中は多少のにおいがありますので、気になる場合は窓を閉めていただくか、換気の方向にご注意ください。においに敏感な方には低臭タイプの塗料もご提案可能です。</p>
                        </div>
                    </div>
                </details>

                <details class="faq-item">
                    <summary class="faq-item__question">
                        <span class="faq-item__q">Q</span>
                        <span class="faq-item__text">雨の日も工事はできますか？</span>
                        <span class="faq-item__toggle">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="6 9 12 15 18 9"/>
                            </svg>
                        </span>
                    </summary>
                    <div class="faq-item__answer">
                        <span class="faq-item__a">A</span>
                        <div class="faq-item__content">
                            <p><strong>雨天時は塗装作業は中断</strong>します。塗料が雨で流れたり、乾燥不良の原因になるためです。ただし、足場の設置や養生など、雨でも可能な作業は進めることがあります。天候による工期延長分の追加料金はいただきません。</p>
                        </div>
                    </div>
                </details>

                <details class="faq-item">
                    <summary class="faq-item__question">
                        <span class="faq-item__q">Q</span>
                        <span class="faq-item__text">保証はどのような内容ですか？</span>
                        <span class="faq-item__toggle">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="6 9 12 15 18 9"/>
                            </svg>
                        </span>
                    </summary>
                    <div class="faq-item__answer">
                        <span class="faq-item__a">A</span>
                        <div class="faq-item__content">
                            <p>塗料のグレードに応じて<strong>最長<?php echo esc_html($warranty_years); ?>年の品質保証</strong>をお付けしています。保証期間内に塗膜の剥離・著しい変色・ひび割れなどが発生した場合は、無償で補修いたします。保証書を発行し、アフターフォローも責任を持って対応します。</p>
                        </div>
                    </div>
                </details>
            </div>

            <div class="section__footer">
                <a href="<?php echo home_url('/faq/'); ?>" class="btn btn--outline btn--lg">
                    よくある質問をもっと見る
                    <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="5" y1="12" x2="19" y2="12"/>
                        <polyline points="12 5 19 12 12 19"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- =========================================================================
         CTA - お問い合わせ誘導
         ========================================================================= -->
    <section class="service-cta">
        <div class="service-cta__bg">
            <div class="service-cta__bg-gradient"></div>
            <div class="service-cta__bg-pattern"></div>
        </div>

        <div class="container">
            <div class="service-cta__content">
                <h2 class="service-cta__title">
                    外壁塗装のご相談は<br>
                    <span class="service-cta__title-highlight"><?php echo esc_html($company_name); ?></span>へ
                </h2>
                <p class="service-cta__lead">
                    「まだ塗り替え時期かわからない」「とりあえず価格だけ知りたい」<br>
                    という方も大歓迎。現地調査・お見積りは<strong>完全無料</strong>です。
                </p>

                <div class="service-cta__actions">
                    <div class="service-cta__phone">
                        <span class="service-cta__phone-label">お電話でのご相談</span>
                        <a href="<?php echo esc_attr($phone_link); ?>" class="service-cta__phone-number">
                            <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                            </svg>
                            <?php echo esc_html($phone); ?>
                        </a>
                        <span class="service-cta__phone-hours">受付 8:00〜18:00（日曜・祝日休）</span>
                    </div>

                    <div class="service-cta__divider">または</div>

                    <div class="service-cta__buttons">
                        <a href="<?php echo home_url('/contact/'); ?>" class="btn btn--accent btn--xl btn--block">
                            <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                                <polyline points="22,6 12,13 2,6"/>
                            </svg>
                            無料見積り・診断を依頼
                        </a>
                        <?php if ($line_url) : ?>
                        <a href="<?php echo esc_url($line_url); ?>" class="btn btn--line btn--lg btn--block" target="_blank" rel="noopener noreferrer">
                            <svg viewBox="0 0 24 24" width="22" height="22" fill="currentColor">
                                <path d="M19.365 9.863c.349 0 .63.285.63.631 0 .345-.281.63-.63.63H17.61v1.125h1.755c.349 0 .63.283.63.63 0 .344-.281.629-.63.629h-2.386c-.345 0-.627-.285-.627-.629V8.108c0-.345.282-.63.627-.63h2.386c.349 0 .63.285.63.63 0 .349-.281.63-.63.63H17.61v1.125h1.755zm-3.855 3.016c0 .27-.174.51-.432.596-.064.021-.133.031-.199.031-.211 0-.391-.09-.51-.25l-2.443-3.317v2.94c0 .344-.279.629-.631.629-.346 0-.626-.285-.626-.629V8.108c0-.27.173-.51.43-.595.06-.023.136-.033.194-.033.195 0 .375.104.495.254l2.462 3.33V8.108c0-.345.282-.63.63-.63.345 0 .63.285.63.63v4.771zm-5.741 0c0 .344-.282.629-.631.629-.345 0-.627-.285-.627-.629V8.108c0-.345.282-.63.627-.63.349 0 .631.285.631.63v4.771zm-2.466.629H4.917c-.345 0-.63-.285-.63-.629V8.108c0-.345.285-.63.63-.63.349 0 .63.285.63.63v4.141h1.756c.348 0 .629.283.629.63 0 .344-.281.629-.629.629M24 10.314C24 4.943 18.615.572 12 .572S0 4.943 0 10.314c0 4.811 4.27 8.842 10.035 9.608.391.082.923.258 1.058.59.12.301.079.766.038 1.08l-.164 1.02c-.045.301-.24 1.186 1.049.645 1.291-.539 6.916-4.078 9.436-6.975C23.176 14.393 24 12.458 24 10.314"/>
                            </svg>
                            LINEで気軽に相談
                        </a>
                        <?php endif; ?>
                    </div>
                </div>

                <ul class="service-cta__assurance">
                    <li>
                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                            <polyline points="22 4 12 14.01 9 11.01"/>
                        </svg>
                        見積り無料
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                            <polyline points="22 4 12 14.01 9 11.01"/>
                        </svg>
                        出張無料
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                            <polyline points="22 4 12 14.01 9 11.01"/>
                        </svg>
                        相見積り歓迎
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                            <polyline points="22 4 12 14.01 9 11.01"/>
                        </svg>
                        しつこい営業なし
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- =========================================================================
         RELATED SERVICES - 関連サービス
         ========================================================================= -->
    <section class="section service-related">
        <div class="container">
            <header class="section__header section__header--center">
                <h2 class="section__title">関連サービス</h2>
            </header>

            <div class="related-grid">
                <a href="<?php echo home_url('/service/roof/'); ?>" class="related-card">
                    <div class="related-card__image">
                        <img src="https://images.unsplash.com/photo-1632759145351-1d592919f522?auto=format&fit=crop&q=80&w=400" 
                             alt="屋根塗装" 
                             loading="lazy">
                    </div>
                    <div class="related-card__body">
                        <h3 class="related-card__title">屋根塗装</h3>
                        <p class="related-card__desc">外壁と一緒に塗装すると足場代がお得に</p>
                        <span class="related-card__link">
                            詳しく見る
                            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="5" y1="12" x2="19" y2="12"/>
                                <polyline points="12 5 19 12 12 19"/>
                            </svg>
                        </span>
                    </div>
                </a>

                <a href="<?php echo home_url('/service/waterproof/'); ?>" class="related-card">
                    <div class="related-card__image">
                        <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&q=80&w=400" 
                             alt="防水工事" 
                             loading="lazy">
                    </div>
                    <div class="related-card__body">
                        <h3 class="related-card__title">防水工事</h3>
                        <p class="related-card__desc">ベランダ・屋上の雨漏り対策に</p>
                        <span class="related-card__link">
                            詳しく見る
                            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="5" y1="12" x2="19" y2="12"/>
                                <polyline points="12 5 19 12 12 19"/>
                            </svg>
                        </span>
                    </div>
                </a>

                <a href="<?php echo home_url('/service/sealant/'); ?>" class="related-card">
                    <div class="related-card__image">
                        <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?auto=format&fit=crop&q=80&w=400" 
                             alt="シーリング工事" 
                             loading="lazy">
                    </div>
                    <div class="related-card__body">
                        <h3 class="related-card__title">シーリング工事</h3>
                        <p class="related-card__desc">目地の劣化は雨漏りの原因に</p>
                        <span class="related-card__link">
                            詳しく見る
                            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="5" y1="12" x2="19" y2="12"/>
                                <polyline points="12 5 19 12 12 19"/>
                            </svg>
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
   CSS Variables (継承 + 追加)
   ============================================================================= */
:root {
    --color-primary: #0d47a1;
    --color-primary-dark: #002171;
    --color-primary-light: #5472d3;
    --color-accent: #f59e0b;
    --color-accent-dark: #d97706;
    --color-success: #22c55e;
    --color-warning: #eab308;
    --color-danger: #ef4444;
    --color-line: #06c755;
    
    --color-text: #1a1a1a;
    --color-text-light: #666666;
    --color-text-muted: #999999;
    --color-bg: #ffffff;
    --color-bg-light: #f8fafc;
    --color-bg-dark: #0f172a;
    --color-border: #e2e8f0;
    
    --font-base: 'Noto Sans JP', -apple-system, BlinkMacSystemFont, sans-serif;
    --font-en: 'Inter', 'Roboto', sans-serif;
    
    --section-padding: 100px;
    --section-padding-sp: 60px;
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
    --shadow-2xl: 0 25px 50px -12px rgba(0,0,0,0.25);
    
    --transition-fast: 0.15s ease;
    --transition-base: 0.3s ease;
}

/* =============================================================================
   Base
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
        padding: var(--section-padding-sp) 0;
    }
}

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
    line-height: 1.8;
}

.section__footer {
    text-align: center;
    margin-top: 3rem;
}

.marker {
    position: relative;
    padding: 0 0.1em;
}

.marker::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 100%;
    height: 40%;
    background: rgba(13, 71, 161, 0.15);
    z-index: -1;
}

.marker--accent::after {
    background: rgba(245, 158, 11, 0.3);
}

.text-danger {
    color: var(--color-danger);
}

.pc-only { display: inline; }
.sp-only { display: none; }

@media (max-width: 768px) {
    .pc-only { display: none; }
    .sp-only { display: inline; }
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
    white-space: nowrap;
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
    background: var(--color-accent-dark);
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

.btn--outline-white {
    background: transparent;
    border-color: rgba(255,255,255,0.5);
    color: #fff;
}

.btn--outline-white:hover {
    background: #fff;
    color: var(--color-primary);
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
   Breadcrumb
   ============================================================================= */
.breadcrumb {
    margin-bottom: 2rem;
}

.breadcrumb__list {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 0.5rem;
    list-style: none;
    margin: 0;
    padding: 0;
    font-size: 0.875rem;
}

.breadcrumb__link {
    display: inline-flex;
    align-items: center;
    gap: 0.25rem;
    color: rgba(255,255,255,0.8);
}

.breadcrumb__link:hover {
    color: #fff;
}

.breadcrumb__icon {
    opacity: 0.7;
}

.breadcrumb__separator {
    display: flex;
    color: rgba(255,255,255,0.5);
}

.breadcrumb__current {
    color: #fff;
    font-weight: 600;
}

/* =============================================================================
   Service Hero
   ============================================================================= */
.service-hero {
    position: relative;
    padding: 140px 0 100px;
    color: #fff;
    overflow: hidden;
}

.service-hero__bg {
    position: absolute;
    inset: 0;
    z-index: 0;
}

.service-hero__bg-image {
    position: absolute;
    inset: 0;
    background-size: cover;
    background-position: center;
}

.service-hero__bg-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(13, 71, 161, 0.92) 0%, rgba(2, 33, 113, 0.95) 100%);
}

.service-hero .container {
    position: relative;
    z-index: 1;
}

.service-hero__content {
    max-width: 700px;
}

.service-hero__badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(10px);
    border-radius: var(--radius-full);
    font-size: 0.875rem;
    font-weight: 600;
    margin-bottom: 1.5rem;
}

.service-hero__title {
    margin: 0 0 1.5rem;
}

.service-hero__title-en {
    display: block;
    font-family: var(--font-en);
    font-size: 1rem;
    font-weight: 500;
    letter-spacing: 0.2em;
    opacity: 0.7;
    margin-bottom: 0.5rem;
}

.service-hero__title-main {
    display: block;
    font-size: clamp(2.5rem, 6vw, 4rem);
    font-weight: 900;
    letter-spacing: 0.05em;
}

.service-hero__lead {
    font-size: 1.125rem;
    line-height: 1.8;
    opacity: 0.9;
    margin: 0 0 2rem;
}

.service-hero__price {
    display: inline-block;
    padding: 1.5rem 2rem;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border-radius: var(--radius-lg);
    margin-bottom: 2rem;
}

.service-hero__price-label {
    display: block;
    font-size: 0.875rem;
    opacity: 0.8;
    margin-bottom: 0.5rem;
}

.service-hero__price-value {
    display: flex;
    align-items: baseline;
    gap: 0.25rem;
}

.service-hero__price-number {
    font-family: var(--font-en);
    font-size: 3rem;
    font-weight: 900;
    color: var(--color-accent);
}

.service-hero__price-unit {
    font-size: 1.25rem;
    font-weight: 700;
}

.service-hero__price-note {
    display: block;
    font-size: 0.8125rem;
    opacity: 0.7;
    margin-top: 0.5rem;
}

.service-hero__cta {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
}

.service-hero__wave {
    position: absolute;
    bottom: -1px;
    left: 0;
    width: 100%;
    z-index: 2;
    line-height: 0;
}

.service-hero__wave svg {
    width: 100%;
    height: 60px;
}

@media (max-width: 768px) {
    .service-hero {
        padding: 120px 0 80px;
    }
    
    .service-hero__cta {
        flex-direction: column;
    }
    
    .service-hero__wave svg {
        height: 40px;
    }
}

/* =============================================================================
   Service Intro
   ============================================================================= */
.service-intro {
    background: var(--color-bg);
}

.service-intro__grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    align-items: center;
}

.service-intro__title {
    font-size: clamp(1.5rem, 3vw, 2rem);
    font-weight: 900;
    line-height: 1.4;
    margin: 0 0 1.5rem;
}

.service-intro__text {
    color: var(--color-text-light);
    line-height: 1.9;
    margin-bottom: 2rem;
}

.service-intro__text p {
    margin: 0 0 1em;
}

.service-intro__text p:last-child {
    margin-bottom: 0;
}

.service-intro__features {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}

.service-intro__features li {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    font-weight: 500;
}

.service-intro__features svg {
    flex-shrink: 0;
    color: var(--color-success);
}

.service-intro__image {
    position: relative;
}

.service-intro__image-main {
    border-radius: var(--radius-xl);
    overflow: hidden;
    box-shadow: var(--shadow-2xl);
}

.service-intro__image-main img {
    width: 100%;
    height: auto;
}

.service-intro__image-badge {
    position: absolute;
    bottom: -20px;
    right: -20px;
    width: 120px;
    height: 120px;
    background: var(--color-primary);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: var(--shadow-xl);
}

.service-intro__image-badge-inner {
    text-align: center;
    color: #fff;
}

.service-intro__image-badge-number {
    display: block;
    font-family: var(--font-en);
    font-size: 2.5rem;
    font-weight: 900;
    line-height: 1;
}

.service-intro__image-badge-text {
    display: block;
    font-size: 0.875rem;
    font-weight: 700;
}

@media (max-width: 1024px) {
    .service-intro__grid {
        grid-template-columns: 1fr;
        gap: 40px;
    }
    
    .service-intro__image {
        order: -1;
        max-width: 500px;
        margin: 0 auto;
    }
    
    .service-intro__image-badge {
        right: 0;
        width: 100px;
        height: 100px;
    }
    
    .service-intro__image-badge-number {
        font-size: 2rem;
    }
}

/* =============================================================================
   Symptoms Section
   ============================================================================= */
.service-symptoms {
    background: var(--color-bg-light);
    position: relative;
}

.service-symptoms__bg {
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, transparent 0%, rgba(239, 68, 68, 0.02) 100%);
}

.symptoms-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
}

.symptom-card {
    background: var(--color-bg);
    border-radius: var(--radius-xl);
    overflow: hidden;
    box-shadow: var(--shadow-md);
    transition: var(--transition-base);
}

.symptom-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-xl);
}

.symptom-card__image {
    position: relative;
    aspect-ratio: 4 / 3;
    overflow: hidden;
}

.symptom-card__image img {
    width
