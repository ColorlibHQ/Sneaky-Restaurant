<?php 
if( !defined( 'WPINC' ) ){
    die;
}
/**
 * @Packge     : sneakyrestaurant Companion
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
    

    // sneakyrestaurant meta scripts enqueue
    add_action( 'admin_enqueue_scripts', 'sneakyrestaurant_meta_scripts' );
    function sneakyrestaurant_meta_scripts() {
        wp_enqueue_style( 'sneakyrestaurant-meta-style', SNEAKYRESTAURANT_COMPANION_META_DIR_URL . 'assets/css/sneakyrestaurant-meta.css' );
        wp_enqueue_script( 'sneakyrestaurant-meta-script', SNEAKYRESTAURANT_COMPANION_META_DIR_URL . 'assets/js/sneakyrestaurant-meta.js', array('jquery'), '1.0', true );
    }

    // Page Header select option meta
    add_action("add_meta_boxes", "sneakyrestaurant_add_custom_meta_box");
    function sneakyrestaurant_add_custom_meta_box() {
        // page header background meta box
        add_meta_box("pageheader-meta-box", esc_html__( "Builder Page Header Settings", 'sneakyrestaurant' ), "sneakyrestaurant_bpheader_meta_box_markup", "page", "side", "high", null);

        //Page SubTitle
        add_meta_box("sneakyrestaurant_page_subtitle", esc_html__( "Page Sub Title", 'sneakyrestaurant' ), "subtitle_metabox_markup", "page", "side", "high", null);
    }

    // Page Header settings meta field markup
    function sneakyrestaurant_bpheader_meta_box_markup( $object ) {

    wp_nonce_field( basename( __FILE__ ), "sneakyrestaurant-bpheader-meta-nonce" );

    ?>
        <div class="header-opt header-show-opt">
            <p class="post-attributes-label-wrapper">
                <label for="pageheader-dropdown" class="post-attributes-label"><?php esc_html_e( 'Select Page Header', 'sneakyrestaurant' ); ?></label>
            </p>
            <?php 
            $val = get_post_meta( $object->ID ,'_sneakyrestaurant_builderpage_header_show', true );
            ?>
            <select name="bpheadershow" class="sneakyrestaurant-admin-selectbox" id="page_header_selectbox">
                <option value="show" <?php echo esc_attr( $val == 'show' ? 'selected' : '' ); ?>><?php esc_html_e( 'Show', 'sneakyrestaurant' ); ?></option>
                <option value="hide" <?php echo esc_attr( $val == 'hide' ? 'selected' : '' ); ?> ><?php esc_html_e( 'Hide', 'sneakyrestaurant' ); ?></option>
            </select>

        </div>
        <div class="header-opt header-img">
            <p class="post-attributes-label-wrapper">
                <label for="pageheader-dropdown" class="post-attributes-label"><?php esc_html_e( 'Set Page Header Background', 'sneakyrestaurant' ); ?></label>
            </p>
            <?php 
            $val = get_post_meta( $object->ID ,'_sneakyrestaurant_builderpage_headerimg', true );
            ?>
            <select name="bpheaderimg" class="sneakyrestaurant-admin-selectbox" id="page_header_bg_selectbox">
                <option value="customize" <?php echo esc_attr( $val == 'customize' ? 'selected' : '' ); ?>><?php esc_html_e( 'From Customize', 'sneakyrestaurant' ); ?></option>
                <option value="featured" <?php echo esc_attr( $val == 'featured' ? 'selected' : '' ); ?> ><?php esc_html_e( 'Featured Image', 'sneakyrestaurant' ); ?></option>
            </select>

        </div>
    <?php  
    }

    // Page header background settings save
    function sneakyrestaurant_save_builder_page_header_settings_meta( $post_id, $post, $update ) {
        if ( ! isset( $_POST["sneakyrestaurant-bpheader-meta-nonce"] ) || ! wp_verify_nonce( $_POST["sneakyrestaurant-bpheader-meta-nonce"], basename( __FILE__ ) ) )
            return $post_id;

        if( ! current_user_can( "edit_post", $post_id ) )
            return $post_id;

        if( defined( "DOING_AUTOSAVE" ) && DOING_AUTOSAVE )
            return $post_id;

        $slug = "page";
        if( $slug != $post->post_type )
            return $post_id;

        $meta_headershow = "show";

        if( isset( $_POST["bpheadershow"] ) ) {
            $meta_headershow = $_POST["bpheadershow"];
        }
        update_post_meta( absint( $post_id ), "_sneakyrestaurant_builderpage_header_show", sanitize_text_field( $meta_headershow ) );

        $meta_headerimg = "";

        if( isset( $_POST["bpheaderimg"] ) ) {
            $meta_headerimg = $_POST["bpheaderimg"];
        }
        update_post_meta( absint( $post_id ), "_sneakyrestaurant_builderpage_headerimg", sanitize_text_field( $meta_headerimg ) );

        $page_subT = "";
        if( isset( $_POST['subtitle'] ) ){
            $page_subT = $_POST['subtitle'];
        }
        update_post_meta( absint( $post_id ), 'page_subtitle_meta', sanitize_text_field( $page_subT ) );

    }
    add_action( "save_post", "sneakyrestaurant_save_builder_page_header_settings_meta", 10, 3 );



    // Page Subtitle
    function subtitle_metabox_markup( $post ){ 
        $pageSubTitle = get_post_meta($post->ID, 'page_subtitle_meta', true);
        ?>

        <label for="subtitle"><?php echo esc_html__( 'Sub-title', 'sneakyrestaurant' ) ?></label>
	    <textarea class="page_sub_title" name="subtitle" id="subtitle" cols="30" rows="6" placeholder="Page Sub Title Here ..."><?php 
            if( !empty( $pageSubTitle ) ){
                echo esc_html( $pageSubTitle );
            } ?></textarea>
        
        <?php
    }