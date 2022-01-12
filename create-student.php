<?php
// Create Student
require_once  './src/models/ConexionBD.php';
$conexionBD = new ConexionBD();
$bdConnection = $conexionBD->getConexionBD();


// // Variable global para restringir el acceso directo a otros ficheros
define('_APPINIT', 1);

$nuevo = array(
  $_POST["inputName"],
  $_POST["inputApellido"],
  $_POST["inputEmail"],
  $_POST["inputPrefijoTel"],
  $_POST["inputNumTel"],
  $_POST["inputTipoId"],
  $_POST["inputNumId"]
); //Array con los datos del nuevo usuario    
echo $nuevo[5];
require './src/controllers/ListaEstudiantes.php';
new AgregarEstudiantes($bdConnection,$nuevo[0], $nuevo[1], $nuevo[2], $nuevo[3], $nuevo[4], $nuevo[5], $nuevo[6]);


?>