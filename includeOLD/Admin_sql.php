<?php
include_once 'fachada_sql.php';
abstract class Admin_sql implements Fachada_sql {
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
?> 