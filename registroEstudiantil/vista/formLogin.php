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
            <div class="membrete">
                Ficha automatizada de estudiantes <br>
                Universidad Nororiental Privada <br>
                "Gran Mariscal de Ayacucho" <br>
            </div>
            <div class="barra"></div>
            <div class="barra2"></div>
        </header>
        <main>
            <?php
                session_start();
                $_SESSION['action']="";
            ?>
            <div class="capaLogin">
                <form action="" name="formularioLogin">
                    <div>Bienvenido(a) Profesor(a)
                        <br> 
                        Ingrese su clave de ingreso
                    </div>
                    <div>
                        <input type="password" name="clave" value="" />
                    </div>
                    <div>
                        <input type="submit" value="Aceptar" name="aceptar" />
                    </div>
                </form>
            </div>
            <div class="logo2"></div>
            <div class="pie"></div>
        </main>
        <footer>
            <div class="pie2"></div>
        </footer>
    </body>
</html>
