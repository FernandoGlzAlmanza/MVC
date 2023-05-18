<?php 

require('../Model/Conexion.php');

$con = new Conexion();

$file = $con->topReproducciones();

require('../Views/V_TopReproducciones.php');

?>