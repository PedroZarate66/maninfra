<?php
include_once '../../include/conexion.php';
class Obtener_An_Calendario{
    public function obtener_anno_calendario()
    {
        $conexion = new Crear_Conexion;
        $conexion->crear_conection();
        $sql = "SELECT DISTINCT FechaAnno FROM calendarios ORDER BY FechaAnno ASC;";
        $resultado = $conexion->conexionBD->query($sql);
        if($resultado->num_rows > 0)
        {
            while($fila = $resultado->fetch_assoc())
            {
                if($fila["FechaAnno"] == "0"){

                }else{
                    echo '<option value="'.$fila["FechaAnno"].'">'.$fila["FechaAnno"].'</option>';
                }
                
            }
        }
        else
        {
            echo '<option disabled value=" ">Cero resultados</option>';
        }
        $conexion->cerrar_conxion();
    }
}
?>
