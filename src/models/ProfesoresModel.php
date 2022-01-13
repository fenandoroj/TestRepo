<?php
// Comprobamos que no se accede directamente a este fichero consultando una constante
defined('_APPINIT') or exit('Acceso restringido');

require_once 'PersonaModel.php';
class ProfesoresModel
{
  private $bdConnection;
  private $table;
  
  public function __construct($bdConnection)
  {
    $this->table = 'profesores';
    $this->bdConnection = $bdConnection;    
  }

  public function getProfesores()
  {
    $query = "SELECT Personas.nombre, Personas.apellidos, profesores.* FROM ".$this->table." INNER JOIN Personas ON Personas.id = profesores.personaId";
    $result = $this->bdConnection->query($query); 

    return $result;    
  }
}

class Profesores extends Persona{
  public $personaId;
  public $email;
  public $prefijoTelefono;
  public $telefono;
  public $tipoIdentificacion;
  public $numeroIdentificacion;
  public function __construct($nombre, $apellidos, $email,$prefijoTelefono,$telefono,$tipoIdentificacion,$numeroIdentificacion)
  {
    $this->nombre = $nombre;
    $this->apellidos = $apellidos;
    $this->email = $email;
    $this->prefijoTelefono = $prefijoTelefono;
    $this->telefono = $telefono;
    $this->tipoIdentificacion = $tipoIdentificacion;
    $this->numeroIdentificacion = $numeroIdentificacion;    
  }

  public function setPersonaID($personaId){
    $this->personaId = $personaId;
    $this->setId($personaId);
  }
}
?>