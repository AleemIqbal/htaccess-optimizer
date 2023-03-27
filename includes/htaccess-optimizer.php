<?php
function advancedhtaccessoptimizer_settings_htaccess_page()
{
  
  // Check if the user has the required permissions
if ( ! current_user_can( 'manage_options' ) ) {
  wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
  }
  if ( isset( $_POST['htaccess_content'] ) && wp_verify_nonce( $_POST['_wpnonce'], 'update_htaccess_settings' ) ) {
    file_put_contents(ABSPATH . '.htaccess', stripslashes($_POST['htaccess_content']));
    // Sanitize and validate POST data
    $theme_filter_ip = isset($_POST['advancedhtaccessoptimizer_theme_filter_ip']) ? sanitize_text_field($_POST['advancedhtaccessoptimizer_theme_filter_ip']) : '';
    $block_india = isset($_POST['advancedhtaccessoptimizer_block_india']) ? sanitize_text_field($_POST['advancedhtaccessoptimizer_block_india']) : '';
    $block_bangladesh = isset($_POST['advancedhtaccessoptimizer_bangladesh']) ? sanitize_text_field($_POST['advancedhtaccessoptimizer_bangladesh']) : '';
    $block_pakistan = isset($_POST['advancedhtaccessoptimizer_block_pakistan']) ? sanitize_text_field($_POST['advancedhtaccessoptimizer_block_pakistan']) : '';
    $enable_gzip = isset($_POST['advancedhtaccessoptimizer_enable_gzip']) ? sanitize_text_field($_POST['advancedhtaccessoptimizer_enable_gzip']) : '';
    $enable_trailing = isset($_POST['advancedhtaccessoptimizer_enable_trailing']) ? sanitize_text_field($_POST['advancedhtaccessoptimizer_enable_trailing']) : '';
    $redirect_feed = isset($_POST['advancedhtaccessoptimizer_redirect_feed']) ? sanitize_text_field($_POST['advancedhtaccessoptimizer_redirect_feed']) : '';

// Sanitize and validate POST data
$enable_caching = isset($_POST['advancedhtaccessoptimizer_enable_caching']) ? sanitize_text_field($_POST['advancedhtaccessoptimizer_enable_caching']) : '';
$enable_querystrings = isset($_POST['advancedhtaccessoptimizer_enable_querystrings']) ? sanitize_text_field($_POST['advancedhtaccessoptimizer_enable_querystrings']) : '';
$disable_xmlrpc = isset($_POST['advancedhtaccessoptimizer_disable_xmlrpc']) ? sanitize_text_field($_POST['advancedhtaccessoptimizer_disable_xmlrpc']) : '';
$enable_securityheaders = isset($_POST['advancedhtaccessoptimizer_enable_securityheaders']) ? sanitize_text_field($_POST['advancedhtaccessoptimizer_enable_securityheaders']) : '';
$disable_directorybrowsing = isset($_POST['advancedhtaccessoptimizer_disable_directorybrowsing']) ? sanitize_text_field($_POST['advancedhtaccessoptimizer_disable_directorybrowsing']) : '';
$enable_httpsredirect = isset($_POST['advancedhtaccessoptimizer_enable_httpsredirect']) ? sanitize_text_field($_POST['advancedhtaccessoptimizer_enable_httpsredirect']) : '';
$disable_uploads_php = isset($_POST['advancedhtaccessoptimizer_disable_uploads_php']) ? sanitize_text_field($_POST['advancedhtaccessoptimizer_disable_uploads_php']) : '';
$disable_includes_php = isset($_POST['advancedhtaccessoptimizer_disable_includes_php']) ? sanitize_text_field($_POST['advancedhtaccessoptimizer_disable_includes_php']) : '';
$disable_wpcontent_php = isset($_POST['advancedhtaccessoptimizer_disable_wpcontent_php']) ? sanitize_text_field($_POST['advancedhtaccessoptimizer_disable_wpcontent_php']) : '';
$disable_user_enumeration = isset($_POST['advancedhtaccessoptimizer_disable_user_enumeration']) ? sanitize_text_field($_POST['advancedhtaccessoptimizer_disable_user_enumeration']) : '';
$disable_plugin_theme_editor = isset($_POST['advancedhtaccessoptimizer_disable_plugin_theme_editor']) ? sanitize_text_field($_POST['advancedhtaccessoptimizer_disable_plugin_theme_editor']) : '';
$prevent_exposed_login_feedback = isset($_POST['advancedhtaccessoptimizer_prevent_exposed_login_feedback']) ? sanitize_text_field($_POST['advancedhtaccessoptimizer_prevent_exposed_login_feedback']) : '';
$disable_mixed_content = isset($_POST['advancedhtaccessoptimizer_disable_mixed_content']) ? sanitize_text_field($_POST['advancedhtaccessoptimizer_disable_mixed_content']) : '';

    // Escape and update options in the database
    update_option('advancedhtaccessoptimizer_theme_filter_ip', esc_attr($theme_filter_ip));
    update_option('advancedhtaccessoptimizer_block_india', esc_attr($block_india));
    update_option('advancedhtaccessoptimizer_bangladesh', esc_attr($block_bangladesh));
    update_option('advancedhtaccessoptimizer_block_pakistan', esc_attr($block_pakistan));
    update_option('advancedhtaccessoptimizer_enable_gzip', esc_attr($enable_gzip));
    update_option('advancedhtaccessoptimizer_enable_trailing', esc_attr($enable_trailing));
    update_option('advancedhtaccessoptimizer_redirect_feed', esc_attr($redirect_feed));

// Escape and update options in the database
update_option('advancedhtaccessoptimizer_enable_caching', esc_attr($enable_caching));
update_option('advancedhtaccessoptimizer_enable_querystrings', esc_attr($enable_querystrings));
update_option('advancedhtaccessoptimizer_disable_xmlrpc', esc_attr($disable_xmlrpc));
update_option('advancedhtaccessoptimizer_enable_securityheaders', esc_attr($enable_securityheaders));
update_option('advancedhtaccessoptimizer_disable_directorybrowsing', esc_attr($disable_directorybrowsing));
update_option('advancedhtaccessoptimizer_enable_httpsredirect', esc_attr($enable_httpsredirect));
update_option('advancedhtaccessoptimizer_disable_uploads_php', esc_attr($disable_uploads_php));
update_option('advancedhtaccessoptimizer_disable_includes_php', esc_attr($disable_includes_php));
update_option('advancedhtaccessoptimizer_disable_wpcontent_php', esc_attr($disable_wpcontent_php));
update_option('advancedhtaccessoptimizer_disable_user_enumeration', esc_attr($disable_user_enumeration));
update_option('advancedhtaccessoptimizer_disable_plugin_theme_editor', esc_attr($disable_plugin_theme_editor));
update_option('advancedhtaccessoptimizer_prevent_exposed_login_feedback', esc_attr($prevent_exposed_login_feedback));
update_option('advancedhtaccessoptimizer_disable_mixed_content', esc_attr($disable_mixed_content));

if ( isset( $_POST['advancedhtaccessoptimizer_enable_trailing'] ) ) {
  $advancedhtaccessoptimizer_enable_trailing = sanitize_text_field( $_POST['advancedhtaccessoptimizer_enable_trailing'] );
  update_option( 'advancedhtaccessoptimizer_enable_trailing', $advancedhtaccessoptimizer_enable_trailing );
}
  }

  $htaccess_content = file_get_contents(ABSPATH . '.htaccess');
  $advancedhtaccessoptimizer_theme_filter_ip = get_option('advancedhtaccessoptimizer_theme_filter_ip', false);
  $advancedhtaccessoptimizer_block_india = get_option('advancedhtaccessoptimizer_block_india', false);
  $advancedhtaccessoptimizer_bangladesh = get_option('advancedhtaccessoptimizer_bangladesh', false);
  $advancedhtaccessoptimizer_block_pakistan = get_option('advancedhtaccessoptimizer_block_pakistan', false);
  $advancedhtaccessoptimizer_enable_gzip = get_option('advancedhtaccessoptimizer_enable_gzip', false);
  $advancedhtaccessoptimizer_redirect_feed = get_option('advancedhtaccessoptimizer_redirect_feed', false);
  $advancedhtaccessoptimizer_enable_trailing = get_option('advancedhtaccessoptimizer_enable_trailing', false);
  $advancedhtaccessoptimizer_enable_caching = get_option('advancedhtaccessoptimizer_enable_caching', false);
  $advancedhtaccessoptimizer_enable_querystrings = get_option('advancedhtaccessoptimizer_enable_querystrings', false);
  $advancedhtaccessoptimizer_disable_directorybrowsing = get_option('advancedhtaccessoptimizer_disable_directorybrowsing', false);
  $advancedhtaccessoptimizer_enable_securityheaders = get_option('advancedhtaccessoptimizer_enable_securityheaders', false);
  $advancedhtaccessoptimizer_enable_httpsredirect = get_option('advancedhtaccessoptimizer_enable_httpsredirect', false);
  $advancedhtaccessoptimizer_disable_xmlrpc = get_option('advancedhtaccessoptimizer_disable_xmlrpc', false);
  $advancedhtaccessoptimizer_disable_uploads_php = get_option('advancedhtaccessoptimizer_disable_uploads_php', false);
  $advancedhtaccessoptimizer_disable_includes_php = get_option('advancedhtaccessoptimizer_disable_includes_php', false);
  $advancedhtaccessoptimizer_disable_wpcontent_php = get_option('advancedhtaccessoptimizer_disable_wpcontent_php', false);
  $advancedhtaccessoptimizer_disable_user_enumeration = get_option('advancedhtaccessoptimizer_disable_user_enumeration', false);
  $advancedhtaccessoptimizer_disable_plugin_theme_editor = get_option('advancedhtaccessoptimizer_disable_plugin_theme_editor', false);
  $advancedhtaccessoptimizer_prevent_exposed_login_feedback = get_option('advancedhtaccessoptimizer_prevent_exposed_login_feedback', false);
  $advancedhtaccessoptimizer_disable_mixed_content = get_option('advancedhtaccessoptimizer_disable_mixed_content', false);
?>

  <div class="wrap htaccess-optimizer-settings robots-optimizaiton">
    <h1 class="htaccess-optimizer-settings-title">.Htaccess Optimization</h1>
    <form method="post" action="">
    <?php wp_nonce_field( 'update_htaccess_settings' ); ?>
      <div class="htaccess-optimizer-settings-box sticky-textarea">
        <textarea id="htaccess_content" name="htaccess_content"><?php  echo  $htaccess_content ?></textarea>
      </div>

      <div class="htaccess-optimizer-settings-box">
        <div class="htaccess-optimizer-settings-box__column">
          <h3>Speed Optimizations</h3>
          <p>Optimizing the .htaccess file is a crucial step in improving the speed of a website. One optimization is to enable Gzip compression, which reduces the amount of data sent from the server to the client. This results in faster page load times for users. Another optimization is to enable browser caching. This allows the client's browser to store elements of the website, such as images, CSS and JavaScript files, so that they can be reused on subsequent page loads. This improves the overall speed of the website. Lastly, removing query strings from static resources can also improve caching and speed. By doing so, you can prevent certain proxy caches from not caching a page, allowing for a faster and more efficient browsing experience for users.</p>
        </div>
        <div class="htaccess-optimizer-settings-box__column">
          <table class="form-table">
            <tbody>
              <tr>
                <th scope="row">
                  Enable Gzip Compression
                  <p>Enable Gzip compression in .htaccess to reduce data sent from server and improve page load times.<br />
                  </p>
                </th>
                <td>
                <input type="checkbox" name="<?php echo esc_attr( 'advancedhtaccessoptimizer_enable_gzip' ); ?>" id="<?php echo esc_attr( 'advancedhtaccessoptimizer_enable_gzip' ); ?>" value="1" <?php checked( $advancedhtaccessoptimizer_enable_gzip ); ?> onclick="change_htaccess_text( this.getAttribute( 'id' ) , this.checked )" />
                </td>
              </tr>
              <tr>
                <th scope="row">
                  Enable Browser Caching
                  <p>Enable browser caching in .htaccess to allow client's browser to reuse website elements for faster page loads.<br />
                  </p>
                </th>
                <td>
                  <input type="checkbox" name="<?php echo esc_attr( 'advancedhtaccessoptimizer_enable_caching' ); ?>" id="<?php echo esc_attr( 'advancedhtaccessoptimizer_enable_caching' ); ?>" value="1" <?php checked($advancedhtaccessoptimizer_enable_caching ); ?> onclick="change_htaccess_text(this.getAttribute('id') , this.checked)" />
                </td>
              </tr>
              <tr>
                <th scope="row">
                  Enable Remove Query Strings from Static Resources
                  <p>Remove query strings from static resources to improve caching and speed.<br />
                  </p>
                </th>
                <td>
                  <input type="checkbox" name="<?php echo esc_attr( 'advancedhtaccessoptimizer_enable_querystrings' ); ?>" id="<?php echo esc_attr( 'advancedhtaccessoptimizer_enable_querystrings' ); ?>" value="1" <?php checked($advancedhtaccessoptimizer_enable_querystrings ); ?> onclick="change_htaccess_text(this.getAttribute('id') , this.checked)" />
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="htaccess-optimizer-settings-box">
        <div class="htaccess-optimizer-settings-box__column">
          <h3>Security Optimizations</h3>
          <p>To secure your website, you can use .htaccess file for security optimizations. These include: Cross-Site Scripting (XSS) protection by adding "Content-Security-Policy" header to allow only same-domain scripts, HTTPS Strict Transport Security (HSTS) by adding "Strict-Transport-Security" header, Frame Busting by adding "X-Frame-Options" header with value "DENY" and Referrer Policy by adding "Referrer-Policy" header with value "no-referrer-when-downgrade".</p>
        </div>
        <div class="htaccess-optimizer-settings-box__column">
          <table class="form-table">
            <tbody>
              <tr>
                <th scope="row">
                  Disable Directory Browsing
                  <p>Disabling directory browsing in .htaccess prevents unauthorized access to the directory structure of a website, making it more secure. It also prevents sensitive information from being displayed to the public.<br />
                  </p>
                </th>
                <td>
                  <input type="checkbox" name="<?php echo esc_attr( 'advancedhtaccessoptimizer_disable_directorybrowsing' ); ?>" id="<?php echo esc_attr( 'advancedhtaccessoptimizer_disable_directorybrowsing' ); ?>" value="1" <?php checked($advancedhtaccessoptimizer_disable_directorybrowsing ); ?> onclick="change_htaccess_text(this.getAttribute('id') , this.checked)" />
                </td>
              </tr>
              <tr>
                <th scope="row">
                  Trailing Slash
                  <p>You can redirect to either trailing slash or non trailing slash structure using .htaccess file
                  </p>
                </th>
                <td>
                <div class="htaccess-optimizer-settings-box__radio-btns">
                 <input type="radio" onclick="change_htaccess_text(this.getAttribute('name'),this.getAttribute('value'))" <?php echo esc_attr( 'advancedhtaccessoptimizer_enable_trailing' ); ?>" id="<?php echo esc_attr( 'advancedhtaccessoptimizer_enable_trailing_1' ); ?>" value="1" <?php checked(1, sanitize_text_field(esc_attr($advancedhtaccessoptimizer_enable_trailing)), true); ?> />
                  <label for="advancedhtaccessoptimizer_enable_trailing_1">Trailing Slash</label>
                  <input type="radio" onclick="change_htaccess_text(this.getAttribute('name'),this.getAttribute('value'))" <?php echo esc_attr( 'advancedhtaccessoptimizer_enable_trailing' ); ?>" id="<?php echo esc_attr( 'advancedhtaccessoptimizer_enable_trailing_2' ); ?>" value="2" <?php checked(2, sanitize_text_field(esc_attr($advancedhtaccessoptimizer_enable_trailing)), true); ?> />
                  <label for="advancedhtaccessoptimizer_enable_trailing_2">No /</label>
                  <input type="radio" onclick="change_htaccess_text(this.getAttribute('name'),this.getAttribute('value'))" <?php echo esc_attr( 'advancedhtaccessoptimizer_enable_trailing' ); ?>" id="<?php echo esc_attr( 'advancedhtaccessoptimizer_enable_trailing_3' ); ?>" value="3" <?php checked(3, sanitize_text_field(esc_attr($advancedhtaccessoptimizer_enable_trailing)), true); ?> <?php echo (!$advancedhtaccessoptimizer_enable_trailing) ? 'checked' : '' ?> />
                  <label for="advancedhtaccessoptimizer_enable_trailing_3">Disable</label>
                </div>
                </td>
              </tr>
              <tr>
                <th scope="row">
                  Add Security Headers
                  <p>Add Security Headers to prevent attacks on website.<br />
                  </p>
                </th>
                <td>
                  <input type="checkbox" name="<?php echo esc_attr( 'advancedhtaccessoptimizer_enable_securityheaders' ); ?>" id="<?php echo esc_attr( 'advancedhtaccessoptimizer_enable_securityheaders' ); ?>" value="1" <?php checked($advancedhtaccessoptimizer_enable_securityheaders ); ?> onclick="change_htaccess_text(this.getAttribute('id') , this.checked)" />
                </td>
              </tr>
              <tr>
                <th scope="row">
                  Enable HTTPS Redirect
                  <p>Enable HTTPS Redirect by adding preferred version.<br />
                  </p>
                </th>
                <td>
                  <input type="checkbox" name="<?php echo esc_attr( 'advancedhtaccessoptimizer_enable_httpsredirect' ); ?>" id="<?php echo esc_attr( 'advancedhtaccessoptimizer_enable_httpsredirect' ); ?>" value="1" <?php checked($advancedhtaccessoptimizer_enable_httpsredirect ); ?> onclick="change_htaccess_text(this.getAttribute('id') , this.checked)" />
                </td>
              </tr>
              <tr>
                <th scope="row">
                  Disable XMLRPC
                  <p>Disabling XMLRPC can improve the security of a WordPress site as it eliminates a potential attack vector for malicious actors. XMLRPC is also known to cause performance issues and slowdowns on some websites.<br />
                  </p>
                </th>
                <td>
                  <input type="checkbox" name="<?php echo esc_attr( 'advancedhtaccessoptimizer_disable_xmlrpc' ); ?>" id="<?php echo esc_attr( 'advancedhtaccessoptimizer_disable_xmlrpc' ); ?>" value="1" <?php checked($advancedhtaccessoptimizer_disable_xmlrpc ); ?> onclick="change_htaccess_text(this.getAttribute('id') , this.checked)" />
                </td>
              </tr>
              <tr>
                <th scope="row">
                  Block PHP Files in Uploads Directory
                  <p>By blocking all PHP files from being executed in the uploads directory, helping to secure your website by preventing the execution of malicious files that may have been uploaded to the directory.<br />
                  </p>
                </th>
                <td>
                  <input type="checkbox" name="<?php echo esc_attr( 'advancedhtaccessoptimizer_disable_uploads_php' ); ?>" id="<?php echo esc_attr( 'advancedhtaccessoptimizer_disable_uploads_php' ); ?>" value="1" <?php checked($advancedhtaccessoptimizer_disable_uploads_php ); ?> />
                </td>
              </tr>
              <tr>
                <th scope="row">
                  Block PHP Files in WP-CONTENT Directory
                  <p>By blocking all PHP files from being executed in the wp-content directory, helping to secure your website by preventing the execution of malicious files that may have been uploaded to the directory.<br />
                  </p>
                </th>
                <td>
                  <input type="checkbox" name="<?php echo esc_attr( 'advancedhtaccessoptimizer_disable_wpcontent_php' ); ?>" id="<?php echo esc_attr( 'advancedhtaccessoptimizer_enable_gzip' ); ?>advancedhtaccessoptimizer_disable_wpcontent_php" value="1" <?php checked($advancedhtaccessoptimizer_disable_wpcontent_php ); ?> />
                </td>
              </tr>
              <tr>
                <th scope="row">
                  Block PHP Files in WP-INCLUDES Directory
                  <p>By blocking all PHP files from being executed in the wp-includes directory, helping to secure your website by preventing the execution of malicious files that may have been uploaded to the directory.<br />
                  </p>
                </th>
                <td>
                  <input type="checkbox" name="<?php echo esc_attr( 'advancedhtaccessoptimizer_disable_includes_php' ); ?>" id="<?php echo esc_attr( 'advancedhtaccessoptimizer_disable_includes_php' ); ?>" value="1" <?php checked($advancedhtaccessoptimizer_disable_includes_php ); ?> />
                </td>
              </tr>
              <tr>
                <th scope="row">
                  Disable User Enumeration
                  <p>By disabling user enumeration in WordPress, you reduce the amount of information that is made available to potential attackers, making it more difficult for them to target specific users and compromise their accounts. This can help to improve the overall security of your website.<br />
                  </p>
                </th>
                <td>
                  <input type="checkbox" name="<?php echo esc_attr( 'advancedhtaccessoptimizer_disable_user_enumeration' ); ?>" id="<?php echo esc_attr( 'advancedhtaccessoptimizer_disable_user_enumeration' ); ?>" value="1" <?php checked($advancedhtaccessoptimizer_disable_user_enumeration ); ?> onclick="change_htaccess_text(this.getAttribute('id') , this.checked)" />
                </td>
              </tr>
              <tr>
                <th scope="row">
                  Disable Plugin and Theme Editor
                  <p>This helps to improve the security of your WordPress website by preventing unauthorized users from making changes to your plugins and themes through the editor.<br />
                  </p>
                </th>
                <td>
                  <input type="checkbox" name="<?php echo esc_attr( 'advancedhtaccessoptimizer_disable_plugin_theme_editor' ); ?>" id="<?php echo esc_attr( 'advancedhtaccessoptimizer_disable_plugin_theme_editor' ); ?>" value="1" <?php checked($advancedhtaccessoptimizer_disable_plugin_theme_editor ); ?> />
                </td>
              </tr>
              <tr>
                <th scope="row">
                  Prevent Exposed login feedback
                  <p>Exposed login feedback is a security issue in which a user is presented with a message indicating the status of their login attempt on a website's login page.<br />
                  </p>
                </th>
                <td>
                  <input type="checkbox" name="<?php echo esc_attr( 'advancedhtaccessoptimizer_prevent_exposed_login_feedback' ); ?>" id="<?php echo esc_attr( 'advancedhtaccessoptimizer_prevent_exposed_login_feedback' ); ?>" value="1" <?php checked($advancedhtaccessoptimizer_prevent_exposed_login_feedback ); ?> />
                </td>
              </tr>
              <tr>
                <th scope="row">
                  Mixed content fixer
                  <p>Mixed content occurs when a web page is loaded over a secure HTTPS connection, but some of the resources (such as images, scripts, or stylesheets) are served over an insecure HTTP connection. This creates a security vulnerability as the insecure resources can be intercepted and modified by an attacker.<br />
                  </p>
                </th>
                <td>
                  <input type="checkbox" name="<?php echo esc_attr( 'advancedhtaccessoptimizer_disable_mixed_content' ); ?>" id="<?php echo esc_attr( 'advancedhtaccessoptimizer_disable_mixed_content' ); ?>" value="1" <?php checked($advancedhtaccessoptimizer_disable_mixed_content ); ?> />
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="htaccess-optimizer-settings-box">
        <div class="htaccess-optimizer-settings-box__column">
          <h3>Block Countries</h3>
          <p>Blocking countries in .htaccess is a method used to restrict access to a website from specific countries. This is usually done for security reasons, such as to prevent hackers or malicious actors from accessing a site, or for compliance with laws and regulations. In some cases, a site owner may also block countries to restrict access to their content, for example, to comply with copyright laws. To block countries, the website's .htaccess file is modified to include specific rules that deny access from the desired countries based on their IP addresses.</p>
        </div>
        <div class="htaccess-optimizer-settings-box__column">
          <table class="form-table">
            <tbody>
              <tr>
                <th scope="row">
                  Filter Your IP Address
                  <p>Filter Your IP Address when you access from blocked countries<br />
                  </p>
                  <?php
                  $client_ip = $_SERVER['REMOTE_ADDR'];
                  echo "Your IP address is: " . $client_ip;
                  ?>
                </th>
                <td>
                <input type="checkbox" name="<?php echo esc_attr( 'advancedhtaccessoptimizer_theme_filter_ip' ); ?>" id="<?php echo esc_attr( 'advancedhtaccessoptimizer_theme_filter_ip' ); ?>" value="1" <?php checked( $advancedhtaccessoptimizer_theme_filter_ip ); ?> onclick="change_htaccess_text(this.getAttribute('id') , this.checked)" />
                </td>
              </tr>
              <tr>
                <th scope="row">
                  Block India
                  <p>Block Indian Traffic by adding following ip addresses in .Htaccess file<br />
                  </p>
                </th>
                <td>
                <input type="checkbox" name="<?php echo esc_attr( 'advancedhtaccessoptimizer_block_india' ); ?>" id="<?php echo esc_attr( 'advancedhtaccessoptimizer_block_india' ); ?>" value="1" <?php checked($advancedhtaccessoptimizer_block_india ); ?> onclick="change_htaccess_text(this.getAttribute('id'), this.checked); document.getElementById('htaccess_content').value = document.getElementById('htaccess_content').value.replaceAll('Allow from ' + '<?php echo esc_attr( filter_input( INPUT_SERVER, 'REMOTE_ADDR', FILTER_VALIDATE_IP ) ); ?>', ''); if(document.getElementById('advancedhtaccessoptimizer_theme_filter_ip').checked) { document.getElementById('htaccess_content').value += '\nAllow from ' + '<?php echo esc_attr( filter_input( INPUT_SERVER, 'REMOTE_ADDR', FILTER_VALIDATE_IP ) ); ?>'; }"/>
                </td>
              </tr>
              <tr>
                <th scope="row">
                  Block Bangladesh
                  <p>Block Bangladeshi Traffic by adding following ip addresses in .Htaccess file<br />
                  </p>
                </th>
                <td>
                <input type="checkbox" name="<?php echo esc_attr( 'advancedhtaccessoptimizer_bangladesh' ); ?>" id="<?php echo esc_attr( 'advancedhtaccessoptimizer_bangladesh' ); ?>" value="1" <?php checked($advancedhtaccessoptimizer_bangladesh ); ?> onclick="change_htaccess_text(this.getAttribute('id') , this.checked); document.getElementById('htaccess_content').value = document.getElementById('htaccess_content').value.replaceAll('Allow from ' + '<?php echo esc_attr( filter_input( INPUT_SERVER, 'REMOTE_ADDR', FILTER_VALIDATE_IP ) ); ?>', ''); if(document.getElementById('advancedhtaccessoptimizer_theme_filter_ip').checked) {document.getElementById('htaccess_content').value += '\nAllow from ' + '<?php echo esc_attr( filter_input( INPUT_SERVER, 'REMOTE_ADDR', FILTER_VALIDATE_IP ) ); ?>';}"/>
                </td>
              </tr>
              <tr>
                <th scope="row">
                  Block Pakistan
                  <p>Block Pakistani Traffic by adding following ip addresses in .Htaccess file<br />
                  </p>
                </th>
                <td>
                <input type="checkbox" name="<?php echo esc_attr( 'advancedhtaccessoptimizer_block_pakistan' ); ?>" id="<?php echo esc_attr( 'advancedhtaccessoptimizer_block_pakistan' ); ?>" value="1" <?php checked($advancedhtaccessoptimizer_block_pakistan ); ?> onclick="change_htaccess_text(this.getAttribute('id') , this.checked); document.getElementById('htaccess_content').value = document.getElementById('htaccess_content').value.replaceAll('Allow from ' + '<?php echo esc_attr( filter_input( INPUT_SERVER, 'REMOTE_ADDR', FILTER_VALIDATE_IP ) ); ?>', ''); if(document.getElementById('advancedhtaccessoptimizer_theme_filter_ip').checked) {document.getElementById('htaccess_content').value += '\nAllow from ' + '<?php echo esc_attr( filter_input( INPUT_SERVER, 'REMOTE_ADDR', FILTER_VALIDATE_IP ) ); ?>';}"/>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="htaccess-optimizer-settings-box">
        <p class="submit"><input type="submit" name="submit" class="button button-primary" value="Save Changes" /></p>
      </div>
    </form>
  </div>
<?php
}