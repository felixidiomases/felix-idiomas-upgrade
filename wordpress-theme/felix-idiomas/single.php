<?php
/**
 * Template de post individual.
 *
 * @package felix-idiomas
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main class="fx-page">
	<div class="fx-wrap fx-narrow">
		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<h1><?php the_title(); ?></h1>
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="fx-framed" style="margin-top:28px"><?php the_post_thumbnail( 'large' ); ?></div>
			<?php endif; ?>
			<div class="fx-page-content"><?php the_content(); ?></div>
			<?php
		endwhile;
		?>
	</div>
</main>

<?php
get_footer();
