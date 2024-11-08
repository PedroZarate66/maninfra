<?php
include_once '../include/conexion.php';

class Actualizar_Inspeccion{
    public final function ActualizarInspeccion($idconsulta, $columna, $entrada)
    {

        $conexion = new Crear_Conexion;

        $sql = "UPDATE `registrosdiarios` SET `$columna`='$entrada' WHERE IdRegistro = $idconsulta;";
        $conexion->crear_conection();
        if($conexion->conexionBD->query($sql) === TRUE)
        {
            $salida = "mensaje=operacion_exitosa";
        }
        else
        {
            echo "Error: ".$sql."<br>".$this->conexionBD->error; 
        }
        $conexion->cerrar_conxion();
        return $salida;
    }
}
?>