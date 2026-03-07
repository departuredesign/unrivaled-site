<?php
/**
 * Template Name: Homepage
 * Front page template for Unrivaled Sports.
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
       01. SITE HEADER
       ========================================================================== */
    .site-header { position: fixed; top: 0; left: 0; width: 100%; z-index: 175; background: transparent; }
    .site-header.is-dismissing { transform: translateY(-100%); transition: transform 350ms var(--ease-out); }
    .site-header.is-hidden { display: none; }
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
      opacity: 0; animation: nav-fade-in 400ms var(--ease-out) forwards;
    }
    .site-header__nav-link:nth-child(1) { animation-delay: 200ms; }
    .site-header__nav-link:nth-child(2) { animation-delay: 300ms; }
    .site-header__nav-link:nth-child(3) { animation-delay: 400ms; }
    .site-header__nav-link:nth-child(4) { animation-delay: 500ms; }
    .site-header__nav-link:nth-child(5) { animation-delay: 600ms; }
    .site-header__nav-link:hover { text-decoration: underline; text-underline-offset: 4px; text-decoration-thickness: 2px; }
    .site-header__nav-link[aria-current="page"] { text-decoration: underline; text-underline-offset: 4px; text-decoration-thickness: 2px; }
    .site-header__nav-link:focus-visible {
      outline: var(--focus-ring-width) solid var(--color-white);
      outline-offset: var(--focus-ring-offset); border-radius: 2px;
    }
    @keyframes nav-fade-in {
      from { opacity: 0; transform: translateY(-4px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* Wordmark */
    .wordmark {
      display: inline-flex; align-items: center; line-height: 0;
      text-decoration: none; color: inherit; transition: opacity var(--transition-fast);
    }
    .wordmark:hover { opacity: 0.85; }
    .wordmark:focus-visible { outline: var(--focus-ring-width) solid currentColor; outline-offset: var(--focus-ring-offset); border-radius: 2px; }
    .wordmark svg { width: 100%; height: auto; fill: currentColor; }
    .site-header .wordmark { width: 144px; }
    @media (min-width: 1024px) { .site-header .wordmark { width: 165px; } }

    /* Logo mark */
    .logo-mark { display: inline-flex; align-items: center; justify-content: center; line-height: 0; }
    .logo-mark svg { width: 100%; height: auto; fill: currentColor; }
    .logo-mark--sm { width: 60px; }
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
    .hamburger:focus-visible { outline: var(--focus-ring-width) solid var(--color-white); outline-offset: var(--focus-ring-offset); border-radius: 2px; }


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
    .sticky-nav__link:hover { text-decoration: underline; text-underline-offset: 4px; text-decoration-thickness: 2px; }
    .sticky-nav__link[aria-current="page"] { text-decoration: underline; text-underline-offset: 4px; text-decoration-thickness: 2px; }

    .sticky-nav .hamburger { display: flex; }
    @media (min-width: 1024px) { .sticky-nav .hamburger { display: none; } }
    .sticky-nav .hamburger__bar { background-color: var(--color-red-alt); }


    /* ==========================================================================
       06. HERO
       ========================================================================== */
    .hero { position: relative; width: 100%; height: 662px; overflow: hidden; background: var(--color-gray-placeholder); }
    @media (min-width: 768px) { .hero { height: 720px; } }
    @media (min-width: 1024px) { .hero { height: 809px; } }

    .hero__media { position: absolute; inset: 0; z-index: 1; }
    .hero__media img,
    .hero__media video { width: 100%; height: 100%; object-fit: cover; }
    .hero__media::after {
      content: ''; position: absolute; inset: 0; pointer-events: none;
      background: linear-gradient(to bottom, rgba(0,0,0,0.15) 0%, transparent 40%, transparent 60%, rgba(0,0,0,0.1) 100%);
    }

    .hero__logo-mark {
      position: absolute; z-index: 2; top: 50%; left: 50%; transform: translate(-50%,-50%);
      width: 200px; color: var(--color-white); pointer-events: none;
      opacity: 0;
    }
    @media (min-width: 1024px) { .hero__logo-mark { width: 260px; } }
    .hero__logo-mark svg { width: 100%; height: auto; fill: currentColor; }

    /* Fixed bolt overlay — handles the entire scroll animation (desktop only) */
    .scroll-bolt {
      position: fixed; z-index: 180; pointer-events: none;
      left: 50%; transform: translate(-50%, -50%);
      display: none; /* hidden by default, shown by JS on desktop */
    }
    .scroll-bolt svg { width: 100%; height: auto; fill: currentColor; }
    @media (min-width: 1024px) { .scroll-bolt { display: block; } }


    /* ==========================================================================
       07. STICKY HEADLINE
       ========================================================================== */
    .sticky-headline { position: relative; background: var(--color-white); }
    .sticky-headline__track { height: 600px; position: relative; }
    @media (min-width: 768px) { .sticky-headline__track { height: 700px; } }
    @media (min-width: 1024px) { .sticky-headline__track { height: 821px; } }

    .sticky-headline__text {
      position: sticky; top: 0; padding: 80px 20px 40px;
      font-family: var(--font-display-poster); font-weight: var(--weight-poster-heavy);
      font-size: 66px; line-height: 0.84; letter-spacing: 0.66px;
      text-transform: uppercase; text-align: center; color: var(--color-gold);
      max-width: 411px; margin: 0 auto;
    }
    @media (min-width: 768px) { .sticky-headline__text { font-size: 90px; letter-spacing: 0.9px; max-width: 800px; padding-top: 100px; } }
    @media (min-width: 1024px) { .sticky-headline__text { font-size: 120px; line-height: 0.85; letter-spacing: 1.2px; max-width: 1204px; padding: 120px 40px 40px; } }


    /* ==========================================================================
       08. STAT BADGES
       ========================================================================== */
    .stat-badges { display: flex; align-items: center; justify-content: center; gap: 16px; padding: 40px 20px; }
    @media (min-width: 768px) { .stat-badges { gap: 24px; padding: 60px 40px; } }
    @media (min-width: 1024px) { .stat-badges { gap: 32px; padding: 80px 40px; } }

    .stat-badge__shape {
      position: relative; width: 100px; height: 106px;
      clip-path: polygon(0 0, 100% 0, 100% 72%, 50% 100%, 0 72%); overflow: hidden;
    }
    @media (min-width: 768px) { .stat-badge__shape { width: 160px; height: 170px; } }
    @media (min-width: 1024px) { .stat-badge__shape { width: 224px; height: 238px; } }

    .stat-badge__bg { position: absolute; inset: 0; background-color: var(--color-navy); overflow: hidden; }
    .stat-badge__bg::before {
      content: ''; position: absolute; inset: -50%;
      background: repeating-linear-gradient(-15deg, transparent, transparent 3px, var(--color-red) 3px, var(--color-red) 5px); opacity: 0.7;
    }
    .stat-badge__bg::after { content: ''; position: absolute; inset: 0; background: linear-gradient(to bottom, rgba(29,36,104,0.3), rgba(29,36,104,0.6)); }

    .stat-badge__content {
      position: absolute; inset: 0; display: flex; flex-direction: column;
      align-items: center; justify-content: center; z-index: 1; padding-bottom: 14%;
    }
    .stat-badge__number {
      font-family: var(--font-display-poster); font-weight: var(--weight-poster-heavy);
      font-size: 48px; line-height: 0.84; letter-spacing: 1px; text-transform: uppercase; color: var(--color-white);
    }
    @media (min-width: 768px) { .stat-badge__number { font-size: 78px; } }
    @media (min-width: 1024px) { .stat-badge__number { font-size: 110px; letter-spacing: 1.1px; } }

    .stat-badge__label {
      font-family: var(--font-display); font-weight: var(--weight-bold);
      font-size: 7px; line-height: 0.96; letter-spacing: 0.3px; text-transform: uppercase;
      color: var(--color-white); text-align: center; margin-top: 2px;
    }
    @media (min-width: 768px) { .stat-badge__label { font-size: 12px; margin-top: 4px; } }
    @media (min-width: 1024px) { .stat-badge__label { font-size: 17px; letter-spacing: 0.51px; margin-top: 6px; } }

    /* Scroll animation */
    .stat-badges[data-animate] .stat-badge { opacity: 0; transform: scale(0.8); transition: opacity 600ms var(--ease-out), transform 600ms var(--ease-out); }
    .stat-badges[data-animate] .stat-badge:nth-child(1) { transition-delay: 0ms; }
    .stat-badges[data-animate] .stat-badge:nth-child(2) { transition-delay: 200ms; }
    .stat-badges[data-animate] .stat-badge:nth-child(3) { transition-delay: 400ms; }
    .stat-badges[data-animate].is-visible .stat-badge { opacity: 1; transform: scale(1); }


    /* ==========================================================================
       09. INFINITE CAROUSEL
       ========================================================================== */
    .carousel { width: 100%; overflow: hidden; position: relative; }
    .carousel__track {
      display: flex; gap: 20px; width: max-content;
      animation: carousel-scroll var(--carousel-speed, 30s) linear infinite;
    }
    @media (hover: hover) { .carousel:hover .carousel__track { animation-play-state: paused; } }
    .carousel[data-speed="25"] .carousel__track { animation-duration: 25s; }
    .carousel[data-speed="30"] .carousel__track { animation-duration: 30s; }
    .carousel[data-speed="40"] .carousel__track { animation-duration: 40s; }
    @keyframes carousel-scroll { 0% { transform: translateX(0); } 100% { transform: translateX(calc(-50% - 10px)); } }

    /* Events variant */
    .carousel[data-variant="events"] { padding: 20px 0; }
    .carousel[data-variant="events"] .carousel__slide { flex: 0 0 auto; display: flex; flex-direction: column; }
    .carousel__slide-image { border-radius: var(--radius); overflow: hidden; }
    .carousel__slide-image img { display: block; width: 100%; height: 100%; object-fit: cover; }
    .carousel__slide-image--narrow { width: 200px; height: 240px; }
    .carousel__slide-image--medium { width: 300px; height: 240px; }
    .carousel__slide-image--wide { width: 360px; height: 240px; }
    @media (min-width: 1024px) {
      .carousel__slide-image--narrow { width: 254px; height: 306px; }
      .carousel__slide-image--medium { width: 380px; height: 306px; }
      .carousel__slide-image--wide { width: 459px; height: 306px; }
    }
    .carousel__slide-venue {
      font-family: var(--font-display); font-weight: var(--weight-bold);
      font-size: 10px; line-height: 19.7px; letter-spacing: 0.4px; text-transform: uppercase; margin: 8px 0 0;
    }
    .carousel__slide-desc {
      font-family: var(--font-body); font-weight: var(--weight-regular);
      font-size: 12px; line-height: 14px; letter-spacing: 0.24px; margin: 0;
    }

    /* Instagram variant */
    .carousel[data-variant="instagram"] { padding: 20px 0; }
    .carousel[data-variant="instagram"] .carousel__slide { flex: 0 0 auto; }
    .carousel__slide-link {
      display: block; border-radius: var(--radius); overflow: hidden; transition: opacity var(--transition-fast);
    }
    .carousel__slide-link:hover { opacity: 0.85; }
    .carousel__slide-link img { display: block; object-fit: cover; width: 220px; height: 270px; }
    @media (min-width: 1024px) { .carousel__slide-link img { width: 271px; height: 338px; } }


    /* ==========================================================================
       10–11. BRANDS SECTION
       ========================================================================== */
    .section-header { margin-bottom: 32px; }
    .section-header__label {
      font-family: var(--font-ui); font-weight: var(--weight-bold);
      font-size: 12px; line-height: 15px; letter-spacing: 1.2px; text-transform: uppercase; margin: 0 0 12px;
    }
    @media (min-width: 1024px) { .section-header__label { font-size: 18px; line-height: 20px; letter-spacing: 1.8px; } }
    .section-header__headline {
      font-family: var(--font-display); font-weight: var(--weight-bold);
      font-size: 22px; line-height: 1.11; letter-spacing: 0.44px; margin: 0 0 16px;
    }
    @media (min-width: 1024px) { .section-header__headline { font-size: 32px; line-height: 1.26; letter-spacing: 0.64px; } }
    .section-header__desc {
      font-family: var(--font-body); font-weight: var(--weight-regular);
      font-size: 13px; line-height: 18px; margin: 0; max-width: 887px;
    }
    @media (min-width: 1024px) { .section-header__desc { font-size: 24px; line-height: 30px; } }

    .section-header[data-variant="light"] .section-header__label { color: var(--color-blue); }
    .section-header[data-variant="light"] .section-header__headline { color: var(--color-black); }
    .section-header[data-variant="dark"] .section-header__label,
    .section-header[data-variant="dark"] .section-header__headline,
    .section-header[data-variant="dark"] .section-header__desc { color: var(--color-white); }

    .brand-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px; }
    @media (min-width: 768px) { .brand-grid { grid-template-columns: repeat(3, 1fr); gap: 20px; } }
    @media (min-width: 1024px) { .brand-grid { grid-template-columns: repeat(4, 1fr); gap: 28px; } }

    .brand-grid[data-animate] .brand-card { opacity: 0; transform: translateY(20px); transition: opacity 500ms var(--ease-out), transform 500ms var(--ease-out); }
    .brand-grid[data-animate].is-visible .brand-card { opacity: 1; transform: translateY(0); }
    .brand-grid[data-animate].is-visible .brand-card:nth-child(1) { transition-delay: 0ms; }
    .brand-grid[data-animate].is-visible .brand-card:nth-child(2) { transition-delay: 80ms; }
    .brand-grid[data-animate].is-visible .brand-card:nth-child(3) { transition-delay: 160ms; }
    .brand-grid[data-animate].is-visible .brand-card:nth-child(4) { transition-delay: 240ms; }
    .brand-grid[data-animate].is-visible .brand-card:nth-child(5) { transition-delay: 320ms; }
    .brand-grid[data-animate].is-visible .brand-card:nth-child(6) { transition-delay: 400ms; }
    .brand-grid[data-animate].is-visible .brand-card:nth-child(7) { transition-delay: 480ms; }
    .brand-grid[data-animate].is-visible .brand-card:nth-child(8) { transition-delay: 560ms; }

    .brand-card { display: flex; flex-direction: column; }
    .brand-card__image {
      position: relative; width: 100%; aspect-ratio: 321/252; background: var(--color-white);
      border-radius: var(--radius); overflow: hidden; display: flex; align-items: center; justify-content: center;
      transition: transform var(--transition-base), box-shadow var(--transition-base);
    }
    .brand-card__image img { max-width: 75%; max-height: 70%; object-fit: contain; }
    .brand-card__overlay { position: absolute; inset: 10% 8%; background-color: var(--color-gold-overlay); mix-blend-mode: screen; pointer-events: none; }
    @media (hover: hover) { .brand-card:hover .brand-card__image { transform: scale(1.02); box-shadow: 0 4px 20px rgba(0,0,0,0.15); } }

    .brand-card__name {
      font-family: var(--font-display); font-weight: var(--weight-bold);
      font-size: 10px; line-height: 11.6px; letter-spacing: 0.3px; color: var(--color-white); margin: 10px 0 0;
    }
    @media (min-width: 1024px) { .brand-card__name { font-size: 18px; line-height: 21.2px; letter-spacing: 0.54px; margin-top: 14px; } }
    .brand-card__divider { width: 100%; height: 1px; background: rgba(255,255,255,0.3); margin: 10px 0; }
    @media (min-width: 1024px) { .brand-card__divider { margin: 12px 0; } }

    .brand-list { margin-top: 24px; }
    @media (min-width: 768px) { .brand-list { display: none; } }
    .brand-list-item {
      display: flex; align-items: center; justify-content: space-between;
      padding: 10px 0; border-top: 1px solid rgba(255,255,255,0.2);
    }
    .brand-list-item:last-child { border-bottom: 1px solid rgba(255,255,255,0.2); }
    .brand-list-item__name {
      font-family: var(--font-display); font-weight: var(--weight-bold);
      font-size: 11px; line-height: 14px; letter-spacing: 0.44px; color: var(--color-white); margin: 0;
    }

    .brand-grid__load-more { display: flex; justify-content: center; margin-top: 32px; }


    /* ==========================================================================
       12. PRESS SECTION
       ========================================================================== */
    .press-header-row { display: flex; align-items: flex-end; justify-content: space-between; margin-bottom: 30px; }
    .press-header-row .section-header { margin-bottom: 0; }
    .press-divider { width: 100%; height: 2px; background: var(--color-black); margin-bottom: 0; }

    .press-track {
      display: flex; gap: 29px; overflow-x: auto;
      padding: 40px 40px 60px 0;
      scrollbar-width: none;
    }
    .press-track::-webkit-scrollbar { display: none; }

    .press-card {
      flex: 0 0 307px; display: flex; flex-direction: column;
      text-decoration: none; color: inherit;
      background: #F1F1F1;
      border-radius: 6px 6px 0 0;
      overflow: hidden;
    }

    .press-card__image {
      width: 100%; aspect-ratio: 338 / 244;
      border-radius: 6px; overflow: hidden;
    }
    .press-card__image img {
      width: 100%; height: 100%; object-fit: cover; display: block;
      transition: transform 250ms ease;
    }
    .press-card__image .ph { border-radius: 6px; background: #D9D9D9; }
    .press-card__image .ph::before { display: none; }
    @media (hover: hover) { .press-card:hover .press-card__image img { transform: scale(1.03); } }

    .press-card__body {
      padding: 20px 20px 15px;
      display: flex; flex-direction: column;
      gap: 47px;
      flex: 1;
    }
    .press-card__title {
      font-family: var(--font-display); font-weight: 700;
      font-size: 18px; line-height: 21.2px; letter-spacing: 0.54px;
      color: #0162FF; margin: 0;
    }
    @media (hover: hover) { .press-card:hover .press-card__title { text-decoration: underline; text-underline-offset: 2px; } }

    .press-card__footer {
      display: flex; flex-direction: column; gap: 12px;
      margin-top: auto;
    }
    .press-card__card-divider {
      width: 100%; height: 1px; background: rgba(0,0,0,0.25);
    }
    .press-card__date {
      font-family: var(--font-ui); font-weight: 700;
      font-size: 14px; line-height: 0.85; letter-spacing: 0.84px;
      text-transform: uppercase; color: #000;
    }

    .press-card:focus-visible { outline: 2px solid #0162FF; outline-offset: 2px; }

    .arrow-nav { display: none; align-items: center; gap: 4px; }
    @media (min-width: 1024px) { .arrow-nav { display: flex; } }
    .arrow-nav__btn {
      display: flex; align-items: center; justify-content: center;
      background: none; border: none; cursor: pointer; padding: 0;
      transition: opacity 150ms ease;
    }
    .arrow-nav__btn svg { width: 37px; height: 21px; }
    .arrow-nav__btn:hover { opacity: 0.7; }
    .arrow-nav__btn:disabled { opacity: 0.3; cursor: not-allowed; }
    .arrow-nav__btn--next svg { transform: rotate(180deg); }


    /* ==========================================================================
       14. VISIT SITE LINK
       ========================================================================== */
    .visit-site-link {
      text-decoration: none; cursor: pointer; display: inline-flex; align-items: center; gap: 5px;
      font-family: var(--font-ui); font-weight: var(--weight-bold); font-size: 9px;
      line-height: 0.85; letter-spacing: 0.34px; text-transform: uppercase; color: var(--color-white);
      transition: opacity var(--transition-fast);
    }
    @media (min-width: 1024px) {
      .visit-site-link { font-size: 14px; letter-spacing: 0.84px; gap: 8px; }
    }
    .visit-site-link__arrow { width: 12px; height: 7px; flex-shrink: 0; transition: transform var(--transition-base); }
    @media (min-width: 1024px) { .visit-site-link__arrow { width: 23px; height: 13px; } }
    .visit-site-link__text { position: relative; }
    .visit-site-link:hover { opacity: 1; }
    .visit-site-link:hover .visit-site-link__arrow { transform: translateX(4px); }
    .visit-site-link:hover .visit-site-link__arrow path { fill: var(--color-red); }
    .visit-site-link:active .visit-site-link__arrow path { fill: #BB0101; }
    .visit-site-link--list { font-family: var(--font-ui); font-weight: var(--weight-semibold); font-size: 9px; letter-spacing: 0.91px; gap: 5px; }
    .visit-site-link--list .visit-site-link__arrow { width: 12px; height: 7px; }


    /* ==========================================================================
       15. BUTTON
       ========================================================================== */
    .btn {
      appearance: none; border: none; background: none; cursor: pointer; text-decoration: none;
      display: inline-flex; align-items: center; justify-content: center; height: 32px; padding: 0 24px;
      font-family: var(--font-display); font-weight: var(--weight-bold); font-size: 18px;
      line-height: 21.2px; letter-spacing: 0.54px; background-color: var(--color-blue); color: var(--color-white);
      border-radius: var(--radius); transition: background-color var(--transition-fast), transform var(--transition-fast);
    }
    .btn:hover { background-color: var(--color-red); }
    .btn:active { background-color: #BB0101; transform: scale(0.98); }
    .btn:focus-visible { outline: var(--focus-ring-width) solid var(--color-white); outline-offset: var(--focus-ring-offset); }


    /* ==========================================================================
       04. SECTION WRAPPER
       ========================================================================== */
    .section-wrapper { position: relative; width: 100%; }
    .section-wrapper__inner {
      width: 100%; max-width: var(--content-max-width); margin: 0 auto;
      padding: 60px var(--margin-mobile);
    }
    @media (min-width: 768px) { .section-wrapper__inner { padding: 80px 30px; } }
    @media (min-width: 1024px) { .section-wrapper__inner { padding: 80px var(--margin-desktop); } }

    .section-wrapper[data-variant="light"] { background: var(--color-white); color: var(--color-black); }
    .section-wrapper[data-variant="dark"] { background: var(--color-navy); color: var(--color-white); }
    .section-wrapper[data-variant="accent"] { background: var(--color-red); color: var(--color-white); position: relative; overflow: hidden; }
    .section-wrapper[data-variant="accent"] .accent-stripes {
      position: absolute; top: 0; right: 0; width: 661px; height: 584px; pointer-events: none; z-index: 0;
    }
    .section-wrapper[data-variant="accent"] .section-wrapper__inner { position: relative; z-index: 1; }
    .section-wrapper[data-variant="accent"] .carousel { position: relative; z-index: 1; }
    .section-wrapper[data-bleed="true"] .section-wrapper__inner { max-width: none; padding-left: 0; padding-right: 0; }


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


    /* ==========================================================================
       PLACEHOLDER IMAGES (for demo — replace with real assets)
       ========================================================================== */
    .ph { display: flex; align-items: center; justify-content: center; font-size: 10px; color: #999; width: 100%; height: 100%; background: #E0E0E0; }
    .ph--1, .ph--2, .ph--3, .ph--4, .ph--5, .ph--6 { background: #E0E0E0; color: #999; }
    .ph::before {
      content: ''; width: 32px; height: 32px; margin-right: 6px;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23B0B0B0' stroke-width='1.5'%3E%3Crect x='3' y='3' width='18' height='18' rx='2'/%3E%3Ccircle cx='8.5' cy='8.5' r='1.5'/%3E%3Cpath d='M21 15l-5-5L5 21'/%3E%3C/svg%3E");
      background-size: contain; background-repeat: no-repeat; flex-shrink: 0;
    }
    .ph-logo { width: 60%; height: 50%; border: 2px dashed rgba(0,0,0,0.15); border-radius: 4px; display: flex; align-items: center; justify-content: center; font-size: 10px; color: #999; text-transform: uppercase; letter-spacing: 1px; background: #E0E0E0; }

    /* SVG arrow template for visit-site-link */
    .vsl-arrow { viewBox: 0 0 14 12; }
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
        <a href="#about" class="mobile-menu__nav-item" onclick="closeMenu()">About</a>
        <a href="<?php echo home_url( '/team/' ); ?>" class="mobile-menu__nav-item" onclick="closeMenu()">Team</a>
        <a href="#press" class="mobile-menu__nav-item" onclick="closeMenu()">Press</a>
        <a href="#contact" class="mobile-menu__nav-item" onclick="closeMenu()">Contact</a>
        <a href="#careers" class="mobile-menu__nav-item" onclick="closeMenu()">Careers</a>
      </nav>
      <div class="mobile-menu__footer">
        <div class="mobile-menu__footer-col">
          <p class="mobile-menu__footer-label">Socials</p>
          <a href="#" class="mobile-menu__footer-link">Instagram</a>
          <a href="#" class="mobile-menu__footer-link">LinkedIn</a>
        </div>
        <div class="mobile-menu__footer-col">
          <p class="mobile-menu__footer-label">Contact</p>
          <a href="/cdn-cgi/l/email-protection#e0898e868fa0958e928996818c858493908f929493ce838f8d" class="mobile-menu__footer-email"><span class="__cf_email__" data-cfemail="d8b1b6beb798adb6aab1aeb9b4bdbcaba8b7aaacabf6bbb7b5">[email&#160;protected]</span></a>
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
        <a href="#about" class="sticky-nav__link">About</a>
        <a href="<?php echo home_url( '/team/' ); ?>" class="sticky-nav__link">Team</a>
        <a href="#press" class="sticky-nav__link">Press</a>
        <a href="#contact" class="sticky-nav__link">Contact</a>
        <a href="#careers" class="sticky-nav__link">Careers</a>
      </nav>
      <button class="hamburger" aria-label="Open menu" onclick="openMenu()"><span class="hamburger__bar"></span><span class="hamburger__bar"></span><span class="hamburger__bar"></span></button>
    </div>
  </div>

  <!-- ================================================================
       SITE HEADER (fixed, transparent — stays in place during scroll)
       ================================================================ -->
  <header class="site-header" id="siteHeader">
    <div class="site-header__inner">
      <a href="<?php echo home_url( '/' ); ?>" class="wordmark" style="color:var(--color-red)"><svg viewBox="0 0 166 36" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip_wm_2)">
<path d="M8.14982 16.6279C1.77516 16.6279 0.0010972 14.8926 0.0010972 9.29434V-0.000764847H5.05225V9.08582C5.05225 12.0581 5.82312 12.6943 8.55814 12.6943H9.05798C11.8352 12.6943 12.5639 12.0369 12.5639 9.08582V-0.000764847H17.615V9.29434C17.615 14.8926 15.841 16.6279 9.49093 16.6279H8.1463H8.14982Z" fill="currentColor"/>
<path d="M40.168 16.3947H32.681L25.4228 4.98964H25.2398V16.3947H20.4843V-0.000734329H27.9713L35.2295 11.4291H35.4125V-0.000734329H40.168V16.3947Z" fill="currentColor"/>
<path d="M47.9919 16.3948H43.0323V-0.000684738H54.1131C59.0728 -0.000684738 60.7377 1.14442 60.7377 4.33232V4.84832C60.7377 7.30817 59.8964 8.41086 57.6436 8.69007V8.85264C59.7803 9.22727 60.7377 9.67259 60.7377 12.6909V16.3912H55.7569V12.9241C55.7569 11.4044 55.3275 10.9803 52.8671 10.9803H47.9954V16.3912H47.9919V16.3948ZM47.9919 3.67495V7.30464H53.6555C55.1832 7.30464 55.7499 6.93 55.7499 5.64353V5.50216C55.7499 4.07432 55.1586 3.67495 52.9304 3.67495H47.9919Z" fill="currentColor"/>
<path d="M68.5693 16.3947H63.6097V-0.000709534H68.5693V16.3947Z" fill="currentColor"/>
<path d="M83.9031 16.3947H77.532L70.2492 -0.000709534H76.0078L80.8091 11.4998H80.9921L85.8356 -0.000709534H91.1824L83.9031 16.3947Z" fill="currentColor"/>
<path d="M109.559 16.3948H103.963L102.551 13.115H94.2229L92.836 16.3948H87.4434L94.7227 -0.000684738H102.255L109.563 16.3948H109.559ZM98.2955 3.56185L95.7928 9.41459H100.981L98.4785 3.56185H98.2919H98.2955Z" fill="currentColor"/>
<path d="M125.687 16.3948H111.237V-0.000684738H116.197V12.2738H125.687V16.3983V16.3948Z" fill="currentColor"/>
<path d="M143.893 16.3948H128.556V-0.000684738H143.893V3.69615H133.516V6.31858H143.893V10.0437H133.516V12.6909H143.893V16.3912V16.3948Z" fill="currentColor"/>
<path d="M165.034 8.52393C165.034 14.2848 162.669 16.3912 156.114 16.3912H146.762V-0.000709534H156.023C162.574 -0.000709534 165.034 2.13045 165.034 7.89483V8.52393ZM151.721 3.86224V12.5282H155.432C159.321 12.5282 159.983 11.1958 159.983 8.33661V8.08215C159.983 5.22293 159.321 3.86577 155.432 3.86577H151.721V3.86224Z" fill="currentColor"/>
<path d="M8.80696 35.9998C4.03036 35.9998 0.545595 34.8759 0 31.0377H5.27995C5.70939 32.2323 6.96602 32.4444 9.39831 32.4444C12.1544 32.4444 13.1295 32.0238 13.1506 30.8964V30.709C13.1506 29.8432 12.693 29.4438 11.0562 29.4226L6.64218 29.26C2.09086 29.0727 0.408315 27.8322 0.408315 24.6725V24.51C0.408315 20.7389 2.91101 19.1449 8.71192 19.1449H9.3244C14.0588 19.1449 17.4238 20.5268 17.9694 24.3226H12.6895C12.3269 23.0821 11.1653 22.7075 8.8668 22.7075C6.22682 22.7075 5.45595 23.1281 5.45595 24.2272V24.2944C5.45595 25.1603 5.88539 25.5596 7.52569 25.6268L11.9186 25.7682C16.4699 25.9095 18.1525 27.2419 18.1525 30.3097V30.4723C18.1525 34.5967 15.3295 35.9998 9.59543 35.9998H8.7964H8.80344H8.80696Z" fill="currentColor"/>
<path d="M25.7135 35.7636H20.7539V19.3682H31.7186C36.6325 19.3682 38.4523 20.8667 38.4523 24.9877V25.4577C38.4523 29.3207 36.5198 31.01 31.7186 31.01H25.7135V35.7636ZM25.7135 23.0473V27.3556H30.9935C33.0421 27.3556 33.4751 26.8184 33.4751 25.2704V25.1078C33.4751 23.5139 32.9752 23.0473 30.9724 23.0473H25.7171H25.7135Z" fill="currentColor"/>
<path d="M49.4471 36.0002C42.8965 36.0002 40.3234 33.8902 40.3234 28.1329V27.0337C40.3234 21.2729 42.8965 19.1382 49.4471 19.1382H50.7214C57.272 19.1382 59.8698 21.2694 59.8698 27.0337V28.1329C59.8698 33.8938 57.2755 36.0002 50.7214 36.0002H49.4471ZM50.3553 32.1089C54.178 32.1089 54.8151 30.7023 54.8151 27.9173V27.214C54.8151 24.4007 54.178 23.0224 50.3553 23.0224H49.8308C45.9835 23.0224 45.371 24.4043 45.371 27.214V27.9173C45.371 30.7023 45.987 32.1089 49.8308 32.1089H50.3553Z" fill="currentColor"/>
<path d="M67.151 35.7636H62.1914V19.3682H73.2723C78.2319 19.3682 79.8968 20.5133 79.8968 23.7012V24.2172C79.8968 26.677 79.0556 27.7797 76.7993 28.0554V28.2215C78.9394 28.5961 79.8968 29.0415 79.8968 32.0597V35.7601H74.9161V32.293C74.9161 30.7732 74.4867 30.3491 72.0262 30.3491H67.1546V35.7601L67.151 35.7636ZM67.151 23.0473V26.677H72.8147C74.3388 26.677 74.9091 26.3024 74.9091 25.0159V24.8746C74.9091 23.4467 74.3177 23.0473 72.0896 23.0473H67.151Z" fill="currentColor"/>
<path d="M93.5181 35.7636H88.5584V23.4927H81.874V19.3682H100.248V23.4927H93.5216V35.7636H93.5181Z" fill="currentColor"/>
<path d="M110.686 36C105.909 36 102.425 34.8761 101.879 31.0379H107.159C107.588 32.2325 108.845 32.4445 111.277 32.4445C114.033 32.4445 115.008 32.024 115.03 30.8965V30.7092C115.03 29.8433 114.572 29.444 112.935 29.4228L108.521 29.2602C103.97 29.0729 102.287 27.8323 102.287 24.6727V24.5101C102.287 20.7391 104.79 19.1451 110.591 19.1451H111.207C115.941 19.1451 119.306 20.527 119.852 24.3228H114.572C114.209 23.0823 113.048 22.7077 110.749 22.7077C108.109 22.7077 107.338 23.1282 107.338 24.2274V24.2945C107.338 25.1604 107.768 25.5598 109.408 25.627L113.801 25.7683C118.352 25.9097 120.035 27.2421 120.035 30.3099V30.4724C120.035 34.5969 117.212 36 111.478 36H110.679H110.686Z" fill="currentColor"/>
</g>
<defs>
<clipPath id="clip_wm_2">
<rect width="165.034" height="36" fill="white"/>
</clipPath>
</defs>
</svg></a>
      <div class="site-header__logo-mark logo-mark logo-mark--sm" id="heroHeaderBolt" style="color:var(--color-red)"><svg viewBox="0 0 114 36" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M41.1496 25.4067C43.7944 24.725 44.6802 25.9381 43.1163 28.1029C41.3111 30.6009 42.2661 31.7935 45.2358 30.7529L114 6.64983H65.0739C64.3461 6.64983 63.3787 7.09578 62.9207 7.63911L50.2539 22.7174C49.5474 23.5341 48.9385 23.177 49.5119 22.2236L60.7694 3.6786C61.9977 1.65562 61.0108 0 58.5754 0H24.2651L0 36L41.1496 25.405V25.4067Z" fill="currentColor"/>
</svg></div>
      <nav class="site-header__nav">
        <a href="#about" class="site-header__nav-link">About</a>
        <a href="<?php echo home_url( '/team/' ); ?>" class="site-header__nav-link">Team</a>
        <a href="#press" class="site-header__nav-link">Press</a>
        <a href="#contact" class="site-header__nav-link">Contact</a>
        <a href="#careers" class="site-header__nav-link">Careers</a>
      </nav>
      <button class="hamburger" aria-label="Open menu" onclick="openMenu()"><span class="hamburger__bar"></span><span class="hamburger__bar"></span><span class="hamburger__bar"></span></button>
    </div>
  </header>

  <!-- FIXED SCROLL BOLT (desktop only — handles the morph animation) -->
  <div class="scroll-bolt" id="scrollBolt" aria-hidden="true">
    <svg viewBox="0 0 434 142" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M156.655 100.212C166.722 97.528 170.092 102.311 164.142 110.846C157.271 120.702 160.903 125.403 172.211 121.297L434 26.2306H247.736C244.967 26.2306 241.277 27.986 239.541 30.1332L191.322 89.6114C188.635 92.8322 186.312 91.4249 188.495 87.6673L231.346 14.5129C236.025 6.52863 232.267 0 222.996 0H92.3755L0 142L156.655 100.212Z" fill="currentColor"/>
</svg>
  </div>

  <!-- ================================================================
       HERO
       ================================================================ -->
  <section class="hero" id="hero">
    <div class="hero__media">
      <video autoplay loop muted playsinline>
        <source src="<?php echo $assets; ?>images/homepage-hero-video.mp4" type="video/mp4">
      </video>
    </div>
    <div class="hero__logo-mark">
      <svg viewBox="0 0 434 142" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M156.655 100.212C166.722 97.528 170.092 102.311 164.142 110.846C157.271 120.702 160.903 125.403 172.211 121.297L434 26.2306H247.736C244.967 26.2306 241.277 27.986 239.541 30.1332L191.322 89.6114C188.635 92.8322 186.312 91.4249 188.495 87.6673L231.346 14.5129C236.025 6.52863 232.267 0 222.996 0H92.3755L0 142L156.655 100.212Z" fill="currentColor"/>
</svg>
    </div>
  </section>

  <!-- ================================================================
       STICKY HEADLINE
       ================================================================ -->
  <section class="sticky-headline" id="about">
    <div class="sticky-headline__track">
      <h2 class="sticky-headline__text">Unrivaled Experiences for Young Athletes</h2>
    </div>
  </section>

  <!-- ================================================================
       STATS
       ================================================================ -->
  <section class="section-wrapper" data-variant="light">
    <div class="stat-badges" data-animate id="statBadges">
      <div class="stat-badge"><div class="stat-badge__shape"><div class="stat-badge__bg"></div><div class="stat-badge__content"><span class="stat-badge__number">15</span><span class="stat-badge__label">Venues &<br>Properties</span></div></div></div>
      <div class="stat-badge"><div class="stat-badge__shape"><div class="stat-badge__bg"></div><div class="stat-badge__content"><span class="stat-badge__number">1.7m</span><span class="stat-badge__label">Visitors<br>Each Year</span></div></div></div>
      <div class="stat-badge"><div class="stat-badge__shape"><div class="stat-badge__bg"></div><div class="stat-badge__content"><span class="stat-badge__number">635k</span><span class="stat-badge__label">Athletes<br>Annually</span></div></div></div>
    </div>
  </section>

  <!-- ================================================================
       EVENTS CAROUSEL
       ================================================================ -->
  <section class="section-wrapper" data-variant="light" data-bleed="true">
    <div class="section-wrapper__inner" style="padding-top:0;padding-bottom:0;">
      <div class="carousel" data-variant="events" data-speed="40">
        <div class="carousel__track">
          <div class="carousel__slide"><div class="carousel__slide-image carousel__slide-image--narrow"><div class="ph ph--1"></div></div><p class="carousel__slide-venue">Ripken</p><p class="carousel__slide-desc">2025 championships All-Star game</p></div>
          <div class="carousel__slide"><div class="carousel__slide-image carousel__slide-image--medium"><div class="ph ph--2"></div></div><p class="carousel__slide-venue">Rocker B Ranch</p><p class="carousel__slide-desc">Ripken National Qualifiers</p></div>
          <div class="carousel__slide"><div class="carousel__slide-image carousel__slide-image--wide"><div class="ph ph--3"></div></div><p class="carousel__slide-venue">Ripken Aberdeen</p><p class="carousel__slide-desc">2025 champ</p></div>
          <div class="carousel__slide"><div class="carousel__slide-image carousel__slide-image--narrow"><div class="ph ph--4"></div></div><p class="carousel__slide-venue">Unrivaled Flag</p><p class="carousel__slide-desc">2025 high school girls championships</p></div>
          <div class="carousel__slide"><div class="carousel__slide-image carousel__slide-image--wide"><div class="ph ph--5"></div></div><p class="carousel__slide-venue">Ripken Myrtle Beach</p><p class="carousel__slide-desc">Softball championships</p></div>
          <!-- Duplicate set -->
          <div class="carousel__slide" aria-hidden="true"><div class="carousel__slide-image carousel__slide-image--narrow"><div class="ph ph--1"></div></div><p class="carousel__slide-venue">Ripken</p><p class="carousel__slide-desc">2025 championships All-Star game</p></div>
          <div class="carousel__slide" aria-hidden="true"><div class="carousel__slide-image carousel__slide-image--medium"><div class="ph ph--2"></div></div><p class="carousel__slide-venue">Rocker B Ranch</p><p class="carousel__slide-desc">Ripken National Qualifiers</p></div>
          <div class="carousel__slide" aria-hidden="true"><div class="carousel__slide-image carousel__slide-image--wide"><div class="ph ph--3"></div></div><p class="carousel__slide-venue">Ripken Aberdeen</p><p class="carousel__slide-desc">2025 champ</p></div>
          <div class="carousel__slide" aria-hidden="true"><div class="carousel__slide-image carousel__slide-image--narrow"><div class="ph ph--4"></div></div><p class="carousel__slide-venue">Unrivaled Flag</p><p class="carousel__slide-desc">2025 high school girls championships</p></div>
          <div class="carousel__slide" aria-hidden="true"><div class="carousel__slide-image carousel__slide-image--wide"><div class="ph ph--5"></div></div><p class="carousel__slide-venue">Ripken Myrtle Beach</p><p class="carousel__slide-desc">Softball championships</p></div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================================================================
       OUR BRANDS
       ================================================================ -->
  <section class="section-wrapper" data-variant="dark">
    <div class="section-wrapper__inner">
      <div class="section-header" data-variant="dark">
        <h2 class="section-header__headline">OUR BRANDS</h2>
        <p class="section-header__desc">Our growing network of premier youth sports venues and programming enables athletes to develop the building blocks for success by delivering experiences that are inclusive &amp; premium, competitive &amp; developmental, inspiring &amp; memory-making.</p>
      </div>
      <div class="brand-grid" data-animate id="brandGrid">
        <div class="brand-card"><div class="brand-card__image"><div class="ph-logo">Cooperstown</div><div class="brand-card__overlay"></div></div><p class="brand-card__name">Cooperstown All Star Village</p><div class="brand-card__divider"></div><a href="#" class="visit-site-link"><svg class="visit-site-link__arrow" viewBox="0 0 23 13"><path d="M22.4262 6.11868L0 12.2325V0L22.4262 6.11868Z" fill="#0162FF"/></svg><span class="visit-site-link__text">Visit Site</span></a><div class="brand-card__divider"></div></div>
        <div class="brand-card"><div class="brand-card__image"><div class="ph-logo">Ripken</div><div class="brand-card__overlay"></div></div><p class="brand-card__name">Ripken Baseball</p><div class="brand-card__divider"></div><a href="#" class="visit-site-link"><svg class="visit-site-link__arrow" viewBox="0 0 23 13"><path d="M22.4262 6.11868L0 12.2325V0L22.4262 6.11868Z" fill="#0162FF"/></svg><span class="visit-site-link__text">Visit Site</span></a><div class="brand-card__divider"></div></div>
        <div class="brand-card"><div class="brand-card__image"><div class="ph-logo">Flag</div><div class="brand-card__overlay"></div></div><p class="brand-card__name">Unrivaled Flag</p><div class="brand-card__divider"></div><a href="#" class="visit-site-link"><svg class="visit-site-link__arrow" viewBox="0 0 23 13"><path d="M22.4262 6.11868L0 12.2325V0L22.4262 6.11868Z" fill="#0162FF"/></svg><span class="visit-site-link__text">Visit Site</span></a><div class="brand-card__divider"></div></div>
        <div class="brand-card"><div class="brand-card__image"><div class="ph-logo">Rocker B</div><div class="brand-card__overlay"></div></div><p class="brand-card__name">Rocker B Ranch</p><div class="brand-card__divider"></div><a href="#" class="visit-site-link"><svg class="visit-site-link__arrow" viewBox="0 0 23 13"><path d="M22.4262 6.11868L0 12.2325V0L22.4262 6.11868Z" fill="#0162FF"/></svg><span class="visit-site-link__text">Visit Site</span></a><div class="brand-card__divider"></div></div>
        <div class="brand-card"><div class="brand-card__image"><div class="ph-logo">Aberdeen</div><div class="brand-card__overlay"></div></div><p class="brand-card__name">Ripken Experience Aberdeen</p><div class="brand-card__divider"></div><a href="#" class="visit-site-link"><svg class="visit-site-link__arrow" viewBox="0 0 23 13"><path d="M22.4262 6.11868L0 12.2325V0L22.4262 6.11868Z" fill="#0162FF"/></svg><span class="visit-site-link__text">Visit Site</span></a><div class="brand-card__divider"></div></div>
        <div class="brand-card"><div class="brand-card__image"><div class="ph-logo">Myrtle Beach</div><div class="brand-card__overlay"></div></div><p class="brand-card__name">Ripken Experience Myrtle Beach</p><div class="brand-card__divider"></div><a href="#" class="visit-site-link"><svg class="visit-site-link__arrow" viewBox="0 0 23 13"><path d="M22.4262 6.11868L0 12.2325V0L22.4262 6.11868Z" fill="#0162FF"/></svg><span class="visit-site-link__text">Visit Site</span></a><div class="brand-card__divider"></div></div>
        <div class="brand-card"><div class="brand-card__image"><div class="ph-logo">Pigeon Forge</div><div class="brand-card__overlay"></div></div><p class="brand-card__name">Ripken Experience Pigeon Forge</p><div class="brand-card__divider"></div><a href="#" class="visit-site-link"><svg class="visit-site-link__arrow" viewBox="0 0 23 13"><path d="M22.4262 6.11868L0 12.2325V0L22.4262 6.11868Z" fill="#0162FF"/></svg><span class="visit-site-link__text">Visit Site</span></a><div class="brand-card__divider"></div></div>
        <div class="brand-card"><div class="brand-card__image"><div class="ph-logo">ForeverLawn</div><div class="brand-card__overlay"></div></div><p class="brand-card__name">ForeverLawn Sports Complex</p><div class="brand-card__divider"></div><a href="#" class="visit-site-link"><svg class="visit-site-link__arrow" viewBox="0 0 23 13"><path d="M22.4262 6.11868L0 12.2325V0L22.4262 6.11868Z" fill="#0162FF"/></svg><span class="visit-site-link__text">Visit Site</span></a><div class="brand-card__divider"></div></div>
      </div>
      <div class="brand-list">
        <div class="brand-list-item"><p class="brand-list-item__name">Diamond Nation</p><a href="#" class="visit-site-link visit-site-link--list"><svg class="visit-site-link__arrow" viewBox="0 0 23 13"><path d="M22.4262 6.11868L0 12.2325V0L22.4262 6.11868Z" fill="#0162FF"/></svg><span class="visit-site-link__text">Visit Site</span></a></div>
        <div class="brand-list-item"><p class="brand-list-item__name">Big League Dreams</p><a href="#" class="visit-site-link visit-site-link--list"><svg class="visit-site-link__arrow" viewBox="0 0 23 13"><path d="M22.4262 6.11868L0 12.2325V0L22.4262 6.11868Z" fill="#0162FF"/></svg><span class="visit-site-link__text">Visit Site</span></a></div>
        <div class="brand-list-item"><p class="brand-list-item__name">Sports Force Park</p><a href="#" class="visit-site-link visit-site-link--list"><svg class="visit-site-link__arrow" viewBox="0 0 23 13"><path d="M22.4262 6.11868L0 12.2325V0L22.4262 6.11868Z" fill="#0162FF"/></svg><span class="visit-site-link__text">Visit Site</span></a></div>
        <div class="brand-list-item"><p class="brand-list-item__name">Under the Lights Flag Football</p><a href="#" class="visit-site-link visit-site-link--list"><svg class="visit-site-link__arrow" viewBox="0 0 23 13"><path d="M22.4262 6.11868L0 12.2325V0L22.4262 6.11868Z" fill="#0162FF"/></svg><span class="visit-site-link__text">Visit Site</span></a></div>
      </div>
      <div class="brand-grid__load-more"><button class="btn">LOAD MORE</button></div>
    </div>
  </section>

  <!-- ================================================================
       PRESS
       ================================================================ -->
  <section class="section-wrapper" data-variant="light" id="press">
    <div class="section-wrapper__inner" style="padding-bottom: 0;">
      <div class="press-header-row">
        <div class="section-header" data-variant="light">
          <p class="section-header__label">Press</p>
          <h2 class="section-header__headline">How We're Changing the Game</h2>
        </div>
        <div class="arrow-nav">
          <button class="arrow-nav__btn arrow-nav__btn--prev" aria-label="Previous" disabled><svg viewBox="0 0 37 21"><path d="M0 10.4958L37 0L37 21L0 10.4958Z" fill="#0162FF"/></svg></button>
          <button class="arrow-nav__btn arrow-nav__btn--next" aria-label="Next"><svg viewBox="0 0 37 21"><path d="M0 10.4958L37 0L37 21L0 10.4958Z" fill="#0162FF"/></svg></button>
        </div>
      </div>
      <div class="press-divider"></div>
    </div>
    <div class="press-track" style="padding-left: 60px;">
      <a href="#" class="press-card"><div class="press-card__image"><div class="ph"></div></div><div class="press-card__body"><h3 class="press-card__title">Unrivaled Sports Announces Long-Term Investment in Twin Creeks Sports Complex</h3><div class="press-card__footer"><div class="press-card__card-divider"></div><time class="press-card__date">12.9.2025</time></div></div></a>
      <a href="#" class="press-card"><div class="press-card__image"><div class="ph"></div></div><div class="press-card__body"><h3 class="press-card__title">Ashlea Klam Is On A Mission To Shape The Future Of Flag Football</h3><div class="press-card__footer"><div class="press-card__card-divider"></div><time class="press-card__date">12.3.2025</time></div></div></a>
      <a href="#" class="press-card"><div class="press-card__image"><div class="ph"></div></div><div class="press-card__body"><h3 class="press-card__title">NFL Legend Drew Brees Announces Major Flag Football Partnership With Unrivaled Sports</h3><div class="press-card__footer"><div class="press-card__card-divider"></div><time class="press-card__date">10.21.2025</time></div></div></a>
      <a href="#" class="press-card"><div class="press-card__image"><div class="ph"></div></div><div class="press-card__body"><h3 class="press-card__title">Hall Of Fame Resort &amp; Entertainment Company Partners With Josh Harris And David Blitzer To Elevate</h3><div class="press-card__footer"><div class="press-card__card-divider"></div><time class="press-card__date">12.9.2025</time></div></div></a>
      <a href="#" class="press-card"><div class="press-card__image"><div class="ph"></div></div><div class="press-card__body"><h3 class="press-card__title">Hall Of Fame Resort &amp; Entertainment Company Partners With Josh Harris And David Blitzer To Elevate</h3><div class="press-card__footer"><div class="press-card__card-divider"></div><time class="press-card__date">12.9.2025</time></div></div></a>
    </div>
  </section>

  <!-- ================================================================
       INSTAGRAM / CTA
       ================================================================ -->
  <section class="section-wrapper" data-variant="accent">
    <svg class="accent-stripes" width="661" height="584" viewBox="0 0 661 584" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip_stripes)"><path d="M454.359 621.156L811.328 619.269L448.725 610.083L805.699 608.202L443.095 599.017L800.065 597.13L437.462 587.943L794.432 586.056L431.832 576.878L788.803 574.991L426.198 565.804L783.169 563.917L420.57 554.738L777.54 552.851L414.936 543.666L771.906 541.778L409.307 532.599L766.276 530.712L403.673 521.527L760.643 519.638L398.039 510.453L755.013 508.573L392.41 499.386L749.379 497.499L386.776 488.314L743.751 486.433L381.146 477.248L738.117 475.36L375.514 466.174L732.484 464.286L369.884 455.109L726.854 453.22L364.25 444.035L721.22 442.147L358.621 432.969L715.592 431.081L352.987 421.896L709.958 420.007L347.353 410.822L704.328 408.942L341.725 399.756L698.695 397.868L336.091 388.683L693.065 386.802L330.461 377.617L687.431 375.729L324.828 366.543L681.798 364.655L319.198 355.478L676.168 353.589L313.565 344.404L670.534 342.516L307.936 333.338L664.906 331.45L302.302 322.265L659.272 320.376L296.673 311.199L653.642 309.311L291.039 300.125L648.009 298.237L285.405 289.052L642.379 287.172L279.776 277.986L292.038 277.921L279.582 277.606L636.553 275.718L273.948 266.532L630.923 264.652L268.32 255.467L625.29 253.578L262.686 244.393L619.656 242.505L257.056 233.327L614.026 231.439L251.423 222.254L608.393 220.365L245.793 211.188L602.764 209.3L240.16 200.114L597.13 198.226L234.531 189.049L591.501 187.16L228.897 177.975L585.867 176.087L223.264 166.901L580.237 165.021L217.634 155.836L574.604 153.948L212 144.762L568.974 142.882L206.371 133.696L563.342 131.808L200.737 122.623L557.708 120.735L195.107 111.557L552.078 109.669L189.475 100.484L546.444 98.5952L183.845 89.4181L540.815 87.5305L178.211 78.344L535.181 76.4564L172.578 67.2712L529.553 65.3902L166.948 56.2051L523.919 54.3175L161.316 45.131L518.289 43.2514L155.686 34.0649L512.656 32.1773L150.052 22.9922L507.022 21.1045L144.423 11.9261L501.392 10.0384L138.789 0.853266L495.759-1.03565L133.159-10.2128L490.129-12.1004L127.526-21.2869L484.495-23.1745L121.896-32.3517L478.867-34.2406L116.262-43.4258L473.233-45.3134L110.63-54.4999L467.604-56.3795L105-65.5646L721.22-68L922 633L454.359 621.156Z" fill="#BB0101"/></g><defs><clipPath id="clip_stripes"><rect width="817" height="584" fill="white"/></clipPath></defs></svg>
    <div class="section-wrapper__inner" style="padding-bottom: 0;">
      <div class="section-header" data-variant="dark">
        <p class="section-header__label">Instagram</p>
        <h2 class="section-header__headline">Catch Us in Action</h2>
      </div>
    </div>
    <div class="carousel" data-variant="instagram" data-speed="25">
      <div class="carousel__track">
        <div class="carousel__slide"><a href="#" class="carousel__slide-link"><div class="ph ph--1" style="width:271px;height:338px;border-radius:6px;"></div></a></div>
        <div class="carousel__slide"><a href="#" class="carousel__slide-link"><div class="ph ph--2" style="width:271px;height:338px;border-radius:6px;"></div></a></div>
        <div class="carousel__slide"><a href="#" class="carousel__slide-link"><div class="ph ph--3" style="width:271px;height:338px;border-radius:6px;"></div></a></div>
        <div class="carousel__slide"><a href="#" class="carousel__slide-link"><div class="ph ph--4" style="width:271px;height:338px;border-radius:6px;"></div></a></div>
        <div class="carousel__slide"><a href="#" class="carousel__slide-link"><div class="ph ph--5" style="width:271px;height:338px;border-radius:6px;"></div></a></div>
        <div class="carousel__slide" aria-hidden="true"><a href="#" class="carousel__slide-link" tabindex="-1"><div class="ph ph--1" style="width:271px;height:338px;border-radius:6px;"></div></a></div>
        <div class="carousel__slide" aria-hidden="true"><a href="#" class="carousel__slide-link" tabindex="-1"><div class="ph ph--2" style="width:271px;height:338px;border-radius:6px;"></div></a></div>
        <div class="carousel__slide" aria-hidden="true"><a href="#" class="carousel__slide-link" tabindex="-1"><div class="ph ph--3" style="width:271px;height:338px;border-radius:6px;"></div></a></div>
        <div class="carousel__slide" aria-hidden="true"><a href="#" class="carousel__slide-link" tabindex="-1"><div class="ph ph--4" style="width:271px;height:338px;border-radius:6px;"></div></a></div>
        <div class="carousel__slide" aria-hidden="true"><a href="#" class="carousel__slide-link" tabindex="-1"><div class="ph ph--5" style="width:271px;height:338px;border-radius:6px;"></div></a></div>
      </div>
    </div>
  </section>

  <!-- ================================================================
       FOOTER
       ================================================================ -->
  <footer class="site-footer" id="contact">
    <div class="site-footer__inner">
      <div class="site-footer__main">
        <div class="site-footer__logo"><a href="<?php echo home_url( '/' ); ?>" class="wordmark"><svg width="335" height="200" viewBox="0 0 335 200" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_ft)"><path d="M17.04 160.08C4.14 160.08.55 156.58.55 145.3V126.57h10.22v18.31c0 5.99 1.56 7.27 7.09 7.27h1.01c5.62 0 7.09-1.32 7.09-6.27v-19.31h10.22v18.73c0 11.28-3.59 14.78-16.44 14.78h-2.72z" fill="white"/><path d="M81.82 159.6H66.67L51.99 136.62h-.37v22.98H41.99V126.56h15.15l14.68 23.03h.37v-23.03h9.62v33.04z" fill="white"/><path d="M97.65 159.6h-10.04V126.56h22.42c10.04 0 13.4 2.31 13.4 8.73v1.04c0 4.95-1.7 7.17-5.56 7.51v.33c4.33.75 5.56 1.65 5.56 7.75v7.46h-10.08v-6.99c0-3.06-.87-3.92-5.85-3.92h-9.86v10.9zm0-25.63v7.32h11.46c3.09 0 4.24-.75 4.24-3.35v-.28c0-2.88-1.2-3.68-5.7-3.68H97.65z" fill="white"/><path d="M139.29 159.6h-10.04V126.56h10.04v33.04z" fill="white"/><path d="M170.3 159.6h-12.89l-14.74-33.04h11.65l9.72 23.18h.37l9.8-23.18h10.82L170.3 159.6z" fill="white"/><path d="M222.22 159.6h-11.32l-2.85-6.61h-16.85l-2.81 6.61h-10.91l14.74-33.04h15.24l14.78 33.04zm-22.79-25.86l-5.06 11.79h10.5l-5.06-11.79h-.38z" fill="white"/><path d="M254.85 159.6h-29.24V126.56h10.04v24.74h19.2v8.31z" fill="white"/><path d="M291.69 159.6H260.66V126.56h31.03v7.45h-20.99v5.28h20.99v7.51h-20.99v5.33h20.99v7.47z" fill="white"/><path d="M334.47 143.74c0 11.61-4.79 15.85-18.05 15.85h-18.92V126.56h18.74c13.25 0 18.22 4.29 18.22 15.91v1.27zm-26.94-9.39v17.46h7.51c7.87 0 9.21-2.69 9.21-8.44v-.52c0-5.76-1.34-8.5-9.21-8.5h-7.51z" fill="white"/><path d="M17.82 199.1c-9.66 0-16.71-2.27-17.82-10v-.01h10.68c.87 2.41 3.41 2.83 8.33 2.83 5.58 0 7.55-.85 7.6-3.12v-.38c0-1.74-.93-2.55-4.24-2.59l-8.93-.33c-9.21-.38-12.61-2.88-12.61-9.25v-.33c0-7.6 5.06-10.81 16.8-10.81h1.24c9.58 0 16.39 2.78 17.49 10.43h-10.68c-.74-2.5-3.09-3.25-7.74-3.25-5.34 0-6.91.85-6.91 3.06v.13c0 1.75.87 2.55 4.19 2.69l8.89.28c9.21.28 12.61 2.97 12.61 9.17v.33c0 8.31-5.72 11.16-17.32 11.16h-1.62z" fill="white"/><path d="M52.03 198.63H41.99v-33.04h22.18c9.94 0 13.63 3.02 13.63 11.32v.95c0 7.79-3.91 11.19-13.63 11.19H52.03v5.58zm0-25.62v8.68h10.68c4.15 0 5.02-1.08 5.02-3.73v-.33c0-3.21-.5-4.62-6.06-4.62H52.03z" fill="white"/><path d="M99.87 199.11c-13.26 0-18.46-4.25-18.46-15.85v-2.22c0-11.61 5.2-15.91 18.46-15.91h2.58c13.26 0 18.51 4.29 18.51 15.91v2.22c0 11.61-5.25 15.85-18.51 15.85h-2.58zm1.85-7.84c7.73 0 9.03-2.84 9.03-7.66v-1.42c0-5.67-1.29-8.45-9.03-8.45h-1.06c-7.79 0-9.03 2.78-9.03 8.45v1.42c0 4.82 1.24 7.66 9.03 7.66h1.06z" fill="white"/><path d="M135.69 198.63h-10.04V165.59h22.42c10.04 0 13.4 2.31 13.4 8.73v1.04c0 4.96-1.7 7.18-6.27 7.73v.34c4.33.75 6.27 1.65 6.27 7.75v7.46h-10.08v-6.99c0-3.06-.87-3.92-5.84-3.92h-9.86v10.9zm0-25.62v7.32h11.46c3.09 0 4.24-.75 4.24-3.35v-.28c0-2.88-1.2-3.69-5.7-3.69h-10z" fill="white"/><path d="M188.87 198.63h-10.04v-24.74h-13.52v-8.3h37.17v8.3h-13.61v24.74z" fill="white"/><path d="M223.78 199.1c-9.66 0-16.72-2.27-17.82-10h10.68c.87 2.41 3.41 2.83 8.34 2.83 5.58 0 7.55-.85 7.6-3.12v-.38c0-1.74-.93-2.55-4.24-2.59l-8.93-.33c-9.21-.38-12.61-2.88-12.61-9.25v-.33c0-7.6 5.06-10.81 16.8-10.81h1.24c9.58 0 16.39 2.78 17.49 10.43h-10.68c-.74-2.5-3.09-3.25-7.74-3.25-5.34 0-6.91.85-6.91 3.06v.13c0 1.75.87 2.55 4.19 2.69l8.89.28c9.21.28 12.61 2.97 12.61 9.17v.33c0 8.31-5.72 11.16-17.32 11.16h-1.62z" fill="white"/><path d="M120.53 77.31c7.75-2.07 10.34 1.62 5.76 8.2-6.87 9.86-3.24 14.56 8.07 10.45L334 20.23H190.61c-2.13 0-4.97 1.35-6.31 3.01l-47.1 59.89c-2.07 2.48-3.86 1.4-2.18-1.46l42.97-56.44c3.6-6.16.71-11.19-6.42-11.19H71.08L0 109.55l120.53-32.24z" fill="#FF0000"/></g><defs><clipPath id="clip0_ft"><rect width="334.458" height="199.115" fill="white"/></clipPath></defs></svg></a></div>
        <div class="site-footer__col"><p class="site-footer__label">Follow Us</p><a href="#" class="site-footer__link">Facebook</a><a href="#" class="site-footer__link">Instagram</a><a href="#" class="site-footer__link">LinkedIn</a></div>
        <div class="site-footer__col" id="careers"><p class="site-footer__label">Careers</p><a href="#" class="site-footer__link">Overview</a><a href="#" class="site-footer__link">Open Roles</a></div>
        <div class="site-footer__col"><p class="site-footer__label">Contact</p><a href="/cdn-cgi/l/email-protection#4a23242c250a3f2438233c2b262f2e393a25383e3964292527" class="site-footer__email"><span class="__cf_email__" data-cfemail="b0d9ded6dff0c5dec2d9c6d1dcd5d4c3c0dfc2c4c39ed3dfdd">[email&#160;protected]</span></a></div>
      </div>
      <div class="site-footer__legal"><a href="#" class="site-footer__legal-link">Privacy Policy</a><p class="site-footer__legal-text">© 2026 Unrivaled Sports - All rights reserved</p></div>
    </div>
  </footer>


  <!-- ================================================================
       PHASE 4: JavaScript — Scroll observers, menu, sticky nav
       ================================================================ -->
  <script>
    /* --- Mobile Menu --- */
    const mobileMenu = document.getElementById('mobileMenu');
    function openMenu() {
      mobileMenu.setAttribute('data-open', 'true');
      document.body.classList.add('menu-open');
    }
    function closeMenu() {
      mobileMenu.setAttribute('data-open', 'false');
      document.body.classList.remove('menu-open');
    }
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && mobileMenu.getAttribute('data-open') === 'true') closeMenu();
    });

    /* =================================================================
       HOMEPAGE SCROLL ANIMATION (Desktop ≥1024px only)
       
       Uses a single fixed-position bolt element (#scrollBolt) that
       smoothly morphs from large/white/centered → small/red/nav-position.
       
       States:
       1. Load: bolt at center of hero, white, large (260px)
       2. Scroll down: bolt shrinks, moves up to nav, turns red
       3. Past hero: transparent header slides away
       4. Scroll up past hero: sticky nav appears (white bg)
       5. Scroll back into hero: reverses — bolt grows, turns white
       6. Mobile: no bolt animation at all
       ================================================================= */

    const hero = document.getElementById('hero');
    const stickyNav = document.getElementById('stickyNav');
    const siteHeader = document.getElementById('siteHeader');
    const heroLogoMark = document.querySelector('.hero__logo-mark');
    const heroHeaderBolt = document.getElementById('heroHeaderBolt');
    const scrollBolt = document.getElementById('scrollBolt');
    const isHomepage = !!heroLogoMark;
    var isDesktop = function() { return window.innerWidth >= 1024; };

    // Bolt dimensions
    var BIG_W = 260;   // starting width at center of hero
    var SMALL_W = 114;  // final width locked in nav

    /* — Initial setup — */
    if (isHomepage) {
      // Hide the old hero bolt and header bolt — the scrollBolt replaces both
      if (heroLogoMark) heroLogoMark.style.display = 'none';
      if (heroHeaderBolt) heroHeaderBolt.style.opacity = '0';

      // Initial state for the fixed bolt: centered in hero, white, large
      if (scrollBolt && isDesktop()) {
        scrollBolt.style.width = BIG_W + 'px';
        scrollBolt.style.color = 'white';
        scrollBolt.style.opacity = '1';
      }
    }

    /* — State tracking — */
    var lastScrollY = 0;
    var stickyNavVisible = false;
    var headerDismissed = false;

    function updateNav() {
      var scrollY = window.scrollY;
      var heroH = hero ? hero.offsetHeight : 0;
      var goingDown = scrollY > lastScrollY;
      var goingUp = scrollY < lastScrollY;
      var pastHero = scrollY >= heroH;
      var inHero = scrollY < heroH;

      /* ─── SCROLL BOLT ANIMATION (desktop only) ─── */
      if (isHomepage && scrollBolt && isDesktop()) {

        // Progress: 0 at top → 1 when scroll reaches 65% of hero height
        var p = Math.min(Math.max(scrollY / (heroH * 0.65), 0), 1);

        // Width: 260px → 114px
        var w = BIG_W - (BIG_W - SMALL_W) * p;
        scrollBolt.style.width = w + 'px';

        // Vertical position (viewport coords):
        //   Start: center of hero (heroH/2 - scrollY = visual center)
        //   End: nav bolt position (~37px from top of viewport)
        var heroCenter = heroH / 2 - scrollY;
        var navY = 37; // approximate center of header bolt
        var topPx = heroCenter + (navY - heroCenter) * p;
        // Clamp so it never goes above the nav position
        topPx = Math.max(topPx, navY);
        scrollBolt.style.top = topPx + 'px';

        // Color: white (rgb 255,255,255) → red (rgb 255,0,0)
        var gb = Math.round(255 * (1 - p));
        scrollBolt.style.color = 'rgb(255,' + gb + ',' + gb + ')';

        // Visibility: show scrollBolt, keep header bolt hidden
        scrollBolt.style.opacity = '1';
        scrollBolt.style.display = 'block';

        // Once past hero, hide the scroll bolt and show the header bolt
        // (the header bolt is in the fixed header, so it persists)
        if (pastHero) {
          scrollBolt.style.display = 'none';
          if (heroHeaderBolt) heroHeaderBolt.style.opacity = '1';
        } else {
          if (heroHeaderBolt) heroHeaderBolt.style.opacity = '0';
        }

      } else if (isHomepage && scrollBolt && !isDesktop()) {
        // Mobile: hide scroll bolt, hide header bolt
        scrollBolt.style.display = 'none';
        if (heroHeaderBolt) heroHeaderBolt.style.opacity = '0';
      }

      /* ─── SITE HEADER: transparent nav dismiss + sticky nav ─── */
      if (isHomepage && siteHeader) {

        if (inHero) {
          // In hero: transparent header visible, no sticky nav
          if (headerDismissed) {
            siteHeader.classList.remove('is-dismissing', 'is-hidden');
            headerDismissed = false;
          }
          if (stickyNavVisible) {
            stickyNav.setAttribute('data-visible', 'false');
            stickyNavVisible = false;
          }

        } else if (pastHero && !headerDismissed) {
          // Just passed hero bottom — dismiss transparent header immediately
          siteHeader.classList.add('is-dismissing');
          headerDismissed = true;
          setTimeout(function() {
            siteHeader.classList.add('is-hidden');
          }, 350);

        } else if (pastHero && headerDismissed) {
          // Past hero, header gone — sticky nav on scroll up
          if (goingUp && !stickyNavVisible) {
            stickyNav.setAttribute('data-visible', 'true');
            stickyNavVisible = true;
          } else if (goingDown && stickyNavVisible) {
            stickyNav.setAttribute('data-visible', 'false');
            stickyNavVisible = false;
          }
        }

      } else {
        // Non-homepage (team page) — simple sticky nav
        var threshold = hero ? heroH : 200;
        if (scrollY < threshold) {
          if (stickyNavVisible) {
            stickyNav.setAttribute('data-visible', 'false');
            stickyNavVisible = false;
          }
        } else {
          if (goingUp && !stickyNavVisible) {
            stickyNav.setAttribute('data-visible', 'true');
            stickyNavVisible = true;
          } else if (goingDown && stickyNavVisible) {
            stickyNav.setAttribute('data-visible', 'false');
            stickyNavVisible = false;
          }
        }
      }

      lastScrollY = scrollY;
    }

    var ticking = false;
    window.addEventListener('scroll', function() {
      if (!ticking) {
        requestAnimationFrame(function() { updateNav(); ticking = false; });
        ticking = true;
      }
    });
    window.addEventListener('resize', function() {
      if (!ticking) {
        requestAnimationFrame(function() { updateNav(); ticking = false; });
        ticking = true;
      }
    });
    updateNav();

    /* --- Scroll-triggered section animations --- */
    function observeAnimate(el) {
      var obs = new IntersectionObserver(
        function(entries) { if (entries[0].isIntersecting) { el.classList.add('is-visible'); obs.unobserve(el); } },
        { threshold: 0.2 }
      );
      obs.observe(el);
    }
    document.querySelectorAll('[data-animate]').forEach(observeAnimate);

    setTimeout(function() {
      document.querySelectorAll('[data-animate]').forEach(function(el) {
        var rect = el.getBoundingClientRect();
        if (rect.top < window.innerHeight && rect.bottom > 0) el.classList.add('is-visible');
      });
    }, 500);

    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
      document.querySelectorAll('[data-animate]').forEach(function(el) { el.classList.add('is-visible'); });
    }
  </script>
<?php wp_footer(); ?>
</body>
</html>
