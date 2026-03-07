<?php
/**
 * Unrivaled Sports Theme Functions
 *
 * Phase 1: Static templates served through WordPress.
 * Phase 2: Convert to dynamic content with ACF fields.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'UNRIVALED_VERSION', '1.0.0' );

/**
 * Theme Setup
 */
function unrivaled_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script',
    ) );

    // Register nav menu (for future Phase 2 use)
    register_nav_menus( array(
        'primary'    => __( 'Primary Navigation', 'unrivaled' ),
        'footer'     => __( 'Footer Navigation', 'unrivaled' ),
    ) );
}
add_action( 'after_setup_theme', 'unrivaled_setup' );

/**
 * Remove default WordPress front-end clutter
 */
function unrivaled_cleanup() {
    remove_action( 'wp_head', 'wp_generator' );
    remove_action( 'wp_head', 'wlwmanifest_link' );
    remove_action( 'wp_head', 'rsd_link' );
    remove_action( 'wp_head', 'wp_shortlink_wp_head' );
    remove_action( 'wp_head', 'rest_output_link_wp_head' );
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );

    // Remove block library CSS (we don't use Gutenberg on the front end)
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-blocks-style' );
    wp_dequeue_style( 'global-styles' );
    wp_dequeue_style( 'classic-theme-styles' );
}
add_action( 'wp_enqueue_scripts', 'unrivaled_cleanup', 100 );

/**
 * Create required pages on theme activation and ensure templates are assigned.
 * Handles both fresh installs and re-activations after a revert.
 */
function unrivaled_create_pages() {
    $pages = array(
        'home' => array(
            'title'    => 'Home',
            'template' => 'front-page.php',
        ),
        'team' => array(
            'title'    => 'Team',
            'template' => 'page-team.php',
        ),
    );

    foreach ( $pages as $slug => $page ) {
        $existing = get_page_by_path( $slug );
        if ( $existing ) {
            $page_id = $existing->ID;
            // Ensure page is published (may have been trashed during revert)
            if ( $existing->post_status !== 'publish' ) {
                wp_update_post( array(
                    'ID'          => $page_id,
                    'post_status' => 'publish',
                ) );
            }
        } else {
            $page_id = wp_insert_post( array(
                'post_title'   => $page['title'],
                'post_name'    => $slug,
                'post_status'  => 'publish',
                'post_type'    => 'page',
                'post_content' => '',
            ) );
        }
        // Always (re)assign the template — this is the key fix for re-activations
        if ( $page_id && ! is_wp_error( $page_id ) ) {
            update_post_meta( $page_id, '_wp_page_template', $page['template'] );
        }
    }

    // Set front page display to static page
    $front = get_page_by_path( 'home' );
    if ( $front ) {
        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front->ID );
    }

    // Flush rewrite rules so /team/ permalink works immediately
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'unrivaled_create_pages' );

/**
 * Helper: get theme asset URL
 */
function unrivaled_asset( $path ) {
    return get_theme_file_uri( 'assets/' . ltrim( $path, '/' ) );
}

/**
 * Remove admin bar on front end (cleaner for static launch)
 */
add_filter( 'show_admin_bar', '__return_false' );
