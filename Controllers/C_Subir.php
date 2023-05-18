<?php 

require('../Model/Conexion.php');

$con = new Conexion();

$file = $con->CargarArchivo();

require('../Views/V_Subir.php');

?>