<?php
include_once 'fachada_calendario.php';
class tablameses
{
    protected $mes;
    public final function __construct(fachada_calendario $meses)
    {
        $this->mes = $meses;
    }
    public final function imprimircalendario()
    {
        $this->mes->visualizar();
    }
}
?>