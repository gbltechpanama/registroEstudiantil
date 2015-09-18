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
