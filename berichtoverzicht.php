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
			<!--<li class="archief"><a href=""></a></li>-->
			<li class="vorige-pagina"><?php next_posts_link(''); ?></li>
		  </ul>
		</nav>

		<?php while ( have_posts() ) : the_post(); ?>
		<?php
		
		$post_type = get_post_type( get_the_ID() );
		
		$thetags = "";
		$posttags = get_the_tags();
		if ($posttags) {
		  foreach($posttags as $tag) {
		    $thetags .= $tag->name . ', '; 
		  }
		  $thetags = substr($thetags, 0, -2);
		}
		
		$thetaxonomies = "";
		$posttaxonomies = get_post_taxonomies($post->id);
		if ($posttaxonomies) {
		  foreach($posttaxonomies as $taxonomy) {
		    $thetaxonomies .= $taxonomy . ' '; 
		  }
		  
		}
		
		$meta_info = sprintf("Geplaatst onder %s op %s in de categorie(&euml;n): %s, met de volgende tag(s): %s", $post->post_type, get_the_date(), $thetaxonomies, $thetags);
		
		?>
			<article class="hentry artikel <?php echo $post_type ?>">
				<header class="artikel-hoofd">
				<?php the_title( '<h1 class="titel" title="' . $meta_info . '"><time class="datum date">' . the_date('d.m.y', '', '', false) . '</time><a href="' . get_permalink() . '" title="' . $meta_info . '" rel="bookmark">', '</a></h1>' ); ?>
				<figure class="icoontje"></figure>
				</header>
				
				<section class="inleiding">
					<figure class="bericht-icoon"><?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large'); echo '<a href="' . $large_image_url[0] . '" class="thumbnail-link" title="' . the_title_attribute('echo=0') . '" >'; the_post_thumbnail('bericht-icoon', array('class' => 'artikel-thumbnail')); ?></a>
					</figure>
					<span><?php $this_excerpt = get_the_excerpt(); echo $this_excerpt; ?>...&nbsp;<a href="<?php the_permalink(); ?>" class="lees-verder">Lees en luister</a>
					</span>
				</section>
			</article>
		<?php endwhile; ?>
	    <nav class="navigatiebalk">
		  <ul class="pagina-navigatie">
			<li class="volgende-pagina"><?php previous_posts_link(''); ?></li>
			<!--<li class="archief"><a href=""></a></li>-->
			<li class="vorige-pagina"><?php next_posts_link(''); ?></li>
		  </ul>
		</nav>
