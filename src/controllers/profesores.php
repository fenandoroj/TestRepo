<?php
// Profesroes
// Variable global para restringir el acceso directo a otros ficheros
define('_APPINIT', 1);

require_once  __DIR__ . '/../models/ConexionBD.php';
require_once  __DIR__ . '/../models/ProfesoresModel.php';

$conexionBD = new ConexionBD(); // Iniciar conexión a la base de datos
$bdConnection = $conexionBD->getConexionBD(); // Obtener conexión a la base de datos

$profesoresModel = new ProfesoresModel($bdConnection);
$profesores = $profesoresModel->getProfesores();

$titulo = 'Listado de profesores';

// Vista de profesores
include_once __DIR__ . '/../views/listaProfesores.php';

$conexionBD->closeConexionBD(); // Cerrar conexión a la base de datos
