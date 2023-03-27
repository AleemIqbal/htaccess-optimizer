<?php

add_action('admin_menu', 'advancedhtaccessoptimizer_settings');
function advancedhtaccessoptimizer_settings()
{
    add_menu_page(
        'Htaccess Optimization', // page title
        'Htaccess Optimization', // menu title
        'manage_options', // capability
        'my-theme-settings-htaccess', // menu slug
        'advancedhtaccessoptimizer_settings_htaccess_page' // callback function
    );
}

