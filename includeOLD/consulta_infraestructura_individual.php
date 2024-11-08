<?php
include_once 'conexion.php';
class Consulta_Infraestructura_Ind{
    public function consulta_infraestructura_individual($idconsulta)
    {
        $conexion = new Crear_Conexion;
        $conexion->crear_conection();
        $sql = "SELECT IdMejora, Aspecto, Descripcion, Beneficios,TipoMantenimiento,Frecuencia,MesPropuesto,AnnoPropuesto,Prioridad,Costo,DATE_FORMAT(`UltimaActualizacion`, '%d-%m-%Y') AS UltimaActualizacion FROM `actualizacionmejoramantenimietos` WHERE IdMejora =".$idconsulta." ;";
        $resultado = $conexion->conexionBD->query($sql);
        $fila = $resultado->fetch_assoc();
        $conexion->cerrar_conxion();
        return $fila;
    }
}
?>