<?php
include_once 'Admin_sql.php';

abstract class eliminar_usuario extends Admin_sql{
    public final function eliminar_usuario($idconsulta)
    {
        $this->crear_conexion();
        $sql = "DELETE FROM mantinfrausuarios WHERE idusuario = ".$idconsulta.";";
        if ($this->conexionBD->query($sql) === TRUE) {
            echo "<h5 class='text-center'>Registro eliminado exitosamente</h5>";
        } else {
            echo "Error deleting record: " . $this->conexionBD->error;
        }
        $this->cerrar_conxion();
    }
}
?>