/**
 * Main JavaScript
 * アニメーションとスライダーの制御
 */
jQuery(document).ready(function($) {
    'use strict';

    // 1. スクロールアニメーション（表示させる処理）
    // GSAPが読み込まれているか確認
    if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
        gsap.registerPlugin(ScrollTrigger);
        
        // .animate-on-scroll クラスがついた要素を監視
        $('.animate-on-scroll, .animate-fade-in').each(function() {
            var element = this;
            
            gsap.to(element, {
                scrollTrigger: {
                    trigger: element,
                    start: "top 85%", // 画面の85%の位置に来たら発火
                    toggleClass: "is-visible", // 表示クラスを付与
                    once: true // 1回だけ実行
                },
                opacity: 1, // 強制的に不透明度を1にする
                y: 0,
                duration: 0.8,
                ease: "power2.out"
            });
        });
    } else {
        // GSAPがない場合のフォールバック（強制表示）
        $('.animate-on-scroll, .animate-fade-in').css({
            'opacity': 1,
            'transform': 'none'
        });
    }

    // 2. 施工実績スライダー (Slick)
    // 施工実績カードがスライダーの中に存在する場合のみ実行
    if ($('.works__slider').length > 0) {
        $('.works__slider').slick({
            dots: true,
            infinite: true,
            speed: 500,
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            arrows: true,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: false // スマホでは矢印を消す
                    }
                }
            ]
        });
    }
});
