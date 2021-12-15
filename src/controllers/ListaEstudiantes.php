<?php

// Comprobamos que no se accede directamente a este fichero consultando una constante
defined('_APPINIT') or exit('Acceso restringido');

require_once  __DIR__.'/../models/EstudiantesModel.php';

class ListaEstudiantes
{

  private $estudiantesModel;

  public function __construct()
  {
    // Obtenemos el listado de estudiantes
    $this->estudiantesModel = new EstudiantesModel();
    $estudiantes = $this->estudiantesModel->getEstudiantes();

    // Imprimimos los estudiantes
    include_once __DIR__.'/../views/listaEstudiantes.php';
  }
}
