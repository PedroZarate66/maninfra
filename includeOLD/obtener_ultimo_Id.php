<?php
include_once 'conexion.php';
class Obtener_Ultimo_Id{
    public function obtener_ultimo_id()
    {   
        $conexion = new Crear_Conexion;
        $conexion->crear_conection();
        $sql = "SELECT IdRegistro FROM registrosdiarios ORDER BY IdRegistro DESC LIMIT 1;";
        $resultado = $conexion->conexionBD->query($sql);
        $fila = $resultado->fetch_assoc();
        $conexion->cerrar_conxion();
        if(is_null($fila)){
            return 0;
        }
        else{
            $salida = $fila['IdRegistro'];
            return $salida;
        }
    }
}
?>