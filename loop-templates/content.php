<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( get_field('publication_download') ) {
	$download = get_field('publication_download');
}

?>

<article <?php post_class('card'); ?> id="post-<?php the_ID(); ?>">
	<a href="<?= esc_url( get_permalink() ); ?>"><?php the_post_thumbnail('post-thumbnail', ['class' => 'card-image-top']) ?></a>
	<div class="card-body">
		<header class="entry-header mb-2">

			<?php
			the_title(
				sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
				'</a></h2>'
			);
			?>

			<?php if ( 'post' == get_post_type() ) : ?>

				<div class="entry-meta text-muted">
					<?php understrap_posted_on(); ?>
				</div><!-- .entry-meta -->

			<?php endif; ?>

		</header><!-- .entry-header -->

		<div class="entry-content card-text">

			<?php the_excerpt(); ?>

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
			<a href="<?= esc_url ( get_permalink() ); ?>" class="card-link btn btn-sm btn-dark">Read more</a>
			<?php if ( $download ) : $download = (object) $download; ?><a href="<?= $download->url ?>" class="card-link btn btn-sm btn-success">Download</a><?php endif; ?>
		</footer><!-- .entry-footer -->
	</div>

</article><!-- #post-## -->
