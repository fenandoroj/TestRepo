<?php

// Comprobamos que no se accede directamente a este fichero consultando una constante
defined('_APPINIT') or exit('Acceso restringido');

require_once  __DIR__.'/../models/EstudiantesModel.php';

class ListaEstudiantes
{

  private $estudiantesModel;

  public function __construct($bdConnection)
  {
    // Obtenemos el listado de estudiantes
    $this->estudiantesModel = new EstudiantesModel($bdConnection);
    $estudiantes = $this->estudiantesModel->getEstudiantes();

    // Imprimimos los estudiantes
    include_once __DIR__.'/../views/listaEstudiantes.php';
  }
}

class AgregarEstudiantes
{
  private $estudiantesModel;
  private $estudiante;

  public function __construct($bdConnection, $nombre, $apellidos, $email,$prefijoTelefono,$telefono,$tipoIdentificacion,$numeroIdentificacion)
  {
    
    $this->estudiantesModel = new EstudiantesModel($bdConnection);
    $this->estudiante = new Estudiante($nombre, $apellidos, $email,$prefijoTelefono,$telefono,$tipoIdentificacion,$numeroIdentificacion);    
    $result = $this->estudiantesModel->addEstudiante($this->estudiante);
    /* Ejemplo para probar actualización y eliminación de estudiante.
    echo ' id estudiante '.$result;
    echo $this->estudiantesModel->getEstudianteByPersonaID($result)->personaId;
    $this->estudiante->nombre='nombreActualizado';
    $this->estudiantesModel->updateEstudiante($this->estudiante);
    $this->estudiantesModel->delEstudiante($this->estudiante);
    */
  }
}
?>