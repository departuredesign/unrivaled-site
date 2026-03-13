<?php
/**
 * Privacy Policy page template for Unrivaled Sports.
 */
$assets = get_theme_file_uri( "assets/" );
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
  <style>
    /* ==========================================================================
       WEB FONTS
       ========================================================================== */
    @font-face {
      font-family: 'Review';
      src: url('<?php echo $assets; ?>fonts/review-bold-webfont.woff2') format('woff2'),
           url('<?php echo $assets; ?>fonts/review-bold-webfont.woff') format('woff');
      font-weight: 700;
      font-style: normal;
      font-display: swap;
    }
    @font-face {
      font-family: 'Review';
      src: url('<?php echo $assets; ?>fonts/review-heavy-webfont.woff2') format('woff2'),
           url('<?php echo $assets; ?>fonts/review-heavy-webfont.woff') format('woff');
      font-weight: 800;
      font-style: normal;
      font-display: swap;
    }
    @font-face {
      font-family: 'Review Poster';
      src: url('<?php echo $assets; ?>fonts/reviewposter-heavy-webfont.woff2') format('woff2'),
           url('<?php echo $assets; ?>fonts/reviewposter-heavy-webfont.woff') format('woff');
      font-weight: 800;
      font-style: normal;
      font-display: swap;
    }
    @font-face {
      font-family: 'Neue Plak';
      src: url('<?php echo $assets; ?>fonts/neue_plak_regular-webfont.woff2') format('woff2'),
           url('<?php echo $assets; ?>fonts/neue_plak_regular-webfont.woff') format('woff');
      font-weight: 400;
      font-style: normal;
      font-display: swap;
    }
    @font-face {
      font-family: 'Neue Plak';
      src: url('<?php echo $assets; ?>fonts/neue_plak_bold-webfont.woff2') format('woff2'),
           url('<?php echo $assets; ?>fonts/neue_plak_bold-webfont.woff') format('woff');
      font-weight: 700;
      font-style: normal;
      font-display: swap;
    }
    @font-face {
      font-family: 'Neue Plak Text';
      src: url('<?php echo $assets; ?>fonts/neue_plak_regular-webfont.woff2') format('woff2'),
           url('<?php echo $assets; ?>fonts/neue_plak_regular-webfont.woff') format('woff');
      font-weight: 400;
      font-style: normal;
      font-display: swap;
    }

    /* ==========================================================================
       DESIGN TOKENS
       ========================================================================== */
    :root {
      --color-navy:           #1D2468;
      --color-red:            #FF0000;
      --color-red-alt:        #FF0505;
      --color-blue:           #0162FF;
      --color-gold:           #A88A3E;
      --color-gold-overlay:   #C1A556;
      --color-white:          #FFFFFF;
      --color-black:          #000000;
      --color-gray-light:     #F1F1F1;
      --color-gray-placeholder: #D9D9D9;

      --font-display:         'Review', 'Arial Black', sans-serif;
      --font-display-poster:  'Review Poster', 'Review', 'Arial Black', sans-serif;
      --font-ui:              'Neue Plak', 'Helvetica Neue', Helvetica, Arial, sans-serif;
      --font-body:            'Neue Plak Text', 'Neue Plak', 'Helvetica Neue', Helvetica, Arial, sans-serif;
      --weight-regular:       400;
      --weight-medium:        500;
      --weight-semibold:      600;
      --weight-bold:          700;
      --weight-poster-heavy:  800;

      --page-max-width:       1440px;
      --content-max-width:    1320px;
      --margin-desktop:       40px;
      --margin-mobile:        20px;
      --radius:               6px;

      --transition-fast:      150ms ease;
      --transition-base:      250ms ease;
      --ease-out:             cubic-bezier(0.25, 0.1, 0.25, 1);
      --focus-ring-width:     2px;
      --focus-ring-color:     var(--color-blue);
      --focus-ring-offset:    2px;

      --hamburger-bar-color:  var(--color-red-alt);
      --hamburger-bar-height: 3.4px;
      --hamburger-bar-width:  40px;
      --sticky-nav-height:    58px;
    }

    * { margin: 0; padding: 0; box-sizing: border-box; }
    html { scroll-behavior: smooth; }
    body { font-family: var(--font-body); color: var(--color-black); background: var(--color-white); overflow-x: hidden; }
    body.menu-open { overflow: hidden; }
    img { display: block; max-width: 100%; }
    a { color: inherit; }


    /* ==========================================================================
       01. SITE HEADER (static, white background, no hero)
       ========================================================================== */
    .site-header { position: relative; top: 0; left: 0; width: 100%; z-index: 100; background: var(--color-white); border-bottom: 1px solid var(--color-gray-light); }
    .site-header__inner {
      display: flex; align-items: center; justify-content: space-between;
      max-width: var(--page-max-width); margin: 0 auto;
      padding: 15px var(--margin-mobile); position: relative;
    }
    @media (min-width: 768px) { .site-header__inner { padding: 20px 30px; } }
    @media (min-width: 1024px) { .site-header__inner { padding: 25px var(--margin-desktop); } }

    .site-header__logo-mark {
      position: absolute; left: 50%; top: 50%; transform: translate(-50%, -50%);
    }
    @media (max-width: 767px) { .site-header__logo-mark { display: none; } }

    .site-header__nav { display: none; align-items: center; gap: 24px; }
    @media (min-width: 1024px) { .site-header__nav { display: flex; } }

    .site-header__nav-link {
      font-family: var(--font-ui); font-weight: var(--weight-bold);
      font-size: 14px; line-height: 0.85; letter-spacing: 0.84px;
      text-transform: uppercase; text-decoration: none; color: var(--color-red);
      transition: opacity var(--transition-fast);
    }
    .site-header__nav-link:hover { opacity: 0.7; }
    .site-header__nav-link:focus-visible {
      outline: var(--focus-ring-width) solid var(--color-red);
      outline-offset: var(--focus-ring-offset); border-radius: 2px;
    }

    /* Wordmark */
    .wordmark {
      display: inline-flex; align-items: center; line-height: 0;
      text-decoration: none; color: inherit; transition: opacity var(--transition-fast);
    }
    .wordmark:hover { opacity: 0.85; }
    .wordmark:focus-visible { outline: var(--focus-ring-width) solid currentColor; outline-offset: var(--focus-ring-offset); border-radius: 2px; }
    .wordmark svg { width: 100%; height: auto; fill: currentColor; }
    .site-header .wordmark { width: 144px; color: var(--color-red); }
    @media (min-width: 1024px) { .site-header .wordmark { width: 165px; } }

    /* Logo mark */
    .logo-mark { display: inline-flex; align-items: center; justify-content: center; line-height: 0; }
    .logo-mark svg { width: 100%; height: auto; fill: currentColor; }
    .logo-mark--sm { width: 60px; color: var(--color-red); }
    @media (min-width: 1024px) { .logo-mark--sm { width: 114px; } }

    /* Hamburger */
    .hamburger {
      display: flex; flex-direction: column; justify-content: center; gap: 6px;
      width: var(--hamburger-bar-width); height: 30px; background: none; border: none; cursor: pointer; padding: 0;
    }
    @media (min-width: 1024px) { .hamburger { display: none; } }
    .hamburger__bar {
      display: block; width: 100%; height: var(--hamburger-bar-height);
      background-color: var(--hamburger-bar-color); border-radius: 1px;
    }
    .hamburger:focus-visible { outline: var(--focus-ring-width) solid var(--color-red); outline-offset: var(--focus-ring-offset); border-radius: 2px; }


    /* ==========================================================================
       02. MOBILE MENU
       ========================================================================== */
    .mobile-menu__overlay {
      position: fixed; inset: 0; z-index: 200; background-color: var(--color-gold-overlay);
      display: flex; flex-direction: column; padding: 20px 22px;
      overflow-y: auto; transform: translateX(100%);
      transition: transform 400ms cubic-bezier(0.42, 0, 0.58, 1);
    }
    .mobile-menu[data-open="true"] .mobile-menu__overlay { transform: translateX(0); }

    .mobile-menu__header {
      display: flex; align-items: center; justify-content: space-between;
      flex-shrink: 0;
    }
    .mobile-menu__header .logo-mark { width: 81px; color: var(--color-black); }
    .mobile-menu__header .logo-mark svg { width: 100%; height: auto; fill: currentColor; }

    .mobile-menu__close {
      width: 40px; height: 40px; background: none; border: none; cursor: pointer; padding: 0;
      display: flex; align-items: center; justify-content: center; position: relative;
    }
    .mobile-menu__close::before, .mobile-menu__close::after {
      content: ''; position: absolute; width: 32px; height: 2.8px;
      background-color: var(--color-black); border-radius: 1px;
    }
    .mobile-menu__close::before { transform: rotate(45deg); }
    .mobile-menu__close::after { transform: rotate(-45deg); }
    .mobile-menu__close:focus-visible { outline: var(--focus-ring-width) solid var(--color-black); outline-offset: var(--focus-ring-offset); border-radius: 2px; }

    .mobile-menu__nav {
      flex: 1; display: flex; flex-direction: column; justify-content: flex-start;
      padding: 40px 0 40px;
    }
    .mobile-menu__nav-item {
      display: block; padding: 18px 0; border-top: 1px solid rgba(0,0,0,0.2);
      text-decoration: none; font-family: var(--font-display-poster); font-weight: var(--weight-poster-heavy);
      font-size: 66px; line-height: 0.85; letter-spacing: 0.66px; text-transform: uppercase;
      color: var(--color-black); transition: opacity var(--transition-fast);
    }
    .mobile-menu__nav-item:last-child { border-bottom: 1px solid rgba(0,0,0,0.2); }
    .mobile-menu__nav-item:hover { opacity: 0.7; }
    .mobile-menu__nav-item:focus-visible { outline: var(--focus-ring-width) solid var(--color-black); outline-offset: var(--focus-ring-offset); border-radius: 2px; }

    .mobile-menu[data-open="true"] .mobile-menu__nav-item { animation: menu-item-in 400ms var(--ease-out) both; }
    .mobile-menu[data-open="true"] .mobile-menu__nav-item:nth-child(1) { animation-delay: 100ms; }
    .mobile-menu[data-open="true"] .mobile-menu__nav-item:nth-child(2) { animation-delay: 150ms; }
    .mobile-menu[data-open="true"] .mobile-menu__nav-item:nth-child(3) { animation-delay: 200ms; }
    .mobile-menu[data-open="true"] .mobile-menu__nav-item:nth-child(4) { animation-delay: 250ms; }
    .mobile-menu[data-open="true"] .mobile-menu__nav-item:nth-child(5) { animation-delay: 300ms; }
    @keyframes menu-item-in { from { opacity: 0; transform: translateX(30px); } to { opacity: 1; transform: translateX(0); } }

    .mobile-menu__footer {
      display: flex; gap: 40px; padding-bottom: 30px; flex-shrink: 0;
    }
    .mobile-menu__footer-col { display: flex; flex-direction: column; }
    .mobile-menu__footer-label {
      font-family: var(--font-ui); font-weight: var(--weight-bold);
      font-size: 12px; line-height: 20px; letter-spacing: 1.2px; text-transform: uppercase;
      color: var(--color-black); margin: 0 0 4px;
    }
    .mobile-menu__footer-link {
      font-family: var(--font-display); font-weight: var(--weight-bold);
      font-size: 18px; line-height: 1; letter-spacing: 0.36px; text-transform: uppercase;
      text-decoration: none; color: var(--color-black); display: block; margin-bottom: 4px;
      transition: opacity var(--transition-fast);
    }
    .mobile-menu__footer-link:hover { opacity: 0.7; }
    .mobile-menu__footer-email {
      font-family: var(--font-body); font-weight: var(--weight-regular);
      font-size: 14px; line-height: 1.2; text-decoration: none; color: var(--color-black);
      transition: opacity var(--transition-fast);
    }
    .mobile-menu__footer-email:hover { opacity: 0.7; }


    /* ==========================================================================
       03. STICKY NAV (scroll-reveal, both mobile + desktop)
       ========================================================================== */
    .sticky-nav {
      position: fixed; top: 0; left: 0; width: 100%; z-index: 200;
      background-color: var(--color-white);
      border-bottom: 1px solid var(--color-red);
      transform: translateY(-100%); transition: transform 300ms var(--ease-out);
    }
    .sticky-nav[data-visible="true"] { transform: translateY(0); }
    .sticky-nav__inner {
      display: flex; align-items: center; justify-content: space-between;
      max-width: var(--page-max-width); margin: 0 auto;
      padding: 15px var(--margin-mobile); position: relative;
    }
    @media (min-width: 768px) { .sticky-nav__inner { padding: 20px 30px; } }
    @media (min-width: 1024px) { .sticky-nav__inner { padding: 20px var(--margin-desktop); } }
    .sticky-nav .wordmark { width: 120px; color: var(--color-red); }
    @media (min-width: 1024px) { .sticky-nav .wordmark { width: 165px; } }
    .sticky-nav__logo-mark {
      position: absolute; left: 50%; top: 50%; transform: translate(-50%, -50%);
      color: var(--color-red); display: none;
    }
    @media (min-width: 768px) { .sticky-nav__logo-mark { display: inline-flex; } }
    .sticky-nav__logo-mark svg { width: 100%; height: auto; fill: currentColor; }
    .sticky-nav__logo-mark { width: 60px; }
    @media (min-width: 1024px) { .sticky-nav__logo-mark { width: 114px; } }
    .sticky-nav__links { display: none; align-items: center; gap: 24px; }
    @media (min-width: 1024px) { .sticky-nav__links { display: flex; } }
    .sticky-nav__link {
      font-family: var(--font-ui); font-weight: var(--weight-bold);
      font-size: 14px; line-height: 0.85; letter-spacing: 0.84px;
      text-transform: uppercase; text-decoration: none; color: var(--color-red);
      transition: opacity var(--transition-fast);
    }
    .sticky-nav__link:hover { opacity: 0.7; }
    .sticky-nav .hamburger { display: flex; }
    @media (min-width: 1024px) { .sticky-nav .hamburger { display: none; } }
    .sticky-nav .hamburger__bar { background-color: var(--color-red-alt); }


    /* ==========================================================================
       04. PAGE CONTENT AREA
       ========================================================================== */
    .page-content { width: 100%; background: var(--color-white); }
    .page-content__inner {
      width: 100%; max-width: var(--content-max-width); margin: 0 auto;
      padding: 60px var(--margin-mobile) 80px;
    }
    @media (min-width: 768px) { .page-content__inner { padding: 80px 30px 100px; } }
    @media (min-width: 1024px) { .page-content__inner { padding: 80px var(--margin-desktop) 120px; } }

    /* Typography for WordPress content */
    .page-content__inner h1 {
      font-family: var(--font-display); font-weight: var(--weight-poster-heavy);
      font-size: 32px; line-height: 1.1; letter-spacing: 0.64px;
      text-transform: uppercase; color: var(--color-navy); margin: 0 0 24px;
    }
    @media (min-width: 768px) { .page-content__inner h1 { font-size: 44px; } }
    @media (min-width: 1024px) { .page-content__inner h1 { font-size: 56px; letter-spacing: 1.12px; } }

    .page-content__inner h2 {
      font-family: var(--font-display); font-weight: var(--weight-bold);
      font-size: 26px; line-height: 1.15; letter-spacing: 0.52px;
      text-transform: uppercase; color: var(--color-navy); margin: 48px 0 16px;
    }
    @media (min-width: 768px) { .page-content__inner h2 { font-size: 32px; } }
    @media (min-width: 1024px) { .page-content__inner h2 { font-size: 38px; letter-spacing: 0.76px; } }

    .page-content__inner h3 {
      font-family: var(--font-display); font-weight: var(--weight-bold);
      font-size: 20px; line-height: 1.2; letter-spacing: 0.4px;
      text-transform: uppercase; color: var(--color-navy); margin: 40px 0 12px;
    }
    @media (min-width: 768px) { .page-content__inner h3 { font-size: 24px; } }
    @media (min-width: 1024px) { .page-content__inner h3 { font-size: 28px; letter-spacing: 0.56px; } }

    .page-content__inner h4 {
      font-family: var(--font-ui); font-weight: var(--weight-bold);
      font-size: 16px; line-height: 1.3; letter-spacing: 0.8px;
      text-transform: uppercase; color: var(--color-black); margin: 32px 0 10px;
    }
    @media (min-width: 1024px) { .page-content__inner h4 { font-size: 18px; letter-spacing: 0.9px; } }

    .page-content__inner p {
      font-family: var(--font-body); font-weight: var(--weight-regular);
      font-size: 16px; line-height: 1.6; color: var(--color-black); margin: 0 0 20px;
    }
    @media (min-width: 1024px) { .page-content__inner p { font-size: 16px; line-height: 1.7; } }

    .page-content__inner ul,
    .page-content__inner ol {
      font-family: var(--font-body); font-weight: var(--weight-regular);
      font-size: 16px; line-height: 1.6; color: var(--color-black);
      margin: 0 0 20px; padding-left: 24px;
    }
    .page-content__inner li { margin-bottom: 8px; }
    .page-content__inner ul li { list-style-type: disc; }
    .page-content__inner ol li { list-style-type: decimal; }

    .page-content__inner a {
      color: var(--color-blue); text-decoration: underline;
      transition: opacity var(--transition-fast);
    }
    .page-content__inner a:hover { opacity: 0.7; }

    .page-content__inner blockquote {
      border-left: 4px solid var(--color-red);
      padding: 16px 24px; margin: 24px 0;
      font-style: italic; color: #444;
    }

    .page-content__inner img {
      max-width: 100%; height: auto; border-radius: var(--radius); margin: 24px 0;
    }

    .page-content__inner table {
      width: 100%; border-collapse: collapse; margin: 24px 0;
      font-family: var(--font-body); font-size: 15px;
    }
    .page-content__inner th,
    .page-content__inner td {
      padding: 12px 16px; border-bottom: 1px solid var(--color-gray-light); text-align: left;
    }
    .page-content__inner th {
      font-family: var(--font-ui); font-weight: var(--weight-bold);
      font-size: 12px; text-transform: uppercase; letter-spacing: 0.6px;
      color: var(--color-navy);
    }

    /* First heading should not have top margin */
    .page-content__inner > h1:first-child,
    .page-content__inner > h2:first-child,
    .page-content__inner > h3:first-child,
    .page-content__inner > h4:first-child { margin-top: 0; }


    /* ==========================================================================
       05. SITE FOOTER
       ========================================================================== */
    .site-footer { background: var(--color-navy); color: var(--color-white); width: 100%; }
    .site-footer__inner { max-width: var(--content-max-width); margin: 0 auto; padding: 40px var(--margin-mobile); }
    @media (min-width: 1024px) { .site-footer__inner { padding: 54px var(--margin-desktop) 40px; } }

    .site-footer__main { display: flex; flex-direction: column; gap: 32px; }
    @media (min-width: 1024px) { .site-footer__main { flex-direction: row; align-items: flex-start; gap: 0; } }

    .site-footer__logo { order: 4; }
    @media (min-width: 1024px) { .site-footer__logo { order: 0; flex: 0 0 auto; margin-right: auto; } }
    .site-footer .wordmark { width: 100%; max-width: 335px; }
    @media (min-width: 1024px) { .site-footer .wordmark { width: 335px; } }
    .site-footer .wordmark svg { fill: none; }

    .site-footer__col { display: flex; flex-direction: column; }
    @media (min-width: 1024px) { .site-footer__col { min-width: 160px; margin-left: 40px; } }

    .site-footer__label {
      font-family: var(--font-ui); font-weight: var(--weight-semibold);
      font-size: 12px; line-height: 32px; letter-spacing: 1.2px; text-transform: uppercase; margin: 0 0 4px;
    }
    .site-footer__link {
      font-family: var(--font-display); font-weight: var(--weight-bold);
      font-size: 20px; line-height: 22px; letter-spacing: 0.8px; text-transform: uppercase;
      text-decoration: none; color: var(--color-white); transition: opacity var(--transition-fast); display: block; margin-bottom: 4px;
    }
    @media (min-width: 1024px) { .site-footer__link { font-size: 18px; line-height: 21.2px; letter-spacing: 0.54px; } }
    .site-footer__link:hover { opacity: 0.7; }
    .site-footer__link:focus-visible { outline: var(--focus-ring-width) solid var(--color-white); outline-offset: var(--focus-ring-offset); border-radius: 2px; }

    .site-footer__email {
      font-family: var(--font-body); font-weight: var(--weight-regular);
      font-size: 22px; line-height: 23px; letter-spacing: 0.44px;
      text-decoration: underline; color: var(--color-white); transition: opacity var(--transition-fast);
    }
    @media (min-width: 1024px) { .site-footer__email { font-size: 24px; line-height: 30px; text-decoration: none; } }
    .site-footer__email:hover { opacity: 0.7; }

    .site-footer__legal { margin-top: 40px; display: flex; flex-direction: column; gap: 6px; }
    @media (min-width: 1024px) { .site-footer__legal { flex-direction: row; gap: 16px; } }
    .site-footer__legal-text, .site-footer__legal-link {
      font-family: var(--font-ui); font-weight: var(--weight-regular);
      font-size: 12px; line-height: 14px; letter-spacing: 0.6px; color: var(--color-white); opacity: 0.8;
    }
    .site-footer__legal-link { text-decoration: none; transition: opacity var(--transition-fast); }
    .site-footer__legal-link:hover { opacity: 1; }
  </style>
</head>
<body>

  <!-- ================================================================
       MOBILE MENU (fixed overlay)
       ================================================================ -->
  <div class="mobile-menu" id="mobileMenu" data-open="false">
    <div class="mobile-menu__overlay">
      <div class="mobile-menu__header">
        <div class="logo-mark">
          <svg viewBox="0 0 434 142" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M156.655 100.212C166.722 97.528 170.092 102.311 164.142 110.846C157.271 120.702 160.903 125.403 172.211 121.297L434 26.2306H247.736C244.967 26.2306 241.277 27.986 239.541 30.1332L191.322 89.6114C188.635 92.8322 186.312 91.4249 188.495 87.6673L231.346 14.5129C236.025 6.52863 232.267 0 222.996 0H92.3755L0 142L156.655 100.212Z" fill="currentColor"/>
</svg>
        </div>
        <button class="mobile-menu__close" aria-label="Close menu" onclick="closeMenu()"></button>
      </div>
      <nav class="mobile-menu__nav">
        <a href="<?php echo home_url( '/' ); ?>#about" class="mobile-menu__nav-item" onclick="closeMenu()">About</a>
        <a href="<?php echo home_url( '/team/' ); ?>" class="mobile-menu__nav-item" onclick="closeMenu()">Team</a>
        <a href="<?php echo home_url( '/' ); ?>#press" class="mobile-menu__nav-item" onclick="closeMenu()">Press</a>
        <a href="<?php echo home_url( '/' ); ?>#contact" class="mobile-menu__nav-item" onclick="closeMenu()">Contact</a>
        <a href="<?php echo home_url( '/careers/' ); ?>" class="mobile-menu__nav-item" onclick="closeMenu()">Careers</a>
      </nav>
      <div class="mobile-menu__footer">
        <div class="mobile-menu__footer-col">
          <p class="mobile-menu__footer-label">Socials</p>
          <a href="https://www.instagram.com/unrivaled.sports/" target="_blank" rel="noopener noreferrer" class="mobile-menu__footer-link">Instagram</a>
          <a href="https://www.linkedin.com/company/unrivaled-sports" target="_blank" rel="noopener noreferrer" class="mobile-menu__footer-link">LinkedIn</a>
        </div>
        <div class="mobile-menu__footer-col">
          <p class="mobile-menu__footer-label">Contact</p>
          <a href="mailto:info@unrivaledsports.com" class="mobile-menu__footer-email">info@unrivaledsports.com</a>
        </div>
      </div>
    </div>
  </div>

  <!-- ================================================================
       STICKY NAV (scroll-reveal, desktop + mobile)
       ================================================================ -->
  <div class="sticky-nav" id="stickyNav" data-visible="false">
    <div class="sticky-nav__inner">
      <a href="<?php echo home_url( '/' ); ?>" class="wordmark"><svg viewBox="0 0 166 36" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8.15 16.63C1.78 16.63 0 14.89 0 9.29V0h5.05v9.09c0 2.97.77 3.61 3.51 3.61h.5c2.78 0 3.5-.66 3.5-3.61V0h5.05v9.29c0 5.6-1.77 7.34-8.12 7.34H8.15z" fill="currentColor"/><path d="M40.17 16.39h-7.49L25.42 4.99h-.18v11.4h-4.76V0h7.49l7.26 11.43h.18V0h4.76v16.39z" fill="currentColor"/><path d="M47.99 16.39h-4.96V0h11.08c4.96 0 6.62 1.14 6.62 4.33v.52c0 2.46-.84 3.56-3.09 3.84v.16c2.14.37 3.09.82 3.09 3.84v3.7h-4.98v-3.47c0-1.52-.43-1.94-2.89-1.94h-4.87v5.41zm0-12.72v3.63h5.66c1.53 0 2.09-.37 2.09-1.66v-.14c0-1.43-.59-1.83-2.82-1.83h-4.93z" fill="currentColor"/><path d="M68.57 16.39h-4.96V0h4.96v16.39z" fill="currentColor"/><path d="M83.9 16.39h-6.37L70.25 0h5.76l4.8 11.5h.18L85.84 0h5.35l-7.28 16.39z" fill="currentColor"/><path d="M109.56 16.39h-5.6l-1.41-3.28h-8.33l-1.39 3.28h-5.39L94.72 0h7.53l7.31 16.39zm-11.26-12.83l-2.5 5.85h5.19l-2.5-5.85h-.19z" fill="currentColor"/><path d="M125.69 16.39H111.24V0h4.96v12.27h9.49v4.12z" fill="currentColor"/><path d="M143.89 16.39h-15.34V0h15.34v3.7h-10.38v2.62h10.38v3.73h-10.38v2.65h10.38v3.7z" fill="currentColor"/><path d="M165.03 8.52c0 5.76-2.37 7.87-8.92 7.87h-9.35V0h9.26c6.55 0 9.01 2.13 9.01 7.89v.63zm-13.31-4.66v8.67h3.71c3.89 0 4.55-1.33 4.55-4.19v-.25c0-2.86-.66-4.19-4.55-4.19h-3.71v-.04z" fill="currentColor"/><path d="M8.81 36C4.03 36 .55 34.88 0 31.04h5.28c.43 1.19 1.69 1.41 4.12 1.41 2.76 0 3.73-.42 3.75-1.55v-.19c0-.87-.46-1.27-2.09-1.29l-4.41-.16C2.09 29.07.41 27.83.41 24.67v-.16c0-3.77 2.5-5.37 8.3-5.37h.61c4.73 0 8.1 1.38 8.65 5.18h-5.28c-.36-1.24-1.52-1.61-3.82-1.61-2.64 0-3.41.42-3.41 1.52v.07c0 .87.43 1.27 2.07 1.33l4.39.14c4.55.14 6.23 1.47 6.23 4.54v.16c0 4.12-2.82 5.52-8.56 5.52h-.8z" fill="currentColor"/><path d="M25.71 35.76h-4.96V19.37h10.96c4.91 0 6.73 1.5 6.73 5.62v.47c0 3.86-1.93 5.55-6.73 5.55h-6.01v4.76zm0-12.72v4.31h5.28c2.05 0 2.48-.54 2.48-2.09v-.16c0-1.59-.5-2.06-2.52-2.06h-5.24z" fill="currentColor"/><path d="M49.45 36c-6.55 0-9.12-2.11-9.12-7.87v-1.1c0-5.76 2.57-7.9 9.12-7.9h1.27c6.55 0 9.15 2.13 9.15 7.9v1.1c0 5.76-2.59 7.87-9.15 7.87h-1.27zm.91-3.89c3.82 0 4.46-1.41 4.46-4.19v-.7c0-2.81-.64-4.19-4.46-4.19h-.53c-3.85 0-4.46 1.38-4.46 4.19v.7c0 2.79.61 4.19 4.46 4.19h.53z" fill="currentColor"/><path d="M67.15 35.76h-4.96V19.37h11.08c4.96 0 6.62 1.14 6.62 4.33v.52c0 2.46-.84 3.56-3.1 3.84v.17c2.14.37 3.1.82 3.1 3.84v3.7h-4.98v-3.47c0-1.52-.43-1.94-2.89-1.94h-4.87v5.41zm0-12.72v3.63h5.66c1.53 0 2.1-.37 2.1-1.66v-.14c0-1.43-.59-1.83-2.82-1.83h-4.94z" fill="currentColor"/><path d="M93.52 35.76h-4.96V23.49h-6.68v-4.12h18.37v4.12h-6.73v12.27z" fill="currentColor"/><path d="M110.69 36c-4.78 0-8.26-1.12-8.81-4.96h5.28c.43 1.19 1.69 1.41 4.12 1.41 2.76 0 3.73-.42 3.75-1.55v-.19c0-.87-.46-1.27-2.1-1.29l-4.41-.16c-4.55-.19-6.23-1.43-6.23-4.59v-.16c0-3.77 2.5-5.37 8.3-5.37h.62c4.73 0 8.1 1.38 8.65 5.18h-5.28c-.36-1.24-1.52-1.62-3.82-1.62-2.64 0-3.41.42-3.41 1.52v.07c0 .87.43 1.27 2.07 1.33l4.39.14c4.55.14 6.23 1.47 6.23 4.54v.16c0 4.12-2.82 5.52-8.56 5.52h-.8z" fill="currentColor"/></svg></a>
      <div class="sticky-nav__logo-mark logo-mark"><svg viewBox="0 0 114 36" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M41.1496 25.4067C43.7944 24.725 44.6802 25.9381 43.1163 28.1029C41.3111 30.6009 42.2661 31.7935 45.2358 30.7529L114 6.64983H65.0739C64.3461 6.64983 63.3787 7.09578 62.9207 7.63911L50.2539 22.7174C49.5474 23.5341 48.9385 23.177 49.5119 22.2236L60.7694 3.6786C61.9977 1.65562 61.0108 0 58.5754 0H24.2651L0 36L41.1496 25.405V25.4067Z" fill="currentColor"/></svg></div>
      <nav class="sticky-nav__links">
        <a href="<?php echo home_url( '/' ); ?>#about" class="sticky-nav__link">About</a>
        <a href="<?php echo home_url( '/team/' ); ?>" class="sticky-nav__link">Team</a>
        <a href="<?php echo home_url( '/' ); ?>#press" class="sticky-nav__link">Press</a>
        <a href="<?php echo home_url( '/' ); ?>#contact" class="sticky-nav__link">Contact</a>
        <a href="<?php echo home_url( '/careers/' ); ?>" class="sticky-nav__link">Careers</a>
      </nav>
      <button class="hamburger" aria-label="Open menu" onclick="openMenu()"><span class="hamburger__bar"></span><span class="hamburger__bar"></span><span class="hamburger__bar"></span></button>
    </div>
  </div>

  <!-- ================================================================
       SITE HEADER (static bar, no hero)
       ================================================================ -->
  <header class="site-header" id="pageHeader">
    <div class="site-header__inner">
      <a href="<?php echo home_url( '/' ); ?>" class="wordmark"><svg viewBox="0 0 166 36" xmlns="http://www.w3.org/2000/svg"><path d="M8.15 16.63C1.78 16.63 0 14.89 0 9.29V0h5.05v9.09c0 2.97.77 3.61 3.51 3.61h.5c2.78 0 3.5-.66 3.5-3.61V0h5.05v9.29c0 5.6-1.77 7.34-8.12 7.34H8.15z" fill="currentColor"/><path d="M40.17 16.39h-7.49L25.42 4.99h-.18v11.4h-4.76V0h7.49l7.26 11.43h.18V0h4.76v16.39z" fill="currentColor"/><path d="M47.99 16.39h-4.96V0h11.08c4.96 0 6.62 1.14 6.62 4.33v.52c0 2.46-.84 3.56-3.09 3.84v.16c2.14.37 3.09.82 3.09 3.84v3.7h-4.98v-3.47c0-1.52-.43-1.94-2.89-1.94h-4.87v5.41zm0-12.72v3.63h5.66c1.53 0 2.09-.37 2.09-1.66v-.14c0-1.43-.59-1.83-2.82-1.83h-4.93z" fill="currentColor"/><path d="M68.57 16.39h-4.96V0h4.96v16.39z" fill="currentColor"/><path d="M83.9 16.39h-6.37L70.25 0h5.76l4.8 11.5h.18L85.84 0h5.35l-7.28 16.39z" fill="currentColor"/><path d="M109.56 16.39h-5.6l-1.41-3.28h-8.33l-1.39 3.28h-5.39L94.72 0h7.53l7.31 16.39zm-11.26-12.83l-2.5 5.85h5.19l-2.5-5.85h-.19z" fill="currentColor"/><path d="M125.69 16.39H111.24V0h4.96v12.27h9.49v4.12z" fill="currentColor"/><path d="M143.89 16.39h-15.34V0h15.34v3.7h-10.38v2.62h10.38v3.73h-10.38v2.65h10.38v3.7z" fill="currentColor"/><path d="M165.03 8.52c0 5.76-2.37 7.87-8.92 7.87h-9.35V0h9.26c6.55 0 9.01 2.13 9.01 7.89v.63zm-13.31-4.66v8.67h3.71c3.89 0 4.55-1.33 4.55-4.19v-.25c0-2.86-.66-4.19-4.55-4.19h-3.71v-.04z" fill="currentColor"/><path d="M8.81 36C4.03 36 .55 34.88 0 31.04h5.28c.43 1.19 1.69 1.41 4.12 1.41 2.76 0 3.73-.42 3.75-1.55v-.19c0-.87-.46-1.27-2.09-1.29l-4.41-.16C2.09 29.07.41 27.83.41 24.67v-.16c0-3.77 2.5-5.37 8.3-5.37h.61c4.73 0 8.1 1.38 8.65 5.18h-5.28c-.36-1.24-1.52-1.61-3.82-1.61-2.64 0-3.41.42-3.41 1.52v.07c0 .87.43 1.27 2.07 1.33l4.39.14c4.55.14 6.23 1.47 6.23 4.54v.16c0 4.12-2.82 5.52-8.56 5.52h-.8z" fill="currentColor"/><path d="M25.71 35.76h-4.96V19.37h10.96c4.91 0 6.73 1.5 6.73 5.62v.47c0 3.86-1.93 5.55-6.73 5.55h-6.01v4.76zm0-12.72v4.31h5.28c2.05 0 2.48-.54 2.48-2.09v-.16c0-1.59-.5-2.06-2.52-2.06h-5.24z" fill="currentColor"/><path d="M49.45 36c-6.55 0-9.12-2.11-9.12-7.87v-1.1c0-5.76 2.57-7.9 9.12-7.9h1.27c6.55 0 9.15 2.13 9.15 7.9v1.1c0 5.76-2.59 7.87-9.15 7.87h-1.27zm.91-3.89c3.82 0 4.46-1.41 4.46-4.19v-.7c0-2.81-.64-4.19-4.46-4.19h-.53c-3.85 0-4.46 1.38-4.46 4.19v.7c0 2.79.61 4.19 4.46 4.19h.53z" fill="currentColor"/><path d="M67.15 35.76h-4.96V19.37h11.08c4.96 0 6.62 1.14 6.62 4.33v.52c0 2.46-.84 3.56-3.1 3.84v.17c2.14.37 3.1.82 3.1 3.84v3.7h-4.98v-3.47c0-1.52-.43-1.94-2.89-1.94h-4.87v5.41zm0-12.72v3.63h5.66c1.53 0 2.1-.37 2.1-1.66v-.14c0-1.43-.59-1.83-2.82-1.83h-4.94z" fill="currentColor"/><path d="M93.52 35.76h-4.96V23.49h-6.68v-4.12h18.37v4.12h-6.73v12.27z" fill="currentColor"/><path d="M110.69 36c-4.78 0-8.26-1.12-8.81-4.96h5.28c.43 1.19 1.69 1.41 4.12 1.41 2.76 0 3.73-.42 3.75-1.55v-.19c0-.87-.46-1.27-2.1-1.29l-4.41-.16c-4.55-.19-6.23-1.43-6.23-4.59v-.16c0-3.77 2.5-5.37 8.3-5.37h.62c4.73 0 8.1 1.38 8.65 5.18h-5.28c-.36-1.24-1.52-1.62-3.82-1.62-2.64 0-3.41.42-3.41 1.52v.07c0 .87.43 1.27 2.07 1.33l4.39.14c4.55.14 6.23 1.47 6.23 4.54v.16c0 4.12-2.82 5.52-8.56 5.52h-.8z" fill="currentColor"/></svg></a>
      <div class="site-header__logo-mark logo-mark logo-mark--sm"><svg viewBox="0 0 434 142" xmlns="http://www.w3.org/2000/svg"><path d="M156.655 100.212C166.722 97.528 170.092 102.311 164.142 110.846C157.271 120.702 160.903 125.403 172.211 121.297L434 26.2306H247.736C244.967 26.2306 241.277 27.986 239.541 30.1332L191.322 89.6114C188.635 92.8322 186.312 91.4249 188.495 87.6673L231.346 14.5129C236.025 6.52863 232.267 0 222.996 0H92.3755L0 142L156.655 100.212Z" fill="currentColor"/></svg></div>
      <nav class="site-header__nav">
        <a href="<?php echo home_url( '/' ); ?>#about" class="site-header__nav-link">About</a>
        <a href="<?php echo home_url( '/team/' ); ?>" class="site-header__nav-link">Team</a>
        <a href="<?php echo home_url( '/' ); ?>#press" class="site-header__nav-link">Press</a>
        <a href="<?php echo home_url( '/' ); ?>#contact" class="site-header__nav-link">Contact</a>
        <a href="<?php echo home_url( '/careers/' ); ?>" class="site-header__nav-link">Careers</a>
      </nav>
      <button class="hamburger" aria-label="Open menu" onclick="openMenu()"><span class="hamburger__bar"></span><span class="hamburger__bar"></span><span class="hamburger__bar"></span></button>
    </div>
  </header>

  <!-- ================================================================
       PAGE CONTENT
       ================================================================ -->
  <main class="page-content">
    <div class="page-content__inner">
      <h1>Unrivaled Privacy Policy</h1>
      <p><strong>Last Updated: February 1, 2025</strong></p>

      <p>This document describes personal data handling practices of Sandlot Youth Sports Holdings, LLC d/b/a Unrivaled Sports and its controlled affiliates (collectively &ldquo;Unrivaled&rdquo;) for website visitors and service users.</p>

      <h2>Quick Links to Key Sections</h2>
      <ol>
        <li>Personal Information That We Collect</li>
        <li>How We Use the Information</li>
        <li>With Whom We Share the Information</li>
        <li>Mobile Messaging</li>
        <li>Third-Party Websites</li>
        <li>Security and Retention of Your Personal Information</li>
        <li>Children&rsquo;s Privacy</li>
        <li>Grounds for Using the Information</li>
        <li>Your Privacy Rights and Choices</li>
        <li>Users Outside the United States</li>
        <li>Changes to this Privacy Policy</li>
        <li>Contact Us</li>
      </ol>

      <h2>1. Personal Information We Collect</h2>

      <h3>(A) Information Automatically Collected</h3>

      <h4>Computer IP Addresses/Browser Type</h4>
      <p>The company collects browser type, IP address, operating system type, and internet service provider domain name to improve service design and analyze usage patterns.</p>

      <h4>Cookies</h4>
      <p>Unrivaled sends cookies and gif files to assign unique identifiers to user devices. Cookies store user preferences and track site usage. Users can disable cookies through browser settings, though some service functions may be impaired.</p>

      <h4>Pixel Tags</h4>
      <p>The company uses tracking pixels embedded on pages and in communications to verify page views, message opens, link clicks, and content interactions.</p>

      <h4>Cross Contextual Behavioral Tracking</h4>
      <p>Unrivaled and third parties (Google, Bing, TikTok, Facebook) use tracking technology to monitor user activities across websites after leaving the site, enabling targeted advertising.</p>
      <p>Users may disable some tracking through:</p>
      <ul>
        <li>&ldquo;Do Not Track&rdquo; browser settings</li>
        <li>Network Advertising Initiative opt-out options</li>
        <li>Digital Advertising Alliance opt-out options</li>
        <li>Google Ads Settings</li>
        <li>Google Analytics Opt-out Browser Add-on</li>
      </ul>

      <h4>Cross Device Tracking</h4>
      <p>The company tracks user service access across devices to optimize and personalize experiences. Opting out may require repeated information uploads and login entries.</p>

      <h4>Social Media Pages</h4>
      <p>Unrivaled operates pages on Facebook, Instagram, TikTok, X, and YouTube. Social media providers process data independently; the company is not responsible for their content or privacy practices.</p>

      <h4>Mobile Device Information</h4>
      <p>When using mobile devices, collected information may include:</p>
      <ul>
        <li>Name associated with device</li>
        <li>Telephone number</li>
        <li>Geolocation</li>
        <li>Mobile device ID information</li>
      </ul>

      <h3>(B) Information Voluntarily Provided</h3>
      <p>Users provide information when:</p>
      <ul>
        <li>Creating and logging into accounts</li>
        <li>Registering for athletic events, tournaments, games, camps, and clinics</li>
        <li>Registering as players, coaches, or umpires</li>
        <li>Completing registration forms, waivers, and medical releases</li>
        <li>Registering for newsletters, live streaming, and photo services</li>
        <li>Purchasing merchandise and equipment</li>
        <li>Uploading athlete videos</li>
        <li>Applying for employment</li>
        <li>Accessing training resources</li>
        <li>Contacting via email, phone, mail, or chat</li>
      </ul>

      <h4>Types of Personally Identifiable Information Collected</h4>
      <ul>
        <li>Full name</li>
        <li>Mailing/billing address</li>
        <li>Email address</li>
        <li>Telephone number</li>
        <li>Emergency contact information</li>
        <li>Credit card or payment information</li>
        <li>Date of birth and birth certificates (for age verification)</li>
        <li>Information from forms, waivers, and medical releases</li>
      </ul>

      <h4>Third-Party Tournament Applications</h4>
      <p>Users may upload personal information of players and coaches to third-party tournament apps. These apps maintain separate privacy policies; Unrivaled is not responsible for their practices.</p>

      <h4>Recording of Events</h4>
      <p>Events may be recorded and live-streamed, available to other users or the public. Telephone calls and video conferences may be recorded. Chat sessions may be recorded and used by both Unrivaled and chat service providers.</p>

      <h4>Artificial Intelligence in Customer Support</h4>
      <p>The company may use chatbots with artificial intelligence and natural language processing for customer support. Users who don&rsquo;t consent should contact via email instead.</p>

      <h4>Employment Applications</h4>
      <p>Job applicants may be asked for:</p>
      <ul>
        <li>Date of birth</li>
        <li>Legal right to work in the United States</li>
        <li>Employment history</li>
        <li>Criminal history</li>
        <li>Military service information</li>
        <li>Resume, transcript, or cover letter information</li>
      </ul>

      <h4>Aggregate Data</h4>
      <p>Unrivaled reserves the right to transfer or sell aggregate data describing user demographics and usage characteristics without disclosing personally identifiable information.</p>

      <h2>2. How We Use the Personal Information</h2>
      <p>Personal information is used for:</p>
      <ul>
        <li>Providing customer service and responding to inquiries</li>
        <li>Providing requested information</li>
        <li>User onboarding</li>
        <li>Facilitating registrations and transactions</li>
        <li>Customizing user experience</li>
        <li>Displaying tailored advertisements</li>
        <li>Contacting users regarding interactions</li>
        <li>Providing status updates and transactional emails</li>
        <li>Account notices and contact via telephone, text, email, or chat</li>
        <li>Research purposes and survey requests</li>
        <li>Marketing communications</li>
        <li>Internal business analysis and management</li>
        <li>Creating rosters and schedules</li>
        <li>Filling employment positions</li>
        <li>Fulfilling legal obligations</li>
        <li>Providing, maintaining, and improving services</li>
        <li>Testing services</li>
        <li>Managing platform integrity</li>
        <li>Monitoring performance and improving user experience</li>
        <li>Protecting rights and property</li>
        <li>Other disclosed purposes at registration</li>
      </ul>

      <h2>3. With Whom We Share the Information</h2>
      <p>Information may be shared with:</p>
      <ul>
        <li>Current and future parents, affiliates, subsidiaries, and commonly-owned companies</li>
        <li>Third-party service providers including technology providers, hosting providers, e-commerce platforms, communications providers, payment processors, data analytics providers, customer relations management providers, job hosts, professional advisors, coaches, leagues, event facilities, and sponsors</li>
      </ul>

      <h4>Specific Third-Party Uses</h4>
      <ul>
        <li>Player registration services</li>
        <li>Age verification and medical form review services</li>
        <li>Sponsorship partners (via agreements) for email and contact information</li>
        <li>Recruitment and hiring vendors</li>
        <li>Background check vendors for employees and league personnel</li>
      </ul>

      <h4>Video and Live-Stream Sharing</h4>
      <p>Uploaded videos may be accessible to other users, scouts, recruiters, college coaches, and the public. Live-stream feeds may be publicly available.</p>

      <h4>Legal Disclosures</h4>
      <p>Unrivaled may disclose information if necessary for investigations, complaints, legal action, or to comply with law, regulation, legal process, or governmental requests. Information may be shared for fraud protection purposes.</p>

      <h4>Business Transfers</h4>
      <p>Information may be shared in connection with mergers, divestitures, restructurings, reorganizations, or asset sales/transfers.</p>

      <h4>Policy Violations and Unlawful Use</h4>
      <p>Information may be released if users violate terms of service, commit unlawful acts, or as deemed necessary, including sharing email addresses with third parties for CAN-SPAM compliance.</p>

      <h2>4. Mobile Messaging</h2>
      <p>Some Unrivaled affiliates offer mobile messaging programs. By providing a mobile phone number, users consent to receive telemarketing communications under the Amended Telemarketing Sales Rule and state do-not-call regulations, even if listed on the Federal Trade Commission&rsquo;s Do-Not-Call List.</p>

      <h4>Service Uses</h4>
      <ul>
        <li>Confirmation texts for registration</li>
        <li>Service-related announcements</li>
        <li>Optional promotional texts based on user preferences</li>
      </ul>

      <p>Participation is optional and not required for purchase. By opting in, users consent to receive autodialed or prerecorded marketing messages. Message and data rates may apply; Unrivaled is not responsible for wireless charges.</p>

      <h4>Opt-Out Options</h4>
      <p>Users can cancel by texting &ldquo;STOP.&rdquo; A confirmation SMS will be sent. Service-related notifications may continue. Users needing assistance can text &ldquo;HELP.&rdquo;</p>

      <h4>Information Sharing</h4>
      <p>Information may be shared with platform providers, phone companies, and other service providers assisting with message delivery. Information may be disclosed as necessary to satisfy law, regulation, governmental requests, avoid liability, or protect rights or property.</p>

      <h2>5. Third-Party Websites</h2>
      <p>The Services contain links to third-party websites including social media and tournament apps. Unrivaled is not responsible for their privacy practices or content. These sites have separate privacy policies and data collection practices.</p>

      <h2>6. Security and Retention of Your Personal Information</h2>
      <p>Unrivaled uses reasonable administrative, physical, and technical precautions to protect personal information online and offline, including encryption and written commitments from third parties.</p>

      <h4>Security Limitations</h4>
      <p>No storage facility, technology, software, security protocol, or internet transmission can be guaranteed 100% secure. Hackers may breach security measures; technological bugs may cause inadvertent disclosures. Attempts to breach security constitute crimes punishable by law. Users assume risk for any data transmission.</p>

      <h4>Employee Access</h4>
      <p>Only employees or agents needing information for specific job functions have access. Non-compliant employees face disciplinary action.</p>

      <h4>Retention</h4>
      <p>Personal information is retained for the maximum period permitted by law. Deletion criteria include collection date, interaction frequency, last interaction, and completion of collection purposes.</p>

      <h2>7. Children&rsquo;s Privacy</h2>
      <p>Information should not be submitted by visitors under thirteen (13) years of age (or the applicable age of majority if greater). Persons this age are not permitted to use the Services. Unrivaled does not knowingly collect personal information from such individuals. Parents and guardians are encouraged to monitor children&rsquo;s online activities. Parents or authorized persons may be required to complete registration forms and waivers for children under eighteen (18).</p>

      <h2>8. Grounds for Using Your Personal Information</h2>
      <p>Unrivaled processes personal information based on:</p>

      <h4>Consent</h4>
      <p>Marketing communications and some other uses require consent. Users may withdraw consent by emailing <a href="mailto:privacy@unrivaledsports.com">privacy@unrivaledsports.com</a> or calling 1-410-306-7566. Cookie consent can be withdrawn via browser and mobile settings.</p>

      <h4>Performance of a Contract</h4>
      <p>The company collects and uses information to enter contracts and perform requested services.</p>

      <h4>Legitimate Interests</h4>
      <p>Personal information is used for providing and improving services and content consistent with legitimate interests and applicable law requirements.</p>

      <h4>Compliance with Legal Obligations</h4>
      <p>Information is used as necessary to comply with legal requirements.</p>

      <h2>9. Your Privacy Rights and Choices</h2>

      <h3>(A) General Rights</h3>
      <p>Unrivaled facilitates exercise of rights under applicable jurisdiction laws, including correction, modification, or deletion of personal information and opt-outs from sale or sharing (if applicable). Users may request changes by emailing <a href="mailto:privacy@unrivaledsports.com">privacy@unrivaledsports.com</a> or calling 1-410-306-7566.</p>

      <h4>Request Process</h4>
      <p>Users must identify themselves and specify information requested. Unrivaled may decline unreasonably repetitive or systematic requests, those requiring disproportionate technical effort, those jeopardizing others&rsquo; privacy, or those impractical to implement.</p>

      <h4>Data Deletion Timeline</h4>
      <p>After deletion, residual copies may remain on active servers and backup systems for a period.</p>

      <h4>Marketing Communications</h4>
      <p>Users can opt out of electronic marketing by clicking &ldquo;unsubscribe&rdquo; or emailing <a href="mailto:privacy@unrivaledsports.com">privacy@unrivaledsports.com</a>. Non-marketing communications (transactions, legal disclosures, software updates, support) may not be subject to opt-out. Users must cease service requests, inquiry submissions, and deactivate accounts to stop service-related messages.</p>

      <h4>Additional Rights</h4>
      <p>Users may have rights under jurisdiction laws including complaints to data protection authorities and appeals of data access decisions.</p>

      <h4>Cookie Management</h4>
      <p>Users may disable cookies through browser settings, though this may limit service functionality.</p>

      <h3>(B) European Privacy Rights and Choices</h3>
      <p>Unrivaled accommodates rights under the European Union&rsquo;s General Data Protection Regulation (GDPR) and similar laws for non-U.S. residents.</p>

      <h4>GDPR Rights</h4>
      <ul>
        <li>Transparency and information access through this policy</li>
        <li>Right to access, correct, restrict processing, and erase personal data</li>
        <li>Right to withdraw consent</li>
        <li>Right to object to marketing and promotional materials</li>
        <li>Right to object to processing based on specific situations</li>
        <li>Right to data portability by contacting the company</li>
        <li>Right not to be subject to automated decisions including profiling</li>
        <li>Right to lodge complaints with supervisory authorities in member states of residence, work, or alleged infringement</li>
      </ul>

      <h3>(C) California and Similar U.S. State Laws</h3>

      <h4>CCPA Disclosures</h4>
      <p>California residents and those in similar states may request:</p>
      <ul>
        <li>Categories of personal information collected (including sensitive information)</li>
        <li>Sources of personal information</li>
        <li>Business or commercial purposes for collection, sale, or sharing</li>
        <li>Third-party categories receiving personal information</li>
        <li>Categories of information disclosed for business purposes</li>
        <li>Specific personal information pieces collected</li>
      </ul>

      <h4>Additional California Rights</h4>
      <ul>
        <li>Length of retention time</li>
        <li>Deletion of personal information</li>
        <li>Correction of inaccurate data</li>
        <li>Opt-out of sale or sharing (if applicable)</li>
        <li>Limit use of sensitive personal information (if applicable)</li>
        <li>Non-discrimination for exercising CCPA rights</li>
      </ul>

      <h4>Categories of Personal Information</h4>
      <p>The policy includes a detailed table describing collected information categories, sources, collection purposes, and disclosure recipients for the twelve months preceding the effective date.</p>

      <h4>Sensitive Data</h4>
      <p>Any sensitive data collected is used only for business purposes, not for inferring consumer characteristics.</p>

      <h4>Sales and Sharing</h4>
      <p>Unrivaled does not sell personal information for monetary consideration. Information may be provided to service providers and third parties under CCPA provisions.</p>

      <h4>Opt-Out Options</h4>
      <p>Users may opt out of cookies and tracking technology through browser settings and opt out of Google Analytics through the browser add-on.</p>

      <h4>Request Submission</h4>
      <p>Users may email <a href="mailto:privacy@unrivaledsports.com">privacy@unrivaledsports.com</a> or call 1-410-306-7566.</p>

      <h4>Identity Verification</h4>
      <p>Users must provide name, address, and email address. Standard authentication procedures (username/password login) and historical transaction information may be required. Additional information may be requested if insufficient for verification.</p>

      <h4>Authorized Agents</h4>
      <p>Users may designate authorized agents to make CCPA requests.</p>

      <h4>Response Timeline</h4>
      <p>Unrivaled endeavors to respond within forty-five (45) days or will inform users of extensions up to ninety (90) days. Responses cover the twelve-month period preceding request receipt and explain non-compliance reasons if applicable.</p>

      <h4>Fees</h4>
      <p>No fees apply unless requests are excessive, repetitive, or manifestly unfounded. Fees will be explained with cost estimates.</p>

      <h4>Shine the Light</h4>
      <p>California residents may learn how personal information is shared by emailing <a href="mailto:privacy@unrivaledsports.com">privacy@unrivaledsports.com</a>, calling 1-410-306-7566, or sending mail to: Unrivaled Sports, 880 Long Drive, Aberdeen, MD 21001.</p>

      <h4>Browser Do Not Track and GPC</h4>
      <p>Unrivaled has implemented tools recognizing and honoring Do Not Track browser settings and Global Privacy Control signals.</p>

      <h2>10. Users Outside the United States</h2>
      <p>Services are hosted in the United States and directed to U.S. users. Users from Canada, the European Union, Asia, or other regions with different data protection laws are advised that continued use means transferring personal data to the United States, which may have different protection rules. By using the Services, users consent to such transfer.</p>

      <h2>11. Changes to this Privacy Policy</h2>
      <p>Unrivaled reserves the right to change, modify, add, or remove policy portions at any time. Changes apply to already-collected and future information. Continued service use indicates agreement with revised policies. Users should review periodically. Material changes will be noted on the home page. The update date appears at the top.</p>

      <h2>12. Contact Us</h2>
      <p>For questions about this privacy policy or Unrivaled practices:</p>
      <p><strong>Email:</strong> <a href="mailto:privacy@unrivaledsports.com">privacy@unrivaledsports.com</a><br>
      <strong>Phone:</strong> 410-306-7566<br>
      <strong>Mail:</strong> Unrivaled Sports, 880 Long Drive, Aberdeen, MD 21001</p>

      <h2>Unrivaled Sports Controlled Affiliated Companies</h2>
      <ul>
        <li>Sandlot Youth Sports Holdings, LLC d/b/a Unrivaled Sports</li>
        <li>Sandlot Baseball Holdings, LLC</li>
        <li>Rocker B Hospitality, LLC</li>
        <li>Diamond Nation LLC</li>
        <li>Sandlot YTH, LLC</li>
        <li>Cooperstown All Star Village, LLC</li>
        <li>17 Tournaments, LLC</li>
        <li>Oakwood Lodging Group, LLC</li>
        <li>Sports Force Parks Sandusky, LLC</li>
        <li>Ripken Factory LLC</li>
        <li>Ripken Holdings LLC</li>
        <li>Ripken Baseball Camps &amp; Clinics LLC</li>
        <li>Ripken Pigeon Forge LLC</li>
        <li>R-C Myrtle Beach LLC</li>
        <li>Extra Bases, LLC</li>
        <li>Ripken Elizabethtown, LLC</li>
        <li>Ripken Select LLC</li>
        <li>Ripken Grounds LLC</li>
        <li>All Ripken LLC</li>
        <li>Unrivaled BLD Holdings, LLC</li>
        <li>Big League Dreams Las Vegas, LLC</li>
        <li>Big League Dreams Manteca, LLC</li>
        <li>Sandlot HOFV Canton SC, LLC</li>
        <li>Sandlot Flag LLC</li>
        <li>Under the Lights, LLC (FKA One Team Youth, LLC)</li>
        <li>Massflag, LLC</li>
      </ul>
    </div>
  </main>

  <!-- ================================================================
       FOOTER
       ================================================================ -->
  <footer class="site-footer" id="contact">
    <div class="site-footer__inner">
      <div class="site-footer__main">
        <div class="site-footer__logo"><a href="<?php echo home_url( '/' ); ?>" class="wordmark"><svg width="335" height="200" viewBox="0 0 335 200" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_ft_pg)"><path d="M17.04 160.08C4.14 160.08.55 156.58.55 145.3V126.57h10.22v18.31c0 5.99 1.56 7.27 7.09 7.27h1.01c5.62 0 7.09-1.32 7.09-6.27v-19.31h10.22v18.73c0 11.28-3.59 14.78-16.44 14.78h-2.72z" fill="white"/><path d="M81.82 159.6H66.67L51.99 136.62h-.37v22.98H41.99V126.56h15.15l14.68 23.03h.37v-23.03h9.62v33.04z" fill="white"/><path d="M97.65 159.6h-10.04V126.56h22.42c10.04 0 13.4 2.31 13.4 8.73v1.04c0 4.95-1.7 7.17-5.56 7.51v.33c4.33.75 5.56 1.65 5.56 7.75v7.46h-10.08v-6.99c0-3.06-.87-3.92-5.85-3.92h-9.86v10.9zm0-25.63v7.32h11.46c3.09 0 4.24-.75 4.24-3.35v-.28c0-2.88-1.2-3.68-5.7-3.68H97.65z" fill="white"/><path d="M139.29 159.6h-10.04V126.56h10.04v33.04z" fill="white"/><path d="M170.3 159.6h-12.89l-14.74-33.04h11.65l9.72 23.18h.37l9.8-23.18h10.82L170.3 159.6z" fill="white"/><path d="M222.22 159.6h-11.32l-2.85-6.61h-16.85l-2.81 6.61h-10.91l14.74-33.04h15.24l14.78 33.04zm-22.79-25.86l-5.06 11.79h10.5l-5.06-11.79h-.38z" fill="white"/><path d="M254.85 159.6h-29.24V126.56h10.04v24.74h19.2v8.31z" fill="white"/><path d="M291.69 159.6H260.66V126.56h31.03v7.45h-20.99v5.28h20.99v7.51h-20.99v5.33h20.99v7.47z" fill="white"/><path d="M334.47 143.74c0 11.61-4.79 15.85-18.05 15.85h-18.92V126.56h18.74c13.25 0 18.22 4.29 18.22 15.91v1.27zm-26.94-9.39v17.46h7.51c7.87 0 9.21-2.69 9.21-8.44v-.52c0-5.76-1.34-8.5-9.21-8.5h-7.51z" fill="white"/><path d="M17.82 199.1c-9.66 0-16.71-2.27-17.82-10v-.01h10.68c.87 2.41 3.41 2.83 8.33 2.83 5.58 0 7.55-.85 7.6-3.12v-.38c0-1.74-.93-2.55-4.24-2.59l-8.93-.33c-9.21-.38-12.61-2.88-12.61-9.25v-.33c0-7.6 5.06-10.81 16.8-10.81h1.24c9.58 0 16.39 2.78 17.49 10.43h-10.68c-.74-2.5-3.09-3.25-7.74-3.25-5.34 0-6.91.85-6.91 3.06v.13c0 1.75.87 2.55 4.19 2.69l8.89.28c9.21.28 12.61 2.97 12.61 9.17v.33c0 8.31-5.72 11.16-17.32 11.16h-1.62z" fill="white"/><path d="M52.03 198.63H41.99v-33.04h22.18c9.94 0 13.63 3.02 13.63 11.32v.95c0 7.79-3.91 11.19-13.63 11.19H52.03v5.58zm0-25.62v8.68h10.68c4.15 0 5.02-1.08 5.02-3.73v-.33c0-3.21-.5-4.62-6.06-4.62H52.03z" fill="white"/><path d="M99.87 199.11c-13.26 0-18.46-4.25-18.46-15.85v-2.22c0-11.61 5.2-15.91 18.46-15.91h2.58c13.26 0 18.51 4.29 18.51 15.91v2.22c0 11.61-5.25 15.85-18.51 15.85h-2.58zm1.85-7.84c7.73 0 9.03-2.84 9.03-7.66v-1.42c0-5.67-1.29-8.45-9.03-8.45h-1.06c-7.79 0-9.03 2.78-9.03 8.45v1.42c0 4.82 1.24 7.66 9.03 7.66h1.06z" fill="white"/><path d="M135.69 198.63h-10.04V165.59h22.42c10.04 0 13.4 2.31 13.4 8.73v1.04c0 4.96-1.7 7.18-6.27 7.73v.34c4.33.75 6.27 1.65 6.27 7.75v7.46h-10.08v-6.99c0-3.06-.87-3.92-5.84-3.92h-9.86v10.9zm0-25.62v7.32h11.46c3.09 0 4.24-.75 4.24-3.35v-.28c0-2.88-1.2-3.69-5.7-3.69h-10z" fill="white"/><path d="M188.87 198.63h-10.04v-24.74h-13.52v-8.3h37.17v8.3h-13.61v24.74z" fill="white"/><path d="M223.78 199.1c-9.66 0-16.72-2.27-17.82-10h10.68c.87 2.41 3.41 2.83 8.34 2.83 5.58 0 7.55-.85 7.6-3.12v-.38c0-1.74-.93-2.55-4.24-2.59l-8.93-.33c-9.21-.38-12.61-2.88-12.61-9.25v-.33c0-7.6 5.06-10.81 16.8-10.81h1.24c9.58 0 16.39 2.78 17.49 10.43h-10.68c-.74-2.5-3.09-3.25-7.74-3.25-5.34 0-6.91.85-6.91 3.06v.13c0 1.75.87 2.55 4.19 2.69l8.89.28c9.21.28 12.61 2.97 12.61 9.17v.33c0 8.31-5.72 11.16-17.32 11.16h-1.62z" fill="white"/><path d="M120.53 77.31c7.75-2.07 10.34 1.62 5.76 8.2-6.87 9.86-3.24 14.56 8.07 10.45L334 20.23H190.61c-2.13 0-4.97 1.35-6.31 3.01l-47.1 59.89c-2.07 2.48-3.86 1.4-2.18-1.46l42.97-56.44c3.6-6.16.71-11.19-6.42-11.19H71.08L0 109.55l120.53-32.24z" fill="#FF0000"/></g><defs><clipPath id="clip0_ft_pg"><rect width="334.458" height="199.115" fill="white"/></clipPath></defs></svg></a></div>
        <div class="site-footer__col"><p class="site-footer__label">Follow Us</p><a href="https://www.instagram.com/unrivaled.sports/" target="_blank" rel="noopener noreferrer" class="site-footer__link">Instagram</a><a href="https://www.linkedin.com/company/unrivaled-sports" target="_blank" rel="noopener noreferrer" class="site-footer__link">LinkedIn</a></div>
        <div class="site-footer__col"><p class="site-footer__label">Careers</p><a href="<?php echo home_url( '/careers/' ); ?>" class="site-footer__link">Overview</a><a href="<?php echo home_url( '/careers/' ); ?>" class="site-footer__link">Open Roles</a></div>
        <div class="site-footer__col"><p class="site-footer__label">Contact</p><a href="mailto:info@unrivaledsports.com" class="site-footer__email">info@unrivaledsports.com</a></div>
      </div>
      <div class="site-footer__legal"><p class="site-footer__legal-text">&copy; 2026 Unrivaled Sports - All rights reserved</p><a href="https://www.unrivaledsports.com/privacy-policy" class="site-footer__legal-link">Privacy Policy</a><a href="https://www.unrivaledsports.com/consumer-health-data-notes" class="site-footer__legal-link">Consumer Health Data Notice</a></div>
    </div>
  </footer>

  <script>
    /* --- Mobile Menu --- */
    var mobileMenu = document.getElementById('mobileMenu');
    function openMenu() {
      mobileMenu.setAttribute('data-open', 'true');
      document.body.classList.add('menu-open');
    }
    function closeMenu() {
      mobileMenu.setAttribute('data-open', 'false');
      document.body.classList.remove('menu-open');
    }
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape' && mobileMenu.getAttribute('data-open') === 'true') closeMenu();
    });

    /* --- Scroll-direction-aware sticky nav --- */
    var pageHeader = document.getElementById('pageHeader');
    var stickyNav = document.getElementById('stickyNav');
    var lastScrollY = 0;
    var navVisible = false;

    function updateNav() {
      var scrollY = window.scrollY;
      var headerBottom = pageHeader ? pageHeader.offsetHeight : 0;
      var scrollingUp = scrollY < lastScrollY;
      var scrollingDown = scrollY > lastScrollY;
      var pastHeader = scrollY > headerBottom;

      if (!pastHeader) {
        if (navVisible) { stickyNav.setAttribute('data-visible', 'false'); navVisible = false; }
      } else if (scrollingUp && !navVisible) {
        stickyNav.setAttribute('data-visible', 'true'); navVisible = true;
      } else if (scrollingDown && navVisible) {
        stickyNav.setAttribute('data-visible', 'false'); navVisible = false;
      }
      lastScrollY = scrollY;
    }

    var ticking = false;
    window.addEventListener('scroll', function() {
      if (!ticking) { requestAnimationFrame(function() { updateNav(); ticking = false; }); ticking = true; }
    });
    updateNav();
  </script>
<?php wp_footer(); ?>
</body>
</html>
