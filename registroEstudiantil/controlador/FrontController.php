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
    default :
        echo "Error";
        break;
}