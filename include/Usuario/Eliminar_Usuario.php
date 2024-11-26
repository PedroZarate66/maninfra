<?php

require_once 'conexion.php';

class Eliminar_Usuario{
     public function EliminarUsuario($idconsulta)
     {
       
         $conexion = new Crear_Conexion;
        
         $conexion->crear_conection();

         $sql = "DELETE FROM mantinfrausuarios WHERE idusuario = ".$idconsulta.";";
        if ($conexion->conexionBD->query($sql) === TRUE) {
             echo "<h5 class='text-center'>Registro eliminado exitosamente</h5>";
         } else {
             echo "Error deleting record: " . $conexion->conexionBD->error;
         }

         $conexion->cerrar_conxion();


    }
}
?>