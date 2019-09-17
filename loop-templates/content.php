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


<?php if ( 'people' == get_post_type() ) : ?>

<article <?php post_class('card'); ?> id="post-<?php the_ID(); ?>">

	<div class="row">
		<div class="col-4 no-gutters">
			<a href="<?= esc_url( get_permalink() ); ?>"><?php the_post_thumbnail('post-thumbnail', ['class' => 'card-img']) ?></a>
		</div>
		
		<div class="col-8 card-body">
			<header class="entry-header mb-2">

				<?php
				the_title(
					sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
					'</a></h2>'
				);
				?>

			</header><!-- .entry-header -->

			<div class="entry-content card-text">

				<p>
					<?php the_field('supporter_association'); ?><br />
					<span class="text-muted"><?php the_field('supporter_position'); ?></span>
				</p>

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

			</footer><!-- .entry-footer -->
		</div>
	</div>

</article><!-- #post-## -->

<?php else : ?>

<article <?php post_class('card'); ?> id="post-<?php the_ID(); ?>">
	
	<div class="wrapper-thumb">
		<a href="<?= esc_url( get_permalink() ); ?>">
			<?php 
				if ( has_post_thumbnail() ) {
					the_post_thumbnail('post-thumbnail', ['class' => 'card-img-top']);
				} elseif ( 'publications' == get_post_type() ) { ?>
					<img src="<?= get_template_directory_uri() . '/images/publications-default-header.jpg' ?>" />
			<?php
				} elseif ( 'post' == get_post_type() ) { ?>
					<img src="<?= get_template_directory_uri() . '/images/post-default-thumbnail.jpg' ?>" />
			<?php
				}
			?>			
		</a>
	</div>

	<div class="card-body pb-0">
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

	</div><!-- .card-body -->

	<footer class="entry-footer card-footer">

		<a href="<?= esc_url ( get_permalink() ); ?>" class="card-link btn btn-sm btn-dark"><?php esc_attr_e( 'Read More...', 'understrap' ); ?></a>
		
		<?php if ( !empty($download) ) : $download = (object) $download; ?>
		
			<a href="<?= $download->url ?>" class="card-link btn btn-sm btn-success"><?php esc_attr_e( 'Download', 'understrap' ); ?></a>

		<?php endif; ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->

<?php endif; ?>