<?php
/**
 * Template Name: サービス詳細ページ
 * Description: サービス（外壁塗装・屋根塗装など）の詳細ページ用テンプレート
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

// ページ情報取得
$post_id = get_the_ID();
$service_type = get_post_field('post_name', $post_id); // スラッグ取得

// メタデータ取得
$price_from = get_post_meta($post_id, '_service_price_from', true);
$price_unit = get_post_meta($post_id, '_service_price_unit', true);
$duration = get_post_meta($post_id, '_service_duration', true);
$features = get_post_meta($post_id, '_service_features', true);
$recommended = get_post_meta($post_id, '_service_recommended', true);

// 会社情報
$company_name = sato_get_company_name();
$phone = sato_get_phone();
$phone_link = sato_get_phone_link();
$line_url = sato_get_line_url();
$warranty_years = sato_get_warranty_years();

// 屋根塗装用のデフォルトデータ
$roof_data = [
    'hero_title' => '屋根塗装',
    'hero_subtitle' => '大切な住まいを守る屋根塗装',
    'hero_description' => '屋根は建物を風雨や紫外線から守る重要な部分です。定期的なメンテナンスで、住まいの寿命を延ばしましょう。',
    'hero_image' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?auto=format&fit=crop&q=80&w=1920',
    
    'problems' => [
        [
            'icon' => '🏚️',
            'title' => '色あせ・変色',
            'description' => '紫外線による塗膜の劣化で、屋根本来の色が失われています。'
        ],
        [
            'icon' => '🌿',
            'title' => 'コケ・カビの発生',
            'description' => '湿気がこもりやすくなり、コケやカビが繁殖しています。'
        ],
        [
            'icon' => '💧',
            'title' => '雨漏りの心配',
            'description' => '塗膜が剥がれ、防水機能が低下。雨漏りのリスクが高まっています。'
        ],
        [
            'icon' => '🔨',
            'title' => 'ひび割れ・欠け',
            'description' => '屋根材にひび割れや欠けが生じ、下地への浸水が懸念されます。'
        ],
    ],
    
    'benefits' => [
        [
            'icon' => 'shield-check',
            'title' => '防水性能の回復',
            'description' => '高品質塗料で屋根の防水機能を回復。雨漏りを未然に防ぎます。'
        ],
        [
            'icon' => 'home',
            'title' => '断熱・遮熱効果',
            'description' => '遮熱塗料を使用することで、夏場の室内温度上昇を抑制します。'
        ],
        [
            'icon' => 'award',
            'title' => '美観の向上',
            'description' => '新築時のような美しい外観を取り戻し、資産価値を維持します。'
        ],
        [
            'icon' => 'tool',
            'title' => '屋根材の保護',
            'description' => '塗膜が屋根材を保護し、劣化の進行を遅らせます。'
        ],
    ],
    
    'process' => [
        [
            'step' => '01',
            'title' => '足場設置・養生',
            'description' => '安全な作業のため、しっかりとした足場を設置。周辺への飛散防止養生も行います。',
            'duration' => '1日'
        ],
        [
            'step' => '02',
            'title' => '高圧洗浄',
            'description' => '150kg/cm²の高圧洗浄機で、コケ・カビ・汚れを徹底的に除去します。',
            'duration' => '1日'
        ],
        [
            'step' => '03',
            'title' => '下地処理・補修',
            'description' => 'ひび割れ補修、棟板金の釘打ち直し、錆止め処理などを行います。',
            'duration' => '1〜2日'
        ],
        [
            'step' => '04',
            'title' => '下塗り',
            'description' => '屋根材と上塗り塗料の密着性を高めるシーラーを塗布します。',
            'duration' => '1日'
        ],
        [
            'step' => '05',
            'title' => '中塗り',
            'description' => '塗膜の厚みを確保し、耐久性を高めるための中塗りを行います。',
            'duration' => '1日'
        ],
        [
            'step' => '06',
            'title' => '上塗り',
            'description' => '仕上げの上塗りで、美しい外観と防水性能を実現します。',
            'duration' => '1日'
        ],
        [
            'step' => '07',
            'title' => '縁切り・タスペーサー',
            'description' => 'スレート屋根の場合、雨水の排水経路を確保する縁切り作業を行います。',
            'duration' => '1日'
        ],
        [
            'step' => '08',
            'title' => '完了検査・足場解体',
            'description' => '仕上がりを丁寧に確認。問題がなければ足場を解体し、清掃して完了です。',
            'duration' => '1日'
        ],
    ],
    
    'paint_types' => [
        [
            'name' => 'シリコン塗料',
            'grade' => 'スタンダード',
            'durability' => '8〜10年',
            'price' => '25万円〜',
            'features' => ['コストパフォーマンス重視', '十分な耐久性', '豊富なカラー'],
            'recommended' => false
        ],
        [
            'name' => 'ラジカル制御型塗料',
            'grade' => 'ハイグレード',
            'durability' => '12〜15年',
            'price' => '35万円〜',
            'features' => ['長期耐久性', '色あせに強い', '当店一番人気'],
            'recommended' => true
        ],
        [
            'name' => 'フッ素塗料',
            'grade' => 'プレミアム',
            'durability' => '15〜20年',
            'price' => '45万円〜',
            'features' => ['最高級グレード', '超長期耐久', 'メンテナンス回数削減'],
            'recommended' => false
        ],
        [
            'name' => '遮熱塗料',
            'grade' => '機能性塗料',
            'durability' => '10〜15年',
            'price' => '40万円〜',
            'features' => ['夏場の室温低下', '光熱費削減', 'エコ住宅に最適'],
            'recommended' => false
        ],
    ],
    
    'faqs' => [
        [
            'question' => '屋根塗装の目安時期は？',
            'answer' => '一般的に築10〜15年が塗り替えの目安です。ただし、色あせやコケ・カビの発生、塗膜の剥がれなどが見られる場合は、早めのメンテナンスをおすすめします。'
        ],
        [
            'question' => '雨の日も作業できますか？',
            'answer' => '塗装作業は雨天時には行えません。天候を見ながらスケジュールを調整いたします。そのため、工期が延びる可能性もありますが、品質を最優先に作業いたします。'
        ],
        [
            'question' => '屋根材の種類によって塗料は変わりますか？',
            'answer' => 'はい、屋根材（スレート、セメント瓦、金属屋根など）によって最適な下塗り材や塗料が異なります。現地調査で屋根材を確認し、最適なプランをご提案します。'
        ],
        [
            'question' => '足場代はいくらかかりますか？',
            'answer' => '足場代は建物の大きさにより変動しますが、一般的な戸建住宅で15〜20万円程度です。当店の見積もりには足場代も含まれていますのでご安心ください。'
        ],
        [
            'question' => '外壁塗装と同時にできますか？',
            'answer' => 'はい、外壁塗装と屋根塗装を同時に行うことで、足場代が1回分で済むため、トータルコストを抑えられます。多くのお客様が同時施工を選ばれています。'
        ],
    ],
];
?>

<!-- 構造化データ -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Service",
    "name": "屋根塗装",
    "description": "<?php echo esc_js($roof_data['hero_description']); ?>",
    "provider": {
        "@type": "LocalBusiness",
        "name": "<?php echo esc_js(sato_get_company_name(true)); ?>",
        "telephone": "<?php echo esc_js($phone); ?>"
    },
    "areaServed": <?php echo json_encode(sato_get_service_areas()); ?>,
    "hasOfferCatalog": {
        "@type": "OfferCatalog",
        "name": "屋根塗装プラン",
        "itemListElement": [
            <?php 
            $offers = [];
            foreach ($roof_data['paint_types'] as $paint) {
                $offers[] = '{
                    "@type": "Offer",
                    "itemOffered": {
                        "@type": "Service",
                        "name": "' . esc_js($paint['name']) . '"
                    },
                    "priceSpecification": {
                        "@type": "PriceSpecification",
                        "price": "' . esc_js($paint['price']) . '",
                        "priceCurrency": "JPY"
                    }
                }';
            }
            echo implode(',', $offers);
            ?>
        ]
    }
}
</script>

<main id="main" class="service-page service-page--roof" role="main">

    <!-- =========================================================================
         HERO SECTION
         ========================================================================= -->
    <section class="service-hero" aria-label="屋根塗装メインビジュアル">
        <div class="service-hero__bg">
            <div class="service-hero__bg-image" style="background-image: url('<?php echo esc_url($roof_data['hero_image']); ?>');"></div>
            <div class="service-hero__bg-overlay"></div>
        </div>
        
        <div class="container">
            <div class="service-hero__content">
                <!-- パンくずリスト -->
                <nav class="breadcrumb breadcrumb--light" aria-label="パンくずリスト">
                    <ol class="breadcrumb__list">
                        <li class="breadcrumb__item">
                            <a href="<?php echo home_url('/'); ?>" class="breadcrumb__link">ホーム</a>
                            <span class="breadcrumb__separator"><?php sato_icon('chevron-right', 14); ?></span>
                        </li>
                        <li class="breadcrumb__item">
                            <a href="<?php echo home_url('/service/'); ?>" class="breadcrumb__link">サービス</a>
                            <span class="breadcrumb__separator"><?php sato_icon('chevron-right', 14); ?></span>
                        </li>
                        <li class="breadcrumb__item">
                            <span class="breadcrumb__current" aria-current="page">屋根塗装</span>
                        </li>
                    </ol>
                </nav>

                <span class="service-hero__label">SERVICE</span>
                <h1 class="service-hero__title"><?php echo esc_html($roof_data['hero_title']); ?></h1>
                <p class="service-hero__subtitle"><?php echo esc_html($roof_data['hero_subtitle']); ?></p>
                <p class="service-hero__description"><?php echo esc_html($roof_data['hero_description']); ?></p>
                
                <div class="service-hero__cta">
                    <a href="<?php echo home_url('/contact/'); ?>" class="btn btn--primary btn--xl btn--glow">
                        <?php sato_icon('mail', 20); ?>
                        無料見積りを依頼する
                        <?php sato_icon('arrow-right', 18); ?>
                    </a>
                    <a href="<?php echo esc_url($phone_link); ?>" class="btn btn--outline-light btn--lg">
                        <?php sato_icon('phone', 20); ?>
                        <?php echo esc_html($phone); ?>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- 波形区切り -->
        <div class="service-hero__wave">
            <svg viewBox="0 0 1440 120" preserveAspectRatio="none">
                <path d="M0,64 C288,120 576,0 864,64 C1152,128 1296,32 1440,64 L1440,120 L0,120 Z" fill="#ffffff"/>
            </svg>
        </div>
    </section>

    <!-- =========================================================================
         PROBLEM SECTION - こんなお悩みありませんか？
         ========================================================================= -->
    <section class="section service-problem" aria-labelledby="problem-heading">
        <div class="container">
            <header class="section__header section__header--center">
                <span class="section__label">TROUBLE</span>
                <h2 class="section__title" id="problem-heading">
                    屋根の<span class="marker marker--warning">こんな症状</span>ありませんか？
                </h2>
                <p class="section__lead">
                    以下の症状が見られる場合、屋根塗装のサインです。<br>
                    放置すると雨漏りや構造劣化の原因になります。
                </p>
            </header>

            <div class="problem-grid">
                <?php foreach ($roof_data['problems'] as $index => $problem) : ?>
                <div class="problem-card" style="--delay: <?php echo $index * 0.1; ?>s">
                    <div class="problem-card__icon"><?php echo $problem['icon']; ?></div>
                    <h3 class="problem-card__title"><?php echo esc_html($problem['title']); ?></h3>
                    <p class="problem-card__text"><?php echo esc_html($problem['description']); ?></p>
                </div>
                <?php endforeach; ?>
            </div>

            <div class="service-problem__alert">
                <div class="alert alert--warning">
                    <div class="alert__icon"><?php sato_icon('alert-circle', 24); ?></div>
                    <div class="alert__content">
                        <strong>屋根の劣化を放置すると...</strong>
                        <p>雨水が屋根材の下に侵入し、下地の腐食や雨漏りの原因に。修繕費用が<strong class="text-danger">2〜3倍</strong>になることも。早めの対策が大切です。</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- =========================================================================
         BENEFIT SECTION - 屋根塗装のメリット
         ========================================================================= -->
    <section class="section service-benefit" aria-labelledby="benefit-heading">
        <div class="service-benefit__bg"></div>
        
        <div class="container">
            <header class="section__header section__header--center">
                <span class="section__label">BENEFIT</span>
                <h2 class="section__title" id="benefit-heading">
                    屋根塗装の<span class="marker marker--primary">4つのメリット</span>
                </h2>
            </header>

            <div class="benefit-grid">
                <?php foreach ($roof_data['benefits'] as $index => $benefit) : ?>
                <div class="benefit-card" style="--delay: <?php echo $index * 0.1; ?>s">
                    <div class="benefit-card__icon">
                        <?php sato_icon($benefit['icon'], 40); ?>
                    </div>
                    <h3 class="benefit-card__title"><?php echo esc_html($benefit['title']); ?></h3>
                    <p class="benefit-card__text"><?php echo esc_html($benefit['description']); ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- =========================================================================
         PROCESS SECTION - 施工の流れ
         ========================================================================= -->
    <section class="section service-process" aria-labelledby="process-heading">
        <div class="container">
            <header class="section__header section__header--center">
                <span class="section__label">PROCESS</span>
                <h2 class="section__title" id="process-heading">
                    屋根塗装の<span class="marker marker--accent">施工工程</span>
                </h2>
                <p class="section__lead">
                    一般的な戸建住宅の屋根塗装は、<strong>約7〜10日</strong>で完了します。<br>
                    各工程を丁寧に行い、長持ちする仕上がりを実現します。
                </p>
            </header>

            <div class="process-timeline">
                <?php foreach ($roof_data['process'] as $index => $step) : ?>
                <div class="process-step" style="--delay: <?php echo $index * 0.05; ?>s">
                    <div class="process-step__number"><?php echo $step['step']; ?></div>
                    <div class="process-step__content">
                        <div class="process-step__header">
                            <h3 class="process-step__title"><?php echo esc_html($step['title']); ?></h3>
                            <span class="process-step__duration"><?php echo esc_html($step['duration']); ?></span>
                        </div>
                        <p class="process-step__text"><?php echo esc_html($step['description']); ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- =========================================================================
         PAINT TYPES SECTION - 塗料プラン
         ========================================================================= -->
    <section class="section service-paint" aria-labelledby="paint-heading">
        <div class="service-paint__bg"></div>
        
        <div class="container">
            <header class="section__header section__header--center">
                <span class="section__label">PAINT</span>
                <h2 class="section__title" id="paint-heading">
                    屋根塗装の<span class="marker marker--primary">塗料プラン</span>
                </h2>
                <p class="section__lead">
                    お客様のご予算と耐久性のご希望に合わせて、<br>
                    最適な塗料をご提案いたします。
                </p>
            </header>

            <div class="paint-grid">
                <?php foreach ($roof_data['paint_types'] as $index => $paint) : ?>
                <div class="paint-card <?php echo $paint['recommended'] ? 'paint-card--recommended' : ''; ?>" style="--delay: <?php echo $index * 0.1; ?>s">
                    <?php if ($paint['recommended']) : ?>
                    <span class="paint-card__ribbon">人気No.1</span>
                    <?php endif; ?>
                    
                    <div class="paint-card__header">
                        <span class="paint-card__grade"><?php echo esc_html($paint['grade']); ?></span>
                        <h3 class="paint-card__name"><?php echo esc_html($paint['name']); ?></h3>
                    </div>
                    
                    <div class="paint-card__body">
                        <div class="paint-card__price">
                            <span class="paint-card__price-label">参考価格</span>
                            <span class="paint-card__price-value"><?php echo esc_html($paint['price']); ?></span>
                            <span class="paint-card__price-note">※30坪程度の屋根の場合</span>
                        </div>
                        
                        <div class="paint-card__durability">
                            <span class="paint-card__durability-label">耐久年数</span>
                            <span class="paint-card__durability-value"><?php echo esc_html($paint['durability']); ?></span>
                        </div>
                        
                        <ul class="paint-card__features">
                            <?php foreach ($paint['features'] as $feature) : ?>
                            <li><?php sato_icon('check', 16); ?> <?php echo esc_html($feature); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    
                    <div class="paint-card__footer">
                        <a href="<?php echo home_url('/contact/'); ?>" class="btn <?php echo $paint['recommended'] ? 'btn--primary' : 'btn--outline'; ?> btn--block">
                            このプランで見積もり
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <p class="service-paint__note">
                ※価格は目安です。屋根の面積・形状・劣化状況により変動します。正確な金額は無料現地調査にてご案内いたします。
            </p>
        </div>
    </section>

    <!-- =========================================================================
         WORKS SECTION - 屋根塗装の施工事例
         ========================================================================= -->
    <section class="section service-works" aria-labelledby="works-heading">
        <div class="container">
            <header class="section__header section__header--center">
                <span class="section__label">WORKS</span>
                <h2 class="section__title" id="works-heading">
                    屋根塗装の<span class="marker marker--accent">施工事例</span>
                </h2>
            </header>

            <div class="works-grid">
                <?php
                // 屋根塗装カテゴリの施工実績を取得
                $works_query = new WP_Query([
                    'post_type' => 'works',
                    'posts_per_page' => 3,
                    'tax_query' => [
                        [
                            'taxonomy' => 'works_category',
                            'field' => 'slug',
                            'terms' => 'roof',
                        ],
                    ],
                ]);
                
                if ($works_query->have_posts()) :
                    while ($works_query->have_posts()) : $works_query->the_post();
                        $before_id = get_post_meta(get_the_ID(), '_works_before_image', true);
                        $after_id = get_post_meta(get_the_ID(), '_works_after_image', true);
                        $client_name = get_post_meta(get_the_ID(), '_works_client_name', true);
                        $work_cost = get_post_meta(get_the_ID(), '_works_cost', true);
                        
                        $before_url = $before_id ? wp_get_attachment_image_url($before_id, 'works-large') : '';
                        $after_url = $after_id ? wp_get_attachment_image_url($after_id, 'works-large') : (has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'works-large') : '');
                ?>
                <article class="works-card">
                    <?php if ($before_url && $after_url) : ?>
                    <div class="ba-slider">
                        <div class="ba-slider__after">
                            <img src="<?php echo esc_url($after_url); ?>" alt="施工後" loading="lazy">
                            <span class="ba-slider__label ba-slider__label--after">After</span>
                        </div>
                        <div class="ba-slider__before">
                            <img src="<?php echo esc_url($before_url); ?>" alt="施工前" loading="lazy">
                            <span class="ba-slider__label ba-slider__label--before">Before</span>
                        </div>
                        <input type="range" class="ba-slider__range" min="0" max="100" value="50" aria-label="比較スライダー">
                        <div class="ba-slider__handle">
                            <span class="ba-slider__handle-icon">
                                <?php sato_icon('chevron-left', 16); ?>
                                <?php sato_icon('chevron-right', 16); ?>
                            </span>
                        </div>
                    </div>
                    <?php elseif (has_post_thumbnail()) : ?>
                    <div class="works-card__image">
                        <?php the_post_thumbnail('works-large'); ?>
                    </div>
                    <?php endif; ?>
                    
                    <div class="works-card__body">
                        <h3 class="works-card__title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        <?php if ($client_name || $work_cost) : ?>
                        <dl class="works-card__meta">
                            <?php if ($client_name) : ?>
                            <div class="works-card__meta-item">
                                <dt><?php sato_icon('map-pin', 14); ?></dt>
                                <dd><?php echo esc_html($client_name); ?></dd>
                            </div>
                            <?php endif; ?>
                            <?php if ($work_cost) : ?>
                            <div class="works-card__meta-item">
                                <dt><?php sato_icon('tool', 14); ?></dt>
                                <dd><?php echo esc_html($work_cost); ?></dd>
                            </div>
                            <?php endif; ?>
                        </dl>
                        <?php endif; ?>
                        <a href="<?php the_permalink(); ?>" class="works-card__link">
                            詳しく見る <?php sato_icon('arrow-right', 16); ?>
                        </a>
                    </div>
                </article>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                ?>
                <p class="works-empty">屋根塗装の施工事例を準備中です。</p>
                <?php endif; ?>
            </div>

            <div class="section__footer">
                <a href="<?php echo home_url('/works/?category=roof'); ?>" class="btn btn--outline btn--lg">
                    屋根塗装の施工事例をもっと見る
                    <?php sato_icon('arrow-right', 18); ?>
                </a>
            </div>
        </div>
    </section>

    <!-- =========================================================================
         FAQ SECTION - よくある質問
         ========================================================================= -->
    <section class="section service-faq" aria-labelledby="faq-heading">
        <div class="service-faq__bg"></div>
        
        <div class="container">
            <header class="section__header section__header--center">
                <span class="section__label">FAQ</span>
                <h2 class="section__title" id="faq-heading">
                    屋根塗装の<span class="marker marker--primary">よくある質問</span>
                </h2>
            </header>

            <div class="faq-list">
                <?php foreach ($roof_data['faqs'] as $index => $faq) : ?>
                <details class="faq-item" style="--delay: <?php echo $index * 0.05; ?>s">
                    <summary class="faq-item__question">
                        <span class="faq-item__q">Q</span>
                        <span class="faq-item__text"><?php echo esc_html($faq['question']); ?></span>
                        <span class="faq-item__toggle"><?php sato_icon('chevron-down', 20); ?></span>
                    </summary>
                    <div class="faq-item__answer">
                        <span class="faq-item__a">A</span>
                        <div class="faq-item__content">
                            <p><?php echo esc_html($faq['answer']); ?></p>
                        </div>
                    </div>
                </details>
                <?php endforeach; ?>
            </div>

            <div class="section__footer">
                <a href="<?php echo home_url('/faq/'); ?>" class="btn btn--outline btn--lg">
                    すべてのFAQを見る
                    <?php sato_icon('arrow-right', 18); ?>
                </a>
            </div>
        </div>
    </section>

    <!-- =========================================================================
         CTA SECTION - お問い合わせ
         ========================================================================= -->
    <section class="cta cta--service" aria-labelledby="cta-heading">
        <div class="cta__bg">
            <div class="cta__bg-gradient"></div>
            <div class="cta__bg-pattern"></div>
        </div>
        
        <div class="container">
            <div class="cta__content">
                <header class="cta__header">
                    <h2 class="cta__title" id="cta-heading">
                        屋根塗装のご相談は<br>
                        <span class="cta__title-highlight"><?php echo esc_html($company_name); ?></span>へ
                    </h2>
                    <p class="cta__lead">
                        国家資格「一級塗装技能士」が責任を持って施工。<br>
                        最長<?php echo esc_html($warranty_years); ?>年保証で施工後も安心です。
                    </p>
                </header>

                <div class="cta__actions">
                    <div class="cta__phone">
                        <span class="cta__phone-label">お電話でのご相談</span>
                        <a href="<?php echo esc_attr($phone_link); ?>" class="cta__phone-number">
                            <?php sato_icon('phone', 28); ?>
                            <span><?php echo esc_html($phone); ?></span>
                        </a>
                        <span class="cta__phone-hours">
                            受付 <?php echo esc_html(get_theme_mod('sato_business_hours', '8:00〜18:00')); ?>
                        </span>
                    </div>

                    <div class="cta__divider"><span>または</span></div>

                    <div class="cta__buttons">
                        <a href="<?php echo home_url('/contact/'); ?>" class="btn btn--accent btn--xl btn--block btn--glow">
                            <?php sato_icon('mail', 22); ?>
                            無料見積り・診断を依頼
                            <?php sato_icon('arrow-right', 20); ?>
                        </a>
                        
                        <?php if ($line_url) : ?>
                        <a href="<?php echo esc_url($line_url); ?>" class="btn btn--line btn--lg btn--block" target="_blank" rel="noopener noreferrer">
                            LINEで気軽に相談
                        </a>
                        <?php endif; ?>
                    </div>
                </div>

                <ul class="cta__assurance">
                    <li><?php sato_icon('check-circle', 18); ?> 見積り無料</li>
                    <li><?php sato_icon('check-circle', 18); ?> 現地調査無料</li>
                    <li><?php sato_icon('check-circle', 18); ?> 最長<?php echo esc_html($warranty_years); ?>年保証</li>
                    <li><?php sato_icon('check-circle', 18); ?> しつこい営業なし</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- =========================================================================
         RELATED SERVICES - 関連サービス
         ========================================================================= -->
    <section class="section service-related" aria-labelledby="related-heading">
        <div class="container">
            <header class="section__header section__header--center">
                <span class="section__label">RELATED</span>
                <h2 class="section__title" id="related-heading">
                    関連サービス
                </h2>
            </header>

            <div class="related-grid">
                <a href="<?php echo home_url('/service/exterior/'); ?>" class="related-card">
                    <div class="related-card__icon"><?php sato_icon('wall', 40); ?></div>
                    <h3 class="related-card__title">外壁塗装</h3>
                    <p class="related-card__text">外壁の塗り替えで建物を保護</p>
                    <span class="related-card__link">詳しく見る <?php sato_icon('arrow-right', 16); ?></span>
                </a>
                
                <a href="<?php echo home_url('/service/waterproof/'); ?>" class="related-card">
                    <div class="related-card__icon"><?php sato_icon('waterproof', 40); ?></div>
                    <h3 class="related-card__title">防水工事</h3>
                    <p class="related-card__text">ベランダ・屋上の防水対策</p>
                    <span class="related-card__link">詳しく見る <?php sato_icon('arrow-right', 16); ?></span>
                </a>
                
                <a href="<?php echo home_url('/service/'); ?>" class="related-card">
                    <div class="related-card__icon"><?php sato_icon('tool', 40); ?></div>
                    <h3 class="related-card__title">その他サービス</h3>
                    <p class="related-card__text">シーリング・補修工事など</p>
                    <span class="related-card__link">サービス一覧 <?php sato_icon('arrow-right', 16); ?></span>
                </a>
            </div>
        </div>
    </section>

</main>

<!-- =============================================================================
     STYLES
     ============================================================================= -->
<style>
/* サービスページ共通スタイル */
.service-page {
    overflow: hidden;
}

/* ヒーローセクション */
.service-hero {
    position: relative;
    padding: 160px 0 120px;
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
    background: linear-gradient(135deg, rgba(13, 71, 161, 0.9) 0%, rgba(0, 45, 114, 0.85) 100%);
}

.service-hero__content {
    position: relative;
    z-index: 1;
    max-width: 800px;
}

.service-hero__label {
    display: inline-block;
    font-family: 'Inter', sans-serif;
    font-size: 0.875rem;
    font-weight: 600;
    letter-spacing: 0.2em;
    color: rgba(255,255,255,0.8);
    margin-bottom: 1rem;
}

.service-hero__title {
    font-size: clamp(2.5rem, 6vw, 4rem);
    font-weight: 900;
    line-height: 1.2;
    margin: 0 0 1rem;
}

.service-hero__subtitle {
    font-size: clamp(1.25rem, 3vw, 1.75rem);
    font-weight: 700;
    margin: 0 0 1rem;
    opacity: 0.95;
}

.service-hero__description {
    font-size: 1rem;
    line-height: 1.8;
    margin: 0 0 2rem;
    opacity: 0.9;
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
    height: 80px;
}

/* パンくず（ライト版） */
.breadcrumb--light {
    margin-bottom: 2rem;
}

.breadcrumb--light .breadcrumb__list {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
    list-style: none;
    margin: 0;
    padding: 0;
}

.breadcrumb--light .breadcrumb__item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.875rem;
}

.breadcrumb--light .breadcrumb__link {
    color: rgba(255,255,255,0.7);
}

.breadcrumb--light .breadcrumb__link:hover {
    color: #fff;
}

.breadcrumb--light .breadcrumb__separator {
    color: rgba(255,255,255,0.4);
}

.breadcrumb--light .breadcrumb__current {
    color: #fff;
}

/* ボタン（ライト版） */
.btn--outline-light {
    background: transparent;
    border: 2px solid rgba(255,255,255,0.8);
    color: #fff;
}

.btn--outline-light:hover {
    background: rgba(255,255,255,0.1);
    border-color: #fff;
}

/* 問題セクション */
.problem-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 24px;
    margin-bottom: 3rem;
}

.problem-card {
    background: #fff;
    padding: 2rem 1.5rem;
    border-radius: 16px;
    text-align: center;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.problem-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 40px rgba(0,0,0,0.12);
}

.problem-card__icon {
    font-size: 3rem;
    margin-bottom: 1rem;
}

.problem-card__title {
    font-size: 1.125rem;
    font-weight: 700;
    margin: 0 0 0.75rem;
    color: #1a1a1a;
}

.problem-card__text {
    font-size: 0.875rem;
    color: #666;
    margin: 0;
    line-height: 1.7;
}

/* アラート */
.alert {
    display: flex;
    gap: 1rem;
    padding: 1.5rem;
    border-radius: 12px;
}

.alert--warning {
    background: #fef3c7;
    border-left: 4px solid #f59e0b;
}

.alert__icon {
    flex-shrink: 0;
    color: #f59e0b;
}

.alert__content strong {
    display: block;
    margin-bottom: 0.5rem;
    color: #92400e;
}

.alert__content p {
    margin: 0;
    font-size: 0.9375rem;
    color: #78350f;
}

/* メリットセクション */
.service-benefit {
    background: #f8fafc;
    position: relative;
}

.benefit-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 24px;
}

.benefit-card {
    background: #fff;
    padding: 2rem;
    border-radius: 16px;
    text-align: center;
    box-shadow: 0 4px 20px rgba(0,0,0,0.06);
    transition: transform 0.3s ease;
}

.benefit-card:hover {
    transform: translateY(-4px);
}

.benefit-card__icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 80px;
    height: 80px;
    margin: 0 auto 1.5rem;
    background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
    border-radius: 50%;
    color: #0d47a1;
}

.benefit-card__title {
    font-size: 1.125rem;
    font-weight: 700;
    margin: 0 0 0.75rem;
    color: #1a1a1a;
}

.benefit-card__text {
    font-size: 0.9375rem;
    color: #666;
    margin: 0;
    line-height: 1.7;
}

/* 施工工程タイムライン */
.process-timeline {
    max-width: 800px;
    margin: 0 auto;
}

.process-step {
    display: flex;
    gap: 24px;
    padding: 1.5rem 0;
    border-bottom: 1px dashed #e2e8f0;
    position: relative;
}

.process-step:last-child {
    border-bottom: none;
}

.process-step::before {
    content: '';
    position: absolute;
    left: 30px;
    top: 100%;
    width: 2px;
    height: 100%;
    background: linear-gradient(180deg, #0d47a1 0%, transparent 100%);
}

.process-step:last-child::before {
    display: none;
}

.process-step__number {
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 60px;
    height: 60px;
    background: #0d47a1;
    color: #fff;
    font-family: 'Inter', sans-serif;
    font-size: 1.25rem;
    font-weight: 900;
    border-radius: 50%;
    position: relative;
    z-index: 1;
}

.process-step__content {
    flex: 1;
    padding-top: 0.5rem;
}

.process-step__header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 0.5rem;
}

.process-step__title {
    font-size: 1.125rem;
    font-weight: 700;
    margin: 0;
    color: #1a1a1a;
}

.process-step__duration {
    font-size: 0.8125rem;
    color: #0d47a1;
    background: #eff6ff;
    padding: 0.25rem 0.75rem;
    border-radius: 9999px;
}

.process-step__text {
    font-size: 0.9375rem;
    color: #666;
    margin: 0;
    line-height: 1.7;
}

/* 塗料プラン */
.service-paint {
    background: #f8fafc;
    position: relative;
}

.paint-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    align-items: stretch;
}

.paint-card {
    position: relative;
    background: #fff;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0,0,0,0.06);
    display: flex;
    flex-direction: column;
    transition: transform 0.3s ease;
}

.paint-card:hover {
    transform: translateY(-4px);
}

.paint-card--recommended {
    border: 2px solid #f59e0b;
    box-shadow: 0 8px 30px rgba(245, 158, 11, 0.2);
}

.paint-card__ribbon {
    position: absolute;
    top: 12px;
    right: -28px;
    width: 100px;
    padding: 4px 0;
    background: #ef4444;
    color: #fff;
    font-size: 0.6875rem;
    font-weight: 700;
    text-align: center;
    transform: rotate(45deg);
    z-index: 2;
}

.paint-card__header {
    padding: 1.25rem;
    background: #f8fafc;
    text-align: center;
    border-bottom: 1px solid #e2e8f0;
}

.paint-card--recommended .paint-card__header {
    background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 100%);
}

.paint-card__grade {
    display: block;
    font-size: 0.75rem;
    color: #666;
    margin-bottom: 0.25rem;
}

.paint-card__name {
    font-size: 1.125rem;
    font-weight: 700;
    margin: 0;
    color: #1a1a1a;
}

.paint-card__body {
    padding: 1.25rem;
    flex: 1;
}

.paint-card__price {
    text-align: center;
    padding-bottom: 1rem;
    border-bottom: 1px dashed #e2e8f0;
    margin-bottom: 1rem;
}

.paint-card__price-label {
    display: block;
    font-size: 0.75rem;
    color: #666;
}

.paint-card__price-value {
    display: block;
    font-size: 1.5rem;
    font-weight: 900;
    color: #0d47a1;
}

.paint-card--recommended .paint-card__price-value {
    color: #f59e0b;
}

.paint-card__price-note {
    display: block;
    font-size: 0.6875rem;
    color: #999;
}

.paint-card__durability {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.75rem;
    background: #f8fafc;
    border-radius: 8px;
    margin-bottom: 1rem;
}

.paint-card__durability-label {
    font-size: 0.8125rem;
    color: #666;
}

.paint-card__durability-value {
    font-size: 1rem;
    font-weight: 700;
    color: #1a1a1a;
}

.paint-card__features {
    list-style: none;
    margin: 0;
    padding: 0;
}

.paint-card__features li {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 0;
    font-size: 0.875rem;
    color: #333;
    border-bottom: 1px dashed #e2e8f0;
}

.paint-card__features li:last-child {
    border-bottom: none;
}

.paint-card__features .icon {
    color: #22c55e;
    flex-shrink: 0;
}

.paint-card__footer {
    padding: 1.25rem;
    border-top: 1px solid #e2e8f0;
}

.service-paint__note {
    text-align: center;
    font-size: 0.8125rem;
    color: #999;
    margin-top: 2rem;
}

/* 施工事例グリッド */
.works-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
}

.works-empty {
    grid-column: 1 / -1;
    text-align: center;
    color: #999;
    padding: 3rem;
}

/* FAQセクション */
.service-faq {
    background: #f8fafc;
    position: relative;
}

.faq-list {
    max-width: 800px;
    margin: 0 auto;
}

/* 関連サービス */
.related-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
}

.related-card {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 2rem;
    background: #fff;
    border-radius: 16px;
    text-align: center;
    box-shadow: 0 4px 20px rgba(0,0,0,0.06);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.related-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 40px rgba(0,0,0,0.12);
}

.related-card__icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
    border-radius: 50%;
    color: #0d47a1;
    margin-bottom: 1.5rem;
}

.related-card__title {
    font-size: 1.25rem;
    font-weight: 700;
    margin: 0 0 0.5rem;
    color: #1a1a1a;
}

.related-card__text {
    font-size: 0.9375rem;
    color: #666;
    margin: 0 0 1rem;
}

.related-card__link {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.875rem;
    font-weight: 600;
    color: #0d47a1;
}

.related-card:hover .related-card__link {
    gap: 0.75rem;
}

/* レスポンシブ */
@media (max-width: 1024px) {
    .problem-grid,
    .benefit-grid,
    .paint-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .works-grid,
    .related-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .service-hero {
        padding: 120px 0 80px;
    }
    
    .service-hero__cta {
        flex-direction: column;
    }
    
    .service-hero__wave svg {
        height: 50px;
    }
    
    .problem-grid,
    .benefit-grid,
    .paint-grid,
    .works-grid,
    .related-grid {
        grid-template-columns: 1fr;
    }
    
    .process-step {
        flex-direction: column;
        gap: 16px;
    }
    
    .process-step__number {
        width: 48px;
        height: 48px;
        font-size: 1rem;
    }
    
    .process-step::before {
        display: none;
    }
}
</style>

<!-- =============================================================================
     JAVASCRIPT
     ============================================================================= -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Before/After スライダー
    const baSliders = document.querySelectorAll('.ba-slider');
    
    baSliders.forEach(slider => {
        const rangeInput = slider.querySelector('.ba-slider__range');
        const beforeLayer = slider.querySelector('.ba-slider__before');
        const handle = slider.querySelector('.ba-slider__handle');
        
        if (!rangeInput || !beforeLayer || !handle) return;
        
        const updateSlider = (value) => {
            beforeLayer.style.clipPath = `inset(0 ${100 - value}% 0 0)`;
            handle.style.left = `${value}%`;
        };
        
        updateSlider(50);
        
        rangeInput.addEventListener('input', (e) => {
            updateSlider(e.target.value);
        });
    });

    // FAQアコーディオン
    const faqItems = document.querySelectorAll('.faq-item');
    
    faqItems.forEach(item => {
        item.addEventListener('toggle', function() {
            if (this.open) {
                faqItems.forEach(otherItem => {
                    if (otherItem !== this && otherItem.open) {
                        otherItem.open = false;
                    }
                });
            }
        });
    });

    // スクロールアニメーション
    const observerOptions = {
        root: null,
        rootMargin: '0px 0px -50px 0px',
        threshold: 0.1
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);
    
    document.querySelectorAll('.problem-card, .benefit-card, .process-step, .paint-card, .faq-item, .related-card').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        el.style.transitionDelay = el.style.getPropertyValue('--delay') || '0s';
        observer.observe(el);
    });
});
</script>

<?php get_footer(); ?>
