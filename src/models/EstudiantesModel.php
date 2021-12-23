<?php

// Comprobamos que no se accede directamente a este fichero consultando una constante
defined('_APPINIT') or exit('Acceso restringido');

class EstudiantesModel
{

  private $bdConnection;

  public function __construct()
  {
    // TODO: Inicializar conexión a la base de datos en $bdConection7
    $bdConnection = new mysqli('localhost', 'root', '', 'gestion-estudiantes');
    echo 'aqui 15';
    if($bdConnection->connect_error){
      echo 'aqui 17';
      die('Error de Conexion ('.$bdConnection->connect_errno.')'.$bdConnection->connect_error);
    }
    echo 'Exito '.$bdConnection->host_info;
    $bdConnection->close();
  }

  public function getEstudiantes()
  {
    // TODO
    return [];
  }

  public function addEstudiante($datos)
  {
    // TODO
    return true;
  }
}
?>