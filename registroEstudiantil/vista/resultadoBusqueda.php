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
                <?php
                    // crea la tabla con el resultado
                    session_start();
                    $cedulaEstudiantes = $_SESSION['cedulaEstudiantes'];
                    $nombreEstudiantes = $_SESSION['nombresEstudiantes'];
                    $apellidoEstudiantes = $_SESSION['apellidosEstudiantes'];
                    $lugarTrabajoEstudiantes = $_SESSION['lugarTrabajoEstudiantes'];
                    $cargoTrabajoEstudiantes = $_SESSION['cargoTrabajoEstudiantes'];
                    $criterio = $_SESSION['criterio'];
                    printf("<form name=\"formularioBuscar\" action=\"../controlador/FrontController.php?action=busqueda\" method=\"POST\">");
                        printf("<input type=\"text\" name=\"criterio\" value=\"".$criterio."\" placeholder=\"Escriba aquí palabra clave de busqueda\" class=\"buscar\" />");
                        printf("<img src=\"img/buscar.png\" width=\"25\" height=\"25\" alt=\"buscar\" class=\"botonBuscar\" onclick=\"enviarDatos();\"/>");
                    printf("</form>");
                    printf("<a href=\"formCambioClave.html\">");
                        printf("<img src=\"img/modificarClave.png\" width=\"225\" height=\"27\" alt=\"modificarClave\" class=\"botonModificarClave\"/>");
                    printf("</a>");
                    printf("<img src=\"img/imprimir.png\" width=\"225\" height=\"27\" alt=\"Imprimir el listado\" class=\"botonImprimir\" onclick=\"imprimirListado();\"/>");
                    printf("<div class=\"capaTabla\">");
                        printf("<table border=\"0\">");
                            printf("<thead>");
                                printf("<tr>");
                                    printf("<th class=\"titulosTabla\">NOMBRE</th>");
                                    printf("<th class=\"titulosTabla\">APELLIDO</th>");
                                    printf("<th class=\"titulosTabla\">CEDULA</th>");
                                    printf("<th class=\"titulosTabla\">L. TRABAJO</th>");
                                    printf("<th class=\"titulosTabla\">CARGO</th>");
                                    printf("<th class=\"iconosTabla\">VER</th>");
                                    printf("<th class=\"iconosTabla\">ELIM</th>");
                                printf("</tr>");
                            printf("</thead>");
                            printf("<tbody>");
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
                </div>
                <div class="pie">
                    <div class="logo3"></div>
                </div>
            </main>
        </div>        
    </body>
</html>
