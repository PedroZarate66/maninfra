<?php
include_once '../../include/conexion.php';

class Obtener_Ult_Id_Infraestructura{
    public function obtener_ultimo_id_infraestructura()
    {
        $conexion = new Crear_Conexion;
        $conexion->crear_conection();

        $sql = "SELECT IdMejora FROM actualizacionmejoramantenimietos ORDER BY IdMejora DESC LIMIT 1;";
        $resultado = $conexion->conexionBD->query($sql);
        $fila = $resultado->fetch_assoc();
        $conexion->cerrar_conxion();
        if(is_null($fila))
        {
            return 0;
        }
        else
        {
            $salida = $fila["IdMejora"];
            return $salida;
        }
    }
}
?>