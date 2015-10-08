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
            $resultadoLogin = True;
            header("Location: ../controlador/FrontController.php?action=admEstudiante&cedula=".$cedulaEstudiante);
        }
        else {
            $resultadoLogin = FALSE;
            header("Location: ../vista/cargarDatos.html");
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
        session_start();
        if(count($this->datosEstudiante) > 0 ){
            $_SESSION['cedulaEstudiante'] = $this->datosEstudiante[0];
            $_SESSION['nombreEstudiante'] = $this->datosEstudiante[1];
            $_SESSION['apellidoEstudiante'] = $this->datosEstudiante[2];
            $_SESSION['direccionEstudiante'] = $this->datosEstudiante[3];
            $_SESSION['telefonoEstudiante'] = $this->datosEstudiante[4];
            $_SESSION['email'] = $this->datosEstudiante[5];
            $_SESSION['fechaNac'] = $this->datosEstudiante[6];
            $_SESSION['lugarNac'] = $this->datosEstudiante[7];
            $_SESSION['lugarTrabajo'] = $this->datosEstudiante[8];
            $_SESSION['cargoTrabajo'] = $this->datosEstudiante[9];
            $_SESSION['rutaFotoEstudiante'] =  $this->datosEstudiante[10];
            header("Location: ../vista/mostrarResumenEstudiante.php");
        }
    }
    /**Este método permite modificar los datos de un estudiante en particular.
     * @param $cedulaAnterior Tipo String, contiene la cedula anterior del 
     * estudiante.
     * @param $cedulaEstudiante Tipo String, contiene la cedula actual del 
     * estudiante.
     */
    public function ctrlModificarDatos ($cedulaAnterior, $cedulaEstudiante, 
            $nombre, $apellido, $direccion, $telefono, $email, $fechaNacimiento, 
            $LugarNacimiento, $lugarTrabajo, $cargoTrabajo, $foto)
    {
        $modelo = new Model();
        $this->estadoEstudiante = $modelo->mdlValidarCI($cedulaAnterior);
        if($this->estadoEstudiante){
            $this->estadoConsulta = $modelo->mdlModificarEstudiante($cedulaAnterior, $cedulaEstudiante, $nombre, $apellido, $direccion, $telefono, $email, $fechaNacimiento, $LugarNacimiento, $lugarTrabajo, $cargoTrabajo, $foto);
            session_start();
            if($this->estadoConsulta){
                header("Location: ../controlador/FrontController.php?action=mostrarResumen&cedula=".$cedulaEstudiante);
            }
            else {
                $_SESSION['cedula'] = "";
                header("Location: ../vista/errorBD.html");
            }
        }
        else {
                $_SESSION['cedula'] = "";
                header("Location: ../vista/errorLogin.html");
            }
    }
    /**Este método envía los datos a la vista de administrar estudiante, 
     * indicado por el número de cedula.
     * @param  $cedulaEstudiante Tipo String, almacena la cedula del estudiante.
     */
    public function ctrlAdministrarEstudiante($cedulaEstudiante)
    {
        $modelo = new Model();
        $this->datosEstudiante = $modelo->mdlObtenerDatosEstudiante($cedulaEstudiante);
        session_start();
        if(count($this->datosEstudiante) > 0 ){
            $_SESSION['cedulaEstudiante'] = $this->datosEstudiante[0];
            $_SESSION['nombreEstudiante'] = $this->datosEstudiante[1];
            $_SESSION['apellidoEstudiante'] = $this->datosEstudiante[2];
            $_SESSION['direccionEstudiante'] = $this->datosEstudiante[3];
            $_SESSION['telefonoEstudiante'] = $this->datosEstudiante[4];
            $_SESSION['email'] = $this->datosEstudiante[5];
            $_SESSION['fechaNac'] = $this->datosEstudiante[6];
            $_SESSION['lugarNac'] = $this->datosEstudiante[7];
            $_SESSION['lugarTrabajo'] = $this->datosEstudiante[8];
            $_SESSION['cargoTrabajo'] = $this->datosEstudiante[9];
            $_SESSION['rutaFoto'] =  $this->datosEstudiante[10];
            header("Location: ../vista/administrarEstudiante.php");
        }
        else {
            header("Location: ../vista/errorBD.html?action=error");
        }
    }
    /**Este método permite agregar un estudiante a la base de datos.
     * @param $cedulaEstudiante Tipo String, almacena la cedula del estudiante.
     * @param $nombre Tipo String, almacena el nombre del estudiante.
     * @param $apellido Tipo String, almacena el apellido del estudiante.
     * @param $direccion Tipo String, almacena la dirección del estudiante.
     * @param $telefono Tipo String, almacena el número de teléfono del 
     * estudiante.
     * @param $email Tipo String, almacena el correo electrónico del estudiante.
     * @param $fechaNacimiento Tipo Date, almacena la fecha de nacimiento del 
     * estudiante.
     * @param $LugarNacimiento Tipo String, almacena el lugar de nacimiento del
     * estudiante.
     * @param $lugarTrabajo Tipo String, almacena el lugar de trabajo del
     * estudiante.
     * @param $cargoTrabajo Tipo String, almacena el cargo de trabajo del
     * estudiante.
     * @param $foto Tipo objeto, almacena el archivo con la foto del estudiante.
     */
    public function ctrlCargarDatos ($cedulaEstudiante, $nombre, $apellido, 
            $direccion, $telefono, $email, $fechaNacimiento, $LugarNacimiento, 
            $lugarTrabajo, $cargoTrabajo, $foto)
    {
        $modelo = new Model();
        $this->estadoConsulta = $modelo->mdlCargarEstudiante($cedulaEstudiante, 
                $nombre, $apellido, $direccion, $telefono, $email, 
                $fechaNacimiento, $LugarNacimiento, $lugarTrabajo, 
                $cargoTrabajo, $foto);
        session_start();
        if($this->estadoConsulta){
            header("Location: ../controlador/FrontController.php?action=mostrarResumen&cedula=".$cedulaEstudiante);
        }
        else {
            header("Location: ../vista/errorBD.html?action=error");
        }
    }
    /**Este método permite buscar un estudiante deacuerdo a un criterio 
     * indicado.
     * @param $criterio Tipo String, almacena la cadena de caracteres ha buscar.
     */
    public function ctrlBusquedaEstudiante($criterio){
        $modelo = new Model();
        $password = $_SESSION['login'];
        if($password){
            session_start();
            $this->nombresEstudiantes = $modelo->mdlBusquedaNombreEstudiantes($criterio);
            $this->apellidosEstudiantes = $modelo->mdlBusquedaApellidosEstudiantes($criterio);
            $this->cedulaEstudiantes = $modelo->mdlBusquedaCedulaEstudiantes($criterio);
            $this->lugarTrabajoEstudiantes = $modelo->mdlBusquedaLugarTrabajoEstudiantes($criterio);
            $this->cargoTrabajoEstudiantes = $modelo->mdlBusquedaCargoTrabajoEstudiantes($criterio);
            $_SESSION['nombresEstudiantes'] = $this->nombresEstudiantes;
            $_SESSION['apellidosEstudiantes'] = $this->apellidosEstudiantes;
            $_SESSION['cedulaEstudiantes'] = $this->cedulaEstudiantes;
            $_SESSION['lugarTrabajoEstudiantes'] = $this->lugarTrabajoEstudiantes;
            $_SESSION['cargoTrabajoEstudiantes'] = $this->cargoTrabajoEstudiantes;
            header("Location: ../vista/resultadoBusqueda.php");
        }
        else{
            header("Location: ../vista/errorLogin.html");
        }
    }
    /**Este método valida el login del profesor y regresa verdadero si es 
     * correcta la clave, sino regresa nulo.
     * @param $password Tipo String, almacena la clave a verificar.
     * @return regresa verdadero si es correcta la clave, sino regresa nulo.
     */
    public function ctrlValidarLogin($password){
        $modelo = new Model();
        $this->resultadoLogin = $modelo->mdlValidarLogin($password);
        session_start();
        if($this->resultadoLogin){
            $_SESSION['login'] = TRUE;
            header("Location: ../controlador/FrontController.php?action=busqueda&criterio=");
        }
        else {
            $_SESSION['login'] = FALSE;
            header("Location: ../vista/errorLogin.html");
        }
    }
}
