<html>
    <head>
        <title>Bienvenido</title>
        <link rel="stylesheet" type="text/css" href="/TallerP2/Smarty/templates/normalize.css">
        <link rel="stylesheet" type="text/css" href="/TallerP2/Smarty/templates/auth.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
        <script src="/TallerP2/Smarty/js/auth.js"></script>
        <meta charset="ISO-8859-1"> 

    </head>
    <body>
        <input type="hidden" id="re_render" value="{$render}"> 
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Una gran superficie</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">     
                    <li class="nav-item">
                        <a id="btnProovedores" class="nav-link" href="#">Administrar Proovedores</a>
                    </li>
                    <li id="btnFamilias" class="nav-item">
                        <a class="nav-link" href="#">Administrar Familia de Productos</a>
                    </li>
                    <li id="btnProductos" class="nav-item">
                        <a class="nav-link" href="#">Administrar Productos</a>
                    </li>
                </ul>
            </div>

        </nav>

        <div id="proovedores" class="container-fluid" >
            <div class="row justify-content-center">
                <div class="col-6">
                    <h1>Agregar Proovedor</h1>
                    <form  action="/TallerP2/Controllers/Proovedor.php"  method="post">
                        <div class="form-group">
                            <label for="nombreProductor">Nombre</label>
                            <input type="text" class="form-control" name="agregar_prov_nombre" id="nombreProductor" placeholder="Ingrese Nombre del Proovedor">
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                    <form  action="/TallerP2/Controllers/Proovedor.php"  method="post">
                        <input type="text" id="namefilter" name="namefilter_prov"> 
                        <input type="hidden" id="previouspage" name="currentpage_prov" value="{$currentpage_prov}"> 
                        <button type="submit" class="btn btn-default">Filtrar por nombre</button>
                    </form> 
                    <form  action="/TallerP2/Controllers/Proovedor.php"  method="post">
                        <input type="hidden" id="namefilter" name="namefilter_prov" value={$namefilter_prov}> 
                        <input type="hidden" id="previouspage" name="previouspage_prov" value="{$currentpage_prov}"> 
                        <button type="submit" class="btn btn-default">Previa</button>
                    </form> 
                    <form  action="/TallerP2/Controllers/Proovedor.php"  method="post">
                        <input type="hidden" id="namefilter" name="namefilter_prov" value={$namefilter_prov}> 
                        <input type="hidden" id="nextpage" name="nextpage_prov" value="{$currentpage_prov}"> 
                        <button type="submit" class="btn btn-default">Siguiente</button>
                    </form> 
                    <table class="table">

                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th></th>
                        </tr>
                        <tr>                
                            {foreach from=$arrayProovedores item=proovedor}
                            <tr class="proovedorElement" id="prov{$proovedor->id}">
                                <td  >{$proovedor->id}</td>
                                <td>{$proovedor->nombre}</td>
                            </tr>
                        {/foreach}
                        </tr>

                    </table>
                    <form  action="/TallerP2/Controllers/Proovedor.php"  method="post">
                        <input type="hidden" id="eliminar_prov" name="eliminar_prov" value=""> 
                        <button type="submit" class="btn btn-default">Eliminar</button>
                    </form> 
                </div>

            </div>

        </div>
        <div id="productos"class="container-fluid" > 
            <!-- Modal -->
            <div id="modalAgregarProducto" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Agregar  Producto</h4>
                        </div>
                        <div class="modal-body">
                            <form  action="/TallerP2/Controllers/Producto.php"  method="post">
                                <div class="form-group">
                                    <label for="nombreFamilia">Nombre</label>
                                    <input type="text" class="form-control" name="agregar_producto_nombre" id="nombreProducto" placeholder="Ingrese Nombre de la Familia">
                                    <div>   
                                        <label>
                                            <input type="checkbox" class="form-control" value=""  id="destacadoProducto" >
                                            Producto Destacado
                                        </label><br/>
                                    </div>
                                    <label for="nombreFamilia">ID Proovedor</label>
                                    <input type="text" class="form-control" name="agregar_producto_proovedor" id="idProovedorDelProducto" placeholder="Ingrese Nombre de la Familia">
                                    <label for="nombreFamilia">ID Familia</label>
                                    <input type="text" class="form-control" name="agregar_producto_familia" id="idFamiliaDelProducto" placeholder="Ingrese Nombre de la Familia">
                                    <label for="nombreFamilia">Precio</label>
                                    <input type="text" class="form-control" name="agregar_producto_precio" id="precioProducto" placeholder="Ingrese Nombre de la Familia">
                                    <label for="nombreFamilia">Imagen</label>
                                    <input type="file" class="form-control" name="agregar_producto_imagen" id="imagenProducto" >
                                    <input type="hidden" id='hiddenDestacado' name="agregar__es-productodestacado" value='false'/>
                                </div>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </form>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="row justify-content-center">
                        <div class="col-10">

                            <form  action="/TallerP2/Controllers/Producto.php"  method="post">
                                <input type="text" id="namefilter" name="namefilter_prod"> 
                                <input type="hidden" id="previouspage" name="currentpage_prod" value="{$currentpage_prod}"> 
                                <button type="submit" class="btn btn-default">Filtrar por nombre</button>
                            </form> 
                            <form  action="/TallerP2/Controllers/Producto.php"  method="post">
                                <input type="hidden" id="namefilter" name="namefilter_prod" value={$namefilter_prod}> 
                                <input type="hidden" id="previouspage" name="previouspage_prod" value="{$currentpage_prod}"> 
                                <button type="submit" class="btn btn-default">Previa</button>
                            </form> 
                            <form  action="/TallerP2/Controllers/Producto.php"  method="post">
                                <input type="hidden" id="namefilter" name="namefilter_prod" value={$namefilter_prod}> 
                                <input type="hidden" id="nextpage" name="nextpage_prod" value="{$currentpage_prod}"> 
                                <button type="submit" class="btn btn-default">Siguiente</button>
                            </form> 

                            <table class="table">
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Destacado</th>
                                    <th>ID Proovedor</th>
                                    <th>ID Familia</th>
                                    <th>Precio</th>
                                </tr>
                                {foreach from=$arrayProductos item=producto}
                                    <tr class="productoElement" id="prod{$producto->id}">
                                        <td>{$producto->id}</td>
                                        <td>{$producto->nombre}</td>
                                        <td>{$producto->esDestacado}</td>
                                        <td>{$producto->proovedor}</td>
                                        <td>{$producto->familia}</td>
                                        <td>{$producto->precio}</td>
                                    </tr>
                                {/foreach}
                            </table>
                            <form  action="/TallerP2/Controllers/Producto.php"  method="post">
                                <input type="hidden" id="eliminar_producto" name="eliminar_producto" value=""> 
                                <button type="submit" class="btn btn-default">Eliminar</button>
                            </form> 
                            <button type="button" id="btnAgregarProducto" class="btn btn-default">Agregar</button>
                        </div>

                    </div> 
                </div>
            </div>
        </div>
        <div id="familias"class="container-fluid" > 
            <div class="row justify-content-center">
                <div class="col-6">
                    <h1>Agregar Familia Producto</h1>
                    <form  action="/TallerP2/Controllers/FamiliaProducto.php"  method="post">
                        <div class="form-group">
                            <label for="nombreFamilia">Nombre</label>
                            <input type="text" class="form-control" name="agregar_familia_nombre" id="nombreFamilia" placeholder="Ingrese Nombre de la Familia">
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                    <form  action="/TallerP2/Controllers/FamiliaProducto.php"  method="post">
                        <input type="text" id="namefilter" name="namefilter_familia"> 
                        <input type="hidden" id="previouspage" name="currentpage_familia" value="{$currentpage_familia}"> 
                        <button type="submit" class="btn btn-default">Filtrar por nombre</button>
                    </form> 
                    <form  action="/TallerP2/Controllers/FamiliaProducto.php"  method="post">
                        <input type="hidden" id="namefilter" name="namefilter_familia" value={$namefilter_familia}> 
                        <input type="hidden" id="previouspage" name="previouspage_familia" value="{$currentpage_familia}"> 
                        <button type="submit" class="btn btn-default">Previa</button>
                    </form> 
                    <form  action="/TallerP2/Controllers/FamiliaProducto.php"  method="post">
                        <input type="hidden" id="namefilter" name="namefilter_familia" value={$namefilter_familia}> 
                        <input type="hidden" id="nextpage" name="nextpage_familia" value="{$currentpage_familia}"> 
                        <button type="submit" class="btn btn-default">Siguiente</button>
                    </form> 
                    <table class="table">
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th></th>
                        </tr>
                        <tr>      
                            {foreach from=$arrayFamilias item=familia}
                            <tr class="familiaElement">
                                <td>{$familia->id}</td>
                                <td>{$familia->nombre}</td>
                            </tr>
                        {/foreach}
                    </table>
                    <form  action="/TallerP2/Controllers/FamiliaProducto.php"  method="post">
                        <input type="hidden" id="eliminar_familia" name="eliminar_familia" value=""> 
                        <button type="submit" class="btn btn-default">Eliminar</button>
                    </form> 
                </div>

            </div>
        </div>
    </body>
</html>
