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


// Post Category
function sneakyrestaurant_post_cats() {
	
	$cats = get_the_category();
	$categories = '';
    if( $cats ) {

        $categories .= '<ul class="tags">';
        
        foreach( $cats as $cat ) {
           $categories .= '<li><a href="' . esc_url( get_category_link( absint( $cat->term_id ) ) ) . '">' .esc_html( $cat->name ) . '</a></li>';
        }
        
        $categories .= '</ul>';
    }
	
	return $categories;
	
}

// Post Tags
function sneakyrestaurant_post_tags() {
	
	$tags = get_the_tags();
	
	$getTags = '';
	
	if( $tags ) {
		foreach( $tags as $tag ){
			$getTags .= '<a href="' . esc_url( get_tag_link( absint( $tag->term_id ) ) ) . '" class="tag">' . esc_html( $tag->name ) . '</a>';
		}
	
	}
	
	return $getTags;
	
}

// sneakyrestaurant comment template callback
function sneakyrestaurant_comment_callback( $comment, $args, $depth ) {
    
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
    ?>
    <<?php echo esc_attr( $tag ); ?> <?php comment_class( ( empty( $args['has_children'] ) ? '' : 'parent').' comment-list' ) ?> id="comment-<?php comment_ID() ?>">
    <?php 
    if ( 'div' != $args['style'] ) { ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-list">
        <?php 
    } ?>
        
            <div class="single-comment justify-content-between d-flex">
                <div class="user justify-content-between d-flex">
                    <div class="thumb">
                        <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
                    </div>
                    <div class="desc">
                        <?php comment_text(); ?>
                        <div class="d-flex justify-content-between">
                            <div class="d-flex align-items-center">
                            <h5>
                            <?php get_comment_author_link() ?>
                            </h5>
                            <p class="date"><?php printf( __('%1$s at %2$s', 'sneakyrestaurant'), get_comment_date(),  get_comment_time() ); ?><?php edit_comment_link( esc_html__( '(Edit)', 'sneakyrestaurant' ), '  ', '' ); ?></p>
                            </div>

                            <div class="reply-btn">
                                <?php comment_reply_link(array_merge( $args, array( 'add_below' => $add_below, 'depth' => 1, 'max_depth' => 5, 'reply_text' => 'Reply' ) ) ); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>


    <?php  
}
// add class comment reply link
add_filter('comment_reply_link', 'sneakyrestaurant_replace_reply_link_class');
function sneakyrestaurant_replace_reply_link_class( $class ) {
    $class = str_replace("class='comment-reply-link", "class='btn-reply text-uppercase", $class);
    return $class;
}

