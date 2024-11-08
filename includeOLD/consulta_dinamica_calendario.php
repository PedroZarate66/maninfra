<?php
//include_once 'conexion.php'; descomentar si es necesario
include_once 'Admin_sql.php';
abstract class consulta_dinamica_calendario extends Admin_sql{
    public final function consulta_dinamica_calendario()
    {
        $Meses = array("Año", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diviembre");
        $fila = array();
        $this->crear_conexion();
        $sql = "SELECT * FROM `calendarios` WHERE IdCalendario = ? ";
        $stmt = $this->conexionBD->prepare($sql);
        $stmt->bind_param("s", $_GET["q"]);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($fila[0], $fila[1], $fila[2], $fila[3], $fila[4], $fila[5], $fila[6], $fila[7], $fila[8], $fila[9], $fila[10], $fila[11], $fila[12]);
        $stmt->fetch();
        $stmt->Close();
        $this->cerrar_conxion();
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
            <input type='hidden' class='form-control' name='reg_eliminar' value='".$fila[0]."' aria-describedby='id de mantenimiento' readonly>";
    }
}
?>