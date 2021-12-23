<?php

// Variable global para restringir el acceso directo a otros ficheros
define('_APPINIT', 1);

require './src/controllers/ListaEstudiantes.php';
new ListaEstudiantes();
?>
