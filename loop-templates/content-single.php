<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$download   = get_field('publication_download');
$side_quote = get_field('page_quote');

$has_sidebar = false;
if ( $download || $side_quote ) { $has_sidebar = true; }
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php
			if ( empty( get_field('hero_image') ) && !is_home() && !is_front_page() ) { 
				the_title( '<h1 class="entry-title">', '</h1>' ); 
			}
		?>

		<div class="entry-meta">

			<?php understrap_posted_on(); ?>

		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<div class="row">
		<div class="entry-content <?php if ($has_sidebar) : ?>col-md-9<?php endif; ?>">

			<?php the_content(); ?>

			<?php if (get_field('post_source')) : ?>
				<div class="sources">
					<h3>Sources</h3>
					<?php the_field('post_source'); ?>
				</div>
			<?php endif; ?>
			<?php if (get_field('post_footnotes')) : ?>
				<div class="footnotes">
					<h3>Footnotes</h3>
					<?php the_field('post_footnotes'); ?>
				</div>
			<?php endif; ?>

			<?php
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
					'after'  => '</div>',
				)
			);
			?>

		</div><!-- .entry-content -->

		<?php if ($has_sidebar) : ?>
		<div class="col-md-3">

			<?php if ( $download ) : ?>

			<?php $download = (object) $download; ?>

			<div class="publication-wrapper">
				<a href="<?= $download->url ?>" class="<?= $download->mime_type ?> btn btn-success btn-block" title="<?= $download->title ?>" target_="blank">Download Publication</a>
			</div><!-- .publication-wrapper -->

			<?php endif; ?>

			<?php if ( $side_quote ) : ?>
				<blockquote>
					<?= $side_quote ?>
				</blockquote>
			<?php endif; ?>

		</div>
		<?php endif; ?>
	</div>

	<footer class="entry-footer">

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
