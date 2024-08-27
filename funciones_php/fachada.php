<?php
interface Fachada{
    public function obtener_ultimo_Id();
    public function obtener_anno_calendario();
    public function guardar_registro();
    public function obtener_historial_registro();
    public function consulta_registro_individual($idconsulta);
    public function guardar_infraestructura();
    public function obtener_datos_infraestructura();
    public function guardar_registro_calendario();
    public function desplegar_calendario();
    public function tratamiento_registro();
    public function tratamiento_infraestructura();
    public function tratamiento_calendario();
    public function obtener_ultimo_Id_Infraestructura();
    public function consulta_infraestructura_individual($idconsulta);
    public function eliminar_mejora_infraestructura($idconsulta);
    public function generar_consulta_calendario();
    public function obtener_ultimo_Id_calendario();
    public function consulta_calendario_individual($idconsulta);
    public function eliminar_reg_calendario($idconsulta);
    public function tratamiento_actualizacion_infraestructura($idconsulta);
    public function actualizacion_infraestructura($idconsulta);
    public function actualizacion_dinamica_calendario($idconsulta, $estatus);
    public function recadelario_dinamica_calendatio();
    public function consulta_dinamica_calendario();
    public function tratamiento_usuarios();
    public function guardar_usuario();
    public function generar_tabla_usuarios();
    public function consulta_usuario();
    public function eliminar_usuario($idconsulta);
    public function actualizar_contrasenna($idconsulta);
    public function comprobar_usuario();
    public function comprobar_contrasenna($idconsulta, $tipo);
}

interface fachada_calendario
{
    public function visualizar();
}
abstract class Meses implements fachada_calendario{}

class Enero extends Meses
{
    public function visualizar()
    {
        echo "<td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class='table-primary'></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>";
    }
}
class Febrero extends Meses
{
    public function visualizar()
    {
        echo "<td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class='table-primary'></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>";
    }
}
class Marzo extends Meses
{
    public function visualizar()
    {
        echo "<td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class='table-primary'></td>
                    <td></td>
                    <td></td>
                    <td></td>";
    }
}
class Abril extends Meses
{
    public function visualizar()
    {
        echo "<td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class='table-primary'></td>
                    <td></td>
                    <td></td>";
    }
}
class Mayo extends Meses
{
    public function visualizar()
    {
        echo "<td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class='table-primary'></td>
                    <td></td>";
    }
}
class Junio extends Meses
{
    public function visualizar()
    {
        echo "<td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class='table-primary'></td>";
    }
}
class Julio extends Meses
{
    public function visualizar()
    {
        echo "<td class='table-primary'></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>";
    }
}
class Agosto extends Meses
{
    public function visualizar()
    {
        echo "<td></td>
                    <td class='table-primary'></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>";
    }
}
class Septiembre extends Meses
{
    public function visualizar()
    {
        echo "<td></td>
                    <td></td>
                    <td class='table-primary'></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>";
    }
}
class Octubre extends Meses
{
    public function visualizar()
    {
        echo "<td></td>
                    <td></td>
                    <td></td>
                    <td class='table-primary'></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>";
    }
}
class Noviembre extends Meses
{
    public function visualizar()
    {
        echo "<td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class='table-primary'></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>";
    }
}
class Diciembre extends Meses
{
    public function visualizar()
    {
        echo "<td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class='table-primary'></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>";
    }
}

abstract class Admin_sql implements Fachada {
    protected $nombreservidor;
    protected $nombreusuario;
    protected $contrasenna;
    protected $baseDatos;
    protected $conexionBD;
    protected $registronuevo;
    abstract protected function crear_conexion();
    abstract protected function cerrar_conxion();
    abstract protected function obtenerVariableconfiguracion();
    abstract protected function tratamiento_contrasenna();
    abstract protected function obtener_contrasenna($idconsulta);
    
}

class Cliente{
    public $manejador;
    public function __construct()
    {
        $this->manejador = new adminMariaDB;
    }
}

class tablameses
{
    protected $mes;
    public function __construct(fachada_calendario $meses)
    {
        $this->mes = $meses;
    }
    public function imprimircalendario()
    {
        $this->mes->visualizar();
    }
}
?>