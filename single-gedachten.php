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
$body_class = "gedachten";
$link1 = "gedachten/binnenland";
$link2 = "gedachten/buitenland";
$link3 = "gedachten/themas";
$taxname = "gedachten-themas";

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<?php get_template_part('bericht'); ?>
	
<?php endwhile; // end of the loop. ?>

<?php

$eerste = $binnenland;
$tweede = $buitenland;
$derde = $themas;
?>

<?php get_footer(); ?>