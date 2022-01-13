<?php
// Create Student
require_once  '../models/ConexionBD.php';
$conexionBD = new ConexionBD();
$bdConnection = $conexionBD->getConexionBD();


// // Variable global para restringir el acceso directo a otros ficheros
define('_APPINIT', 1);


$id = $_GET["id"];
require '../controllers/ListaEstudiantes.php';
new EstudianteByID($bdConnection, $id);


?>