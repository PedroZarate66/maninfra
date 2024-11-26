<?php
include_once '../../include/Admin_sql.php';

abstract class actualizacion_infraestructura extends Admin_sql{
    public final function actualizacion_infraestructura($idconsulta)
    {
        $this->crear_conexion();
        $sql = $this->tratamiento_actualizacion_infraestructura($idconsulta);
        if ($this->conexionBD->query($sql) === TRUE)
        {
            echo "<h5 class='text-center'>Registro actualizado exiosamente</h5>";
            $salida = $this->consulta_infraestructura_individual($idconsulta);
        } else
        {
            echo "Error updating record: " . $this->conexionBD->error;
        }
        return $salida;
    }
}
?>