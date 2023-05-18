<?php 

require('../Model/Conexion.php');

$con = new Conexion();

$file = $con->cancionesmasrecientes();

require('../Views/V_Reciente.php');

?>