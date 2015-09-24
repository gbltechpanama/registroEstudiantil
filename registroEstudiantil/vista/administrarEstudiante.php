<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Administrar Estudiante</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/estilos.css" rel="stylesheet" type="text/css">
        <script>
            function verTodo()
            {
            }
        </script>
    </head>
    <body>
        <header>
            <div class="logo"></div>
            <div class="barra"></div>
            <div class="barra2"></div>
        </header>
        <main>
            <div class="mostrarDatos">
                <?php
                    session_start();
                    $foto = $_POST['rutaFotoEstudiante'];
                    $nombre = $_POST['nombreEstudiante'];
                    $apellido = $_POST['apellidoEstudiante'];
                    $cedula = $_POST['cedulaEstudiante'];
                    $telefono = $_POST['telefonoEstudiante'];
                    $direccion = $_POST['direccionEstudiante'];
                    $email = $_POST['email'];
                    $fechaNacimiento = $_POST['fechaNac'];
                    $lugarNacimiento = $_POST['lugarNac'];
                    $lugarTrabajo = $_POST['lugarTrabajo'];
                    $cargoTrabajo = $_POST['cargoTrabajo'];
                    printf("<img src=\"img/".$foto."\" class=\"mostrarFoto2\" alt=\"Foto\"/>");
                    printf("<div class=\"mostrarNombre2\">".$nombre."  ".$apellido."</div>");
                    printf("<div class=\"mostrarCedula2\">C.I. ".$cedula."</div>");
                    printf("<div class=\"mostrarTelefono3\">Tel&eacute;fono: ".$telefono."</div>");
                ?>
                <img src="img/verTodo.png" width="123" height="27" alt="Ver Todo" class="botonVerTodo" onclick="verTodo();"/>
                <img src="img/modificar.png" width="124" height="28" alt="Modificar" class="botonModificar"/>
                <img src="img/eliminar.png" width="123" height="27" alt="Eliminar" class="botonEliminar"/>
            </div>
            <div class="pie"></div>
            <div class="logo2"></div>
        </main>
    </body>
</html>
