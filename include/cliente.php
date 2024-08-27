<?php
include_once 'Admin_sql.php';
include_once 'fachada_sql.php';

class Cliente extends Admin_sql implements Fachada_sql{
    // public $manejador;
    // public function __construct()
    // {
    //     $this->manejador = new Cliente;
    // }

    protected function crear_conexion(){}
    protected function cerrar_conxion(){}
    protected function obtenerVariableconfiguracion(){}
    protected function tratamiento_contrasenna(){}
    protected function obtener_contrasenna($idconsulta){}

    public function obtener_ultimo_Id(){}
    public function obtener_anno_calendario(){}
    public function guardar_registro(){}
    public function obtener_historial_registro(){}
    public function consulta_registro_individual($idconsulta){}
    public function actualizar_inpeccion($idconsulta,$columna,$entrada){}
    public function guardar_infraestructura(){}
    public function obtener_datos_infraestructura(){echo "valio nepe";}
    public function guardar_registro_calendario(){}
    public function desplegar_calendario(){}
    public function tratamiento_registro(){}
    public function tratamiento_infraestructura(){}
    public function tratamiento_calendario(){}
    public function obtener_ultimo_Id_Infraestructura(){}
    public function consulta_infraestructura_individual($idconsulta){}
    public function eliminar_mejora_infraestructura($idconsulta){}
    public function generar_consulta_calendario(){}
    public function obtener_ultimo_Id_calendario(){}
    public function consulta_calendario_individual($idconsulta){}
    public function eliminar_reg_calendario($idconsulta){}
    public function tratamiento_actualizacion_infraestructura($idconsulta){}
    public function actualizacion_infraestructura($idconsulta){}
    public function actualizacion_dinamica_calendario($idconsulta, $estatus){}
    public function recadelario_dinamica_calendatio(){}
    public function consulta_dinamica_calendario(){}
    public function tratamiento_usuarios(){}
    public function guardar_usuario(){}
    public function generar_tabla_usuarios(){}
    public function consulta_usuario(){}
    public function eliminar_usuario($idconsulta){}
    public function actualizar_contrasenna($idconsulta){}
    public function comprobar_usuario(){}
    public function comprobar_contrasenna($idconsulta, $tipo){}

}
?>