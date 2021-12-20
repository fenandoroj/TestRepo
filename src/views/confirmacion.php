<head>
        <title>Formulario de Registro</title>
        <!--<link href="estilos.css" rel="stylesheet" type="text/css" />-->
</head>
<body>
<?php
    require '.controllers/Listaestudiantes.php';
    $validarmail = validarmail($_POST["mail"]);//Funcion que valida si el correo es valido
    $nuevo = array("nombre" => $_POST["nombre"],
                    "apellido" => $_POST["apellido"],
                    "mail" => $_POST["mail"],
                    "pass" => $_POST["tipo"],
                    "dni" => $_POST["dni"],
                    "tipo" => $_POST["prefijo"],
                    "proyecto" => $_POST["telefono"]);//Array con los datos del nuevo usuario    

    if ($validarmail){
        $validarusuario = validarusuario($_POST["mail"]);//Funcion que valida si el usuario ya existe por correo
    }else{
        $validarusuario = false;//El correo no tiene formato adecuado
        $resultado = -2;
    }   
    
    if ($validarusuario){         
        $resultado = agregar($nuevo);//Adiciona los datos del usuario nuevo 
    }else{
        $resultado = -2;
    } 

    //Validacion del resultado de la operacion mostrando mensajes de error
	if ($resultado==-1){
        echo ("<h1 align='center'>Error en la creacion
        <form>
        <input type='submit' formaction='index.php' value='Aceptar'>
        </form></h1>");
	}elseif ($resultado==0){
        echo ("<h1 align='center'>Registro creado exitosamente.
        <form>
        <input type='submit' formaction='index.php' value='Aceptar'>
        </form></h1>");
    }elseif ($resultado==-2){
        echo ("<h1 align='center'>El usuario ya existe.
        <form>
        <input type='submit' formaction='index.php' value='Aceptar'>
        </form></h1>");
    }else{
        echo("<h1 align='center'>Los datos estan erroneos, por favor revisalos y vuelve a intentar.
        <form>
        <input type='submit' formaction='index.php' value='Aceptar'>
        </form></h1>");
    }

    //Funcion para adicionar usuarios, recibe un array asociativo con los datos ingresados
    function agregar ($usuario)
	{        
        $result = new AgregarEstudiantes($datos);
		return $result;
	}

    //Funcion que valida si el correo tiene un formato con el caracter '@'
    function validarmail ($mail)
	{
        $result = false;
		if (str_contains($mail, '@')) {
            $result = true;
        }                  
		return $result;
	}

    //Funcion que valida por correo si el usuario ya esta registrado
    function validarusuario ($mail)
	{
        $result = true;
        //validar si el ususario existe
		return $result;
	}
?>