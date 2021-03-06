(function( $ ) {

    wp.customize( 'magazazz_logo', function( value ) {
        value.bind( function( to ) {
            if( to == '' ) {
                $(' .logo img').hide();
            } else {
                $(' .logo img ').show();
                $(' .logo img ').attr( 'src', to );
            }
        } );
    });   

    wp.customize( 'magazazz_headline_text', function( value ) {
        value.bind( function( to ) {
            if( to == '' ) {
                $(' #site-headline ').hide();
            } else {
                $(' #site-headline ').show();
                $(' #site-headline ').text( to );
            }
        } );
    }); 

    wp.customize( 'magazazz_h1_color', function( value ) {
        value.bind( function( to ) {
            $( 'h1 a' ).css( 'color', to );
            $( 'h1' ).css( 'color', to );
            $( 'h2 a' ).css( 'color', to );
            $( 'h2' ).css( 'color', to );
            $( 'h3 a' ).css( 'color', to );
            $( 'h3' ).css( 'color', to );
            $( 'h4 a' ).css( 'color', to );
            $( 'h4' ).css( 'color', to );
            $( 'h5 a' ).css( 'color', to );
            $( 'h5' ).css( 'color', to );
            $( 'h6 a' ).css( 'color', to );
            $( 'h6' ).css( 'color', to );

        } );
    });

    wp.customize( 'magazazz_h1_font_type', function( value ) {
        value.bind( function( to ) {            
            $( 'h1' ).css( 'font-family', to );  
            $( 'h2' ).css( 'font-family', to );  
            $( 'h3' ).css( 'font-family', to );  
            $( 'h4' ).css( 'font-family', to );
            $( 'h5' ).css( 'font-family', to );
            $( 'h6' ).css( 'font-family', to );
            $( 'h1 a' ).css( 'font-family', to );  
            $( 'h2 a' ).css( 'font-family', to );  
            $( 'h3 a' ).css( 'font-family', to );  
            $( 'h4 a' ).css( 'font-family', to );
            $( 'h5 a' ).css( 'font-family', to );
            $( 'h6 a' ).css( 'font-family', to );
        } );
    }); 

    wp.customize( 'magazazz_p_color', function( value ) {
        value.bind( function( to ) {
            $( 'p' ).css( 'color', to );
            $( 'li' ).css( 'color', to );
        } );
    });

    wp.customize( 'magazazz_p_font_size', function( value ) {
        value.bind( function( to ) {            
            $( 'p' ).css( 'font-size', to + 'px' ); 
            $( 'li' ).css( 'font-size', to + 'px' );  
            $( 'a' ).css( 'font-size', to + 'px' );       
        } );
    }); 

    wp.customize( 'magazazz_p_font_type', function( value ) {
        value.bind( function( to ) {            
            $( 'p' ).css( 'font-family', to ); 
            $( 'li' ).css( 'font-family', to );  
            $( 'a' ).css( 'font-family', to );          
        } );
    });

    wp.customize( 'magazazz_accent_color', function( value ) {
        value.bind( function( to ) {
            $( 'a:hover' ).css( 'color', to );
            $( 'a:focus' ).css( 'color', to );
            $( 'a:active' ).css( 'color', to );
            $( 'button:hover' ).css( 'background-color', to );
            $( 'html input[type="button"]:hover' ).css( 'background-color', to );
            $( 'input[type="reset"]:hover' ).css( 'background-color', to );
            $( 'input[type="submit"]:hover' ).css( 'background-color', to );
            $( '.small-icons-bar .fa:hover' ).css( 'background-color', to );
            $( '.footer-cta button' ).css( 'background-color', to );
            $( 'a:not(.footer-social a, #copyright a, .navbar .navbar-nav>li>a)' ).css( 'color', to ); 
         } );

    });

})( jQuery );