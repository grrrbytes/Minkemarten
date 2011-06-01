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
$body_class = "televisie";
$link1 = "televisie/omroep";
$link2 = "televisie/internet";
$link3 = "televisie/projecten";

$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
$thisterm = sanitize_title(str_replace(' ', '_', $term->name));
${$thisterm} = " actief";

$eerste = $omroep;
$tweede = $internet;
$derde = $projecten;

get_header(); ?>

		<section id="inhoud" class="hfeed">
<?php get_template_part('berichtoverzicht'); ?>
		</section>

<?php get_footer(); ?>