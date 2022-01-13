<?php
// Variable global para restringir el acceso directo a otros ficheros
define('_APPINIT', 1);

// Create Student
require_once  __DIR__ . '/../models/ConexionBD.php';
require_once  __DIR__ . '/../models/EstudiantesModel.php';


$conexionBD = new ConexionBD();
$bdConnection = $conexionBD->getConexionBD();

$id = $_GET["id"];
$estudiantesModel = new EstudiantesModel($bdConnection);
$result = $estudiantesModel->getEstudianteByPersonaID($id);

$titulo = 'Eliminar estudiante';

// Vista de Borrar estudiante
include_once __DIR__ . '/../views/borrarEstudiante.php';

$conexionBD->closeConexionBD(); // Cerrar conexión a la base de datos