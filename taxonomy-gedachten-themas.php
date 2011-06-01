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

global $body_class, $link1, $link2, $link3;
$body_class = "gedachten";
$link1 = "gedachten/binnenland";
$link2 = "gedachten/buitenland";
$link3 = "gedachten/themas";

$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
$thisterm = sanitize_title(str_replace(' ', '_', $term->name));
${$thisterm} = " actief";

$eerste = $binnenland;
$tweede = $buitenland;
$derde = $themas;

get_header(); ?>

		<section id="inhoud" class="hfeed">
<?php get_template_part('berichtoverzicht'); ?>
		</section>

<?php get_footer(); ?>