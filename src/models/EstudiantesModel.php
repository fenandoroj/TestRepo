<?php

// Comprobamos que no se accede directamente a este fichero consultando una constante
defined('_APPINIT') or exit('Acceso restringido');

class EstudiantesModel
{

  private $bdConnection;

  public function __construct()
  {
    // TODO: Inicializar conexión a la base de datos en $bdConection
  }

  public function getEstudiantes()
  {
    // TODO
    return [];
  }
}
