<?php

namespace registroEstudiantil;

class BaseDatos
{

    /*
     *  MANEJO DE BASE DE DATOS
     */
    private static $servidor = "localhost";
    private static $puerto = "3306";
    private static $baseDatos = "estudiantil";
    private static $usuario = "universidad";
    private static $password = "univerisdad.2015";
    
    private function modelAbrirConexionBD()
    {

        $conexion = mysql_connect($this::$servidor, $this::$usuario, $this::$password);
        
        mysql_select_db($this::$baseDatos, $conexion);
                
        return $conexion;
        
    }

    public function modelQueryDB($query)
    {
        $conexion = $this->modelAbrirConexionBD();
        $resultado = mysql_query($query, $conexion);
        $this->modelCerrarConexionBD();
        return $resultado;
    }
    
    private function modelCerrarConexionBD()
    {
        mysql_close();
    }
    
    /** UTILITARIOS **/
    public function modelConvertirEnArray($resultado)
    {
        $i = 0;

        while ($row = mysql_fetch_row($resultado)) {
                $data_array[$i] = $row[0];
                $i++;
        }

        return $data_array;
    }
    /************************************************/
}
