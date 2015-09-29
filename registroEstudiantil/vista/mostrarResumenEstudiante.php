<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Resumen</title>
        <link href="css/estilos.css" rel="stylesheet" type="text/css">
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
                    printf("<img src=\"img/".$foto."\" class=\"mostrarFoto\" alt=\"Foto\"/>");
                    printf("<div class=\"mostrarNombre\">".$nombre."</div>");
                    printf("<div class=\"mostrarCedula\">C.I. ".$cedula."</div>");
                    printf("<div class=\"mostrarTelefono\">Tel&eacute;fono: ".$telefono."</div>");
                    printf("<div class=\"barra3\">");
                    for($i=0; $i < 180; $i++){
                        printf("·");
                    }
                    printf("</div>");
                    printf("<div class=\"mostrarTelefono2\">Tel&eacute;fono <div class=\"texto5\">".$telefono."</div></div>");
                    printf("<div class=\"mostrarFechaNacimiento\">Fecha de Nacimiento <div class=\"texto5\">".$fechaNacimiento."</div></div>");
                    printf("<div class=\"mostrarLugarTrabajo\">Lugar de Trabajo <div class=\"texto5\">".$lugarTrabajo."</div></div>");
                    printf("<div class=\"mostrarDireccion\">Direcci&oacute;n <div class=\"texto5\">".$direccion."</div></div>");
                    printf("<div class=\"mostrarEmail\">Email <div class=\"texto5\">".$email."</div></div>");
                    printf("<div class=\"mostrarLugarNacimiento\">Lugar de Nacimiento <div class=\"texto5\">".$lugarNacimiento."</div></div>");
                    printf("<div class=\"mostrarCargo\">Cargo <div class=\"texto5\">".$cargo."</div></div>");
                ?>
            </div>
            <div class="pie"></div>
            <div class="logo2"></div>
        </main>
    </body>
</html>
