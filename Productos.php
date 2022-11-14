
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kawschool Store</title>

    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="assets/css/estilos.css">
	<link rel="stylesheet" href="assets/css/estilo2.css">

  <link rel="stylesheet" href="assets/css/botones.css">
	
  </head>

  <body>
  <header>
        <a href="#" class="logo">LOGO</a>


		<input type="checkbox" id="menu-bar">
		<label for="menu-bar">Menu</label>

        <nav class="navbar">
            <ul>
				<li><a href="index.php">Inicio</a></li>
                <li><a href="panel/login.php">Login</a></li>
                <li><a href="Productos.php">Productos</a></li>
                <li><a href="#">Equipo</a></li>
                <li><a href="#">Carrito</a></li>
            </ul>
        </nav>
    </header>


	<h1 class="title">Productos De Gaming Shop</h1>
    
  <div class="container">

    <?php
    require 'vendor/autoload.php';
    $pelicula = new Kawschool\Pelicula;
    $info_productos = $pelicula->mostrar();


    $cantidad = count($info_productos);
    if($cantidad > 0){
    for($x =0; $x < $cantidad; $x++){
        $item = $info_productos[$x];
    

    ?>
       
		<div class="card">
            <?php 
            $foto = 'assets/img/Productos/'.$item['foto'];
            if(file_exists($foto)){

            ?>
                <img src="<?php print $foto; ?>" width="1170"><br>
            <?php }else { ?>
                
                <img src="assets/img/no-photo.jpg" width="1170"><br>

                <?php }?>
                
            	<br><h4><?php print $item['titulo']?></h4>
            	<p>Categoria: <?php print $item['nombre']?><br>
               $<?php print $item['precio']?></p><br>
               <a href="carrito.php?id=<?php print $item['id']?>" class="btn btn-1">Agregar al Carrito</a>
			</div>
        <?php 
    }
            }else{
        ?>
        <div class="card">
            <img src="https://cdn-icons-png.flaticon.com/512/5695/5695988.png?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80">
            <h4>No hay registros <br> en la Base de Datos</h4>
        </div>
        <?php }?>
    
    </div>
    </div>        
	 <script>
	 	const btnCart = document.querySelector('.container-icon')
		const containerCartProducts = document.querySelector('.container-cart-products')

		btnCart.addEventListener('click', () => {
    	containerCartProducts.classList.toggle('hidden-cart')
		})
	 </script>

  </body>
</html>



