<?php
class ConexionBD{
    private $bdConnection;
    public function __construct()
    {
        //Inicializar conexión a la base de datos en $bdConection
        $this->setConexionBD();
    }
    public function getConexionBD(){
        //Obtener conexión a la base de datos en $bdConection
        return $this->bdConnection;
    }

    public function setConexionBD(){
        $this->bdConnection = new mysqli('localhost', 'root', '', 'gestion-estudiantes');
        if($this->bdConnection->connect_error){
            die('Error de Conexion ('.$this->bdConnection->connect_errno.')'.$this->bdConnection->connect_error);
        }
        // echo 'Exito '.$this->bdConnection->host_info.'<br>';
    }

    public function closeConexionBD(){
        //Cerrar conexión a la base de datos en $bdConection
        $this->bdConnection->close();
    }
}
?>
