<?php
include_once '../Admin_sql.php';
abstract class tratamiento_actualizacion_infraestructura extends Admin_sql{
    public final function tratamiento_actualizacion_infraestructura($idconsulta)
    {
        $entradainfra = array();
        $entradainfra[0] = $idconsulta;
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
        $consultasql = "UPDATE actualizacionmejoramantenimietos SET Aspecto= '$entradainfra[1]', Descripcion= '$entradainfra[2]', Beneficios= '$entradainfra[3]', TipoMantenimiento= '$entradainfra[4]', Frecuencia= '$entradainfra[5]', MesPropuesto= '$entradainfra[6]', AnnoPropuesto= '$entradainfra[7]', Prioridad= '$entradainfra[8]', Costo= '$entradainfra[9]', UltimaActualizacion= '$entradainfra[10]', HaSidoPlaneado= 'No' WHERE IdMejora= '$idconsulta';";
        return $consultasql;
    }
}   
?>
