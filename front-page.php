<?php
/**
 * Front Page Template
 * サトー建装 公式Webサイトテーマ
 * @package Sato_Kenso
 * @version 3.0.0
 */

get_header();

// カスタマイザー設定の取得（テキスト系）
$hero_catch1    = get_theme_mod('sato_hero_catch1', '住まいを守る、');
$hero_catch2    = get_theme_mod('sato_hero_catch2', '職人の技術と想い。');
$hero_subcatch  = get_theme_mod('sato_hero_subcatch', '国家資格 一級塗装技能士が施工する御殿場市の塗装専門店');

// 画像URL（指定のものを使用）
// ※カスタマイザーで設定がない場合は、指定のURLをデフォルトとして使用するロジックに変更
$custom_img_id = get_theme_mod('sato_hero_image_1');
if ($custom_img_id) {
    $hero_bg_url = wp_get_attachment_image_url($custom_img_id, 'full');
} else {
    // 指定された画像URL
    $hero_bg_url = 'https://satokens.jp/wp-content/uploads/2025/12/Gemini_Generated_Image_wzbnsjwzbnsjwzbn.png';
}

$service_areas  = get_theme_mod('sato_service_areas', "御殿場市\n裾野市\n三島市\n沼津市\n富士市\n富士宮市\n長泉町\n清水町");
$area_note      = get_theme_mod('sato_area_note', 'その他、静岡県東部エリアもご対応可能です。まずはお気軽にお問い合わせください。');
$google_map_url = get_theme_mod('sato_google_map', '');
$warranty_years = get_theme_mod('sato_warranty_years', '15');
?>

<main class="front-page">

    <section class="hero">
        <div class="hero__content animate-fade-in">
            <div class="hero__content-inner">
                <h2 class="hero__catchphrase">
                    <span class="hero__catch-line"><?php echo esc_html($hero_catch1); ?></span>
                    <span class="hero__catch-line"><?php echo esc_html($hero_catch2); ?></span>
                </h2>
                <p class="hero__subcatch"><?php echo esc_html($hero_subcatch); ?></p>
                
                <div class="hero__badges">
                    <span class="badge badge--accent">地域密着</span>
                    <span class="badge badge--accent">完全自社施工</span>
                    <span class="badge badge--accent">一級塗装技能士</span>
                </div>
                
                <div class="hero__cta">
                    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn--accent btn--xl btn--shadow">
                        <?php echo sato_get_svg_icon('mail', 24); ?>
                        <span>無料お見積り・ご相談</span>
                    </a>
                    <p class="hero__cta-note">しつこい営業は一切いたしません</p>
                </div>
            </div>
        </div>

        <div class="hero__visual" style="background-image: url('<?php echo esc_url($hero_bg_url); ?>');">
            <img src="<?php echo esc_url($hero_bg_url); ?>" alt="塗装職人の作業風景" class="sr-only">
        </div>
        
        <?php
        $news_query = new WP_Query([
            'post_type'      => 'news',
            'posts_per_page' => 3,
            'post_status'    => 'publish',
        ]);
        
        if ($news_query->have_posts()) :
        ?>
        <div class="hero__news-ticker">
            <div class="container-fluid">
                <div class="news-ticker__inner">
                    <span class="news-ticker__label">NEWS</span>
                    <div class="news-ticker__content">
                        <?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
                        <a href="<?php the_permalink(); ?>" class="news-ticker__item">
                            <time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date('Y.m.d'); ?></time>
                            <span><?php the_title(); ?></span>
                        </a>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; wp_reset_postdata(); ?>
    </section>

    <section class="section bg-light" id="problems">
        <div class="container">
            <div class="section__header text-center">
                <span class="section__label">PROBLEMS</span>
                <h2 class="section__title">こんなお悩みありませんか？</h2>
                <p class="section__description">外壁や屋根の劣化は、放っておくと建物の寿命を縮める原因になります。<br>少しでも気になる症状があれば、お早めにご相談ください。</p>
            </div>
            
            <div class="problems__grid animate-on-scroll">
                <div class="problem-card">
                    <div class="problem-card__icon">
                        <?php echo sato_get_svg_icon('home', 60); ?>
                    </div>
                    <h3 class="problem-card__title">外壁のひび割れ</h3>
                    <p class="problem-card__text">小さなひび割れから雨水が浸入し、建物の構造部分を腐食させる可能性があります。</p>
                </div>
                <div class="problem-card">
                    <div class="problem-card__icon">
                        <?php echo sato_get_svg_icon('brush', 60); ?>
                    </div>
                    <h3 class="problem-card__title">壁を触ると白い粉がつく</h3>
                    <p class="problem-card__text">チョーキング現象と呼ばれ、塗膜の防水機能が低下しているサインです。</p>
                </div>
                <div class="problem-card">
                    <div class="problem-card__icon">
                        <?php echo sato_get_svg_icon('shield', 60); ?>
                    </div>
                    <h3 class="problem-card__title">コケや藻の発生</h3>
                    <p class="problem-card__text">日当たりが悪い場所に発生しやすく、塗膜の劣化や美観を損なう原因になります。</p>
                </div>
                <div class="problem-card">
                    <div class="problem-card__icon">
                        <?php echo sato_get_svg_icon('water', 60); ?>
                    </div>
                    <h3 class="problem-card__title">雨漏り・シミ</h3>
                    <p class="problem-card__text">天井や壁にシミができている場合、すでに雨漏りが進行している危険性があります。</p>
                </div>
            </div>
            
            <div class="text-center mt-8">
                <p class="problems__cta-text text-primary font-bold">そのお悩み、<br class="sp-only">サトー建装にお任せください！</p>
                <?php echo sato_get_svg_icon('chevron-down', 32); ?>
            </div>
        </div>
    </section>

    <?php // 便宜上、以下に続きのセクションを省略なしで記載します ?>

    <section class="section" id="about">
        <div class="container">
            <div class="section__header text-center">
                <span class="section__label">REASONS</span>
                <span class="section__subtitle">About Us</span>
                <h2 class="section__title">サトー建装が選ばれる理由</h2>
                <p class="section__description">お客様に安心して工事をお任せいただくために、<br>私たちは「品質」「価格」「安心」に徹底的にこだわっています。</p>
            </div>
            
            <div class="reasons__list">
                <?php for ($i = 1; $i <= 4; $i++) : 
                    $title = get_theme_mod("sato_reason_{$i}_title");
                    $text = get_theme_mod("sato_reason_{$i}_text");
                    $img_id = get_theme_mod("sato_reason_{$i}_image");
                    
                    if (!$title) continue;
                ?>
                <div class="reason-panel animate-on-scroll <?php echo ($i % 2 === 0) ? 'reason-panel--reverse' : ''; ?>">
                    <div class="reason-panel__image">
                        <?php if ($img_id) : ?>
                            <?php echo wp_get_attachment_image($img_id, 'large'); ?>
                        <?php else : ?>
                            <div style="background: var(--color-gray-200); width: 100%; height: 300px;"></div>
                        <?php endif; ?>
                    </div>
                    <div class="reason-panel__content">
                        <div class="reason-panel__number">0<?php echo $i; ?></div>
                        <h3 class="reason-panel__title"><?php echo esc_html($title); ?></h3>
                        <div class="reason-panel__text">
                            <?php echo wp_kses_post(wpautop($text)); ?>
                        </div>
                        
                        <?php if ($i === 1) : ?>
                        <ul class="reason-panel__points">
                            <li><?php echo sato_get_svg_icon('check', 16); ?> 中間マージンカット</li>
                            <li><?php echo sato_get_svg_icon('check', 16); ?> 責任施工</li>
                            <li><?php echo sato_get_svg_icon('check', 16); ?> 迅速な対応</li>
                        </ul>
                        <?php endif; ?>
                        
                        <?php if ($i === 4 && $warranty_years) : ?>
                        <div class="warranty-badge">
                            <span class="warranty-badge__years"><?php echo esc_html($warranty_years); ?></span>
                            <span class="warranty-badge__text">年保証</span>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endfor; ?>
            </div>
        </div>
    </section>

    <section class="section bg-primary-light" id="service">
        <div class="container">
            <div class="section__header text-center">
                <span class="section__label">SERVICE</span>
                <span class="section__subtitle">Our Services</span>
                <h2 class="section__title">サービス案内</h2>
                <p class="section__description">戸建て住宅から店舗・アパートまで、<br>塗装に関するあらゆる工事に対応いたします。</p>
            </div>
            
            <div class="services__grid animate-on-scroll">
                <a href="<?php echo esc_url(home_url('/service/exterior/')); ?>" class="service-card">
                    <div class="service-card__image">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/service-exterior.jpg" alt="外壁塗装" loading="lazy">
                    </div>
                    <div class="service-card__content">
                        <div class="service-card__icon">
                            <?php echo sato_get_svg_icon('home', 24); ?>
                        </div>
                        <h3 class="service-card__title">外壁塗装</h3>
                        <p class="service-card__text">美観の向上だけでなく、建物を雨風から守るための外壁塗装工事です。</p>
                        <span class="service-card__link">詳しく見る <?php echo sato_get_svg_icon('arrow-right', 14); ?></span>
                    </div>
                </a>
                
                <a href="<?php echo esc_url(home_url('/service/roof/')); ?>" class="service-card">
                    <div class="service-card__image">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/service-roof.jpg" alt="屋根塗装" loading="lazy">
                    </div>
                    <div class="service-card__content">
                        <div class="service-card__icon">
                            <?php echo sato_get_svg_icon('paint-roller', 24); ?>
                        </div>
                        <h3 class="service-card__title">屋根塗装</h3>
                        <p class="service-card__text">過酷な環境から建物を守る屋根。遮熱・断熱塗料のご提案も可能です。</p>
                        <span class="service-card__link">詳しく見る <?php echo sato_get_svg_icon('arrow-right', 14); ?></span>
                    </div>
                </a>
                
                <a href="<?php echo esc_url(home_url('/service/waterproof/')); ?>" class="service-card">
                    <div class="service-card__image">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/service-waterproof.jpg" alt="防水工事" loading="lazy">
                    </div>
                    <div class="service-card__content">
                        <div class="service-card__icon">
                            <?php echo sato_get_svg_icon('shield', 24); ?>
                        </div>
                        <h3 class="service-card__title">防水工事</h3>
                        <p class="service-card__text">ベランダや屋上の防水工事。雨漏りを防ぎ、建物の寿命を延ばします。</p>
                        <span class="service-card__link">詳しく見る <?php echo sato_get_svg_icon('arrow-right', 14); ?></span>
                    </div>
                </a>
                
                <a href="<?php echo esc_url(home_url('/service/repair/')); ?>" class="service-card">
                    <div class="service-card__image">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/service-repair.jpg" alt="補修・修繕" loading="lazy">
                    </div>
                    <div class="service-card__content">
                        <div class="service-card__icon">
                            <?php echo sato_get_svg_icon('check-circle', 24); ?>
                        </div>
                        <h3 class="service-card__title">補修・修繕</h3>
                        <p class="service-card__text">雨樋交換、コーキング打ち替えなど、細かな修繕もお任せください。</p>
                        <span class="service-card__link">詳しく見る <?php echo sato_get_svg_icon('arrow-right', 14); ?></span>
                    </div>
                </a>
            </div>
            
            <div class="text-center mt-12">
                <a href="<?php echo esc_url(home_url('/service/')); ?>" class="btn btn--primary btn--lg">
                    <span>サービス一覧を見る</span>
                    <?php echo sato_get_svg_icon('arrow-right', 20); ?>
                </a>
            </div>
        </div>
    </section>

    <section class="section" id="works">
        <div class="container">
            <div class="section__header text-center">
                <span class="section__label">WORKS</span>
                <span class="section__subtitle">Construction Results</span>
                <h2 class="section__title">施工実績</h2>
                <p class="section__description">御殿場市周辺での豊富な施工実績をご紹介します。<br>ビフォーアフターの違いをご覧ください。</p>
            </div>
            
            <?php
            $works_query = sato_get_works(['posts_per_page' => 8]);
            
            if ($works_query->have_posts()) :
            ?>
            <div class="works__slider animate-on-scroll">
                <?php while ($works_query->have_posts()) : $works_query->the_post(); 
                    $terms = get_the_terms(get_the_ID(), 'works_category');
                    $cat_name = $terms ? $terms[0]->name : '施工実績';
                    $completion_date = get_post_meta(get_the_ID(), '_works_completion_date', true);
                ?>
                <div class="works-card-wrapper px-4">
                    <a href="<?php the_permalink(); ?>" class="works-card">
                        <div class="works-card__image">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('works-card', ['class' => 'works-card__img']); ?>
                            <?php else : ?>
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/no-image.jpg" alt="No Image" class="works-card__img">
                            <?php endif; ?>
                            <?php if ($completion_date) : ?>
                            <span class="works-card__date"><?php echo date_i18n('Y.m', strtotime($completion_date)); ?> 完工</span>
                            <?php endif; ?>
                        </div>
                        <div class="works-card__content">
                            <span class="works-card__category"><?php echo esc_html($cat_name); ?></span>
                            <h3 class="works-card__title"><?php the_title(); ?></h3>
                            <span class="works-card__more">詳細を見る <?php echo sato_get_svg_icon('arrow-right', 14); ?></span>
                        </div>
                    </a>
                </div>
                <?php endwhile; ?>
            </div>
            
            <div class="text-center mt-8">
                <a href="<?php echo esc_url(home_url('/works/')); ?>" class="btn btn--outline btn--lg">
                    <span>施工実績をもっと見る</span>
                    <?php echo sato_get_svg_icon('arrow-right', 20); ?>
                </a>
            </div>
            <?php else : ?>
            <p class="text-center">現在施工実績を準備中です。</p>
            <?php endif; wp_reset_postdata(); ?>
        </div>
    </section>

    <section class="section bg-light" id="price">
        <div class="container">
            <div class="section__header text-center">
                <span class="section__label">PRICE</span>
                <span class="section__subtitle">Price Plan</span>
                <h2 class="section__title">わかりやすい料金プラン</h2>
                <p class="section__description">建坪30坪（塗装面積120㎡〜150㎡）を目安とした参考価格です。<br>正確な費用は無料現地調査のうえ、お見積もりいたします。</p>
            </div>
            
            <div class="pricing__grid animate-on-scroll">
                <?php
                $plans = ['standard', 'recommended', 'premium'];
                foreach ($plans as $key) {
                    $name = get_theme_mod("sato_plan_{$key}_name");
                    $price = get_theme_mod("sato_plan_{$key}_price");
                    $features = get_theme_mod("sato_plan_{$key}_features");
                    $warranty = get_theme_mod("sato_plan_{$key}_warranty");
                    
                    if (!$name) continue;
                    
                    $is_recommended = ($key === 'recommended');
                    $card_class = 'pricing-card' . ($is_recommended ? ' pricing-card--recommended' : '');
                ?>
                <div class="<?php echo esc_attr($card_class); ?>">
                    <?php if ($is_recommended) : ?>
                    <div class="pricing-card__badge">人気No.1</div>
                    <?php endif; ?>
                    
                    <div class="pricing-card__header">
                        <h3 class="pricing-card__name"><?php echo esc_html($name); ?></h3>
                        <div class="pricing-card__price"><?php echo esc_html($price); ?></div>
                        <?php if ($warranty) : ?>
                        <div class="pricing-card__warranty">保証：<?php echo esc_html($warranty); ?></div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="pricing-card__body">
                        <?php if ($features) : 
                            $feature_list = explode("\n", $features);
                        ?>
                        <ul class="pricing-card__features">
                            <?php foreach ($feature_list as $feature) : ?>
                            <li><?php echo sato_get_svg_icon('check', 16); ?> <?php echo esc_html($feature); ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                    </div>
                    
                    <div class="pricing-card__footer">
                        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn <?php echo $is_recommended ? 'btn--accent' : 'btn--primary'; ?> btn--block">
                            <span>お見積り依頼</span>
                            <?php echo sato_get_svg_icon('arrow-right', 16); ?>
                        </a>
                    </div>
                </div>
                <?php } ?>
            </div>
            
            <p class="pricing__note text-center">
                ※足場代、高圧洗浄費、養生費、下地補修費は別途必要となります。<br>
                ※建物の劣化状況や形状により費用は変動します。
            </p>
        </div>
    </section>
    
    <section class="section section--cta bg-gradient-dark text-white">
        <div class="container">
            <div class="cta-box animate-on-scroll">
                <h2 class="cta-box__title"><?php echo esc_html(get_theme_mod('sato_cta_title', 'まずはお気軽にご相談ください')); ?></h2>
                <div class="cta-box__text">
                    <?php echo wp_kses_post(wpautop(get_theme_mod('sato_cta_text', 'お見積もり・ご相談は無料です。'))); ?>
                </div>
                
                <?php if ($campaign = get_theme_mod('sato_cta_campaign')) : ?>
                <div class="cta-box__campaign">
                    <?php echo sato_get_svg_icon('star', 20); ?>
                    <span><?php echo esc_html($campaign); ?></span>
                </div>
                <?php endif; ?>
                
                <div class="cta-box__buttons">
                    <a href="<?php echo esc_url(sato_get_phone_link()); ?>" class="btn btn--white btn--lg">
                        <?php echo sato_get_svg_icon('phone', 24); ?>
                        <span class="btn__phone"><?php echo esc_html(sato_get_phone()); ?></span>
                    </a>
                    
                    <?php if ($line_url = sato_get_line_url()) : ?>
                    <a href="<?php echo esc_url($line_url); ?>" target="_blank" rel="noopener noreferrer" class="btn btn--line btn--lg">
                        <?php echo sato_get_svg_icon('line', 24); ?>
                        <span>LINEで相談</span>
                    </a>
                    <?php endif; ?>
                    
                    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn--accent btn--lg">
                        <?php echo sato_get_svg_icon('mail', 24); ?>
                        <span>WEB簡単見積り</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="section" id="flow">
        <div class="container">
            <div class="section__header text-center">
                <span class="section__label">FLOW</span>
                <span class="section__subtitle">Work Flow</span>
                <h2 class="section__title">ご依頼の流れ</h2>
                <p class="section__description">お問い合わせから完工まで、スムーズな対応を心がけています。<br>お客様に不安を感じさせないよう、丁寧にご説明いたします。</p>
            </div>
            
            <div class="flow__timeline animate-on-scroll">
                <div class="flow-step">
                    <div class="flow-step__number">01</div>
                    <div class="flow-step__icon">
                        <?php echo sato_get_svg_icon('mail', 32); ?>
                    </div>
                    <div class="flow-step__content">
                        <h3 class="flow-step__title">お問い合わせ・ご相談</h3>
                        <p class="flow-step__text">お電話、メール、LINEからお気軽にご連絡ください。専門スタッフが丁寧に対応いたします。</p>
                    </div>
                </div>
                
                <div class="flow-step">
                    <div class="flow-step__number">02</div>
                    <div class="flow-step__icon">
                        <?php echo sato_get_svg_icon('home', 32); ?>
                    </div>
                    <div class="flow-step__content">
                        <h3 class="flow-step__title">現地調査・診断</h3>
                        <p class="flow-step__text">実際に建物の状態を確認し、詳細な診断を行います。調査・診断は無料です。</p>
                    </div>
                </div>
                
                <div class="flow-step">
                    <div class="flow-step__number">03</div>
                    <div class="flow-step__icon">
                        <?php echo sato_get_svg_icon('yen', 32); ?>
                    </div>
                    <div class="flow-step__content">
                        <h3 class="flow-step__title">お見積もり・ご提案</h3>
                        <p class="flow-step__text">診断結果に基づき、最適なプランとお見積もりをご提案します。無理な営業は一切いたしません。</p>
                    </div>
                </div>
                
                <div class="flow-step">
                    <div class="flow-step__number">04</div>
                    <div class="flow-step__icon">
                        <?php echo sato_get_svg_icon('calendar', 32); ?>
                    </div>
                    <div class="flow-step__content">
                        <h3 class="flow-step__title">ご契約・打ち合わせ</h3>
                        <p class="flow-step__text">ご提案内容にご納得いただけましたらご契約となります。色決めや日程の詳細を打ち合わせます。</p>
                    </div>
                </div>
                
                <div class="flow-step">
                    <div class="flow-step__number">05</div>
                    <div class="flow-step__icon">
                        <?php echo sato_get_svg_icon('paint-roller', 32); ?>
                    </div>
                    <div class="flow-step__content">
                        <h3 class="flow-step__title">着工・足場設置</h3>
                        <p class="flow-step__text">近隣の方へのご挨拶を行い、安全第一で工事を開始します。</p>
                    </div>
                </div>
                
                <div class="flow-step">
                    <div class="flow-step__number">06</div>
                    <div class="flow-step__icon">
                        <?php echo sato_get_svg_icon('check-circle', 32); ?>
                    </div>
                    <div class="flow-step__content">
                        <h3 class="flow-step__title">完工・検査・お引き渡し</h3>
                        <p class="flow-step__text">社内検査、お客様立ち会い検査を行い、問題がなければ足場を解体してお引き渡しとなります。</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section bg-light" id="greeting">
        <div class="container">
            <div class="greeting__content animate-on-scroll">
                <div class="greeting__visual">
                    <div class="greeting__image">
                        <?php 
                        $greeting_img_id = get_theme_mod('sato_greeting_image');
                        if ($greeting_img_id) {
                            echo wp_get_attachment_image($greeting_img_id, 'large');
                        } else {
                            // ダミー画像
                            echo '<div style="background-color:var(--color-gray-300);width:100%;height:400px;border-radius:var(--border-radius-lg);"></div>';
                        }
                        ?>
                    </div>
                    <?php if ($quals = get_theme_mod('sato_greeting_qualifications')) : ?>
                    <div class="greeting__qualifications">
                        <h4>保有資格</h4>
                        <ul>
                            <?php foreach (explode("\n", $quals) as $qual) : ?>
                            <li><?php echo esc_html($qual); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                </div>
                
                <div class="greeting__text">
                    <span class="section__label">MESSAGE</span>
                    <h2 class="section__title">地域の皆様に愛される<br>塗装店を目指して</h2>
                    <div class="greeting__message">
                        <?php echo wp_kses_post(wpautop(get_theme_mod('sato_greeting_text'))); ?>
                    </div>
                    <div class="greeting__profile mt-8">
                        <span class="greeting__company"><?php echo esc_html(get_theme_mod('sato_company_name')); ?> 代表</span>
                        <h3 class="greeting__name"><?php echo esc_html(get_theme_mod('sato_representative')); ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section" id="voice">
        <div class="container">
            <div class="section__header text-center">
                <span class="section__label">VOICE</span>
                <span class="section__subtitle">Customer Reviews</span>
                <h2 class="section__title">お客様の声</h2>
                <p class="section__description">実際に施工させていただいたお客様からいただいた<br>喜びの声をご紹介します。</p>
            </div>
            
            <?php
            $voice_query = sato_get_voices(['posts_per_page' => 3]);
            
            if ($voice_query->have_posts()) :
            ?>
            <div class="voice__grid animate-on-scroll">
                <?php while ($voice_query->have_posts()) : $voice_query->the_post(); 
                    $area = get_post_meta(get_the_ID(), '_voice_client_area', true);
                    $initial = get_post_meta(get_the_ID(), '_voice_client_initial', true);
                    $service = get_post_meta(get_the_ID(), '_voice_service_type', true);
                    $rating = get_post_meta(get_the_ID(), '_voice_rating', true);
                ?>
                <div class="voice-card">
                    <div class="voice-card__header">
                        <div class="voice-card__avatar">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('voice-avatar'); ?>
                            <?php else : ?>
                                <span class="voice-card__initial"><?php echo mb_substr($initial, 0, 1); ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="voice-card__info">
                            <div class="voice-card__name"><?php echo esc_html($area . ' ' . $initial); ?></div>
                            <div class="voice-card__service"><?php echo esc_html($service); ?></div>
                            <?php if ($rating) : ?>
                            <div class="voice-card__rating">
                                <?php echo sato_rating_stars($rating); ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="voice-card__content">
                        <h3 class="voice-card__title text-base mb-2"><?php the_title(); ?></h3>
                        <div class="voice-card__text">
                            <?php echo wp_trim_words(get_the_content(), 60, '...'); ?>
                        </div>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="voice-card__link">
                        詳しく見る <?php echo sato_get_svg_icon('arrow-right', 14); ?>
                    </a>
                </div>
                <?php endwhile; ?>
            </div>
            
            <div class="text-center mt-8">
                <a href="<?php echo esc_url(home_url('/voice/')); ?>" class="btn btn--outline btn--lg">
                    <span>お客様の声一覧</span>
                    <?php echo sato_get_svg_icon('arrow-right', 20); ?>
                </a>
            </div>
            <?php else : ?>
            <p class="text-center">現在お客様の声を準備中です。</p>
            <?php endif; wp_reset_postdata(); ?>
        </div>
    </section>

    <section class="section bg-light" id="faq">
        <div class="container">
            <div class="section__header text-center">
                <span class="section__label">Q&A</span>
                <span class="section__subtitle">FAQ</span>
                <h2 class="section__title">よくある質問</h2>
                <p class="section__description">お客様からよくいただくご質問をまとめました。</p>
            </div>
            
            <?php
            // フロントページ用に抜粋表示設定（メタキー _faq_is_featured = 1 のみ取得など）
            // ここでは簡易的に全取得で制限
            $faq_query = sato_get_faqs([
                'posts_per_page' => 5,
                'meta_query' => [
                    [
                        'key' => '_faq_is_featured',
                        'value' => '1',
                        'compare' => '='
                    ]
                ]
            ]);
            
            // ピックアップがなければ通常取得
            if (!$faq_query->have_posts()) {
                $faq_query = sato_get_faqs(['posts_per_page' => 5]);
            }
            
            if ($faq_query->have_posts()) :
            ?>
            <div class="faq__accordion animate-on-scroll">
                <?php while ($faq_query->have_posts()) : $faq_query->the_post(); ?>
                <div class="faq-item">
                    <button class="faq-item__question" aria-expanded="false">
                        <span class="faq-item__icon-q">Q</span>
                        <span class="faq-item__title"><?php the_title(); ?></span>
                        <span class="faq-item__toggle">
                            <?php echo sato_get_svg_icon('chevron-down', 20); ?>
                        </span>
                    </button>
                    <div class="faq-item__answer">
                        <span class="faq-item__icon-a">A</span>
                        <div class="faq-item__content">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
            
            <div class="text-center">
                <a href="<?php echo esc_url(home_url('/faq/')); ?>" class="btn btn--primary btn--lg">
                    <span>よくある質問一覧</span>
                    <?php echo sato_get_svg_icon('arrow-right', 20); ?>
                </a>
            </div>
            <?php endif; wp_reset_postdata(); ?>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section__header text-center">
                <span class="section__label">AREA</span>
                <span class="section__subtitle">Service Area</span>
                <h2 class="section__title">対応エリア</h2>
            </div>
            
            <div class="area__content animate-on-scroll">
                <div class="area__list">
                    <h3 class="area__list-title">
                        <?php echo sato_get_svg_icon('map-pin', 24); ?>
                        静岡県東部エリアを中心に対応
                    </h3>
                    <ul class="area__cities">
                        <?php foreach (explode("\n", $service_areas) as $city) : 
                            if (!trim($city)) continue;
                        ?>
                        <li><?php echo esc_html(trim($city)); ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <p class="area__note"><?php echo nl2br(esc_html($area_note)); ?></p>
                </div>
                
                <div class="area__map">
                    <?php if ($google_map_url) : ?>
                    <iframe src="<?php echo esc_url($google_map_url); ?>" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    <?php else : ?>
                    <div class="area__map-placeholder" style="background: #eee; height: 300px; display: flex; align-items: center; justify-content: center;">
                        <p>Google Mapの設定が必要です</p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="section bg-light" id="news">
        <div class="container">
            <div class="section__header text-center">
                <span class="section__label">NEWS</span>
                <span class="section__subtitle">Information</span>
                <h2 class="section__title">お知らせ・ブログ</h2>
            </div>
            
            <?php
            $news_query = sato_get_news(['posts_per_page' => 3]);
            
            if ($news_query->have_posts()) :
            ?>
            <div class="news__grid animate-on-scroll">
                <?php while ($news_query->have_posts()) : $news_query->the_post(); 
                    $terms = get_the_terms(get_the_ID(), 'news_category');
                    $cat_name = $terms ? $terms[0]->name : 'お知らせ';
                ?>
                <a href="<?php the_permalink(); ?>" class="news-card">
                    <div class="news-card__image">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('news-thumb'); ?>
                        <?php else : ?>
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/no-image.jpg" alt="No Image">
                        <?php endif; ?>
                    </div>
                    <div class="news-card__content">
                        <div class="news-card__meta">
                            <time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date('Y.m.d'); ?></time>
                            <span class="news-card__category"><?php echo esc_html($cat_name); ?></span>
                        </div>
                        <h3 class="news-card__title"><?php the_title(); ?></h3>
                        <div class="news-card__excerpt">
                            <?php echo wp_trim_words(get_the_excerpt(), 40, '...'); ?>
                        </div>
                    </div>
                </a>
                <?php endwhile; ?>
            </div>
            
            <div class="text-center mt-8">
                <a href="<?php echo esc_url(home_url('/news/')); ?>" class="btn btn--outline btn--lg">
                    <span>記事一覧を見る</span>
                    <?php echo sato_get_svg_icon('arrow-right', 20); ?>
                </a>
            </div>
            <?php else : ?>
            <p class="text-center">現在お知らせはありません。</p>
            <?php endif; wp_reset_postdata(); ?>
        </div>
    </section>

    <section class="section section--final-cta bg-primary text-white">
        <div class="container">
            <div class="final-cta__content animate-on-scroll">
                <h2 class="final-cta__title">塗装のことなら、<br class="sp-only">私たちにお任せください</h2>
                <div class="final-cta__text">
                    <p>現地調査・お見積もりは無料です。<br>しつこい営業は一切いたしませんので、まずはお気軽にご相談ください。</p>
                </div>
                
                <div class="final-cta__buttons">
                    <a href="<?php echo esc_url(sato_get_phone_link()); ?>" class="btn btn--white btn--xl">
                        <?php echo sato_get_svg_icon('phone', 24); ?>
                        <span class="btn__phone"><?php echo esc_html(sato_get_phone()); ?></span>
                    </a>
                    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn--accent btn--xl">
                        <?php echo sato_get_svg_icon('mail', 24); ?>
                        <span>無料お見積り・ご相談</span>
                    </a>
                </div>
                
                <div class="final-cta__examples">
                    <h4>このようなお悩みも解決します</h4>
                    <ul>
                        <li>外壁の汚れが目立ってきた</li>
                        <li>屋根の状態が気になる</li>
                        <li>雨漏りしていないか心配</li>
                        <li>他社の見積もりが適正か知りたい</li>
                        <li>将来のメンテナンス計画を相談したい</li>
                        <li>色選びで失敗したくない</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
