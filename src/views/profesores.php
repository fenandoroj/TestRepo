<?php
// // Index
// Variable global para restringir el acceso directo a otros ficheros
define('_APPINIT', 1);
require_once  '../models/ConexionBD.php';
$conexionBD = new ConexionBD();//Iniciar conexión a la base de datos
$bdConnection = $conexionBD->getConexionBD();//Obtener conexión a la base de datos
require '../controllers/ListaProfesores.php';
new ListaProfesores($bdConnection);//Obtener la lista de Estudiantes
$conexionBD->closeConexionBD();//Cerrar conexión a la base de datos
?>