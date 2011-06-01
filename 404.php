<?php
/**
 * The 404 template file.
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
$body_class = "gevonden";
?>

<?php get_header(); ?>

	<section id="inhoud">
		<figure id="zoekbord"></figure>
		<p>Excuses, de door u opgevraagde pagina is onvindbaar, wellicht dat het zoekformulier u verder kan helpen</p>
	</section>

<?php get_footer(); ?>