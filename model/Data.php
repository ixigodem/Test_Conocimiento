<?php
require_once("Conexion.php");
require_once("../controller/Login.php");
require_once("Usuario.php");
require_once("Perfil.php");

class Data
{
    private $c;

    public function __construct()
    {
        $this->c = new Conexion(
            "test",
            "root",
            ""
        );
    }

    public function crearUsuario($usuario)
    {
        $query = "insert into usuario values(null,
        '" . $usuario->getUsuario() . "',
        '" . $usuario->getClave() . "',
        '" . $usuario->getNombres() . "',
        '" . $usuario->getAp_Paterno() . "',
        '" . $usuario->getAp_Materno() . "',
        '" . $usuario->getEmail() . "',
        '" . $usuario->getEstado() . "',
        " . $usuario->getId_Perfil() . ")";

        $this->c->conectar();
        $this->c->ejecutar($query);
    }

    public function getLogin($usuario, $clave)
    {
        $lista = array();

        $select = "select nombres, ap_paterno, ap_materno from usuario where usuario = '$usuario' and clave = '$clave';";

        $u = null;

        $this->c->conectar();

        $rs = $this->c->ejecutar($select);
        if ($obj = $rs->fetch_object()) {
            $u = new Usuario();

            $u->setNombres($obj->nombres);
            $u->setAp_Paterno($obj->ap_paterno);
            $u->setAp_Materno($obj->ap_materno);
        }

        $this->c->desconectar();
        return $u;
    }

    public function updateUsuario($usuario)
    {
        $query = "update usuario set 
        usuario = '" . $usuario->getUsuario() . "',
        clave = '" . $usuario->getClave() . "',
        nombres = '" . $usuario->getNombres() . "',
        ap_paterno = '" . $usuario->getAp_Paterno() . "',
        ap_materno = '" . $usuario->getAp_Materno() . "',
        email = '" . $usuario->getEmail() . "',
        estado = " . $usuario->getEstado() . ",
        id_perfil = " . $usuario->getId_Perfil() . "
        where id_usuario = " . $usuario->getId_Usuario() . ";";

        $this->c->conectar();
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function eliminarUsuario($id)
    {
        $delete = "delete from usuario where id_usuario = $id";

        $this->c->conectar();
        $this->c->ejecutar($delete);
        $this->c->desconectar();
    }

    //LISTAR
    public function validador($filtro)
    {
        $lista = array();

        $query = "SELECT usuario FROM usuario WHERE nombres LIKE '$filtro'";

        $u = null;

        $this->c->conectar();

        $rs = $this->c->ejecutar($query);
        if ($obj = $rs->fetch_object()) {
            $u = new Usuario();

            $u->setNombres($obj->nombres);
        }

        $this->c->desconectar();
        return $u;
    }

    public function getUsuarios()
    {
        $lista = array();

        $query = "SELECT u.id_usuario, u.usuario, u.nombres, u.ap_paterno, u.ap_materno, u.email, u.estado, p.perfil FROM usuario AS u INNER JOIN perfil AS p ON u.id_perfil = p.id_perfil;";

        $this->c->conectar();

        $rs = $this->c->ejecutar($query);

        while ($obj = $rs->fetch_object()) {
            array_push($lista, $obj);
        }

        $this->c->desconectar();

        return $lista;
    }

    public function getPerfil()
    {
        $lista = array();

        $select = "select * from perfil";

        $this->c->conectar();

        $rs = $this->c->ejecutar($select);
        while ($obj = $rs->fetch_object()) {
            array_push($lista, $obj);
        }

        $this->c->desconectar();
        return $lista;
    }

    public function getUsuario($id)
    {
        $lista = array();

        $select = "select * from usuario where id_usuario = $id";

        $this->c->conectar();

        $rs = $this->c->ejecutar($select);
        while ($obj = $rs->fetch_object()) {
            array_push($lista, $obj);
        }

        $this->c->desconectar();
        return $lista;
    }
}
