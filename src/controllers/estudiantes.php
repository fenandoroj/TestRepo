<?php
// Index
// Variable global para restringir el acceso directo a otros ficheros
define('_APPINIT', 1);

require_once  __DIR__ . '/../models/ConexionBD.php';
require_once  __DIR__ . '/../models/EstudiantesModel.php';

$conexionBD = new ConexionBD(); // Iniciar conexión a la base de datos
$bdConnection = $conexionBD->getConexionBD(); // Obtener conexión a la base de datos

$estudiantesModel = new EstudiantesModel($bdConnection);
$estudiantes = $estudiantesModel->getEstudiantes();

$titulo = 'Listado de estudiantes';

// Vista de estudiantes
include_once __DIR__ . '/../views/listaEstudiantes.php';

$conexionBD->closeConexionBD(); // Cerrar conexión a la base de datos
