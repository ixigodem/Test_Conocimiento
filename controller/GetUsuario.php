<?php 
include_once('../model/Data.php');

$d = new Data();

$usuarios = $d->getUsuarios();

echo json_encode($usuarios);
