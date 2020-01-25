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

	<div class="entry-content <?php /*if ($has_sidebar) : ?>row<?php endif;*/ ?>">

		<?php /*if ($has_sidebar) : ?><div class="col-md-9"><?php endif; */?>

		<?php the_content(); ?>

		<?php /*if ($has_sidebar) : ?>
			</div>
			<div class="col-md-3">

			<?php if ( $side_quote ) : ?>
				<div class="side-quote">
					<blockquote>
						<?= $side_quote ?>
					</blockquote>
				</div>
			<?php endif; */?>

		</div>
		<?php /*endif;*/ ?>

		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			)
		);
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?>

	</footer><!-- .entry-footer -->


</article><!-- #post-## -->