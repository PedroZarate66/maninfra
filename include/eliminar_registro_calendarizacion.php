<?php
include_once 'conexion.php';
include_once 'tabla_meses.php';
include_once 'Enero.php';
include_once 'Febrero.php';
include_once 'Marzo.php';
include_once 'Abril.php';
include_once 'Mayo.php';
include_once 'Junio.php';
include_once 'Julio.php';
include_once 'Agosto.php';
include_once 'Septiembre.php';
include_once 'Octubre.php';
include_once 'Noviembre.php';
include_once 'Diciembre.php';
class Eliminar_Registro_Calendarizacion{
    public function eliminar_reg_cal()
        {
            $conexion = new Crear_Conexion;
            $Meses = array("Año", new Enero, new Febrero, new Marzo, new Abril, new Mayo, new Junio, new Julio, new Agosto, new Septiembre, new Octubre, new Noviembre, new Diciembre);
            $fila = array();
            $conexion->crear_conection();
            $sql = "SELECT * FROM `calendarios` WHERE FechaAnno = ? ORDER BY FechaMes ASC;";
            $stmt = $conexion->conexionBD->prepare($sql);
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
                        if($fila[10] == "1"){
                            echo "<td>Enero</td>";
                        }
                        if($fila[10] == "2"){
                            echo "<td>Febrero</td>";
                        }
                        if($fila[10] == "3"){
                            echo "<td>Marzo</td>";
                        }
                        if($fila[10] == "4"){
                            echo "<td>Abril</td>";
                        }
                        if($fila[10] == "5"){
                            echo "<td>Mayo</td>";
                        }
                        if($fila[10] == "6"){
                            echo "<td>Junio</td>";
                        }
                        if($fila[10] == "7"){
                            echo "<td>Julio</td>";
                        }
                        if($fila[10] == "8"){
                            echo "<td>Agosto</td>";
                        }
                        if($fila[10] == "9"){
                            echo "<td>Septiembre</td>";
                        }
                        if($fila[10] == "10"){
                            echo "<td>Octubre</td>";
                        }
                        if($fila[10] == "11"){
                            echo "<td>Noviembre</td>";
                        }
                        if($fila[10] == "12"){
                            echo "<td>Diciembre</td>";
                        }
                        echo "<td><button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#eliminar' onclick='mostrarregistro(\"".$fila[0]."\")'>Eliminar</button></td>
                        </tr>";
            }
            $stmt->Close();
            $conexion->cerrar_conxion();
        }
    }
?>