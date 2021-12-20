<html>
    <head>
        <title>Formulario de Registro</title>
        <!--<link href="estilos.css" rel="stylesheet" type="text/css" />-->
    </head>
    <body>
        <h1>Formulario de Registro</h1>
<?php
/* Formulario con los datos del usuario a registrar*/
    echo "<form action='confirmacion.php' method='post'>";//Llamado a confirmacion.php para procesar los datos.
	echo "<table><tr><th>Nombre</th>";
	echo "<td> <input type='text' name='nombre' value=''></td>";
    echo "</tr>";
    echo "<tr><th>Apellido</th>";
	echo "<td> <input type='text' name='apellido' value=''></td>";
    echo "</tr>";
    echo "<tr><th>Correo</th>";
    echo "<td> <input type='text' name='mail' value=''></td>";
    echo "</tr>";
    echo "<tr><th>Tipo Identificacion</th>";
    echo "<td> <input type='text' name='tipo' value=''></td>";
    echo "</tr>";
    echo "<tr><th>N. Identificacion</th>";
	echo "<td> <input type='text' name='dni' value=''></td>";
    echo "</tr>";
    echo "<tr><th>Prefijo</th>";
	echo "<td> <input type='text' name='prefijo' value=''></td>";
    echo "</tr>";
    echo "<tr><th>Telefono</th>";
	echo "<td> <input type='text' name='telefono' value=''></td>";
    echo "</tr>";
	echo "<td> <input type='submit' name='boton' value='Registrarse'></td>";
	echo "</tr>";
	echo "</table>";
    echo "</form>";
?>
</body>