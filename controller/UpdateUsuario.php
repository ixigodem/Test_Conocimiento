<?php
require_once("../model/Data.php");
require_once("../model/Usuario.php");

//1.- Pregunto si los datos vienen del POST
if (isset($_POST["btnEditarUsuario"])) {
    //¿Pregunto si presiono el boton?
    //2.- Construyo el Objeto de la clase Data para usar la info en la busqueda
    $data = new Data();

    //3.- Si no existe rescato los datos de todo con el vector $_REQUEST
    $id_usu = $_REQUEST["id_usuarioE"];
    $usu = $_REQUEST["usuarioE"];
    $clave = $_REQUEST["claveE"];
    $nombres = $_REQUEST["nombresE"];
    $apPaterno = $_REQUEST["apellido_paternoE"];
    $apMaterno = $_REQUEST["apellido_maternoE"];
    $email = $_REQUEST["emailE"];
    $perfil = $_REQUEST["perfilE"];
    $estado = $_REQUEST["estadoE"];

    //4.- Contruyo un objeto para el usuario
    $usuario = new Usuario();

    $usuario->setId_Usuario($id_usu);
    $usuario->setUsuario($usu);
    $usuario->setClave($clave);
    $usuario->setNombres($nombres);
    $usuario->setAp_Paterno($apPaterno);
    $usuario->setAp_Materno($apMaterno);
    $usuario->setEmail($email);
    $usuario->setEstado($estado);
    $usuario->setId_Perfil($perfil);

    //6.- LLamo al metodo updateUsuario del Data
    $data->updateUsuario($usuario);
    //7.- Redireccionar hacia Mantenedor.php con un mensaje a través del navegador
    echo "<script>
        alert('Usuario actualizado con exito!!');
        window.location= '../view/Mantenedor.php';
        </script>";
} else {
    //Si no vienen los datos, redirigir hacia Mantenedor.php con mensaje de error a través del método GET
    echo "<script>
                alert('¡¡Error Usuario no fue actualizado!!');
                window.location= '../view/Mantenedor.php';
            </script>";
}
