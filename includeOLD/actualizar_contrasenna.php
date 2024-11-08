<?php
include_once 'Admin_sql.php';

abstract class actualizar_contrasenna extends Admin_sql{
    public final function actualizar_contrasenna($idconsulta)
    {
        $this->crear_conexion();
        $nuevopass = $this->tratamiento_contrasenna();
        $sql = "UPDATE mantinfrausuarios SET contrasennaUsuario= '$nuevopass' WHERE idusuario = ".$idconsulta.";";
        if ($this->conexionBD->query($sql) === TRUE)
        {
            echo "<h5 class='text-center'>Registro actualizado exiosamente</h5>";
        } else
        {
            echo "Error updating record: " . $this->conexionBD->error;
        }
    }
}
?>