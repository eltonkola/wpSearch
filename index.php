<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <title><?php bloginfo('name'); ?></title>

    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/foundation.css" />
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" media="screen" />

    <script src="<?php bloginfo('template_url'); ?>/js/vendor/modernizr.js"></script>
    <link rel="alternate" title="<?php printf(__('%s RSS Feed', 'yiw'), get_bloginfo('name')); ?>" href="<?php bloginfo('rss2_url'); ?>" />
    <link rel="alternate" title="<?php printf(__('%s Atom Feed', 'yiw'), get_bloginfo('name')); ?>" href="<?php bloginfo('atom_url'); ?>" />

    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

  <?php wp_head(); ?>

  </head>
  <body>
    <?php show_admin_bar(true); ?>
    <nav class="top-bar foundation-bar" data-topbar>
      <ul class="title-area">
        <li class="name">
         <span data-tooltip class="has-tip" title="Android Snippets"><h1 ><a href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a></h1></span>
        </li>
      </ul>
      <section class="top-bar-section">
        <!-- Right Nav Section -->
              <?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'menu_class'=>'right' ) ); ?>
      </section>
    </nav>

    <form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
    <header class="hero">
        <section class="row">
            <div class="large-12 columns">
                <h1><a href="<?php echo home_url(); ?>/"><?php bloginfo('description'); ?></a></h1>
                    <div class="row collapse searchfield show-for-medium-up">
                        <div class="small-9 columns">
                                <input type="text" placeholder="Search" name="s" id="s" value="<?php the_search_query(); ?>"    />
                        </div>
                        <div class="small-3 columns">
                            <input type="submit" href="#" class="button postfix search" value="Search" />
                        </div>
                    </div>
            </div>
        </section>
    </header>
   </form>


<div id="inner-content" class="row large-12">


  <?php if (have_posts()) : ?>

       <!-- START LOOP -->
       <?php while (have_posts()) : the_post(); ?>

       	<article id="post-x" <?php post_class(); ?> class="post type-post status-publish format-standard hentry category-accordion category-grid wp-sticky" role="article">
    		<header class="article-header">
    			<h4>
    			    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
    			</h4>
    		</header> <!-- end article header -->

    		<section class="entry-content" itemprop="articleBody">
    			<a href="<?php the_permalink() ?>"></a>
    			<p><?php the_content(__('|| ...')); ?></p>
    		</section> <!-- end article section -->

    		<footer class="article-footer">
    	    	<p class="tags"> <?php the_time('j F Y') ?> </p>
    		</footer> <!-- end article footer -->
    	</article> <!-- end article -->

  <?php endwhile; ?>
  <!-- END LOOP -->

  <?php else: ?>
      <h3><?php _e('No results'); ?></h3>
      <p class="center"><?php _e('Nothing found for your search, sorry :('); ?></p>
  <?php endif; ?>

<?php

if ( is_front_page() && is_home() ) {
  // Default homepage
} elseif ( is_front_page() ) {
  // static homepage
} elseif ( is_home() ) {
  // blog page
} else {
  //everything else

?>
<hr/>
	<div id="disqus_thread"></div>
<?php } ?>

</div>

<div class="navigation">
	<div class="alignleft"><?php next_posts_link(__('&laquo; Prev')) ?></div>
	<div class="alignright"><?php previous_posts_link(__('Next &raquo;')) ?></div>
</div>



    <footer class="row">
        <div class="large-12">
            <hr/>
            <div class="row">
            <div class="large-6 columns">
            <p>© Copyright eltonkola.</p>
            </div>
            <div class="large-6 columns">

            <?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'container_class' => 'inline-list right', 'menu_class'=>'inline-list right' ) );  ?>
            </div>
            </div>
        </div>
    </footer>

    <script src="<?php bloginfo('template_url'); ?>/js/vendor/jquery.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/foundation.min.js"></script>
  
<?php
$disqus_enabled = get_option('disqus_enabled');
$disqus_id_pref = get_option('disqus_id_pref');

if($disqus_enabled == 1){
?>
<script type="text/javascript">
    /* * * CONFIGURATION VARIABLES * * */
    var disqus_shortname = '<?php echo $disqus_id_pref; ?>';
    
    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function() {
        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
</script>
<?php
}
?>

<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
<?php wp_footer(); ?>
  <script>
      $(document).foundation();
    </script>
  </body>
</html>