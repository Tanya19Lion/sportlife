<?php

    add_action('after_setup_theme', 'si_setup');
    add_action('wp_enqueue_scripts', 'si_scripts');

    add_filter('show_admin_bar', '__return_false');

    function si_setup() {
        add_theme_support('custom-logo');
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
    }

    function si_scripts() {
        wp_enqueue_script('js', get_template_directory_uri() . '/assets/js/js.js', [], '1.0', true);
        wp_enqueue_style('si-style', get_template_directory_uri() . '/assets/css/styles.css', [], '1.0', 'all');
    }

    function _si_assets_path($path) {
        return get_template_directory_uri() . '/assets/' . $path;
    }