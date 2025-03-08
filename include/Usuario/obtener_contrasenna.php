<?php
include_once 'conexion.php';

class Obtener_Contrasenna{
    public final function ObtenerContrasenna($id)
    {

        $conexion = new Crear_Conexion;

        $conexion->crear_conection();
        
        $sql = "SELECT contrasennaUsuario FROM `mantinfrausuarios` WHERE idusuario = ".$id.";";
        $resultado = $conexion->conexionBD->query($sql);
        $fila = $resultado->fetch_assoc();
        $salida = $fila["contrasennaUsuario"];
        $conexion->cerrar_conxion();
        return $salida;
    }
}
?>