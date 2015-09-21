<!DOCTYPE html>
<!--Login del profesor
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login Profesor(a)</title>
        <link href="css/estilos.css" rel="stylesheet" type="text/css">
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
            <div class="errorLogin">
                <a href="formLogin.php" class="enlace1">Ir al inicio</a>
            </div>
            <div class="pie"></div>
            <div class="logo2"></div>
        </main>
<!--        <footer>
            <div class="pie2"></div>
        </footer>-->
    </body>
</html>
