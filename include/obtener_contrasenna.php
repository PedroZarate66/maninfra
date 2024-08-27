<?php
include_once 'Admin_sql.php';

abstract class obtener_contrasenna extends Admin_sql{
    protected final function obtener_contrasenna($id)
    {
        $this->crear_conexion();
        $sql = "SELECT contrasennaUsuario FROM `mantinfrausuarios` WHERE idusuario = ".$id.";";
        $resultado = $this->conexionBD->query($sql);
        $fila = $resultado->fetch_assoc();
        $salida = $fila["contrasennaUsuario"];
        $this->cerrar_conxion();
        return $salida;
    }
}
?>