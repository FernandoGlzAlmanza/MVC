<?php 

require('../Model/Conexion.php');

$con = new Conexion();

$file = $con->Tabla();

require('../Views/V_Menu.php');

?>