<?php
include_once 'conexion.php';
include_once 'tratamiento_contrasenna.php';

class Actualizar_Contrasenna{
    public function ActualizarContrasenna($idconsulta)
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