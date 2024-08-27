<?php
include_once 'conexion.php';
include_once 'tratamiento_usuarios.php';

class Guardar_Usu{
    public function guardar_usuario()
    {
        $conexion = new Crear_Conexion;
        $obj_trat_cont = new Tratamiento_Contrasenna;

        $conexion->crear_conection();

        $sql = $obj_trat_cont->tratamiento_usuarios();
        if ($conexion->conexionBD->query($sql) === TRUE){
            echo "registro guardado<br>";
        }else {
            echo "Error: ".$sql."<br>".$conexion->conexionBD->error;
        }
        $conexion->cerrar_conxion();
    }
}
?>