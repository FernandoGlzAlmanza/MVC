<?php 

require('../Model/Conexion.php');

$con = new Conexion();

$file = $con->topGenero();

require('../Views/V_TopGenero.php');

?>