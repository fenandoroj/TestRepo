<?php
// Comprobamos que no se accede directamente a este fichero consultando una constante
defined('_APPINIT') or exit('Acceso restringido');

class AsignaturaEstudianteModel{
  public $table;
  private $bdConnection;
  public function __construct($bdConnection)
  {
      $this->table = 'asignaturasestudiantes';
      $this->bdConnection = $bdConnection;
  }

  public function addAsignaturaEstudiante($asignaturaEstudiante) {
    $query = "INSERT INTO ".$this->table."(asignaturaId, estudianteId) 
    VALUES ( '".$asignaturaEstudiante->asignaturaId."','".$asignaturaEstudiante->estudianteId."')";
    if($this->bdConnection->query($query)=== TRUE){
      echo "Creado asignaturaEstudiante";
    }else{
      echo "Error creando asignaturaEstudiante: ".$query."<br>". $this->bdConnection->error;
    } 
    return $this->bdConnection->insert_id;  
  }

  public function delAsignaturaEstudiante($asignaturaEstudiante){
    $query = "DELETE FROM ".$this->table." WHERE asignaturaId = ".$asignaturaEstudiante->asignaturaId." AND estudianteId =".$asignaturaEstudiante->estudianteId;
    if($this->bdConnection->query($query)=== TRUE){
      echo "Eliminado AsignaturaEstudiante";      
      return true;
    }else{
      echo "Error eliminando AsignaturaEstudiante: ".$query."<br>". $this->bdConnection->error;
      return false;
    }   
  }
}

class AsignaturaEstudiante{
  public $asignaturaId;
  public $estudianteId;
  public function __construct($asignaturaId,$estudianteId){
    $this->asignaturaId = $asignaturaId;
    $this->estudianteId = $estudianteId;
  }
}
?>