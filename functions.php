<?php
/**
 * Theme Name: サトー建装 公式Webサイトテーマ
 * Theme URI: https://satokensou.com/
 * Author: Sato Kenso
 * Author URI: https://satokensou.com/
 * Description: 静岡県御殿場市・東部エリアの塗装専門店「サトー建装」公式テーマ - 青をモチーフにした職人直営の塗装会社サイト
 * Version: 3.0.0
 * License: GNU General Public License v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: sato-kenso
 * Requires at least: 6.0
 * Requires PHP: 8.0
 */

// 直接アクセス防止
if (!defined('ABSPATH')) {
    exit;
}

/**
 * =============================================================================
 * 定数定義
 * =============================================================================
 */
define('SATO_THEME_VERSION', '3.0.0');
define('SATO_THEME_DIR', get_template_directory());
define('SATO_THEME_URI', get_template_directory_uri());
define('SATO_THEME_ASSETS', SATO_THEME_URI . '/assets');

/**
 * =============================================================================
 * テーマセットアップ
 * =============================================================================
 */
function sato_theme_setup() {
    // 翻訳ファイルの読み込み
    load_theme_textdomain('sato-kenso', SATO_THEME_DIR . '/languages');

    // HTML5マークアップサポート
    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ]);

    // タイトルタグ自動生成
    add_theme_support('title-tag');

    // アイキャッチ画像
    add_theme_support('post-thumbnails');

    // カスタムロゴ
    add_theme_support('custom-logo', [
        'height'      => 80,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ]);

    // RSSフィードリンク
    add_theme_support('automatic-feed-links');

    // レスポンシブ埋め込み
    add_theme_support('responsive-embeds');

    // エディタースタイル
    add_theme_support('editor-styles');
    add_editor_style('assets/css/editor-style.css');

    // 画像サイズ登録
    add_image_size('hero', 1920, 800, true);
    add_image_size('hero-sp', 750, 500, true);
    add_image_size('works-card', 400, 300, true);
    add_image_size('works-large', 800, 600, true);
    add_image_size('voice-avatar', 100, 100, true);
    add_image_size('news-thumb', 350, 200, true);

    // ナビゲーションメニュー
    register_nav_menus([
        'primary'     => __('メインナビゲーション', 'sato-kenso'),
        'footer'      => __('フッターナビゲーション', 'sato-kenso'),
        'footer-sub'  => __('フッターサブナビゲーション', 'sato-kenso'),
    ]);
}
add_action('after_setup_theme', 'sato_theme_setup');

/**
 * =============================================================================
 * カスタム投稿タイプ登録
 * =============================================================================
 */
function sato_register_post_types() {
    
    /**
     * 施工実績（Works）
     */
    register_post_type('works', [
        'labels' => [
            'name'                  => '施工実績',
            'singular_name'         => '施工実績',
            'add_new'               => '新規追加',
            'add_new_item'          => '新規施工実績を追加',
            'edit_item'             => '施工実績を編集',
            'new_item'              => '新規施工実績',
            'view_item'             => '施工実績を表示',
            'view_items'            => '施工実績一覧を表示',
            'search_items'          => '施工実績を検索',
            'not_found'             => '施工実績が見つかりません',
            'not_found_in_trash'    => 'ゴミ箱に施工実績はありません',
            'all_items'             => 'すべての施工実績',
            'archives'              => '施工実績アーカイブ',
            'attributes'            => '施工実績の属性',
            'insert_into_item'      => '施工実績に挿入',
            'uploaded_to_this_item' => 'この施工実績にアップロード',
            'menu_name'             => '施工実績',
        ],
        'public'              => true,
        'has_archive'         => true,
        'show_in_rest'        => true,
        'menu_icon'           => 'dashicons-images-alt2',
        'menu_position'       => 5,
        'supports'            => ['title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'revisions'],
        'rewrite'             => ['slug' => 'works', 'with_front' => false],
        'capability_type'     => 'post',
        'hierarchical'        => false,
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
    ]);

    /**
     * お客様の声（Voice）
     */
    register_post_type('voice', [
        'labels' => [
            'name'                  => 'お客様の声',
            'singular_name'         => 'お客様の声',
            'add_new'               => '新規追加',
            'add_new_item'          => '新規お客様の声を追加',
            'edit_item'             => 'お客様の声を編集',
            'new_item'              => '新規お客様の声',
            'view_item'             => 'お客様の声を表示',
            'view_items'            => 'お客様の声一覧を表示',
            'search_items'          => 'お客様の声を検索',
            'not_found'             => 'お客様の声が見つかりません',
            'not_found_in_trash'    => 'ゴミ箱にお客様の声はありません',
            'all_items'             => 'すべてのお客様の声',
            'archives'              => 'お客様の声アーカイブ',
            'menu_name'             => 'お客様の声',
        ],
        'public'              => true,
        'has_archive'         => true,
        'show_in_rest'        => true,
        'menu_icon'           => 'dashicons-format-quote',
        'menu_position'       => 6,
        'supports'            => ['title', 'editor', 'thumbnail', 'custom-fields', 'revisions'],
        'rewrite'             => ['slug' => 'voice', 'with_front' => false],
        'capability_type'     => 'post',
        'hierarchical'        => false,
    ]);

    /**
     * よくある質問（FAQ）
     */
    register_post_type('faq', [
        'labels' => [
            'name'                  => 'よくある質問',
            'singular_name'         => 'よくある質問',
            'add_new'               => '新規追加',
            'add_new_item'          => '新規質問を追加',
            'edit_item'             => '質問を編集',
            'new_item'              => '新規質問',
            'view_item'             => '質問を表示',
            'view_items'            => '質問一覧を表示',
            'search_items'          => '質問を検索',
            'not_found'             => '質問が見つかりません',
            'not_found_in_trash'    => 'ゴミ箱に質問はありません',
            'all_items'             => 'すべての質問',
            'menu_name'             => 'よくある質問',
        ],
        'public'              => true,
        'has_archive'         => false,
        'show_in_rest'        => true,
        'menu_icon'           => 'dashicons-editor-help',
        'menu_position'       => 7,
        'supports'            => ['title', 'editor', 'page-attributes', 'custom-fields', 'revisions'],
        'rewrite'             => ['slug' => 'faq', 'with_front' => false],
        'capability_type'     => 'post',
        'hierarchical'        => false,
    ]);

    /**
     * お知らせ（News）
     */
    register_post_type('news', [
        'labels' => [
            'name'                  => 'お知らせ',
            'singular_name'         => 'お知らせ',
            'add_new'               => '新規追加',
            'add_new_item'          => '新規お知らせを追加',
            'edit_item'             => 'お知らせを編集',
            'new_item'              => '新規お知らせ',
            'view_item'             => 'お知らせを表示',
            'view_items'            => 'お知らせ一覧を表示',
            'search_items'          => 'お知らせを検索',
            'not_found'             => 'お知らせが見つかりません',
            'not_found_in_trash'    => 'ゴミ箱にお知らせはありません',
            'all_items'             => 'すべてのお知らせ',
            'archives'              => 'お知らせアーカイブ',
            'menu_name'             => 'お知らせ',
        ],
        'public'              => true,
        'has_archive'         => true,
        'show_in_rest'        => true,
        'menu_icon'           => 'dashicons-megaphone',
        'menu_position'       => 8,
        'supports'            => ['title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'revisions'],
        'rewrite'             => ['slug' => 'news', 'with_front' => false],
        'capability_type'     => 'post',
        'hierarchical'        => false,
    ]);

    /**
     * スタッフ紹介（Staff）- オプション
     */
    register_post_type('staff', [
        'labels' => [
            'name'                  => 'スタッフ紹介',
            'singular_name'         => 'スタッフ',
            'add_new'               => '新規追加',
            'add_new_item'          => '新規スタッフを追加',
            'edit_item'             => 'スタッフを編集',
            'new_item'              => '新規スタッフ',
            'view_item'             => 'スタッフを表示',
            'search_items'          => 'スタッフを検索',
            'not_found'             => 'スタッフが見つかりません',
            'all_items'             => 'すべてのスタッフ',
            'menu_name'             => 'スタッフ紹介',
        ],
        'public'              => true,
        'has_archive'         => true,
        'show_in_rest'        => true,
        'menu_icon'           => 'dashicons-groups',
        'menu_position'       => 9,
        'supports'            => ['title', 'editor', 'thumbnail', 'page-attributes', 'custom-fields'],
        'rewrite'             => ['slug' => 'staff', 'with_front' => false],
        'capability_type'     => 'post',
        'hierarchical'        => false,
    ]);
}
add_action('init', 'sato_register_post_types');

/**
 * =============================================================================
 * カスタムタクソノミー登録
 * =============================================================================
 */
function sato_register_taxonomies() {
    
    /**
     * 施工実績カテゴリー
     */
    register_taxonomy('works_category', 'works', [
        'labels' => [
            'name'              => '施工カテゴリー',
            'singular_name'     => '施工カテゴリー',
            'search_items'      => 'カテゴリーを検索',
            'all_items'         => 'すべてのカテゴリー',
            'parent_item'       => '親カテゴリー',
            'parent_item_colon' => '親カテゴリー:',
            'edit_item'         => 'カテゴリーを編集',
            'update_item'       => 'カテゴリーを更新',
            'add_new_item'      => '新規カテゴリーを追加',
            'new_item_name'     => '新規カテゴリー名',
            'menu_name'         => '施工カテゴリー',
        ],
        'hierarchical'      => true,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'rewrite'           => ['slug' => 'works/category', 'with_front' => false],
    ]);

    /**
     * 施工エリア
     */
    register_taxonomy('works_area', 'works', [
        'labels' => [
            'name'              => '施工エリア',
            'singular_name'     => '施工エリア',
            'search_items'      => 'エリアを検索',
            'all_items'         => 'すべてのエリア',
            'edit_item'         => 'エリアを編集',
            'update_item'       => 'エリアを更新',
            'add_new_item'      => '新規エリアを追加',
            'new_item_name'     => '新規エリア名',
            'menu_name'         => '施工エリア',
        ],
        'hierarchical'      => true,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'rewrite'           => ['slug' => 'works/area', 'with_front' => false],
    ]);

    /**
     * FAQカテゴリー
     */
    register_taxonomy('faq_category', 'faq', [
        'labels' => [
            'name'              => 'FAQカテゴリー',
            'singular_name'     => 'FAQカテゴリー',
            'search_items'      => 'カテゴリーを検索',
            'all_items'         => 'すべてのカテゴリー',
            'edit_item'         => 'カテゴリーを編集',
            'update_item'       => 'カテゴリーを更新',
            'add_new_item'      => '新規カテゴリーを追加',
            'new_item_name'     => '新規カテゴリー名',
            'menu_name'         => 'FAQカテゴリー',
        ],
        'hierarchical'      => true,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'rewrite'           => ['slug' => 'faq/category', 'with_front' => false],
    ]);

    /**
     * お知らせカテゴリー
     */
    register_taxonomy('news_category', 'news', [
        'labels' => [
            'name'              => 'お知らせカテゴリー',
            'singular_name'     => 'お知らせカテゴリー',
            'search_items'      => 'カテゴリーを検索',
            'all_items'         => 'すべてのカテゴリー',
            'edit_item'         => 'カテゴリーを編集',
            'update_item'       => 'カテゴリーを更新',
            'add_new_item'      => '新規カテゴリーを追加',
            'new_item_name'     => '新規カテゴリー名',
            'menu_name'         => 'お知らせカテゴリー',
        ],
        'hierarchical'      => true,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'rewrite'           => ['slug' => 'news/category', 'with_front' => false],
    ]);
}
add_action('init', 'sato_register_taxonomies');

/**
 * =============================================================================
 * デフォルトタクソノミー項目の登録
 * =============================================================================
 */
function sato_register_default_terms() {
    // 施工カテゴリーのデフォルト項目
    $works_categories = [
        'exterior'   => '外壁塗装',
        'roof'       => '屋根塗装',
        'waterproof' => '防水工事',
        'interior'   => '内装塗装',
        'other'      => 'その他',
    ];
    
    foreach ($works_categories as $slug => $name) {
        if (!term_exists($slug, 'works_category')) {
            wp_insert_term($name, 'works_category', ['slug' => $slug]);
        }
    }

    // 施工エリアのデフォルト項目
    $works_areas = [
        'gotemba'     => '御殿場市',
        'susono'      => '裾野市',
        'mishima'     => '三島市',
        'numazu'      => '沼津市',
        'fuji'        => '富士市',
        'fujinomiya'  => '富士宮市',
        'nagaizumi'   => '長泉町',
        'shimizu'     => '清水町',
        'other-area'  => 'その他エリア',
    ];
    
    foreach ($works_areas as $slug => $name) {
        if (!term_exists($slug, 'works_area')) {
            wp_insert_term($name, 'works_area', ['slug' => $slug]);
        }
    }

    // FAQカテゴリーのデフォルト項目
    $faq_categories = [
        'price'     => '料金について',
        'process'   => '施工について',
        'paint'     => '塗料について',
        'warranty'  => '保証について',
        'other-faq' => 'その他',
    ];
    
    foreach ($faq_categories as $slug => $name) {
        if (!term_exists($slug, 'faq_category')) {
            wp_insert_term($name, 'faq_category', ['slug' => $slug]);
        }
    }

    // お知らせカテゴリーのデフォルト項目
    $news_categories = [
        'info'      => 'お知らせ',
        'campaign'  => 'キャンペーン',
        'media'     => 'メディア掲載',
        'blog'      => 'ブログ',
    ];
    
    foreach ($news_categories as $slug => $name) {
        if (!term_exists($slug, 'news_category')) {
            wp_insert_term($name, 'news_category', ['slug' => $slug]);
        }
    }
}
add_action('init', 'sato_register_default_terms', 11);

/**
 * =============================================================================
 * カスタムフィールド用メタボックス
 * =============================================================================
 */
function sato_add_meta_boxes() {
    // 施工実績用メタボックス
    add_meta_box(
        'works_details',
        '施工詳細情報',
        'sato_works_meta_box_callback',
        'works',
        'normal',
        'high'
    );

    // お客様の声用メタボックス
    add_meta_box(
        'voice_details',
        'お客様情報',
        'sato_voice_meta_box_callback',
        'voice',
        'normal',
        'high'
    );

    // FAQ用メタボックス
    add_meta_box(
        'faq_details',
        'FAQ設定',
        'sato_faq_meta_box_callback',
        'faq',
        'side',
        'default'
    );
}
add_action('add_meta_boxes', 'sato_add_meta_boxes');

/**
 * 施工実績メタボックスコールバック
 */
function sato_works_meta_box_callback($post) {
    wp_nonce_field('sato_works_meta_box', 'sato_works_meta_box_nonce');
    
    $completion_date = get_post_meta($post->ID, '_works_completion_date', true);
    $building_type = get_post_meta($post->ID, '_works_building_type', true);
    $work_period = get_post_meta($post->ID, '_works_period', true);
    $work_cost = get_post_meta($post->ID, '_works_cost', true);
    $paint_used = get_post_meta($post->ID, '_works_paint_used', true);
    $client_name = get_post_meta($post->ID, '_works_client_name', true);
    $before_image = get_post_meta($post->ID, '_works_before_image', true);
    $after_image = get_post_meta($post->ID, '_works_after_image', true);
    ?>
    <style>
        .sato-meta-box { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
        .sato-meta-box .full-width { grid-column: 1 / -1; }
        .sato-meta-field { margin-bottom: 15px; }
        .sato-meta-field label { display: block; font-weight: bold; margin-bottom: 5px; }
        .sato-meta-field input[type="text"],
        .sato-meta-field input[type="date"],
        .sato-meta-field input[type="number"],
        .sato-meta-field textarea,
        .sato-meta-field select { width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; }
        .sato-image-preview { max-width: 200px; margin-top: 10px; }
        .sato-image-preview img { max-width: 100%; height: auto; }
    </style>
    <div class="sato-meta-box">
        <div class="sato-meta-field">
            <label for="works_completion_date">完成日</label>
            <input type="date" id="works_completion_date" name="works_completion_date" value="<?php echo esc_attr($completion_date); ?>">
        </div>
        
        <div class="sato-meta-field">
            <label for="works_building_type">建物タイプ</label>
            <select id="works_building_type" name="works_building_type">
                <option value="">選択してください</option>
                <option value="戸建て" <?php selected($building_type, '戸建て'); ?>>戸建て</option>
                <option value="マンション" <?php selected($building_type, 'マンション'); ?>>マンション</option>
                <option value="アパート" <?php selected($building_type, 'アパート'); ?>>アパート</option>
                <option value="店舗" <?php selected($building_type, '店舗'); ?>>店舗</option>
                <option value="工場" <?php selected($building_type, '工場'); ?>>工場</option>
                <option value="その他" <?php selected($building_type, 'その他'); ?>>その他</option>
            </select>
        </div>
        
        <div class="sato-meta-field">
            <label for="works_period">施工期間</label>
            <input type="text" id="works_period" name="works_period" value="<?php echo esc_attr($work_period); ?>" placeholder="例: 約2週間">
        </div>
        
        <div class="sato-meta-field">
            <label for="works_cost">施工費用（税込）</label>
            <input type="text" id="works_cost" name="works_cost" value="<?php echo esc_attr($work_cost); ?>" placeholder="例: 約80万円">
        </div>
        
        <div class="sato-meta-field full-width">
            <label for="works_paint_used">使用塗料</label>
            <textarea id="works_paint_used" name="works_paint_used" rows="2" placeholder="例: 日本ペイント パーフェクトトップ"><?php echo esc_textarea($paint_used); ?></textarea>
        </div>
        
        <div class="sato-meta-field">
            <label for="works_client_name">お客様名（表示用）</label>
            <input type="text" id="works_client_name" name="works_client_name" value="<?php echo esc_attr($client_name); ?>" placeholder="例: 御殿場市 S様邸">
        </div>
        
        <div class="sato-meta-field">
            <label>施工前画像</label>
            <input type="hidden" id="works_before_image" name="works_before_image" value="<?php echo esc_attr($before_image); ?>">
            <button type="button" class="button sato-upload-image" data-target="works_before_image">画像を選択</button>
            <button type="button" class="button sato-remove-image" data-target="works_before_image" <?php echo empty($before_image) ? 'style="display:none;"' : ''; ?>>削除</button>
            <div class="sato-image-preview" id="works_before_image_preview">
                <?php if ($before_image) : ?>
                    <img src="<?php echo esc_url(wp_get_attachment_image_url($before_image, 'thumbnail')); ?>" alt="">
                <?php endif; ?>
            </div>
        </div>
        
        <div class="sato-meta-field">
            <label>施工後画像</label>
            <input type="hidden" id="works_after_image" name="works_after_image" value="<?php echo esc_attr($after_image); ?>">
            <button type="button" class="button sato-upload-image" data-target="works_after_image">画像を選択</button>
            <button type="button" class="button sato-remove-image" data-target="works_after_image" <?php echo empty($after_image) ? 'style="display:none;"' : ''; ?>>削除</button>
            <div class="sato-image-preview" id="works_after_image_preview">
                <?php if ($after_image) : ?>
                    <img src="<?php echo esc_url(wp_get_attachment_image_url($after_image, 'thumbnail')); ?>" alt="">
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php
}

/**
 * お客様の声メタボックスコールバック
 */
function sato_voice_meta_box_callback($post) {
    wp_nonce_field('sato_voice_meta_box', 'sato_voice_meta_box_nonce');
    
    $client_area = get_post_meta($post->ID, '_voice_client_area', true);
    $client_initial = get_post_meta($post->ID, '_voice_client_initial', true);
    $service_type = get_post_meta($post->ID, '_voice_service_type', true);
    $rating = get_post_meta($post->ID, '_voice_rating', true);
    $related_works = get_post_meta($post->ID, '_voice_related_works', true);
    ?>
    <style>
        .sato-meta-field { margin-bottom: 15px; }
        .sato-meta-field label { display: block; font-weight: bold; margin-bottom: 5px; }
        .sato-meta-field input[type="text"],
        .sato-meta-field select { width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; }
        .sato-rating-stars { display: flex; gap: 5px; }
        .sato-rating-stars input[type="radio"] { display: none; }
        .sato-rating-stars label { cursor: pointer; font-size: 24px; color: #ddd; }
        .sato-rating-stars input[type="radio"]:checked ~ label,
        .sato-rating-stars label:hover,
        .sato-rating-stars label:hover ~ label { color: #ffc107; }
    </style>
    <div class="sato-meta-field">
        <label for="voice_client_area">お客様エリア</label>
        <input type="text" id="voice_client_area" name="voice_client_area" value="<?php echo esc_attr($client_area); ?>" placeholder="例: 御殿場市">
    </div>
    
    <div class="sato-meta-field">
        <label for="voice_client_initial">お客様イニシャル</label>
        <input type="text" id="voice_client_initial" name="voice_client_initial" value="<?php echo esc_attr($client_initial); ?>" placeholder="例: S様">
    </div>
    
    <div class="sato-meta-field">
        <label for="voice_service_type">施工内容</label>
        <select id="voice_service_type" name="voice_service_type">
            <option value="">選択してください</option>
            <option value="外壁塗装" <?php selected($service_type, '外壁塗装'); ?>>外壁塗装</option>
            <option value="屋根塗装" <?php selected($service_type, '屋根塗装'); ?>>屋根塗装</option>
            <option value="外壁・屋根塗装" <?php selected($service_type, '外壁・屋根塗装'); ?>>外壁・屋根塗装</option>
            <option value="防水工事" <?php selected($service_type, '防水工事'); ?>>防水工事</option>
            <option value="内装塗装" <?php selected($service_type, '内装塗装'); ?>>内装塗装</option>
            <option value="その他" <?php selected($service_type, 'その他'); ?>>その他</option>
        </select>
    </div>
    
    <div class="sato-meta-field">
        <label>評価</label>
        <div class="sato-rating-stars">
            <?php for ($i = 5; $i >= 1; $i--) : ?>
                <input type="radio" id="rating_<?php echo $i; ?>" name="voice_rating" value="<?php echo $i; ?>" <?php checked($rating, $i); ?>>
                <label for="rating_<?php echo $i; ?>">★</label>
            <?php endfor; ?>
        </div>
    </div>
    
    <div class="sato-meta-field">
        <label for="voice_related_works">関連施工実績</label>
        <select id="voice_related_works" name="voice_related_works">
            <option value="">選択してください</option>
            <?php
            $works_posts = get_posts([
                'post_type' => 'works',
                'posts_per_page' => -1,
                'orderby' => 'date',
                'order' => 'DESC',
            ]);
            foreach ($works_posts as $works_post) :
            ?>
                <option value="<?php echo $works_post->ID; ?>" <?php selected($related_works, $works_post->ID); ?>>
                    <?php echo esc_html($works_post->post_title); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <?php
}

/**
 * FAQメタボックスコールバック
 */
function sato_faq_meta_box_callback($post) {
    wp_nonce_field('sato_faq_meta_box', 'sato_faq_meta_box_nonce');
    
    $display_order = get_post_meta($post->ID, '_faq_display_order', true);
    $is_featured = get_post_meta($post->ID, '_faq_is_featured', true);
    ?>
    <div class="sato-meta-field">
        <label for="faq_display_order">表示順序</label>
        <input type="number" id="faq_display_order" name="faq_display_order" value="<?php echo esc_attr($display_order); ?>" min="0" style="width: 100%;">
        <p class="description">数字が小さいほど上に表示されます</p>
    </div>
    
    <div class="sato-meta-field" style="margin-top: 15px;">
        <label>
            <input type="checkbox" name="faq_is_featured" value="1" <?php checked($is_featured, '1'); ?>>
            トップページに表示する
        </label>
    </div>
    <?php
}

/**
 * メタボックスの保存処理
 */
function sato_save_meta_boxes($post_id) {
    // 施工実績
    if (isset($_POST['sato_works_meta_box_nonce']) && wp_verify_nonce($_POST['sato_works_meta_box_nonce'], 'sato_works_meta_box')) {
        $works_fields = [
            'works_completion_date' => '_works_completion_date',
            'works_building_type'   => '_works_building_type',
            'works_period'          => '_works_period',
            'works_cost'            => '_works_cost',
            'works_paint_used'      => '_works_paint_used',
            'works_client_name'     => '_works_client_name',
            'works_before_image'    => '_works_before_image',
            'works_after_image'     => '_works_after_image',
        ];
        
        foreach ($works_fields as $field => $meta_key) {
            if (isset($_POST[$field])) {
                update_post_meta($post_id, $meta_key, sanitize_text_field($_POST[$field]));
            }
        }
    }

    // お客様の声
    if (isset($_POST['sato_voice_meta_box_nonce']) && wp_verify_nonce($_POST['sato_voice_meta_box_nonce'], 'sato_voice_meta_box')) {
        $voice_fields = [
            'voice_client_area'    => '_voice_client_area',
            'voice_client_initial' => '_voice_client_initial',
            'voice_service_type'   => '_voice_service_type',
            'voice_rating'         => '_voice_rating',
            'voice_related_works'  => '_voice_related_works',
        ];
        
        foreach ($voice_fields as $field => $meta_key) {
            if (isset($_POST[$field])) {
                update_post_meta($post_id, $meta_key, sanitize_text_field($_POST[$field]));
            }
        }
    }

    // FAQ
    if (isset($_POST['sato_faq_meta_box_nonce']) && wp_verify_nonce($_POST['sato_faq_meta_box_nonce'], 'sato_faq_meta_box')) {
        if (isset($_POST['faq_display_order'])) {
            update_post_meta($post_id, '_faq_display_order', intval($_POST['faq_display_order']));
        }
        update_post_meta($post_id, '_faq_is_featured', isset($_POST['faq_is_featured']) ? '1' : '0');
    }
}
add_action('save_post', 'sato_save_meta_boxes');

/**
 * =============================================================================
 * 管理画面用スクリプト（メディアアップローダー）
 * =============================================================================
 */
function sato_admin_scripts($hook) {
    global $post;
    
    if ($hook === 'post-new.php' || $hook === 'post.php') {
        if (isset($post) && in_array($post->post_type, ['works', 'voice', 'staff'])) {
            wp_enqueue_media();
            wp_enqueue_script('sato-admin', SATO_THEME_URI . '/assets/js/admin.js', ['jquery'], SATO_THEME_VERSION, true);
        }
    }
}
add_action('admin_enqueue_scripts', 'sato_admin_scripts');

/**
 * =============================================================================
 * スタイル・スクリプト読み込み
 * =============================================================================
 */
function sato_enqueue_assets() {
    // Google Fonts
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700;900&family=Noto+Serif+JP:wght@400;500;700&display=swap',
        [],
        null
    );

    // 1. 基本のstyle.css (メインスタイル)
    wp_enqueue_style(
        'sato-style',
        get_stylesheet_uri(),
        ['google-fonts'],
        SATO_THEME_VERSION
    );

    // 2. ヘッダー・フッター用CSS
    wp_enqueue_style(
        'sato-header-css',
        SATO_THEME_ASSETS . '/css/header.css',
        ['sato-style'],
        SATO_THEME_VERSION
    );
    wp_enqueue_style(
        'sato-footer-css',
        SATO_THEME_ASSETS . '/css/footer.css',
        ['sato-style'],
        SATO_THEME_VERSION
    );

    // 3. フロントページ専用CSS (トップページのみ読み込み)
    if (is_front_page()) {
        wp_enqueue_style(
            'sato-front-page-css',
            SATO_THEME_ASSETS . '/css/front-page.css',
            ['sato-style', 'sato-header-css', 'sato-footer-css'],
            SATO_THEME_VERSION
        );
    }

    // --- JavaScript ---

    // Slick Slider CSS（施工実績スライダー用）
    wp_enqueue_style(
        'slick-css',
        'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css',
        [],
        '1.8.1'
    );
    wp_enqueue_style(
        'slick-theme-css',
        'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css',
        ['slick-css'],
        '1.8.1'
    );

    // jQuery
    wp_enqueue_script('jquery');

    // Slick Slider JS
    wp_enqueue_script(
        'slick-js',
        'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js',
        ['jquery'],
        '1.8.1',
        true
    );

    // GSAP (アニメーション)
    wp_enqueue_script(
        'gsap',
        'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js',
        [],
        '3.12.5',
        true
    );
    wp_enqueue_script(
        'gsap-scrolltrigger',
        'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js',
        ['gsap'],
        '3.12.5',
        true
    );

    // 4. ヘッダー・フッター用JS
    wp_enqueue_script(
        'sato-header-js',
        SATO_THEME_ASSETS . '/js/header.js',
        ['jquery'],
        SATO_THEME_VERSION,
        true
    );
    wp_enqueue_script(
        'sato-footer-js',
        SATO_THEME_ASSETS . '/js/footer.js',
        ['jquery'],
        SATO_THEME_VERSION,
        true
    );

    // メインJS (スライダー初期化など)
    // ※ファイルの存在確認をしてから読み込む
    if (file_exists(SATO_THEME_DIR . '/assets/js/main.js')) {
        wp_enqueue_script(
            'sato-main-js',
            SATO_THEME_ASSETS . '/js/main.js',
            ['jquery', 'slick-js', 'gsap', 'gsap-scrolltrigger'],
            SATO_THEME_VERSION,
            true
        );
    }

    // PHPの値をJSに渡す (header.js 等で使用)
    wp_localize_script('sato-header-js', 'satoData', [
        'ajaxUrl'     => admin_url('admin-ajax.php'),
        'homeUrl'     => home_url('/'),
        'themeUrl'    => SATO_THEME_URI,
        'nonce'       => wp_create_nonce('sato_ajax_nonce'),
        'phone'       => sato_get_phone(),
        'phoneLink'   => sato_get_phone_link(),
        'lineId'      => get_theme_mod('sato_line_id', ''),
    ]);
}
add_action('wp_enqueue_scripts', 'sato_enqueue_assets');

/**
 * =============================================================================
 * カスタマイザー設定
 * =============================================================================
 */
function sato_customize_register($wp_customize) {
    
    /**
     * ========================================
     * 会社情報セクション
     * ========================================
     */
    $wp_customize->add_section('sato_company_info', [
        'title'       => '会社情報',
        'priority'    => 30,
        'description' => '会社の基本情報を設定します',
    ]);

    // 会社名
    $wp_customize->add_setting('sato_company_name', [
        'default'           => 'サトー建装',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ]);
    $wp_customize->add_control('sato_company_name', [
        'label'   => '会社名',
        'section' => 'sato_company_info',
        'type'    => 'text',
    ]);

    // 会社名（正式名称）
    $wp_customize->add_setting('sato_company_name_full', [
        'default'           => '株式会社サトー建装',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('sato_company_name_full', [
        'label'   => '会社名（正式名称）',
        'section' => 'sato_company_info',
        'type'    => 'text',
    ]);

    // キャッチコピー
    $wp_customize->add_setting('sato_catchphrase', [
        'default'           => '御殿場市・静岡県東部の外壁塗装・屋根塗装専門店',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('sato_catchphrase', [
        'label'   => 'キャッチコピー',
        'section' => 'sato_company_info',
        'type'    => 'text',
    ]);

    // 電話番号
    $wp_customize->add_setting('sato_phone', [
        'default'           => '0550-00-0000',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('sato_phone', [
        'label'   => '電話番号',
        'section' => 'sato_company_info',
        'type'    => 'tel',
    ]);

    // FAX番号
    $wp_customize->add_setting('sato_fax', [
        'default'           => '0550-00-0001',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('sato_fax', [
        'label'   => 'FAX番号',
        'section' => 'sato_company_info',
        'type'    => 'tel',
    ]);

    // メールアドレス
    $wp_customize->add_setting('sato_email', [
        'default'           => 'info@satokensou.com',
        'sanitize_callback' => 'sanitize_email',
    ]);
    $wp_customize->add_control('sato_email', [
        'label'   => 'メールアドレス',
        'section' => 'sato_company_info',
        'type'    => 'email',
    ]);

    // 郵便番号
    $wp_customize->add_setting('sato_zip', [
        'default'           => '〒412-0043',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('sato_zip', [
        'label'   => '郵便番号',
        'section' => 'sato_company_info',
        'type'    => 'text',
    ]);

    // 住所
    $wp_customize->add_setting('sato_address', [
        'default'           => '静岡県御殿場市新橋0000-0',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('sato_address', [
        'label'   => '住所',
        'section' => 'sato_company_info',
        'type'    => 'text',
    ]);

    // 営業時間
    $wp_customize->add_setting('sato_business_hours', [
        'default'           => '9:00〜18:00',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('sato_business_hours', [
        'label'   => '営業時間',
        'section' => 'sato_company_info',
        'type'    => 'text',
    ]);

    // 定休日
    $wp_customize->add_setting('sato_holiday', [
        'default'           => '日曜日・祝日',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('sato_holiday', [
        'label'   => '定休日',
        'section' => 'sato_company_info',
        'type'    => 'text',
    ]);

    // 代表者名
    $wp_customize->add_setting('sato_representative', [
        'default'           => '佐藤 太郎',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('sato_representative', [
        'label'   => '代表者名',
        'section' => 'sato_company_info',
        'type'    => 'text',
    ]);

    // 設立年
    $wp_customize->add_setting('sato_established', [
        'default'           => '2010年',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('sato_established', [
        'label'   => '設立年',
        'section' => 'sato_company_info',
        'type'    => 'text',
    ]);

    // 資本金
    $wp_customize->add_setting('sato_capital', [
        'default'           => '1,000万円',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('sato_capital', [
        'label'   => '資本金',
        'section' => 'sato_company_info',
        'type'    => 'text',
    ]);

    // 従業員数
    $wp_customize->add_setting('sato_employees', [
        'default'           => '10名',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('sato_employees', [
        'label'   => '従業員数',
        'section' => 'sato_company_info',
        'type'    => 'text',
    ]);

    // 建設業許可番号
    $wp_customize->add_setting('sato_license', [
        'default'           => '静岡県知事許可（般-00）第00000号',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('sato_license', [
        'label'   => '建設業許可番号',
        'section' => 'sato_company_info',
        'type'    => 'text',
    ]);

    /**
     * ========================================
     * SNS・外部サービスセクション
     * ========================================
     */
    $wp_customize->add_section('sato_sns', [
        'title'       => 'SNS・外部サービス',
        'priority'    => 35,
        'description' => 'SNSアカウントや外部サービスの設定',
    ]);

    // LINE ID
    $wp_customize->add_setting('sato_line_id', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('sato_line_id', [
        'label'       => 'LINE公式アカウントID',
        'section'     => 'sato_sns',
        'type'        => 'text',
        'description' => '例: @xxxxx',
    ]);

    // LINE URL
    $wp_customize->add_setting('sato_line_url', [
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control('sato_line_url', [
        'label'       => 'LINE友だち追加URL',
        'section'     => 'sato_sns',
        'type'        => 'url',
        'description' => '例: https://line.me/ti/p/@xxxxx',
    ]);

    // Instagram
    $wp_customize->add_setting('sato_instagram', [
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control('sato_instagram', [
        'label'   => 'Instagram URL',
        'section' => 'sato_sns',
        'type'    => 'url',
    ]);

    // Facebook
    $wp_customize->add_setting('sato_facebook', [
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control('sato_facebook', [
        'label'   => 'Facebook URL',
        'section' => 'sato_sns',
        'type'    => 'url',
    ]);

    // Twitter/X
    $wp_customize->add_setting('sato_twitter', [
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control('sato_twitter', [
        'label'   => 'Twitter/X URL',
        'section' => 'sato_sns',
        'type'    => 'url',
    ]);

    // YouTube
    $wp_customize->add_setting('sato_youtube', [
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control('sato_youtube', [
        'label'   => 'YouTube URL',
        'section' => 'sato_sns',
        'type'    => 'url',
    ]);

    // Googleマップ埋め込みURL
    $wp_customize->add_setting('sato_google_map', [
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control('sato_google_map', [
        'label'       => 'Googleマップ埋め込みURL',
        'section'     => 'sato_sns',
        'type'        => 'url',
        'description' => 'Googleマップの「共有」→「地図を埋め込む」のURLを入力',
    ]);

    /**
     * ========================================
     * ヒーローセクション
     * ========================================
     */
    $wp_customize->add_section('sato_hero', [
        'title'    => 'ヒーロー（メインビジュアル）',
        'priority' => 40,
    ]);

    // メインキャッチコピー1行目
    $wp_customize->add_setting('sato_hero_catch1', [
        'default'           => '住まいを守る、',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('sato_hero_catch1', [
        'label'   => 'メインキャッチコピー（1行目）',
        'section' => 'sato_hero',
        'type'    => 'text',
    ]);

    // メインキャッチコピー2行目
    $wp_customize->add_setting('sato_hero_catch2', [
        'default'           => '職人の技術と想い。',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('sato_hero_catch2', [
        'label'   => 'メインキャッチコピー（2行目）',
        'section' => 'sato_hero',
        'type'    => 'text',
    ]);

    // サブキャッチコピー
    $wp_customize->add_setting('sato_hero_subcatch', [
        'default'           => '国家資格 一級塗装技能士が施工する御殿場市の塗装専門店',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('sato_hero_subcatch', [
        'label'   => 'サブキャッチコピー',
        'section' => 'sato_hero',
        'type'    => 'text',
    ]);

    // ヒーロー背景画像1
    $wp_customize->add_setting('sato_hero_image_1', [
        'default'           => '',
        'sanitize_callback' => 'absint',
    ]);
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'sato_hero_image_1', [
        'label'     => 'ヒーロー背景画像1',
        'section'   => 'sato_hero',
        'mime_type' => 'image',
    ]));

    // ヒーロー背景画像2
    $wp_customize->add_setting('sato_hero_image_2', [
        'default'           => '',
        'sanitize_callback' => 'absint',
    ]);
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'sato_hero_image_2', [
        'label'     => 'ヒーロー背景画像2',
        'section'   => 'sato_hero',
        'mime_type' => 'image',
    ]));

    // ヒーロー背景画像3
    $wp_customize->add_setting('sato_hero_image_3', [
        'default'           => '',
        'sanitize_callback' => 'absint',
    ]);
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'sato_hero_image_3', [
        'label'     => 'ヒーロー背景画像3',
        'section'   => 'sato_hero',
        'mime_type' => 'image',
    ]));

    /**
     * ========================================
     * 選ばれる理由セクション
     * ========================================
     */
    $wp_customize->add_section('sato_reasons', [
        'title'    => '選ばれる理由',
        'priority' => 45,
    ]);

    for ($i = 1; $i <= 4; $i++) {
        // タイトル
        $wp_customize->add_setting("sato_reason_{$i}_title", [
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        ]);
        $wp_customize->add_control("sato_reason_{$i}_title", [
            'label'   => "理由{$i}: タイトル",
            'section' => 'sato_reasons',
            'type'    => 'text',
        ]);

        // 説明文
        $wp_customize->add_setting("sato_reason_{$i}_text", [
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post',
        ]);
        $wp_customize->add_control("sato_reason_{$i}_text", [
            'label'   => "理由{$i}: 説明文",
            'section' => 'sato_reasons',
            'type'    => 'textarea',
        ]);

        // 画像
        $wp_customize->add_setting("sato_reason_{$i}_image", [
            'default'           => '',
            'sanitize_callback' => 'absint',
        ]);
        $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, "sato_reason_{$i}_image", [
            'label'     => "理由{$i}: 画像",
            'section'   => 'sato_reasons',
            'mime_type' => 'image',
        ]));
    }

    /**
     * ========================================
     * 料金プランセクション
     * ========================================
     */
    $wp_customize->add_section('sato_pricing', [
        'title'    => '料金プラン',
        'priority' => 50,
    ]);

    $plans = ['standard' => 'スタンダード', 'recommended' => 'おすすめ', 'premium' => 'プレミアム'];
    foreach ($plans as $key => $label) {
        // プラン名
        $wp_customize->add_setting("sato_plan_{$key}_name", [
            'default'           => "{$label}プラン",
            'sanitize_callback' => 'sanitize_text_field',
        ]);
        $wp_customize->add_control("sato_plan_{$key}_name", [
            'label'   => "{$label}プラン: プラン名",
            'section' => 'sato_pricing',
            'type'    => 'text',
        ]);

        // 価格
        $wp_customize->add_setting("sato_plan_{$key}_price", [
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        ]);
        $wp_customize->add_control("sato_plan_{$key}_price", [
            'label'   => "{$label}プラン: 価格",
            'section' => 'sato_pricing',
            'type'    => 'text',
            'description' => '例: 49.8万円〜',
        ]);

        // 特徴（複数行）
        $wp_customize->add_setting("sato_plan_{$key}_features", [
            'default'           => '',
            'sanitize_callback' => 'sanitize_textarea_field',
        ]);
        $wp_customize->add_control("sato_plan_{$key}_features", [
            'label'   => "{$label}プラン: 特徴",
            'section' => 'sato_pricing',
            'type'    => 'textarea',
            'description' => '1行に1つの特徴を入力（改行区切り）',
        ]);

        // 保証年数
        $wp_customize->add_setting("sato_plan_{$key}_warranty", [
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        ]);
        $wp_customize->add_control("sato_plan_{$key}_warranty", [
            'label'   => "{$label}プラン: 保証年数",
            'section' => 'sato_pricing',
            'type'    => 'text',
            'description' => '例: 5年保証',
        ]);
    }

    /**
     * ========================================
     * 代表挨拶セクション
     * ========================================
     */
    $wp_customize->add_section('sato_greeting', [
        'title'    => '代表挨拶',
        'priority' => 55,
    ]);

    // 代表者写真
    $wp_customize->add_setting('sato_greeting_image', [
        'default'           => '',
        'sanitize_callback' => 'absint',
    ]);
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'sato_greeting_image', [
        'label'     => '代表者写真',
        'section'   => 'sato_greeting',
        'mime_type' => 'image',
    ]));

    // 挨拶文
    $wp_customize->add_setting('sato_greeting_text', [
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post',
    ]);
    $wp_customize->add_control('sato_greeting_text', [
        'label'   => '挨拶文',
        'section' => 'sato_greeting',
        'type'    => 'textarea',
    ]);

    // 保有資格
    $wp_customize->add_setting('sato_greeting_qualifications', [
        'default'           => '一級建築塗装技能士',
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);
    $wp_customize->add_control('sato_greeting_qualifications', [
        'label'       => '保有資格',
        'section'     => 'sato_greeting',
        'type'        => 'textarea',
        'description' => '1行に1つの資格を入力（改行区切り）',
    ]);

    /**
     * ========================================
     * CTA（コールトゥアクション）セクション
     * ========================================
     */
    $wp_customize->add_section('sato_cta', [
        'title'    => 'CTA設定',
        'priority' => 60,
    ]);

    // CTAタイトル
    $wp_customize->add_setting('sato_cta_title', [
        'default'           => 'まずはお気軽にご相談ください',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('sato_cta_title', [
        'label'   => 'CTAタイトル',
        'section' => 'sato_cta',
        'type'    => 'text',
    ]);

    // CTAサブテキスト
    $wp_customize->add_setting('sato_cta_text', [
        'default'           => 'お見積もり・ご相談は無料です。お気軽にお問い合わせください。',
        'sanitize_callback' => 'wp_kses_post',
    ]);
    $wp_customize->add_control('sato_cta_text', [
        'label'   => 'CTAサブテキスト',
        'section' => 'sato_cta',
        'type'    => 'textarea',
    ]);

    // キャンペーンテキスト
    $wp_customize->add_setting('sato_cta_campaign', [
        'default'           => 'WEB・LINE申込みで見積もりから5%還元',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('sato_cta_campaign', [
        'label'   => 'キャンペーンテキスト',
        'section' => 'sato_cta',
        'type'    => 'text',
    ]);

    /**
     * ========================================
     * 対応エリアセクション
     * ========================================
     */
    $wp_customize->add_section('sato_area', [
        'title'    => '対応エリア',
        'priority' => 65,
    ]);

    // 対応エリア（テキスト）
    $wp_customize->add_setting('sato_service_areas', [
        'default'           => "御殿場市\n裾野市\n三島市\n沼津市\n富士市\n富士宮市\n長泉町\n清水町",
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);
    $wp_customize->add_control('sato_service_areas', [
        'label'       => '対応エリア',
        'section'     => 'sato_area',
        'type'        => 'textarea',
        'description' => '1行に1つのエリアを入力（改行区切り）',
    ]);

    // エリア補足テキスト
    $wp_customize->add_setting('sato_area_note', [
        'default'           => 'その他、静岡県東部エリアもご対応可能です。まずはお気軽にお問い合わせください。',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('sato_area_note', [
        'label'   => 'エリア補足テキスト',
        'section' => 'sato_area',
        'type'    => 'textarea',
    ]);

    /**
     * ========================================
     * 保証・アフターサポートセクション
     * ========================================
     */
    $wp_customize->add_section('sato_warranty', [
        'title'    => '保証・アフターサポート',
        'priority' => 70,
    ]);

    // 最長保証年数
    $wp_customize->add_setting('sato_warranty_years', [
        'default'           => '15',
        'sanitize_callback' => 'absint',
    ]);
    $wp_customize->add_control('sato_warranty_years', [
        'label'   => '最長保証年数',
        'section' => 'sato_warranty',
        'type'    => 'number',
    ]);

    // 保証内容テキスト
    $wp_customize->add_setting('sato_warranty_text', [
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post',
    ]);
    $wp_customize->add_control('sato_warranty_text', [
        'label'   => '保証内容テキスト',
        'section' => 'sato_warranty',
        'type'    => 'textarea',
    ]);

    // 保証書画像
    $wp_customize->add_setting('sato_warranty_image', [
        'default'           => '',
        'sanitize_callback' => 'absint',
    ]);
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'sato_warranty_image', [
        'label'     => '保証書画像',
        'section'   => 'sato_warranty',
        'mime_type' => 'image',
    ]));
}
add_action('customize_register', 'sato_customize_register');

/**
 * =============================================================================
 * ヘルパー関数
 * =============================================================================
 */

/**
 * 電話番号を取得
 */
function sato_get_phone() {
    return get_theme_mod('sato_phone', '0550-00-0000');
}

/**
 * 電話番号リンクを取得
 */
function sato_get_phone_link() {
    $phone = sato_get_phone();
    return 'tel:' . preg_replace('/[^0-9]/', '', $phone);
}

/**
 * LINE URLを取得
 */
function sato_get_line_url() {
    $line_url = get_theme_mod('sato_line_url', '');
    if ($line_url) {
        return $line_url;
    }
    $line_id = get_theme_mod('sato_line_id', '');
    if ($line_id) {
        return 'https://line.me/ti/p/' . $line_id;
    }
    return '';
}

/**
 * SVGアイコンを取得 (sato_get_icon と sato_get_svg_icon の両方を定義して互換性を確保)
 */
function sato_get_svg_icon($name, $size = 24) {
    // クラス属性などを追加したい場合は第2引数を調整するか、呼び出し側で対応
    // ここではシンプルにSVG文字列を返す
    $icons = [
        'clock' => '<svg xmlns="http://www.w3.org/2000/svg" width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>',
        
        'calendar' => '<svg xmlns="http://www.w3.org/2000/svg" width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>',
        
        'home' => '<svg xmlns="http://www.w3.org/2000/svg" width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>',
        
        'check' => '<svg xmlns="http://www.w3.org/2000/svg" width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>',

        'check-circle' => '<svg xmlns="http://www.w3.org/2000/svg" width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>',
        
        'paint-roller' => '<svg xmlns="http://www.w3.org/2000/svg" width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="18" height="6" rx="1"/><path d="M20 6h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-5"/><path d="M12 11v8a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1v-8"/></svg>',
        
        'brush' => '<svg xmlns="http://www.w3.org/2000/svg" width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9.06 11.9l8.07-8.06a2.85 2.85 0 1 1 4.03 4.03l-8.06 8.08"/><path d="M7.07 14.94c-1.66 0-3 1.35-3 3.02 0 1.33-2.5 1.52-2 2.02 1.08 1.1 2.49 2.02 4 2.02 2.2 0 4-1.8 4-4.04a3.01 3.01 0 0 0-3-3.02z"/></svg>',

        'shield' => '<svg xmlns="http://www.w3.org/2000/svg" width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',

        'water' => '<svg xmlns="http://www.w3.org/2000/svg" width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2.69l5.74 5.74c1.54 1.54 2.41 3.63 2.41 5.81a8.13 8.13 0 0 1-16.26 0c0-2.18.87-4.27 2.41-5.81L12 2.69z"/></svg>',

        'images' => '<svg xmlns="http://www.w3.org/2000/svg" width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="M21 15l-5-5L5 21"/></svg>',
        
        'yen' => '<svg xmlns="http://www.w3.org/2000/svg" width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2L6 12h12L12 2z"/><path d="M6 14h12"/><path d="M6 18h12"/><path d="M12 14v8"/></svg>',
        
        'message-circle' => '<svg xmlns="http://www.w3.org/2000/svg" width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>',
        
        'help-circle' => '<svg xmlns="http://www.w3.org/2000/svg" width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>',
        
        'list-ordered' => '<svg xmlns="http://www.w3.org/2000/svg" width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="10" y1="6" x2="21" y2="6"/><line x1="10" y1="12" x2="21" y2="12"/><line x1="10" y1="18" x2="21" y2="18"/><path d="M4 6h1v4"/><path d="M4 10h2"/><path d="M6 18H4c0-1 2-2 2-3s-1-1.5-2-1"/></svg>',
        
        'building' => '<svg xmlns="http://www.w3.org/2000/svg" width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18"/><path d="M9 21V9"/></svg>',
        
        'newspaper' => '<svg xmlns="http://www.w3.org/2000/svg" width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2"/><path d="M18 14h-8"/><path d="M15 18h-5"/><path d="M10 6h8v4h-8z"/></svg>',
        
        'close' => '<svg xmlns="http://www.w3.org/2000/svg" width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>',
        
        'phone' => '<svg xmlns="http://www.w3.org/2000/svg" width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>',
        
        'mail' => '<svg xmlns="http://www.w3.org/2000/svg" width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>',
        
        'line' => '<svg xmlns="http://www.w3.org/2000/svg" width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="currentColor"><path d="M19.365 9.863c.349 0 .63.285.63.631 0 .345-.281.63-.63.63H17.61v1.125h1.755c.349 0 .63.283.63.63 0 .344-.281.629-.63.629h-2.386c-.345 0-.627-.285-.627-.629V8.108c0-.345.282-.63.627-.63h2.386c.349 0 .63.285.63.63 0 .349-.281.63-.63.63H17.61v1.125h1.755zm-3.855 3.016c0 .27-.174.51-.432.596-.064.021-.133.031-.199.031-.211 0-.391-.09-.51-.25l-2.443-3.317v2.94c0 .344-.279.629-.631.629-.346 0-.626-.285-.626-.629V8.108c0-.27.173-.51.43-.595.06-.023.136-.033.194-.033.195 0 .375.104.495.254l2.462 3.33V8.108c0-.345.282-.63.63-.63.345 0 .63.285.63.63v4.771zm-5.741 0c0 .344-.282.629-.631.629-.345 0-.627-.285-.627-.629V8.108c0-.345.282-.63.627-.63.349 0 .631.285.631.63v4.771zm-2.466.629H4.917c-.345 0-.63-.285-.63-.629V8.108c0-.345.285-.63.63-.63.348 0 .63.285.63.63v4.141h1.756c.348 0 .629.283.629.63 0 .344-.282.629-.629.629M24 10.314C24 4.943 18.615.572 12 .572S0 4.943 0 10.314c0 4.811 4.27 8.842 10.035 9.608.391.082.923.258 1.058.59.12.301.079.766.038 1.08l-.164 1.02c-.045.301-.24 1.186 1.049.645 1.291-.539 6.916-4.078 9.436-6.975C23.176 14.393 24 12.458 24 10.314"/></svg>',
        
        'instagram' => '<svg xmlns="http://www.w3.org/2000/svg" width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>',
        
        'facebook' => '<svg xmlns="http://www.w3.org/2000/svg" width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>',
        
        'twitter' => '<svg class="icon ' . esc_attr($class) . '" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>',
        
        'youtube' => '<svg class="icon ' . esc_attr($class) . '" viewBox="0 0 24 24" fill="currentColor"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>',
        
        'map-pin' => '<svg class="icon ' . esc_attr($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>',
        
        'award' => '<svg class="icon ' . esc_attr($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="8" r="7"/><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"/></svg>',
        
        'users' => '<svg class="icon ' . esc_attr($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>',
        
        'star' => '<svg class="icon ' . esc_attr($class) . '" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>',
        
        'star-outline' => '<svg class="icon ' . esc_attr($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>',
        
        'quote' => '<svg class="icon ' . esc_attr($class) . '" viewBox="0 0 24 24" fill="currentColor"><path d="M6 17h3l2-4V7H5v6h3zm8 0h3l2-4V7h-6v6h3z"/></svg>',
        
        'image' => '<svg class="icon ' . esc_attr($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>',
        
        'chevron-right' => '<svg class="icon ' . esc_attr($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>',
        
        'chevron-down' => '<svg class="icon ' . esc_attr($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>',
        
        'arrow-right' => '<svg class="icon ' . esc_attr($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>',
        
    ];

    return isset($icons[$name]) ? $icons[$name] : '';
}

// 互換性のため古い関数も残す（SVG版を呼び出すラッパーとする）
function sato_get_icon($name, $class = '') {
    return sato_get_svg_icon($name);
}

/**
 * 評価の星を出力
 */
function sato_rating_stars($rating, $max = 5) {
    $output = '<div class="rating-stars">';
    for ($i = 1; $i <= $max; $i++) {
        if ($i <= $rating) {
            $output .= sato_get_svg_icon('star');
        } else {
            $output .= sato_get_svg_icon('star-outline');
        }
    }
    $output .= '</div>';
    return $output;
}

/**
 * 抜粋の文字数を変更
 */
function sato_excerpt_length($length) {
    return 80;
}
add_filter('excerpt_length', 'sato_excerpt_length');

/**
 * 抜粋の省略記号を変更
 */
function sato_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'sato_excerpt_more');

/**
 * =============================================================================
 * ウィジェットエリア登録
 * =============================================================================
 */
function sato_widgets_init() {
    // サイドバー
    register_sidebar([
        'name'          => 'サイドバー',
        'id'            => 'sidebar-1',
        'description'   => 'ブログページなどのサイドバー',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ]);

    // フッターウィジェット1
    register_sidebar([
        'name'          => 'フッターウィジェット1',
        'id'            => 'footer-1',
        'description'   => 'フッター左側',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ]);

    // フッターウィジェット2
    register_sidebar([
        'name'          => 'フッターウィジェット2',
        'id'            => 'footer-2',
        'description'   => 'フッター中央',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ]);

    // フッターウィジェット3
    register_sidebar([
        'name'          => 'フッターウィジェット3',
        'id'            => 'footer-3',
        'description'   => 'フッター右側',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ]);
}
add_action('widgets_init', 'sato_widgets_init');

/**
 * =============================================================================
 * Contact Form 7 設定
 * =============================================================================
 */
// 自動Pタグ無効化
add_filter('wpcf7_autop_or_not', '__return_false');

// 送信完了後のリダイレクト用スクリプト
function sato_cf7_redirect_script() {
    if (!is_page('contact')) return;
    ?>
    <script>
    document.addEventListener('wpcf7mailsent', function(event) {
        location.href = '<?php echo home_url('/thanks/'); ?>';
    }, false);
    </script>
    <?php
}
add_action('wp_footer', 'sato_cf7_redirect_script');

/**
 * =============================================================================
 * AJAX処理
 * =============================================================================
 */

/**
 * 施工実績をもっと読み込む
 */
function sato_load_more_works() {
    check_ajax_referer('sato_ajax_nonce', 'nonce');
    
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $category = isset($_POST['category']) ? sanitize_text_field($_POST['category']) : '';
    $area = isset($_POST['area']) ? sanitize_text_field($_POST['area']) : '';
    
    $args = [
        'post_type'      => 'works',
        'posts_per_page' => 6,
        'paged'          => $page,
        'post_status'    => 'publish',
    ];
    
    if ($category) {
        $args['tax_query'][] = [
            'taxonomy' => 'works_category',
            'field'    => 'slug',
            'terms'    => $category,
        ];
    }
    
    if ($area) {
        $args['tax_query'][] = [
            'taxonomy' => 'works_area',
            'field'    => 'slug',
            'terms'    => $area,
        ];
    }
    
    $query = new WP_Query($args);
    
    if ($query->have_posts()) {
        ob_start();
        while ($query->have_posts()) {
            $query->the_post();
            get_template_part('template-parts/content', 'works-card');
        }
        wp_reset_postdata();
        
        wp_send_json_success([
            'html'     => ob_get_clean(),
            'has_more' => $query->max_num_pages > $page,
        ]);
    } else {
        wp_send_json_error(['message' => '施工実績がありません']);
    }
}
add_action('wp_ajax_sato_load_more_works', 'sato_load_more_works');
add_action('wp_ajax_nopriv_sato_load_more_works', 'sato_load_more_works');

/**
 * =============================================================================
 * パーマリンク設定
 * =============================================================================
 */
function sato_flush_rewrite_rules() {
    sato_register_post_types();
    sato_register_taxonomies();
    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'sato_flush_rewrite_rules');

/**
 * =============================================================================
 * セキュリティ・パフォーマンス設定
 * =============================================================================
 */

// WordPressバージョン情報を削除
remove_action('wp_head', 'wp_generator');

// 絵文字関連のスクリプト削除
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

// RSD/WLW リンク削除
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');

// 短縮リンク削除
remove_action('wp_head', 'wp_shortlink_wp_head');

// SVGアップロード許可
function sato_allow_svg($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'sato_allow_svg');

// SVGサニタイズ
function sato_sanitize_svg($data, $file, $filename, $mimes) {
    $filetype = wp_check_filetype($filename, $mimes);
    
    if ('svg' === $filetype['ext']) {
        $data['ext'] = 'svg';
        $data['type'] = 'image/svg+xml';
    }
    
    return $data;
}
add_filter('wp_check_filetype_and_ext', 'sato_sanitize_svg', 10, 4);

/**
 * =============================================================================
 * 管理画面カスタマイズ
 * =============================================================================
 */

// 管理画面フッターテキスト変更
function sato_admin_footer_text() {
    return '<span id="footer-thankyou">サトー建装 公式Webサイトテーマ</span>';
}
add_filter('admin_footer_text', 'sato_admin_footer_text');

// ダッシュボードにカスタム投稿タイプの統計を追加
function sato_dashboard_glance_items($items) {
    $post_types = ['works', 'voice', 'faq', 'news'];
    
    foreach ($post_types as $type) {
        $count = wp_count_posts($type);
        if ($count) {
            $published = intval($count->publish);
            $post_type_obj = get_post_type_object($type);
            $text = number_format_i18n($published) . ' ' . $post_type_obj->labels->name;
            $items[] = sprintf('<a class="%1$s-count" href="edit.php?post_type=%1$s">%2$s</a>', $type, $text);
        }
    }
    
    return $items;
}
add_filter('dashboard_glance_items', 'sato_dashboard_glance_items');

// カスタム投稿タイプのカラムカスタマイズ（施工実績）
function sato_works_columns($columns) {
    $new_columns = [];
    foreach ($columns as $key => $value) {
        if ($key === 'title') {
            $new_columns[$key] = $value;
            $new_columns['thumbnail'] = 'サムネイル';
            $new_columns['works_category'] = 'カテゴリー';
            $new_columns['works_area'] = 'エリア';
            $new_columns['completion_date'] = '完成日';
        } else {
            $new_columns[$key] = $value;
        }
    }
    return $new_columns;
}
add_filter('manage_works_posts_columns', 'sato_works_columns');

function sato_works_custom_column($column, $post_id) {
    switch ($column) {
        case 'thumbnail':
            if (has_post_thumbnail($post_id)) {
                echo get_the_post_thumbnail($post_id, [60, 60]);
            } else {
                echo '—';
            }
            break;
        case 'works_category':
            $terms = get_the_terms($post_id, 'works_category');
            if ($terms && !is_wp_error($terms)) {
                $term_names = wp_list_pluck($terms, 'name');
                echo implode(', ', $term_names);
            } else {
                echo '—';
            }
            break;
        case 'works_area':
            $terms = get_the_terms($post_id, 'works_area');
            if ($terms && !is_wp_error($terms)) {
                $term_names = wp_list_pluck($terms, 'name');
                echo implode(', ', $term_names);
            } else {
                echo '—';
            }
            break;
        case 'completion_date':
            $date = get_post_meta($post_id, '_works_completion_date', true);
            echo $date ? date_i18n('Y年n月', strtotime($date)) : '—';
            break;
    }
}
add_action('manage_works_posts_custom_column', 'sato_works_custom_column', 10, 2);

// カスタム投稿タイプのカラムカスタマイズ（お客様の声）
function sato_voice_columns($columns) {
    $new_columns = [];
    foreach ($columns as $key => $value) {
        if ($key === 'title') {
            $new_columns[$key] = $value;
            $new_columns['client_info'] = 'お客様情報';
            $new_columns['service_type'] = '施工内容';
            $new_columns['rating'] = '評価';
        } else {
            $new_columns[$key] = $value;
        }
    }
    return $new_columns;
}
add_filter('manage_voice_posts_columns', 'sato_voice_columns');

function sato_voice_custom_column($column, $post_id) {
    switch ($column) {
        case 'client_info':
            $area = get_post_meta($post_id, '_voice_client_area', true);
            $initial = get_post_meta($post_id, '_voice_client_initial', true);
            echo esc_html($area . ' ' . $initial);
            break;
        case 'service_type':
            $type = get_post_meta($post_id, '_voice_service_type', true);
            echo $type ? esc_html($type) : '—';
            break;
        case 'rating':
            $rating = get_post_meta($post_id, '_voice_rating', true);
            if ($rating) {
                echo str_repeat('★', intval($rating)) . str_repeat('☆', 5 - intval($rating));
            } else {
                echo '—';
            }
            break;
    }
}
add_action('manage_voice_posts_custom_column', 'sato_voice_custom_column', 10, 2);

/**
 * =============================================================================
 * パンくずリスト生成
 * =============================================================================
 */
function sato_breadcrumb() {
    if (is_front_page()) return;
    
    $separator = '<span class="breadcrumb-separator">' . sato_get_svg_icon('chevron-right') . '</span>';
    $home_text = 'ホーム';
    
    echo '<nav class="breadcrumb" aria-label="パンくずリスト">';
    echo '<ol class="breadcrumb-list" itemscope itemtype="https://schema.org/BreadcrumbList">';
    
    // ホーム
    echo '<li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">';
    echo '<a href="' . home_url('/') . '" itemprop="item"><span itemprop="name">' . $home_text . '</span></a>';
    echo '<meta itemprop="position" content="1" />';
    echo '</li>';
    
    $position = 2;
    
    if (is_single()) {
        $post_type = get_post_type();
        
        if ($post_type !== 'post') {
            $post_type_obj = get_post_type_object($post_type);
            echo $separator;
            echo '<li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">';
            echo '<a href="' . get_post_type_archive_link($post_type) . '" itemprop="item"><span itemprop="name">' . $post_type_obj->labels->name . '</span></a>';
            echo '<meta itemprop="position" content="' . $position++ . '" />';
            echo '</li>';
        } else {
            $categories = get_the_category();
            if ($categories) {
                echo $separator;
                echo '<li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">';
                echo '<a href="' . get_category_link($categories[0]->term_id) . '" itemprop="item"><span itemprop="name">' . $categories[0]->name . '</span></a>';
                echo '<meta itemprop="position" content="' . $position++ . '" />';
                echo '</li>';
            }
        }
        
        echo $separator;
        echo '<li class="breadcrumb-item current" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">';
        echo '<span itemprop="name">' . get_the_title() . '</span>';
        echo '<meta itemprop="position" content="' . $position . '" />';
        echo '</li>';
        
    } elseif (is_page()) {
        global $post;
        
        if ($post->post_parent) {
            $ancestors = array_reverse(get_post_ancestors($post->ID));
            foreach ($ancestors as $ancestor) {
                echo $separator;
                echo '<li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">';
                echo '<a href="' . get_permalink($ancestor) . '" itemprop="item"><span itemprop="name">' . get_the_title($ancestor) . '</span></a>';
                echo '<meta itemprop="position" content="' . $position++ . '" />';
                echo '</li>';
            }
        }
        
        echo $separator;
        echo '<li class="breadcrumb-item current" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">';
        echo '<span itemprop="name">' . get_the_title() . '</span>';
        echo '<meta itemprop="position" content="' . $position . '" />';
        echo '</li>';
        
    } elseif (is_post_type_archive()) {
        $post_type_obj = get_post_type_object(get_post_type());
        echo $separator;
        echo '<li class="breadcrumb-item current" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">';
        echo '<span itemprop="name">' . $post_type_obj->labels->name . '</span>';
        echo '<meta itemprop="position" content="' . $position . '" />';
        echo '</li>';
        
    } elseif (is_tax()) {
        $term = get_queried_object();
        $taxonomy = get_taxonomy($term->taxonomy);
        
        // 関連する投稿タイプのアーカイブリンク
        if (!empty($taxonomy->object_type)) {
            $post_type = $taxonomy->object_type[0];
            $post_type_obj = get_post_type_object($post_type);
            echo $separator;
            echo '<li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">';
            echo '<a href="' . get_post_type_archive_link($post_type) . '" itemprop="item"><span itemprop="name">' . $post_type_obj->labels->name . '</span></a>';
            echo '<meta itemprop="position" content="' . $position++ . '" />';
            echo '</li>';
        }
        
        echo $separator;
        echo '<li class="breadcrumb-item current" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">';
        echo '<span itemprop="name">' . $term->name . '</span>';
        echo '<meta itemprop="position" content="' . $position . '" />';
        echo '</li>';
        
    } elseif (is_category()) {
        $category = get_queried_object();
        echo $separator;
        echo '<li class="breadcrumb-item current" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">';
        echo '<span itemprop="name">' . $category->name . '</span>';
        echo '<meta itemprop="position" content="' . $position . '" />';
        echo '</li>';
        
    } elseif (is_tag()) {
        $tag = get_queried_object();
        echo $separator;
        echo '<li class="breadcrumb-item current" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">';
        echo '<span itemprop="name">' . $tag->name . '</span>';
        echo '<meta itemprop="position" content="' . $position . '" />';
        echo '</li>';
        
    } elseif (is_search()) {
        echo $separator;
        echo '<li class="breadcrumb-item current">';
        echo '<span>「' . get_search_query() . '」の検索結果</span>';
        echo '</li>';
        
    } elseif (is_404()) {
        echo $separator;
        echo '<li class="breadcrumb-item current">';
        echo '<span>ページが見つかりません</span>';
        echo '</li>';
    }
    
    echo '</ol>';
    echo '</nav>';
}

/**
 * =============================================================================
 * テーマ初期化完了
 * =============================================================================
 */
do_action('sato_theme_loaded');
