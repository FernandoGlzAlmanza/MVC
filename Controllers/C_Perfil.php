<?php 

require('../Model/Conexion.php');

$con = new Conexion();

$usuarios = $con->cargarUsuarios();

require('../Views/V_Perfil.php');

?>