<?php
class PersonaModel{
    public $table;
    private $bdConnection;
    public function __construct($bdConnection)
    {
        $this->table = 'personas';
        $this->bdConnection = $bdConnection;
    }

    public function addPersona($persona){
        $query = "INSERT INTO ".$this->table."(nombre, apellidos) 
        VALUES ( '".$persona->nombre."','".$persona->apellidos."')";
        if($this->bdConnection->query($query)=== TRUE){
            //echo "Creado persona";
        }else{
            //echo "Error crear persona: ".$query."<br>". $this->bdConnection->error;
        } 
        return $this->bdConnection->insert_id;
    }

    public function delPersona($persona){
        $query = "DELETE FROM ".$this->table." WHERE id = ".$persona->id;
        if($this->bdConnection->query($query)=== TRUE){
          //echo "eliminada persona";
          return true;
        }else{
          //echo "Error eliminar persona: ".$query."<br>". $this->bdConnection->error;
          return false;
        }     
    }

    public function updatePersona($persona){
        $query = "UPDATE ".$this->table." 
        SET nombre ='".$persona->nombre."',
        apellidos='".$persona->apellidos.
        "' WHERE id=".$persona->id;
        if($this->bdConnection->query($query)=== TRUE){
          //echo "Actualizado estudiante";          
          return true;    
        }else{
          //echo "Error actualizar estudiante: ".$query."<br>". $this->bdConnection->error;
          return false;
        }
    
    }

}
class Persona{
    public $id;
    public $nombre;
    public $apellidos;
    public function __construct($nombre, $apellidos)
    {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
    }

    public function setId($id){
        $this->id=$id;
    }
}
?>