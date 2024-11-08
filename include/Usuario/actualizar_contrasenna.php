<?php
include_once '../../include/conexion.php';

class actualizar_contrasenna{
    public final function actualizar_contrasenna($idconsulta)
    {
        $conexion = new Crear_Conexion;
        $tratamientopass = new Tratamiento_Contrasenna;

        $conexion->crear_conection();
        $nuevopass = $tratamientopass->TratamientoContrasenna();
        $sql = "UPDATE mantinfrausuarios SET contrasennaUsuario= '$nuevopass' WHERE idusuario = ".$idconsulta.";";
        if ($conexion->conexionBD->query($sql) === TRUE)
        {
            echo "<h5 class='text-center'>Registro actualizado exiosamente</h5>";
        } else
        {
            echo "Error updating record: " . $conexion->conexionBD->error;
        }
    }
}
?>