<?php
class AsignaturaModel{
    public $table;
    private $bdConnection;
    public function __construct($bdConnection)
    {
        $this->table = 'asignaturas';
        $this->bdConnection = $bdConnection;
    }
}

class Asignatura{

}
?>