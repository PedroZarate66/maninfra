<?php
//include_once 'conexion.php'; descomentar solo si es necesario
include_once 'Admin_sql.php';

abstract class comprobar_contrasenna extends Admin_sql{
    public final function comprobar_contrasenna($id,$fila)
    {
        $pepper = $this->obtenerVariableconfiguracion();
        $pwd = $_POST['password'];
        $pwd_peppered = hash_hmac("sha256", $pwd, $pepper);
        $pass_hashed = $this->obtener_contrasenna($id);
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
            header("Location: ../");
            exit;
        }
    }
}
?>