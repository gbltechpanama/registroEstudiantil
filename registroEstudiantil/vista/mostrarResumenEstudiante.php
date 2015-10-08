<!DOCTYPE html>
<!--Vista para mostrar el resumen de los datos del estudiante.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Resumen del estudiante.</title>
        <link href="css/estilos.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="logo"></div>
        <div class="barra"></div>
        <div class="barra2"></div>
        <div class="container">
            <main>
                <div class="mostrarDatos">
                    <?php
                        session_start();
                        $cedula = $_SESSION['cedulaEstudiante'];
                        $nombre = $_SESSION['nombreEstudiante'];
                        $apellido = $_SESSION['apellidoEstudiante'];
                        $direccion = $_SESSION['direccionEstudiante'];
                        $telefono = $_SESSION['telefonoEstudiante'];
                        $email = $_SESSION['email'];
                        $fechaNacimiento = $_SESSION['fechaNac'];
                        $fecha = DateTime::createFromFormat('Y-m-d', $fechaNacimiento);
                        $fechaNacimiento = $fecha->format('d/m/Y');
                        $lugarNacimiento = $_SESSION['lugarNac'];
                        $lugarTrabajo = $_SESSION['lugarTrabajo'];
                        $cargoTrabajo = $_SESSION['cargoTrabajo'];
                        $foto = $_SESSION['rutaFotoEstudiante'];
                        printf("<img src=\"".$foto."\" class=\"mostrarFoto\" alt=\"Foto\"/>");
                        printf("<div class=\"mostrarNombre\">".$nombre."</div>");
                        printf("<div class=\"mostrarCedula\">C.I. ".$cedula."</div>");
                        printf("<div class=\"mostrarTelefono\">Tel&eacute;fono: ".$telefono."</div>");
                        printf("<div class=\"barra3\">");
                        for($i=0; $i < 180; $i++){
                            printf("·");
                        }
                        printf("</div>");
                        printf("<div class=\"mostrarTelefono2\">Tel&eacute;fono <div class=\"texto5\">".$telefono."</div></div>");
                        printf("<div class=\"mostrarFechaNacimiento\">Fecha de Nacimiento <div class=\"texto7\">".$fechaNacimiento."</div></div>");
                        printf("<div class=\"mostrarLugarTrabajo\">Lugar de Trabajo <div class=\"texto9\">".$lugarTrabajo."</div></div>");
                        printf("<div class=\"mostrarDireccion\">Direcci&oacute;n <div class=\"texto5\">".$direccion."</div></div>");
                        printf("<div class=\"mostrarEmail\">Email <div class=\"texto6\">".$email."</div></div>");
                        printf("<div class=\"mostrarLugarNacimiento\">Lugar de Nacimiento <div class=\"texto8\">".$lugarNacimiento."</div></div>");
                        printf("<div class=\"mostrarCargo\">Cargo <div class=\"texto10\">".$cargoTrabajo."</div></div>");
                    ?>
                </div>
            </main>
        </div>
        <div class="pie2"></div>
        <div class="logo2"></div>
    </body>
</html>
