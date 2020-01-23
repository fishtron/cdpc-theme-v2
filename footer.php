<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row">

			<div class="col-md-8 col-xs-12">
				<div class="">
					Getting to Tomorrow available in: <?php do_action( 'wpml_footer_language_selector'); ?>
				</div>

				<footer class="site-footer" id="colophon">

					<div class="site-info">

						<?php echo get_bloginfo('name'); ?> &copy; 2019.
						<?php
						  wp_nav_menu(
						    array(
						      'theme_location'  => 'legal',
						      'container_class' => '',
						      'container_id'    => 'footer-legal-menu',
						      'menu_class'      => 'navbar-nav',
						      'fallback_cb'     => '',
						      'menu_id'         => 'legal_menu',
						      'depth'           => 1,
						      'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
						    )
						  );
						?>

					</div><!-- .site-info -->

				</footer><!-- #colophon -->

			</div><!--col end -->

			<div class="col-md-4 col-xs-12">
				<ul class="social-links light">
					<li>
						<a target="_blank" href="https://twitter.com/CANdrugpolicy" title="Follow us on Twitter">
							<i class="fa fa-twitter"></i> <span>Twitter</span>
						</a>
					</li>
					<li>
						<a target="_blank" href="https://www.facebook.com/CANdrugpolicy" title="Follow us on Facebook">
							<i class="fa fa-facebook"></i> <span>Facebook</span>
						</a>
					</li>
					<li>
						<a target="_blank" href="https://www.instagram.com/candrugpolicy" title="Follow us on Instagram">
							<i class="fa fa-instagram"></i> <span>Instagram</span>
						</a>
					</li>
				</ul>
			</div>

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

<?php if ( $_SERVER['SERVER_NAME'] == 'localhost' ) : ?>
<script id="__bs_script__">//<![CDATA[
    document.write("<script async src='http://localhost:3000/browser-sync/browser-sync-client.js?v=2.26.7'><\/script>".replace("HOST", location.hostname));
//]]></script>
<?php endif; ?>

</body>

</html>

