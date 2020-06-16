<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#61-title
    |
    */

    'title' => '',
    'title_prefix' => 'DNA KOMPUTER ',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#62-favicon
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#63-logo
    |
    */

    'logo' => '<b>DNA</b> SYSTEM',
    'logo_img' => '',
    'logo_img_class' => '',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => '',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#64-user-menu
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => false,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => false,
    'usermenu_desc' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#65-layout
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => true,
    'layout_fixed_navbar' => true,
    'layout_fixed_footer' => null,

    /*
    |--------------------------------------------------------------------------
    | Extra Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#66-classes
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand-md',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#67-sidebar
    |
    */

    'sidebar_mini' => true,
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => true,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#68-control-sidebar-right-sidebar
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#69-urls
    |
    */

    'use_route_url' => false,

    'dashboard_url' => 'home',

    'logout_url' => 'logout',

    'login_url' => 'login',

    'register_url' => 'register',

    'password_reset_url' => 'password/reset',

    'password_email_url' => 'password/email',

    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#610-laravel-mix
    |
    */

    'enabled_laravel_mix' => false,

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#611-menu
    |
    */

    'menu' => [
        ['header' => 'favorite'],
        [
            'text' => 'blog',
            'url'  => 'admin/blog',
            'can'  => 'manage-blog',
        ],
        [
            'text'        => 'Dashboard',
            'url'         => 'admin/home',
            'icon'        => 'fas fa-fw fa-tachometer-alt mr-2',
        ],
        [
            'text'        => 'Transaksi',
            'url'         => 'admin/transaction/create',
            'icon'        => 'fas fa-fw fa-cash-register mr-2',
        ],
        [
            'text'        => 'Receive Services',
            'url'         => 'admin/service/create',
            'icon'        => 'fas fa-fw fa-tools mr-2',
            'label'       => 'soon',
            'label_color' => 'danger'
        ],
        ['header' => 'supply_chain_and_stock'],
        [
            'text'        => 'Supplier',
            'url'         => 'admin/supplier',
            'icon'        => 'fas fa-fw fa-truck-loading mr-2',
        ],
        [
            'text'        => 'Nota Masuk',
            'url'         => 'admin/entry-note',
            'icon'        => 'fas fa-fw fa-file-invoice mr-2',
        ],
        [
            'text'        => 'Stok Barang',
            'url'         => 'admin/items',
            'icon'        => 'fas fa-fw fa-boxes mr-2',
        ],
        [
            'text'        => 'Inventaris Barang',
            'url'         => 'admin/inventory',
            'icon'        => 'fas fa-fw fa-clipboard-list mr-2',
        ],
        ['header' => 'service_and_repair'],
        [
            'text'        => 'Service',
            'url'         => 'admin/service',
            'icon'        => 'fas fa-fw fa-toolbox mr-2',
            'label'       => 'soon',
            'label_color' => 'danger'
        ],
        [
            'text'        => 'Guarantee Services',
            'url'         => 'admin/service',
            'icon'        => 'fas fa-fw fa-house-user mr-2',
            'label'       => 'soon',
            'label_color' => 'danger'
        ],
        [
            'text'        => 'Online Services request',
            'url'         => 'admin/service',
            'icon'        => 'fas fa-fw fa-taxi mr-2',
            'label'       => 'soon',
            'label_color' => 'danger'
        ],
        [
            'text'        => 'Online Services delivery',
            'url'         => 'admin/service',
            'icon'        => 'fas fa-fw fa-truck mr-2',
            'label'       => 'soon',
            'label_color' => 'danger'
        ],
        ['header' => 'user_management'],
        [
            'text'        => 'Nota Keluar',
            'url'         => 'admin/transaction',
            'icon'        => 'fas fa-fw fa-receipt mr-2',
        ],
        [
            'text'        => 'Customer',
            'url'         => 'admin/customer',
            'icon'        => 'fas fa-fw fa-users mr-2',
        ],
        [
            'text'        => 'Pegawai',
            'url'         => 'admin/employee',
            'icon'        => 'fas fa-fw fa-users mr-2',
            'label'       => 'soon',
            'label_color' => 'danger'
        ],
        [
            'text'        => 'Job Desk And Acces',
            'url'         => 'admin/job_and_access',
            'icon'        => 'fas fa-fw fa-users mr-2',
            'label'       => 'soon',
            'label_color' => 'danger'
        ],
        ['header' => 'store_management'],
        [
            'text'        => 'Keuangan',
            'url'         => 'admin/accounting',
            'icon'        => 'fas fa-fw fa-file-invoice-dollar mr-2',
            'label'       => 'soon',
            'label_color' => 'danger'
        ],
        [
            'text'        => 'Kategori',
            'url'         => 'admin/category',
            'icon'        => 'fas fa-fw fa-file mr-2',
        ],
        ['header' => 'account_settings'],
        [
            'text' => 'profile',
            'url'  => 'admin/settings',
            'icon' => 'fas fa-fw fa-user',
            'label'       => 'soon',
            'label_color' => 'danger'
        ],
        [
            'text' => 'change_password',
            'url'  => 'admin/settings',
            'icon' => 'fas fa-fw fa-lock',
            'label'       => 'soon',
            'label_color' => 'danger'
        ],
        // [
        //     'text'    => 'multilevel',
        //     'icon'    => 'fas fa-fw fa-share',
        //     'submenu' => [
        //         [
        //             'text' => 'level_one',
        //             'url'  => '#',
        //         ],
        //         [
        //             'text'    => 'level_one',
        //             'url'     => '#',
        //             'submenu' => [
        //                 [
        //                     'text' => 'level_two',
        //                     'url'  => '#',
        //                 ],
        //                 [
        //                     'text'    => 'level_two',
        //                     'url'     => '#',
        //                     'submenu' => [
        //                         [
        //                             'text' => 'level_three',
        //                             'url'  => '#',
        //                         ],
        //                         [
        //                             'text' => 'level_three',
        //                             'url'  => '#',
        //                         ],
        //                     ],
        //                 ],
        //             ],
        //         ],
        //         [
        //             'text' => 'level_one',
        //             'url'  => '#',
        //         ],
        //     ],
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#612-menu-filters
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SubmenuFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#613-plugins
    |
    */

    'plugins' => [
        [
            'name' => 'Datatables',
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        [
            'name' => 'Select2',
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        [
            'name' => 'Chartjs',
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        [
            'name' => 'Sweetalert2',
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        [
            'name' => 'Pace',
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],
];
