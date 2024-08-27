<?php
include_once 'conexion.php';
include_once 'tratamiento_calendario.php';
include_once 'obtener_ultimo_Id.php';
include_once 'consulta_registro_individual.php';

class Guardar_Reg{
    public function guardar_registro()
    {
        $obj_trat_cal    = new Trat_Calendario;
        $conexion        = new Crear_Conexion;
        $obj_obt_ult_id  = new Obtener_Ultimo_Id;
        $obj_con_reg_ind = new Consulta_Reg_Individual;

        $conexion->crear_conection();
        $sql = $obj_trat_cal->tratamiento_registro();
        if ($conexion->conexionBD->query($sql) === TRUE){
            echo "<br>";
        }else {
            echo "Error: ".$sql."<br>".$conexion->conexionBD->error;
        }
        $conexion->cerrar_conxion();
        $idconsulta = $obj_obt_ult_id->obtener_ultimo_Id();
        $salida = $obj_con_reg_ind->consulta_registro_individual($idconsulta);
        return $salida;
    }
}
?>