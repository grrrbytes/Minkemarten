<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query. 
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Marten Minkema
 * @author Ilja Hehenkamp
 */

get_header(); ?>

      <section id="inhoud" class="hfeed">
		<?php $loop = new WP_Query( array( 'post_type' => array('radio', 'televisie', 'gedachten', 'publicaties'), 'posts_per_page' => 4 ) ); ?>

		<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
			<div id="nav-above" class="navigation">
				<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentyten' ) ); ?></div>
				<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?></div>
			</div>
			<article class="hentry radio artikel">
				<header class="artikel-hoofd">
				<?php the_title( '<h1 class="titel"><span class="datum">' . the_date('d.m.y', '', '', false) . '</span><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h1>' ); ?>
				</header>
				
				<section class="inleiding">
					<figure class="bericht-icoon"><?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large'); echo '<a href="' . $large_image_url[0] . '" class="thumbnail-link colorbox" title="' . the_title_attribute('echo=0') . '" >'; the_post_thumbnail('thumbnail', array('rel' => 'lightbox', 'class' => 'artikel-thumbnail')); ?></a>
					</figure>
					<p><?php $this_excerpt = get_the_excerpt(); echo $this_excerpt; ?>...&nbsp;<a href="<?php the_permalink(); ?>" class="lees-verder">Lees en luister</a></p>
				</section>
			</article>
		<?php endwhile; ?>
      </section>
<?php get_footer(); ?>