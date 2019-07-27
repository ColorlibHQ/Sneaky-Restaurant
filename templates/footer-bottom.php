<?php 
// Copy right text
$url = 'https://colorlib.com/';
$copyText = sprintf( __( 'Theme by %s colorlib %s Copyright &copy; %s  |  All rights reserved.', 'sneakyrestaurant' ), '<a target="_blank" href="' . esc_url( $url ) . '">', '</a>', date( 'Y' ) );

?>

<div class="copyright-text footer-bottom">
    <div class="container">
        <div class="row align-items-center">
            <p class="col-lg-8 col-sm-12 footer-text m-0 text-center text-lg-left"><?php echo wp_kses_post( sneakyrestaurant_opt( 'sneakyrestaurant-copyright-text-settings', $copyText ) ); ?></p>
            <?php
            if( has_nav_menu( 'social-menu' ) ) {
                echo '<div class="col-lg-4 col-sm-12 footer-social text-center text-lg-right">';
                    $args = array(
                        'theme_location' => 'social-menu',
                        'container'      => '',
                        'depth'          => 1,
                        'menu_class'     => 'footer-social',
                        'fallback_cb'    => 'sneakyrestaurant_social_navwalker::fallback',
                        'walker'         => new sneakyrestaurant_social_navwalker(),
                    );  
                    wp_nav_menu( $args );
                echo '</div>';
            }
            ?>
        </div>                      
    </div>
</div>
