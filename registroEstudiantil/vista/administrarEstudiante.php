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
            function verTodo(cedula)
            {
                document.location.href = "../controlador/FrontController.php?action=mostrarResumen&cedula="+cedula;
            }
            function modificar(cedula)
            {
                document.location.href = "../vista/modificarEstudiante.php";
            }
            function eliminar(cedula)
            {
                if(confirm('Desea eliminar este registro?')){
                    document.location.href = "../controlador/FrontController.php?action=eliminarEstudiante&cedula="+cedula;
                }
            }
        </script>
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
                        $lugarNacimiento = $_SESSION['lugarNac'];
                        $lugarTrabajo = $_SESSION['lugarTrabajo'];
                        $cargoTrabajo = $_SESSION['cargoTrabajo'];
                        $foto = $_SESSION['rutaFoto'];
                        printf("<img src=\"".$foto."\" class=\"mostrarFoto2\" alt=\"Foto\"/>");
                        printf("<div class=\"mostrarNombre2\">".$nombre."  ".$apellido."</div>");
                        printf("<div class=\"mostrarCedula2\">C.I. ".$cedula."</div>");
                        printf("<div class=\"mostrarTelefono3\">Tel&eacute;fono: ".$telefono."</div>");
                        printf("<img src=\"img/verTodo.png\" width=\"123\" height=\"27\" 
                        alt=\"Ver Todo\" class=\"botonVerTodo\" onclick=\"verTodo(".$cedula.");\"/>");
                        printf("<img src=\"img/modificar.png\" width=\"124\" height=\"28\" 
                        alt=\"Modificar\" class=\"botonModificar\" onclick=\"modificar(".$cedula.");\"/>");
                        printf("<img src=\"img/eliminar.png\" width=\"123\" height=\"27\" 
                         alt=\"Eliminar\" class=\"botonEliminar\" onclick=\"eliminar(".$cedula.");\"/>");
                    ?>                    
                </div>                
            </main>
        </div>
        <div class="pie2"></div>
        <div class="logo2"></div>
    </body>
</html>
