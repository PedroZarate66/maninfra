<?php

include_once 'conexion.php';
include_once 'obtener_contrasenna.php';
include_once 'obtenerVariableconfiguracion.php';
class Comprobar_Contrasenna{
    public final function ComprobarContrasenna($id,$fila)
    {
        $varconf = new Obtener_Variable_Configuracion;
        $obtcont = new Obtener_Contrasenna;
       
        $pepper = $varconf->ObtenerVariableConfiguracion();
        
        $pwd = $_POST['password'];
       
        $pwd_peppered = hash_hmac("sha256", $pwd, $pepper);
        
        $pass_hashed = $obtcont->ObtenerContrasenna($id);
        echo "jala";
        if (is_null($fila))
        {
            if(password_verify($pwd_peppered, $pass_hashed)){return true;}
            else{return false;}
        }
    elseif (password_verify($pwd_peppered, $pass_hashed))
        {
            session_start();
            $_SESSION['id'] = $id;
            $_SESSION['usuario'] = $fila["nombreUsuario"];
            $_SESSION['tipo'] = $fila["tipoUsuario"];
            header("Location: ../menu_inicial/");
        }
        else
        {
            echo "Contraseña incorrecta.";
            session_unset();
            session_destroy();
            header("Location: /maninfra/?mensaje=mal_contra");
            exit;
        }
    }
}
?>