$(document).ready(function () {
    $formCheckout = $('#formCheckout');
    $formCheckout.on('submit', placeOrder);
});

var $formCheckout;

function placeOrder() {
    event.preventDefault();
    var sendUrl = $formCheckout.data('url');
    $.ajax({
        url: sendUrl,
        method: 'POST',
        data: new FormData(this),
        processData: false,
        contentType: false,
        success: function (data) {
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
                    text : 'Pedido creado correctamente. Redireccionando ...',
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
                    window.location = data.url;
                }, 5000);
            }

        },
        error: function (data) {
            console.log(data);
        }
    });
}
