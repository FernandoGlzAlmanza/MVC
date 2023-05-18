<?php 

require('../Model/Conexion.php');

$con = new Conexion();

$usuarios = $con->addUsers();

require('../Views/V_Usuarios.php');

?>