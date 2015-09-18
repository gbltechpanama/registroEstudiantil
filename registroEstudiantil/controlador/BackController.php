<?php

namespace registroEstudiantil;

require_once '../modelo/Model.php';
/**
 * Descripcion de la clase BackController
 *
 * @author Ricardo Presilla
 */
class BackController {
    /**variable indica si la cedula de identidad de un estudiante se encuentra 
     * o no en la base de datos.*/
    private $estadoEstudiante;
    /**variable de tipo arreglo, almacena todos los datos de 1 estudiante en 
     * particular.*/
    private $datosEstudiante;
    /**Esta variable de tipo arreglo, almacena todos los nombres de los 
     * estudiantes luego de realizar una búsqueda.*/
    private $nombresEstudiantes;
    /**Esta variable de tipo arreglo, almacena todos los apellidos de los 
     * estudiantes luego de realizar una búsqueda.*/
    private $apellidosEstudiantes;
    /**Esta variable de tipo arreglo, almacena todos las cedulas de los 
     * estudiantes luego de realizar una búsqueda.*/
    private $cedulaEstudiantes;
    /**Esta variable de tipo arreglo, almacena todos los lugares de trabajo de 
     * los estudiantes luego de realizar una búsqueda.*/
    private $lugarTrabajoEstudiantes;
    /**Esta variable de tipo arreglo, almacena todos los cargos de trabajo de 
     * los estudiantes luego de realizar una búsqueda.*/
    private $cargoTrabajoEstudiantes;
    /**Esta variable de tipo boolean indica si la consulta a la BD se ejecutó 
     * correctamente.*/
    private $estadoConsulta;
    /**Esta variable de tipo boolean indica si el login fue exitoso o no.*/
    private $resultadoLogin;
    /**Este método valida al estudiante.
     * @param $cedulaEstudiante Tipo String, contiene la cedula del estudiante.
     */
    public function ctrlValidarCIEstudiante($cedulaEstudiante)
    {
        $modelo = new Model();
        $this->estadoEstudiante = $modelo->mdlValidarCI($cedulaEstudiante);
        session_start();
        if($this->estadoEstudiante){
            $_SESSION['cedula'] = $cedulaEstudiante;
            header("");
        }
        else {
            $_SESSION['cedula'] = "";
            header("");
        }
    }
    /**Este método permite obtener el resumen de los datos de un estudiante. 
     * Redirige el flujo de datos a la pagina correspondiente.
     * @param $cedulaEstudiante Tipo String, contiene la cedula del estudiante.
     */
    public function ctrlMostrarResumenEstudiante($cedulaEstudiante)
    {
        $modelo = new Model();
        $this->datosEstudiante = $modelo->mdlObtenerDatosEstudiante($cedulaEstudiante);
        /***/
    }
    /**Este método permite modificar los datos de un estudiante en particular.
     * @param $cedulaAnterior Tipo String, contiene la cedula anterior del estudiante.
     * @param $cedulaEstudiante Tipo String, contiene la cedula actual del estudiante.
     */
    public function ctrlModificarDatos ($cedulaAnterior, $cedulaEstudiante, 
            $nombre, $apellido, $direccion, $telefono, $email, $fechaNacimiento, 
            $LugarNacimiento, $lugarTrabajo, $cargoTrabajo, $foto)
    {
        $modelo = new Model();
        $this->estadoConsulta = $modelo->mdlModificarEstudiante($cedulaAnterior, $cedulaEstudiante, $nombre, $apellido, $direccion, $telefono, $email, $fechaNacimiento, $LugarNacimiento, $lugarTrabajo, $cargoTrabajo, $foto);
        session_start();
        if($this->estadoConsulta){
            $_SESSION['action'] = 'mostrarResumen';
            $_SESSION['cedula'] = $cedulaEstudiante;
            header("FrontController.php");
        }
        else {
            $_SESSION['action'] = "";
            $_SESSION['cedula'] = "";
            header("errorBD.Html");
        }
    }
}
