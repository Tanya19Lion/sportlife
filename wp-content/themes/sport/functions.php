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
    add_action('widgets_init', 'si_register' );
    add_action('init', 'si_register_types');
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

    function si_register_types() {

        register_post_type('services', [
            'labels' => [
                'name'               => 'Услуги', // основное название для типа записи
                'singular_name'      => 'Послуга', // название для одной записи этого типа
                'add_new'            => 'Додати нову послугу', // для добавления новой записи
                'add_new_item'       => 'Додати нову послугу', // заголовка у вновь создаваемой записи в админ-панели.
                'edit_item'          => 'Редагувати послугу', // для редактирования типа записи
                'new_item'           => 'Нова послуга', // текст новой записи
                'view_item'          => 'Дивитись послуги', // для просмотра записи этого типа.
                'search_items'       => 'Шукати послуги', // для поиска по этим типам записи
                'not_found'          => 'Не знайдено', // если в результате поиска ничего не было найдено
                'not_found_in_trash' => 'Не знайдено в корзині', // если не было найдено в корзине
                'parent_item_colon'  => '', // для родителей (у древовидных типов)
                'menu_name'          => 'Послуги', // название меню
            ],
            'public'              => true,
            'menu_position'       => 20,
            'menu_icon'           => 'dashicons-smiley', 
            'hierarchical'        => false,
            'supports'            => ['title'],
            'has_archive' => true
        ]);

        register_post_type('trainers', [
            'labels' => [
                'name'               => 'Тренеры', // основное название для типа записи
                'singular_name'      => 'Тренер', // название для одной записи этого типа
                'add_new'            => 'Додати нового тренера', // для добавления новой записи
                'add_new_item'       => 'Додати нового тренера', // заголовка у вновь создаваемой записи в админ-панели.
                'edit_item'          => 'Редагувати тренера', // для редактирования типа записи
                'new_item'           => 'Новий тренер', // текст новой записи
                'view_item'          => 'Дивитись тренера', // для просмотра записи этого типа.
                'search_items'       => 'Шукати тренера', // для поиска по этим типам записи
                'not_found'          => 'Не знайдено', // если в результате поиска ничего не было найдено
                'not_found_in_trash' => 'Не знайдено в корзині', // если не было найдено в корзине
                'parent_item_colon'  => '', // для родителей (у древовидных типов)
                'menu_name'          => 'Тренери', // название меню
            ],
            'public'              => true,
            'menu_position'       => 20,
            'menu_icon'           => 'dashicons-groups', 
            'hierarchical'        => false,
            'supports'            => ['title'],
            'has_archive' => true
        ]);

        register_post_type('schedule', [
            'labels' => [
                'name'               => 'Расписание', // основное название для типа записи
                'singular_name'      => 'Заняття', // название для одной записи этого типа
                'add_new'            => 'Додати нове заняття', // для добавления новой записи
                'add_new_item'       => 'Додати нове заняття', // заголовка у вновь создаваемой записи в админ-панели.
                'edit_item'          => 'Редагувати заняття', // для редактирования типа записи
                'new_item'           => 'Нова заняття', // текст новой записи
                'view_item'          => 'Дивитись заняття', // для просмотра записи этого типа.
                'search_items'       => 'Шукати заняття', // для поиска по этим типам записи
                'not_found'          => 'Не знайдено', // если в результате поиска ничего не было найдено
                'not_found_in_trash' => 'Не знайдено в корзині', // если не было найдено в корзине
                'parent_item_colon'  => '', // для родителей (у древовидных типов)
                'menu_name'          => 'Заняття', // название меню
            ],
            'public'              => true,
            'menu_position'       => 20,
            'menu_icon'           => 'dashicons-universal-access-alt', 
            'hierarchical'        => false,
            'supports'            => ['title'],
            'has_archive' => true
        ]);
        
        register_post_type('prices', [
            'labels' => [
                'name'               => 'Цены', // основное название для типа записи
                'singular_name'      => 'Ціна', // название для одной записи этого типа
                'add_new'            => 'Додати нову ціну', // для добавления новой записи
                'add_new_item'       => 'Додати нову ціну', // заголовка у вновь создаваемой записи в админ-панели.
                'edit_item'          => 'Редагувати ціну', // для редактирования типа записи
                'new_item'           => 'Нова ціна', // текст новой записи
                'view_item'          => 'Дивитись ціни', // для просмотра записи этого типа.
                'search_items'       => 'Шукати ціни', // для поиска по этим типам записи
                'not_found'          => 'Не знайдено', // если в результате поиска ничего не было найдено
                'not_found_in_trash' => 'Не знайдено в корзині', // если не было найдено в корзине
                'parent_item_colon'  => '', // для родителей (у древовидных типов)
                'menu_name'          => 'Ціни', // название меню
            ],
            'public'              => true,
            'menu_position'       => 20,
            'menu_icon'           => 'dashicons-text-page', 
            'hierarchical'        => false,
            'supports'            => ['title'],
            'has_archive' => true
        ]);

        register_post_type('cards', [
            'labels' => [
                'name'               => 'Клубные карты', // основное название для типа записи
                'singular_name'      => 'Клубна карта', // название для одной записи этого типа
                'add_new'            => 'Додати нову карту', // для добавления новой записи
                'add_new_item'       => 'Додати нову карту', // заголовка у вновь создаваемой записи в админ-панели.
                'edit_item'          => 'Редагувати карту', // для редактирования типа записи
                'new_item'           => 'Нова клубна карта', // текст новой записи
                'view_item'          => 'Дивитись карти', // для просмотра записи этого типа.
                'search_items'       => 'Шукати карти', // для поиска по этим типам записи
                'not_found'          => 'Не знайдено', // если в результате поиска ничего не было найдено
                'not_found_in_trash' => 'Не знайдено в корзині', // если не было найдено в корзине
                'parent_item_colon'  => '', // для родителей (у древовидных типов)
                'menu_name'          => 'Клубні карти', // название меню
            ],
            'public'              => true,
            'menu_position'       => 20,
            'menu_icon'           => 'dashicons-tickets-alt', 
            'hierarchical'        => false,
            'supports'            => ['title'],
            'has_archive' => false
        ]);

        register_taxonomy('schedule-days', ['schedule'], [
            'labels'                => [
                'name'              => 'Дні тижня',
                'singular_name'     => 'День',
                'search_items'      => 'Знайти день тижня',
                'all_items'         => 'Всі дні тижня',
                'view_item '        => 'Подивитись дні тижня',
                'edit_item'         => 'Редагувати дні тижня',
                'update_item'       => 'Обновити',
                'add_new_item'      => 'Додати дні тижня',
                'new_item_name'     => 'Додати дні тижня',
                'menu_name'         => 'Всі дні тижня',
            ],
            'description'           => '',
            'public'                => true,
            'hierarchical'          => true
        ]);

        register_taxonomy('places', ['schedule'], [
            'labels'                => [
                'name'              => 'Тренажерні зали',
                'singular_name'     => 'Тренажерний зал',
                'search_items'      => 'Знайти зал',
                'all_items'         => 'Всі тренажерні зали',
                'view_item '        => 'Подивитись зали',
                'edit_item'         => 'Редагувати зали',
                'update_item'       => 'Обновити',
                'add_new_item'      => 'Додати тернажерні зали',
                'new_item_name'     => 'Додати тренажерні зали',
                'menu_name'         => 'Всі тренажерні зали',
            ],
            'description'           => '',
            'public'                => true,
            'hierarchical'          => true
        ]);
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