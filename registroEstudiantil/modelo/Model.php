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
        $query = "select nombres from estudiantes where nombres like '%"
                .$criterio."%' or apellidos like '%".$criterio."%' or direccion "
                ."like '%".$criterio."%' or telefono like '%".$criterio."%' or "
                ."email like '%".$criterio."%' or fechaNacimiento like '%"
                .$criterio."%' or lugarNacimiento like '%".$criterio."%' or "
                ."lugarTrabajo like '%".$criterio."%' or cargoTrabajo like '%"
                .$criterio."%' or rutaFoto like '%".$criterio."%'";
        $resultado = $BD->modelQueryDB($query);
        if($resultado != NULL && mysql_num_rows($resultado)>0){
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
        $resultado = $BD->modelQueryDB($query);
        if($resultado != NULL && mysql_num_rows($resultado)>0){
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
        $resultado = $BD->modelQueryDB($query);
        if($resultado != NULL && mysql_num_rows($resultado)>0){
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
        $resultado = $BD->modelQueryDB($query);
        if($resultado != NULL && mysql_num_rows($resultado)>0){
            $datos = $BD->modelConvertirEnArray($resultado);
        }
        else {
            $datos = NULL;
        }
        return $datos;
    }
    /**Este método devolverá las cedulas de los estudiantes desde la tabla 
     * “estudiantes”, tomando en cuenta que el parámetro enviado “criterio”
     * coincida parcialmente con todos los campos  de la tabla en la BD.*/
    public function mdlBusquedaCedulaEstudiantes($criterio){
        $BD = new BaseDatos();
        $query = "select cedulaEstudiante from estudiantes where "
                ."cedulaEstudiante like '%".$criterio."%' or nombres like '%"
                .$criterio."%' or apellidos like '%".$criterio."%' or direccion"
                ." like '%".$criterio."%' or telefono like '%".$criterio."%' or "
                ."email like '%".$criterio."%' or fechaNacimiento like '%"
                .$criterio."%' or lugarNacimiento like '%".$criterio."%' or "
                ."lugarTrabajo like '%".$criterio."%' or cargoTrabajo like '%"
                .$criterio."%' or rutaFoto like '%".$criterio."%'";
        $resultado = $BD->modelQueryDB($query);
        if($resultado != NULL && mysql_num_rows($resultado)>0){
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
        $rutaFoto = "../img/fotos/00000.jpg";
        $BD = new BaseDatos();
        //Asignando valor aleatorio al nombre de la foto.
        do{
            $rutaFoto = "../vista/img/fotos/".rand(1, 99999).".jpg";
            $query = "select rutaFoto from estudiantes where rutaFoto = '"
                    .$rutaFoto."'";
            $resultado = $BD->modelQueryDB($query);
        }while ($resultado->num_rows > 0);
        //Guarda la foto en la ruta indicada
        if(move_uploaded_file($foto["tmp_name"], $rutaFoto)){
        //Preparando la instrucción
            $query ="insert into estudiantes ( cedulaEstudiante, nombres, apellidos, "
                    ."direccion, telefono, email, fechaNacimiento, lugarNacimiento,"
                    ."lugarTrabajo, cargoTrabajo, rutaFoto ) values ('"
                    .$cedulaEstudiante."', '".$nombre."', '".$apellido."', '"
                    .$direccion."', '".$telefono."', '".$email."', '"
                    .$fechaNacimiento."', '".$LugarNacimiento."', '"
                    .$lugarTrabajo."', '".$cargoTrabajo."', '".$rutaFoto."' )";
            $resultado = $BD->modelQueryDB($query);
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
        $resultado = $BD->modelQueryDB($query);
        if($resultado->connect_error){
            die("Coneccion fallida: ".$resultado->connect_error);
            return FALSE;
        }
        else{
            if($resultado != NULL && mysql_num_rows($resultado)>0){
                return TRUE;
            }
            else {
                return FALSE;
            }
        }
    }
/**Este método modifica los datos de un estudiante. Regresa verdadero si 
 * realiza la actualizaciòn sino regresa falso.
 */
    public function mdlModificarEstudiante($cedulaAnterior, $cedulaEstudiante, 
            $nombre, $apellido, $direccion, $telefono, $email, $fechaNacimiento,
            $LugarNacimiento, $lugarTrabajo, $cargoTrabajo, $foto)
    {
        $rutaFoto = "../img/fotos/00000.jpg";
        $BD = new BaseDatos();
        //Asignando valor aleatorio al nombre de la foto.
        do{
            $rutaFoto = "../vista/img/fotos/".rand(1, 99999).".jpg";
            $query = "select rutaFoto from estudiantes where rutaFoto = '"
                    .$rutaFoto."'";
            $resultado = $BD->modelQueryDB($query);
        }while ($resultado->num_rows > 0);
        //Busca la ruta actual de la foto
        $query = "select rutaFoto from estudiantes where cedulaEstudiante='"
                    .$cedulaAnterior."';";
        $resultado = $BD->modelQueryDB($query);
        $rutafotoAnterior = mysql_fetch_row($resultado);
        //Guarda la foto en la ruta indicada
        if($foto["tmp_name"] != NULL || $foto["tmp_name"] != ""){
            move_uploaded_file($foto["tmp_name"], $rutaFoto);
        //Preparando la instrucción
            $query ="update estudiantes set cedulaEstudiante='".$cedulaEstudiante
                    ."', nombres='".$nombre."', apellidos='".$apellido."', "
                    ."direccion='".$direccion."', telefono='".$telefono."', "
                    ."email='".$email."', fechaNacimiento='".$fechaNacimiento
                    ."', lugarNacimiento='".$LugarNacimiento."', lugarTrabajo='"
                    .$lugarTrabajo."', cargoTrabajo='".$cargoTrabajo."',
                    rutaFoto='".$rutaFoto."' where cedulaEstudiante='"
                    .$cedulaAnterior."';";
            $resultado = $BD->modelQueryDB($query);
            //ELIMINAR IMAGEN ANTERIOR
            unlink("../vista/img/fotos/".$rutafotoAnterior);
        }
        else{//No hay foto modificada
            $query ="update estudiantes set cedulaEstudiante='".$cedulaEstudiante
                    ."', nombres='".$nombre."', apellidos='".$apellido."', "
                    ."direccion='".$direccion."', telefono='".$telefono."', "
                    ."email='".$email."', fechaNacimiento='".$fechaNacimiento
                    ."', lugarNacimiento='".$LugarNacimiento."', lugarTrabajo='"
                    .$lugarTrabajo."', cargoTrabajo='".$cargoTrabajo."' "
                    . "where cedulaEstudiante='".$cedulaAnterior."';";
            $resultado = $BD->modelQueryDB($query);
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
        $resultado = $BD->modelQueryDB($query);
        if($resultado != NULL){
            $datos = mysql_fetch_row($resultado);
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
        $resultado = $BD->modelQueryDB($query);
        if($resultado->connect_error){
            die("Coneccion fallida: ".$resultado->connect_error);
            return FALSE;
        }
        else{
            if($resultado != NULL && mysql_num_rows($resultado)>0){
                return TRUE;
            }
            else {
                return FALSE;
            }
        }
    }
    /** Este método se encarga de cambiar la clave de acceso del administrador 
     * en la tabla “acceso”. Para hacer el cambio de la clave primero se debe 
     * verificar si el parámetro“claveAnterior” coincide con la clave almacenada
     * en el campo “password” de la tabla “acceso”. Se debe tomar en cuenta que 
     * tanto el dato ingresado como el que se va a ingresar debe estár cifrado 
     * usando el algortimo MD5.*/
   public function mdlCambiarClaveAdmin($claveAnterior, $claveNueva)
   {
        $BD = new BaseDatos();
        $query = "update acceso set password= MD5('".$claveNueva
                    ."') where password= MD5('".$claveAnterior."');";
        $resultado = $BD->modelQueryDB($query);
        if($resultado){
            return TRUE;
        }
        else {
            return FALSE;
        }
   }
   /***/
    public function mdlEliminarEstudiante($cedulaEstudiante){
        $BD = new BaseDatos();
        //Busca la ruta de la foto
        $query = "select rutaFoto from estudiantes where cedulaEstudiante='"
                .$cedulaEstudiante."';";
        $resultado = $BD->modelQueryDB($query);
        $rutaFoto = mysql_fetch_row($resultado);
        //Borra el registro de la base de datos
        $query = "delete from estudiantes where cedulaEstudiante='"
                .$cedulaEstudiante."';";
        $resultado = $BD->modelQueryDB($query);
        if($resultado){
            /*ELIMINAR EL ARCHIVO SUBIDO EN EL DIRECTORIO /IMG/FOTOS/*/
            unlink($rutaFoto);
            return TRUE;
        }
        else{
            return FALSE;
        }
   }
}
