<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
$body_class = "gevonden";
get_header(); ?>

		<section id="inhoud">
			<figure id="zoekbord"></figure>

<?php if ( have_posts() ) : ?>
	
<?php get_template_part('berichtoverzicht'); ?>

<?php else : ?>
				<div id="post-0" class="post no-results not-found">
					<h2 class="entry-title"><?php _e( 'Nothing Found', 'twentyten' ); ?></h2>
					<div class="entry-content">
						<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'twentyten' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</div><!-- #post-0 -->
<?php endif; ?>
		</section>
			
<?php get_footer('zoek'); ?>
