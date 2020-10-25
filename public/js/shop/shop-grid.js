let items = [];

$(document).ready(function () {

    fillProducts();



    $formDelete = $('#formDelete');
    $formDelete.on('submit', destroyProduct);
    $modalEliminar = $('#modalEliminar');
    $('[data-delete]').on('click', openModalEliminar);

    $('[data-create]').on('click', openModalCrear);
    $modalCrear = $('#modalCrear');
    $formCreate = $('#formCreate');
    $formCreate.on('submit', storeProduct);

    $('[data-edit]').on('click', openModalEditar);
    $modalEditar = $('#modalEditar');
    $formEdit = $('#formEdit');
    $formEdit.on('submit', updateProduct);

    $('[data-show]').on('click', openModalVer);
    $modalVer = $('#modalVer');
    $bodyShow = $('#bodyShow');
});

var $formDelete;
var $modalEliminar;

var $formCreate;
var $modalCrear;

var $formEdit;
var $modalEditar;

var $modalVer;
var $bodyShow;

function fillProducts() {
    $.getJSON('../products/shop', function (response) {
        console.log(response);
        items = response;
        $.each(items, function (ind, elem) {
            console.log('¡Hola :'+elem.name+'!');
            renderTemplateItem(elem.image, elem.id, elem.name, elem.unitPrice);

        });

    });

}

function activateTemplate(id) {
    var t = document.querySelector(id);
    return document.importNode(t.content, true);
}

function renderTemplateItem(image, id, name, unitPrice) {

    var clone = activateTemplate('#template-item');
    var url = document.location.origin;
    var url_image = url + '/images/products/'+image;
    clone.querySelector("[data-setbg]").setAttribute('data-setbg', url_image) ;
    clone.querySelector("[data-heart]").setAttribute('href', url+'/product/heart/'+id);
    clone.querySelector("[data-cart]").setAttribute('href', url+'/product/cart/'+id);
    clone.querySelector("[data-name]").innerHTML = name;
    clone.querySelector("[data-name]").setAttribute('href', url+'/product/detail/'+id);
    clone.querySelector("[data-price]").innerHTML = unitPrice;

    $('#body-items').append(clone);

    // Esto se puso para que actualicemos el set background de las imagenes
    $('.set-bg').each(function () {
        var bg = $(this).data('setbg');
        $(this).css('background-image', 'url(' + bg + ')');
    });

}


function openModalVer() {
    var get_url = $(this).data('url');
    $.getJSON(get_url, function (response) {
        console.log(response);
        $bodyShow.find('[id=nameS]').val(response[0].name);
        $bodyShow.find('[id=descriptionShortS]').html(response[0].descriptionShort);
        $bodyShow.find('[id=descriptionLargeS]').html(response[0].descriptionLarge);
        $bodyShow.find('[id=unitsInStockS]').val(response[0].unitsInStock);
        $bodyShow.find('[id=unitPriceS]').val(response[0].unitPrice);
        $bodyShow.find('[id=starsS]').val(response[0].stars);
        $bodyShow.find('[id=weightS]').val(response[0].weight);
        $bodyShow.find('[id=departmentS]').val(response[0].department.name);

        // Tratamiento de la image
        var url = document.location.origin;
        var url_image = '';
        if (response[0].image == null)
        {
            url_image = url + '/images/not-found.jpg';
        } else {
            url_image = url + '/images/products/'+response[0].image;
        }

        $bodyShow.find('[id=url_image]').attr('src', url_image);

    });
    $modalVer.modal('show');
}

function openModalEditar() {
    var get_url = $(this).data('url');
    $.getJSON(get_url, function (response) {
        console.log(response);
        $modalEditar.find('[id=product_idE]').val(response[0].id);
        $modalEditar.find('[id=nameE]').val(response[0].name);
        $modalEditar.find('[id=descriptionShortE]').val(response[0].descriptionShort);
        $modalEditar.find('[id=descriptionLargeE]').val(response[0].descriptionLarge);
        $modalEditar.find('[id=unitsInStockE]').val(response[0].unitsInStock);
        $modalEditar.find('[id=unitPriceE]').val(response[0].unitPrice);
        $modalEditar.find('[id=starsE]').val(response[0].stars);
        $modalEditar.find('[id=weightE]').val(response[0].weight);

        // Tratamiento de la image
        var url = document.location.origin;
        var url_image = '';
        if (response[0].image == null)
        {
            url_image = url + '/images/not-found.jpg';
        } else {
            url_image = url + '/images/products/'+response[0].image;
        }

        $modalEditar.find('[id=url_image]').attr('src', url_image);

        // Tratamiento del select
        $('#department_idE option[value='+response[0].department.id+']').attr("selected", "selected");


    });
    $modalEditar.modal('show');
}

function updateProduct() {
    event.preventDefault();
    var updateUrl = $formEdit.data('url');
    $.ajax({
        url: updateUrl,
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
                $modalEditar.modal('hide');
                $.toast({
                    text : 'Producto modificado correctamente.',
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
            console.log(data);
        }
    });
}

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
                $modalCrear.modal('hide');
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
                setTimeout(function () {
                    location.reload();
                }, 4000)
            }

        },
        error: function (data) {
            console.log(data);
        }
    });
}

function openModalEliminar() {
    var id = $(this).data('delete');
    var nombre = $(this).data('name');

    $modalEliminar.find('[id=product_idD]').val(id);
    $modalEliminar.find('[id=product_name]').val(nombre);

    $modalEliminar.modal('show');
}

function destroyProduct() {
    event.preventDefault();
    var destroyUrl = $formDelete.data('url');
    $.ajax({
        url: destroyUrl,
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
                $modalEliminar.modal('hide');
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