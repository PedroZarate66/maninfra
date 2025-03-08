<?php
include_once 'conexion.php';
include_once 'comprobar_contrasenna.php';

class Comprobar_Usuario{
    public final function ComprobarUsuario()
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
            
            $comcont->ComprobarContrasenna($id, $fila);
            echo "usuario encontrado: ";
        }
        else
        {
            echo "usuario no encontrado: ";
        }
    }
}
?>