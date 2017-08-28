$(document).ready(inicializo);

function inicializo(){
    $("#anterior").click(irPagina);
    $("#siguiente").click(irPagina);
    $(".buscarProd").click(buscarProd);
     $(".buscarFam").click(buscarProd);

}

function irPagina(){
    var pagina = $(this).attr("alt");
    window.location = "principal.php?pagina=" + pagina;
}

function buscarProd(){
    windows.location = "";
}

function nuevoAutor(){
    window.location =  "nuevo.php";
}

function modifAutor(){
    var id = $(this).attr("alt");
    window.location = "muestroAutor.php?id=" + id;
}
  <input type="button" class="btnBorrar" alt="{$autor['id']}" value="Borrar"/>