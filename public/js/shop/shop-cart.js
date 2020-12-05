$(document).ready(function () {

    $('[data-delete]').on('click', deleteDetail);

    $('.inc').on('click', incQuantity);
    $('.dec').on('click', decQuantity);

});

var $formDelete;

function incQuantity() {
    var input = $(this).prev();
    var quantity = parseInt(input.val()) + 1;
    var product = input.data('prod');
    var price = input.data('price');
    var cart = input.data('cart');
    var url = input.data('url');
    $.get( url, { product: product, cart: cart, quantity:quantity } )
        .done(function( data ) {
            if ( data.error )
            {
                $.toast({
                    text : data.error,
                    showHideTransition : 'slide',
                    bgColor : '#D15B47',
                    textColor : '#eee',
                    allowToastClose : false,
                    hideAfter : 3000,
                    stack : 10,
                    textAlign : 'left',
                    position : 'top-right',
                    icon: 'error',
                    heading: 'Error'
                });
            }else{
                $.toast({
                    text : 'Cantidad modificada.',
                    showHideTransition : 'slide',
                    bgColor : '#629B58',
                    textColor : '#eee',
                    allowToastClose : false,
                    hideAfter : 3000,
                    stack : 10,
                    textAlign : 'left',
                    position : 'top-right',
                    icon: 'success',
                    heading: 'Éxito'
                });
            }

        });
    var newTotal = parseFloat(price) * quantity;

    $('#'+product).html('S/. ' + newTotal.toFixed(2));


}

function decQuantity() {
    var input = $(this).next();
    var quantity = parseInt(input.val()) - 1;
    var price = input.data('price');
    var product = input.data('prod');
    var cart = input.data('cart');
    var url = input.data('url');
    $.get( url, { product: product, cart: cart, quantity:quantity } )
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
                    text : 'Producto eliminado.',
                    showHideTransition : 'slide',
                    bgColor : '#629B58',
                    textColor : '#eee',
                    allowToastClose : false,
                    hideAfter : 4000,
                    stack : 10,
                    textAlign : 'left',
                    position : 'top-right',
                    icon: 'success',
                    heading: 'Éxito'
                });
            }

        });
    var newTotal = parseFloat(price) * quantity;
    $('#'+product).html('S/. ' + newTotal.toFixed(2));


}

function deleteDetail() {
    var product = $(this).data('delete');
    var cart = $(this).data('cart');
    var url = $(this).data('url');
    $.get( url, { product: product, cart: cart } )
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
                    text : 'Producto eliminado.',
                    showHideTransition : 'slide',
                    bgColor : '#629B58',
                    textColor : '#eee',
                    allowToastClose : false,
                    hideAfter : 4000,
                    stack : 10,
                    textAlign : 'left',
                    position : 'top-right',
                    icon: 'success',
                    heading: 'Éxito'
                });
                setTimeout(function () {
                   location.reload();
                }, 4000);
            }

        });
}