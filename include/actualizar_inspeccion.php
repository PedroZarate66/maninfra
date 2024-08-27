<?php
include_once 'Admin_sql.php';

abstract class actualizar_inspeccion extends Admin_sql{
    public final function actualizar_inspeccion($idconsulta, $columna, $entrada)
    {
        $sql = "UPDATE `registrosdiarios` SET `$columna`='$entrada' WHERE IdRegistro = $idconsulta;";
        $this->crear_conexion();
        if($this->conexionBD->query($sql) === TRUE)
        {
            $salida = "mensaje=operacion_exitosa";
        }
        else
        {
            echo "Error: ".$sql."<br>".$this->conexionBD->error; 
        }
        $this->cerrar_conxion();
        return $salida;
    }
}
?>