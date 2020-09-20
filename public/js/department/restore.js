$(document).ready(function () {
    $formRestore = $('#formRestore');
    $formRestore.on('submit', restoreDepartment);
    $modalRestaurar = $('#modalRestaurar');
    $('[data-restore]').on('click', openModalRestaurar);
});

var $formRestore;
var $modalRestaurar;

function openModalRestaurar() {
    var id = $(this).data('restore');
    var nombre = $(this).data('name');

    $modalRestaurar.find('[id=department_id]').val(id);
    $modalRestaurar.find('[id=department_name]').val(nombre);

    $modalRestaurar.modal('show');
}

function restoreDepartment() {
    event.preventDefault();
    var createUrl = $formRestore.data('url');
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
                    text : 'Departamento restaurado correctamente.',
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
                $modalRestaurar.modal('hide');
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