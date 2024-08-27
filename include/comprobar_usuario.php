<?php
include_once 'Admin_sql.php';

abstract class comprobar_usuario extends Admin_sql{
    public final function comprobar_usuario()
    {
        $this->crear_conexion();
        $usuario = $_POST["usuario"];
        $sql = "SELECT idusuario, nombreUsuario, tipoUsuario FROM `mantinfrausuarios` WHERE nombreUsuario = '".$usuario."';";
        $resultado = $this->conexionBD->query($sql);
        $fila = $resultado->fetch_assoc();
        $this->cerrar_conxion();
        if (!is_null($fila))
        {
            $id = $fila["idusuario"];
            echo "usuario encontrado: ";
            $this->comprobar_contrasenna($id, $fila);
        }
        else
        {
            echo "usuario no encontrado: ";
        }
    }
}
?>