<?php
include_once '../../include/conexion.php';
include_once 'tratamiento_usuarios.php';

class Guardar_Usu{
    public function guardar_usuario()
    {
        $conexion = new Crear_Conexion;
        $obj_trat_usu = new Tratamiento_Usuarios;

        $conexion->crear_conection();

        $sql = $obj_trat_usu->TratamientoUsuarios();
        if ($conexion->conexionBD->query($sql) === TRUE){
            echo "registro guardado<br>";
        }else {
            echo "Error: ".$sql."<br>".$conexion->conexionBD->error;
        }
        $conexion->cerrar_conxion();
    }
}
?>