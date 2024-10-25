<?php
include_once 'obtener_ultimo_Id_Infraestructura.php';

class Tratamiento_Infra{
    public function tratamiento_infraestructura()
    {
        $obj_obt_id_inf = new Obtener_Ult_Id_Infraestructura;
        $identrada      = $obj_obt_id_inf->obtener_ultimo_id_infraestructura();
        $identrada++;
        $entradainfra = array();
        $entradainfra[0] = $identrada;
        $entradainfra[1] = $_POST["infra_aspecto"];
        $entradainfra[2] = $_POST["infra_desc"];
        $entradainfra[3] = $_POST["infra_beneficios"];
        $entradainfra[4] = $_POST["infra_tipo_mantenimiento"];
        $entradainfra[5] = $_POST["infra_frecuencia"];
        $entradainfra[6] = $_POST["infra_mes_propuesto"];
        $entradainfra[7] = $_POST["infra_anno_propuesta"];
        $entradainfra[8] = $_POST["infra_prioridad"];
        $entradainfra[9] = $_POST["infra_costo_estimado"];
        $entradainfra[10] = date('Y-m-d');
        $consultasql = "INSERT INTO `actualizacionmejoramantenimietos` (`IdMejora`, `Aspecto`, `Descripcion`, `Beneficios`, `TipoMantenimiento`, `Frecuencia`, `MesPropuesto`, `AnnoPropuesto`, `Prioridad`, `Costo`, `UltimaActualizacion`, `HaSidoPlaneado`) 
                        VALUES ('$entradainfra[0]', '$entradainfra[1]', '$entradainfra[2]', '$entradainfra[3]', '$entradainfra[4]', '$entradainfra[5]', '$entradainfra[6]', '$entradainfra[7]', '$entradainfra[8]', '$entradainfra[9]', '$entradainfra[10]', 'No');";
        return $consultasql;
    }
}
?>