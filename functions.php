<?php
function register_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'footer-menu' => __( 'Footer Menu' )
    )
  );
}
add_action( 'init', 'register_menus' );



add_filter( 'default_content', 'my_editor_content' );

function my_editor_content( $content ) {

    $content = "<pre class=\"lang:java decode:true\" title=\"aaa\" >  </pre>";

    return $content;
}


/////////////////////////////////
//settings
////////////////////////////////

function theme_settings_page()
{
    ?>
	    <div class="wrap">
	    <h1>Theme Panel</h1>
	    <form method="post" action="options.php">
	        <?php
	            settings_fields("section");
	            do_settings_sections("theme-options");      
	            submit_button(); 
	        ?>          
	    </form>
		</div>
	<?php
}

function add_theme_menu_item()
{
	add_menu_page("WpSearch", "WpSearch", "manage_options", "theme-panel", "theme_settings_page", null, 99);
}

add_action("admin_menu", "add_theme_menu_item");


function display_disqus()
{
	?>
    	<input type="text" name="disqus_id_pref" id="disqus_id_pref" value="<?php echo get_option('disqus_id_pref'); ?>" />
    <?php
}

function display_disqus_enabled()
{
	?>
		<input type="checkbox" name="disqus_enabled" value="1" <?php checked(1, get_option('disqus_enabled'), true); ?> /> 
	<?php
}


function display_theme_panel_fields()
{
	add_settings_section("section", "WpSearch Settings", null, "theme-options");
	
	add_settings_field("disqus_id_pref", "Disqus Id", "display_disqus", "theme-options", "section");
    add_settings_field("disqus_enabled", "Endable Disqus comments", "display_disqus_enabled", "theme-options", "section");

    register_setting("section", "disqus_id_pref");
    register_setting("section", "disqus_enabled");

    
}

add_action("admin_init", "display_theme_panel_fields");

/*
$layout = get_option('disqus_enabled');
$disqus_id_pref = get_option('disqus_id_pref');
*/