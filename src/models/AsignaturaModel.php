<?php
class AsignaturaModel{
    public $table;
    private $bdConnection;
    public function __construct($bdConnection)
    {
        $this->table = 'asignaturas';
        $this->bdConnection = $bdConnection;
    }

    public function getAsignaturas()
    {
        // TODO
        $query = "SELECT * FROM ".$this->table;
        $result = $this->bdConnection->query($query); 

        return $result;    
    }
}

class Asignatura{

}
?>