<?php
/*
 * Plugin Name:   Call to Action Shortcode
 * Plugin URI:    https://github.com/Bakermg/call-to-action
 * Description:   Adds a shortcode for a call to action box
 * Version:       1.0
 * Author:        Mike Baker
 * Author URI:    https://bakerwebco.com
 *
 *
 */

function wpmu_shortcode_enqueue_styles() {

	wp_register_style( 'shortcode_cta_css', plugins_url( 'css/style.css', __FILE__ ) );
    wp_enqueue_style( 'shortcode_cta_css' );

}
add_action( 'wp_enqueue_scripts', 'wpmu_shortcode_enqueue_styles' );

function wpmu_cta_simple() {  ?>

  <div class="shortcode cta">

    Call us at <?php echo get_theme_mod( 'wpmu_email_setting', 'Your email address' ); ?>
    or email <a href="<?php echo get_theme_mod(
      'wpmu_email_setting', 'Your email address' ); ?>" >get_theme_mod(
      'wpmu_email_setting', 'Your email address' ); ?></a>

    </div>
    <?php
      return ob_get_clean();
  }
    add_shortcode( 'cta-simple', 'wpmu_cta_simple' );