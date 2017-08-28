<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
         <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    
    <script>

        //an image width in pixels 
        var imageWidth = 400;
    

        //DOM and all content is loaded 
        $(window).ready(function() {
            
            var currentImage = 0;

            //set image count 
            var allImages = $('#slideshow li img').length;
            
            //setup slideshow frame width
            $('#slideshow ul').width(allImages*imageWidth);

            //attach click event to slideshow buttons
            $('.slideshow-next').click(function(){
                
                //increase image counter
                currentImage++;
                //if we are at the end let set it to 0
                if(currentImage>=allImages) currentImage = 0;
                //calcualte and set position
                setFramePosition(currentImage);

            });

            $('.slideshow-prev').click(function(){
                
                //decrease image counter
                currentImage--;
                //if we are at the end let set it to 0
                if(currentImage<0) currentImage = allImages-1;
                //calcualte and set position
                setFramePosition(currentImage);

            });
           
        });

        //calculate the slideshow frame position and animate it to the new position
        function setFramePosition(pos){
            
            //calculate position
            var px = imageWidth*pos*-1;
            //set ul left position
            $('#slideshow ul').animate({
                left: px
            }, 300);
        }

    </script>
    
    
    
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="/TallerP2/Smarty/templates/normalize.css">
        <link rel="stylesheet" type="text/css" href="/TallerP2/Smarty/templates/stylo.css">
   
        <script type="text/javascript" src="js/modificar.js"></script>
        
         <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    



    </head>
    <body>
                <center>
      
            <br>
          
            <form method="POST" action="autenticado.php">
                Usuario: 
                <input type="text" id="txtUsu" name="txtUsu" value=""/>
                <br>
                Clave: 
                <input type="password" id="txtPass" name="txtPass" value=""/>
                <br>
                <input type="submit" value="Ingresar"/>
            </form>
         
      
        </center>
<<<<<<< HEAD
=======
        
 
    
>>>>>>> parent of 0120081... Merge de los dos
   
            <h3>Productos Destacados</h3>

    <div id="slideshow">
       <a href="#" class="slideshow-prev">&laquo;</a> 
       <ul>
           
            {foreach from=$arrayProductos item=producto}
                <li>

                  <div class="square">
    

                    <img src="Fotos/{$producto->imagen}" alt="photo1"  />
                     <p><strong>{$producto->nombre}</strong></p>
                     <p><strong>$: {$producto->precio}</strong></p>
                     <p><strong>{$producto->familia}</strong></p>
                  </div>
                  </li>
        {/foreach}
            </ul>
        <a href="#" class="slideshow-next">&raquo;</a> 

    </div>

            
            // hay q hacer esto por ajax  OJO!!!
    <form method="POST" action="login.php">
                Producto: 
                <input type="text" class="buscarProd" name="buscarProd" value=""/>
                <br>
                Familia: 
                <input type="text" class="buscarFam" name="buscarFam" value=""/>
                <br>
                <input type="submit" value="Buscar"/>
                
                falta que desp de buscar filtre los elementos destacados !!
            </form>


            <br></br>
            <br></br>
        </center>
      
        
        
        
        <div class="section">
            <div class="header">
                <h1>Familia Productos</h1>
            </div>
            <form action="/TallerP2/index.php" method="post">
                Id:   <input type="text" name="id"><br>
                Nombre: <input type="text" name="nombre"><br>
                <input type="submit" value="Submit" >
            </form>
            <hr />
            <form action="/TallerP2/index.php" method="post">
                Id de la Familia a Eliminar: <input type="text" name="delete_id"><br>
                <input type="submit" value="Submit">
            </form>
            <hr />
            <form action="/TallerP2/index.php" method="post">
                Id a modificar: <input type="text" name="mod_id"><br>
                Nombre nuevo: <input type="text" name="mod_name"><br>
                <input type="submit" value="Submit">
            </form>
            <hr />
            <table class='list'>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                </tr>
                          </table>
        </div>
        <div class="section">
            <div class="header">
                <h1>Proovedores</h1>
            </div>
            <form action="/TallerP2/index.php" method="post">
                Id: <input type="text" name="id_prov"><br>
                Nombre: <input type="text" name="nombre_prov"><br>
                <input type="submit" value="Submit">
            </form>
            <hr />
            <form action="/TallerP2/index.php" method="post">
                Id del Proovedor a Eliminar: <input type="text" name="delete_id_prov"><br>
                <input type="submit" value="Submit">
            </form>
            <hr />
            <form action="/TallerP2/index.php" method="post">
                Id a modificar: <input type="text" name="mod_id_prov"><br>
                Nombre nuevo: <input type="text" name="mod_name_prov"><br>
                <input type="submit" value="Submit">
            </form>
            <hr />
            <table class='list'>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                </tr>
                {foreach from=$arrayProovedores item=proovedor}
                    <tr>
                        <td>{$proovedor->id}</td>
                        <td>{$proovedor->nombre}</td>
                    </tr>
                    {/foreach}
            </table>
        </div>
        <div class="section">
            <div class="header">
                <h1>Productos</h1>
            </div>
            <form action="/TallerP2/index.php" method="post">
                Id <input type="text" name="id_prod"><br>
                Nombre <input type="text" name="name_prod"><br>
                Destacado? <input type="checkbox" name="destacado_prod"><br>
                Proovedor: <input type="text" name="prov_prod"><br>
                Familia: <input type="text" name="fam_prod"><br>
                Precio: <input type="text" name="precio_prod"><br>
                Imagen: <input type="text" name="imagen_prod"><br>
                <input type="submit" value="Submit">
            </form>
            <hr />
            <form action="/TallerP2/index.php" method="post">
                Id del Producto a Eliminar: <input type="text" name="delete_id_prod"><br>
                <input type="submit" value="Submit">
            </form>
            <hr />
            <form action="/TallerP2/index.php" method="post">
                Id a modificar: <input type="text" name="mod_id_prod"><br>
                Nombre nuevo: <input type="text" name="mod_name_prod"><br>
                Es Destacado? <input type="checkbox" name="mod_destacado_prod"><br>
                Proovedor nuevo: <input type="text" name="mod_prov_prod"><br>
                Familia nueva: <input type="text" name="mod_fam_prod"><br>
                Precio nuevo: <input type="text" name="mod_precio_prod"><br>
                Imagen nueva: <input type="text" name="mod_imagen_prod"><br>
                <input type="submit" value="Submit">
            </form>
            <hr />
            <table class='list'>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Destacado</th>
                    <th>ID Proovedor</th>
                    <th>ID Familia</th>
                    <th>Precio</th>
                    <th>Imagen</th>
                </tr>
                {foreach from=$arrayProductos item=producto}
                    <tr>
                        <td>{$producto->id}</td>
                        <td>{$producto->nombre}</td>
                        <td>{$producto->esDestacado}</td>
                        <td>{$producto->proovedor}</td>
                        <td>{$producto->familia}</td>
                        <td>{$producto->precio}</td>
                        <td>{$producto->imagen}</td>
                    </tr>
                    {/foreach}
            </table>
        </div>
    </body>



</html>
