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
            <div class="logo3"></div>
            <div class="barra"></div>
            <div class="barra2"></div>
        </header>
        <main>
            <div class="mostrarDatos">
                <?php
                    printf("<img src=\"img/logo3.jpg\" class=\"mostrarFoto\"/>");
                    printf("<div class=\"mostarNombre\">".$nombre."</div>");
                    printf("<div class=\"mostarCedula\">C.I. ".$cedula."</div>");
                    printf("<div class=\"mostarTelefono\">Tel&eacute;fono: ".$telefono."</div>");
                    printf("<div class=\"barra3\">");
                    for($i=0; $i < 180; $i++){
                        printf("·");
                    }
                    printf("</div>");
                    printf("<div class=\"mostrarTelefono2\">Tel&eacute;fono <div class=\"texto5\">".$telefono."</div></div>");
                    printf("<div class=\"mostrarFechaNacimiento\"></div>");
                ?>
            </div>
            <div class="pie"></div>
            <div class="logo2"></div>
        </main>
    </body>
</html>
