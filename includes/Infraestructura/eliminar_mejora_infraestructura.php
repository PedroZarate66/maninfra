<?php

//esta funcion elimina algun registro que tenga que ver con la actualizacion de mejoramientos
//si es que este existe
include_once '../../include/conexion.php';

class Eliminar_Mej_Infraestructura{
    //se ha sustituido la variable $idconsulta por $salida ya que obtenemos el resultado directo de la funcion
    //que hemos agregado en el include_once 
    public function eliminar_mejora_infraestructura($idconsulta)
        {   
            $conexion = new Crear_Conexion;
            $conexion->crear_conection();
            //ESTA CONSULTA SOLO CAMBIA A INACTIVO PARA QUE SE MUESTRE INHABILITADO EL REGISTRO
            $sql = "UPDATE actualizacionmejoramantenimietos SET activo = 0 WHERE IdMejora = ".$idconsulta.";";
            if ($conexion->conexionBD->query($sql) === TRUE) {
                echo "<h5 class='text-center'>Registro eliminado exitosamente</h5>";
            } else {
                echo "Error deleting record: " . $conexion->conexionBD->error;
            }
            $conexion->cerrar_conxion();
        }
    }
?>
