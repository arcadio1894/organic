$(document).ready(function () {
    $('[data-add]').on('click', addCart);

});

function addCart() {
    event.preventDefault();
    var url = $(this).data('url');
    var prod = $(this).data('product');
    var qty = $('#pro-qty').val();
    $.get( url, { product: prod, quantity: qty } )
        .done(function( data ) {
            if ( data.error )
            {
                $.toast({
                    text : data.error,
                    showHideTransition : 'slide',
                    bgColor : '#D15B47',
                    textColor : '#eee',
                    allowToastClose : false,
                    hideAfter : 4000,
                    stack : 10,
                    textAlign : 'left',
                    position : 'top-right',
                    icon: 'error',
                    heading: 'Error'
                });
            }else{
                $.toast({
                    text : 'Producto agregado al carrito. Redireccionando ...',
                    showHideTransition : 'slide',
                    bgColor : '#629B58',
                    textColor : '#eee',
                    allowToastClose : false,
                    hideAfter : 5000,
                    stack : 10,
                    textAlign : 'left',
                    position : 'top-right',
                    icon: 'success',
                    heading: 'Éxito'
                });
                setTimeout(function () {
                    window.location = data.url;
                }, 5000);
            }

        });

}

