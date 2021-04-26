<?php
//1.- Pregunto si los datos vienen del POST
require_once("../model/Data.php");
require_once("../model/Usuario.php");


if (isset($_POST["btnCrearUsuario"])) {
    //¿Pregunto si presiono el boton?
    //1.- Construyo el Objeto de la clase Data para usar la info en la busqueda
    $data = new Data();

    //2.- Si hay datos rescato el run con el vector $_REQUEST
    $name = $_REQUEST["nombres"];

    //3.- Verifico si el nombre ya existe
    $busqueda = $data->validador($name);
    if ($busqueda > 0) {
        echo "<script>
                    alert('¡¡Error el Usuario ya existe!!');
                    window.location= '../view/Mantenedor.php';
                </script>";
    } else {
        //4.- Si no existe rescato los datos de todo con el vector $_REQUEST
        $usu = $_REQUEST["usuario"];
        $clave = $_REQUEST["clave"];
        $nombres = $_REQUEST["nombres"];
        $apPaterno = $_REQUEST["apellidoPaterno"];
        $apMaterno = $_REQUEST["apellidoMaterno"];
        $email = $_REQUEST["email"];
        $perfil = $_REQUEST["perfil"];
        $estado = $_REQUEST["estado"];

        //5.- Contruyo un objeto para el Paciente
        $usuario = new Usuario();

        $usuario->setUsuario($usu);
        $usuario->setClave($clave);
        $usuario->setNombres($nombres);
        $usuario->setAp_Paterno($apPaterno);
        $usuario->setAp_Materno($apMaterno);
        $usuario->setEmail($email);
        $usuario->setEstado($estado);
        $usuario->setId_Perfil($perfil);

        //6.- LLamo al metodo crearUsuario del Data
        $data->crearUsuario($usuario);

        //7.- Redireccionar hacia Mantenedor.php con un mensaje a través del navegador
        echo "<script>
        alert('Usuario creado con exito!!');
        window.location= '../view/Mantenedor.php';
        </script>";
    }
} else {
    //Si no vienen los datos, redirigir hacia Mantenedor.php con mensaje de error a través del método GET
    echo "<script>
                alert('¡¡Error Usuario no fue creado!!');
                window.location= '../view/Mantenedor.php';
            </script>";
}
?>