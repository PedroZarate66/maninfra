<?php
include_once '../../include/conexion.php';
include_once '../Meses/tabla_meses.php';
include_once '../Meses/enero.php';
include_once '../Meses/febrero.php';
include_once '../Meses/marzo.php';
include_once '../Meses/abril.php';
include_once '../Meses/mayo.php';
include_once '../Meses/junio.php';
include_once '../Meses/julio.php';
include_once '../Meses/agosto.php';
include_once '../Meses/septiembre.php';
include_once '../Meses/octubre.php';
include_once '../Meses/noviembre.php';
include_once '../Meses/diciembre.php';
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
            $stmt->bind_result($fila[0], $fila[1], $fila[2], $fila[3], $fila[4], $fila[5], $fila[6], $fila[7], $fila[8], $fila[9], $fila[10], $fila[11], $fila[12],$fila[13]);
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



        public function eliminar_reg_calT1()
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
            $stmt->bind_result($fila[0], $fila[1], $fila[2], $fila[3], $fila[4], $fila[5], $fila[6], $fila[7], $fila[8], $fila[9], $fila[10], $fila[11], $fila[12], $fila[13]);
            
            echo "
            
                <table class='table-light table-bordered table-hover' id='tablauno'>
                        <thead class='activo'>
                            <tr>
                                <th scope='col'>No. inventario</th>
                                <th scope='col'>Descripcion del bien</th>
                                <th scope='col'>Marca</th>
                                <th scope='col'>Modelo</th>
                                <th scope='col'>No. de Serie</th>
                                <th scope='col'>Descripcion de la ubicacion</th>
                            </tr>
                        </thead>

                        <tbody>

            ";

            while ($stmt->fetch())
            {
                $calendario = new tablameses($Meses[$fila[10]]);

                if($fila[13] === 1){
                    echo "
                
                
                
                    <tr class='activo align-middle'>
                        <th scope='row'>" .$fila[1]. "</th>
                        <td>" .$fila[2]. "</td>
                        <td>" .$fila[3]. "</td>
                        <td>" .$fila[4]. "</td>
                        <td>" .$fila[5]. "</td>
                        <td>" .$fila[6]. "</td>
                    </tr>
                    
                    
                    
                    ";
                }else{
                    echo "
                
                
                
                    <tr class='inactivo align-middle'>
                        <th scope='row'>" .$fila[1]. "</th>
                        <td>" .$fila[2]. "</td>
                        <td>" .$fila[3]. "</td>
                        <td>" .$fila[4]. "</td>
                        <td>" .$fila[5]. "</td>
                        <td>" .$fila[6]. "</td>
                    </tr>
                    
                    
                    
                    ";
                }

                
            }
                    

            echo "

                    </tbody>
                </table>
            
            ";

            $stmt->Close();
            $conexion->cerrar_conxion();
        }


        public function eliminar_reg_calT2()
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
            $stmt->bind_result($fila[0], $fila[1], $fila[2], $fila[3], $fila[4], $fila[5], $fila[6], $fila[7], $fila[8], $fila[9], $fila[10], $fila[11], $fila[12], $fila[13]);
            
            echo "
            
                <table class='table-light table-bordered table-hover' id='tablados'>
                        <thead class='activo'>
                            <tr>
                                <th scope='col'>Proveedor</th>
                                <th scope='col'>Tipo</th>
                                <th scope='col'>Origen</th>
                                <th scope='col'>Estatus</th>
                                <th scope='col'>Mes</th>
                                <th scope='col'>Accion</th>
                            </tr>
                        </thead>

                        <tbody>

            ";

            while ($stmt->fetch())
            {
                $calendario = new tablameses($Meses[$fila[10]]);

                if($fila[13] === 1){

                    echo "<tr class='activo align-middle'>
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
                            echo "<td><button type='button' class='btn btn-danger' id='btneliminar' data-bs-toggle='modal' data-bs-target='#eliminar' onclick='mostrarregistro(\"".$fila[0]."\")'>Eliminar</button></td>
                            </tr>";
                    }else{
                        echo "<tr class='inactivo align-middle'>
                        <td>" .$fila[7]. "</td>
                        <td>" .$fila[8]. "</td>
                        <td><a class='btn' role='button' data-bs-toggle='modal' data-bs-target='#visualizar' onclick='mostrarmejora(\"".$fila[9]."\")'>".$fila[9]."</a></td>
                        <td>". $fila[12]. "</td>";

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
                        echo "<td>Eliminado</td>
                        </tr>";
                    }
            }

            echo "

                    </tbody>
                </table>
            
            ";

            $stmt->Close();
            $conexion->cerrar_conxion();
        }

    }
?>