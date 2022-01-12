<?php
// Create Student
require_once  './src/models/ConexionBD.php';
$conexionBD = new ConexionBD();
$bdConnection = $conexionBD->getConexionBD();


// // Variable global para restringir el acceso directo a otros ficheros
define('_APPINIT', 1);


$id = $_GET["id"];
require './src/controllers/ListaEstudiantes.php';
new EstudianteByID($bdConnection, $id);


?>