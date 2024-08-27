<?php
include_once 'Admin_sql.php';
include_once 'tabla_meses.php';

abstract class desplegar_calendario extends Admin_sql{
    public final function desplegar_calendario()
        {
            $Meses = array("Año", new Enero, new Febrero, new Marzo, new Abril, new Mayo, new Junio, new Julio, new Agosto, new Septiembre, new Octubre, new Noviembre, new Diciembre);
            $fila = array();
            $this->crear_conexion();
            $sql = "SELECT * FROM `calendarios` WHERE FechaAnno = ? ORDER BY FechaMes ASC;";
            $stmt = $this->conexionBD->prepare($sql);
            $stmt->bind_param("s", $_GET['q']);
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($fila[0], $fila[1], $fila[2], $fila[3], $fila[4], $fila[5], $fila[6], $fila[7], $fila[8], $fila[9], $fila[10], $fila[11], $fila[12]);
            while ($stmt->fetch())
            {
                $calendario = new tablameses($Meses[$fila[10]]);
                echo "<tr class='align-middle'>
                        <th scope='row'>" .$fila[1]. "</th>
                        <td>" .$fila[2]. "</td>
                        <td>" .$fila[3]. "</td>
                        <td>" .$fila[4]. "</td>
                        <td>" .$fila[5]. "</td>
                        <td>" .$fila[6]. "</td>
                        <td>" .$fila[7]. "</td>
                        <td>" .$fila[8]. "</td>
                        <td><a class='btn' role='button' data-bs-toggle='modal' data-bs-target='#visualizar' onclick='mostrarmejora(\"".$fila[9]."\")'>".$fila[9]."</a></td>
                        <td>
                            <select class='form-select' name='estatus_actual' onchange='cambiarEstatus(\"".$fila[0]."\",this.value)'>
                                <option selected disabled value=''>".$fila[12]."</option>
                                <option value='Realizado'>Realizado</option>
                                <option value='Por realizar'>Por realizar</option>
                                <option value='En adjudicacion'>En Adjudicacion</option>
                                <option value='Reprogramado'>Reprogramar</option>
                                <option value='Pendiente'>Pendiente</option>
                            </select>
                        </td>";
                        $calendario->imprimircalendario();
                    echo "<td><button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#eliminar' onclick='mostrarregistro(\"".$fila[0]."\")'>Elimnar</button></td>
                        </tr>";
            }
            $stmt->Close();
            $this->cerrar_conxion();
        }
    }
?>