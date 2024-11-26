<?php
//esta funcion obtiene los registros que estan en la tabla calendarios de la BD
//mostrando la informacion que hay si es que existe alguna
require_once 'conexion.php';

class Consulta_Calend_Individual{
    public function consulta_calendario_individual($idconsulta)
        {

            $conexion->crear_conection();
            $sql = "SELECT * FROM `calendarios` WHERE IdCalendario =".$idconsulta.";";
            $resultado = $conexion->conexionBD->query($sql);
            $fila = $resultado->fetch_assoc();
            
            $conexion->cerrar_conxion();
            return $fila;
        }
    
    public function consulta_registro_individual($idconsulta){
        $conexion = new Crear_Conexiones;
        $conexion->crear_conection();
        $sql = "SELECT DescBien FROM `calendarios` WHERE IdCalendario =".$idconsulta.";";
        $resultado = $conexion->conexionBD->query($sql);
        $result = $resultado->fetch_assoc();
        $conexion->cerrar_conxion();
        return $result;
    }

    public function consulta_usuario_individual($idconsulta){
        $conexion = new Crear_Conexiones;
        $conexion->crear_conection();
        $sql = "SELECT nombreUsuario FROM `mantinfrausuarios` WHERE idusuario =".$idconsulta.";";
        $resultado = $conexion->conexionBD->query($sql);
        $result = $resultado->fetch_assoc();
        $conexion->cerrar_conxion();
        return $result;
    }
}
?>