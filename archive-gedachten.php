<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Marten Minkema
 * @author Ilja Hehenkamp
 */
$body_class = "gedachten";
get_header(); ?>

		<section id="inhoud">
<?php wp_get_archives('type=monthly&limit=12'); ?>
		</section>

<?php get_footer(); ?>
