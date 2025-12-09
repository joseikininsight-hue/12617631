<?php
/**
 * Template Name: サービス詳細 - 補修・修繕
 * Description: 補修・修繕サービスの詳細ページ
 * 
 * @package Sato_Kenso
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

// =============================================================================
// データ取得
// =============================================================================
$company_name = sato_get_company_name();
$phone = sato_get_phone();
$phone_link = sato_get_phone_link();
$line_url = sato_get_line_url();
$warranty_years = sato_get_warranty_years();

// 構造化データ
$schema_service = [
    '@context' => 'https://schema.org',
    '@type' => 'Service',
    'name' => '補修・修繕工事',
    'description' => '外壁のひび割れ、シーリング劣化、雨漏りなど、建物の補修・修繕工事を専門的に対応。塗装前の下地処理から部分補修まで幅広く承ります。',
    'provider' => [
        '@type' => 'LocalBusiness',
        'name' => sato_get_company_name(true),
        'url' => home_url('/'),
    ],
    'areaServed' => [
        '@type' => 'State',
        'name' => '静岡県',
    ],
    'serviceType' => ['ひび割れ補修', 'シーリング工事', '雨漏り修理', '外壁補修', '部分塗装'],
];
?>

<script type="application/ld+json">
<?php echo wp_json_encode($schema_service, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT); ?>
</script>

<main id="main" class="service-page service-repair" role="main">

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
                                <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
                            </span>
                        </li>
                        <li class="breadcrumb__item">
                            <a href="<?php echo home_url('/service/'); ?>" class="breadcrumb__link">サービス</a>
                            <span class="breadcrumb__separator">
                                <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
                            </span>
                        </li>
                        <li class="breadcrumb__item">
                            <span class="breadcrumb__current" aria-current="page">補修・修繕</span>
                        </li>
                    </ol>
                </nav>

                <div class="page-hero__badge">
                    <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
                    <span>SERVICE</span>
                </div>

                <h1 class="page-hero__title">
                    <span class="page-hero__title-main">補修・修繕</span>
                    <span class="page-hero__title-sub">Repair & Maintenance</span>
                </h1>

                <p class="page-hero__lead">
                    ひび割れ・シーリング劣化・雨漏りなど<br class="sp-only">
                    建物のトラブルを確実に解決します
                </p>
            </div>
        </div>

        <div class="page-hero__wave">
            <svg viewBox="0 0 1440 120" preserveAspectRatio="none">
                <path d="M0,64 C360,120 720,0 1080,64 C1260,96 1380,80 1440,64 L1440,120 L0,120 Z" fill="#ffffff"/>
            </svg>
        </div>
    </section>

    <!-- =========================================================================
         INTRO SECTION
         ========================================================================= -->
    <section class="section service-intro">
        <div class="container">
            <div class="service-intro__grid">
                <div class="service-intro__content">
                    <h2 class="service-intro__title">
                        塗装だけでは解決しない<br>
                        <span class="marker marker--accent">建物の傷み</span>に対応
                    </h2>
                    <div class="service-intro__text">
                        <p>
                            外壁塗装を行う前に、まず建物の下地をしっかりと補修することが重要です。ひび割れやシーリングの劣化を放置したまま塗装しても、すぐに不具合が再発してしまいます。
                        </p>
                        <p>
                            <?php echo esc_html($company_name); ?>では、塗装工事の一環としてはもちろん、<strong>補修・修繕のみのご依頼</strong>も承っております。小さな補修から大規模な修繕まで、国家資格を持つ職人が確かな技術で対応いたします。
                        </p>
                    </div>

                    <ul class="service-intro__points">
                        <li>
                            <span class="service-intro__point-icon">
                                <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                            </span>
                            <span>部分的な補修だけでもOK</span>
                        </li>
                        <li>
                            <span class="service-intro__point-icon">
                                <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                            </span>
                            <span>雨漏り診断・原因特定</span>
                        </li>
                        <li>
                            <span class="service-intro__point-icon">
                                <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                            </span>
                            <span>緊急対応も可能</span>
                        </li>
                    </ul>
                </div>

                <div class="service-intro__image">
                    <img src="https://images.unsplash.com/photo-1581578731548-c64695cc6952?auto=format&fit=crop&q=80&w=800" 
                         alt="外壁補修作業の様子" 
                         loading="lazy"
                         width="600"
                         height="450">
                    <div class="service-intro__image-badge">
                        <span class="service-intro__image-badge-number"><?php echo esc_html($warranty_years); ?></span>
                        <span class="service-intro__image-badge-text">年保証</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- =========================================================================
         SYMPTOM SECTION - こんな症状ありませんか？
         ========================================================================= -->
    <section class="section service-symptom">
        <div class="service-symptom__bg"></div>
        
        <div class="container">
            <header class="section__header section__header--center">
                <span class="section__label">SYMPTOM</span>
                <h2 class="section__title">
                    こんな<span class="marker marker--warning">症状</span>ありませんか？
                </h2>
                <p class="section__lead">
                    これらの症状を放置すると、建物の寿命を縮めてしまいます。<br>
                    早めの対処で修繕費用を抑えられます。
                </p>
            </header>

            <div class="symptom-grid">
                <!-- 症状1: ひび割れ -->
                <article class="symptom-card">
                    <div class="symptom-card__image">
                        <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?auto=format&fit=crop&q=80&w=400" 
                             alt="外壁のひび割れ（クラック）" 
                             loading="lazy">
                        <span class="symptom-card__danger">
                            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                            要注意
                        </span>
                    </div>
                    <div class="symptom-card__body">
                        <h3 class="symptom-card__title">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg>
                            ひび割れ（クラック）
                        </h3>
                        <p class="symptom-card__text">
                            外壁に髪の毛のような細いひび割れや、大きな亀裂が発生している状態。放置すると雨水が侵入し、内部の腐食や雨漏りの原因になります。
                        </p>
                        <div class="symptom-card__risk">
                            <span class="symptom-card__risk-label">放置リスク</span>
                            <span class="symptom-card__risk-meter symptom-card__risk-meter--high">
                                <span></span><span></span><span></span>
                            </span>
                        </div>
                    </div>
                </article>

                <!-- 症状2: シーリング劣化 -->
                <article class="symptom-card">
                    <div class="symptom-card__image">
                        <img src="https://images.unsplash.com/photo-1607472586893-edb57bdc0e39?auto=format&fit=crop&q=80&w=400" 
                             alt="シーリング（コーキング）の劣化" 
                             loading="lazy">
                        <span class="symptom-card__danger">
                            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                            要注意
                        </span>
                    </div>
                    <div class="symptom-card__body">
                        <h3 class="symptom-card__title">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><line x1="3" y1="9" x2="21" y2="9"/><line x1="9" y1="21" x2="9" y2="9"/></svg>
                            シーリング劣化
                        </h3>
                        <p class="symptom-card__text">
                            サイディングの目地やサッシ周りのシーリングが硬化・ひび割れ・剥離している状態。防水機能が失われ、雨水侵入の大きな原因となります。
                        </p>
                        <div class="symptom-card__risk">
                            <span class="symptom-card__risk-label">放置リスク</span>
                            <span class="symptom-card__risk-meter symptom-card__risk-meter--high">
                                <span></span><span></span><span></span>
                            </span>
                        </div>
                    </div>
                </article>

                <!-- 症状3: 雨漏り -->
                <article class="symptom-card">
                    <div class="symptom-card__image">
                        <img src="https://images.unsplash.com/photo-1525785967371-87ba44b3e6cf?auto=format&fit=crop&q=80&w=400" 
                             alt="雨漏りによる室内の染み" 
                             loading="lazy">
                        <span class="symptom-card__danger symptom-card__danger--critical">
                            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                            緊急
                        </span>
                    </div>
                    <div class="symptom-card__body">
                        <h3 class="symptom-card__title">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"/></svg>
                            雨漏り・水染み
                        </h3>
                        <p class="symptom-card__text">
                            天井や壁に水染みが発生している、雨の日に室内に水が入ってくる状態。構造材の腐食やカビ発生など、建物全体に深刻なダメージを与えます。
                        </p>
                        <div class="symptom-card__risk">
                            <span class="symptom-card__risk-label">放置リスク</span>
                            <span class="symptom-card__risk-meter symptom-card__risk-meter--critical">
                                <span></span><span></span><span></span>
                            </span>
                        </div>
                    </div>
                </article>

                <!-- 症状4: 塗膜の剥がれ -->
                <article class="symptom-card">
                    <div class="symptom-card__image">
                        <img src="https://images.unsplash.com/photo-1517581177682-a085bb7ffb15?auto=format&fit=crop&q=80&w=400" 
                             alt="塗膜の剥がれ・浮き" 
                             loading="lazy">
                        <span class="symptom-card__danger symptom-card__danger--warning">
                            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                            注意
                        </span>
                    </div>
                    <div class="symptom-card__body">
                        <h3 class="symptom-card__title">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                            塗膜の剥がれ・浮き
                        </h3>
                        <p class="symptom-card__text">
                            塗装が剥がれたり、膨れて浮いている状態。下地と塗膜の密着不良や、経年劣化が原因です。見た目だけでなく防水機能も低下しています。
                        </p>
                        <div class="symptom-card__risk">
                            <span class="symptom-card__risk-label">放置リスク</span>
                            <span class="symptom-card__risk-meter symptom-card__risk-meter--medium">
                                <span></span><span></span><span></span>
                            </span>
                        </div>
                    </div>
                </article>

                <!-- 症状5: 爆裂・欠損 -->
                <article class="symptom-card">
                    <div class="symptom-card__image">
                        <img src="https://images.unsplash.com/photo-1558618047-f4b511a2e0d0?auto=format&fit=crop&q=80&w=400" 
                             alt="コンクリートの爆裂・欠損" 
                             loading="lazy">
                        <span class="symptom-card__danger symptom-card__danger--critical">
                            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                            緊急
                        </span>
                    </div>
                    <div class="symptom-card__body">
                        <h3 class="symptom-card__title">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 22 8.5 22 15.5 12 22 2 15.5 2 8.5 12 2"/><line x1="12" y1="22" x2="12" y2="15.5"/><polyline points="22 8.5 12 15.5 2 8.5"/></svg>
                            爆裂・欠損
                        </h3>
                        <p class="symptom-card__text">
                            コンクリートやモルタルが膨らんで破裂したり、一部が欠け落ちている状態。内部の鉄筋が錆びて膨張することが原因。構造的な問題に発展する恐れがあります。
                        </p>
                        <div class="symptom-card__risk">
                            <span class="symptom-card__risk-label">放置リスク</span>
                            <span class="symptom-card__risk-meter symptom-card__risk-meter--critical">
                                <span></span><span></span><span></span>
                            </span>
                        </div>
                    </div>
                </article>

                <!-- 症状6: 木部の腐食 -->
                <article class="symptom-card">
                    <div class="symptom-card__image">
                        <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?auto=format&fit=crop&q=80&w=400" 
                             alt="木部の腐食・傷み" 
                             loading="lazy">
                        <span class="symptom-card__danger">
                            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                            要注意
                        </span>
                    </div>
                    <div class="symptom-card__body">
                        <h3 class="symptom-card__title">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                            木部の腐食・傷み
                        </h3>
                        <p class="symptom-card__text">
                            破風板や軒天、ウッドデッキなどの木部が腐食している状態。シロアリ被害のリスクも高まり、放置すると交換が必要になることも。
                        </p>
                        <div class="symptom-card__risk">
                            <span class="symptom-card__risk-label">放置リスク</span>
                            <span class="symptom-card__risk-meter symptom-card__risk-meter--high">
                                <span></span><span></span><span></span>
                            </span>
                        </div>
                    </div>
                </article>
            </div>

            <div class="service-symptom__cta">
                <p class="service-symptom__cta-text">
                    上記の症状が1つでも当てはまる場合は、<br class="sp-only">
                    <strong>早めの診断をおすすめします。</strong>
                </p>
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn--primary btn--lg">
                    <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                    無料診断を申し込む
                </a>
            </div>
        </div>
    </section>

    <!-- =========================================================================
         REPAIR MENU - 補修メニュー
         ========================================================================= -->
    <section class="section service-menu">
        <div class="container">
            <header class="section__header section__header--center">
                <span class="section__label">REPAIR MENU</span>
                <h2 class="section__title">
                    <span class="marker marker--primary">補修・修繕メニュー</span>
                </h2>
                <p class="section__lead">
                    建物の状態に合わせた最適な補修方法をご提案します。<br>
                    部分的な補修から全体的な修繕まで対応可能です。
                </p>
            </header>

            <div class="repair-menu">
                <!-- メニュー1: ひび割れ補修 -->
                <article class="repair-item">
                    <div class="repair-item__header">
                        <div class="repair-item__icon">
                            <svg viewBox="0 0 24 24" width="32" height="32" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M12 2L2 7l10 5 10-5-10-5z"/>
                                <path d="M2 17l10 5 10-5"/>
                                <path d="M2 12l10 5 10-5"/>
                                <path d="M7 10l5 8 5-8" stroke-dasharray="2 2"/>
                            </svg>
                        </div>
                        <div class="repair-item__title-wrap">
                            <h3 class="repair-item__title">ひび割れ補修（クラック補修）</h3>
                            <span class="repair-item__tag">人気</span>
                        </div>
                    </div>
                    
                    <div class="repair-item__body">
                        <div class="repair-item__image">
                            <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&q=80&w=600" 
                                 alt="ひび割れ補修作業" 
                                 loading="lazy">
                        </div>
                        
                        <div class="repair-item__content">
                            <p class="repair-item__desc">
                                外壁に発生したひび割れを専用材料で補修。ヘアークラックから構造クラックまで、ひび割れの種類と深さに応じた適切な工法を選択します。
                            </p>
                            
                            <div class="repair-item__methods">
                                <h4 class="repair-item__methods-title">主な工法</h4>
                                <ul class="repair-item__methods-list">
                                    <li>
                                        <strong>フィラー刷り込み</strong>
                                        <span>微細なひび割れに対応。弾性フィラーを刷り込んで塗膜で保護。</span>
                                    </li>
                                    <li>
                                        <strong>Vカット・Uカットシーリング</strong>
                                        <span>ひび割れを広げてシーリング材を充填。中程度のクラックに有効。</span>
                                    </li>
                                    <li>
                                        <strong>エポキシ樹脂注入</strong>
                                        <span>構造クラックに対応。低圧で樹脂を注入し、強度を回復。</span>
                                    </li>
                                </ul>
                            </div>
                            
                            <div class="repair-item__price">
                                <span class="repair-item__price-label">参考価格</span>
                                <span class="repair-item__price-value">3,000円〜 / m</span>
                                <span class="repair-item__price-note">※工法・状態により変動</span>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- メニュー2: シーリング工事 -->
                <article class="repair-item">
                    <div class="repair-item__header">
                        <div class="repair-item__icon">
                            <svg viewBox="0 0 24 24" width="32" height="32" fill="none" stroke="currentColor" stroke-width="1.5">
                                <rect x="3" y="3" width="18" height="18" rx="2"/>
                                <line x1="3" y1="9" x2="21" y2="9"/>
                                <line x1="3" y1="15" x2="21" y2="15"/>
                                <line x1="9" y1="3" x2="9" y2="21"/>
                                <line x1="15" y1="3" x2="15" y2="21"/>
                            </svg>
                        </div>
                        <div class="repair-item__title-wrap">
                            <h3 class="repair-item__title">シーリング工事（コーキング）</h3>
                            <span class="repair-item__tag">必須</span>
                        </div>
                    </div>
                    
                    <div class="repair-item__body">
                        <div class="repair-item__image">
                            <img src="https://images.unsplash.com/photo-1581578731548-c64695cc6952?auto=format&fit=crop&q=80&w=600" 
                                 alt="シーリング打ち替え作業" 
                                 loading="lazy">
                        </div>
                        
                        <div class="repair-item__content">
                            <p class="repair-item__desc">
                                サイディングの目地やサッシ周りのシーリングを新しく打ち替え。劣化したシーリングは防水機能が低下しているため、塗装と同時に行うことで長期的な保護が可能です。
                            </p>
                            
                            <div class="repair-item__methods">
                                <h4 class="repair-item__methods-title">施工の種類</h4>
                                <ul class="repair-item__methods-list">
                                    <li>
                                        <strong>打ち替え工事</strong>
                                        <span>既存シーリングを撤去し、新しいシーリングを充填。最も確実な方法。</span>
                                    </li>
                                    <li>
                                        <strong>増し打ち工事</strong>
                                        <span>既存シーリングの上から追加充填。状態が良好な場合に適用。</span>
                                    </li>
                                    <li>
                                        <strong>高耐久シーリング</strong>
                                        <span>オートンイクシード等、耐用年数15〜20年の高性能材料も選択可能。</span>
                                    </li>
                                </ul>
                            </div>
                            
                            <div class="repair-item__price">
                                <span class="repair-item__price-label">参考価格</span>
                                <span class="repair-item__price-value">800円〜 / m（打ち替え）</span>
                                <span class="repair-item__price-note">※材料・数量により変動</span>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- メニュー3: 雨漏り修理 -->
                <article class="repair-item repair-item--highlight">
                    <div class="repair-item__header">
                        <div class="repair-item__icon">
                            <svg viewBox="0 0 24 24" width="32" height="32" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"/>
                                <path d="M12 8v5"/>
                                <path d="M10 11h4"/>
                            </svg>
                        </div>
                        <div class="repair-item__title-wrap">
                            <h3 class="repair-item__title">雨漏り修理・防水工事</h3>
                            <span class="repair-item__tag repair-item__tag--urgent">緊急対応</span>
                        </div>
                    </div>
                    
                    <div class="repair-item__body">
                        <div class="repair-item__image">
                            <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&q=80&w=600" 
                                 alt="雨漏り修理作業" 
                                 loading="lazy">
                        </div>
                        
                        <div class="repair-item__content">
                            <p class="repair-item__desc">
                                雨漏りは原因の特定が最も重要です。当社では赤外線カメラや散水試験による診断を行い、確実に原因を特定してから修理を行います。応急処置から本格修繕まで対応可能です。
                            </p>
                            
                            <div class="repair-item__methods">
                                <h4 class="repair-item__methods-title">対応箇所</h4>
                                <ul class="repair-item__methods-list">
                                    <li>
                                        <strong>屋根・棟板金</strong>
                                        <span>棟板金の浮き・釘抜け、瓦のズレ、スレートの割れなど。</span>
                                    </li>
                                    <li>
                                        <strong>外壁・サッシ周り</strong>
                                        <span>シーリング劣化、ひび割れからの浸水、サッシ取り合い部。</span>
                                    </li>
                                    <li>
                                        <strong>ベランダ・バルコニー</strong>
                                        <span>防水層の劣化、排水口の詰まり、立ち上がり部の破損。</span>
                                    </li>
                                </ul>
                            </div>
                            
                            <div class="repair-item__price">
                                <span class="repair-item__price-label">参考価格</span>
                                <span class="repair-item__price-value">30,000円〜</span>
                                <span class="repair-item__price-note">※診断・原因により大きく変動</span>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- メニュー4: 外壁・サイディング補修 -->
                <article class="repair-item">
                    <div class="repair-item__header">
                        <div class="repair-item__icon">
                            <svg viewBox="0 0 24 24" width="32" height="32" fill="none" stroke="currentColor" stroke-width="1.5">
                                <rect x="4" y="4" width="16" height="16" rx="2" ry="2"/>
                                <line x1="4" y1="12" x2="20" y2="12"/>
                                <line x1="12" y1="4" x2="12" y2="12"/>
                                <line x1="8" y1="12" x2="8" y2="20"/>
                                <line x1="16" y1="12" x2="16" y2="20"/>
                            </svg>
                        </div>
                        <div class="repair-item__title-wrap">
                            <h3 class="repair-item__title">外壁・サイディング補修</h3>
                        </div>
                    </div>
                    
                    <div class="repair-item__body">
                        <div class="repair-item__image">
                            <img src="https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?auto=format&fit=crop&q=80&w=600" 
                                 alt="サイディング補修作業" 
                                 loading="lazy">
                        </div>
                        
                        <div class="repair-item__content">
                            <p class="repair-item__desc">
                                サイディングボードの反り・浮き・割れ、モルタル外壁の欠損などを補修。部分的な張り替えや、パテによる補修、タイル剥落防止など、状態に応じた最適な方法で対応します。
                            </p>
                            
                            <div class="repair-item__methods">
                                <h4 class="repair-item__methods-title">対応内容</h4>
                                <ul class="repair-item__methods-list">
                                    <li>
                                        <strong>サイディング部分張替え</strong>
                                        <span>破損・変形したボードを同等品または類似品に交換。</span>
                                    </li>
                                    <li>
                                        <strong>モルタル欠損補修</strong>
                                        <span>左官工事による欠損部の復元。パターン合わせも対応。</span>
                                    </li>
                                    <li>
                                        <strong>タイル補修・浮き止め</strong>
                                        <span>エポキシ樹脂注入によるタイル浮き止め、部分貼り替え。</span>
                                    </li>
                                </ul>
                            </div>
                            
                            <div class="repair-item__price">
                                <span class="repair-item__price-label">参考価格</span>
                                <span class="repair-item__price-value">10,000円〜 / 箇所</span>
                                <span class="repair-item__price-note">※範囲・工法により変動</span>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- メニュー5: 鉄部・木部補修 -->
                <article class="repair-item">
                    <div class="repair-item__header">
                        <div class="repair-item__icon">
                            <svg viewBox="0 0 24 24" width="32" height="32" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                                <path d="M9 12l2 2 4-4"/>
                            </svg>
                        </div>
                        <div class="repair-item__title-wrap">
                            <h3 class="repair-item__title">鉄部・木部補修</h3>
                        </div>
                    </div>
                    
                    <div class="repair-item__body">
                        <div class="repair-item__image">
                            <img src="https://images.unsplash.com/photo-1513694203232-719a280e022f?auto=format&fit=crop&q=80&w=600" 
                                 alt="木部補修・塗装作業" 
                                 loading="lazy">
                        </div>
                        
                        <div class="repair-item__content">
                            <p class="repair-item__desc">
                                手すりや階段、ベランダの鉄部は錆びが進行すると強度が低下し危険です。破風板や軒天などの木部は腐食によりシロアリ被害のリスクも。早めの補修・塗装で長持ちさせます。
                            </p>
                            
                            <div class="repair-item__methods">
                                <h4 class="repair-item__methods-title">対応内容</h4>
                                <ul class="repair-item__methods-list">
                                    <li>
                                        <strong>錆止め・ケレン作業</strong>
                                        <span>サンダーやワイヤーブラシで錆を除去し、錆止め塗料を塗布。</span>
                                    </li>
                                    <li>
                                        <strong>木部腐食補修</strong>
                                        <span>腐食部の除去・木材パテ補修、または部分交換。</span>
                                    </li>
                                    <li>
                                        <strong>防腐・防蟻処理</strong>
                                        <span>木部への防腐剤・防蟻剤塗布で長期保護。</span>
                                    </li>
                                </ul>
                            </div>
                            
                            <div class="repair-item__price">
                                <span class="repair-item__price-label">参考価格</span>
                                <span class="repair-item__price-value">1,500円〜 / ㎡</span>
                                <span class="repair-item__price-note">※錆・腐食の程度により変動</span>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- メニュー6: 部分塗装 -->
                <article class="repair-item">
                    <div class="repair-item__header">
                        <div class="repair-item__icon">
                            <svg viewBox="0 0 24 24" width="32" height="32" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M19 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2z"/>
                                <path d="M12 8v8"/>
                                <path d="M8 12h8"/>
                            </svg>
                        </div>
                        <div class="repair-item__title-wrap">
                            <h3 class="repair-item__title">部分塗装・タッチアップ</h3>
                            <span class="repair-item__tag">お手軽</span>
                        </div>
                    </div>
                    
                    <div class="repair-item__body">
                        <div class="repair-item__image">
                            <img src="https://images.unsplash.com/photo-1562259949-e8e7689d7828?auto=format&fit=crop&q=80&w=600" 
                                 alt="部分塗装作業" 
                                 loading="lazy">
                        </div>
                        
                        <div class="repair-item__content">
                            <p class="repair-item__desc">
                                全体塗装までは必要ないけれど、一部分だけ気になる箇所がある場合に。色合わせを丁寧に行い、補修跡が目立たないよう仕上げます。雨樋、付帯部のみの塗装も承ります。
                            </p>
                            
                            <div class="repair-item__methods">
                                <h4 class="repair-item__methods-title">対応例</h4>
                                <ul class="repair-item__methods-list">
                                    <li>
                                        <strong>外壁一部塗装</strong>
                                        <span>傷・色褪せが気になる箇所のみの部分塗装。</span>
                                    </li>
                                    <li>
                                        <strong>付帯部のみ塗装</strong>
                                        <span>雨樋・破風板・軒天・雨戸など付帯部のみの塗装。</span>
                                    </li>
                                    <li>
                                        <strong>タッチアップ</strong>
                                        <span>小さな傷や剥がれのピンポイント補修塗装。</span>
                                    </li>
                                </ul>
                            </div>
                            
                            <div class="repair-item__price">
                                <span class="repair-item__price-label">参考価格</span>
                                <span class="repair-item__price-value">15,000円〜</span>
                                <span class="repair-item__price-note">※範囲・内容により変動</span>
                            </div>
                        </div>
                    </div>
                </article>
            </div>

            <p class="service-menu__note">
                <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
                上記は参考価格です。正確な金額は現地調査後にお見積りいたします。
            </p>
        </div>
    </section>

    <!-- =========================================================================
         PROCESS - 補修の流れ
         ========================================================================= -->
    <section class="section service-process">
        <div class="service-process__bg"></div>
        
        <div class="container">
            <header class="section__header section__header--center">
                <span class="section__label">PROCESS</span>
                <h2 class="section__title">
                    補修工事の<span class="marker marker--accent">流れ</span>
                </h2>
            </header>

            <div class="process-timeline">
                <div class="process-step">
                    <div class="process-step__marker">
                        <span class="process-step__number">01</span>
                    </div>
                    <div class="process-step__content">
                        <div class="process-step__icon">
                            <svg viewBox="0 0 24 24" width="32" height="32" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/>
                            </svg>
                        </div>
                        <h3 class="process-step__title">お問い合わせ・ご相談</h3>
                        <p class="process-step__text">
                            お電話・LINE・フォームよりお気軽にご連絡ください。症状をお聞きし、現地調査の日程を調整いたします。
                        </p>
                    </div>
                </div>

                <div class="process-step">
                    <div class="process-step__marker">
                        <span class="process-step__number">02</span>
                    </div>
                    <div class="process-step__content">
                        <div class="process-step__icon">
                            <svg viewBox="0 0 24 24" width="32" height="32" fill="none" stroke="currentColor" stroke-width="1.5">
                                <circle cx="11" cy="11" r="8"/>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                                <line x1="11" y1="8" x2="11" y2="14"/>
                                <line x1="8" y1="11" x2="14" y2="11"/>
                            </svg>
                        </div>
                        <h3 class="process-step__title">現地調査・診断</h3>
                        <p class="process-step__text">
                            専門スタッフがお伺いし、建物の状態を詳しく調査。写真撮影を行い、劣化状況を正確に把握します。雨漏りの場合は原因特定のための調査も実施。
                        </p>
                    </div>
                </div>

                <div class="process-step">
                    <div class="process-step__marker">
                        <span class="process-step__number">03</span>
                    </div>
                    <div class="process-step__content">
                        <div class="process-step__icon">
                            <svg viewBox="0 0 24 24" width="32" height="32" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                <polyline points="14 2 14 8 20 8"/>
                                <line x1="16" y1="13" x2="8" y2="13"/>
                                <line x1="16" y1="17" x2="8" y2="17"/>
                                <polyline points="10 9 9 9 8 9"/>
                            </svg>
                        </div>
                        <h3 class="process-step__title">お見積り・ご提案</h3>
                        <p class="process-step__text">
                            調査結果をもとに、最適な補修方法と詳細なお見積りをご提示。複数の選択肢がある場合は、それぞれのメリット・デメリットをご説明します。
                        </p>
                    </div>
                </div>

                <div class="process-step">
                    <div class="process-step__marker">
                        <span class="process-step__number">04</span>
                    </div>
                    <div class="process-step__content">
                        <div class="process-step__icon">
                            <svg viewBox="0 0 24 24" width="32" height="32" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>
                            </svg>
                        </div>
                        <h3 class="process-step__title">補修工事施工</h3>
                        <p class="process-step__text">
                            ご契約後、工事開始。職人が丁寧に補修作業を行います。工事中も状況を都度ご報告し、安心してお任せいただけます。
                        </p>
                    </div>
                </div>

                <div class="process-step">
                    <div class="process-step__marker">
                        <span class="process-step__number">05</span>
                    </div>
                    <div class="process-step__content">
                        <div class="process-step__icon">
                            <svg viewBox="0 0 24 24" width="32" height="32" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                                <polyline points="22 4 12 14.01 9 11.01"/>
                            </svg>
                        </div>
                        <h3 class="process-step__title">完了・アフターフォロー</h3>
                        <p class="process-step__text">
                            施工完了後、仕上がりをご確認いただきお引き渡し。保証書を発行し、施工後も定期的なフォローで安心をお届けします。
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- =========================================================================
         WORKS - 補修の施工事例
         ========================================================================= -->
    <section class="section service-works">
        <div class="container">
            <header class="section__header section__header--center">
                <span class="section__label">WORKS</span>
                <h2 class="section__title">
                    <span class="marker marker--primary">補修・修繕の施工事例</span>
                </h2>
            </header>

            <div class="works-showcase">
                <!-- 事例1 -->
                <article class="work-case">
                    <div class="work-case__images">
                        <figure class="work-case__before">
                            <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?auto=format&fit=crop&q=80&w=500" 
                                 alt="ひび割れ補修前" 
                                 loading="lazy">
                            <figcaption>Before</figcaption>
                        </figure>
                        <div class="work-case__arrow">
                            <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="5" y1="12" x2="19" y2="12"/>
                                <polyline points="12 5 19 12 12 19"/>
                            </svg>
                        </div>
                        <figure class="work-case__after">
                            <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&q=80&w=500" 
                                 alt="ひび割れ補修後" 
                                 loading="lazy">
                            <figcaption>After</figcaption>
                        </figure>
                    </div>
                    <div class="work-case__body">
                        <span class="work-case__category">ひび割れ補修</span>
                        <h3 class="work-case__title">外壁クラック補修＋部分塗装</h3>
                        <dl class="work-case__meta">
                            <div>
                                <dt>エリア</dt>
                                <dd>御殿場市</dd>
                            </div>
                            <div>
                                <dt>費用</dt>
                                <dd>約8万円</dd>
                            </div>
                            <div>
                                <dt>工期</dt>
                                <dd>2日間</dd>
                            </div>
                        </dl>
                        <p class="work-case__desc">
                            外壁に発生した幅0.5mm程度のクラックをVカット工法で補修。その後、補修跡が目立たないよう周辺と色合わせをして部分塗装を実施しました。
                        </p>
                    </div>
                </article>

                <!-- 事例2 -->
                <article class="work-case">
                    <div class="work-case__images">
                        <figure class="work-case__before">
                            <img src="https://images.unsplash.com/photo-1607472586893-edb57bdc0e39?auto=format&fit=crop&q=80&w=500" 
                                 alt="シーリング打ち替え前" 
                                 loading="lazy">
                            <figcaption>Before</figcaption>
                        </figure>
                        <div class="work-case__arrow">
                            <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="5" y1="12" x2="19" y2="12"/>
                                <polyline points="12 5 19 12 12 19"/>
                            </svg>
                        </div>
                        <figure class="work-case__after">
                            <img src="https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?auto=format&fit=crop&q=80&w=500" 
                                 alt="シーリング打ち替え後" 
                                 loading="lazy">
                            <figcaption>After</figcaption>
                        </figure>
                    </div>
                    <div class="work-case__body">
                        <span class="work-case__category">シーリング工事</span>
                        <h3 class="work-case__title">サイディング目地シーリング全面打ち替え</h3>
                        <dl class="work-case__meta">
                            <div>
                                <dt>エリア</dt>
                                <dd>裾野市</dd>
                            </div>
                            <div>
                                <dt>費用</dt>
                                <dd>約25万円</dd>
                            </div>
                            <div>
                                <dt>工期</dt>
                                <dd>3日間</dd>
                            </div>
                        </dl>
                        <p class="work-case__desc">
                            築15年で硬化・ひび割れが進行していたシーリングを全面打ち替え。高耐久シーリング材（オートンイクシード）を使用し、次回塗装時まで安心の仕上がりに。
                        </p>
                    </div>
                </article>

                <!-- 事例3 -->
                <article class="work-case">
                    <div class="work-case__images">
                        <figure class="work-case__before">
                            <img src="https://images.unsplash.com/photo-1525785967371-87ba44b3e6cf?auto=format&fit=crop&q=80&w=500" 
                                 alt="雨漏り修理前" 
                                 loading="lazy">
                            <figcaption>Before</figcaption>
                        </figure>
                        <div class="work-case__arrow">
                            <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="5" y1="12" x2="19" y2="12"/>
                                <polyline points="12 5 19 12 12 19"/>
                            </svg>
                        </div>
                        <figure class="work-case__after">
                            <img src="https://images.unsplash.com/photo-1600585154526-990dced4db0d?auto=format&fit=crop&q=80&w=500" 
                                 alt="雨漏り修理後" 
                                 loading="lazy">
                            <figcaption>After</figcaption>
                        </figure>
                    </div>
                    <div class="work-case__body">
                        <span class="work-case__category">雨漏り修理</span>
                        <h3 class="work-case__title">屋根棟板金からの雨漏り修理</h3>
                        <dl class="work-case__meta">
                            <div>
                                <dt>エリア</dt>
                                <dd>三島市</dd>
                            </div>
                            <div>
                                <dt>費用</dt>
                                <dd>約15万円</dd>
                            </div>
                            <div>
                                <dt>工期</dt>
                                <dd>1日間</dd>
                            </div>
                        </dl>
                        <p class="work-case__desc">
                            2階天井に雨染みが発生。調査の結果、屋根棟板金の釘抜け・浮きが原因と判明。棟板金を取り外し、下地の貫板を交換、新しい棟板金で覆い直して解決。
                        </p>
                    </div>
                </article>
            </div>

            <div class="section__footer">
                <a href="<?php echo esc_url(home_url('/works/?category=repair')); ?>" class="btn btn--outline btn--lg">
                    補修・修繕の施工事例をもっと見る
                    <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </a>
            </div>
        </div>
    </section>

    <!-- =========================================================================
         FAQ - よくある質問
         ========================================================================= -->
    <section class="section service-faq">
        <div class="service-faq__bg"></div>
        
        <div class="container">
            <header class="section__header section__header--center">
                <span class="section__label">FAQ</span>
                <h2 class="section__title">
                    補修・修繕に関する<br class="sp-only">
                    <span class="marker marker--primary">よくある質問</span>
                </h2>
            </header>

            <div class="faq-list">
                <details class="faq-item">
                    <summary class="faq-item__question">
                        <span class="faq-item__q">Q</span>
                        <span class="faq-item__text">小さなひび割れでも直した方がいいですか？</span>
                        <span class="faq-item__toggle">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                        </span>
                    </summary>
                    <div class="faq-item__answer">
                        <span class="faq-item__a">A</span>
                        <div class="faq-item__content">
                            <p>はい、小さなひび割れでも早めの補修をおすすめします。幅0.3mm未満のヘアークラックであれば、塗装時のフィラー処理で対応可能ですが、0.3mm以上のクラックは雨水が侵入するリスクがあります。放置すると広がり、補修費用も高くなりますので、気になったら早めにご相談ください。</p>
                        </div>
                    </div>
                </details>

                <details class="faq-item">
                    <summary class="faq-item__question">
                        <span class="faq-item__q">Q</span>
                        <span class="faq-item__text">補修だけでも依頼できますか？塗装は必須ですか？</span>
                        <span class="faq-item__toggle">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                        </span>
                    </summary>
                    <div class="faq-item__answer">
                        <span class="faq-item__a">A</span>
                        <div class="faq-item__content">
                            <p>もちろん、補修のみのご依頼も承っております。シーリング打ち替え、ひび割れ補修、雨漏り修理など、部分的な補修だけでも対応可能です。ただし、補修跡を目立たなくするために部分塗装をおすすめする場合もあります。現地調査時に最適な方法をご提案いたします。</p>
                        </div>
                    </div>
                </details>

                <details class="faq-item">
                    <summary class="faq-item__question">
                        <span class="faq-item__q">Q</span>
                        <span class="faq-item__text">雨漏りの原因がわからないのですが、調査してもらえますか？</span>
                        <span class="faq-item__toggle">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                        </span>
                    </summary>
                    <div class="faq-item__answer">
                        <span class="faq-item__a">A</span>
                        <div class="faq-item__content">
                            <p>はい、雨漏り調査も承っております。目視調査のほか、必要に応じて赤外線カメラによる調査や散水試験を実施し、原因箇所を特定します。原因を正確に把握してから修理を行うため、確実に雨漏りを止めることができます。調査費用については事前にご説明いたします。</p>
                        </div>
                    </div>
                </details>

                <details class="faq-item">
                    <summary class="faq-item__question">
                        <span class="faq-item__q">Q</span>
                        <span class="faq-item__text">急な雨漏りでも対応してもらえますか？</span>
                        <span class="faq-item__toggle">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                        </span>
                    </summary>
                    <div class="faq-item__answer">
                        <span class="faq-item__a">A</span>
                        <div class="faq-item__content">
                            <p>はい、緊急の雨漏りにもできる限り対応いたします。まずはお電話でご連絡ください。応急処置（ブルーシートによる養生など）を行い、その後本格的な修理を行います。状況によっては当日対応も可能ですので、お急ぎの場合はすぐにご相談ください。</p>
                        </div>
                    </div>
                </details>

                <details class="faq-item">
                    <summary class="faq-item__question">
                        <span class="faq-item__q">Q</span>
                        <span class="faq-item__text">補修工事にも保証はつきますか？</span>
                        <span class="faq-item__toggle">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                        </span>
                    </summary>
                    <div class="faq-item__answer">
                        <span class="faq-item__a">A</span>
                        <div class="faq-item__content">
                            <p>はい、補修工事にも保証をお付けしています。工事内容によって保証期間は異なりますが、シーリング工事であれば5〜10年、雨漏り修理は修理箇所からの再発に対して保証いたします。詳細はお見積り時にご説明いたします。</p>
                        </div>
                    </div>
                </details>

                <details class="faq-item">
                    <summary class="faq-item__question">
                        <span class="faq-item__q">Q</span>
                        <span class="faq-item__text">火災保険で補修費用が出ることはありますか？</span>
                        <span class="faq-item__toggle">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                        </span>
                    </summary>
                    <div class="faq-item__answer">
                        <span class="faq-item__a">A</span>
                        <div class="faq-item__content">
                            <p>台風や雹（ひょう）などの自然災害による破損の場合、火災保険が適用される可能性があります。棟板金の飛散、雨樋の破損、外壁の損傷などが対象となることが多いです。保険申請に必要な書類（被害状況の写真、見積書など）の作成もサポートいたしますので、お気軽にご相談ください。</p>
                        </div>
                    </div>
                </details>
            </div>
        </div>
    </section>

    <!-- =========================================================================
         CTA SECTION
         ========================================================================= -->
    <section class="cta service-cta">
        <div class="cta__bg">
            <div class="cta__bg-gradient"></div>
            <div class="cta__bg-pattern"></div>
        </div>

        <div class="container">
            <div class="cta__content">
                <header class="cta__header">
                    <div class="cta__icon">
                        <svg viewBox="0 0 24 24" width="48" height="48" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>
                        </svg>
                    </div>
                    <h2 class="cta__title">
                        建物の傷み、<br>
                        <span class="cta__title-highlight">放置せずにご相談ください</span>
                    </h2>
                    <p class="cta__lead">
                        小さな補修でも丁寧に対応いたします。<br>
                        無料診断でまずは状態を確認してみませんか？
                    </p>
                </header>

                <div class="cta__actions">
                    <div class="cta__phone">
                        <span class="cta__phone-label">お電話でのご相談</span>
                        <a href="<?php echo esc_attr($phone_link); ?>" class="cta__phone-number">
                            <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                            <span><?php echo esc_html($phone); ?></span>
                        </a>
                        <span class="cta__phone-hours">受付 8:00〜18:00（日祝休）</span>
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
                            LINEで写真を送って相談
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
                        診断無料
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                        出張無料
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                        緊急対応可
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- =========================================================================
         OTHER SERVICES
         ========================================================================= -->
    <section class="section other-services">
        <div class="container">
            <header class="section__header section__header--center">
                <span class="section__label">OTHER SERVICES</span>
                <h2 class="section__title">その他のサービス</h2>
            </header>

            <div class="service-links">
                <a href="<?php echo esc_url(home_url('/service/exterior/')); ?>" class="service-link">
                    <div class="service-link__icon">
                        <svg viewBox="0 0 24 24" width="32" height="32" fill="none" stroke="currentColor" stroke-width="1.5">
                            <rect x="4" y="4" width="16" height="16" rx="2" ry="2"/>
                            <line x1="4" y1="12" x2="20" y2="12"/>
                            <line x1="12" y1="4" x2="12" y2="12"/>
                        </svg>
                    </div>
                    <div class="service-link__body">
                        <h3 class="service-link__title">外壁塗装</h3>
                        <p class="service-link__text">建物の美観と耐久性を守る外壁塗装。高品質塗料で長持ち。</p>
                    </div>
                    <span class="service-link__arrow">
                        <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
                    </span>
                </a>

                <a href="<?php echo esc_url(home_url('/service/roof/')); ?>" class="service-link">
                    <div class="service-link__icon">
                        <svg viewBox="0 0 24 24" width="32" height="32" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                            <polyline points="9 22 9 12 15 12 15 22"/>
                        </svg>
                    </div>
                    <div class="service-link__body">
                        <h3 class="service-link__title">屋根塗装</h3>
                        <p class="service-link__text">紫外線・雨風から屋根を守る。遮熱塗料で夏も快適に。</p>
                    </div>
                    <span class="service-link__arrow">
                        <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
                    </span>
                </a>

                <a href="<?php echo esc_url(home_url('/service/waterproof/')); ?>" class="service-link">
                    <div class="service-link__icon">
                        <svg viewBox="0 0 24 24" width="32" height="32" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"/>
                        </svg>
                    </div>
                    <div class="service-link__body">
                        <h3 class="service-link__title">防水工事</h3>
                        <p class="service-link__text">ベランダ・屋上の防水工事。雨漏りを未然に防ぎます。</p>
                    </div>
                    <span class="service-link__arrow">
                        <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
                    </span>
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
   CSS Variables (inherit from theme)
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

.sp-only { display: none; }
.pc-only { display: inline; }

@media (max-width: 768px) {
    .sp-only { display: inline; }
    .pc-only { display: none; }
    
    .section {
        padding: 60px 0;
    }
}

/* Utility Classes */
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
    background: rgba(13, 71, 161, 0.15);
}

.marker--accent::after {
    background: rgba(245, 158, 11, 0.3);
}

.marker--warning::after {
    background: rgba(239, 68, 68, 0.2);
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
    font-family: 'Inter', sans-serif;
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

.section__footer {
    text-align: center;
    margin-top: 3rem;
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
    padding: 140px 0 100px;
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
    background: linear-gradient(135deg, rgba(13, 71, 161, 0.9) 0%, rgba(0, 33, 113, 0.95) 100%);
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
    color: rgba(255,255,255,0.7);
    transition: var(--transition-base);
}

.breadcrumb__link:hover {
    color: #fff;
}

.breadcrumb__separator {
    color: rgba(255,255,255,0.4);
}

.breadcrumb__current {
    color: #fff;
}

.page-hero__badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    background: rgba(255,255,255,0.1);
    border: 1px solid rgba(255,255,255,0.2);
    border-radius: var(--radius-full);
    font-size: 0.875rem;
    font-weight: 600;
    letter-spacing: 0.1em;
    margin-bottom: 1.5rem;
}

.page-hero__title {
    margin: 0 0 1.5rem;
}

.page-hero__title-main {
    display: block;
    font-size: clamp(2rem, 5vw, 3rem);
    font-weight: 900;
    line-height: 1.2;
}

.page-hero__title-sub {
    display: block;
    font-family: 'Inter', sans-serif;
    font-size: clamp(1rem, 2vw, 1.25rem);
    font-weight: 400;
    letter-spacing: 0.1em;
    opacity: 0.7;
    margin-top: 0.5rem;
}

.page-hero__lead {
    font-size: clamp(1rem, 2vw, 1.25rem);
    line-height: 1.7;
    opacity: 0.9;
    margin: 0;
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
    height: 60px;
}

@media (max-width: 768px) {
    .page-hero {
        padding: 120px 0 80px;
    }
    
    .page-hero__wave svg {
        height: 40px;
    }
}

/* =============================================================================
   SERVICE INTRO
   ============================================================================= */
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
    margin-bottom: 2rem;
}

.service-intro__text p {
    margin: 0 0 1em;
    color: var(--color-text-light);
    line-height: 1.8;
}

.service-intro__text p:last-child {
    margin-bottom: 0;
}

.service-intro__points {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
    flex-wrap: wrap;
    gap: 0.75rem;
}

.service-intro__points li {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    background: var(--color-bg-light);
    border-radius: var(--radius-full);
    font-size: 0.9375rem;
    font-weight: 600;
}

.service-intro__point-icon {
    display: flex;
    color: var(--color-success);
}

.service-intro__image {
    position: relative;
}

.service-intro__image img {
    width: 100%;
    height: auto;
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-xl);
}

.service-intro__image-badge {
    position: absolute;
    bottom: -20px;
    right: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    width: 100px;
    height: 100px;
    background: var(--color-primary);
    color: #fff;
    border-radius: 50%;
    box-shadow: var(--shadow-lg);
}

.service-intro__image-badge-number {
    font-family: 'Inter', sans-serif;
    font-size: 2rem;
    font-weight: 900;
    line-height: 1;
}

.service-intro__image-badge-text {
    font-size: 0.75rem;
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
}

/* =============================================================================
   SERVICE SYMPTOM
   ============================================================================= */
.service-symptom {
    background: var(--color-bg-light);
    position: relative;
}

.service-symptom__bg {
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, transparent 0%, rgba(239, 68, 68, 0.03) 100%);
}

.symptom-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
}

.symptom-card {
    background: var(--color-bg);
    border-radius: var(--radius-lg);
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
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.symptom-card__danger {
    position: absolute;
    top: 12px;
    left: 12px;
    display: flex;
    align-items: center;
    gap: 4px;
    padding: 4px 10px;
    background: rgba(239, 68, 68, 0.9);
    color: #fff;
    font-size: 0.75rem;
    font-weight: 700;
    border-radius: var(--radius-full);
}

.symptom-card__danger--critical {
    background: #dc2626;
    animation: pulse 2s infinite;
}

.symptom-card__danger--warning {
    background: var(--color-warning);
    color: #1a1a1a;
}

@keyframes pulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.7; }
}

.symptom-card__body {
    padding: 1.25rem;
}

.symptom-card__title {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 1.0625rem;
    font-weight: 700;
    margin: 0 0 0.75rem;
    color: var(--color-text);
}

.symptom-card__title svg {
    flex-shrink: 0;
    color: var(--color-primary);
}

.symptom-card__text {
    font-size: 0.875rem;
    color: var(--color-text-light);
    line-height: 1.7;
    margin: 0 0 1rem;
}

.symptom-card__risk {
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.symptom-card__risk-label {
    font-size: 0.75rem;
    color: var(--color-text-muted);
}

.symptom-card__risk-meter {
    display: flex;
    gap: 4px;
}

.symptom-card__risk-meter span {
    width: 24px;
    height: 8px;
    background: #e5e7eb;
    border-radius: var(--radius-sm);
}

.symptom-card__risk-meter--medium span:nth-child(-n+2) {
    background: var(--color-warning);
}

.symptom-card__risk-meter--high span {
    background: #fbbf24;
}

.symptom-card__risk-meter--high span:nth-child(3) {
    background: var(--color-danger);
}

.symptom-card__risk-meter--critical span {
    background: var(--color-danger);
}

.service-symptom__cta {
    margin-top: 3rem;
    padding: 2rem;
    background: var(--color-bg);
    border-radius: var(--radius-xl);
    text-align: center;
    box-shadow: var(--shadow-lg);
}

.service-symptom__cta-text {
    margin: 0 0 1.5rem;
    font-size: 1.0625rem;
    color: var(--color-text);
}

@media (max-width: 1024px) {
    .symptom-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 640px) {
    .symptom-grid {
        grid-template-columns: 1fr;
    }
}

/* =============================================================================
   REPAIR MENU
   ============================================================================= */
.repair-menu {
    display: flex;
    flex-direction: column;
    gap: 40px;
}

.repair-item {
    background: var(--color-bg);
    border: 1px solid var(--color-border);
    border-radius: var(--radius-xl);
    overflow: hidden;
    transition: var(--transition-base);
}

.repair-item:hover {
    box-shadow: var(--shadow-lg);
}

.repair-item--highlight {
    border: 2px solid var(--color-danger);
    background: linear-gradient(135deg, #fff 0%, #fef2f2 100%);
}

.repair-item__header {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1.25rem 1.5rem;
    background: var(--color-bg-light);
    border-bottom: 1px solid var(--color-border);
}

.repair-item--highlight .repair-item__header {
    background: linear-gradient(135deg, #fef2f2 0%, #fee2e2 100%);
}

.repair-item__icon {
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 56px;
    height: 56px;
    background: var(--color-bg);
    border-radius: 50%;
    color: var(--color-primary);
    box-shadow: var(--shadow-sm);
}

.repair-item--highlight .repair-item__icon {
    background: var(--color-danger);
    color: #fff;
}

.repair-item__title-wrap {
    display: flex;
    align-items: center;
    gap: 1rem;
    flex-wrap: wrap;
}

.repair-item__title {
    font-size: 1.25rem;
    font-weight: 700;
    margin: 0;
    color: var(--color-text);
}

.repair-item__tag {
    display: inline-block;
    padding: 0.25em 0.75em;
    font-size: 0.75rem;
    font-weight: 700;
    background: var(--color-primary);
    color: #fff;
    border-radius: var(--radius-full);
}

.repair-item__tag--urgent {
    background: var(--color-danger);
}

.repair-item__body {
    display: grid;
    grid-template-columns: 300px 1fr;
    gap: 2rem;
    padding: 1.5rem;
}

.repair-item__image {
    border-radius: var(--radius-lg);
    overflow: hidden;
}

.repair-item__image img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.repair-item__content {
    display: flex;
    flex-direction: column;
}

.repair-item__desc {
    font-size: 0.9375rem;
    color: var(--color-text-light);
    line-height: 1.8;
    margin: 0 0 1.5rem;
}

.repair-item__methods {
    flex: 1;
    margin-bottom: 1.5rem;
}

.repair-item__methods-title {
    font-size: 0.875rem;
    font-weight: 700;
    color: var(--color-text-muted);
    margin: 0 0 0.75rem;
    padding-bottom: 0.5rem;
    border-bottom: 1px solid var(--color-border);
}

.repair-item__methods-list {
    list-style: none;
    margin: 0;
    padding: 0;
}

.repair-item__methods-list li {
    padding: 0.5rem 0;
    border-bottom: 1px dashed var(--color-border);
}

.repair-item__methods-list li:last-child {
    border-bottom: none;
}

.repair-item__methods-list strong {
    display: block;
    font-size: 0.9375rem;
    color: var(--color-text);
    margin-bottom: 0.25rem;
}

.repair-item__methods-list span {
    font-size: 0.8125rem;
    color: var(--color-text-light);
}

.repair-item__price {
    display: flex;
    align-items: baseline;
    gap: 0.75rem;
    padding: 1rem;
    background: var(--color-bg-light);
    border-radius: var(--radius-md);
}

.repair-item__price-label {
    font-size: 0.8125rem;
    color: var(--color-text-muted);
}

.repair-item__price-value {
    font-family: 'Inter', sans-serif;
    font-size: 1.25rem;
    font-weight: 900;
    color: var(--color-primary);
}

.repair-item__price-note {
    font-size: 0.75rem;
    color: var(--color-text-muted);
}

.service-menu__note {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    margin-top: 2rem;
    font-size: 0.875rem;
    color: var(--color-text-muted);
}

@media (max-width: 768px) {
    .repair-item__body {
        grid-template-columns: 1fr;
        gap: 1rem;
    }
    
    .repair-item__image img {
        height: 180px;
    }
    
    .repair-item__price {
        flex-wrap: wrap;
        gap: 0.5rem;
    }
}

/* =============================================================================
   SERVICE PROCESS
   ============================================================================= */
.service-process {
    background: var(--color-bg-light);
    position: relative;
}

.service-process__bg {
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, transparent 0%, rgba(13, 71, 161, 0.02) 100%);
}

.process-timeline {
    max-width: 800px;
    margin: 0 auto;
    position: relative;
}

.process-timeline::before {
    content: '';
    position: absolute;
    left: 40px;
    top: 0;
    bottom: 0;
    width: 2px;
    background: linear-gradient(180deg, var(--color-primary) 0%, rgba(13, 71, 161, 0.2) 100%);
}

.process-step {
    display: flex;
    gap: 2rem;
    padding: 2rem 0;
    position: relative;
}

.process-step__marker {
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 80px;
    height: 80px;
    background: var(--color-primary);
    border-radius: 50%;
    position: relative;
    z-index: 1;
}

.process-step__number {
    font-family: 'Inter', sans-serif;
    font-size: 1.5rem;
    font-weight: 900;
    color: #fff;
}

.process-step__content {
    flex: 1;
    padding-top: 0.5rem;
}

.process-step__icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 60px;
    height: 60px;
    background: var(--color-bg);
    border-radius: var(--radius-lg);
    color: var(--color-primary);
    margin-bottom: 1rem;
    box-shadow: var(--shadow-sm);
}

.process-step__title {
    font-size: 1.25rem;
    font-weight: 700;
    margin: 0 0 0.5rem;
    color: var(--color-text);
}

.process-step__text {
    font-size: 0.9375rem;
    color: var(--color-text-light);
    margin: 0;
    line-height: 1.7;
}

@media (max-width: 768px) {
    .process-timeline::before {
        left: 30px;
    }
    
    .process-step {
        gap: 1.5rem;
    }
    
    .process-step__marker {
        width: 60px;
        height: 60px;
    }
    
    .process-step__number {
        font-size: 1.25rem;
    }
    
    .process-step__icon {
        width: 48px;
        height: 48px;
    }
}

/* =============================================================================
   SERVICE WORKS
   ============================================================================= */
.works-showcase {
    display: flex;
    flex-direction: column;
    gap: 40px;
}

.work-case {
    display: grid;
    grid-template-columns: 1fr 1fr;
    background: var(--color-bg);
    border-radius: var(--radius-xl);
    overflow: hidden;
    box-shadow: var(--shadow-lg);
}

.work-case__images {
    display: flex;
    align-items: center;
}

.work-case__before,
.work-case__after {
    flex: 1;
    margin: 0;
    position: relative;
}

.work-case__before img,
.work-case__after img {
    width: 100%;
    height: 250px;
    object-fit: cover;
}

.work-case__before figcaption,
.work-case__after figcaption {
    position: absolute;
    top: 12px;
    padding: 4px 12px;
    font-size: 0.75rem;
    font-weight: 700;
    color: #fff;
    border-radius: var(--radius-sm);
}

.work-case__before figcaption {
    left: 12px;
    background: rgba(0, 0, 0, 0.7);
}

.work-case__after figcaption {
    right: 12px;
    background: var(--color-primary);
}

.work-case__arrow {
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 48px;
    height: 48px;
    background: var(--color-bg);
    border-radius: 50%;
    color: var(--color-primary);
    margin: 0 -24px;
    z-index: 1;
    box-shadow: var(--shadow-md);
}

.work-case__body {
    padding: 2rem;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.work-case__category {
    display: inline-block;
    padding: 0.25em 0.75em;
    font-size: 0.75rem;
    font-weight: 700;
    background: var(--color-primary);
    color: #fff;
    border-radius: var(--radius-full);
    margin-bottom: 0.75rem;
    align-self: flex-start;
}

.work-case__title {
    font-size: 1.25rem;
    font-weight: 700;
    margin: 0 0 1rem;
    color: var(--color-text);
}

.work-case__meta {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
    margin: 0 0 1rem;
    padding: 1rem;
    background: var(--color-bg-light);
    border-radius: var(--radius-md);
}

.work-case__meta > div {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.work-case__meta dt {
    font-size: 0.75rem;
    color: var(--color-text-muted);
}

.work-case__meta dd {
    margin: 0;
    font-size: 0.9375rem;
    font-weight: 600;
    color: var(--color-text);
}

.work-case__desc {
    font-size: 0.9375rem;
    color: var(--color-text-light);
    margin: 0;
    line-height: 1.7;
}

@media (max-width: 1024px) {
    .work-case {
        grid-template-columns: 1fr;
    }
    
    .work-case__images {
        order: -1;
    }
}

@media (max-width: 640px) {
    .work-case__before img,
    .work-case__after img {
        height: 150px;
    }
    
    .work-case__arrow {
        width: 36px;
        height: 36px;
        margin: 0 -18px;
    }
}

/* =============================================================================
   SERVICE FAQ
   ============================================================================= */
.service-faq {
    background: var(--color-bg-light);
    position: relative;
}

.service-faq__bg {
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(13, 71, 161, 0.02) 0%, transparent 100%);
}

.faq-list {
    max-width: 800px;
    margin: 0 auto;
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
    background: var(--color-primary);
    color: #fff;
    font-family: 'Inter', sans-serif;
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
    font-family: 'Inter', sans-serif;
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
    margin: 0;
}

/* =============================================================================
   CTA
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
    background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
}

.cta__bg-pattern {
    position: absolute;
    inset: 0;
    opacity: 0.1;
    background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}

.cta__content {
    position: relative;    z-index: 1;
    max-width: 900px;
    margin: 0 auto;
    text-align: center;
}

.cta__header {
    margin-bottom: 3rem;
}

.cta__icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 80px;
    height: 80px;
    margin: 0 auto 1.5rem;
    background: rgba(255,255,255,0.1);
    border-radius: 50%;
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
    font-family: 'Inter', sans-serif;
    font-size: clamp(1.75rem, 4vw, 2.5rem);
    font-weight: 900;
    color: #fff;
    letter-spacing: 0.02em;
    transition: var(--transition-base);
}

.cta__phone-number:hover {
    transform: scale(1.05);
    text-shadow: 0 0 20px rgba(255, 255, 255, 0.5);
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
    color: var(--color-success);
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
   OTHER SERVICES
   ============================================================================= */
.other-services {
    background: var(--color-bg);
}

.service-links {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
}

.service-link {
    display: flex;
    align-items: center;
    gap: 1.25rem;
    padding: 1.5rem;
    background: var(--color-bg);
    border: 1px solid var(--color-border);
    border-radius: var(--radius-lg);
    transition: var(--transition-base);
}

.service-link:hover {
    border-color: var(--color-primary);
    box-shadow: var(--shadow-lg);
    transform: translateY(-4px);
}

.service-link__icon {
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 64px;
    height: 64px;
    background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
    border-radius: 50%;
    color: var(--color-primary);
}

.service-link__body {
    flex: 1;
    min-width: 0;
}

.service-link__title {
    font-size: 1.125rem;
    font-weight: 700;
    margin: 0 0 0.25rem;
    color: var(--color-text);
}

.service-link:hover .service-link__title {
    color: var(--color-primary);
}

.service-link__text {
    font-size: 0.8125rem;
    color: var(--color-text-light);
    margin: 0;
    line-height: 1.5;
}

.service-link__arrow {
    flex-shrink: 0;
    display: flex;
    color: var(--color-text-muted);
    transition: var(--transition-base);
}

.service-link:hover .service-link__arrow {
    color: var(--color-primary);
    transform: translateX(4px);
}

@media (max-width: 1024px) {
    .service-links {
        grid-template-columns: 1fr;
    }
}

/* =============================================================================
   RESPONSIVE
   ============================================================================= */
@media (max-width: 1280px) {
    :root {
        --container-width: 1024px;
    }
}

@media (max-width: 1024px) {
    :root {
        --section-padding: 80px;
    }
}

@media (max-width: 768px) {
    :root {
        --section-padding: 60px;
        --container-padding: 16px;
    }
}

/* =============================================================================
   PRINT
   ============================================================================= */
@media print {
    .page-hero,
    .cta,
    .service-symptom__cta {
        background: #f0f0f0 !important;
        color: #000 !important;
    }
    
    .page-hero__bg,
    .cta__bg {
        display: none;
    }
    
    .btn {
        border: 1px solid #000 !important;
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
        transition-duration: 0.01ms !important;
    }
}

:focus-visible {
    outline: 3px solid var(--color-primary);
    outline-offset: 2px;
}

.btn:focus-visible {
    outline: 3px solid var(--color-accent);
    outline-offset: 2px;
}
</style>

<?php get_footer(); ?>
