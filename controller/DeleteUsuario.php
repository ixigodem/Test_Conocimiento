<?php
    include_once('../model/Data.php');

    if (isset($_POST['btnEliminarUsuario'])) {
        $id = $_POST['id_usuarioD'];

        $d = new Data();

        //LLamo al metodo del data para eliminar el tarjeton
        $d->eliminarUsuario($id);

        //Redireccionar hacia formCrearTarjeton.php con un mensaje a través del navegador
        echo "<script>
                alert('Usuario eliminado con exito!!');
                window.location= '../view/Mantenedor.php'
            </script>";
    }else {
        //Si no vienen los datos, redirigir hacia formCrearTarjeton.php con mensaje de error a través del método GET
        echo "<script>
                alert('¡¡Error el usuario no fue eliminado!!');
                window.location= '../view/Mantenedor.php'
            </script>";
    }
?>