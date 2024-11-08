<?php
include_once 'obtenerVariableconfiguracion.php';

class Tratamiento_Contrasenna{
    protected function TratamientoContrasenna()
    {
        $obj_obt_var_conf = new Obtener_Variable_Configuracion;
        $pepper = $obj_obt_var_conf->ObtenerVariableConfiguracion();
        $pass = $_POST['nueva_contrasenna'];
        $pass_peppered = hash_hmac("sha256", $pass, $pepper);
        $pass_hashed = password_hash($pass_peppered, PASSWORD_DEFAULT);
        return $pass_hashed;
    }
}
?>