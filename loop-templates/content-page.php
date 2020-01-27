<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$side_quote = get_field('page_quote');

$has_sidebar = false;
if ( $side_quote ) { $has_sidebar = true; }

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php
			if ( empty( get_field('hero_image') ) && !is_home() && !is_front_page() ) { 
				the_title( '<h1 class="entry-title">', '</h1>' ); 
			}
		?>

	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php the_content(); ?>

		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			)
		);
		?>

	</div><!-- .entry-content -->

</article><!-- #post-## -->