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

function wpmu_cta_simple() {
    ob_start();
   ?>

  <div class="shortcode cta">
    <?php $email = get_theme_mod( 'wpmu_email_setting', 'Your email address' ); ?>

        Call us at <?php echo get_theme_mod( 'wpmu_telephone_setting', 'Your telephone number' ); ?>
         or email <a href="<?php echo $email; ?>">
				<?php echo $email; ?>
			</a>

    </div>
    <?php
      return ob_get_clean();
  }
    add_shortcode( 'cta-simple', 'wpmu_cta_simple' );

// function for letting the cta box have different info than the header info
    function wp_cta_atts( $atts, $content = null ) {

        $atts = shortcode_atts(array(
            'tel' => 'telephone',
            'email' => 'email address'
        ), $atts, 'cta-atts' );

      ob_start();
      ?>

      <div class="cta">
            <?php echo 'Call us at ' . $atts['tel'] . ' or email <a href=" ' . $atts[ 'email' ] . ' ">'. $atts[ 'email' ] . '</a>'; ?>
      </div>

      <?php
        return ob_get_clean();


    }

    add_shortcode( 'cta-atts', 'wp_cta_atts' );
