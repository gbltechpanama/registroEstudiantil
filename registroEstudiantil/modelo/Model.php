<?php

namespace registroEstudiantil;

require_once '../ORM.php';
/**
 * Model esta clase php generea todas las consultas y actualizaciones de la 
 * base de datos.
 *
 * @author Ricardo Presilla
 */
class Model {
    /**Este método devolverá los nombres de los estudiantes desde la tabla 
     * “estudiantes”, tomando en cuenta que el parámetro enviado “criterio” 
     * coincida parcialmente con todos los campos de la tabla en la BD.
     */
    public function mdlBusquedaNombreEstudiantes($criterio)
    {
        $BD = new BaseDatos();
        $query = "select nombres from estudiantes where nombres like '%".$criterio."%' or 
        apellidos like '%".$criterio."%' or direccion like '%".$criterio."%' or telefono like 
        '%".$criterio."%' or email like '%".$criterio."%' or fechaNacimiento like '%".$criterio."%' or 
        lugarNacimiento like '%".$criterio."%' or lugarTrabajo like '%".$criterio."%' or
        cargoTrabajo like '%".$criterio."%' or rutaFoto like '%".$criterio."%'";
        $resultado = $BD->modeloQueryDB($query);
        if($resultado->num_rows > 0){
            $datos = $BD->modelConvertirEnArray($resultado);
        }
        else {
            $datos = NULL;
        }
        return $datos;
    }
    /**Este método devolverá los apellidos de los estudiantes desde la tabla 
     * “estudiantes”, tomando en cuenta que el parámetro enviado “criterio” 
     * coincida parcialmente con todos los campos  de la tabla en la BD
     */
    public function mdlBusquedaApellidosEstudiantes($criterio)
    {
        $BD = new BaseDatos();
        $query = "select apellidos from estudiantes where nombres like '%".$criterio."%' or 
        apellidos like '%".$criterio."%' or direccion like '%".$criterio."%' or telefono like 
        '%".$criterio."%' or email like '%".$criterio."%' or fechaNacimiento like '%".$criterio."%' or 
        lugarNacimiento like '%".$criterio."%' or lugarTrabajo like '%".$criterio."%' or
        cargoTrabajo like '%".$criterio."%' or rutaFoto like '%".$criterio."%'";
        $resultado = $BD->modeloQueryDB($query);
        if($resultado->num_rows > 0){
            $datos = $BD->modelConvertirEnArray($resultado);
        }
        else {
            $datos = NULL;
        }
        return $datos;
    }
    /**Este método devolverá los lugares de trabajo de los estudiantes desde la 
     * tabla “estudiantes”, tomando en cuenta que el parámetro enviado “criterio”
     * coincida parcialmente con todos los campos  de la tabla en la BD. */
    public function mdlBusquedaLugarTrabajoEstudiantes($criterio)
    {
        $BD = new BaseDatos();
        $query = "select lugarTrabajo from estudiantes where nombres like '%"
                .$criterio."%' or apellidos like '%".$criterio."%' or direccion"
                ." like '%".$criterio."%' or telefono like '%".$criterio."%' or"
                ." email like '%".$criterio."%' or fechaNacimiento like '%"
                .$criterio."%' or lugarNacimiento like '%".$criterio."%' or "
                ."lugarTrabajo like '%".$criterio."%' or cargoTrabajo like '%"
                .$criterio."%' or rutaFoto like '%".$criterio."%'";
        $resultado = $BD->modeloQueryDB($query);
        if($resultado->num_rows > 0){
            $datos = $BD->modelConvertirEnArray($resultado);
        }
        else {
            $datos = NULL;
        }
        return $datos;
    }
    /**Este método devolverá los cargos de trabajo de los estudiantes desde la
     * tabla “estudiantes”, tomando en cuenta que el parámetro enviado “criterio”
     * coincida parcialmente con todos los campos  de la tabla en la BD.*/
    public function mdlBusquedaCargoTrabajoEstudiantes($criterio)
    {
        $BD = new BaseDatos();
        $query = "select cargoTrabajo from estudiantes where nombres like '%"
                .$criterio."%' or apellidos like '%".$criterio."%' or direccion"
                ." like '%".$criterio."%' or telefono like '%".$criterio."%' or "
                ."email like '%".$criterio."%' or fechaNacimiento like '%"
                .$criterio."%' or lugarNacimiento like '%".$criterio."%' or "
                ."lugarTrabajo like '%".$criterio."%' or cargoTrabajo like '%"
                .$criterio."%' or rutaFoto like '%".$criterio."%'";
        $resultado = $BD->modeloQueryDB($query);
        if($resultado->num_rows > 0){
            $datos = $BD->modelConvertirEnArray($resultado);
        }
        else {
            $datos = NULL;
        }
        return $datos;
    }
    /**Agrega por primera vez los datos de un estudiante, la ruta de la foto 
     * debe ser aleatoria.
     */
    public function mdlCargarEstudiante($cedulaEstudiante, $nombre, $apellido, 
            $direccion, $telefono, $email, $fechaNacimiento, $LugarNacimiento,
            $lugarTrabajo, $cargoTrabajo, $foto)
    {
        $rutaFoto = "../img/00000.jpg";
        $BD = new BaseDatos();
        //Asignando valor aleatorio al nombre de la foto.
        do{
            $rutaFoto = "../img/".rand(1, 99999).".jpg";
            $query = "select rutaFoto from estudiantes where rutaFoto = '"
                    .$rutaFoto."'";
            $resultado = $BD->modeloQueryDB($query);
        }while ($resultado->num_rows > 0);
        //Cambiando de nombre la foto ha guardar.
        if(rename("../img/".$foto[nombre], $rutafoto)){
        //Preparando la instrucción
            $query ="insert to estudiantes ( cedulaEstudiante, nombres, apellidos, "
                    ."direccion, telefono, email, fechaNacimiento, lugarNacimiento,"
                    ."lugarTrabajo, cargoTrabajo, rutaFoto ) values ('"
                    .$cedulaEstudiante."', '".$nombre."', '".$apellido."', '"
                    .$direccion."', '".$telefono."', '".$email."', '"
                    .$fechaNacimiento."', '".$LugarNacimiento."', '"
                    .$lugarTrabajo."', '".$cargoTrabajo."', '".$rutaFoto."' )";
            $resultado = $BD->modeloQueryDB($query);
        }
        else{
            $resultado = FALSE;
        }
        return $resultado;
    }
    /**Este método se encarga de validar si la variable “password” enviada como 
     * parámetro coincide con el campo “password” de la tabla “acceso”.*/
    public function mdlValidarLogin($password)
    {
        $BD = new BaseDatos();
        $query = "select password from acceso where password=MD5('".$password
                ."');";
        $resultado = $BD->modeloQueryDB($query);
        if($resultado->num_rows > 0){
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
    /***/
    public function mdlModificarEstudiante($cedulaAnterior, $cedulaEstudiante, 
            $nombre, $apellido, $direccion, $telefono, $email, $fechaNacimiento,
            $LugarNacimiento, $lugarTrabajo, $cargoTrabajo, $foto)
    {
        $rutaFoto = "../img/00000.jpg";
        $BD = new BaseDatos();
        //Asignando valor aleatorio al nombre de la foto.
        do{
            $rutaFoto = "../img/".rand(1, 99999).".jpg";
            $query = "select rutaFoto from estudiantes where rutaFoto = '"
                    .$rutaFoto."'";
            $resultado = $BD->modeloQueryDB($query);
        }while ($resultado->num_rows > 0);
        //Cambiando de nombre la foto ha guardar.
        if(rename("../img/".$foto[nombre], $rutafoto)){
        //Preparando la instrucción
            $query ="update estudiantes set cedulaEstudiante='".$cedulaEstudiante
                    ."', nombres='".$nombre."', apellidos='".$apellido."', "
                    ."direccion='".$direccion."', telefono='".$telefono."', "
                    ."email='".$email."', fechaNacimiento='".$fechaNacimiento
                    ."', lugarNacimiento='".$LugarNacimiento."', lugarTrabajo='"
                    .$lugarTrabajo."', cargoTrabajo='".$cargoTrabajo."',
                    rutaFoto='".$rutaFoto."' where cedulaEstudiane='"
                    .$cedulaAnterior."';";
            $resultado = $BD->modeloQueryDB($query);
        }
        else{
            $resultado = FALSE;
        }
        return $resultado;
    }
    /**Este método se encarga de obtener todos los datos de un estudiante en 
     * específico”, tomando en cuenta que el parámetro enviado “cedulaEstudiante” 
     * coincida con el campo “cedulaEstudiante” de la tabla “estudiantes” de la 
     * BD.
     */
    public function mdlObtenerDatosEstudiante($cedulaEstudiante)
    {
        $BD = new BaseDatos();
        $query ="select * from estudiantes where cedulaEstudiante='"
                .$cedulaEstudiante."';";
        $resultado = $BD->modeloQueryDB($query);
        if($resultado->num_rows > 0){
            $datos = $BD->modelConvertirEnArray($resultado);
        }
        else {
            $datos = NULL;
        }
        return $datos;
    }
    /**Este método se encarga de verificar si un estudiante existe en la BD.*/
    public function mdlValidarCI($cedulaEstudiante)
    {
        $BD = new BaseDatos();
        $query ="select * from estudiantes where cedulaEstudiante='"
                .$cedulaEstudiante."';";
        $resultado = $BD->modeloQueryDB($query);
        if($resultado->connect_error){
            die("Coneccion fallida: " . $conn->connect_error);
        }
        else{
            if($resultado != NULL){
            return TRUE;
            }
            else {
                return FALSE;
            }
        }
    }
    /**: Este método se encarga de cambiar la clave de acceso del administrador 
     * en la tabla “acceso”. Para hacer el cambio de la clave primero se debe 
     * verificar si el parámetro“claveAnterior” coincide con la clave almacenada
     * en el campo “password” de la tabla “acceso”. Se debe tomar en cuenta que 
     * tanto el dato ingresado como el que se va a ingresar debe estár cifrado 
     * usando el algortimo MD5.*/
   public function mdlCambiarClaveAdmin($claveAnterior, $claveNueva)
   {
       $BD = new BaseDatos();
        $query = "update acceso set password= MD5('".$claveNueva
                    ."') where password='".$claveAnterior."';";
        $resultado = $BD->modeloQueryDB($query);
        if($resultado->num_rows > 0){
            return TRUE;
        }
        else {
            return FALSE;
        }
   }
}
