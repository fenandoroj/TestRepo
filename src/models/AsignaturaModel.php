<?php
// Comprobamos que no se accede directamente a este fichero consultando una constante
defined('_APPINIT') or exit('Acceso restringido');

class AsignaturaModel{
    public $table;
    private $bdConnection;
    public function __construct()
    {
        $conexionBD = new ConexionBD(); // Iniciar conexión a la base de datos
        $bdConnection = $conexionBD->getConexionBD(); // Obtener conexión a la base de datos
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