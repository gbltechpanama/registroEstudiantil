<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Modificar datos del Estudiante.</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/estilos.css" rel="stylesheet" type="text/css">
        <script src="js/jquery-1.10.2.min.js"></script>
        <script src='js/formularios.js'></script>
    </head>
    <body>
        <header>
            <div class="logo"></div>
            <div class="barra"></div>
            <div class="barra2"></div>
        </header>
        <main>
            <div class="capaDatos">
                <?php
                    session_start();
                    $cedula = $_SESSION['cedulaEstudiante'];
                    $nombre = $_SESSION['nombreEstudiante'];
                    $apellido = $_SESSION['apellidoEstudiante'];
                    $direccion = $_SESSION['direccionEstudiante'];
                    $telefono = $_SESSION['telefonoEstudiante'];
                    $email = $_SESSION['email'];
                    $fechaNacimiento = $_SESSION['fechaNac'];
                    $lugarNacimiento = $_SESSION['lugarNac'];
                    $lugarTrabajo = $_SESSION['lugarTrabajo'];
                    $cargoTrabajo = $_SESSION['cargoTrabajo'];
                    $foto = $_SESSION['rutaFoto'];
                    printf("<form action=\"../controlador/FrontController.php?action=modificarDatos\" name=\"formularioDatos\" method=\"post\" enctype=\"multipart/form-data\">");
                        printf("<div class=\"capaNombre\">Nombre </div>");
                        printf("<input type=\"text\" name=\"nombre\" value=\"".$nombre."\" class=\"tNombre\"/>");
                        printf("<div class=\"capaNecesario\">*</div>");
                        printf("<div class=\"capaApellido\">Apellido </div>");
                        printf("<input type=\"text\" name=\"apellido\" value=\"".$apellido."\" class=\"tApellido\"/>");
                        printf("<div class=\"capaNecesario2\">*</div>");
                        printf("<div class=\"capaCedula\">Cedula </div>");
                        printf("<input type=\"text\" name=\"cedula\" value=\"".$cedula."\" class=\"tCedula\"/>");
                        printf("<div class=\"capaNecesario3\">*</div>");
                        printf("<div class=\"capaDireccion\">Direcci&oacute;n </div>");
                        printf("<input type=\"text\" name=\"direccion\" value=\"".$direccion."\" class=\"tDireccion\"/>");
                        printf("<div class=\"capaNecesario4\">*</div>");
                        printf("<div class=\"capaTelefono\">Tel&eacute;fono </div>");
                        printf("<input type=\"tel\" name=\"telefono\" value=\"".$telefono."\" class=\"tTelefono\"/>");
                        printf("<div class=\"capaNecesario5\">*</div>");
                        printf("<div class=\"capaEmail\">Email </div>");
                        printf("<input type=\"email\" name=\"email\" value=\"".$email."\" class=\"tEmail\"/>");
                        printf("<div class=\"capaNecesario6\">*</div>");
                        printf("<div class=\"capaFechaNacimiento\">Fecha de nacimiento </div>");
                        printf("<input type=\"datetime\" name=\"fechaNacimiento\" value=\"".$fechaNacimiento."\" class=\"tFechaNacimiento\"/>");
                        printf("<div class=\"capaLugarNacimiento\">Lugar de nacimiento </div>");
                        printf("<input type=\"text\" name=\"lugarNacimiento\" value=\"".$lugarNacimiento."\" class=\"tLugarNacimiento\"/>");
                        printf("<div class=\"capaLugarTrabajo\">Lugar de trabajo </div>");
                        printf("<input type=\"text\" name=\"lugarTrabajo\" value=\"".$lugarTrabajo."\" class=\"tLugarTrabajo\"/>");
                        printf("<div class=\"capaNecesario7\">*</div>");
                        printf("<div class=\"capaCargo\">Cargo </div>");
                        printf("<input type=\"text\" name=\"cargoTrabajo\" value=\"".$cargoTrabajo."\" class=\"tCargo\"/>");
                        printf("<div class=\"capaNecesario8\">*</div>");
                        printf("<div class=\"capaFoto\">Cargar Foto </div>");
                        printf("<input type=\"file\" name=\"foto\" id=\"archivo\" multiple class=\"tFoto\"/>");
                        printf("<div id=\"botonSeleccion\"></div>");
                        printf("<div id=\"listaArchivo\">Seleccione un archivo</div>");
                        printf("<div class=\"capaNecesario9\">*</div>");
                        printf("<img src=\"img/aceptar.png\" alt=\"aceptar\" class=\"BAceptarDatos\" onclick='enviarDatos()'/>");
                        $_POST['cedulaAnterior'] = $cedula;
                    printf("</form>");
                ?>
            </div>
            <div class="pie"></div>
            <div class="logo2"></div>
        </main>
    </body>
</html>
