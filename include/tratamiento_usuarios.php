<?php
include_once 'tratamiento_constrasenna.php';

class tratamiento_usuarios{
    public function tratamiento_usuarios()
        {
            $obj_trat_cont = new Tratamiento_Contrasenna;

            $entradainfra = array();
            $entradainfra[0] = $_POST["nuevo_nombre"];
            $entradainfra[1] = $_POST["tipo_usuario"];
            $entradainfra[2] = $obj_trat_cont->TratamientoContrasenna();
            $consultasql = "INSERT INTO `mantinfrausuarios` (`nombreUsuario`, `tipoUsuario`, `contrasennaUsuario`) VALUES ('$entradainfra[0]', '$entradainfra[1]', '$entradainfra[2]');";
            return $consultasql;
        }
    }
?>