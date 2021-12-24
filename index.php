<?php
// Index
require_once  './src/models/ConexionBD.php';
$conexionBD = new ConexionBD();
$bdConnection = $conexionBD->getConexionBD();
require './lista-estudiantes.php';
/* Ejemplo para probar la inserción de un estudiante
$nombre = 'testAleja';
$apellidos = 'testAlejaApellido';
$email = 'test@aleja.com';
$prefijoTelefono = '34';
$telefono = '666666666';
$tipoIdentificacion = 'tes';
$numeroIdentificacion = '123456789';
$AgregarEstudiantes = new AgregarEstudiantes($bdConnection, $nombre, $apellidos, $email,$prefijoTelefono,$telefono,$tipoIdentificacion,$numeroIdentificacion);
*/
?>;
