<?php
/**
 * Template Name: 屋根塗装サービスページ
 * Description: 屋根塗装専門サービスの詳細ページ。塗料比較・施工工程・料金プラン・Before/After事例を網羅。
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
$company_name    = sato_get_company_name();
$phone           = sato_get_phone();
$phone_link      = sato_get_phone_link();
$line_url        = sato_get_line_url();
$warranty_years  = sato_get_warranty_years();
$service_areas   = sato_get_service_areas();

// 構造化データ
$schema_service = [
    '@context' => 'https://schema.org',
    '@type' => 'Service',
    'serviceType' => '屋根塗装',
    'provider' => [
        '@type' => 'LocalBusiness',
        'name' => sato_get_company_name(true),
        'telephone' => $phone,
    ],
    'areaServed' => array_map(function($area) {
        return ['@type' => 'City', 'name' => $area];
    }, $service_areas),
    'description' => '静岡県御殿場市・裾野市を中心に、一級塗装技能士による高品質な屋根塗装サービスを提供。遮熱・断熱塗料対応、最長' . $warranty_years . '年保証。',
];
?>

<script type="application/ld+json">
<?php echo wp_json_encode($schema_service, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT); ?>
</script>

<main id="main" class="service-page service-page--roof" role="main">

    <!-- =========================================================================
         PAGE HERO
         ========================================================================= -->
    <section class="page-hero" aria-label="屋根塗装サービス">
        <div class="page-hero__bg">
            <div class="page-hero__bg-image" style="background-image: url('https://images.unsplash.com/photo-1558618666-fcd25c85cd64?auto=format&fit=crop&q=80&w=1920');"></div>
            <div class="page-hero__bg-overlay"></div>
        </div>
        
        <div class="container">
            <div class="page-hero__content">
                <!-- パンくずリスト -->
                <nav class="breadcrumb" aria-label="パンくずリスト">
                    <ol class="breadcrumb__list">
                        <li class="breadcrumb__item">
                            <a href="<?php echo home_url('/'); ?>" class="breadcrumb__link">ホーム</a>
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
                            <span class="breadcrumb__current" aria-current="page">屋根塗装</span>
                        </li>
                    </ol>
                </nav>

                <span class="page-hero__label">ROOF PAINTING</span>
                <h1 class="page-hero__title">屋根塗装</h1>
                <p class="page-hero__lead">
                    紫外線・風雨から住まいを守る屋根を、<br class="pc-only">
                    一級塗装技能士の確かな技術で蘇らせます。
                </p>
                
                <div class="page-hero__badges">
                    <span class="page-hero__badge">
                        <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="8" r="7"/><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"/></svg>
                        一級塗装技能士施工
                    </span>
                    <span class="page-hero__badge">
                        <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg>
                        最長<?php echo esc_html($warranty_years); ?>年保証
                    </span>
                    <span class="page-hero__badge">
                        <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/></svg>
                        遮熱塗料対応
                    </span>
                </div>
            </div>
        </div>

        <div class="page-hero__wave">
            <svg viewBox="0 0 1440 120" preserveAspectRatio="none">
                <path d="M0,64 C360,120 720,0 1080,64 C1260,96 1380,48 1440,64 L1440,120 L0,120 Z" fill="#ffffff"/>
            </svg>
        </div>
    </section>

    <!-- =========================================================================
         INTRO SECTION - 屋根塗装の重要性
         ========================================================================= -->
    <section class="section intro" aria-labelledby="intro-heading">
        <div class="container">
            <div class="intro__grid">
                <div class="intro__content">
                    <span class="section__label">IMPORTANCE</span>
                    <h2 class="section__title" id="intro-heading">
                        なぜ<span class="marker">屋根塗装</span>が<br>
                        必要なのか
                    </h2>
                    <div class="intro__text">
                        <p>
                            屋根は住まいの中で最も過酷な環境にさらされる部分です。
                            直射日光による紫外線、激しい風雨、冬場の凍結と融解の繰り返し。
                            これらのダメージから建物を守る塗膜は、年月とともに確実に劣化していきます。
                        </p>
                        <p>
                            塗装が劣化したまま放置すると、屋根材自体の腐食や割れが進行し、
                            最悪の場合は雨漏りによる構造材の損傷を招きます。
                            そうなると、塗装では対処できず、屋根の葺き替えという大規模な工事が必要になることも。
                        </p>
                        <p class="intro__highlight">
                            <strong>定期的な屋根塗装は、住まいの寿命を延ばし、<br class="pc-only">
                            将来の修繕費用を大幅に抑える「予防メンテナンス」です。</strong>
                        </p>
                    </div>
                </div>
                
                <div class="intro__visual">
                    <div class="intro__image-main">
                        <img src="https://images.unsplash.com/photo-1632759145351-1d592919f522?auto=format&fit=crop&q=80&w=800" 
                             alt="屋根塗装作業の様子" 
                             loading="lazy"
                             width="600"
                             height="400">
                    </div>
                    <div class="intro__stats">
                        <div class="intro__stat">
                            <span class="intro__stat-number">10<small>年</small></span>
                            <span class="intro__stat-label">一般的な塗り替え目安</span>
                        </div>
                        <div class="intro__stat">
                            <span class="intro__stat-number">1/3</span>
                            <span class="intro__stat-label">葺き替え費用との比較</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- =========================================================================
         SYMPTOMS SECTION - 劣化症状チェック
         ========================================================================= -->
    <section class="section symptoms" aria-labelledby="symptoms-heading">
        <div class="symptoms__bg"></div>
        
        <div class="container">
            <header class="section__header section__header--center">
                <span class="section__label">SYMPTOMS</span>
                <h2 class="section__title" id="symptoms-heading">
                    こんな症状、<span class="marker marker--warning">見逃していませんか？</span>
                </h2>
                <p class="section__lead">
                    屋根は普段目に入りにくい場所だからこそ、<br class="pc-only">
                    定期的な点検が重要です。以下の症状は塗り替えのサインです。
                </p>
            </header>

            <div class="symptoms__grid">
                <article class="symptom-card">
                    <div class="symptom-card__image">
                        <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?auto=format&fit=crop&q=80&w=400&h=300" 
                             alt="色あせた屋根" loading="lazy">
                        <span class="symptom-card__level symptom-card__level--warning">要注意</span>
                    </div>
                    <div class="symptom-card__body">
                        <h3 class="symptom-card__title">
                            <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/></svg>
                            色あせ・変色
                        </h3>
                        <p class="symptom-card__text">
                            紫外線により塗膜の顔料が分解され、本来の色が薄くなっている状態。
                            見た目の問題だけでなく、防水機能も低下しています。
                        </p>
                    </div>
                </article>

                <article class="symptom-card">
                    <div class="symptom-card__image">
                        <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&q=80&w=400&h=300" 
                             alt="コケ・藻が生えた屋根" loading="lazy">
                        <span class="symptom-card__level symptom-card__level--warning">要注意</span>
                    </div>
                    <div class="symptom-card__body">
                        <h3 class="symptom-card__title">
                            <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"/></svg>
                            コケ・カビ・藻の発生
                        </h3>
                        <p class="symptom-card__text">
                            塗膜の防水性が低下し、屋根材が水分を含みやすくなっている証拠。
                            コケの根は屋根材を傷め、さらに劣化を加速させます。
                        </p>
                    </div>
                </article>

                <article class="symptom-card">
                    <div class="symptom-card__image">
                        <img src="https://images.unsplash.com/photo-1558618047-3c8c76ca7d13?auto=format&fit=crop&q=80&w=400&h=300" 
                             alt="ひび割れた屋根材" loading="lazy">
                        <span class="symptom-card__level symptom-card__level--danger">危険</span>
                    </div>
                    <div class="symptom-card__body">
                        <h3 class="symptom-card__title">
                            <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                            ひび割れ・欠け
                        </h3>
                        <p class="symptom-card__text">
                            スレート屋根に多い症状。塗膜が完全に機能しなくなり、
                            屋根材自体が水を吸って膨張・収縮を繰り返した結果です。
                        </p>
                    </div>
                </article>

                <article class="symptom-card">
                    <div class="symptom-card__image">
                        <img src="https://images.unsplash.com/photo-1513694203232-719a280e022f?auto=format&fit=crop&q=80&w=400&h=300" 
                             alt="錆びた金属屋根" loading="lazy">
                        <span class="symptom-card__level symptom-card__level--danger">危険</span>
                    </div>
                    <div class="symptom-card__body">
                        <h3 class="symptom-card__title">
                            <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
                            サビの発生
                        </h3>
                        <p class="symptom-card__text">
                            トタンやガルバリウム鋼板などの金属屋根で発生。
                            サビは広がりやすく、放置すると穴が開いて雨漏りの原因に。
                        </p>
                    </div>
                </article>

                <article class="symptom-card">
                    <div class="symptom-card__image">
                        <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&q=80&w=400&h=300" 
                             alt="塗膜が剥がれた屋根" loading="lazy">
                        <span class="symptom-card__level symptom-card__level--danger">危険</span>
                    </div>
                    <div class="symptom-card__body">
                        <h3 class="symptom-card__title">
                            <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><line x1="3" y1="9" x2="21" y2="9"/><line x1="9" y1="21" x2="9" y2="9"/></svg>
                            塗膜の剥がれ・浮き
                        </h3>
                        <p class="symptom-card__text">
                            塗膜が屋根材から浮いたり剥がれたりしている状態。
                            下地まで水が浸入しており、早急な対処が必要です。
                        </p>
                    </div>
                </article>

                <article class="symptom-card symptom-card--cta">
                    <div class="symptom-card__cta-content">
                        <div class="symptom-card__cta-icon">
                            <svg viewBox="0 0 24 24" width="48" height="48" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                        </div>
                        <h3 class="symptom-card__cta-title">無料診断で<br>状態をチェック</h3>
                        <p class="symptom-card__cta-text">
                            ドローン調査で屋根の隅々まで<br>
                            詳しく診断いたします
                        </p>
                        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn--primary">
                            無料診断を申し込む
                            <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                        </a>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- =========================================================================
         PAINT TYPES SECTION - 塗料の種類
         ========================================================================= -->
    <section class="section paint-types" aria-labelledby="paint-heading">
        <div class="container">
            <header class="section__header section__header--center">
                <span class="section__label">PAINT TYPES</span>
                <h2 class="section__title" id="paint-heading">
                    屋根に最適な<span class="marker">塗料の選び方</span>
                </h2>
                <p class="section__lead">
                    屋根塗装では、耐久性・遮熱性・コストのバランスが重要。<br class="pc-only">
                    建物の状態やご予算に合わせて最適な塗料をご提案します。
                </p>
            </header>

            <div class="paint-types__table-wrapper">
                <table class="paint-table">
                    <thead>
                        <tr>
                            <th class="paint-table__header">塗料グレード</th>
                            <th class="paint-table__header">耐久年数</th>
                            <th class="paint-table__header">遮熱効果</th>
                            <th class="paint-table__header">特徴</th>
                            <th class="paint-table__header">おすすめの方</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="paint-table__row">
                            <td class="paint-table__cell paint-table__cell--name">
                                <span class="paint-table__grade paint-table__grade--economy">エコノミー</span>
                                <strong>シリコン塗料</strong>
                            </td>
                            <td class="paint-table__cell">
                                <span class="paint-table__years">8〜10年</span>
                            </td>
                            <td class="paint-table__cell">
                                <span class="paint-table__rating">
                                    <svg viewBox="0 0 24 24" width="16" height="16" fill="#fbbf24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                    <svg viewBox="0 0 24 24" width="16" height="16" fill="#fbbf24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                    <svg viewBox="0 0 24 24" width="16" height="16" fill="#e5e7eb"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                </span>
                            </td>
                            <td class="paint-table__cell">
                                コストパフォーマンスに優れた定番塗料。汚れにくく艶持ちが良い。
                            </td>
                            <td class="paint-table__cell">
                                初期費用を抑えたい方<br>賃貸物件オーナー様
                            </td>
                        </tr>
                        <tr class="paint-table__row paint-table__row--featured">
                            <td class="paint-table__cell paint-table__cell--name">
                                <span class="paint-table__badge">人気No.1</span>
                                <span class="paint-table__grade paint-table__grade--standard">スタンダード</span>
                                <strong>ラジカル塗料</strong>
                            </td>
                            <td class="paint-table__cell">
                                <span class="paint-table__years">12〜15年</span>
                            </td>
                            <td class="paint-table__cell">
                                <span class="paint-table__rating">
                                    <svg viewBox="0 0 24 24" width="16" height="16" fill="#fbbf24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                    <svg viewBox="0 0 24 24" width="16" height="16" fill="#fbbf24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                    <svg viewBox="0 0 24 24" width="16" height="16" fill="#fbbf24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                </span>
                            </td>
                            <td class="paint-table__cell">
                                ラジカル制御技術で紫外線による劣化を抑制。シリコン以上フッ素未満の高コスパ。
                            </td>
                            <td class="paint-table__cell">
                                長く住み続ける予定の方<br>コスパ重視の方
                            </td>
                        </tr>
                        <tr class="paint-table__row">
                            <td class="paint-table__cell paint-table__cell--name">
                                <span class="paint-table__grade paint-table__grade--premium">プレミアム</span>
                                <strong>フッ素塗料</strong>
                            </td>
                            <td class="paint-table__cell">
                                <span class="paint-table__years">15〜20年</span>
                            </td>
                            <td class="paint-table__cell">
                                <span class="paint-table__rating">
                                    <svg viewBox="0 0 24 24" width="16" height="16" fill="#fbbf24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                    <svg viewBox="0 0 24 24" width="16" height="16" fill="#fbbf24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                    <svg viewBox="0 0 24 24" width="16" height="16" fill="#fbbf24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                </span>
                            </td>
                            <td class="paint-table__cell">
                                最高クラスの耐久性。汚れが付きにくく、長期間美観を維持。
                            </td>
                            <td class="paint-table__cell">
                                メンテナンス頻度を減らしたい方<br>高級住宅向け
                            </td>
                        </tr>
                        <tr class="paint-table__row">
                            <td class="paint-table__cell paint-table__cell--name">
                                <span class="paint-table__grade paint-table__grade--special">特殊機能</span>
                                <strong>遮熱塗料</strong>
                            </td>
                            <td class="paint-table__cell">
                                <span class="paint-table__years">10〜15年</span>
                            </td>
                            <td class="paint-table__cell">
                                <span class="paint-table__rating paint-table__rating--max">
                                    <svg viewBox="0 0 24 24" width="16" height="16" fill="#22c55e"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                    <svg viewBox="0 0 24 24" width="16" height="16" fill="#22c55e"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                    <svg viewBox="0 0 24 24" width="16" height="16" fill="#22c55e"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                    <svg viewBox="0 0 24 24" width="16" height="16" fill="#22c55e"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                    <span class="paint-table__effect-text">最大-15℃</span>
                                </span>
                            </td>
                            <td class="paint-table__cell">
                                太陽光を反射し屋根表面温度を最大15℃低減。夏場の冷房効率アップで光熱費削減。
                            </td>
                            <td class="paint-table__cell">
                                光熱費を削減したい方<br>2階が暑い住宅
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- 塗料メーカーロゴ -->
            <div class="paint-makers">
                <p class="paint-makers__label">取扱い塗料メーカー</p>
                <div class="paint-makers__list">
                    <span class="paint-makers__item">日本ペイント</span>
                    <span class="paint-makers__item">関西ペイント</span>
                    <span class="paint-makers__item">エスケー化研</span>
                    <span class="paint-makers__item">アステックペイント</span>
                    <span class="paint-makers__item">ガイナ</span>
                </div>
            </div>
        </div>
    </section>

    <!-- =========================================================================
         THERMAL PAINT FEATURE - 遮熱塗料の特集
         ========================================================================= -->
    <section class="section thermal" aria-labelledby="thermal-heading">
        <div class="thermal__bg"></div>
        
        <div class="container">
            <div class="thermal__grid">
                <div class="thermal__content">
                    <span class="section__label section__label--light">THERMAL BARRIER</span>
                    <h2 class="section__title section__title--light" id="thermal-heading">
                        夏の暑さを軽減する<br>
                        <span class="thermal__highlight">遮熱塗料</span>のすすめ
                    </h2>
                    <p class="thermal__lead">
                        御殿場・裾野エリアは夏場の日差しが強く、2階やロフトが暑くなりがち。
                        遮熱塗料なら屋根表面温度を最大15℃下げ、室内の快適性を向上させます。
                    </p>
                    
                    <div class="thermal__benefits">
                        <div class="thermal__benefit">
                            <div class="thermal__benefit-icon">
                                <svg viewBox="0 0 24 24" width="32" height="32" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
                            </div>
                            <div class="thermal__benefit-content">
                                <h4>屋根表面温度を低減</h4>
                                <p>一般塗料と比較して最大15℃の温度差。屋根材の劣化も抑制します。</p>
                            </div>
                        </div>
                        <div class="thermal__benefit">
                            <div class="thermal__benefit-icon">
                                <svg viewBox="0 0 24 24" width="32" height="32" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                            </div>
                            <div class="thermal__benefit-content">
                                <h4>年間電気代を削減</h4>
                                <p>冷房効率がアップし、年間で数万円の光熱費節約が期待できます。</p>
                            </div>
                        </div>
                        <div class="thermal__benefit">
                            <div class="thermal__benefit-icon">
                                <svg viewBox="0 0 24 24" width="32" height="32" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                            </div>
                            <div class="thermal__benefit-content">
                                <h4>屋根材の寿命を延長</h4>
                                <p>熱ストレスを軽減することで、屋根材自体の劣化を遅らせます。</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="thermal__visual">
                    <div class="thermal__comparison">
                        <div class="thermal__comparison-item thermal__comparison-item--before">
                            <div class="thermal__comparison-header">
                                <span class="thermal__comparison-label">一般塗料</span>
                                <span class="thermal__comparison-temp">70℃</span>
                            </div>
                            <div class="thermal__comparison-bar thermal__comparison-bar--hot"></div>
                        </div>
                        <div class="thermal__comparison-item thermal__comparison-item--after">
                            <div class="thermal__comparison-header">
                                <span class="thermal__comparison-label">遮熱塗料</span>
                                <span class="thermal__comparison-temp">55℃</span>
                            </div>
                            <div class="thermal__comparison-bar thermal__comparison-bar--cool"></div>
                        </div>
                        <p class="thermal__comparison-caption">真夏の晴天時・屋根表面温度の比較</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- =========================================================================
         PROCESS SECTION - 施工工程
         ========================================================================= -->
    <section class="section process" aria-labelledby="process-heading">
        <div class="container">
            <header class="section__header section__header--center">
                <span class="section__label">PROCESS</span>
                <h2 class="section__title" id="process-heading">
                    屋根塗装の<span class="marker">施工工程</span>
                </h2>
                <p class="section__lead">
                    職人の腕が試される屋根塗装。当社は各工程を丁寧に行い、<br class="pc-only">
                    長持ちする美しい仕上がりをお約束します。
                </p>
            </header>

            <div class="process__timeline">
                <article class="process-step">
                    <div class="process-step__number">
                        <span>01</span>
                    </div>
                    <div class="process-step__content">
                        <div class="process-step__image">
                            <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&q=80&w=400&h=300" 
                                 alt="足場設置作業" loading="lazy">
                        </div>
                        <div class="process-step__body">
                            <h3 class="process-step__title">足場架設・養生</h3>
                            <p class="process-step__text">
                                安全に作業を行うため、建物周囲に足場を設置。飛散防止のメッシュシートで覆い、
                                近隣への配慮も怠りません。植木や車への養生も丁寧に行います。
                            </p>
                            <span class="process-step__duration">
                                <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                所要日数：1日
                            </span>
                        </div>
                    </div>
                </article>

                <article class="process-step">
                    <div class="process-step__number">
                        <span>02</span>
                    </div>
                    <div class="process-step__content">
                        <div class="process-step__image">
                            <img src="https://images.unsplash.com/photo-1558618047-3c8c76ca7d13?auto=format&fit=crop&q=80&w=400&h=300" 
                                 alt="高圧洗浄作業" loading="lazy">
                        </div>
                        <div class="process-step__body">
                            <h3 class="process-step__title">高圧洗浄</h3>
                            <p class="process-step__text">
                                150kg/cm²以上の高圧水流で、長年蓄積した汚れ・コケ・古い塗膜を徹底除去。
                                この工程を怠ると塗料の密着不良を起こし、早期剥離の原因になります。
                            </p>
                            <span class="process-step__duration">
                                <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                所要日数：1日（乾燥1〜2日）
                            </span>
                        </div>
                    </div>
                </article>

                <article class="process-step">
                    <div class="process-step__number">
                        <span>03</span>
                    </div>
                    <div class="process-step__content">
                        <div class="process-step__image">
                            <img src="https://images.unsplash.com/photo-1621905251189-08b45d6a269e?auto=format&fit=crop&q=80&w=400&h=300" 
                                 alt="下地処理・補修作業" loading="lazy">
                        </div>
                        <div class="process-step__body">
                            <h3 class="process-step__title">下地処理・補修</h3>
                            <p class="process-step__text">
                                ひび割れはコーキングで補修、錆びはサビ止め塗装。板金部分のケレン（サビ落とし）、
                                縁切り（スレート屋根の通気確保）など、塗装前の準備を入念に。
                            </p>
                            <span class="process-step__duration">
                                <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                所要日数：1〜2日
                            </span>
                        </div>
                    </div>
                </article>

                <article class="process-step">
                    <div class="process-step__number">
                        <span>04</span>
                    </div>
                    <div class="process-step__content">
                        <div class="process-step__image">
                            <img src="https://images.unsplash.com/photo-1562259929-b4e1fd3aef09?auto=format&fit=crop&q=80&w=400&h=300" 
                                 alt="下塗り作業" loading="lazy">
                        </div>
                        <div class="process-step__body">
                            <h3 class="process-step__title">下塗り（プライマー）</h3>
                            <p class="process-step__text">
                                屋根材と上塗り塗料を密着させる接着剤の役割。屋根材の種類に合わせた
                                専用プライマーを使用し、塗料の性能を最大限に発揮させます。
                            </p>
                            <span class="process-step__duration">
                                <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                所要日数：1日（乾燥時間含む）
                            </span>
                        </div>
                    </div>
                </article>

                <article class="process-step">
                    <div class="process-step__number">
                        <span>05</span>
                    </div>
                    <div class="process-step__content">
                        <div class="process-step__image">
                            <img src="https://images.unsplash.com/photo-1589939705384-5185137a7f0f?auto=format&fit=crop&q=80&w=400&h=300" 
                                 alt="中塗り作業" loading="lazy">
                        </div>
                        <div class="process-step__body">
                            <h3 class="process-step__title">中塗り</h3>
                            <p class="process-step__text">
                                上塗り塗料の1回目塗装。塗り残しや塗りムラがないよう、
                                一定の膜厚を確保しながら丁寧に塗り重ねていきます。
                            </p>
                            <span class="process-step__duration">
                                <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                所要日数：1日（乾燥時間含む）
                            </span>
                        </div>
                    </div>
                </article>

                <article class="process-step">
                    <div class="process-step__number">
                        <span>06</span>
                    </div>
                    <div class="process-step__content">
                        <div class="process-step__image">
                            <img src="https://images.unsplash.com/photo-1632759145351-1d592919f522?auto=format&fit=crop&q=80&w=400&h=300" 
                                 alt="上塗り作業" loading="lazy">
                        </div>
                        <div class="process-step__body">
                            <h3 class="process-step__title">上塗り</h3>
                            <p class="process-step__text">
                                仕上げの塗装。十分な乾燥時間を確保した後、規定の膜厚で塗装することで、
                                塗料メーカーが保証する耐久性を発揮させます。
                            </p>
                            <span class="process-step__duration">
                                <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                所要日数：1日（乾燥時間含む）
                            </span>
                        </div>
                    </div>
                </article>

                <article class="process-step">
                    <div class="process-step__number">
                        <span>07</span>
                    </div>
                    <div class="process-step__content">
                        <div class="process-step__image">
                            <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&q=80&w=400&h=300" 
                                 alt="完了検査" loading="lazy">
                        </div>
                        <div class="process-step__body">
                            <h3 class="process-step__title">完了検査・足場解体</h3>
                            <p class="process-step__text">
                                職人による自主検査の後、お客様と一緒に仕上がりを確認。
                                写真付きの施工報告書をお渡しし、保証書を発行いたします。
                            </p>
                            <span class="process-step__duration">
                                <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                所要日数：1日
                            </span>
                        </div>
                    </div>
                </article>
            </div>

            <div class="process__note">
                <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
                <p>
                    <strong>標準工期：約7〜10日間</strong>（天候により前後します）<br>
                    雨天時は塗装作業を中止し、品質を最優先いたします。
                </p>
            </div>
        </div>
    </section>

    <!-- =========================================================================
         PRICE SECTION - 料金プラン
         ========================================================================= -->
    <section class="section price" aria-labelledby="price-heading">
        <div class="price__bg"></div>
        
        <div class="container">
            <header class="section__header section__header--center">
                <span class="section__label">PRICE</span>
                <h2 class="section__title" id="price-heading">
                    屋根塗装<span class="marker marker--accent">料金プラン</span>
                </h2>
                <p class="section__lead">
                    足場・高圧洗浄・下地補修・塗装3回塗り・保証すべてコミコミ。<br class="pc-only">
                    追加料金なしの明朗会計で安心です。
                </p>
            </header>

            <div class="price__cards">
                <!-- エコノミープラン -->
                <article class="price-card">
                    <header class="price-card__header">
                        <span class="price-card__grade">Economy</span>
                        <h3 class="price-card__name">シリコンプラン</h3>
                    </header>
                    <div class="price-card__price">
                        <span class="price-card__condition">屋根面積50㎡の場合</span>
                        <div class="price-card__amount">
                            <span class="price-card__yen">¥</span>
                            <span class="price-card__number">24.8</span>
                            <span class="price-card__unit">万円〜</span>
                        </div>
                        <span class="price-card__tax">税込 27.2万円〜</span>
                    </div>
                    <ul class="price-card__includes">
                        <li>
                            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                            足場架設・養生
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                            高圧洗浄
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                            下地補修・ケレン
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                            シリコン塗料3回塗り
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                            5年品質保証
                        </li>
                    </ul>
                    <div class="price-card__footer">
                        <span class="price-card__recommend">初期費用を抑えたい方におすすめ</span>
                        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn--outline btn--block">
                            このプランで見積もり
                        </a>
                    </div>
                </article>

                <!-- スタンダードプラン（おすすめ） -->
                <article class="price-card price-card--featured">
                    <div class="price-card__ribbon">人気No.1</div>
                    <header class="price-card__header">
                        <span class="price-card__grade">Standard</span>
                        <h3 class="price-card__name">ラジカルプラン</h3>
                    </header>
                    <div class="price-card__price">
                        <span class="price-card__condition">屋根面積50㎡の場合</span>
                        <div class="price-card__amount">
                            <span class="price-card__yen">¥</span>
                            <span class="price-card__number">29.8</span>
                            <span class="price-card__unit">万円〜</span>
                        </div>
                        <span class="price-card__tax">税込 32.7万円〜</span>
                    </div>
                    <ul class="price-card__includes">
                        <li>
                            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                            足場架設・養生
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                            高圧洗浄
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                            下地補修・ケレン
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                            ラジカル塗料3回塗り
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                            縁切り（タスペーサー設置）
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                            <strong>7年品質保証</strong>
                        </li>
                    </ul>
                    <div class="price-card__footer">
                        <span class="price-card__recommend">コスパ重視の方に一番人気！</span>
                        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn--primary btn--block">
                            このプランで見積もり
                        </a>
                    </div>
                </article>

                <!-- プレミアムプラン -->
                <article class="price-card">
                    <header class="price-card__header">
                        <span class="price-card__grade">Premium</span>
                        <h3 class="price-card__name">フッ素プラン</h3>
                    </header>
                    <div class="price-card__price">
                        <span class="price-card__condition">屋根面積50㎡の場合</span>
                        <div class="price-card__amount">
                            <span class="price-card__yen">¥</span>
                            <span class="price-card__number">36.8</span>
                            <span class="price-card__unit">万円〜</span>
                        </div>
                        <span class="price-card__tax">税込 40.4万円〜</span>
                    </div>
                    <ul class="price-card__includes">
                        <li>
                            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                            足場架設・養生
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                            高圧洗浄
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                            下地補修・ケレン
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                            フッ素塗料3回塗り
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                            縁切り（タスペーサー設置）
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                            <strong>10年品質保証</strong>
                        </li>
                    </ul>
                    <div class="price-card__footer">
                        <span class="price-card__recommend">長期間メンテ不要にしたい方へ</span>
                        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn--outline btn--block">
                            このプランで見積もり
                        </a>
                    </div>
                </article>
            </div>

            <!-- 遮熱オプション -->
            <div class="price__option">
                <div class="price__option-content">
                    <div class="price__option-icon">
                        <svg viewBox="0 0 24 24" width="40" height="40" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/></svg>
                    </div>
                    <div class="price__option-body">
                        <h4 class="price__option-title">遮熱塗料へのアップグレード</h4>
                        <p class="price__option-text">
                            各プランを遮熱仕様にグレードアップ可能です。
                            夏場の室温上昇を抑え、光熱費削減にも効果的。
                        </p>
                    </div>
                    <div class="price__option-price">
                        <span>+</span>
                        <strong>5万円〜</strong>
                    </div>
                </div>
            </div>

            <p class="price__note">
                ※価格は目安です。屋根の形状・勾配・劣化状況により変動します。正確な金額は無料現地調査にてご案内いたします。
            </p>
        </div>
    </section>

    <!-- =========================================================================
         WORKS SECTION - 施工事例
         ========================================================================= -->
    <section class="section works" aria-labelledby="works-heading">
        <div class="container">
            <header class="section__header">
                <div class="section__header-left">
                    <span class="section__label">WORKS</span>
                    <h2 class="section__title" id="works-heading">屋根塗装の施工事例</h2>
                </div>
                <a href="<?php echo esc_url(home_url('/works/?category=roof')); ?>" class="section__header-link">
                    すべて見る
                    <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </a>
            </header>

            <div class="works__grid">
                <?php
                $roof_works = new WP_Query([
                    'post_type' => 'works',
                    'posts_per_page' => 3,
                    'post_status' => 'publish',
                    'tax_query' => [
                        [
                            'taxonomy' => 'works_category',
                            'field' => 'slug',
                            'terms' => 'roof',
                        ],
                    ],
                ]);
                
                if ($roof_works->have_posts()) :
                    while ($roof_works->have_posts()) : $roof_works->the_post();
                        $before_id = get_post_meta(get_the_ID(), '_works_before_image', true);
                        $after_id = get_post_meta(get_the_ID(), '_works_after_image', true);
                        $client_name = get_post_meta(get_the_ID(), '_works_client_name', true);
                        $work_cost = get_post_meta(get_the_ID(), '_works_cost', true);
                        
                        $before_url = $before_id ? wp_get_attachment_image_url($before_id, 'works-large') : 'https://placehold.co/600x400/cccccc/666666?text=Before';
                        $after_url = $after_id ? wp_get_attachment_image_url($after_id, 'works-large') : (has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'works-large') : 'https://placehold.co/600x400/1e3a5f/ffffff?text=After');
                ?>
                <article class="works-card">
                    <div class="works-card__image">
                        <img src="<?php echo esc_url($after_url); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy">
                        <?php if ($work_cost) : ?>
                        <span class="works-card__price"><?php echo esc_html($work_cost); ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="works-card__body">
                        <h3 class="works-card__title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        <?php if ($client_name) : ?>
                        <p class="works-card__location">
                            <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                            <?php echo esc_html($client_name); ?>
                        </p>
                        <?php endif; ?>
                        <a href="<?php the_permalink(); ?>" class="works-card__link">
                            詳細を見る
                            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                        </a>
                    </div>
                </article>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                ?>
                <!-- ダミーデータ -->
                <article class="works-card">
                    <div class="works-card__image">
                        <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?auto=format&fit=crop&q=80&w=600&h=400" alt="屋根塗装施工例1" loading="lazy">
                        <span class="works-card__price">約32万円</span>
                    </div>
                    <div class="works-card__body">
                        <h3 class="works-card__title"><a href="#">スレート屋根のラジカル塗装</a></h3>
                        <p class="works-card__location">
                            <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                            御殿場市 S様邸
                        </p>
                        <a href="#" class="works-card__link">
                            詳細を見る
                            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                        </a>
                    </div>
                </article>
                <article class="works-card">
                    <div class="works-card__image">
                        <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&q=80&w=600&h=400" alt="屋根塗装施工例2" loading="lazy">
                        <span class="works-card__price">約45万円</span>
                    </div>
                    <div class="works-card__body">
                        <h3 class="works-card__title"><a href="#">瓦屋根の遮熱塗装</a></h3>
                        <p class="works-card__location">
                            <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                            裾野市 K様邸
                        </p>
                        <a href="#" class="works-card__link">
                            詳細を見る
                            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                        </a>
                    </div>
                </article>
                <article class="works-card">
                    <div class="works-card__image">
                        <img src="https://images.unsplash.com/photo-1513694203232-719a280e022f?auto=format&fit=crop&q=80&w=600&h=400" alt="屋根塗装施工例3" loading="lazy">
                        <span class="works-card__price">約28万円</span>
                    </div>
                    <div class="works-card__body">
                        <h3 class="works-card__title"><a href="#">金属屋根の錆止め塗装</a></h3>
                        <p class="works-card__location">
                            <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                            三島市 M様邸
                        </p>
                        <a href="#" class="works-card__link">
                            詳細を見る
                            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                        </a>
                    </div>
                </article>
                <?php endif; ?>
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
                    屋根塗装の<span class="marker">よくある質問</span>
                </h2>
            </header>

            <div class="faq__list">
                <details class="faq-item" open>
                    <summary class="faq-item__question">
                        <span class="faq-item__q">Q</span>
                        <span class="faq-item__text">屋根塗装の塗り替え時期の目安は？</span>
                        <span class="faq-item__toggle">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                        </span>
                    </summary>
                    <div class="faq-item__answer">
                        <span class="faq-item__a">A</span>
                        <div class="faq-item__content">
                            <p>
                                一般的な目安は新築から10〜15年、前回塗装から10年程度です。
                                ただし、使用した塗料の種類、屋根の向き（南面は劣化が早い）、
                                周辺環境（海沿い・山間部など）によって異なります。
                            </p>
                            <p>
                                色あせ、コケ・カビの発生、塗膜の剥がれなどの症状が見られたら、
                                年数に関わらず点検をおすすめします。当社では無料診断を行っておりますので、
                                お気軽にご相談ください。
                            </p>
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
                            <p>
                                塗装作業は雨天時には行いません。塗料が雨で流れたり、
                                乾燥不良で塗膜の性能が低下するためです。
                            </p>
                            <p>
                                雨天時は作業を中止し、翌日以降に延期となります。
                                そのため、天候によっては工期が延びる場合がありますが、
                                品質を最優先しておりますのでご了承ください。
                            </p>
                        </div>
                    </div>
                </details>

                <details class="faq-item">
                    <summary class="faq-item__question">
                        <span class="faq-item__q">Q</span>
                        <span class="faq-item__text">屋根塗装と外壁塗装は同時に行った方がいい？</span>
                        <span class="faq-item__toggle">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                        </span>
                    </summary>
                    <div class="faq-item__answer">
                        <span class="faq-item__a">A</span>
                        <div class="faq-item__content">
                            <p>
                                <strong>同時施工をおすすめします。</strong>理由は主に3つあります：
                            </p>
                            <ul>
                                <li>足場代を1回分に抑えられる（約15〜20万円の節約）</li>
                                <li>工期がまとめられ、生活への影響を最小限に</li>
                                <li>色の組み合わせを統一してトータルコーディネートが可能</li>
                            </ul>
                            <p>
                                屋根と外壁を別々に塗装すると、足場代が2回分かかり、
                                トータルで見ると費用が高くなることがほとんどです。
                            </p>
                        </div>
                    </div>
                </details>

                <details class="faq-item">
                    <summary class="faq-item__question">
                        <span class="faq-item__q">Q</span>
                        <span class="faq-item__text">タスペーサー（縁切り）とは何ですか？</span>
                        <span class="faq-item__toggle">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                        </span>
                    </summary>
                    <div class="faq-item__answer">
                        <span class="faq-item__a">A</span>
                        <div class="faq-item__content">
                            <p>
                                スレート屋根（カラーベスト・コロニアル）の塗装時に必要な工程です。
                                屋根材の重なり部分に隙間を確保し、雨水の排出と通気を確保します。
                            </p>
                            <p>
                                塗装によって屋根材同士がくっついてしまうと、
                                雨水が抜けなくなり、逆に雨漏りの原因になることがあります。
                                タスペーサーはその問題を防ぐための部材です。
                            </p>
                            <p>
                                当社のスタンダード・プレミアムプランには標準で含まれています。
                            </p>
                        </div>
                    </div>
                </details>

                <details class="faq-item">
                    <summary class="faq-item__question">
                        <span class="faq-item__q">Q</span>
                        <span class="faq-item__text">屋根塗装できない屋根材はありますか？</span>
                        <span class="faq-item__toggle">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                        </span>
                    </summary>
                    <div class="faq-item__answer">
                        <span class="faq-item__a">A</span>
                        <div class="faq-item__content">
                            <p>
                                以下の場合は塗装ではなく、葺き替えやカバー工法をおすすめすることがあります：
                            </p>
                            <ul>
                                <li>アスベストを含む古いスレート屋根（ニチハ・パミールなど）</li>
                                <li>劣化が進み、屋根材自体がボロボロになっている場合</li>
                                <li>すでに雨漏りが発生している場合</li>
                            </ul>
                            <p>
                                現地調査の際に屋根の状態を詳しく診断し、
                                塗装が適切かどうかも含めて正直にアドバイスいたします。
                            </p>
                        </div>
                    </div>
                </details>
            </div>

            <div class="faq__more">
                <a href="<?php echo esc_url(home_url('/faq/')); ?>" class="btn btn--outline">
                    すべてのFAQを見る
                    <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </a>
            </div>
        </div>
    </section>

    <!-- =========================================================================
         CTA SECTION
         ========================================================================= -->
    <section class="cta" aria-labelledby="cta-heading">
        <div class="cta__bg">
            <div class="cta__bg-gradient"></div>
            <div class="cta__bg-pattern"></div>
        </div>
        
        <div class="container">
            <div class="cta__content">
                <header class="cta__header">
                    <h2 class="cta__title" id="cta-heading">
                        屋根のこと、<br>
                        <span class="cta__highlight">まずは無料診断</span>から
                    </h2>
                    <p class="cta__lead">
                        ドローンを使った屋根調査で、普段見えない屋根の隅々まで診断。<br class="pc-only">
                        劣化状況を写真付きでご報告し、最適な塗装プランをご提案します。
                    </p>
                </header>

                <div class="cta__actions">
                    <div class="cta__phone">
                        <span class="cta__phone-label">お電話でのご相談</span>
                        <a href="<?php echo esc_attr($phone_link); ?>" class="cta__phone-number">
                            <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                            <span><?php echo esc_html($phone); ?></span>
                        </a>
                        <span class="cta__phone-hours">受付 8:00〜18:00（日祝休）</span>
                    </div>

                    <div class="cta__divider"><span>または</span></div>

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

                <ul class="cta__features">
                    <li>
                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                        診断・見積り無料
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                        ドローン屋根調査
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                        しつこい営業なし
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- =========================================================================
         RELATED SERVICES
         ========================================================================= -->
    <section class="section related" aria-labelledby="related-heading">
        <div class="container">
            <header class="section__header section__header--center">
                <span class="section__label">RELATED</span>
                <h2 class="section__title" id="related-heading">関連サービス</h2>
            </header>

            <div class="related__grid">
                <a href="<?php echo esc_url(home_url('/service/exterior/')); ?>" class="related-card">
                    <div class="related-card__image">
                        <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&q=80&w=400&h=250" alt="外壁塗装" loading="lazy">
                    </div>
                    <div class="related-card__body">
                        <h3 class="related-card__title">外壁塗装</h3>
                        <p class="related-card__text">屋根と同時施工で足場代がお得に。トータルコーディネートも可能です。</p>
                        <span class="related-card__link">
                            詳しく見る
                            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                        </span>
                    </div>
                </a>

                <a href="<?php echo esc_url(home_url('/service/waterproof/')); ?>" class="related-card">
                    <div class="related-card__image">
                        <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&q=80&w=400&h=250" alt="防水工事" loading="lazy">
                    </div>
                    <div class="related-card__body">
                        <h3 class="related-card__title">防水工事</h3>
                        <p class="related-card__text">ベランダ・バルコニー・陸屋根の防水もお任せください。</p>
                        <span class="related-card__link">
                            詳しく見る
                            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                        </span>
                    </div>
                </a>

                <a href="<?php echo esc_url(home_url('/service/')); ?>" class="related-card related-card--all">
                    <div class="related-card__all-content">
                        <div class="related-card__all-icon">
                            <svg viewBox="0 0 24 24" width="40" height="40" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
                        </div>
                        <h3 class="related-card__title">すべてのサービス</h3>
                        <span class="related-card__link">
                            一覧を見る
                            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                        </span>
                    </div>
                </a>
            </div>
        </div>
    </section>

</main>

<style>
/* =============================================================================
   SERVICE PAGE - ROOF PAINTING STYLES
   ============================================================================= */

/* Variables */
:root {
    --color-roof-primary: #1e3a5f;
    --color-roof-secondary: #2d5a87;
    --color-roof-accent: #e67e22;
    --color-roof-light: #f0f5fa;
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
    z-index: 0;
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
    background: linear-gradient(135deg, rgba(30, 58, 95, 0.95) 0%, rgba(45, 90, 135, 0.85) 100%);
}

.page-hero__content {
    position: relative;
    z-index: 1;
    max-width: 800px;
}

.page-hero .breadcrumb {
    margin-bottom: 2rem;
}

.page-hero .breadcrumb__list {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 0.5rem;
    list-style: none;
    margin: 0;
    padding: 0;
    font-size: 0.875rem;
}

.page-hero .breadcrumb__item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.page-hero .breadcrumb__link {
    color: rgba(255, 255, 255, 0.8);
}

.page-hero .breadcrumb__link:hover {
    color: #fff;
}

.page-hero .breadcrumb__separator {
    color: rgba(255, 255, 255, 0.5);
    display: flex;
}

.page-hero .breadcrumb__current {
    color: #fff;
}

.page-hero__label {
    display: inline-block;
    font-family: var(--font-en, 'Inter', sans-serif);
    font-size: 0.875rem;
    font-weight: 600;
    letter-spacing: 0.2em;
    color: var(--color-roof-accent);
    margin-bottom: 0.75rem;
}

.page-hero__title {
    font-size: clamp(2.5rem, 6vw, 4rem);
    font-weight: 900;
    line-height: 1.1;
    margin: 0 0 1.5rem;
}

.page-hero__lead {
    font-size: 1.125rem;
    line-height: 1.8;
    opacity: 0.9;
    margin: 0 0 2rem;
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
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(8px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 9999px;
    font-size: 0.875rem;
    font-weight: 600;
}

.page-hero__wave {
    position: absolute;
    bottom: -1px;
    left: 0;
    width: 100%;
    z-index: 2;
    line-height: 0;
}

.page-hero__wave svg {
    width: 100%;
    height: 80px;
}

@media (max-width: 768px) {
    .page-hero {
        padding: 120px 0 60px;
    }
    
    .page-hero__wave svg {
        height: 40px;
    }
}

/* =============================================================================
   INTRO SECTION
   ============================================================================= */
.intro__grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    align-items: center;
}

.intro__text {
    font-size: 1rem;
    line-height: 2;
    color: var(--color-text-light, #666);
}

.intro__text p {
    margin: 0 0 1.5rem;
}

.intro__text p:last-child {
    margin-bottom: 0;
}

.intro__highlight {
    padding: 1.5rem;
    background: var(--color-roof-light);
    border-left: 4px solid var(--color-roof-primary);
    border-radius: 0 8px 8px 0;
}

.intro__highlight strong {
    color: var(--color-roof-primary);
    line-height: 1.8;
}

.intro__visual {
    position: relative;
}

.intro__image-main {
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.intro__image-main img {
    width: 100%;
    height: auto;
}

.intro__stats {
    display: flex;
    gap: 1rem;
    margin-top: -40px;
    padding: 0 20px;
    position: relative;
    z-index: 1;
}

.intro__stat {
    flex: 1;
    padding: 1.25rem;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.intro__stat-number {
    display: block;
    font-family: var(--font-en, 'Inter', sans-serif);
    font-size: 2rem;
    font-weight: 900;
    color: var(--color-roof-primary);
    line-height: 1;
}

.intro__stat-number small {
    font-size: 0.5em;
}

.intro__stat-label {
    display: block;
    font-size: 0.75rem;
    color: var(--color-text-light, #666);
    margin-top: 0.5rem;
}

@media (max-width: 1024px) {
    .intro__grid {
        grid-template-columns: 1fr;
        gap: 40px;
    }
    
    .intro__visual {
        order: -1;
        max-width: 600px;
        margin: 0 auto;
    }
}

/* =============================================================================
   SYMPTOMS SECTION
   ============================================================================= */
.symptoms {
    background: var(--color-roof-light);
    position: relative;
}

.symptoms__bg {
    position: absolute;
    inset: 0;
    opacity: 0.03;
    background-image: radial-gradient(var(--color-roof-primary) 1px, transparent 1px);
    background-size: 24px 24px;
}

.symptoms__grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
}

.symptom-card {
    background: #fff;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.symptom-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 32px rgba(0, 0, 0, 0.1);
}

.symptom-card__image {
    position: relative;
    height: 180px;
    overflow: hidden;
}

.symptom-card__image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.symptom-card__level {
    position: absolute;
    top: 12px;
    right: 12px;
    padding: 0.375rem 0.75rem;
    font-size: 0.75rem;
    font-weight: 700;
    border-radius: 9999px;
}

.symptom-card__level--warning {
    background: #fef3c7;
    color: #92400e;
}

.symptom-card__level--danger {
    background: #fee2e2;
    color: #dc2626;
}

.symptom-card__body {
    padding: 1.5rem;
}

.symptom-card__title {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 1rem;
    font-weight: 700;
    margin: 0 0 0.75rem;
    color: var(--color-text, #1a1a1a);
}

.symptom-card__title svg {
    flex-shrink: 0;
    color: var(--color-roof-accent);
}

.symptom-card__text {
    font-size: 0.875rem;
    line-height: 1.7;
    color: var(--color-text-light, #666);
    margin: 0;
}

/* CTA Card */
.symptom-card--cta {
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, var(--color-roof-primary) 0%, var(--color-roof-secondary) 100%);
    color: #fff;
}

.symptom-card__cta-content {
    text-align: center;
    padding: 2rem;
}

.symptom-card__cta-icon {
    margin-bottom: 1rem;
    opacity: 0.9;
}

.symptom-card__cta-title {
    font-size: 1.25rem;
    font-weight: 700;
    margin: 0 0 0.75rem;
    line-height: 1.4;
}

.symptom-card__cta-text {
    font-size: 0.875rem;
    opacity: 0.9;
    margin: 0 0 1.5rem;
    line-height: 1.6;
}

@media (max-width: 1024px) {
    .symptoms__grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 640px) {
    .symptoms__grid {
        grid-template-columns: 1fr;
    }
}

/* =============================================================================
   PAINT TYPES TABLE
   ============================================================================= */
.paint-types__table-wrapper {
    overflow-x: auto;
    margin-bottom: 2rem;
    border-radius: 12px;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
}

.paint-table {
    width: 100%;
    min-width: 800px;
    border-collapse: collapse;
    background: #fff;
}

.paint-table__header {
    padding: 1.25rem 1rem;
    background: var(--color-roof-primary);
    color: #fff;
    font-size: 0.875rem;
    font-weight: 700;
    text-align: left;
    white-space: nowrap;
}

.paint-table__row {
    border-bottom: 1px solid var(--color-border, #e2e8f0);
}

.paint-table__row:last-child {
    border-bottom: none;
}

.paint-table__row--featured {
    background: linear-gradient(90deg, #fffbeb 0%, #fef3c7 100%);
}

.paint-table__cell {
    padding: 1.25rem 1rem;
    font-size: 0.9375rem;
    vertical-align: middle;
}

.paint-table__cell--name {
    position: relative;
}

.paint-table__badge {
    position: absolute;
    top: 8px;
    right: 8px;
    padding: 0.25rem 0.5rem;
    background: #ef4444;
    color: #fff;
    font-size: 0.6875rem;
    font-weight: 700;
    border-radius: 4px;
}

.paint-table__grade {
    display: inline-block;
    padding: 0.25rem 0.75rem;
    font-size: 0.75rem;
    font-weight: 600;
    border-radius: 9999px;
    margin-bottom: 0.5rem;
}

.paint-table__grade--economy {
    background: #e5e7eb;
    color: #374151;
}

.paint-table__grade--standard {
    background: #dbeafe;
    color: #1e40af;
}

.paint-table__grade--premium {
    background: #fef3c7;
    color: #92400e;
}

.paint-table__grade--special {
    background: #d1fae5;
    color: #065f46;
}

.paint-table__cell--name strong {
    display: block;
    font-size: 1rem;
}

.paint-table__years {
    font-weight: 700;
    color: var(--color-roof-primary);
}

.paint-table__rating {
    display: flex;
    align-items: center;
    gap: 2px;
}

.paint-table__rating--max {
    flex-wrap: wrap;
    gap: 4px;
}

.paint-table__effect-text {
    font-size: 0.75rem;
    font-weight: 700;
    color: #22c55e;
    margin-left: 0.5rem;
}

/* Paint Makers */
.paint-makers {
    text-align: center;
    padding: 2rem;
    background: var(--color-roof-light);
    border-radius: 12px;
}

.paint-makers__label {
    font-size: 0.875rem;
    color: var(--color-text-light, #666);
    margin: 0 0 1rem;
}

.paint-makers__list {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 1rem 2rem;
}

.paint-makers__item {
    font-size: 1rem;
    font-weight: 600;
    color: var(--color-roof-primary);
}

/* =============================================================================
   THERMAL SECTION
   ============================================================================= */
.thermal {
    background: linear-gradient(135deg, var(--color-roof-primary) 0%, var(--color-roof-secondary) 100%);
    color: #fff;
    position: relative;
    overflow: hidden;
}

.thermal__bg {
    position: absolute;
    inset: 0;
    opacity: 0.1;
    background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}

.thermal__grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    align-items: center;
}

.section__label--light {
    color: var(--color-roof-accent);
}

.section__title--light {
    color: #fff;
}

.thermal__highlight {
    display: inline-block;
    padding: 0 0.25em;
    background: rgba(230, 126, 34, 0.3);
}

.thermal__lead {
    font-size: 1rem;
    line-height: 1.9;
    opacity: 0.9;
    margin: 0 0 2rem;
}

.thermal__benefits {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.thermal__benefit {
    display: flex;
    gap: 1rem;
    padding: 1.25rem;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 12px;
    backdrop-filter: blur(8px);
}

.thermal__benefit-icon {
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 56px;
    height: 56px;
    background: rgba(255, 255, 255, 0.15);
    border-radius: 12px;
}

.thermal__benefit-content h4 {
    font-size: 1rem;
    font-weight: 700;
    margin: 0 0 0.25rem;
}

.thermal__benefit-content p {
    font-size: 0.875rem;
    opacity: 0.85;
    margin: 0;
    line-height: 1.6;
}

/* Temperature Comparison */
.thermal__comparison {
    padding: 2rem;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 16px;
    backdrop-filter: blur(8px);
}

.thermal__comparison-item {
    margin-bottom: 1.5rem;
}

.thermal__comparison-item:last-of-type {
    margin-bottom: 1rem;
}

.thermal__comparison-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 0.5rem;
}

.thermal__comparison-label {
    font-size: 0.875rem;
    font-weight: 600;
}

.thermal__comparison-temp {
    font-family: var(--font-en, 'Inter', sans-serif);
    font-size: 1.5rem;
    font-weight: 900;
}

.thermal__comparison-bar {
    height: 24px;
    border-radius: 12px;
    position: relative;
    overflow: hidden;
}

.thermal__comparison-bar--hot {
    background: linear-gradient(90deg, #fbbf24 0%, #f97316 50%, #ef4444 100%);
    width: 100%;
}

.thermal__comparison-bar--cool {
    background: linear-gradient(90deg, #22c55e 0%, #14b8a6 50%, #06b6d4 100%);
    width: 75%;
}

.thermal__comparison-caption {
    font-size: 0.8125rem;
    opacity: 0.7;
    text-align: center;
    margin: 0;
}

@media (max-width: 1024px) {
    .thermal__grid {
        grid-template-columns: 1fr;
        gap: 40px;
    }
}

/* =============================================================================
   PROCESS SECTION
   ============================================================================= */
.process__timeline {
    position: relative;
    max-width: 900px;
    margin: 0 auto;
}

.process__timeline::before {
    content: '';
    position: absolute;
    left: 40px;
    top: 0;
    bottom: 0;
    width: 2px;
    background: linear-gradient(180deg, var(--color-roof-primary) 0%, var(--color-roof-secondary) 100%);
}

.process-step {
    display: flex;
    gap: 24px;
    margin-bottom: 24px;
    position: relative;
}

.process-step:last-child {
    margin-bottom: 0;
}

.process-step__number {
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 80px;
    height: 80px;
    background: var(--color-roof-primary);
    border-radius: 50%;
    z-index: 1;
}

.process-step__number span {
    font-family: var(--font-en, 'Inter', sans-serif);
    font-size: 1.25rem;
    font-weight: 900;
    color: #fff;
}

.process-step__content {
    flex: 1;
    display: grid;
    grid-template-columns: 200px 1fr;
    gap: 24px;
    background: #fff;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
}

.process-step__image {
    height: 100%;
    min-height: 160px;
}

.process-step__image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.process-step__body {
    padding: 1.5rem 1.5rem 1.5rem 0;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.process-step__title {
    font-size: 1.125rem;
    font-weight: 700;
    margin: 0 0 0.75rem;
    color: var(--color-roof-primary);
}

.process-step__text {
    font-size: 0.9375rem;
    line-height: 1.7;
    color: var(--color-text-light, #666);
    margin: 0 0 0.75rem;
}

.process-step__duration {
    display: inline-flex;
    align-items: center;
    gap: 0.375rem;
    font-size: 0.8125rem;
    color: var(--color-text-muted, #999);
}

/* Process Note */
.process__note {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    max-width: 900px;
    margin: 3rem auto 0;
    padding: 1.5rem;
    background: var(--color-roof-light);
    border-radius: 12px;
}

.process__note svg {
    flex-shrink: 0;
    color: var(--color-roof-primary);
}

.process__note p {
    margin: 0;
    font-size: 0.9375rem;
    line-height: 1.7;
}

@media (max-width: 768px) {
    .process__timeline::before {
        left: 28px;
    }
    
    .process-step__number {
        width: 56px;
        height: 56px;
    }
    
    .process-step__number span {
        font-size: 1rem;
    }
    
    .process-step__content {
        grid-template-columns: 1fr;
    }
    
    .process-step__image {
        height: 160px;
    }
    
    .process-step__body {
        padding: 1rem;
    }
}

/* =============================================================================
   PRICE SECTION
   ============================================================================= */
.price {
    background: var(--color-roof-light);
    position: relative;
}

.price__bg {
    position: absolute;
    inset: 0;
    opacity: 0.02;
    background-image: radial-gradient(var(--color-roof-primary) 1px, transparent 1px);
    background-size: 30px 30px;
}

.price__cards {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
    align-items: stretch;
    margin-bottom: 2rem;
}

.price-card {
    position: relative;
    display: flex;
    flex-direction: column;
    background: #fff;
    border: 1px solid var(--color-border, #e2e8f0);
    border-radius: 20px;
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.price-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 16px 40px rgba(0, 0, 0, 0.1);
}

.price-card--featured {
    border: 2px solid var(--color-roof-accent);
    transform: scale(1.05);
    box-shadow: 0 16px 48px rgba(230, 126, 34, 0.2);
    z-index: 1;
}

.price-card--featured:hover {
    transform: scale(1.05) translateY(-4px);
}

.price-card__ribbon {
    position: absolute;
    top: 16px;
    right: -32px;
    width: 130px;
    padding: 8px 0;
    background: #ef4444;
    color: #fff;
    font-size: 0.75rem;
    font-weight: 700;
    text-align: center;
    transform: rotate(45deg);
    z-index: 2;
}

.price-card__header {
    padding: 1.5rem;
    background: var(--color-roof-light);
    text-align: center;
    border-bottom: 1px solid var(--color-border, #e2e8f0);
}

.price-card--featured .price-card__header {
    background: linear-gradient(135deg, #fff7ed 0%, #fed7aa 100%);
}

.price-card__grade {
    display: block;
    font-family: var(--font-en, 'Inter', sans-serif);
    font-size: 0.75rem;
    font-weight: 600;
    letter-spacing: 0.1em;
    color: var(--color-text-muted, #999);
    text-transform: uppercase;
    margin-bottom: 0.25rem;
}

.price-card__name {
    font-size: 1.375rem;
    font-weight: 700;
    margin: 0;
    color: var(--color-roof-primary);
}

.price-card__price {
    padding: 2rem 1.5rem;
    text-align: center;
    background: linear-gradient(180deg, #fff 0%, var(--color-roof-light) 100%);
}

.price-card__condition {
    display: block;
    font-size: 0.8125rem;
    color: var(--color-text-light, #666);
    margin-bottom: 0.5rem;
}

.price-card__amount {
    display: flex;
    align-items: baseline;
    justify-content: center;
    gap: 4px;
    color: var(--color-roof-primary);
    line-height: 1;
    margin-bottom: 0.5rem;
}

.price-card--featured .price-card__amount {
    color: var(--color-roof-accent);
}

.price-card__yen {
    font-size: 1.25rem;
    font-weight: 700;
}

.price-card__number {
    font-family: var(--font-en, 'Inter', sans-serif);
    font-size: 3rem;
    font-weight: 900;
}

.price-card__unit {
    font-size: 1rem;
    font-weight: 600;
}

.price-card__tax {
    font-size: 0.8125rem;
    color: var(--color-text-muted, #999);
}

.price-card__includes {
    list-style: none;
    margin: 0;
    padding: 1.5rem;
    flex: 1;
}

.price-card__includes li {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.625rem 0;
    font-size: 0.9375rem;
    border-bottom: 1px dashed var(--color-border, #e2e8f0);
}

.price-card__includes li:last-child {
    border-bottom: none;
}

.price-card__includes svg {
    flex-shrink: 0;
    color: #22c55e;
}

.price-card__footer {
    padding: 1.5rem;
    border-top: 1px solid var(--color-border, #e2e8f0);
}

.price-card__recommend {
    display: block;
    font-size: 0.8125rem;
    color: var(--color-text-light, #666);
    text-align: center;
    margin-bottom: 1rem;
}

/* Price Option */
.price__option {
    max-width: 800px;
    margin: 0 auto 2rem;
    background: #fff;
    border: 2px dashed var(--color-roof-accent);
    border-radius: 16px;
    overflow: hidden;
}

.price__option-content {
    display: flex;
    align-items: center;
    gap: 1.5rem;
    padding: 1.5rem 2rem;
}

.price__option-icon {
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 64px;
    height: 64px;
    background: linear-gradient(135deg, #fff7ed 0%, #fed7aa 100%);
    border-radius: 50%;
    color: var(--color-roof-accent);
}

.price__option-body {
    flex: 1;
}

.price__option-title {
    font-size: 1.125rem;
    font-weight: 700;
    margin: 0 0 0.25rem;
    color: var(--color-roof-primary);
}

.price__option-text {
    font-size: 0.9375rem;
    color: var(--color-text-light, #666);
    margin: 0;
}

.price__option-price {
    text-align: center;
}

.price__option-price span {
    display: block;
    font-size: 1rem;
    color: var(--color-text-muted, #999);
}

.price__option-price strong {
    font-family: var(--font-en, 'Inter', sans-serif);
    font-size: 1.75rem;
    font-weight: 900;
    color: var(--color-roof-accent);
}

.price__note {
    text-align: center;
    font-size: 0.875rem;
    color: var(--color-text-muted, #999);
}

@media (max-width: 1024px) {
    .price__cards {
        grid-template-columns: 1fr;
        max-width: 400px;
        margin-left: auto;
        margin-right: auto;
    }
    
    .price-card--featured {
        transform: none;
        order: -1;
    }
    
    .price-card--featured:hover {
        transform: translateY(-4px);
    }
    
    .price__option-content {
        flex-direction: column;
        text-align: center;
    }
}

/* =============================================================================
   WORKS SECTION
   ============================================================================= */
.works__grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
}

.works-card {
    background: #fff;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.works-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 32px rgba(0, 0, 0, 0.1);
}

.works-card__image {
    position: relative;
    height: 200px;
    overflow: hidden;
}

.works-card__image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.works-card:hover .works-card__image img {
    transform: scale(1.05);
}

.works-card__price {
    position: absolute;
    bottom: 12px;
    right: 12px;
    padding: 0.5rem 1rem;
    background: var(--color-roof-primary);
    color: #fff;
    font-size: 0.875rem;
    font-weight: 700;
    border-radius: 8px;
}

.works-card__body {
    padding: 1.25rem;
}

.works-card__title {
    font-size: 1rem;
    font-weight: 700;
    margin: 0 0 0.5rem;
    line-height: 1.4;
}

.works-card__title a {
    color: var(--color-text, #1a1a1a);
}

.works-card__title a:hover {
    color: var(--color-roof-primary);
}

.works-card__location {
    display: flex;
    align-items: center;
    gap: 0.375rem;
    font-size: 0.8125rem;
    color: var(--color-text-muted, #999);
    margin: 0 0 0.75rem;
}

.works-card__link {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.875rem;
    font-weight: 600;
    color: var(--color-roof-primary);
}

.works-card__link:hover {
    gap: 0.75rem;
}

@media (max-width: 1024px) {
    .works__grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 640px) {
    .works__grid {
        grid-template-columns: 1fr;
    }
}

/* =============================================================================
   FAQ SECTION
   ============================================================================= */
.faq {
    background: #fff;
    position: relative;
}

.faq__bg {
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, var(--color-roof-light) 0%, transparent 30%);
}

.faq__list {
    max-width: 800px;
    margin: 0 auto;
}

.faq-item {
    background: #fff;
    border: 1px solid var(--color-border, #e2e8f0);
    border-radius: 12px;
    margin-bottom: 1rem;
    overflow: hidden;
    transition: box-shadow 0.3s ease;
}

.faq-item[open] {
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
}

.faq-item__question {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1.25rem 1.5rem;
    cursor: pointer;
    list-style: none;
    transition: background 0.2s ease;
}

.faq-item__question::-webkit-details-marker {
    display: none;
}

.faq-item__question:hover {
    background: var(--color-roof-light);
}

.faq-item__q {
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
    background: var(--color-roof-primary);
    color: #fff;
    font-family: var(--font-en, 'Inter', sans-serif);
    font-size: 1rem;
    font-weight: 700;
    border-radius: 50%;
}

.faq-item__text {
    flex: 1;
    font-size: 1rem;
    font-weight: 600;
    color: var(--color-text, #1a1a1a);
}

.faq-item__toggle {
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
    color: var(--color-text-muted, #999);
    transition: transform 0.3s ease;
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
    background: var(--color-roof-accent);
    color: #fff;
    font-family: var(--font-en, 'Inter', sans-serif);
    font-size: 1rem;
    font-weight: 700;
    border-radius: 50%;
}

.faq-item__content {
    flex: 1;
    font-size: 0.9375rem;
    line-height: 1.8;
    color: var(--color-text-light, #666);
}

.faq-item__content p {
    margin: 0 0 1rem;
}

.faq-item__content p:last-child {
    margin-bottom: 0;
}

.faq-item__content ul {
    margin: 1rem 0;
    padding-left: 1.5rem;
}

.faq-item__content li {
    margin-bottom: 0.5rem;
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
    z-index: 0;
}

.cta__bg-gradient {
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, var(--color-roof-primary) 0%, #0d2744 100%);
}

.cta__bg-pattern {
    position: absolute;
    inset: 0;
    opacity: 0.08;
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

.cta__title {
    font-size: clamp(1.75rem, 4vw, 2.5rem);
    font-weight: 900;
    line-height: 1.3;
    margin: 0 0 1rem;
}

.cta__highlight {
    position: relative;
    display: inline-block;
}

.cta__highlight::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 100%;
    height: 8px;
    background: var(--color-roof-accent);
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
    border-radius: 24px;
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
    font-family: var(--font-en, 'Inter', sans-serif);
    font-size: clamp(1.75rem, 4vw, 2.5rem);
    font-weight: 900;
    color: #fff;
    letter-spacing: 0.02em;
    transition: transform 0.3s ease;
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

.cta__features {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 1rem 2rem;
    list-style: none;
    margin: 0;
    padding: 0;
}

.cta__features li {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.9375rem;
}

.cta__features svg {
    color: #22c55e;
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
        border-radius: 9999px;
    }
    
    .cta__buttons {
        width: 100%;
        min-width: auto;
    }
}

/* =============================================================================
   RELATED SERVICES
   ============================================================================= */
.related {
    background: var(--color-roof-light);
}

.related__grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
}

.related-card {
    display: flex;
    flex-direction: column;
    background: #fff;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.related-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 32px rgba(0, 0, 0, 0.1);
}

.related-card__image {
    height: 160px;
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
    flex: 1;
    display: flex;
    flex-direction: column;
}

.related-card__title {
    font-size: 1.125rem;
    font-weight: 700;
    margin: 0 0 0.5rem;
    color: var(--color-roof-primary);
}

.related-card__text {
    font-size: 0.875rem;
    color: var(--color-text-light, #666);
    line-height: 1.6;
    margin: 0 0 1rem;
    flex: 1;
}

.related-card__link {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.875rem;
    font-weight: 600;
    color: var(--color-roof-primary);
}

.related-card:hover .related-card__link {
    gap: 0.75rem;
}

/* All Services Card */
.related-card--all {
    background: linear-gradient(135deg, var(--color-roof-primary) 0%, var(--color-roof-secondary) 100%);
    color: #fff;
    justify-content: center;
}

.related-card__all-content {
    text-align: center;
    padding: 2rem;
}

.related-card__all-icon {
    margin-bottom: 1rem;
    opacity: 0.9;
}

.related-card--all .related-card__title {
    color: #fff;
}

.related-card--all .related-card__link {
    color: rgba(255, 255, 255, 0.9);
}

@media (max-width: 1024px) {
    .related__grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .related-card--all {
        grid-column: 1 / -1;
    }
}

@media (max-width: 640px) {
    .related__grid {
        grid-template-columns: 1fr;
    }
}

/* =============================================================================
   BUTTON STYLES
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
    border-radius: 9999px;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
}

.btn:hover {
    transform: translateY(-2px);
}

.btn--primary {
    background: var(--color-roof-primary);
    color: #fff;
}

.btn--primary:hover {
    background: #152d48;
    box-shadow: 0 8px 24px rgba(30, 58, 95, 0.3);
}

.btn--accent {
    background: var(--color-roof-accent);
    color: #fff;
}

.btn--accent:hover {
    background: #d35400;
    box-shadow: 0 8px 24px rgba(230, 126, 34, 0.3);
}

.btn--outline {
    background: transparent;
    border-color: var(--color-roof-primary);
    color: var(--color-roof-primary);
}

.btn--outline:hover {
    background: var(--color-roof-primary);
    color: #fff;
}

.btn--line {
    background: #06c755;
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
   SECTION COMMON STYLES
   ============================================================================= */
.section {
    padding: 100px 0;
    position: relative;
}

@media (max-width: 768px) {
    .section {
        padding: 60px 0;
    }
}

.section__header {
    margin-bottom: 3rem;
}

.section__header--center {
    text-align: center;
}

.section__header--center .section__lead {
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}

.section__label {
    display: inline-block;
    font-family: var(--font-en, 'Inter', sans-serif);
    font-size: 0.875rem;
    font-weight: 600;
    letter-spacing: 0.15em;
    color: var(--color-roof-primary);
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
    color: var(--color-text-light, #666);
    margin: 0;
    line-height: 1.8;
}

.section__header-left {
    display: inline-block;
}

.section__header-link {
    display: inline-flex;
    align-items: center;
    gap: 0.5em;
    font-weight: 600;
    color: var(--color-roof-primary);
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
    background: rgba(30, 58, 95, 0.15);
    z-index: -1;
}

.marker--warning::after {
    background: rgba(239, 68, 68, 0.2);
}

.marker--accent::after {
    background: rgba(230, 126, 34, 0.25);
}

/* =============================================================================
   UTILITY CLASSES
   ============================================================================= */
.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.pc-only {
    display: inline;
}

.sp-only {
    display: none;
}

@media (max-width: 768px) {
    .pc-only {
        display: none;
    }
    
    .sp-only {
        display: inline;
    }
}

/* =============================================================================
   PRINT STYLES
   ============================================================================= */
@media print {
    .page-hero,
    .cta,
    .related {
        display: none;
    }
    
    .section {
        padding: 40px 0;
        page-break-inside: avoid;
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
    outline: 3px solid var(--color-roof-primary);
    outline-offset: 2px;
}

.btn:focus-visible {
    outline: 3px solid var(--color-roof-accent);
    outline-offset: 2px;
}
</style>

<?php get_footer(); ?>
