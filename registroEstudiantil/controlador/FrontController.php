<?php

namespace registroEstudiantil;

session_start();

require_once 'BackController.php';
//crea un nuevo objeto back
$back = new BackController(); 
//lee la accion solicitada
$action = $_GET['action'];
/**Para el estudiante
 */
switch ($action){
    case 'validarCI': //Valida la cedula
        $cedulaEstudiante = $_POST['clave'];
        $back->ctrlValidarCIEstudiante($cedulaEstudiante);
        break;
    case 'admEstudiante': //Administrar estudiante
        $cedulaEstudiante = $_POST['clave'];
//        $back->
        break;
    case 'cargarDatos':
        //Directorio de destino de la imagen
        $directorioDestino = "img/";
        //Datos del formulario
        $cedulaEstudiante = $_POST['cedula'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];
        $fechaNacimiento = $_POST['fechaNacimiento'];
        $lugarNacimiento = $_POST['lugarNacimiento'];
        $lugarTrabajo = $_POST['lugarTrabajo'];
        $cargoTrabajo = $_POST['cargoTrabajo'];
        $archivofoto = $_FILES['foto']; //$_POST['foto'];
        $back->ctrlCargarDatos($cedulaEstudiante, $nombre, $apellido, 
                $direccion, $telefono, $email, $fechaNacimiento, 
                $lugarNacimiento, $lugarTrabajo, $cargoTrabajo, $archivofoto);
        break;
    case 'mostrarResumen':
        $cedulaEstudiante = $_POST['cedula'];
        $back->ctrlMostrarResumenEstudiante($cedulaEstudiante);
        break;
    default :
        echo "<h1>Error</h1>";
        break;
}