<?php
//esta funcion obtiene los registros que estan en la tabla calendarios de la BD
//mostrando la informacion que hay si es que existe alguna
include_once '../../include/conexion.php';

class Consulta_Calend_Individual{
    public function consulta_calendario_individual($idconsulta)
        {
            $conexion = new Crear_Conexion;

            $conexion->crear_conection();
            $sql = "SELECT * FROM `calendarios` WHERE IdCalendario =".$idconsulta.";";
            $resultado = $conexion->conexionBD->query($sql);
            $fila = $resultado->fetch_assoc();
            $conexion->cerrar_conxion();
            return $fila;
        }
}
?>