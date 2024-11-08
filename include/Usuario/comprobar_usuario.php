<?php
include_once '../../include/conexion.php';
include_once '../../include/comprobar_contrasenna.php';

class comprobar_usuario{
    public final function comprobar_usuario()
    {
        $conexion = new Crear_Conexion;
        $comcont = new Comprobar_Contrasenna;

        $conexion->crear_conection();
        $usuario = $_POST["usuario"];
        $sql = "SELECT idusuario, nombreUsuario, tipoUsuario FROM `mantinfrausuarios` WHERE nombreUsuario = '".$usuario."';";
        $resultado = $conexion->conexionBD->query($sql);
        $fila = $resultado->fetch_assoc();
        $conexion->cerrar_conxion();
        if (!is_null($fila))
        {
            $id = $fila["idusuario"];
            echo "usuario encontrado: ";
            $comcont->ComprobarContrasenna($id, $fila);
        }
        else
        {
            echo "usuario no encontrado: ";
        }
    }
}
?>