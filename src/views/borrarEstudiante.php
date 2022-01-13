<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index::</title>
    <!-- FontAwesome, iconos -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!-- Boostrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom"> 
            <ul class="nav nav-pills">
                <li class="nav-item"><a href="/gestion-estudiantes/index.php" class="nav-link" aria-current="page">Estudiantes</a></li>
                <li class="nav-item"><a href="src/views/asignaturas.php" class="nav-link">Asignaturas</a></li>
                <li class="nav-item"><a href="src/views/profesores.php" class="nav-link">Profesores</a></li>
            </ul>
        </header>   
    </div>
    
    <div class="container">
        <form action="delete-student.php" method="POST">
            <div class="mb-1">
                <input type="hidden" class="form-control" id="personaId" name="personaId" value= "<?php echo $result->personaId ; ?>" >
                <label for="inputName" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="inputName" name="inputName" value= "<?php echo $result->nombre ; ?>" readonly>
            </div>
            <div class="mb-1">
                <label for="inputApellido" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="inputApellido" name="inputApellido" value= "<?php echo $result->apellidos ; ?>" readonly>
            </div>
            <div class="mb-1">
                <label for="inputEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" name="inputEmail" value= "<?php echo $result->email ; ?>" readonly>
            </div>
            <div class="mb-1">
                <label for="inputTipoId" class="form-label">Tipo Identificación</label>
                <select class="form-control form-select" aria-label="Default select example" id="inputTipoId" name="inputTipoId" readonly>
                    <option value="DNI" <?php if ($result->tipoIdentificacion == 'DNI') echo 'selected' ?>>DNI - Documento Nacional de Identidad</option>
                    <option value="NIE" <?php if ($result->tipoIdentificacion == 'NIE') echo 'selected' ?>>NIE - Número de Identificación de Extranjeros</option>
                    <option value="PASSPORT" <?php if ($result->tipoIdentificacion == 'PASSPORT') echo 'selected' ?>>Pasaporte</option>
                </select>
            </div>
            <div class="mb-1">
                <label for="inputNumId" class="form-label">N° Identificación</label>
                <input type="text" class="form-control" id="inputNumId" name="inputNumId" value= "<?php echo $result->numeroIdentificacion ; ?>" readonly>
            </div>

            <div class="mb-1">
                <label for="inputPrefijoTel" class="form-label">Prefijo Teléfono</label>
                <input type="text" class="form-control" id="inputPrefijoTel" name="inputPrefijoTel" value= "<?php echo $result->prefijoTelefono ; ?>" readonly>
            </div>
            <div class="mb-1">
                <label for="inputNumTel" class="form-label">N° Teléfono</label>
                <input type="text" class="form-control" id="inputNumTel" name="inputNumTel" value= "<?php echo $result->telefono ; ?>" readonly>
            </div>

            <button type="submit" class="btn btn-primary">Eliminar</button>
        </form>
    </div>
</body>
</html>