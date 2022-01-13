<?php

// Comprobamos que no se accede directamente a este fichero consultando una constante
defined('_APPINIT') or exit('Acceso restringido');

require_once  __DIR__.'/../models/ProfesoresModel.php';

class ListaProfesores
{
  private $profesoresModel;  
  
  public function __construct($bdConnection)
  {
    // Obtenemos el listado de profesores
    $this->profesoresModel = new ProfesoresModel($bdConnection);
    $profesores = $this->profesoresModel->getProfesores();
    
    // Imprimimos los profesores
    include_once __DIR__.'/../views/listaProfesores.php';
  }
}
?>