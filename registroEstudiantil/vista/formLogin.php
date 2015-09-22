<!DOCTYPE html>
<!--Login del profesor
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login Profesor(a)</title>
        <link href="css/estilos.css" rel="stylesheet" type="text/css">
        <script>
            function enviarDatos()
            {
                document.forms[0].submit();
            }
        </script>
    </head>
    <body>
        <header>
            <div class="logo"></div>
            <div class="membrete1">Ficha automatizada de estudiantes</div>
            <div class="membrete">
                Universidad Nororiental Privada <br>
                "Gran Mariscal de Ayacucho" <br>
            </div>
            <div class="barra"></div>
            <div class="barra2"></div>
        </header>
        <main>
            <?php
                session_start();
                $GET_SESSION['action']="";
            ?>
            <div class="capaLogin">
                <form action="" name="formularioLogin">
                    <div class="bienvenida">Bienvenido(a) Profesor(a)
                        <br> 
                        Ingrese su clave de ingreso
                    </div>
                    <input type="password" name="clave" value="" class="clave"/>
                    <img src="img/aceptar.png" alt="aceptar" class="botonAceptar" onclick='enviarDatos()'/>
                </form>
            </div>
            <div class="pie"></div>
            <div class="logo2"></div>
        </main>
    </body>
</html>
