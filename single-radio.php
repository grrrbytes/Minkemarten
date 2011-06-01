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

global $body_class, $link1, $link2, $link3, $taxname;
$body_class = "radio";
$link1 = "radio/binnenland";
$link2 = "radio/buitenland";
$link3 = "radio/kunst-en-wetenschap";
$taxname = "radio-themas";

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<?php get_template_part('bericht'); ?>
	
<?php endwhile; // end of the loop. ?>

<?php

$eerste = $binnenland;
$tweede = $buitenland;
$derde = $kunst_en_wetenschap;
?>

<?php get_footer(); ?>