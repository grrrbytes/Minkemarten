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
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>> 
  <head>
    <meta charset='utf-8' />
    <meta content='' name='description' />
    <meta content='' name='author' />
    <meta content='' name='keywords' />
    <meta content='' name='generator' />
    <link href='<?php bloginfo('template_directory'); ?>/css/thuis.css' rel='stylesheet' type='text/css' />

    <link href='<?php bloginfo('template_directory'); ?>/images/favicon.ico' rel='Shortcut Icon' type='image/x-icon' />
    <!-- ie-specific hacks/css -->
    <!--[if IE]>
      <link href='<?php bloginfo('template_directory'); ?>/css/ie.css' rel='stylesheet' type='text/css' />
    <![endif]-->
    <!-- script to make IE6-8 html5- and css3-aware and fix some nasty layout-bugs -->
    <!--[if lt IE9]>
      <script>IE7_PNG_SUFFIX=".png";</script>
      <script src='http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js'></script>
    <![endif]-->
    <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js'></script>
	<script src='<?php bloginfo('template_directory'); ?>/js/jquery.fancybox-1.3.4.pack.js'></script>
	<script src='<?php bloginfo('template_directory'); ?>/js/init-fancybox.js'></script>
    <title>Marten Minkema</title>
  </head>
  <body class='thuis'>
    <div id='container'>
      <header id='hoofding'>
        <nav id='hoofdmenu'>
          <ul id='knoppen'>
            <li class='knop actief' id='thuis'>
              <a href='<?php bloginfo('url'); ?>' rel='home' title=''></a>
            </li>
            <li class='knop' id='radio'>
              <a href='<?php bloginfo('url'); ?>/radio' title=''></a>
            </li>
            <li class='knop' id='televisie'>
              <a href='<?php bloginfo('url'); ?>/televisie' title=''></a>
            </li>
            <li class='knop' id='publicaties'>
              <a href='<?php bloginfo('url'); ?>/publicaties' title=''></a>
            </li>
            <li class='knop' id='gedachten'>
              <a href='<?php bloginfo('url'); ?>/gedachten' title=''></a>
            </li>
            <li class='knop' id='personalia'>
              <a href='<?php bloginfo('url'); ?>/personalia' title=''></a>
            </li>
          </ul>
        </nav>
      </header>