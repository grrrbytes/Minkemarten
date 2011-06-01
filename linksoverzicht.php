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
?>

	    <nav class="navigatiebalk">
		  <ul class="pagina-navigatie">
		    <li class="volgende-pagina"><?php previous_posts_link(''); ?></li>
			<li class="archief"><a href=""></a></li>
			<li class="vorige-pagina"><?php next_posts_link(''); ?></li>
		  </ul>
		</nav>
		<?php
		$args = array( 
		    'post_type' => 'links', 
		    'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
		    'posts_per_page' => 10, 
		);
		$loop = new WP_Query;
		$loop->query( $args ); 
		?>
		<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
			<article class="hentry link <?php echo $post_type ?>">
				<header class="artikel-hoofd">
				<h1 class="link" title="<?php the_title() ?>"><a href="<?php more_fields('website-link', '', '', false)?>" class="bookmark" title="" rel="bookmark"><?php the_title() ?></a></h1>
				</header>
				
				<section class="inleiding">
					<span><?php $this_excerpt = get_the_excerpt(); echo $this_excerpt; ?>
					</span>
				</section>
			</article>
		<?php endwhile; ?>
	    <nav class="navigatiebalk">
		  <ul class="pagina-navigatie">
			<li class="volgende-pagina"><?php previous_posts_link(''); ?></li>
			<li class="archief"><a href=""></a></li>
			<li class="vorige-pagina"><?php next_posts_link(''); ?></li>
		  </ul>
		</nav>