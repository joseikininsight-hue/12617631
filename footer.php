<?php
/**
 * Footer Template
 * サトー建装 公式Webサイトテーマ
 * 
 * @package Sato_Kenso
 * @version 3.0.0
 */

// テーマ設定を取得
$theme_uri = get_template_directory_uri();
$phone = sato_get_phone();
$phone_link = sato_get_phone_link();
$company_name = get_theme_mod('company_name', 'サトー建装');
$company_address = get_theme_mod('company_address', '〒412-0043 静岡県御殿場市新橋0000-0');
$company_email = get_theme_mod('company_email', 'info@satokensou.com');
$hours = get_theme_mod('company_hours', '9:00〜18:00');
$holiday = get_theme_mod('company_holiday', '日曜・祝日');
$line_url = sato_get_line_url();
$instagram_url = get_theme_mod('instagram_url', '');
$facebook_url = get_theme_mod('facebook_url', '');
$google_map_url = get_theme_mod('google_map_url', '');

// サービスエリア
$service_areas = get_theme_mod('service_areas', '御殿場市、小山町、裾野市、三島市、沼津市、長泉町、清水町、函南町、伊豆の国市、富士市、富士宮市');
?>

    </main><!-- #main-content -->

    <!-- ============================================
         CTA Section（フッター前）
    ============================================= -->
    <?php if (is_front_page() || is_page('contact') === false) : ?>
    <section class="footer-cta">
        <div class="footer-cta__bg">
            <div class="footer-cta__pattern"></div>
        </div>
        <div class="container footer-cta__inner">
            <div class="footer-cta__content">
                <p class="footer-cta__label">
                    <?php echo sato_get_svg_icon('message-circle', 20); ?>
                    <span>まずはお気軽にご相談ください</span>
                </p>
                <h2 class="footer-cta__title">
                    外壁・屋根のお悩み、<br class="sp-only">
                    <span class="highlight">無料</span>で診断いたします
                </h2>
                <p class="footer-cta__text">
                    「塗り替え時期かな？」「費用はどのくらい？」<br>
                    どんな小さなことでもお気軽にお問い合わせください。<br>
                    経験豊富なスタッフが丁寧にご対応いたします。
                </p>
                
                <div class="footer-cta__actions">
                    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn--primary btn--lg">
                        <?php echo sato_get_svg_icon('mail', 20); ?>
                        <span>無料お見積り・ご相談</span>
                    </a>
                    
                    <?php if ($line_url) : ?>
                    <a href="<?php echo esc_url($line_url); ?>" target="_blank" rel="noopener noreferrer" class="btn btn--line btn--lg">
                        <?php echo sato_get_svg_icon('line', 20); ?>
                        <span>LINEでお問い合わせ</span>
                    </a>
                    <?php endif; ?>
                </div>
                
                <div class="footer-cta__phone">
                    <p class="footer-cta__phone-label">お電話でのお問い合わせ</p>
                    <a href="<?php echo esc_url($phone_link); ?>" class="footer-cta__phone-number">
                        <?php echo sato_get_svg_icon('phone', 24); ?>
                        <span><?php echo esc_html($phone); ?></span>
                    </a>
                    <p class="footer-cta__phone-hours">
                        営業時間：<?php echo esc_html($hours); ?>（<?php echo esc_html($holiday); ?>休）
                    </p>
                </div>
            </div>
            
            <div class="footer-cta__image">
                <img src="<?php echo esc_url($theme_uri); ?>/assets/images/cta-staff.png" alt="サトー建装スタッフ" loading="lazy" width="400" height="400">
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- ============================================
         メインフッター
    ============================================= -->
    <footer class="footer" role="contentinfo">
        
        <!-- フッター上部：会社情報・ナビゲーション -->
        <div class="footer__main">
            <div class="container">
                <div class="footer__grid">
                    
                    <!-- 会社情報 -->
                    <div class="footer__company">
                        <div class="footer__logo">
                            <?php if (has_custom_logo()) : ?>
                                <?php 
                                $custom_logo_id = get_theme_mod('custom_logo');
                                $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                                ?>
                                <img src="<?php echo esc_url($logo[0]); ?>" alt="<?php bloginfo('name'); ?>" class="footer__logo-img" width="180" height="45">
                            <?php else : ?>
                                <span class="footer__logo-text">
                                    <span class="footer__logo-main">サトー建装</span>
                                    <span class="footer__logo-sub">外壁塗装・屋根塗装専門店</span>
                                </span>
                            <?php endif; ?>
                        </div>
                        
                        <p class="footer__description">
                            静岡県御殿場市を拠点に、外壁塗装・屋根塗装を専門とする地域密着の塗装店です。<br>
                            お客様の大切な住まいを、確かな技術と真心でお守りします。
                        </p>
                        
                        <div class="footer__info">
                            <div class="footer__info-item">
                                <?php echo sato_get_svg_icon('map-pin', 18); ?>
                                <span><?php echo esc_html($company_address); ?></span>
                            </div>
                            <div class="footer__info-item">
                                <?php echo sato_get_svg_icon('phone', 18); ?>
                                <a href="<?php echo esc_url($phone_link); ?>"><?php echo esc_html($phone); ?></a>
                            </div>
                            <div class="footer__info-item">
                                <?php echo sato_get_svg_icon('mail', 18); ?>
                                <a href="mailto:<?php echo esc_attr($company_email); ?>"><?php echo esc_html($company_email); ?></a>
                            </div>
                            <div class="footer__info-item">
                                <?php echo sato_get_svg_icon('clock', 18); ?>
                                <span><?php echo esc_html($hours); ?>（<?php echo esc_html($holiday); ?>休）</span>
                            </div>
                        </div>
                        
                        <!-- SNSリンク -->
                        <div class="footer__social">
                            <?php if ($instagram_url) : ?>
                            <a href="<?php echo esc_url($instagram_url); ?>" target="_blank" rel="noopener noreferrer" class="footer__social-link" aria-label="Instagram">
                                <?php echo sato_get_svg_icon('instagram', 20); ?>
                            </a>
                            <?php endif; ?>
                            
                            <?php if ($facebook_url) : ?>
                            <a href="<?php echo esc_url($facebook_url); ?>" target="_blank" rel="noopener noreferrer" class="footer__social-link" aria-label="Facebook">
                                <?php echo sato_get_svg_icon('facebook', 20); ?>
                            </a>
                            <?php endif; ?>
                            
                            <?php if ($line_url) : ?>
                            <a href="<?php echo esc_url($line_url); ?>" target="_blank" rel="noopener noreferrer" class="footer__social-link footer__social-link--line" aria-label="LINE公式アカウント">
                                <?php echo sato_get_svg_icon('line', 20); ?>
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <!-- ナビゲーション：サービス -->
                    <div class="footer__nav">
                        <h3 class="footer__nav-title">サービス</h3>
                        <ul class="footer__nav-list">
                            <li><a href="<?php echo esc_url(home_url('/service/exterior/')); ?>">外壁塗装</a></li>
                            <li><a href="<?php echo esc_url(home_url('/service/roof/')); ?>">屋根塗装</a></li>
                            <li><a href="<?php echo esc_url(home_url('/service/waterproof/')); ?>">防水工事</a></li>
                            <li><a href="<?php echo esc_url(home_url('/service/repair/')); ?>">補修・修繕工事</a></li>
                            <li><a href="<?php echo esc_url(home_url('/service/commercial/')); ?>">店舗・ビル塗装</a></li>
                        </ul>
                    </div>
                    
                    <!-- ナビゲーション：コンテンツ -->
                    <div class="footer__nav">
                        <h3 class="footer__nav-title">コンテンツ</h3>
                        <ul class="footer__nav-list">
                            <li><a href="<?php echo esc_url(home_url('/#about')); ?>">選ばれる理由</a></li>
                            <li><a href="<?php echo esc_url(home_url('/works/')); ?>">施工実績</a></li>
                            <li><a href="<?php echo esc_url(home_url('/#price')); ?>">料金プラン</a></li>
                            <li><a href="<?php echo esc_url(home_url('/#voice')); ?>">お客様の声</a></li>
                            <li><a href="<?php echo esc_url(home_url('/#faq')); ?>">よくある質問</a></li>
                            <li><a href="<?php echo esc_url(home_url('/#flow')); ?>">ご依頼の流れ</a></li>
                        </ul>
                    </div>
                    
                    <!-- ナビゲーション：会社情報 -->
                    <div class="footer__nav">
                        <h3 class="footer__nav-title">会社情報</h3>
                        <ul class="footer__nav-list">
                            <li><a href="<?php echo esc_url(home_url('/company/')); ?>">会社概要</a></li>
                            <li><a href="<?php echo esc_url(home_url('/company/#greeting')); ?>">代表挨拶</a></li>
                            <li><a href="<?php echo esc_url(home_url('/company/#staff')); ?>">スタッフ紹介</a></li>
                            <li><a href="<?php echo esc_url(home_url('/news/')); ?>">お知らせ</a></li>
                            <li><a href="<?php echo esc_url(home_url('/contact/')); ?>">お問い合わせ</a></li>
                        </ul>
                    </div>
                    
                </div>
            </div>
        </div>
        
        <!-- 対応エリア -->
        <div class="footer__area">
            <div class="container">
                <div class="footer__area-inner">
                    <h3 class="footer__area-title">
                        <?php echo sato_get_svg_icon('map-pin', 20); ?>
                        <span>対応エリア</span>
                    </h3>
                    <p class="footer__area-text">
                        <?php echo esc_html($service_areas); ?> 他、静岡県東部エリア全域
                    </p>
                    <?php if ($google_map_url) : ?>
                    <a href="<?php echo esc_url($google_map_url); ?>" target="_blank" rel="noopener noreferrer" class="footer__area-link">
                        <?php echo sato_get_svg_icon('external-link', 14); ?>
                        <span>Google Mapで見る</span>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
        <!-- 資格・認定 -->
        <div class="footer__certification">
            <div class="container">
                <div class="footer__certification-inner">
                    <h3 class="footer__certification-title">保有資格・認定</h3>
                    <ul class="footer__certification-list">
                        <li>
                            <span class="footer__certification-icon">
                                <?php echo sato_get_svg_icon('award', 20); ?>
                            </span>
                            <span>一級塗装技能士</span>
                        </li>
                        <li>
                            <span class="footer__certification-icon">
                                <?php echo sato_get_svg_icon('shield-check', 20); ?>
                            </span>
                            <span>外壁診断士</span>
                        </li>
                        <li>
                            <span class="footer__certification-icon">
                                <?php echo sato_get_svg_icon('badge', 20); ?>
                            </span>
                            <span>雨漏り診断士</span>
                        </li>
                        <li>
                            <span class="footer__certification-icon">
                                <?php echo sato_get_svg_icon('home', 20); ?>
                            </span>
                            <span>住宅リフォーム事業者団体登録</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
        <!-- フッター下部：コピーライト -->
        <div class="footer__bottom">
            <div class="container footer__bottom-inner">
                <div class="footer__legal">
                    <a href="<?php echo esc_url(home_url('/privacy/')); ?>">プライバシーポリシー</a>
                    <a href="<?php echo esc_url(home_url('/sitemap/')); ?>">サイトマップ</a>
                </div>
                <p class="footer__copyright">
                    &copy; <?php echo date('Y'); ?> <?php echo esc_html($company_name); ?> All Rights Reserved.
                </p>
            </div>
        </div>
        
    </footer>

    <!-- ページトップへ戻るボタン -->
    <a href="#" class="back-to-top" id="back-to-top" aria-label="ページの先頭へ戻る">
        <?php echo sato_get_svg_icon('chevron-up', 24); ?>
    </a>

    <?php wp_footer(); ?>

</body>
</html>
