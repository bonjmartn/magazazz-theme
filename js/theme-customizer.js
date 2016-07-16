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

})( jQuery );