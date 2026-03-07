<?php
/**
 * Default template fallback.
 *
 * WordPress requires index.php to exist. In this theme every page
 * has its own template (front-page.php, page-team.php), so reaching
 * this file means something unexpected happened. Load front-page.php
 * as a safe fallback instead of blindly redirecting (which masks errors).
 */
if ( is_front_page() || is_home() ) {
    get_template_part( 'front-page' );
} else {
    // For any other request, load the generic page template
    get_template_part( 'page' );
}
