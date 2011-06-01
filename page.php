<?php
/**
 * The page template file.
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
$body_class = "personalia";
$link1 = "personalia/colofon";
$link2 = "personalia/nevenactiviteiten";
$link3 = "personalia/curriculum";

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

      <section id="inhoud" class="hfeed">
	    <nav class="navigatiebalk">
		  <ul class="bericht-navigatie">
		    <li class="volgend-bericht"><?php previous_post_link( '%link', _x( '', 'Previous post link')); ?></li>
			<li class="pagina-bordje" id="<?php echo sanitize_title(the_title('','',false)) . "-bord" ?>"><a href="<?php get_permalink() ?>"></a></li>
			<li class="vorig-bericht"><?php next_post_link( '%link', _x( '', 'Next post link')); ?></li>
		  </ul>
		</nav>
	    <article class="hentry artikel volledig">
		  <header class="artikel-hoofd"><h1 class="titel"><?php the_title(); ?></h1></header>
		  <section class="artikel-inhoud">	
				<?php the_content(); ?>
		   </section>
		</article>
	    <nav id="gerelateerd" class="navigatiebalk">
		  <ul class="gerelateerde berichten">
		    <li class="volgende-pagina"><?php previous_posts_link(''); ?></li>
			<li class="vorige-pagina"><?php next_posts_link(''); ?></li>
		  </ul>
		</nav>
	  </section>
	
<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>