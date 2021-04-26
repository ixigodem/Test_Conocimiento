<?php 
include_once('../model/Data.php');

$id = $_REQUEST["id"];

$d = new Data();

$usuarios = $d->getUsuario($id);

echo json_encode($usuarios);
?>