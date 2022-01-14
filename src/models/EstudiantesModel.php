<?php
// Comprobamos que no se accede directamente a este fichero consultando una constante
defined('_APPINIT') or exit('Acceso restringido');

// require_once  './src/models/ConexionBD.php';
require_once 'PersonaModel.php';
class EstudiantesModel
{
  private $bdConnection;
  private $table;
  
  public function __construct($bdConnection)
  {
    $this->table = 'estudiantes';
    $this->bdConnection = $bdConnection;    
  }


  public function getEstudiantes()
  {
    $query = "SELECT Personas.nombre, Personas.apellidos, Estudiantes.* FROM ".$this->table." INNER JOIN Personas ON Personas.id = Estudiantes.personaId";
    $result = $this->bdConnection->query($query); 
    return $result;    
  }

  public function getEstudianteByPersonaID($personaID){
    $query = "SELECT Personas.*, Estudiantes.* FROM ".$this->table." INNER JOIN Personas ON Personas.id = Estudiantes.personaId WHERE personaId=".$personaID;
    $result = $this->bdConnection->query($query);    

    if($this->bdConnection->error){
      echo "Error obtener estudiante: ".$query."<br>". $this->bdConnection->error;
    }
    return $result->fetch_object();  
  }

  public function addEstudiante($estudiante)
  {
    $personaModel = new PersonaModel($this->bdConnection);
    $personaId = $personaModel->addPersona($estudiante);
    $estudiante->setPersonaID($personaId);
    $query = "INSERT INTO ".$this->table."(personaId, email, prefijoTelefono, telefono,tipoIdentificacion,numeroIdentificacion) 
    VALUES ( '".$personaId."','".$estudiante->email."','".$estudiante->prefijoTelefono."','".$estudiante->telefono."','".$estudiante->tipoIdentificacion."','".$estudiante->numeroIdentificacion."')";
    if($this->bdConnection->query($query)=== TRUE){
      return $personaId;
    }
    return -1;
    
  }

  public function delEstudiante($estudiante){
    $query = "DELETE FROM ".$this->table." WHERE personaId = ".$estudiante->personaId;
    if($this->bdConnection->query($query)=== TRUE){ 
      $personaModel = new PersonaModel($this->bdConnection);
      return $personaModel->delPersona($estudiante);
    } else{
      return false;
    }     
  }

  public function updateEstudiante($estudiante){
    $query = "UPDATE ".$this->table." 
    SET email ='".$estudiante->email."',
    prefijoTelefono='".$estudiante->prefijoTelefono."',
    telefono='".$estudiante->telefono."',
    tipoIdentificacion='".$estudiante->tipoIdentificacion."',
    numeroIdentificacion='".$estudiante->numeroIdentificacion."' WHERE personaId=".$estudiante->personaId;
    if($this->bdConnection->query($query)=== TRUE){
      $personaModel = new PersonaModel($this->bdConnection);
      return $personaModel->updatePersona($estudiante);     
    } else{
      return false;
    }

  }
}

class Estudiante extends Persona{
  public $personaId;
  public $email;
  public $prefijoTelefono;
  public $telefono;
  public $tipoIdentificacion;
  public $numeroIdentificacion;
  public function __construct($estudiante)
  {
    $this->nombre = $estudiante['nombre'];
    $this->apellidos = $estudiante['apellidos'];
    $this->email = $estudiante['email'];
    $this->prefijoTelefono = $estudiante['prefijoTelefono'];
    $this->telefono = $estudiante['telefono'];
    $this->tipoIdentificacion = $estudiante['tipoIdentificacion'];
    $this->numeroIdentificacion = $estudiante['numeroIdentificacion'];    
  }

  public function setPersonaID($personaId){
    $this->personaId = $personaId;
    $this->setId($personaId);
  }
}
?>