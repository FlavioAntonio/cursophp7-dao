<?php

require_once("class/config.php");
$sql = new Sql();
$usuario = $sql->select("SELECT * FROM funcionario");

echo json_encode($usuario);
?>