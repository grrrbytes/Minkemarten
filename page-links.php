<?php
/**
 * Template Name: Links
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
global $body_class, $link1, $link2, $link3;
$body_class = "links";
$link1 = "links/tot-algemeen-nut";
$link2 = "links/merkwaardig";
$link3 = "links/vrienden-en-collegas";

get_header(); ?>

      <section id="inhoud" class="hfeed">
	    <nav class="navigatiebalk">
		  <ul class="bericht-navigatie">
		    <li class="volgend-bericht"><?php previous_post_link( '%link', _x( '', 'Previous post link')); ?></li>
			<li class="vorig-bericht"><?php next_post_link( '%link', _x( '', 'Next post link')); ?></li>
		  </ul>
		</nav>
		
		<?php $loop = new WP_Query( array( 'post_type' => 'links', 'posts_per_page' => 10 ) ); ?>
		<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
			
	    <article class="hentry artikel volledig">
		  <header class="artikel-hoofd"><h1 class="titel"><?php the_title(); ?></h1></header>			
		  <section class="artikel-inhoud">	
				<figure class="bericht-icoon"><?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large'); echo '<a href="' . $large_image_url[0] . '" class="thumbnail-link colorbox" rel="lightbox" title="' . the_title_attribute('echo=0') . '" >'; the_post_thumbnail('thumbnail', array('class' => 'artikel-thumbnail')); ?></a>
				</figure>
				<?php the_content(); ?>
		   </section>
		</article>
		
		<?php endwhile; // end of the loop. ?>
		
		<section id="links"><?php wp_list_bookmarks( ); ?> </section>
	    <nav id="gerelateerd" class="navigatiebalk">
		  <ul class="gerelateerde berichten">
		    <li class="volgende-pagina"><?php previous_posts_link(''); ?></li>
			<li class="vorige-pagina"><?php next_posts_link(''); ?></li>
		  </ul>
		</nav>
	  </section>

<?php get_footer(); ?>