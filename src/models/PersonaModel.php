<?php
// Comprobamos que no se accede directamente a este fichero consultando una constante
defined('_APPINIT') or exit('Acceso restringido');

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
        $this->bdConnection->query($query)=== TRUE;
        return $this->bdConnection->insert_id;
    }

    public function delPersona($persona){
        $query = "DELETE FROM ".$this->table." WHERE id = ".$persona->id;
        if($this->bdConnection->query($query)=== TRUE){
          return true;
        }else{
          return false;
        }     
    }

    public function updatePersona($persona){
        $query = "UPDATE ".$this->table." 
        SET nombre ='".$persona->nombre."',
        apellidos='".$persona->apellidos.
        "' WHERE id=".$persona->id;
        if($this->bdConnection->query($query)=== TRUE) {       
          return true;    
        }else{
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