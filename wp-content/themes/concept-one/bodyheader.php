<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

<div id="container">
    <div id="loginbar" class="loginbar"><span class="loginlink"><a href="https://app.saltmine.com/">LOGIN</a></span></div>
    <header class="header mainheader" role="banner" itemscope itemtype="http://schema.org/WPHeader">

        <div id="inner-header" class="wrap cf">
            <div id="logo" class="" itemscope itemtype="http://schema.org/Organization">
                <a href="<?php echo home_url(); ?>" rel="nofollow">
                    <img src="<?php
			        $custom_logo_id = get_theme_mod( 'custom_logo' );
			        $image          = wp_get_attachment_image_src( $custom_logo_id, 'full' );
			        echo $image[0]; ?>"
                         alt="<?php bloginfo( 'name' ); ?>" />
                </a>
            </div>

            <nav role="navigation" class="mainnav" itemscope itemtype="http://schema.org/SiteNavigationElement">
				<?php wp_nav_menu( array(
					'container'       => false,                           // remove nav container
					'container_class' => 'menu cf',                 // class of container (should you choose to use it)
					'menu'            => __( 'The Main Menu', 'bonestheme' ),  // nav name
					'menu_class'      => 'nav top-nav cf',               // adding custom nav class
					'theme_location'  => 'main-nav',                 // where it's located in the theme
					'before'          => '',                                 // before the menu
					'after'           => '',                                  // after the menu
					'link_before'     => '',                            // before each link
					'link_after'      => '',                             // after each link
					'depth'           => 0,                                   // limit the depth of the nav
					'fallback_cb'     => ''                             // fallback function (if there is one)
				) ); ?>

            </nav>
            <!--<div class="tagline"><?php bloginfo( 'description' ); ?></div>-->
        </div>

    </header>
