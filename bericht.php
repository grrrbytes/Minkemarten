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
global $taxname, $these_taxs;

$post_type = get_post_type( get_the_ID() );

$taxs = get_the_terms($post->ID, $taxname);
$these_taxs = "";
foreach($taxs as $tax) {
	$thistax = sanitize_title(str_replace(' ', '_', $tax->name));
	global ${$thistax};
	${$thistax} = " actief";
}
?> 
     <section id="inhoud" class="hfeed bericht">
	    <nav class="navigatiebalk">
		  <ul class="bericht-navigatie">
			<li class="vorig-bericht"><?php previous_post_link( '%link', _x( '', 'Next post link')); ?></li>
		    <li class="volgend-bericht"><?php next_post_link( '%link', _x( '', 'Previous post link')); ?></li>
		  </ul>
		</nav>
	    <article class="hentry artikel volledig <?php echo $post_type ?>">
		  <header class="artikel-hoofd">
			<?php the_title( '<h1 class="titel" title="' . $meta_info . '"><time class="datum date">' . the_date('d.m.y', '', '', false) . '</time><a href="' . get_permalink() . '" title="' . $meta_info . '" rel="bookmark">', '</a></h1>' ); ?>
			<figure class="icoontje"></figure>
		  </header>
		  <section class="artikel-inhoud">	
				<figure class="bericht-icoon"><?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large'); echo '<a href="' . $large_image_url[0] . '" class="thumbnail-link colorbox" rel="lightbox" title="' . the_title_attribute('echo=0') . '" >'; the_post_thumbnail('bericht-icoon', array('class' => 'artikel-thumbnail')); ?></a>
				</figure>
				<?php the_content(); ?>
		   </section>
		</article>
	    <nav id="gerelateerd">
		  <figure id="gelijkgestemd"></figure>
		  <ul class="gerelateerde-berichten">
			<?php
			$tags = wp_get_post_tags($post->ID);
			if ($tags) {
				$tag_ids = array();
				foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
				$args=array(
					'post_type' => array('radio', 'televisie', 'gedachten', 'publicaties'),
					'tag__in' => $tag_ids,
					'post__not_in' => array($post->ID),
					'showposts'=>10, // Number of related posts that will be shown.
					'caller_get_posts'=>1
				);
				$my_query = new wp_query($args);
				if( $my_query->have_posts() ) {
					while ($my_query->have_posts()) {
						$my_query->the_post();
					?>
						<li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
					<?php
					}
				}
			}
			?>
		  </ul>
		</nav>
	  </section>
