<?php
/**
 * Template Part: Works Card
 * 施工実績カードのテンプレートパーツ
 * 
 * @package Sato_Kenso
 */

if (!defined('ABSPATH')) {
    exit;
}

// メタデータ
$before_id   = get_post_meta(get_the_ID(), '_works_before_image', true);
$after_id    = get_post_meta(get_the_ID(), '_works_after_image', true);
$client_name = get_post_meta(get_the_ID(), '_works_client_name', true);
$work_cost   = get_post_meta(get_the_ID(), '_works_cost', true);
$completion  = get_post_meta(get_the_ID(), '_works_completion_date', true);

// 画像URL
$thumbnail_url = has_post_thumbnail() 
    ? get_the_post_thumbnail_url(get_the_ID(), 'works-card') 
    : 'https://placehold.co/400x300/1e3a5f/ffffff?text=Works';
$before_url = $before_id ? wp_get_attachment_image_url($before_id, 'works-card') : '';

// タクソノミー
$categories = get_the_terms(get_the_ID(), 'works_category');
$areas = get_the_terms(get_the_ID(), 'works_area');

$category_name = (!empty($categories) && !is_wp_error($categories)) ? $categories[0]->name : '';
$area_name = (!empty($areas) && !is_wp_error($areas)) ? $areas[0]->name : '';
?>

<article class="works-card" <?php post_class(); ?>>
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
                <?php if ($category_name) : ?>
                <span class="works-tag works-tag--category"><?php echo esc_html($category_name); ?></span>
                <?php endif; ?>
                <?php if ($area_name) : ?>
                <span class="works-tag works-tag--area"><?php echo esc_html($area_name); ?></span>
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
