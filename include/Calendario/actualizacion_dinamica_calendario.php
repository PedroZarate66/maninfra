<?php
include_once 'conexion.php';

class Actualizacion_Dina_Calendario{
  public function actualizacion_dinamica_calendario($idconsulta, $estatus)
      { 
          $conexion = new Crear_Conexion;
          $conexion->crear_conection();
          $sql = "UPDATE `calendarios` SET `Estatus`='$estatus' WHERE `IdCalendario`='$idconsulta';";
          if ($conexion->conexionBD->query($sql) === TRUE) {
              echo "<br>";
            } else {
              echo "Error updating record: " . $conexion->conexionBD->error;
            }
          $conexion->cerrar_conxion();
      }
}

?>
