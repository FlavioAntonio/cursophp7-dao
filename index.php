<?php

require_once("config.php");
//carrega um usuario
//$root = new Usuario();
//$root->loadByid(2);
//echo $root;

//carrega uma lista de usuario

//$lista = Usuario::getList();
//echo json_encode($lista);

//Carrega uma lista de usuarios buscando pelo login

//$search = Usuario::search("pedro");
//echo json_encode($search);

//Carregar um usuario usando login e a senha

//$usuario = new Usuario();
//$usuario->login("xanhoso.filho", "RFEDWSYGT%$");
//echo $usuario;

//Criando um novo usuario
//$aluno = new Usuario("Ferreira da silva","Antonio","fadsfa");

//$aluno->insert();

//echo $aluno;


$usuario = new Usuario();

$usuario->loadByid(6);

$usuario->update("Ricardo oliveira", "ricardo.oliveira","EDEDEDGGG");

echo $usuario;

?>