# Unrivaled Sports Corporate Website

## Tech Stack
- WordPress theme deployed on WP Engine
- Phase 1: static HTML templates served through WordPress (no ACF/dynamic content yet)
- All CSS and JS are inline within each PHP template (no external stylesheets or script files)
- No npm, no Node.js, no bundler

## Project Structure
```
style.css         — WordPress theme header (metadata only)
functions.php     — Theme setup, page creation, cleanup hooks
index.php         — Required WP fallback (loads front-page or page template)
front-page.php    — Homepage template
page-team.php     — Team/leadership page template
page.php          — Generic page fallback (redirects to home)
404.php           — 404 error page (branded, not a redirect)
screenshot.png    — Theme preview image
assets/
  fonts/          — Self-hosted web fonts (woff/woff2)
  images/         — Media assets (mp4, webp)
```

## WordPress Routing
- Homepage → `front-page.php` (WordPress convention for static front page)
- `/team/` → `page-team.php` (matched by slug `team`)
- Pages are auto-created on theme activation via `unrivaled_create_pages()`
- Permalinks must be set to "Post name" (`/%postname%/`) in WP admin
- Asset URLs use `get_theme_file_uri('assets/...')` — never hardcode paths
- Internal links use `home_url('/team/')`, `home_url('/')`, etc.

## Coding Conventions

### CSS
- 4-space indentation inside `<style>` blocks
- BEM naming: `.block`, `.block__element`, `.block--modifier`
- State classes use `.is-*` prefix (e.g., `.is-visible`, `.is-hidden`)
- Design tokens defined as CSS custom properties in `:root`
- Key colors: `--color-navy: #1D2468`, `--color-red: #FF0000`, `--color-blue: #0162FF`, `--color-gold: #A88A3E`
- Key fonts: `--font-display` (Review), `--font-ui` (Neue Plak), `--font-body` (Neue Plak Text)
- Breakpoints: 767px (mobile max), 768px (tablet+), 1024px (desktop+)

### JavaScript
- ES5 syntax (var, function declarations, no arrow functions)
- Inline `<script>` blocks at end of `<body>`, before `<?php wp_footer(); ?>`
- `requestAnimationFrame` + ticking flag for scroll/resize handlers
- Intersection Observer for scroll-triggered animations (`[data-animate]` → `.is-visible`)

### HTML / PHP Templates
- 2-space indentation for HTML markup
- Each template is self-contained (full HTML document with `<!DOCTYPE>` through `</html>`)
- PHP prologue sets `$assets = get_theme_file_uri("assets/");` for asset paths
- `<?php wp_head(); ?>` in `<head>`, `<?php wp_footer(); ?>` before `</body>`
- Semantic HTML5 elements
- Data attributes for component state: `data-open`, `data-visible`, `data-variant`, `data-animate`
- ARIA attributes on interactive elements
- Inline SVGs for logos, icons, and decorative elements

## Section Pattern
Sections use a wrapper with data attributes:
```html
<section class="section-wrapper" data-variant="light|dark|accent" data-bleed="true">
  <div class="section-wrapper__inner">
    <!-- content -->
  </div>
</section>
```

## Important Notes
- CSS and JS are duplicated across `front-page.php` and `page-team.php` — changes to shared styles/scripts must be applied to both files
- Fonts use `font-display: swap` to prevent FOIT
- Site respects `prefers-reduced-motion` for animations
- After uploading the theme, re-activate it in WP admin to trigger page creation and permalink flush
- If team page shows as homepage: check that a "Team" page exists with slug `team` and template `page-team.php`
