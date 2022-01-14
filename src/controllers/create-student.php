<?php
// Create Student
// Variable global para restringir el acceso directo a otros ficheros
define('_APPINIT', 1);

require_once  __DIR__ . '/../models/ConexionBD.php';
require_once  __DIR__ . '/../models/EstudiantesModel.php';

$conexionBD = new ConexionBD();
$bdConnection = $conexionBD->getConexionBD();

$nuevoEstudiante = array(
  'nombre' => $_POST["inputName"],
  'apellidos' => $_POST["inputApellido"],
  'email' => $_POST["inputEmail"],
  'prefijoTelefono' => $_POST["inputPrefijoTel"],
  'telefono' => $_POST["inputNumTel"],
  'tipoIdentificacion' => $_POST["inputTipoId"],
  'numeroIdentificacion' => $_POST["inputNumId"]
); // Array con los datos del nuevo usuario

$estudiantesModel = new EstudiantesModel($bdConnection);
$estudiante = new Estudiante($nuevoEstudiante);    
$insercion = $estudiantesModel->addEstudiante($estudiante);

$titulo = $insercion == -1 ? 'Error al agregar el estudiante' : 'Estudiante agregado correctamente';

// Vista de confirmación de estudiante
include_once __DIR__ . '/../views/student-confirmation.php';

$conexionBD->closeConexionBD(); // Cerrar conexión a la base de datos