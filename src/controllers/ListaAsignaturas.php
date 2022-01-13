<?php

// Comprobamos que no se accede directamente a este fichero consultando una constante
defined('_APPINIT') or exit('Acceso restringido');

require_once  __DIR__.'/../models/AsignaturaModel.php';

class ListaAsignaturas
{
  private $asignaturaModel;  
  
  public function __construct($bdConnection)
  {
    // Obtenemos el listado de estudiantes
    $this->asignaturaModel = new AsignaturaModel($bdConnection);
    $asignaturas = $this->asignaturaModel->getAsignaturas();
    
    // Imprimimos los estudiantes
    include_once __DIR__.'/../views/listaAsignaturas.php';
  }
}
?>