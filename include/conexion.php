<?php
//este archivo se encarga de realizar la conexion a la base de datos

class Crear_Conexion{
    public function crear_conection()
        {
            $this->nombreservidor = "localhost";
            $this->nombreusuario = "root";
            $this->contrasenna = "";
            $this->baseDatos = "infraharX";
            $this->conexionBD = new mysqli($this->nombreservidor, $this->nombreusuario, $this->contrasenna, $this->baseDatos);
        }

    public function cerrar_conxion()
        {
            $this->conexionBD->close();
        }
}


?>
