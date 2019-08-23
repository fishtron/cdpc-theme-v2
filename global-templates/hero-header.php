<?php
/**
 * Hero setup.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Fetch post title
$hero_title = get_field('hero_title') ? get_field('hero_title') : get_the_title();

?>

<?php if ( get_field('hero_image') ) : ?>
  <div class="hero-header jumbotron jumbotron-fluid <?php if ( get_field('dimmed') == true ): ?>overlay<?php endif ?>" style="background: url('<?php the_field('hero_image') ?>') no-repeat center center; min-height: 300px; background-size: cover;">
    <div class="container py-3">
      <h1 class="display-4"><?php echo $hero_title; ?></h1>
      <?php if ( get_field ('lead') ) : ?>
        <div class="lead display-5 my-3"><?php the_field('lead'); ?></div>
      <?php endif; ?>
    </div>
  </div>
<?php endif; ?>