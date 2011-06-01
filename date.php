<?php
/**
 * The template for displaying Archive pages.
 *
 *Template Name: Archief pagina
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
$body_class = "gevonden";
get_header(); ?>

		<section id="inhoud" class="hfeed">
<?php get_template_part('berichtoverzicht'); ?>
		</section>

<?php get_footer(); ?>
