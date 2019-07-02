<?php

require_once("config.php");

$root = new Usuario();
$root->loadByid(2);
echo $root;

?>