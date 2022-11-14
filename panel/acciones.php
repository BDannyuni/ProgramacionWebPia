<?php 

require '../vendor/autoload.php';


$pelicula = new Kawschool\Pelicula;

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    if($_POST['accion']==='Registrar'){

        if(empty($_POST['titulo']))
            exit('Completar titulo');

        if(empty($_POST['descripcion']))
            exit('Completar descripcion');

        if(empty($_POST['categoria_id']))
            exit('Seleccion una Categoria');

        if(!is_numeric($_POST['categoria_id']))
            exit('Seleccion una Categoria Valida');

        $_params = array(
            'titulo'=>$_POST['titulo'],
            'descripcion'=>$_POST['descripcion'],
            'foto'=> subirFoto(),
            'precio'=>$_POST['precio'],
            'categoria_id'=>$_POST['categoria_id'],
            'fecha'=> date('Y-m-d')
        );

        $rpt = $pelicula->registrar($_params);

        if($rpt)
            header('Location: Productos/index.php');
        else
            print 'Error al registar el Producto';
    }

    if ($_POST['accion']==='Actualizar'){

        if(empty($_POST['titulo']))
            exit('Completar titulo');

        if(empty($_POST['descripcion']))
            exit('Completar descripcion');

        if(empty($_POST['categoria_id']))
            exit('Seleccion una Categoria');

        if(!is_numeric($_POST['categoria_id']))
            exit('Seleccion una Categoria Valida');

        $_params = array(
            'titulo'=>$_POST['titulo'],
            'descripcion'=>$_POST['descripcion'],
            'precio'=>$_POST['precio'],
            'categoria_id'=>$_POST['categoria_id'],
            'fecha'=> date('Y-m-d'),
            'id'=>$_POST['id'],
        );

        if(!empty($_POST['foto_temp']))
            $_params['foto'] = $_POST['foto_temp'];

        if(!empty($_FILES['foto']['name']))
            $_params['foto'] = subirFoto();  



        $rpt = $pelicula->actualizar($_params);
        if($rpt)
            header('Location: Productos/index.php');
        else
            print 'Error al Actualizar el Producto';
    }
}

if($_SERVER['REQUEST_METHOD'] === 'GET'){

    $id = $_GET['id'];

    $rpt = $pelicula->eliminar($id);

    if($rpt)
        header('Location: Productos/index.php');
    else
        print 'Error al Eliminar el Producto';


}


function subirFoto() {

    $carpeta = __DIR__.'/../assets/img/Productos/';

    $archivo = $carpeta.$_FILES['foto']['name'];

    move_uploaded_file($_FILES['foto']['tmp_name'],$archivo);

    return $_FILES['foto']['name'];
}