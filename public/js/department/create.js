$(document).ready(function () {
    $formCreate = $('#formCreate');
    $formCreate.on('submit', storeDepartment);
});

var $formCreate;

function storeDepartment() {
    event.preventDefault();
    var createUrl = $formCreate.data('url');
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
                    text : 'Departamento creado correctamente.',
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
                }, 4000)
            }
        },
        error: function (data) {
            console.log(data)
        }
    });
}