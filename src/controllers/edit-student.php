<?php
// Create Student

// Variable global para restringir el acceso directo a otros ficheros
define('_APPINIT', 1);

require_once  __DIR__ . '/../models/ConexionBD.php';
require_once  __DIR__ . '/../models/EstudiantesModel.php';

$conexionBD = new ConexionBD();
$bdConnection = $conexionBD->getConexionBD();

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
$result = $estudiantesModel->updateEstudiante($estudiante);

$titulo = !$result ? 'Error al actualizar el estudiante' : 'Estudiante actualizado correctamente';

// Vista de actualización de estudiante. Podemos reutilizar la vista de estudiante creado
include_once __DIR__ . '/../views/student-created.php';

$conexionBD->closeConexionBD(); // Cerrar conexión a la base de datos