
<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container box_1620">
                <?php
                // Header Logo
                    echo sneakyrestaurant_theme_logo( 'navbar-brand logo_h' );
                ?>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <?php
                    //
                    if( has_nav_menu( 'primary-menu' ) ) {
                        $args = array(
                            'theme_location' => 'primary-menu',
                            'container'      => '',
                            'depth'          => 2,
                            'menu_class'     => 'nav navbar-nav menu_nav justify-content-end',
                            'fallback_cb'    => 'sneakyrestaurant_bootstrap_navwalker::fallback',
                            'walker'         => new sneakyrestaurant_bootstrap_navwalker(),
                        );  
                        wp_nav_menu( $args );
                    }
                    ?>
                    </div> 
                </div>
            </div>
        </nav>
    </div>
</header>

<!-- #header -->
