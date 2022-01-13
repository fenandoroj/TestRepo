<?php
// Variable global para restringir el acceso directo a otros ficheros
define('_APPINIT', 1);

require_once  __DIR__ . '/src/models/ConexionBD.php';
require_once  __DIR__ . '/src/models/AsignaturaModel.php';

$conexionBD = new ConexionBD(); // Iniciar conexión a la base de datos
$bdConnection = $conexionBD->getConexionBD(); // Obtener conexión a la base de datos

$asignaturaModel = new AsignaturaModel($bdConnection);
$asignaturas = $asignaturaModel->getAsignaturas();

$titulo = 'Listado de asignaturas';
    
// Vista de estudiantes
include_once __DIR__ . '/src/views/listaAsignaturas.php';

$conexionBD->closeConexionBD(); // Cerrar conexión a la base de datos