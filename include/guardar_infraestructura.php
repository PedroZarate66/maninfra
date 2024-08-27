<?php
include_once 'conexion.php';
include_once 'tratamiento_infraestructura.php';
include_once 'obtener_ultimo_Id_Infraestructura.php';
include_once 'consulta_infraestructura_individual.php';

class Guardar_Infra{
    public function guardar_infraestructura()
    {
        $conexion           = new Crear_Conexion;
        $obj_tra_inf        = new Tratamiento_Infra;
        $obj_obt_ult_id_inf = new Obtener_Ult_Id_Infraestructura;
        $obj_con_inf_ind    = new Consulta_Infraestructura_Ind;   
       
        $sql = $obj_tra_inf->tratamiento_infraestructura();
        echo "hasta aqui jala";
        $conexion->crear_conection();
        if ($conexion->conexionBD->query($sql) === TRUE){
            echo "<br>";
        }else {
            echo "Error: ".$sql."<br>".$conexion->conexionBD->error;
        }
        $conexion->cerrar_conxion();
        $idconsulta = $obj_obt_ult_id_inf->obtener_ultimo_Id_Infraestructura();
        $salida = $obj_con_inf_ind->consulta_infraestructura_individual($idconsulta);
        return $salida;
    }
}
?>