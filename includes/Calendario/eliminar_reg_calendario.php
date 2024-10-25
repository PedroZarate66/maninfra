<?php
//esta funcion elimina algun registro que se haya seleccionado si es que este existe
include_once '../../include/conexion.php';

class Eliminar_Reg_Calendario{
    public function eliminar_registro_calendario($idconsulta)
        {
            $conexion = new Crear_Conexion;

            $conexion->crear_conection();
            $sql = "DELETE FROM calendarios WHERE IdCalendario = ".$idconsulta.";";
            if ($conexion->conexionBD->query($sql) === TRUE) {
                echo "<h5 class='text-center'>Registro eliminado exitosamente</h5>";
            } else {
                echo "Error deleting record: " . $conexion->conexionBD->error;
            }
            $conexion->cerrar_conxion();
        }
}
?>
