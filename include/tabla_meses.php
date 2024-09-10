<?php
include_once 'fachada_calendario.php';
abstract class tablameses implements fachada_calendario{
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