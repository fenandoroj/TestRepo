<?php
// Variable global para restringir el acceso directo a otros ficheros
define('_APPINIT', 1);

// Create Student
require_once  __DIR__ . '/src/models/ConexionBD.php';
require_once  __DIR__ . '/src/models/EstudiantesModel.php';

$conexionBD = new ConexionBD();
$bdConnection = $conexionBD->getConexionBD();

$id = $_POST["personaId"];

$data = array(
    'personaId' => $_POST["personaId"],
    'nombre' => $_POST["inputName"],
    'apellidos' => $_POST["inputApellido"],
    'email' => $_POST["inputEmail"],
    'prefijoTelefono' => $_POST["inputPrefijoTel"],
    'telefono' => $_POST["inputNumTel"],
    'tipoIdentificacion' => $_POST["inputTipoId"],
    'numeroIdentificacion' => $_POST["inputNumId"]
); // Array con los datos del nuevo usuario

$estudiantesModel = new EstudiantesModel($bdConnection);
$estudiante = new Estudiante($data);  
$estudiante->setPersonaID($data['personaId']);
$result = $estudiantesModel->delEstudiante($estudiante);


$titulo = !$result ? 'Error al eliminar el estudiante' : 'Estudiante eliminado correctamente';

// Vista de actualización de estudiante. Podemos reutilizar la vista de estudiante creado
include_once __DIR__ . '/src/views/student-created.php';

$conexionBD->closeConexionBD(); // Cerrar conexión a la base de datos