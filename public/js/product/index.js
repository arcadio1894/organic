$(document).ready(function () {
    $formDelete = $('#formDelete');
    $formDelete.on('submit', destroyProduct);
    $modalEliminar = $('#modalEliminar');
    $('[data-delete]').on('click', openModalEliminar);

    $('[data-create]').on('click', openModalCrear);
    $modalCrear = $('#modalCrear');
    $formCreate = $('#formCreate');
    $formCreate.on('submit', storeProduct);
});

var $formDelete;
var $modalEliminar;

var $formCreate;
var $modalCrear;

function openModalCrear() {
    $modalCrear.modal('show');
}

function storeProduct() {
    event.preventDefault();
    var createUrl = $formCreate.data('url');
    $.ajax({
        url: createUrl,
        method: 'POST',
        data: new FormData(this),
        processData: false,
        contentType: false,
        success: function (data) {
            console.log(data);
            $.toast({
                text : 'Producto creado correctamente.',
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
            $modalEliminar.modal('hide');
            setTimeout(function () {
                location.reload();
            }, 4000)

        },
        error: function (data) {
            console.log(data);
            for (var property in data.responseJSON.errors){
                $.toast({
                    text : data.responseJSON.errors[property],
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
            }

        }
    });
}

function openModalEliminar() {
    var id = $(this).data('delete');
    var nombre = $(this).data('name');

    $modalEliminar.find('[id=product_id]').val(id);
    $modalEliminar.find('[id=product_name]').val(nombre);

    $modalEliminar.modal('show');
}

function destroyProduct() {
    event.preventDefault();
    var createUrl = $formDelete.data('url');
    $.ajax({
        url: createUrl,
        method: 'POST',
        data: new FormData(this),
        processData: false,
        contentType: false,
        success: function (data) {
            if (data != "") {
                console.log(data);
                for (var property in data){
                    $.toast({
                        text : data[property],
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
                }
            } else {
                $.toast({
                    text : 'Producto eliminado correctamente.',
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
                $modalEliminar.modal('hide');
                setTimeout(function () {
                    location.reload();
                }, 4000)
            }
        },
        error: function (data) {
            console.log(data)
        }
    });
}