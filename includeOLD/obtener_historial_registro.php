<?php
include_once 'conexion.php';
class Obtener_Hist_Registro{
    public function obtener_historial_registro()
    {
        $conexion = new Crear_Conexion;
        $conexion->crear_conection();
        $sql = "SELECT IdRegistro, DiaSemana, DATE_FORMAT(`Fecha`, '%d-%m-%Y') AS Fecha, EntradaoSalida FROM `registrosdiarios` ORDER BY IdRegistro DESC;";
        $resultado = $conexion->conexionBD->query($sql);
        if ($resultado->num_rows >0)
        {
            while($fila = $resultado->fetch_assoc())
            {
                echo "<tr> <th scope='row'>" .$fila["IdRegistro"]. "</th> <td>" .$fila["DiaSemana"]. "</td> <td>" .$fila["Fecha"]. "</td> <td>" .$fila["EntradaoSalida"]. "</td> <td><button class='btn btn-success' type='submit' name='reg_detalles' id='reg_detalles' value='".$fila["IdRegistro"]."'>Detalles</button></td> </tr>";
            }
        }else
        {
            echo "Cero resultados";
        }
        $conexion->cerrar_conxion();
    }
}
?>