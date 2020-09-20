$(document).ready(function () {
    $formDelete = $('#formDelete');
    $formDelete.on('submit', destroyDepartment);
    $modalEliminar = $('#modalEliminar');
    $('[data-delete]').on('click', openModalEliminar);
});

var $formDelete;
var $modalEliminar;

function openModalEliminar() {
    var id = $(this).data('delete');
    var nombre = $(this).data('name');

    $modalEliminar.find('[id=department_id]').val(id);
    $modalEliminar.find('[id=department_name]').val(nombre);

    $modalEliminar.modal('show');
}

function destroyDepartment() {
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
                    text : 'Departamento eliminado correctamente.',
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