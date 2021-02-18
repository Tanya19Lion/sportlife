<?php

    $widgets = [
        'widget-text.php',
        'widget-contacts.php',
        'widget-social.php',
        'widget-iframe.php',
        'widget-info.php'
    ];

    foreach ($widgets as $widget) {
        require_once(__DIR__ . '/inc/' . $widget);
    }

    add_action('after_setup_theme', 'si_setup');
    add_action('wp_enqueue_scripts', 'si_scripts');
    add_action( 'widgets_init', 'si_register' );
    add_shortcode('si-paste-link', 'si_paste_link');

    add_filter('show_admin_bar', '__return_false');
    add_filter('si_widget_text', 'do_shortcode');

    function si_setup() {
        register_nav_menu('menu-header', 'Меню в хедері');
        register_nav_menu('menu-footer', 'Меню в футері');

        add_theme_support('custom-logo');
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        //add_theme_support('menus');
    }

    function si_scripts() {
        wp_enqueue_script('js', _si_assets_path('js/js.js'), [], '1.0', true);
        wp_enqueue_style('si-style', _si_assets_path('css/styles.css'), [], '1.0', 'all');
    }

    function si_register() {
        register_sidebar([
            'name' => 'Contacts in header',
            'id' => 'si-header',
            'before_widget' => null,
            'after_widget'  => null
        ]);

        register_sidebar([
            'name' => 'Contacts in footer',
            'id' => 'si-footer',
            'before_widget' => null,
            'after_widget'  => null
        ]);

        register_sidebar([
            'name' => 'Sidebar in footer 1',
            'id' => 'si-footer-column-1',
            'before_widget' => null,
            'after_widget'  => null
        ]);

        register_sidebar([
            'name' => 'Sidebar in footer 2',
            'id' => 'si-footer-column-2',
            'before_widget' => null,
            'after_widget'  => null
        ]);

        register_sidebar([
            'name' => 'Sidebar in footer 3',
            'id' => 'si-footer-column-3',
            'before_widget' => null,
            'after_widget'  => null
        ]);

        register_sidebar([
            'name' => 'Contacts-page map',
            'id' => 'si-map',
            'before_widget' => null,
            'after_widget'  => null
        ]);

        register_sidebar([
            'name' => 'Contacts-page under map info',
            'id' => 'si-under-map',
            'before_widget' => null,
            'after_widget'  => null
        ]);

        register_widget('si_widget_text');
        register_widget('si_widget_contacts');
        register_widget('si_widget_social');
        register_widget('si_widget_iframe');
        register_widget('si_widget_info');

    }

    function si_paste_link($attr) {
        $params = shortcode_atts([
            'link' => '',
            'text' => '',
            'type' => 'link'
        ], $attr);

        $params['text'] = $params['text'] ? $params['text'] : $params['link'];
        if ($params['link']) {
            $protocol  = '';

            switch($params['type']) {
                case 'email':
                    $protocol = 'mailto:';
                    break;
                case 'phone':
                    $protocol = 'tel:';
                    $params['link'] = preg_replace('/[^+0-9]/', '', $params['link']); 
                    break;
                default: 
                    $protocol = '';
                    break;
            }
            $link = $protocol . $params['link'];
            $text = $params['text'];

            return "<a href=\"${link}\">${text}</a>";
        } else {
            return '';
        }
    }

    function _si_assets_path($path) {
        return get_template_directory_uri() . '/assets/' . $path;
    }

    // Если у вас возникли вопросы, пожалуйста свяжитесь с нами по почте [si-paste-link link="sportisland@mail.ru" type="email"]