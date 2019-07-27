(function ($) {
    'use strict';

    // page template change option

    var $template           = $( '#page_template' ),
        $pagesettingsmeta   = $('#pageheader-meta-box'),
        $pageheader         = $('#page_header_selectbox'),
        $headerbg           = $( '.header-img' ),
        $page_subtitle      = $( '#sneakyrestaurant_page_subtitle' );

    // Page Template Event
    $template.on( 'change', function(){
        var $this = $(this);
        if( $this.val() == 'template-builder.php' ){
            $pagesettingsmeta.show();
        }else{
            $pagesettingsmeta.hide();
        }

    });


    // Page header Event
    $pageheader.on( 'change', function(){
        var $this = $(this);
        if( $this.val() == 'show' ){
            $headerbg.show();
            $page_subtitle.show();
        }else{
            $headerbg.hide();
            $page_subtitle.hide();
        }

    });

    // if page header show selected
    if( $pageheader.val() != 'show' ){
        $headerbg.hide();
    }

})(jQuery);