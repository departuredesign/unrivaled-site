<?php
/**
 * Generic page template fallback.
 *
 * Catches any WordPress page that doesn't have a specific template
 * (like front-page.php or page-team.php). Redirects to the homepage
 * since this Phase 1 theme only has two pages.
 */
wp_safe_redirect( home_url( '/' ), 302 );
exit;
