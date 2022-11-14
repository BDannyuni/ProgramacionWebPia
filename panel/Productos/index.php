
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
	<link rel="stylesheet" href="../../assets/css/estilos.css">
	<link rel="stylesheet" href="../../assets/css/estilo2.css">
  <link rel="stylesheet" href="../../assets/css/botones.css">
	
  </head>

  <body>
  <header>
        <a href="#" class="logo">LOGO</a>


		<input type="checkbox" id="menu-bar">
		<label for="menu-bar">Menu</label>

        <nav class="navbar">
            <ul>
				<li><a href="../../index.php">Inicio</a></li>
                <li><a href="../login.php">Login</a></li>
                <li><a href="../../Productos.php">Productos</a></li>
                <li><a href="index.php">Editar</a></li>
                <li><a href="#">Equipo</a></li>
                <li><a href="#">Carrito</a></li>
            </ul>
        </nav>
    </header>


	<h1 class="title">Productos De Gaming Shop</h1>
    
    <div class="container">
        <div class="card">
            <img src="../../assets/img/Productoicon.png?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80">
            <h4>Registrar Nuevos Productos</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel, excepturi unde?</p>
            <div class="buttons">
                <a href="form_registrar.php" class="btn btn-3">Agregar Nuevo</a>
            </div>
        </div>

    <?php
    require '../../vendor/autoload.php';
    $pelicula = new Kawschool\Pelicula;
    $info_productos = $pelicula->mostrar();


    $cantidad = count($info_productos);
    if($cantidad > 0){
    for($x =0; $x < $cantidad; $x++){
        $item = $info_productos[$x];
    

    ?>
       
		<div class="card">
            <a href="form_actualizar.php?id=<?php print $item['id'] ?>"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00b341" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                <line x1="16" y1="5" x2="19" y2="8" />
                </svg></a>
            <a href="../acciones.php?id=<?php print $item['id'] ?>"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <line x1="4" y1="7" x2="20" y2="7" />
                <line x1="10" y1="11" x2="10" y2="17" />
                <line x1="14" y1="11" x2="14" y2="17" />
                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                </svg></a>
            <?php 
            $foto = '../../assets/img/Productos/'.$item['foto'];
            if(file_exists($foto)){

            ?>
                <img src="<?php print $foto; ?>" width="1170">
            <?php }else { ?>
                
                <img src="../../assets/img/no-photo.jpg" width="1170">

                <?php }?>
                
            	<h4><?php print $item['titulo']?></h4>
            	<p>Categoria: <?php print $item['nombre']?><br>
               $<?php print $item['precio']?></p><br>
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

