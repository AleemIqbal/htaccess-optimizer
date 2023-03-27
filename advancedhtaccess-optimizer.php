<?php
/*
Plugin Name: Advanced Htaccess Optimizer & Editor
Plugin URI: https://www.bigtechies.com/
Description: The Advanced Htacess Optimizer & Editor is a WordPress plugin that helps website owners optimize their .htaccess file for improved website speed and security. The plugin includes speed optimization features like Gzip compression, browser caching, and removal of query strings from static resources.
Version: 1.0
Author: Big Techies
Author URI: https://www.bigtechies.com/robotstxt-optimizer-plugin/
*/
function advancedhtaccessoptimizer_styles() {
    wp_enqueue_style( 'htaccessstyles', plugins_url( '/htaccessoptimizer-style.css', __FILE__ ), array(), '1.0.0', 'all' );
}
add_action( 'admin_enqueue_scripts', 'advancedhtaccessoptimizer_styles' );

function advancedhtaccessoptimizer_scripts() {
    wp_enqueue_script( 'htaccessscripts', plugins_url( '/htaccessoptimizer-java.js', __FILE__ ), array(), '1.0', true );
}
add_action('admin_enqueue_scripts', 'advancedhtaccessoptimizer_scripts');

// Remove query string from static resources
function advancedhtaccessoptimizer_remove_cssjs_ver($src) {
    if (get_option('advancedhtaccessoptimizer_enable_querystrings') == 1) {
        if (strpos($src, '?ver=') !== false) {
            $src = remove_query_arg('ver', $src);
        }
    }
    return esc_url_raw($src);
}

add_filter('style_loader_src', 'advancedhtaccessoptimizer_remove_cssjs_ver', 10, 2);
add_filter('script_loader_src', 'advancedhtaccessoptimizer_remove_cssjs_ver', 10, 2);

function advancedhtaccessoptimizer_disable_plugin_theme_editor() {
    $disable_editor_option = get_option('advancedhtaccessoptimizer_disable_plugin_theme_editor');

    if ($disable_editor_option && $disable_editor_option == 1) {
        define('DISALLOW_FILE_EDIT', true);
        remove_submenu_page('themes.php', 'theme-editor.php');
        remove_submenu_page('plugins.php', 'plugin-editor.php');
    }
}

add_action('admin_menu', 'advancedhtaccessoptimizer_disable_plugin_theme_editor', 1);

function advancedhtaccessoptimizer_create_wp_content_htaccess() {
    $htaccess_file1 = WP_CONTENT_DIR . '/.htaccess';
    $htaccess_content1 = "<Files *.php>\ndeny from all\n</Files>";

    $disable_php_option = get_option('advancedhtaccessoptimizer_disable_wpcontent_php');
    $disable_php_option = filter_var($disable_php_option, FILTER_VALIDATE_BOOLEAN);

    if ($disable_php_option) {
        if (!file_exists($htaccess_file1)) {
            @file_put_contents($htaccess_file1, $htaccess_content1);
        }
    } else {
        if (file_exists($htaccess_file1)) {
            @unlink($htaccess_file1);
        }
    }
}

add_action('init', 'advancedhtaccessoptimizer_create_wp_content_htaccess');
function advancedhtaccessoptimizer_create_wp_includes_htaccess() {
    if (defined('ABSPATH')) {
        $htaccess_file2 = ABSPATH . 'wp-includes/.htaccess';
    }
    $htaccess_content2 = "<Files *.php>\ndeny from all\n</Files>";

    $disable_includes_php_option = get_option('advancedhtaccessoptimizer_disable_includes_php');
    $disable_includes_php_option = filter_var($disable_includes_php_option, FILTER_VALIDATE_BOOLEAN);

    if ($disable_includes_php_option) {
        if (!file_exists($htaccess_file2)) {
            @file_put_contents($htaccess_file2, $htaccess_content2);
        }
    } else {
        if (file_exists($htaccess_file2)) {
            @unlink($htaccess_file2);
        }
    }
}

add_action('init', 'advancedhtaccessoptimizer_create_wp_includes_htaccess');

function advancedhtaccessoptimizer_create_wp_uploads_htaccess() {
    if (defined('ABSPATH')) {
        $htaccess_file3 = ABSPATH . 'wp-content/uploads/.htaccess';
    }
    $htaccess_content3 = "<Files *.php>\ndeny from all\n</Files>";

    $disable_uploads_php_option = get_option('advancedhtaccessoptimizer_disable_uploads_php');
    $disable_uploads_php_option = filter_var($disable_uploads_php_option, FILTER_VALIDATE_BOOLEAN);

    if ($disable_uploads_php_option) {
        if (!file_exists($htaccess_file3)) {
            @file_put_contents($htaccess_file3, $htaccess_content3);
        }
    } else {
        if (file_exists($htaccess_file3)) {
            @unlink($htaccess_file3);
        }
    }
}

add_action('init', 'advancedhtaccessoptimizer_create_wp_uploads_htaccess');

if (is_ssl()) {
function advancedhtaccessoptimizer_replace_http_with_https($content) {
$disable_mixed_content_option = get_option('advancedhtaccessoptimizer_disable_mixed_content');
$disable_mixed_content_option = filter_var($disable_mixed_content_option, FILTER_VALIDATE_BOOLEAN);
if ($disable_mixed_content_option) {
  $content = str_replace("http://", "https://", $content);
}

return $content;
}

add_filter('the_content', 'advancedhtaccessoptimizer_replace_http_with_https');
add_filter('content_url', 'advancedhtaccessoptimizer_replace_http_with_https');
add_filter('plugins_url', 'advancedhtaccessoptimizer_replace_http_with_https');
add_filter('site_url', 'advancedhtaccessoptimizer_replace_http_with_https');
add_filter('stylesheet_directory_uri', 'advancedhtaccessoptimizer_replace_http_with_https');
add_filter('template_directory_uri', 'advancedhtaccessoptimizer_replace_http_with_https');
}

function advancedhtaccessoptimizer_custom_login_error_messages() {
if (get_option('advancedhtaccessoptimizer_prevent_exposed_login_feedback') == 1) {
$error_message = esc_html__('ERROR', 'advancedhtaccessoptimizer');
$invalid_login_message = esc_html__('Invalid login credentials.', 'advancedhtaccessoptimizer');
return '<strong>' . $error_message . '</strong>: ' . $invalid_login_message;
}
}

function advancedhtaccessoptimizer_clear_login_details_js() {
$user_login_id = esc_attr('user_login');
$user_email_id = esc_attr('user_email');
$script = '<script>document.getElementById("' . $user_login_id . '").value="";document.getElementById("' . $user_email_id . '").value="";</script>';
echo $script;
}

function advancedhtaccessoptimizer_clear_login_details() {
    if (get_option('advancedhtaccessoptimizer_prevent_exposed_login_feedback') == 1) {
      add_action('login_head', 'advancedhtaccessoptimizer_clear_login_details_js');
      add_filter('login_errors', 'advancedhtaccessoptimizer_custom_login_error_messages');
    }
  }

add_action('login_head', 'advancedhtaccessoptimizer_clear_login_details');

include_once(plugin_dir_path(__FILE__) . "/includes/htaccessincludes.php");
include_once(plugin_dir_path(__FILE__) . "/includes/htaccess-optimizer.php");