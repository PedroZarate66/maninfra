<?php
interface Fachada_sql{
    public function obtener_ultimo_Id();//listo
    public function obtener_anno_calendario();//listo 
    public function guardar_registro();//listo
    public function obtener_historial_registro();//listo
    public function consulta_registro_individual($idconsulta);//listo
    public function actualizar_inpeccion($idconsulta,$columna,$entrada);//listo
    public function guardar_infraestructura();//listo
    public function obtener_datos_infraestructura();//listo
    public function guardar_registro_calendario();//listo
    public function desplegar_calendario();//listo
    public function tratamiento_registro();//listo
    public function tratamiento_infraestructura();//listo
    public function tratamiento_calendario();//listo
    public function obtener_ultimo_Id_Infraestructura();//listo
    public function consulta_infraestructura_individual($idconsulta);//listo
    public function eliminar_mejora_infraestructura($idconsulta);//listo
    public function generar_consulta_calendario();//listo
    public function obtener_ultimo_Id_calendario();//listo
    public function consulta_calendario_individual($idconsulta);//listo
    public function eliminar_reg_calendario($idconsulta);//listo
    public function tratamiento_actualizacion_infraestructura($idconsulta);//listo
    public function actualizacion_infraestructura($idconsulta);//listo
    public function actualizacion_dinamica_calendario($idconsulta, $estatus);//listo
    public function recadelario_dinamica_calendatio();//listo
    public function consulta_dinamica_calendario();//listo
    public function tratamiento_usuarios();//listo
    public function guardar_usuario();//listo
    public function generar_tabla_usuarios();//listo
    public function consulta_usuario();//listo
    public function eliminar_usuario($idconsulta);//listo
    public function actualizar_contrasenna($idconsulta);//listo
    public function comprobar_usuario();//listo
    public function comprobar_contrasenna($idconsulta, $tipo);//listo
}


?>