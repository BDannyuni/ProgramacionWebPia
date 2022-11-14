
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/estilo.css">
    <link rel="stylesheet" href="../../assets/css/estilos.css">
    <link rel="stylesheet" href="../../assets/css/botones.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <title>Bienvenido a mi Formulario</title>
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
                <li><a href="#">Equipo</a></li>
                <li><a href="#">Carrito</a></li>
            </ul>
        </nav>
    </header>




    <div class="container">
        <div>
        <form class="formulario" method="POST" action="../acciones.php" enctype="multipart/form-data">
            <div>
                <h2 class="create-account">Registrar <br> Nuevos Productos</h2>
                <p>Titulo del Producto</p><br>
                <input type="text" name="titulo" placeholder="Titulo" required>
            </div>
            <div>
                <p>Descripcion</p><br>
                <input name="descripcion" placeholder="Descripcion" required>
            </div>
            <div>
                <p>Categorias</p><br>
                <select name="categoria_id" required>
                    <option value="">--SELECCIONES--</option>
                    <?php
                     require '../../vendor/autoload.php';
                     $categoria = new Kawschool\Categoria;
                     $info_categoria = $categoria->mostrar();
                     $cantidad = count($info_categoria);
                     for($x =0; $x < $cantidad;$x++){
                        $item = $info_categoria[$x];
                    ?>
                        <option value="<?php print $item['id'] ?>"><?php print $item['nombre'] ?></option>

                    <?php 
                         } 
                    ?>
                </select>
            </div><br>
            <div>
                <p>Foto</p><br>
                <input type="file" name="Foto" required>
            </div>
            <div>
                <p>Precio</p><br>
                <input type="text" name="precio" placeholder="$0.00" required>
            </div>
            <div class="buttons">
           	 	<input type="submit" name="accion" class="btn btn-3" value="Registrar">
           	 	<a href="index.php" class="btn btn-2">Cancelar</a>
            </div>
        </form>
        </div>

  </body>
</html>
