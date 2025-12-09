<?php
/**
 * Template Name: 施工実績アーカイブ
 * Description: 施工実績の一覧ページ - フィルター機能付き
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

// 現在のフィルター値
$current_category = get_query_var('works_category') ?: (isset($_GET['category']) ? sanitize_text_field($_GET['category']) : '');
$current_area = get_query_var('works_area') ?: (isset($_GET['area']) ? sanitize_text_field($_GET['area']) : '');
$current_building = isset($_GET['building']) ? sanitize_text_field($_GET['building']) : '';

// タクソノミー取得
$categories = get_terms([
    'taxonomy' => 'works_category',
    'hide_empty' => true,
]);

$areas = get_terms([
    'taxonomy' => 'works_area',
    'hide_empty' => true,
]);

$buildings = get_terms([
    'taxonomy' => 'works_building',
    'hide_empty' => true,
]);

// 施工実績数
$works_count = wp_count_posts('works')->publish;

// ページネーション
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
?>

<!-- 構造化データ -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "CollectionPage",
    "name": "施工実績一覧 | <?php echo esc_js($company_name); ?>",
    "description": "<?php echo esc_js($company_name); ?>の外壁塗装・屋根塗装の施工実績をご紹介。ビフォーアフター写真で仕上がりをご確認いただけます。",
    "url": "<?php echo esc_url(get_post_type_archive_link('works')); ?>",
    "mainEntity": {
        "@type": "ItemList",
        "numberOfItems": <?php echo intval($works_count); ?>,
        "itemListElement": [
            <?php
            $schema_works = new WP_Query(['post_type' => 'works', 'posts_per_page' => 10, 'post_status' => 'publish']);
            $schema_items = [];
            $position = 1;
            while ($schema_works->have_posts()) : $schema_works->the_post();
                $schema_items[] = sprintf(
                    '{"@type": "ListItem", "position": %d, "url": "%s", "name": "%s"}',
                    $position,
                    esc_url(get_permalink()),
                    esc_js(get_the_title())
                );
                $position++;
            endwhile;
            wp_reset_postdata();
            echo implode(",\n            ", $schema_items);
            ?>
        ]
    }
}
</script>

<main id="main" class="works-archive" role="main">

    <!-- =========================================================================
         PAGE HEADER
         ========================================================================= -->
    <section class="page-header">
        <div class="page-header__bg">
            <div class="page-header__bg-image"></div>
            <div class="page-header__bg-overlay"></div>
            <div class="page-header__bg-pattern" aria-hidden="true"></div>
        </div>
        
        <div class="container">
            <?php sato_breadcrumb(); ?>
            
            <div class="page-header__content">
                <div class="page-header__icon">
                    <svg viewBox="0 0 24 24" width="48" height="48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
                        <circle cx="8.5" cy="8.5" r="1.5"/>
                        <polyline points="21 15 16 10 5 21"/>
                    </svg>
                </div>
                <h1 class="page-header__title">施工実績</h1>
                <p class="page-header__lead">
                    <?php echo esc_html($company_name); ?>がこれまでに手がけた<br class="sp-only">
                    外壁塗装・屋根塗装の施工事例をご紹介します。
                </p>
                <div class="page-header__stats">
                    <div class="page-header__stat">
                        <span class="page-header__stat-number"><?php echo number_format($works_count); ?></span>
                        <span class="page-header__stat-label">件の施工実績</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- 波形区切り -->
        <div class="page-header__wave">
            <svg viewBox="0 0 1440 120" preserveAspectRatio="none">
                <path d="M0,64 C288,120 576,0 864,64 C1152,128 1296,32 1440,64 L1440,120 L0,120 Z" fill="#f8fafc"/>
            </svg>
        </div>
    </section>

    <!-- =========================================================================
         FILTER SECTION
         ========================================================================= -->
    <section class="works-filter" aria-label="絞り込み検索">
        <div class="container">
            <form class="filter-form" method="get" action="<?php echo esc_url(get_post_type_archive_link('works')); ?>">
                <div class="filter-form__inner">
                    <!-- カテゴリーフィルター -->
                    <div class="filter-form__group">
                        <label class="filter-form__label" for="filter-category">
                            <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/>
                            </svg>
                            施工内容
                        </label>
                        <select name="category" id="filter-category" class="filter-form__select">
                            <option value="">すべて</option>
                            <?php foreach ($categories as $cat) : ?>
                            <option value="<?php echo esc_attr($cat->slug); ?>" <?php selected($current_category, $cat->slug); ?>>
                                <?php echo esc_html($cat->name); ?>（<?php echo $cat->count; ?>）
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- エリアフィルター -->
                    <div class="filter-form__group">
                        <label class="filter-form__label" for="filter-area">
                            <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                                <circle cx="12" cy="10" r="3"/>
                            </svg>
                            エリア
                        </label>
                        <select name="area" id="filter-area" class="filter-form__select">
                            <option value="">すべて</option>
                            <?php foreach ($areas as $area) : ?>
                            <option value="<?php echo esc_attr($area->slug); ?>" <?php selected($current_area, $area->slug); ?>>
                                <?php echo esc_html($area->name); ?>（<?php echo $area->count; ?>）
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- 建物タイプフィルター -->
                    <div class="filter-form__group">
                        <label class="filter-form__label" for="filter-building">
                            <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                                <polyline points="9 22 9 12 15 12 15 22"/>
                            </svg>
                            建物タイプ
                        </label>
                        <select name="building" id="filter-building" class="filter-form__select">
                            <option value="">すべて</option>
                            <?php foreach ($buildings as $bldg) : ?>
                            <option value="<?php echo esc_attr($bldg->slug); ?>" <?php selected($current_building, $bldg->slug); ?>>
                                <?php echo esc_html($bldg->name); ?>（<?php echo $bldg->count; ?>）
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- 検索ボタン -->
                    <div class="filter-form__actions">
                        <button type="submit" class="btn btn--primary">
                            <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="11" cy="11" r="8"/>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                            </svg>
                            検索
                        </button>
                        <?php if ($current_category || $current_area || $current_building) : ?>
                        <a href="<?php echo esc_url(get_post_type_archive_link('works')); ?>" class="btn btn--outline-light">
                            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="18" y1="6" x2="6" y2="18"/>
                                <line x1="6" y1="6" x2="18" y2="18"/>
                            </svg>
                            クリア
                        </a>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- アクティブフィルター表示 -->
                <?php if ($current_category || $current_area || $current_building) : ?>
                <div class="filter-form__active">
                    <span class="filter-form__active-label">絞り込み中:</span>
                    <?php if ($current_category) : 
                        $cat_term = get_term_by('slug', $current_category, 'works_category');
                    ?>
                    <span class="filter-tag">
                        <?php echo esc_html($cat_term->name); ?>
                        <a href="<?php echo esc_url(remove_query_arg('category')); ?>" aria-label="<?php echo esc_attr($cat_term->name); ?>を解除">
                            <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="18" y1="6" x2="6" y2="18"/>
                                <line x1="6" y1="6" x2="18" y2="18"/>
                            </svg>
                        </a>
                    </span>
                    <?php endif; ?>
                    <?php if ($current_area) : 
                        $area_term = get_term_by('slug', $current_area, 'works_area');
                    ?>
                    <span class="filter-tag">
                        <?php echo esc_html($area_term->name); ?>
                        <a href="<?php echo esc_url(remove_query_arg('area')); ?>" aria-label="<?php echo esc_attr($area_term->name); ?>を解除">
                            <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="18" y1="6" x2="6" y2="18"/>
                                <line x1="6" y1="6" x2="18" y2="18"/>
                            </svg>
                        </a>
                    </span>
                    <?php endif; ?>
                    <?php if ($current_building) : 
                        $bldg_term = get_term_by('slug', $current_building, 'works_building');
                    ?>
                    <span class="filter-tag">
                        <?php echo esc_html($bldg_term->name); ?>
                        <a href="<?php echo esc_url(remove_query_arg('building')); ?>" aria-label="<?php echo esc_attr($bldg_term->name); ?>を解除">
                            <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="18" y1="6" x2="6" y2="18"/>
                                <line x1="6" y1="6" x2="18" y2="18"/>
                            </svg>
                        </a>
                    </span>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </form>
        </div>
    </section>

    <!-- =========================================================================
         WORKS GRID
         ========================================================================= -->
    <section class="works-list" aria-label="施工実績一覧">
        <div class="container">
            <?php
            // クエリ構築
            $args = [
                'post_type'      => 'works',
                'posts_per_page' => 12,
                'paged'          => $paged,
                'post_status'    => 'publish',
                'orderby'        => 'date',
                'order'          => 'DESC',
            ];

            // タクソノミークエリ
            $tax_query = [];
            
            if ($current_category) {
                $tax_query[] = [
                    'taxonomy' => 'works_category',
                    'field'    => 'slug',
                    'terms'    => $current_category,
                ];
            }
            
            if ($current_area) {
                $tax_query[] = [
                    'taxonomy' => 'works_area',
                    'field'    => 'slug',
                    'terms'    => $current_area,
                ];
            }
            
            if ($current_building) {
                $tax_query[] = [
                    'taxonomy' => 'works_building',
                    'field'    => 'slug',
                    'terms'    => $current_building,
                ];
            }
            
            if (!empty($tax_query)) {
                $tax_query['relation'] = 'AND';
                $args['tax_query'] = $tax_query;
            }

            $works_query = new WP_Query($args);
            ?>

            <?php if ($works_query->have_posts()) : ?>
            
            <!-- 結果件数 -->
            <div class="works-list__header">
                <p class="works-list__count">
                    <strong><?php echo $works_query->found_posts; ?></strong>件の施工実績
                    <?php if ($paged > 1) : ?>
                    （<?php echo $paged; ?>ページ目）
                    <?php endif; ?>
                </p>
                <div class="works-list__sort">
                    <span class="works-list__sort-label">並び順:</span>
                    <span class="works-list__sort-current">新着順</span>
                </div>
            </div>

            <!-- グリッド -->
            <div class="works-grid">
                <?php 
                $delay = 0;
                while ($works_query->have_posts()) : $works_query->the_post();
                    // メタデータ
                    $before_id   = get_post_meta(get_the_ID(), '_works_before_image', true);
                    $after_id    = get_post_meta(get_the_ID(), '_works_after_image', true);
                    $client_name = get_post_meta(get_the_ID(), '_works_client_name', true);
                    $work_cost   = get_post_meta(get_the_ID(), '_works_cost', true);
                    $work_period = get_post_meta(get_the_ID(), '_works_period', true);
                    $paint_name  = get_post_meta(get_the_ID(), '_works_paint_name', true);
                    $completion  = get_post_meta(get_the_ID(), '_works_completion_date', true);
                    
                    // 画像URL
                    $thumbnail_url = has_post_thumbnail() 
                        ? get_the_post_thumbnail_url(get_the_ID(), 'works-card') 
                        : 'https://placehold.co/400x300/1e3a5f/ffffff?text=After';
                    $before_url = $before_id 
                        ? wp_get_attachment_image_url($before_id, 'works-card') 
                        : '';
                    
                    // タクソノミー
                    $work_categories = get_the_terms(get_the_ID(), 'works_category');
                    $work_areas = get_the_terms(get_the_ID(), 'works_area');
                    $work_buildings = get_the_terms(get_the_ID(), 'works_building');
                ?>
                <article class="works-card" style="--delay: <?php echo $delay * 0.05; ?>s">
                    <a href="<?php the_permalink(); ?>" class="works-card__link">
                        <!-- 画像エリア -->
                        <div class="works-card__image">
                            <img src="<?php echo esc_url($thumbnail_url); ?>" 
                                 alt="<?php the_title_attribute(); ?>" 
                                 loading="lazy"
                                 width="400"
                                 height="300">
                            
                            <?php if ($before_url) : ?>
                            <div class="works-card__before-badge">
                                <span>Before/After</span>
                            </div>
                            <?php endif; ?>
                            
                            <!-- ホバー時のオーバーレイ -->
                            <div class="works-card__overlay">
                                <span class="works-card__view">
                                    <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                        <circle cx="12" cy="12" r="3"/>
                                    </svg>
                                    詳細を見る
                                </span>
                            </div>
                        </div>

                        <!-- コンテンツ -->
                        <div class="works-card__body">
                            <!-- タグ -->
                            <div class="works-card__tags">
                                <?php if (!empty($work_categories) && !is_wp_error($work_categories)) : ?>
                                <span class="works-tag works-tag--category">
                                    <?php echo esc_html($work_categories[0]->name); ?>
                                </span>
                                <?php endif; ?>
                                <?php if (!empty($work_areas) && !is_wp_error($work_areas)) : ?>
                                <span class="works-tag works-tag--area">
                                    <?php echo esc_html($work_areas[0]->name); ?>
                                </span>
                                <?php endif; ?>
                            </div>

                            <!-- タイトル -->
                            <h2 class="works-card__title"><?php the_title(); ?></h2>

                            <!-- メタ情報 -->
                            <dl class="works-card__meta">
                                <?php if ($client_name) : ?>
                                <div class="works-card__meta-item">
                                    <dt>
                                        <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                                            <circle cx="12" cy="10" r="3"/>
                                        </svg>
                                    </dt>
                                    <dd><?php echo esc_html($client_name); ?></dd>
                                </div>
                                <?php endif; ?>
                                
                                <?php if ($work_cost) : ?>
                                <div class="works-card__meta-item">
                                    <dt>
                                        <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2">
                                            <line x1="12" y1="1" x2="12" y2="23"/>
                                            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/>
                                        </svg>
                                    </dt>
                                    <dd><?php echo esc_html($work_cost); ?></dd>
                                </div>
                                <?php endif; ?>
                                
                                <?php if ($completion) : ?>
                                <div class="works-card__meta-item">
                                    <dt>
                                        <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2">
                                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                                            <line x1="16" y1="2" x2="16" y2="6"/>
                                            <line x1="8" y1="2" x2="8" y2="6"/>
                                            <line x1="3" y1="10" x2="21" y2="10"/>
                                        </svg>
                                    </dt>
                                    <dd><?php echo esc_html(date('Y年n月', strtotime($completion))); ?>完工</dd>
                                </div>
                                <?php endif; ?>
                            </dl>

                            <!-- 詳細リンク -->
                            <span class="works-card__more">
                                詳しく見る
                                <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2">
                                    <line x1="5" y1="12" x2="19" y2="12"/>
                                    <polyline points="12 5 19 12 12 19"/>
                                </svg>
                            </span>
                        </div>
                    </a>
                </article>
                <?php 
                    $delay++;
                endwhile; 
                ?>
            </div>

            <!-- ページネーション -->
            <?php if ($works_query->max_num_pages > 1) : ?>
            <nav class="pagination" aria-label="ページナビゲーション">
                <?php
                echo paginate_links([
                    'total'     => $works_query->max_num_pages,
                    'current'   => $paged,
                    'prev_text' => '<svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><polyline points="15 18 9 12 15 6"/></svg><span class="screen-reader-text">前へ</span>',
                    'next_text' => '<span class="screen-reader-text">次へ</span><svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>',
                    'type'      => 'list',
                    'end_size'  => 1,
                    'mid_size'  => 2,
                ]);
                ?>
            </nav>
            <?php endif; ?>

            <?php wp_reset_postdata(); ?>

            <?php else : ?>
            
            <!-- 結果なし -->
            <div class="works-empty">
                <div class="works-empty__icon">
                    <svg viewBox="0 0 24 24" width="64" height="64" fill="none" stroke="currentColor" stroke-width="1.5">
                        <circle cx="11" cy="11" r="8"/>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                        <line x1="8" y1="11" x2="14" y2="11"/>
                    </svg>
                </div>
                <h2 class="works-empty__title">該当する施工実績が見つかりませんでした</h2>
                <p class="works-empty__text">
                    条件を変更して再度検索してください。
                </p>
                <a href="<?php echo esc_url(get_post_type_archive_link('works')); ?>" class="btn btn--primary">
                    すべての施工実績を見る
                </a>
            </div>

            <?php endif; ?>
        </div>
    </section>

    <!-- =========================================================================
         CTA SECTION
         ========================================================================= -->
    <section class="works-cta">
        <div class="container">
            <div class="works-cta__inner">
                <div class="works-cta__content">
                    <h2 class="works-cta__title">
                        あなたのお住まいも<br>
                        <span>こんなにキレイに生まれ変わります</span>
                    </h2>
                    <p class="works-cta__text">
                        まずは無料診断・お見積りから。<br>
                        職人が直接お伺いし、最適なプランをご提案いたします。
                    </p>
                </div>
                <div class="works-cta__actions">
                    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn--accent btn--xl">
                        <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                            <polyline points="22,6 12,13 2,6"/>
                        </svg>
                        無料お見積り
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
    </section>

</main>

<style>
/* =============================================================================
   WORKS ARCHIVE - CSS
   ============================================================================= */

/* Variables */
:root {
    --color-primary: #0d47a1;
    --color-primary-dark: #002171;
    --color-primary-light: #5472d3;
    --color-accent: #f59e0b;
    --color-text: #1a1a1a;
    --color-text-light: #666666;
    --color-text-muted: #999999;
    --color-bg: #ffffff;
    --color-bg-light: #f8fafc;
    --color-border: #e2e8f0;
    --radius-md: 8px;
    --radius-lg: 16px;
    --radius-xl: 24px;
    --shadow-md: 0 4px 6px -1px rgba(0,0,0,0.1);
    --shadow-lg: 0 10px 15px -3px rgba(0,0,0,0.1);
    --shadow-xl: 0 20px 25px -5px rgba(0,0,0,0.1);
    --transition-base: 0.3s ease;
}

/* Page Header */
.page-header {
    position: relative;
    padding: 120px 0 80px;
    overflow: hidden;
}

.page-header__bg {
    position: absolute;
    inset: 0;
    z-index: 0;
}

.page-header__bg-image {
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, #0d47a1 0%, #1565c0 50%, #1976d2 100%);
}

.page-header__bg-overlay {
    position: absolute;
    inset: 0;
    background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}

.page-header__bg-pattern {
    position: absolute;
    top: 0;
    right: 0;
    width: 50%;
    height: 100%;
    background: radial-gradient(circle at 100% 0%, rgba(255,255,255,0.1) 0%, transparent 50%);
}

.page-header .container {
    position: relative;
    z-index: 1;
}

.page-header .breadcrumb {
    margin-bottom: 2rem;
}

.page-header .breadcrumb__link,
.page-header .breadcrumb__current {
    color: rgba(255,255,255,0.8);
}

.page-header .breadcrumb__link:hover {
    color: #fff;
}

.page-header .breadcrumb__separator {
    color: rgba(255,255,255,0.5);
}

.page-header__content {
    text-align: center;
    color: #fff;
}

.page-header__icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 80px;
    height: 80px;
    margin-bottom: 1.5rem;
    background: rgba(255,255,255,0.15);
    backdrop-filter: blur(10px);
    border-radius: 50%;
    color: #fff;
}

.page-header__title {
    font-size: clamp(2rem, 5vw, 3rem);
    font-weight: 900;
    margin: 0 0 1rem;
    letter-spacing: 0.05em;
}

.page-header__lead {
    font-size: 1.0625rem;
    opacity: 0.9;
    margin: 0 0 2rem;
    line-height: 1.8;
}

.page-header__stats {
    display: inline-flex;
    gap: 2rem;
}

.page-header__stat {
    display: flex;
    align-items: baseline;
    gap: 0.5rem;
    padding: 1rem 2rem;
    background: rgba(255,255,255,0.15);
    backdrop-filter: blur(10px);
    border-radius: var(--radius-lg);
}

.page-header__stat-number {
    font-family: 'Inter', sans-serif;
    font-size: 2.5rem;
    font-weight: 900;
}

.page-header__stat-label {
    font-size: 0.875rem;
    opacity: 0.9;
}

.page-header__wave {
    position: absolute;
    bottom: -1px;
    left: 0;
    width: 100%;
    line-height: 0;
}

.page-header__wave svg {
    width: 100%;
    height: 60px;
}

@media (max-width: 768px) {
    .page-header {
        padding: 100px 0 60px;
    }
    
    .page-header__icon {
        width: 64px;
        height: 64px;
    }
    
    .page-header__stat {
        padding: 0.75rem 1.25rem;
    }
    
    .page-header__stat-number {
        font-size: 2rem;
    }
    
    .sp-only {
        display: inline;
    }
}

/* Filter Section */
.works-filter {
    background: var(--color-bg-light);
    padding: 2rem 0;
    border-bottom: 1px solid var(--color-border);
}

.filter-form__inner {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
    align-items: flex-end;
}

.filter-form__group {
    flex: 1;
    min-width: 180px;
}

.filter-form__label {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.8125rem;
    font-weight: 600;
    color: var(--color-text-light);
    margin-bottom: 0.5rem;
}

.filter-form__label svg {
    color: var(--color-primary);
}

.filter-form__select {
    width: 100%;
    padding: 0.75rem 2.5rem 0.75rem 1rem;
    font-size: 0.9375rem;
    border: 1px solid var(--color-border);
    border-radius: var(--radius-md);
    background: #fff url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%23666' stroke-width='2'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E") no-repeat right 0.75rem center;
    background-size: 16px;
    appearance: none;
    cursor: pointer;
    transition: var(--transition-base);
}

.filter-form__select:focus {
    outline: none;
    border-color: var(--color-primary);
    box-shadow: 0 0 0 3px rgba(13, 71, 161, 0.1);
}

.filter-form__actions {
    display: flex;
    gap: 0.75rem;
    padding-top: 0.25rem;
}

.filter-form__active {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 0.5rem;
    margin-top: 1rem;
    padding-top: 1rem;
    border-top: 1px dashed var(--color-border);
}

.filter-form__active-label {
    font-size: 0.8125rem;
    color: var(--color-text-light);
}

.filter-tag {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.375rem 0.75rem;
    background: var(--color-primary);
    color: #fff;
    font-size: 0.8125rem;
    font-weight: 600;
    border-radius: 9999px;
}

.filter-tag a {
    display: flex;
    color: rgba(255,255,255,0.8);
    transition: color 0.2s;
}

.filter-tag a:hover {
    color: #fff;
}

@media (max-width: 768px) {
    .filter-form__inner {
        flex-direction: column;
    }
    
    .filter-form__group {
        width: 100%;
    }
    
    .filter-form__actions {
        width: 100%;
    }
    
    .filter-form__actions .btn {
        flex: 1;
    }
}

/* Works List */
.works-list {
    padding: 3rem 0 4rem;
    background: var(--color-bg-light);
}

.works-list__header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
}

.works-list__count {
    font-size: 0.9375rem;
    color: var(--color-text-light);
    margin: 0;
}

.works-list__count strong {
    color: var(--color-primary);
    font-size: 1.25rem;
}

.works-list__sort {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.875rem;
    color: var(--color-text-light);
}

.works-list__sort-current {
    font-weight: 600;
    color: var(--color-text);
}

/* Works Grid */
.works-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 2rem;
}

@media (max-width: 1024px) {
    .works-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 640px) {
    .works-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }
}

/* Works Card */
.works-card {
    background: #fff;
    border-radius: var(--radius-xl);
    overflow: hidden;
    box-shadow: var(--shadow-md);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    animation: fadeSlideUp 0.6s ease both;
    animation-delay: var(--delay, 0s);
}

@keyframes fadeSlideUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.works-card:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-xl);
}

.works-card__link {
    display: block;
    color: inherit;
}

.works-card__image {
    position: relative;
    aspect-ratio: 4 / 3;
    overflow: hidden;
}

.works-card__image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.works-card:hover .works-card__image img {
    transform: scale(1.1);
}

.works-card__before-badge {
    position: absolute;
    top: 12px;
    left: 12px;
    padding: 0.375rem 0.75rem;
    background: linear-gradient(135deg, #1e3a5f 0%, #0d47a1 100%);
    color: #fff;
    font-size: 0.6875rem;
    font-weight: 700;
    border-radius: 9999px;
    letter-spacing: 0.05em;
    z-index: 2;
}

.works-card__overlay {
    position: absolute;
    inset: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(13, 71, 161, 0.85);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.works-card:hover .works-card__overlay {
    opacity: 1;
}

.works-card__view {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.5rem;
    color: #fff;
    font-size: 0.875rem;
    font-weight: 600;
}

.works-card__body {
    padding: 1.5rem;
}

.works-card__tags {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
    margin-bottom: 0.75rem;
}

.works-tag {
    display: inline-block;
    padding: 0.25em 0.75em;
    font-size: 0.6875rem;
    font-weight: 600;
    border-radius: 9999px;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.works-tag--category {
    background: #dbeafe;
    color: #1e40af;
}

.works-tag--area {
    background: #fef3c7;
    color: #92400e;
}

.works-card__title {
    font-size: 1.0625rem;
    font-weight: 700;
    margin: 0 0 1rem;
    line-height: 1.5;
    color: var(--color-text);
}

.works-card__meta {
    display: flex;
    flex-wrap: wrap;
    gap: 0.75rem 1.25rem;
    margin: 0 0 1rem;
}

.works-card__meta-item {
    display: flex;
    align-items: center;
    gap: 0.375rem;
    font-size: 0.8125rem;
    color: var(--color-text-light);
}

.works-card__meta-item dt {
    display: flex;
    color: var(--color-text-muted);
}

.works-card__more {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.875rem;
    font-weight: 600;
    color: var(--color-primary);
    transition: gap 0.3s ease;
}

.works-card:hover .works-card__more {
    gap: 0.75rem;
}

/* Pagination */
.pagination {
    margin-top: 3rem;
    display: flex;
    justify-content: center;
}

.pagination .page-numbers {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 0.5rem;
    list-style: none;
    margin: 0;
    padding: 0;
}

.pagination .page-numbers li {
    display: flex;
}

.pagination .page-numbers a,
.pagination .page-numbers span {
    display: flex;
    align-items: center;
    justify-content: center;
    min-width: 44px;
    height: 44px;
    padding: 0 0.75rem;
    font-size: 0.9375rem;
    font-weight: 600;
    color: var(--color-text);
    background: #fff;
    border: 1px solid var(--color-border);
    border-radius: var(--radius-md);
    transition: var(--transition-base);
}

.pagination .page-numbers a:hover {
    background: var(--color-primary);
    border-color: var(--color-primary);
    color: #fff;
}

.pagination .page-numbers .current {
    background: var(--color-primary);
    border-color: var(--color-primary);
    color: #fff;
}

.pagination .page-numbers .dots {
    border: none;
    background: transparent;
}

/* Works Empty */
.works-empty {
    text-align: center;
    padding: 4rem 2rem;
    background: #fff;
    border-radius: var(--radius-xl);
}

.works-empty__icon {
    color: var(--color-text-muted);
    margin-bottom: 1.5rem;
}

.works-empty__title {
    font-size: 1.25rem;
    margin: 0 0 0.75rem;
    color: var(--color-text);
}

.works-empty__text {
    color: var(--color-text-light);
    margin: 0 0 2rem;
}

/* Works CTA */
.works-cta {
    background: linear-gradient(135deg, #0d47a1 0%, #002171 100%);
    padding: 4rem 0;
}

.works-cta__inner {
    display: grid;
    grid-template-columns: 1fr auto;
    gap: 3rem;
    align-items: center;
}

.works-cta__content {
    color: #fff;
}

.works-cta__title {
    font-size: clamp(1.5rem, 3vw, 2rem);
    font-weight: 900;
    margin: 0 0 1rem;
    line-height: 1.4;
}

.works-cta__title span {
    display: block;
    color: var(--color-accent);
}

.works-cta__text {
    font-size: 1rem;
    opacity: 0.9;
    margin: 0;
    line-height: 1.8;
}

.works-cta__actions {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

@media (max-width: 768px) {
    .works-cta__inner {
        grid-template-columns: 1fr;
        text-align: center;
    }
    
    .works-cta__actions {
        width: 100%;
    }
}

/* Button Styles */
.btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    padding: 0.75rem 1.5rem;
    font-size: 0.9375rem;
    font-weight: 700;
    border: 2px solid transparent;
    border-radius: 9999px;
    cursor: pointer;
    transition: all 0.3s ease;
    white-space: nowrap;
    text-decoration: none;
}

.btn--primary {
    background: var(--color-primary);
    color: #fff;
}

.btn--primary:hover {
    background: var(--color-primary-dark);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(13, 71, 161, 0.3);
}

.btn--accent {
    background: var(--color-accent);
    color: #fff;
}

.btn--accent:hover {
    background: #d97706;
    transform: translateY(-2px);
}

.btn--outline-light {
    background: transparent;
    border-color: var(--color-border);
    color: var(--color-text-light);
}

.btn--outline-light:hover {
    background: #fff;
    border-color: var(--color-primary);
    color: var(--color-primary);
}

.btn--outline-white {
    background: transparent;
    border-color: rgba(255,255,255,0.5);
    color: #fff;
}

.btn--outline-white:hover {
    background: #fff;
    border-color: #fff;
    color: var(--color-primary);
}

.btn--lg {
    padding: 0.875rem 2rem;
    font-size: 1rem;
}

.btn--xl {
    padding: 1rem 2.5rem;
    font-size: 1.0625rem;
}

/* Container */
.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

/* Screen Reader Text */
.screen-reader-text {
    position: absolute;
    width: 1px;
    height: 1px;
    padding: 0;
    margin: -1px;
    overflow: hidden;
    clip: rect(0, 0, 0, 0);
    white-space: nowrap;
    border: 0;
}
</style>

<?php get_footer(); ?>
