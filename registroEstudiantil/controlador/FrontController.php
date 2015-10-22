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
        $cedulaEstudiante = $_GET['cedula'];
        $back->ctrlAdministrarEstudiante($cedulaEstudiante);
        break;
    case 'cargarDatos':
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
        $archivofoto = $_FILES['foto']; 
        $back->ctrlCargarDatos($cedulaEstudiante, $nombre, $apellido, 
                $direccion, $telefono, $email, $fechaNacimiento, 
                $lugarNacimiento, $lugarTrabajo, $cargoTrabajo, $archivofoto);
        break;
    case 'mostrarResumen':
        $cedulaEstudiante = $_GET['cedula'];
        $back->ctrlMostrarResumenEstudiante($cedulaEstudiante);
        break;
    case 'modificarDatos':
        $cedulaAnterior= $_POST['cedulaAnterior'];
        //Datos modificados
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
        $foto = $_FILES['foto'];
        $back->ctrlModificarDatos($cedulaAnterior, $cedulaEstudiante, $nombre, 
                $apellido, $direccion, $telefono, $email, $fechaNacimiento, 
                $lugarNacimiento, $lugarTrabajo, $cargoTrabajo, $foto);
        break;
    case 'login':
        $password = $_POST['password'];
        $back->ctrlValidarLogin($password);
        break;
    case 'busqueda':
        $criterio = $_POST['criterio'];
        if($criterio == NULL)
            $criterio = "";
        $back->ctrlBusquedaEstudiante($criterio);
        break;
    case 'eliminarEstudiante':
        $cedulaEstudiante = $_SESSION['cedulaEstudiante'];
        $back->ctrlEliminarEstudiante($cedulaEstudiante);
        break;
    case 'admEliminarEstudiante':
        $cedulaEstudiante = $_GET['cedulaEstudiante'];
        $back->ctrlAdministrarEliminarEstudiante($cedulaEstudiante);
        break;
    case 'cambioClave':
        $claveAnterior = $_POST['claveAnterior'];
        $claveNueva = $_POST['claveNueva'];
        $back->ctrlCambiarClaveAdmin($claveAnterior, $claveNueva);
        break;
    case 'imprimirListado':
        $criterio = $_POST['criterio'];
        if($criterio == NULL)
            $criterio = "";
        $back->ctrlBusquedaListado($criterio);
        break;
    default :
        echo "<h1>Error</h1>";
        break;
}