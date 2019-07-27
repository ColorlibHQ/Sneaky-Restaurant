<?php
/**
 * @Packge     : sneakyrestaurant
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
// Block direct access
if( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}

if ( post_password_required() ) {
    return;
}
?>

    <?php if ( have_comments() ) : ?>
		<section id="comments" class="comments-area"><!-- Comment Item Start-->
            <h4><?php printf( _nx( '1 Comment', '%1$s Comments', get_comments_number(), 'comments title', 'sneakyrestaurant' ), number_format_i18n( get_comments_number() ) ); ?></h4>
		
        <?php the_comments_navigation(); ?>
            <div class="commentlist">
                <?php
                    wp_list_comments( array(
                        'style'       => 'div',
                        'short_ping'  => true,
                        'avatar_size' => 70,
                        'callback'    => 'sneakyrestaurant_comment_callback'
                    ) );
                ?>
            </div><!-- .comment-list -->
        <?php the_comments_navigation(); ?>
		</section><!-- Comment Item End-->
    <?php endif; // Check for have_comments(). ?>

    <?php
        // If comments are closed and there are comments, let's leave a little note, shall we?
        if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
    ?>
        <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'sneakyrestaurant' ); ?></p>
    <?php endif; ?>
    
<?php

    //
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? "required='required'" : '' );
	$fields =  array(
	  'author'=> '<div class="col-sm-6"><div class="form-group"><input class="form-control" name="author" type="text" placeholder="'. esc_attr__( 'Name', 'sneakyrestaurant' ) .'"  value="'. esc_attr( $commenter['comment_author'] ).'" id="cName" '.$aria_req.'></div></div>',
	  'email' => '<div class="col-sm-6"><div class="form-group"><input class="form-control" name="email" type="email" placeholder="'. esc_attr__( 'Email', 'sneakyrestaurant' ) .'"  value="' . esc_attr(  $commenter['comment_author_email'] ) .'" id="cEmail" '.$aria_req.'></div></div>',
	  'url'   => '<div class="col-sm-12"><div class="form-group"><input class="form-control" name="url"   type="text" placeholder="'. esc_attr__( 'Website', 'sneakyrestaurant' ) .'" value="'. esc_attr( $commenter['comment_author_url'] ) .'" id="cWebsite"></div></div>',
	);
	

	$args=array(
	'comment_field'         => '<div class="row"><div class="col-12"><div class="form-group"><textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="'.esc_attr__( 'Write Comment', 'sneakyrestaurant' ).'"></textarea></div></div>',
	'id_form'               =>'contactForm',
    'class_form'            =>'',
	'title_reply'           =>esc_html__( 'Leave a Reply', 'sneakyrestaurant' ),
	'title_reply_before'    =>'<h5 class="pb-20">',
	'title_reply_after'     =>'</h5>',
    'label_submit'          => esc_html__( 'Post Comment', 'sneakyrestaurant' ),
	'submit_button'         => '</div><div class="form-group"><button type="submit"  name="%1$s" id="%2$s" class="button button-contactForm %3$s">Send Message</button></div>',
	'fields'                =>$fields,
	
	);

    if( comments_open() ){ 
        echo '<div class="comment-form">';
    }
    comment_form( $args );
    if( comments_open() ){ 
        echo '</div>';
    }
