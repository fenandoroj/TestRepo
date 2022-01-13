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

    if($result == -1)echo ("<h1 align='center'>Error al agregar el estudiante.
    <form>
    <input type='submit' formaction='../../index.php' value='Aceptar'>
    </form></h1>");
    else echo ("<h1 align='center'>Estudiante agregado correctamente.
    <form>
    <input type='submit' formaction='../../index.php' value='Aceptar'>
    </form></h1>");
    
    /* Ejemplo para probar actualización y eliminación de estudiante.
    echo ' id estudiante '.$result;
    echo $this->estudiantesModel->getEstudianteByPersonaID($result)->personaId;
    $this->estudiante->nombre='nombreActualizado';
    $this->estudiantesModel->updateEstudiante($this->estudiante);
    $this->estudiantesModel->delEstudiante($this->estudiante);
    */
  }
}

class EstudianteByID
{
  private $estudiantesModel;

  public function __construct($bdConnection, $id)
  {
    
    $this->estudiantesModel = new EstudiantesModel($bdConnection);
    
    $result = $this->estudiantesModel->getEstudianteByPersonaID($id);

    include_once __DIR__.'/../views/editEstudiante.php';
  }
}

class EstudianteByIDDelete
{
  private $estudiantesModel;

  public function __construct($bdConnection, $id)
  {
    
    $this->estudiantesModel = new EstudiantesModel($bdConnection);
    
    $result = $this->estudiantesModel->getEstudianteByPersonaID($id);

    include_once __DIR__.'/../views/borrarEstudiante.php';
  }
}

class ActualizarEstudiantes
{
  private $estudiantesModel;
  private $estudiante;

  public function __construct($bdConnection, $personaId, $nombre, $apellidos, $email,$prefijoTelefono,$telefono,$tipoIdentificacion,$numeroIdentificacion)
  {
    
    $this->estudiantesModel = new EstudiantesModel($bdConnection);
    $this->estudiante = new Estudiante($nombre, $apellidos, $email,$prefijoTelefono,$telefono,$tipoIdentificacion,$numeroIdentificacion);  
    $this->estudiante->setPersonaID($personaId);
    $result = $this->estudiantesModel->updateEstudiante($this->estudiante);

    if(!$result)echo ("<h1 align='center'>Error al actualizar el estudiante.
    <form>
    <input type='submit' formaction='../../index.php' value='Aceptar'>
    </form></h1>");
    else echo ("<h1 align='center'>Estudiante actualizado correctamente.
    <form>
    <input type='submit' formaction='../../index.php' value='Aceptar'>
    </form></h1>");
  }
}

class EliminarEstudiante
{
  private $estudiantesModel;
  private $estudiante;

  public function __construct($bdConnection, $personaId, $nombre, $apellidos, $email,$prefijoTelefono,$telefono,$tipoIdentificacion,$numeroIdentificacion)
  {
    
    $this->estudiantesModel = new EstudiantesModel($bdConnection);
    $this->estudiante = new Estudiante($nombre, $apellidos, $email,$prefijoTelefono,$telefono,$tipoIdentificacion,$numeroIdentificacion);  
    $this->estudiante->setPersonaID($personaId);
    $result = $this->estudiantesModel->delEstudiante($this->estudiante);

    if(!$result)echo ("<h1 align='center'>Error al eliminar el estudiante.
    <form>
    <input type='submit' formaction='../../index.php' value='Aceptar'>
    </form></h1>");
    else echo ("<h1 align='center'>Estudiante eliminado correctamente.
    <form>
    <input type='submit' formaction='../../index.php' value='Aceptar'>
    </form></h1>");
  }
}
?>