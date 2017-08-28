$(document).ready(init);

function init() {
    if ($("#re_render").val() == 'familia') {
        $("#familias").show();
        $("#productos").hide();
        $("#proovedores").hide();
    } else if ($("#re_render").val() == 'producto') {
        $("#familias").hide();
        $("#productos").show();
        $("#proovedores").hide();
    } else if ($("#re_render").val() == 'proovedor') {
        $("#familias").hide();
        $("#productos").hide();
        $("#proovedores").show();
    } else {
        $("#familias").hide();
        $("#productos").hide();
        $("#proovedores").hide();
    }

    $("#btnProovedores").click(clickProovedores);
    $("#btnFamilias").click(clickFamilias);
    $("#btnProductos").click(clickProductos);
    $(".proovedorElement").click(clickProveedorTableElement);
    $(".familiaElement").click(clickFamiliaTableElement);
    $(".productoElement").click(clickProductoTableElement);
    $("#btnAgregarProducto").click(clickBtnAgregarProducto)
    $("#destacadoProducto").click(clickEsDestacado)
}

function clickProovedores() {
    $("#familias").hide();
    $("#productos").hide();
    $("#proovedores").show();
}

function clickFamilias() {
    $("#productos").hide();
    $("#proovedores").hide();
    $("#familias").show();
}

function clickProductos() {
    $("#familias").hide();
    $("#proovedores").hide();
    $("#productos").show();
}

function clickProveedorTableElement() {
    $(' tr ').removeClass("selected")
    $(this).addClass("selected");
    $('#eliminar_prov').val($(this).children().html())
}

function clickFamiliaTableElement() {
    $(' tr ').removeClass("selected")
    $(this).addClass("selected");
    $('#eliminar_familia').val($(this).children().html())
}

function clickProductoTableElement() {
    $(' tr ').removeClass("selected")
    $(this).addClass("selected");
    $('#eliminar_producto').val($(this).children().html())
}

function clickBtnAgregarProducto() {
    $("#modalAgregarProducto").modal('show');
}

function clickEsDestacado() {
    if ($('#hiddenDestacado').val() == 'false') {
        $('#hiddenDestacado').val('true')
    } else if ($('#hiddenDestacado').val() == 'true') {
        $('#hiddenDestacado').val('false')
    }

}