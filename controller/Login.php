
<?php
if (isset($_POST["btnIniciarSesion"])) {
    $usuario = $_REQUEST["usuario"];
    $clave = $_REQUEST["clave"];

    require_once("../model/Data.php");
    require_once("../model/Usuario.php");
    $data = new Data();

    $u = $data->getLogin($usuario, $clave);

    if ($u == null) {
        //Error
        session_destroy();

        echo "<script>
            alert('¡¡Usuario o contraseña invalida, favor ingresar nuevamente!!');
            window.location= '../index.php'
        </script>";
    } else {
        //OK
        session_start();

        $_SESSION["usuario"] = serialize($u);

        header("location: ../view/Mantenedor.php");
    }
} else {
    header("localtion: ../index.php");
}
?>