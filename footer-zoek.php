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
global $link1, $link2, $link3;
?>
      <nav id='submenu'>
        <section id="zoeken">
	      <form id="zoek-formulier" role="search" method="get" action="<?php bloginfo('url'); ?>">
		    <input type="text" id="zoek-veld" name="s" placeholder="zoeken" size="15" value="<?php the_search_query(); ?>"/>
			<button type="submit" class="" id="zoek-knop"></button>
		  </form>
	    </section>
	    <figure id="postzegel"></figure>
      </nav>
      <footer id='kopijrecht'>
        <section id="icoontjes">
          <figure id="rss"></figure>
          <figure id="copyright"></figure>
        </section>
      </footer>
    </div>
  </body>
</html>