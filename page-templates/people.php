<?php
/**
 * Template Name: Custom People Template
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

define('STAFF_CATEGORY', 15);
define('STEERING_COMMITTEE_CATEGORY', 14);

$url = get_permalink();
$categoryID = preg_match("/staff\//i", $url) ? STAFF_CATEGORY : STEERING_COMMITTEE_CATEGORY;

$args = array(
	'post_type' => 'people',
	'post_status' => 'publish',
	'posts_per_page' => -1,

	'meta_key'		=> 'proper_name',
	'orderby'		=> 'meta_value',
	'order'			=> 'ASC',

	'tax_query' => array(
	  	array(
	  		'taxonomy' => 'people-types',
	  		'terms' => array( $categoryID ),
	  		'operator' => 'IN'
	  	)
	  )
);

$wp_query = new WP_Query($args);

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php if ( is_front_page() && is_home() ) : ?>
	<?php get_template_part( 'global-templates/hero' ); ?>
<?php endif; ?>

<div class="wrapper" id="people-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="page-header">	
			<?php the_title('<h1 class="page-title">', '</h1>'); ?>
		</div><!-- .page-header -->

		<div class="row">

			<!-- Do the left sidebar check and opens the primary div -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main card-columns card-horizontal" id="main">

				<?php if ( have_posts() ) : ?>

					<?php /* Start the Loop */ ?>

					<?php while ( have_posts() ) : the_post(); ?>

						<?php

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'loop-templates/content', get_post_format() );
						?>

					<?php endwhile; ?>

				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>

			</main><!-- #main -->

			<!-- The pagination component -->
			<?php understrap_pagination(); ?>

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #index-wrapper -->

<?php get_footer();