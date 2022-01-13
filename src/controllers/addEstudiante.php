<?php
// Variable global para restringir el acceso directo a otros ficheros
define('_APPINIT', 1);

$titulo = 'Añadir estudiante';

// Vista de añadir estudiantes
include_once __DIR__ . '/../views/addEstudiante.php';