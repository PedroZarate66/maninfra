<?php
//esta funcion obtiene el ultimo id que se ha registrado para los calendarios
//si es que existe alguno
include_once 'conexion.php';

class Obtener_Ult_Id_Calendario{
    public function obtener_ultimo_Id_calendario()
        {
            $conexion = new Crear_Conexion;
            $conexion->crear_conection();
            $sql = "SELECT IdCalendario FROM calendarios ORDER BY IdCalendario DESC LIMIT 1;";
            $resultado = $conexion->conexionBD->query($sql);
            $fila = $resultado->fetch_assoc();
            $conexion->cerrar_conxion();
            if(is_null($fila))
            {
 
                return 0;
            }
            else
            {
                $salida = $fila["IdCalendario"];
                return $salida;
            }
        }
}
?>
