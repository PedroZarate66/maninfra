<?php
include_once '../Calendario/fachada_calendario.php';
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