/*
Theme Name: サトー建装 公式Webサイトテーマ
Theme URI: https://satokensou.com/
Author: Sato Kenso
Author URI: https://satokensou.com/
Description: 静岡県御殿場市・東部エリアの塗装専門店「サトー建装」公式テーマ - 青をモチーフにした職人直営の塗装会社サイト
Version: 3.0.0
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Text Domain: sato-kenso
Requires at least: 6.0
Requires PHP: 8.0
*/

/* ==========================================================================
   CSS カスタムプロパティ（グローバル変数）
   ========================================================================== */
:root {
    /* ========== カラーパレット ========== */
    /* プライマリカラー（青系） */
    --color-primary: #1e3a5f;
    --color-primary-light: #2c5282;
    --color-primary-lighter: #3182ce;
    --color-primary-dark: #1a365d;
    --color-primary-darker: #153e75;
    
    /* プライマリカラーの階調 */
    --color-primary-50: #ebf8ff;
    --color-primary-100: #bee3f8;
    --color-primary-200: #90cdf4;
    --color-primary-300: #63b3ed;
    --color-primary-400: #4299e1;
    --color-primary-500: #3182ce;
    --color-primary-600: #2b6cb0;
    --color-primary-700: #2c5282;
    --color-primary-800: #2a4365;
    --color-primary-900: #1a365d;
    
    /* アクセントカラー（オレンジ/ゴールド） */
    --color-accent: #ed8936;
    --color-accent-light: #f6ad55;
    --color-accent-lighter: #fbd38d;
    --color-accent-dark: #dd6b20;
    --color-accent-darker: #c05621;
    
    /* セカンダリカラー */
    --color-secondary: #48bb78;
    --color-secondary-light: #68d391;
    --color-secondary-dark: #38a169;
    
    /* ニュートラルカラー（グレースケール） */
    --color-white: #ffffff;
    --color-black: #1a202c;
    --color-gray-50: #f7fafc;
    --color-gray-100: #edf2f7;
    --color-gray-200: #e2e8f0;
    --color-gray-300: #cbd5e0;
    --color-gray-400: #a0aec0;
    --color-gray-500: #718096;
    --color-gray-600: #4a5568;
    --color-gray-700: #2d3748;
    --color-gray-800: #1a202c;
    --color-gray-900: #171923;
    
    /* 機能カラー */
    --color-success: #48bb78;
    --color-success-light: #9ae6b4;
    --color-warning: #ecc94b;
    --color-warning-light: #faf089;
    --color-error: #f56565;
    --color-error-light: #feb2b2;
    --color-info: #4299e1;
    --color-info-light: #90cdf4;
    
    /* ブランドカラー */
    --color-line: #06c755;
    --color-line-hover: #05b34c;
    --color-facebook: #1877f2;
    --color-twitter: #1da1f2;
    --color-instagram: #e4405f;
    --color-youtube: #ff0000;
    
    /* ========== グラデーション ========== */
    --gradient-primary: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-light) 100%);
    --gradient-primary-vertical: linear-gradient(180deg, var(--color-primary) 0%, var(--color-primary-light) 100%);
    --gradient-dark: linear-gradient(135deg, var(--color-primary-dark) 0%, var(--color-primary) 100%);
    --gradient-accent: linear-gradient(135deg, var(--color-accent) 0%, var(--color-accent-light) 100%);
    --gradient-hero-overlay: linear-gradient(135deg, rgba(30, 58, 95, 0.9) 0%, rgba(44, 82, 130, 0.7) 50%, rgba(30, 58, 95, 0.9) 100%);
    --gradient-card: linear-gradient(180deg, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%);
    
    /* ========== タイポグラフィ ========== */
    --font-family-base: 'Noto Sans JP', -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Hiragino Sans', 'Hiragino Kaku Gothic ProN', Meiryo, sans-serif;
    --font-family-serif: 'Noto Serif JP', 'Yu Mincho', 'YuMincho', 'Hiragino Mincho ProN', Georgia, serif;
    --font-family-accent: 'EB Garamond', Georgia, serif;
    --font-family-mono: 'SF Mono', 'Fira Code', Consolas, monospace;
    
    /* フォントサイズ */
    --font-size-xs: 0.75rem;      /* 12px */
    --font-size-sm: 0.875rem;     /* 14px */
    --font-size-base: 1rem;       /* 16px */
    --font-size-lg: 1.125rem;     /* 18px */
    --font-size-xl: 1.25rem;      /* 20px */
    --font-size-2xl: 1.5rem;      /* 24px */
    --font-size-3xl: 1.875rem;    /* 30px */
    --font-size-4xl: 2.25rem;     /* 36px */
    --font-size-5xl: 3rem;        /* 48px */
    --font-size-6xl: 3.75rem;     /* 60px */
    
    /* フォントウェイト */
    --font-weight-light: 300;
    --font-weight-normal: 400;
    --font-weight-medium: 500;
    --font-weight-semibold: 600;
    --font-weight-bold: 700;
    --font-weight-extrabold: 800;
    --font-weight-black: 900;
    
    /* 行の高さ */
    --line-height-none: 1;
    --line-height-tight: 1.25;
    --line-height-snug: 1.375;
    --line-height-normal: 1.5;
    --line-height-relaxed: 1.625;
    --line-height-loose: 2;
    
    /* 文字間隔 */
    --letter-spacing-tighter: -0.05em;
    --letter-spacing-tight: -0.025em;
    --letter-spacing-normal: 0;
    --letter-spacing-wide: 0.025em;
    --letter-spacing-wider: 0.05em;
    --letter-spacing-widest: 0.1em;
    
    /* ========== スペーシング ========== */
    --spacing-0: 0;
    --spacing-px: 1px;
    --spacing-0-5: 0.125rem;  /* 2px */
    --spacing-1: 0.25rem;     /* 4px */
    --spacing-1-5: 0.375rem;  /* 6px */
    --spacing-2: 0.5rem;      /* 8px */
    --spacing-2-5: 0.625rem;  /* 10px */
    --spacing-3: 0.75rem;     /* 12px */
    --spacing-3-5: 0.875rem;  /* 14px */
    --spacing-4: 1rem;        /* 16px */
    --spacing-5: 1.25rem;     /* 20px */
    --spacing-6: 1.5rem;      /* 24px */
    --spacing-7: 1.75rem;     /* 28px */
    --spacing-8: 2rem;        /* 32px */
    --spacing-9: 2.25rem;     /* 36px */
    --spacing-10: 2.5rem;     /* 40px */
    --spacing-11: 2.75rem;    /* 44px */
    --spacing-12: 3rem;       /* 48px */
    --spacing-14: 3.5rem;     /* 56px */
    --spacing-16: 4rem;       /* 64px */
    --spacing-20: 5rem;       /* 80px */
    --spacing-24: 6rem;       /* 96px */
    --spacing-28: 7rem;       /* 112px */
    --spacing-32: 8rem;       /* 128px */
    --spacing-36: 9rem;       /* 144px */
    --spacing-40: 10rem;      /* 160px */
    
    /* ========== ボーダー ========== */
    --border-width-0: 0;
    --border-width-1: 1px;
    --border-width-2: 2px;
    --border-width-4: 4px;
    --border-width-8: 8px;
    
    --border-radius-none: 0;
    --border-radius-sm: 0.125rem;   /* 2px */
    --border-radius-base: 0.25rem;  /* 4px */
    --border-radius-md: 0.375rem;   /* 6px */
    --border-radius-lg: 0.5rem;     /* 8px */
    --border-radius-xl: 0.75rem;    /* 12px */
    --border-radius-2xl: 1rem;      /* 16px */
    --border-radius-3xl: 1.5rem;    /* 24px */
    --border-radius-full: 9999px;
    
    /* ========== シャドウ ========== */
    --shadow-xs: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
    --shadow-sm: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
    --shadow-base: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    --shadow-2xl: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    --shadow-inner: inset 0 2px 4px 0 rgba(0, 0, 0, 0.06);
    --shadow-outline: 0 0 0 3px rgba(66, 153, 225, 0.5);
    --shadow-none: none;
    
    /* カラーシャドウ */
    --shadow-primary: 0 4px 14px 0 rgba(30, 58, 95, 0.39);
    --shadow-accent: 0 4px 14px 0 rgba(237, 137, 54, 0.39);
    
    /* ========== トランジション ========== */
    --transition-none: none;
    --transition-all: all 150ms cubic-bezier(0.4, 0, 0.2, 1);
    --transition-fast: 150ms cubic-bezier(0.4, 0, 0.2, 1);
    --transition-normal: 300ms cubic-bezier(0.4, 0, 0.2, 1);
    --transition-slow: 500ms cubic-bezier(0.4, 0, 0.2, 1);
    --transition-slower: 700ms cubic-bezier(0.4, 0, 0.2, 1);
    
    --ease-linear: linear;
    --ease-in: cubic-bezier(0.4, 0, 1, 1);
    --ease-out: cubic-bezier(0, 0, 0.2, 1);
    --ease-in-out: cubic-bezier(0.4, 0, 0.2, 1);
    --ease-bounce: cubic-bezier(0.68, -0.55, 0.265, 1.55);
    
    /* ========== z-index ========== */
    --z-index-0: 0;
    --z-index-10: 10;
    --z-index-20: 20;
    --z-index-30: 30;
    --z-index-40: 40;
    --z-index-50: 50;
    --z-index-dropdown: 1000;
    --z-index-sticky: 1020;
    --z-index-fixed: 1030;
    --z-index-modal-backdrop: 1040;
    --z-index-modal: 1050;
    --z-index-popover: 1060;
    --z-index-tooltip: 1070;
    --z-index-max: 9999;
    
    /* ========== レイアウト ========== */
    --container-max-width: 1200px;
    --container-padding: 1rem;
    --container-padding-lg: 2rem;
    
    --header-height: 80px;
    --header-height-sp: 60px;
    --header-height-scrolled: 70px;
    
    --footer-padding: 4rem;
    
    /* ========== ブレークポイント（参考用） ========== */
    /* 
    --breakpoint-sm: 640px;
    --breakpoint-md: 768px;
    --breakpoint-lg: 1024px;
    --breakpoint-xl: 1280px;
    --breakpoint-2xl: 1536px;
    */
}

/* ==========================================================================
   リセット & ベーススタイル
   ========================================================================== */

/* Box sizing */
*,
*::before,
*::after {
    box-sizing: border-box;
}

/* Remove default margin and padding */
* {
    margin: 0;
    padding: 0;
}

/* HTML & Body */
html {
    font-size: 16px;
    scroll-behavior: smooth;
    -webkit-text-size-adjust: 100%;
    -webkit-tap-highlight-color: transparent;
}

body {
    font-family: var(--font-family-base);
    font-size: var(--font-size-base);
    font-weight: var(--font-weight-normal);
    line-height: var(--line-height-normal);
    color: var(--color-gray-800);
    background-color: var(--color-white);
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    overflow-x: hidden;
}

/* Links */
a {
    color: var(--color-primary);
    text-decoration: none;
    transition: color var(--transition-fast);
}

a:hover {
    color: var(--color-primary-light);
}

a:focus {
    outline: 2px solid var(--color-primary-300);
    outline-offset: 2px;
}

/* Images */
img,
picture,
video,
canvas,
svg {
    display: block;
    max-width: 100%;
    height: auto;
}

/* Form elements */
input,
button,
textarea,
select {
    font: inherit;
    color: inherit;
}

button {
    cursor: pointer;
    background: none;
    border: none;
}

/* Remove list styles */
ul,
ol {
    list-style: none;
}

/* Headings */
h1, h2, h3, h4, h5, h6 {
    font-weight: var(--font-weight-bold);
    line-height: var(--line-height-tight);
    color: var(--color-gray-900);
}

h1 {
    font-size: var(--font-size-4xl);
}

h2 {
    font-size: var(--font-size-3xl);
}

h3 {
    font-size: var(--font-size-2xl);
}

h4 {
    font-size: var(--font-size-xl);
}

h5 {
    font-size: var(--font-size-lg);
}

h6 {
    font-size: var(--font-size-base);
}

/* Paragraphs */
p {
    margin-bottom: var(--spacing-4);
}

p:last-child {
    margin-bottom: 0;
}

/* Strong & Bold */
strong,
b {
    font-weight: var(--font-weight-bold);
}

/* Emphasis */
em,
i {
    font-style: italic;
}

/* Small */
small {
    font-size: var(--font-size-sm);
}

/* Horizontal rule */
hr {
    border: 0;
    border-top: 1px solid var(--color-gray-200);
    margin: var(--spacing-8) 0;
}

/* Tables */
table {
    border-collapse: collapse;
    width: 100%;
}

/* Address */
address {
    font-style: normal;
}

/* Selection */
::selection {
    background-color: var(--color-primary-200);
    color: var(--color-primary-900);
}

/* Focus visible */
:focus-visible {
    outline: 2px solid var(--color-primary-500);
    outline-offset: 2px;
}

/* Screen reader only */
.sr-only {
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

/* ==========================================================================
   コンテナ
   ========================================================================== */
.container {
    width: 100%;
    max-width: var(--container-max-width);
    margin-left: auto;
    margin-right: auto;
    padding-left: var(--container-padding);
    padding-right: var(--container-padding);
}

.container-sm {
    max-width: 900px;
}

.container-lg {
    max-width: 1400px;
}

.container-fluid {
    max-width: 100%;
}

@media (min-width: 768px) {
    .container {
        padding-left: var(--container-padding-lg);
        padding-right: var(--container-padding-lg);
    }
}

/* ==========================================================================
   セクション共通
   ========================================================================== */
.section {
    padding: var(--spacing-16) 0;
    position: relative;
}

.section--tight {
    padding: var(--spacing-12) 0;
}

.section--loose {
    padding: var(--spacing-24) 0;
}

@media (max-width: 767px) {
    .section {
        padding: var(--spacing-12) 0;
    }
    
    .section--tight {
        padding: var(--spacing-8) 0;
    }
    
    .section--loose {
        padding: var(--spacing-16) 0;
    }
}

/* 背景バリエーション */
.bg-white {
    background-color: var(--color-white);
}

.bg-light {
    background-color: var(--color-gray-50);
}

.bg-gray {
    background-color: var(--color-gray-100);
}

.bg-dark {
    background-color: var(--color-gray-800);
    color: var(--color-white);
}

.bg-primary {
    background-color: var(--color-primary);
    color: var(--color-white);
}

.bg-primary-light {
    background-color: var(--color-primary-50);
}

.bg-gradient {
    background: var(--gradient-primary);
    color: var(--color-white);
}

.bg-gradient-dark {
    background: var(--gradient-dark);
    color: var(--color-white);
}

/* ==========================================================================
   セクションヘッダー
   ========================================================================== */
.section__header {
    margin-bottom: var(--spacing-12);
}

.section__label {
    display: inline-block;
    font-family: var(--font-family-accent);
    font-size: var(--font-size-sm);
    font-weight: var(--font-weight-medium);
    letter-spacing: var(--letter-spacing-widest);
    color: var(--color-primary);
    text-transform: uppercase;
    margin-bottom: var(--spacing-2);
}

.section__subtitle {
    font-size: var(--font-size-sm);
    color: var(--color-gray-500);
    margin-bottom: var(--spacing-2);
}

.section__title {
    font-family: var(--font-family-serif);
    font-size: var(--font-size-3xl);
    font-weight: var(--font-weight-bold);
    line-height: var(--line-height-tight);
    color: var(--color-gray-800);
    margin-bottom: var(--spacing-4);
}

.section__description {
    font-size: var(--font-size-base);
    color: var(--color-gray-600);
    max-width: 700px;
    line-height: var(--line-height-relaxed);
}

/* センタリング */
.section__header.text-center .section__description {
    margin-left: auto;
    margin-right: auto;
}

/* 白背景対応 */
.bg-primary .section__label,
.bg-gradient .section__label,
.bg-gradient-dark .section__label {
    color: var(--color-accent-light);
}

.bg-primary .section__title,
.bg-gradient .section__title,
.bg-gradient-dark .section__title {
    color: var(--color-white);
}

.bg-primary .section__description,
.bg-gradient .section__description,
.bg-gradient-dark .section__description {
    color: rgba(255, 255, 255, 0.85);
}

@media (min-width: 768px) {
    .section__title {
        font-size: var(--font-size-4xl);
    }
}

/* ==========================================================================
   ボタン
   ========================================================================== */
.btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: var(--spacing-2);
    padding: var(--spacing-3) var(--spacing-6);
    font-family: var(--font-family-base);
    font-size: var(--font-size-base);
    font-weight: var(--font-weight-bold);
    line-height: var(--line-height-normal);
    text-align: center;
    text-decoration: none;
    white-space: nowrap;
    vertical-align: middle;
    cursor: pointer;
    user-select: none;
    border: 2px solid transparent;
    border-radius: var(--border-radius-lg);
    transition: all var(--transition-normal);
}

.btn:focus {
    outline: none;
    box-shadow: var(--shadow-outline);
}

.btn:disabled,
.btn.disabled {
    opacity: 0.6;
    cursor: not-allowed;
    pointer-events: none;
}

/* サイズバリエーション */
.btn--sm {
    padding: var(--spacing-2) var(--spacing-4);
    font-size: var(--font-size-sm);
}

.btn--lg {
    padding: var(--spacing-4) var(--spacing-8);
    font-size: var(--font-size-lg);
}

.btn--xl {
    padding: var(--spacing-5) var(--spacing-10);
    font-size: var(--font-size-xl);
}

.btn--block {
    display: flex;
    width: 100%;
}

/* カラーバリエーション */
.btn--primary {
    background-color: var(--color-primary);
    border-color: var(--color-primary);
    color: var(--color-white);
}

.btn--primary:hover {
    background-color: var(--color-primary-dark);
    border-color: var(--color-primary-dark);
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
}

.btn--secondary {
    background-color: var(--color-gray-100);
    border-color: var(--color-gray-200);
    color: var(--color-primary);
}

.btn--secondary:hover {
    background-color: var(--color-gray-200);
    border-color: var(--color-gray-300);
}

.btn--accent {
    background-color: var(--color-accent);
    border-color: var(--color-accent);
    color: var(--color-white);
}

.btn--accent:hover {
    background-color: var(--color-accent-dark);
    border-color: var(--color-accent-dark);
    transform: translateY(-2px);
    box-shadow: var(--shadow-accent);
}

.btn--outline {
    background-color: transparent;
    border-color: var(--color-primary);
    color: var(--color-primary);
}

.btn--outline:hover {
    background-color: var(--color-primary);
    color: var(--color-white);
}

.btn--outline-white {
    background-color: transparent;
    border-color: var(--color-white);
    color: var(--color-white);
}

.btn--outline-white:hover {
    background-color: var(--color-white);
    color: var(--color-primary);
}

.btn--white {
    background-color: var(--color-white);
    border-color: var(--color-white);
    color: var(--color-primary);
}

.btn--white:hover {
    background-color: var(--color-gray-100);
    border-color: var(--color-gray-100);
}

.btn--line {
    background-color: var(--color-line);
    border-color: var(--color-line);
    color: var(--color-white);
}

.btn--line:hover {
    background-color: var(--color-line-hover);
    border-color: var(--color-line-hover);
    transform: translateY(-2px);
    box-shadow: 0 4px 14px rgba(6, 199, 85, 0.4);
}

.btn--ghost {
    background-color: transparent;
    border-color: transparent;
    color: var(--color-primary);
}

.btn--ghost:hover {
    background-color: var(--color-gray-100);
}

/* ボタンアイコン */
.btn__icon {
    width: 20px;
    height: 20px;
    flex-shrink: 0;
}

.btn__icon--after {
    width: 16px;
    height: 16px;
    flex-shrink: 0;
}

/* 電話番号ボタン用 */
.btn__phone {
    font-size: var(--font-size-xl);
    font-weight: var(--font-weight-black);
}

.btn__note {
    display: block;
    font-size: var(--font-size-xs);
    font-weight: var(--font-weight-normal);
    opacity: 0.8;
    margin-top: var(--spacing-1);
}

/* ==========================================================================
   バッジ
   ========================================================================== */
.badge {
    display: inline-flex;
    align-items: center;
    padding: var(--spacing-1) var(--spacing-3);
    font-size: var(--font-size-xs);
    font-weight: var(--font-weight-bold);
    line-height: var(--line-height-normal);
    border-radius: var(--border-radius-full);
}

.badge--primary {
    background-color: var(--color-primary);
    color: var(--color-white);
}

.badge--secondary {
    background-color: var(--color-white);
    color: var(--color-primary);
}

.badge--accent {
    background-color: var(--color-accent);
    color: var(--color-white);
}

.badge--outline {
    background-color: transparent;
    border: 1px solid currentColor;
}

.badge--success {
    background-color: var(--color-success);
    color: var(--color-white);
}

.badge--warning {
    background-color: var(--color-warning);
    color: var(--color-gray-800);
}

.badge--error {
    background-color: var(--color-error);
    color: var(--color-white);
}

/* ==========================================================================
   カード共通
   ========================================================================== */
.card {
    background-color: var(--color-white);
    border-radius: var(--border-radius-xl);
    box-shadow: var(--shadow-md);
    overflow: hidden;
    transition: transform var(--transition-normal), box-shadow var(--transition-normal);
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-xl);
}

.card__image {
    position: relative;
    overflow: hidden;
}

.card__image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform var(--transition-slow);
}

.card:hover .card__image img {
    transform: scale(1.05);
}

.card__content {
    padding: var(--spacing-6);
}

.card__title {
    font-size: var(--font-size-lg);
    font-weight: var(--font-weight-bold);
    color: var(--color-gray-800);
    margin-bottom: var(--spacing-2);
}

.card__text {
    font-size: var(--font-size-sm);
    color: var(--color-gray-600);
    line-height: var(--line-height-relaxed);
}

/* ==========================================================================
   フォーム
   ========================================================================== */
.form-group {
    margin-bottom: var(--spacing-6);
}

.form-label {
    display: block;
    font-size: var(--font-size-sm);
    font-weight: var(--font-weight-bold);
    color: var(--color-gray-700);
    margin-bottom: var(--spacing-2);
}

.form-label--required::after {
    content: '*';
    color: var(--color-error);
    margin-left: var(--spacing-1);
}

.form-input,
.form-select,
.form-textarea {
    display: block;
    width: 100%;
    padding: var(--spacing-3) var(--spacing-4);
    font-size: var(--font-size-base);
    line-height: var(--line-height-normal);
    color: var(--color-gray-800);
    background-color: var(--color-white);
    border: 1px solid var(--color-gray-300);
    border-radius: var(--border-radius-md);
    transition: border-color var(--transition-fast), box-shadow var(--transition-fast);
}

.form-input:focus,
.form-select:focus,
.form-textarea:focus {
    outline: none;
    border-color: var(--color-primary-500);
    box-shadow: 0 0 0 3px var(--color-primary-100);
}

.form-input::placeholder,
.form-textarea::placeholder {
    color: var(--color-gray-400);
}

.form-textarea {
    resize: vertical;
    min-height: 120px;
}

.form-input--error,
.form-select--error,
.form-textarea--error {
    border-color: var(--color-error);
}

.form-error {
    font-size: var(--font-size-sm);
    color: var(--color-error);
    margin-top: var(--spacing-1);
}

.form-hint {
    font-size: var(--font-size-sm);
    color: var(--color-gray-500);
    margin-top: var(--spacing-1);
}

/* チェックボックス & ラジオ */
.form-check {
    display: flex;
    align-items: flex-start;
    gap: var(--spacing-2);
    margin-bottom: var(--spacing-2);
}

.form-check-input {
    width: 18px;
    height: 18px;
    margin-top: 2px;
    flex-shrink: 0;
    accent-color: var(--color-primary);
}

.form-check-label {
    font-size: var(--font-size-sm);
    color: var(--color-gray-700);
}

/* ==========================================================================
   テキストユーティリティ
   ========================================================================== */
.text-left { text-align: left; }
.text-center { text-align: center; }
.text-right { text-align: right; }

.text-primary { color: var(--color-primary); }
.text-accent { color: var(--color-accent); }
.text-success { color: var(--color-success); }
.text-warning { color: var(--color-warning); }
.text-error { color: var(--color-error); }
.text-white { color: var(--color-white); }
.text-muted { color: var(--color-gray-500); }

.text-sm { font-size: var(--font-size-sm); }
.text-base { font-size: var(--font-size-base); }
.text-lg { font-size: var(--font-size-lg); }
.text-xl { font-size: var(--font-size-xl); }
.text-2xl { font-size: var(--font-size-2xl); }

.font-normal { font-weight: var(--font-weight-normal); }
.font-medium { font-weight: var(--font-weight-medium); }
.font-bold { font-weight: var(--font-weight-bold); }
.font-black { font-weight: var(--font-weight-black); }

.font-serif { font-family: var(--font-family-serif); }
.font-accent { font-family: var(--font-family-accent); }

/* ==========================================================================
   スペーシングユーティリティ
   ========================================================================== */
.mt-0 { margin-top: 0; }
.mt-4 { margin-top: var(--spacing-4); }
.mt-6 { margin-top: var(--spacing-6); }
.mt-8 { margin-top: var(--spacing-8); }
.mt-12 { margin-top: var(--spacing-12); }

.mb-0 { margin-bottom: 0; }
.mb-4 { margin-bottom: var(--spacing-4); }
.mb-6 { margin-bottom: var(--spacing-6); }
.mb-8 { margin-bottom: var(--spacing-8); }
.mb-12 { margin-bottom: var(--spacing-12); }

.py-4 { padding-top: var(--spacing-4); padding-bottom: var(--spacing-4); }
.py-8 { padding-top: var(--spacing-8); padding-bottom: var(--spacing-8); }
.py-12 { padding-top: var(--spacing-12); padding-bottom: var(--spacing-12); }

.px-4 { padding-left: var(--spacing-4); padding-right: var(--spacing-4); }
.px-6 { padding-left: var(--spacing-6); padding-right: var(--spacing-6); }
.px-8 { padding-left: var(--spacing-8); padding-right: var(--spacing-8); }

/* ==========================================================================
   フレックスユーティリティ
   ========================================================================== */
.flex { display: flex; }
.flex-col { flex-direction: column; }
.flex-wrap { flex-wrap: wrap; }
.items-center { align-items: center; }
.items-start { align-items: flex-start; }
.items-end { align-items: flex-end; }
.justify-center { justify-content: center; }
.justify-between { justify-content: space-between; }
.justify-start { justify-content: flex-start; }
.justify-end { justify-content: flex-end; }
.gap-2 { gap: var(--spacing-2); }
.gap-4 { gap: var(--spacing-4); }
.gap-6 { gap: var(--spacing-6); }
.gap-8 { gap: var(--spacing-8); }

/* ==========================================================================
   グリッドユーティリティ
   ========================================================================== */
.grid { display: grid; }
.grid-cols-1 { grid-template-columns: repeat(1, minmax(0, 1fr)); }
.grid-cols-2 { grid-template-columns: repeat(2, minmax(0, 1fr)); }
.grid-cols-3 { grid-template-columns: repeat(3, minmax(0, 1fr)); }
.grid-cols-4 { grid-template-columns: repeat(4, minmax(0, 1fr)); }

@media (min-width: 768px) {
    .md\:grid-cols-2 { grid-template-columns: repeat(2, minmax(0, 1fr)); }
    .md\:grid-cols-3 { grid-template-columns: repeat(3, minmax(0, 1fr)); }
    .md\:grid-cols-4 { grid-template-columns: repeat(4, minmax(0, 1fr)); }
}

/* ==========================================================================
   レスポンシブユーティリティ
   ========================================================================== */
.sp-only {
    display: block;
}

.pc-only {
    display: none;
}

@media (min-width: 768px) {
    .sp-only {
        display: none;
    }
    
    .pc-only {
        display: block;
    }
}

/* ==========================================================================
   アイコンユーティリティ
   ========================================================================== */
.icon {
    display: inline-block;
    width: 24px;
    height: 24px;
    vertical-align: middle;
}

.icon--xs { width: 12px; height: 12px; }
.icon--sm { width: 16px; height: 16px; }
.icon--md { width: 24px; height: 24px; }
.icon--lg { width: 32px; height: 32px; }
.icon--xl { width: 48px; height: 48px; }

/* ==========================================================================
   アニメーション
   ========================================================================== */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeInDown {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeInLeft {
    from {
        opacity: 0;
        transform: translateX(-30px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes fadeInRight {
    from {
        opacity: 0;
        transform: translateX(30px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes pulse {
    0%, 100% {
        opacity: 1;
    }
    50% {
        opacity: 0.5;
    }
}

@keyframes bounce {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-10px);
    }
}

@keyframes spin {
    from {
        transform: rotate(0deg);
    }
    to {
        transform: rotate(360deg);
    }
}

/* アニメーションクラス */
.animate-fade-in {
    animation: fadeIn 0.6s ease forwards;
}

.animate-fade-in-up {
    animation: fadeInUp 0.6s ease forwards;
}

.animate-pulse {
    animation: pulse 2s ease-in-out infinite;
}

.animate-bounce {
    animation: bounce 2s ease infinite;
}

.animate-spin {
    animation: spin 1s linear infinite;
}

/* 遅延クラス */
.delay-100 { animation-delay: 100ms; }
.delay-200 { animation-delay: 200ms; }
.delay-300 { animation-delay: 300ms; }
.delay-400 { animation-delay: 400ms; }
.delay-500 { animation-delay: 500ms; }

/* スクロールアニメーション用 */
.animate-on-scroll {
    opacity: 0;
    transform: translateY(30px);
    transition: opacity 0.6s ease, transform 0.6s ease;
}

.animate-on-scroll.is-visible {
    opacity: 1;
    transform: translateY(0);
}

/* ==========================================================================
   印刷スタイル
   ========================================================================== */
@media print {
    *,
    *::before,
    *::after {
        background: transparent !important;
        color: #000 !important;
        box-shadow: none !important;
        text-shadow: none !important;
    }
    
    a,
    a:visited {
        text-decoration: underline;
    }
    
    a[href]::after {
        content: " (" attr(href) ")";
    }
    
    img {
        page-break-inside: avoid;
    }
    
    p,
    h2,
    h3 {
        orphans: 3;
        widows: 3;
    }
    
    h2,
    h3 {
        page-break-after: avoid;
    }
    
    .header,
    .footer,
    .fixed_contact,
    .pagetop {
        display: none !important;
    }
}
