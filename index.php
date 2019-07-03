<?php

require_once("config.php");
//carrega um usuario
//$root = new Usuario();
//$root->loadByid(2);
//echo $root;

//carrega uma lista de usuario

$lista = Usuario::getList();
echo json_encode($lista);

?>