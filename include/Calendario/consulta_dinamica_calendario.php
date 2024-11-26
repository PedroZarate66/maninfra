<?php
include_once '../../include/conexion.php';
include_once '../Telegram/EnviarMensaje.php';

class Consulta_Dinamica_Calendario{
    public function ConsultaDinamicaCalendario()
    {
        $conexion = new Crear_Conexion;
        $obj_env_mens = new Enviar_Mensaje;

        $Meses = array("Año", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $fila = array();
        $conexion->crear_conection();
        $sql = "SELECT * FROM `calendarios` WHERE IdCalendario = ? ";
        $stmt = $conexion->conexionBD->prepare($sql);
        $stmt->bind_param("s", $_GET["q"]);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($fila[0], $fila[1], $fila[2], $fila[3], $fila[4], $fila[5], $fila[6], $fila[7], $fila[8], $fila[9], $fila[10], $fila[11], $fila[12],$fila[13]);
        $stmt->fetch();
        $stmt->Close();
        $conexion->cerrar_conxion();


        $random = rand(1000,9000);

        
        $message = 'El codigo de eliminacion es: ' . $random . ' ingrese el codigo'; //crea el mensaje   
        $obj_env_mens->EnviarMensaje($message);//se envia el mensaje


        echo "<div class='table-responsive'>
                <table class='table table-bordered'>
                    <thead>
                        <tr>
                            <th scope='col'>Id</th>
                            <th scope='col'>No. inventario</th>
                            <th scope='col'>Descripción del bien</th>
                            <th scope='col'>Marca</th>
                            <th scope='col'>Modelo</th>
                            <th scope='col'>No. serie</th>
                            <th scope='col'>Descripción de la ubicación</th>
                            <th scope='col'>Proveedor</th>
                            <th scope='col'>Tipo de Mantenimiento</th>
                            <th scope='col'>Origen</th>
                            <th scope='col'>Fecha de realizacion</th>
                            <th scope='col'>Estatus</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope='row'>".$fila[0]."</th>
                            <td>".$fila[1]."</td>
                            <td>".$fila[2]."</td>
                            <td>".$fila[3]."</td>
                            <td>".$fila[4]."</td>
                            <td>".$fila[5]."</td>
                            <td>".$fila[6]."</td>
                            <td>".$fila[7]."</td>
                            <td>".$fila[8]."</td>
                            <td>".$fila[9]."</td>
                            <td>".$Meses[$fila[10]]." ".$fila[11]."</td>
                            <td>".$fila[12]."</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br>
            <input type='hidden' class='form-control' name='reg_eliminar' value='".$fila[0]."' aria-describedby='id de mantenimiento' readonly>
            <input type='hidden' class='form-control' id='codigoCreado' name='codigoCreado' value='".$random."' aria-describedby='id de mantenimiento' readonly>";
    }
}
?>