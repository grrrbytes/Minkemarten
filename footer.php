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
global $link1, $link2, $link3, $these_taxs, $eerste, $tweede, $derde;
?>
      <nav id='submenu'>
        <ul id='subknoppen' class="<?php echo $these_taxs ?>">
          <li class='subknop<?php echo $eerste; ?>' id='eerste'>
            <a href='<?php bloginfo('url'); ?>/<? echo $link1; ?>' title=''></a>
          </li>
          <li class='subknop<?php echo $tweede; ?>' id='tweede'>
            <a href='<?php bloginfo('url'); ?>/<? echo $link2; ?>' title=''></a>
          </li>
          <li class='subknop<?php echo $derde; ?>' id='derde'>
            <a href='<?php bloginfo('url'); ?>/<? echo $link3; ?>' title=''></a>
          </li>
        </ul>
        <section id="zoeken">
	      <form id="zoek-formulier" role="search" method="get" action="<?php bloginfo('url'); ?>">
		    <input type="text" id="zoek-veld" name="s" placeholder="zoeken" size="15" value="<?php the_search_query(); ?>"/>
			<button type="submit" class="" id="zoek-knop"></button>
		  </form>
	    </section>
	    <figure id="postzegel"><a href="<?php bloginfo('url'); ?>/colofon" class="blok-link"></a></figure>
      </nav>
      <footer id='kopijrecht'>
        <section id="icoontjes">
          <figure id="rss"><a href="<?php bloginfo('url'); ?>/personalia/rss-feeds" class="blok-link"></a></figure>
          <figure id="copyright"><a href="<?php bloginfo('url'); ?>/personalia/copyright" class="blok-link"></a></figure>
        </section>
      </footer>
    </div>
  <?php wp_footer(); ?> 
  </body>
</html>
