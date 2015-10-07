<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Busqueda</title>
    </head>
    <body>
        <div class="logo"></div>
        <div class="barra"></div>
        <div class="barra2"></div>
        <div class="container">
            <main>
                <form name="formularioBuscar" action="../controlador/FrontController.php?action=busqueda" method="POST">
                    <input type="text" name="criterio" value="Escriba aquí palabra clave de busqueda" class="buscar" />
                    <img src="img/buscar.png" width="25" height="25" alt="buscar" class="botonBuscar"/>
                    <img src="img/modificarClave.png" width="225" height="27" alt="modificarClave"/>
                </form>
                <?php
                // crea la tabla con el resultado
                ?>
            </main>
        </div>
        <div class="pie2"></div>
        <div class="logo2"></div>
    </body>
</html>
