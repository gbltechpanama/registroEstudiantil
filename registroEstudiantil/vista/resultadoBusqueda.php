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
        <link href="css/estilos.css" rel="stylesheet" type="text/css">
        <script>
            function enviarDatos()
            {
                document.forms[0].submit();
            }
        </script>
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
                    <img src="img/modificarClave.png" width="225" height="27" alt="modificarClave" class="botonModificarClave" onclick=""/>
                </form>
                <table border="1">
                    <thead>
                        <tr class="titulosTabla">
                            <th>NOMBRE</th>
                            <th>APELLIDO</th>
                            <th>CEDULA</th>
                            <th>L. TRABAJO</th>
                            <th>CARGO</th>
                            <th>VER</th>
                            <th>ELIM</th>
                        </tr>
                    </thead>
                    <tbody>                   
                        <?php
                        // crea la tabla con el resultado
                            session_start();
                            $cedulaEstudiantes = $_SESSION['cedulaEstudiantes'];
                            $nombreEstudiantes = $_SESSION['nombresEstudiantes'];
                            $apellidoEstudiantes = $_SESSION['apellidosEstudiantes'];
                            $lugarTrabajoEstudiantes = $_SESSION['lugarTrabajoEstudiantes'];
                            $cargoTrabajoEstudiantes = $_SESSION['cargoTrabajoEstudiantes'];
                            $n = count($nombreEstudiantes);
                            for($i=0; $i < $n; $i++){
                                if($i%2 == 0){
                                    printf("<tr class=\"lineaPar\">");
                                        printf("<td>".$nombreEstudiantes[$i]."</td>");
                                        printf("<td>".$apellidoEstudiantes[$i]."</td>");
                                        printf("<td>".$cedulaEstudiantes[$i]."</td>");
                                        printf("<td>".$lugarTrabajoEstudiantes[$i]."</td>");
                                        printf("<td>".$cargoTrabajoEstudiantes[$i]."</td>");
                                        printf("<td style=\"text-align:center\"><img src=\"ver.png\"></td>");
                                        printf("<td style=\"text-align:center\"><img src=\"eliminar2.jpg\"></td>");
                                    printf("</tr>");
                                }
                                else{
                                    printf("<tr class=\"lineaImpar\">");
                                        printf("<td>".$nombreEstudiantes[$i]."</td>");
                                        printf("<td>".$apellidoEstudiantes[$i]."</td>");
                                        printf("<td>".$cedulaEstudiantes[$i]."</td>");
                                        printf("<td>".$lugarTrabajoEstudiantes[$i]."</td>");
                                        printf("<td>".$cargoTrabajoEstudiantes[$i]."</td>");
                                        printf("<td style=\"text-align:center\"><img src=\"icono.jpg\"></td>");
                                        printf("<td style=\"text-align:center\"><img src=\"icono2.jpg\"></td>");
                                    printf("</tr>");
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </main>
        </div>
        <div class="pie2"></div>
        <div class="logo2"></div>
    </body>
</html>
