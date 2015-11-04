<!DOCTYPE html>
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
            function verTodo(cedula)
            {
                if(cedula!=""){
                    document.location.href = "../controlador/FrontController.php?action=mostrarResumen&cedula="+cedula;
                }
            }
            function eliminar(cedula)
            {
                if(cedula!=""){
                    if(confirm('Desea eliminar este registro?')){
                        document.location.href = "../controlador/FrontController.php?action=admEliminarEstudiante&cedulaEstudiante="+cedula;
                    }
                }
            }
            function imprimirListado(){
                criterio=document.getElementById("criterioBusqueda").innerHTML;
                if(criterio!="Escriba aquí palabra clave de busqueda"){
                    document.location.href = "../controlador/FrontController.php?action=imprimirListado&criterio="+criterio;
                }
                else{
                    document.location.href = "../controlador/FrontController.php?action=imprimirListado&criterio=";
                }
            }
        </script>
    </head>
    <body>
        <div class="logo"></div>
        <div class="barra4"></div>
        <div class="barra5"></div>
        <div class="container">
            <main>
                <form name="formularioBuscar" action="../controlador/FrontController.php?action=busqueda" method="POST">
                    <input type="text" name="criterio" value="" placeholder="Escriba aquí palabra clave de busqueda" class="buscar" />
                    <img src="img/buscar.png" width="25" height="25" alt="buscar" class="botonBuscar" onclick="enviarDatos();"/>
                </form>
                <a href="formCambioClave.html">
                    <img src="img/modificarClave.png" width="225" height="27" alt="modificarClave" class="botonModificarClave"/>
                </a>
                <img src="img/imprimir.png" width="225" height="27" alt="Imprimir el listado" class="botonImprimir" onclick="imprimirListado();"/>
                <table border="0" class="tabla">
                    <thead>
                        <tr>
                            <th class="titulosTabla">NOMBRE</th>
                            <th class="titulosTabla">APELLIDO</th>
                            <th class="titulosTabla">CEDULA</th>
                            <th class="titulosTabla">L. TRABAJO</th>
                            <th class="titulosTabla">CARGO</th>
                            <th class="iconosTabla">VER</th>
                            <th class="iconosTabla">ELIM</th>
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
                            $criterio = $_SESSION['criterio'];
                            printf("<div class=\"capaCriterioBusqueda\" name=\"criterioBusqueda\" id=\"criterioBusqueda\">".$criterio."</div>");
                            $n = count($nombreEstudiantes);
                            for($i=0; $i < $n; $i++){
                                if($i%2 == 0){
                                    printf("<tr class=\"lineaPar\">");
                                        printf("<td>".$nombreEstudiantes[$i]."</td>");
                                        printf("<td>".$apellidoEstudiantes[$i]."</td>");
                                        printf("<td>".$cedulaEstudiantes[$i]."</td>");
                                        printf("<td>".$lugarTrabajoEstudiantes[$i]."</td>");
                                        printf("<td>".$cargoTrabajoEstudiantes[$i]."</td>");
                                        printf("<td style=\"text-align:center\"><img src=\"../vista/img/ver.png\" onclick=\"verTodo(".$cedulaEstudiantes[$i].");\"></td>");
                                        printf("<td style=\"text-align:center\"><img src=\"../vista/img/eliminar2.png\" onclick=\"eliminar(".$cedulaEstudiantes[$i].");\"/></td>");
                                    printf("</tr>");
                                }
                                else{
                                    printf("<tr class=\"lineaImpar\">");
                                        printf("<td>".$nombreEstudiantes[$i]."</td>");
                                        printf("<td>".$apellidoEstudiantes[$i]."</td>");
                                        printf("<td>".$cedulaEstudiantes[$i]."</td>");
                                        printf("<td>".$lugarTrabajoEstudiantes[$i]."</td>");
                                        printf("<td>".$cargoTrabajoEstudiantes[$i]."</td>");
                                        printf("<td style=\"text-align:center\"><img src=\"../vista/img/ver.png\" onclick=\"verTodo(".$cedulaEstudiantes[$i].");\"></td>");
                                        printf("<td style=\"text-align:center\"><img src=\"../vista/img/eliminar2.png\" onclick=\"eliminar(".$cedulaEstudiantes[$i].");\"/></td>");
                                    printf("</tr>");
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </main>
        </div>
        <div class="pie">
            <div class="logo3"></div>
        </div>
    </body>
</html>
