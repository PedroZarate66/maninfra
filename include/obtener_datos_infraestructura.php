<?php
include_once 'conexion.php';

class Obtener_Dat_Infraestructura{
    
    public function obtener_datos_infraestructura()
    {   
        $conexion = new Crear_Conexion;
        $conexion->crear_conection();
        $sql = "SELECT `IdMejora`, `Aspecto`, `Descripcion`, `Beneficios`, `TipoMantenimiento`, `Frecuencia`, `MesPropuesto`, `AnnoPropuesto`, `Prioridad`, `Costo`, DATE_FORMAT(`UltimaActualizacion`, '%d-%m-%Y') AS UltimaActualizacion, `HaSidoPlaneado` FROM `actualizacionmejoramantenimietos` ORDER BY `UltimaActualizacion` ASC;";
        $resultado = $conexion->conexionBD->query($sql);
        if($resultado->num_rows > 0)
        {

            echo "
                <table class='table table-light table-bordered table-hover'>
                            <thead>
                                <tr>
                                        <th scope='col'>Aspecto</th>
                                        <th scope='col'>Descripción</th>
                                        <th scope='col'>Beneficios</th>
                                        <th scope='col'>Tipo de mantenimiento</th>
                                        <th scope='col'>Frecuencia</th>
                           
            ";

            while($fila = $resultado->fetch_assoc())
            {
                if ($fila["HaSidoPlaneado"] == 'Si')
                {
                    echo " 
                            <tbody>

                            <tr class='align-middle table-warning'>
                            <th scope='row'>" .$fila["Aspecto"]. "</th>
                            <td>" .$fila["Descripcion"]. "</td>
                            <td>" .$fila["Beneficios"]. "</td>
                            <td>" .$fila["TipoMantenimiento"]. "</td>
                            <td>" .$fila["Frecuencia"]. "</td>
                        </tr>
                      
                        ";
                    }
                else
                {
                    echo "
                        <tr class='align-middle'>
                            <th scope='row'>" .$fila["Aspecto"]. "</th>
                            <td>" .$fila["Descripcion"]. "</td>
                            <td>" .$fila["Beneficios"]. "</td>
                            <td>" .$fila["TipoMantenimiento"]. "</td>
                            <td>" .$fila["Frecuencia"]. "</td>";
                }
            }
        }
        else
        {
            echo "Cero resultados";
        }

        $conexion->cerrar_conxion();
    }

    public function obtener_datos_infraestructuraT1()
    {   
        $conexion = new Crear_Conexion;
        $conexion->crear_conection();
        $sql = "SELECT `IdMejora`, `Aspecto`, `Descripcion`, `Beneficios`, `TipoMantenimiento`, `Frecuencia`, `MesPropuesto`, `AnnoPropuesto`, `Prioridad`, `Costo`, DATE_FORMAT(`UltimaActualizacion`, '%d-%m-%Y') AS UltimaActualizacion, `HaSidoPlaneado` FROM `actualizacionmejoramantenimietos` ORDER BY `UltimaActualizacion` ASC;";
        $resultado = $conexion->conexionBD->query($sql);
        if($resultado->num_rows > 0)
        {

            echo 
            "
            
            <table class='table table-light table-bordered table-hover'>
                    <thead>
                        <tr>
                            <th scope='col'>Aspecto</th>
                            <th scope='col'>Descripción</th>
                            <th scope='col'>Beneficios</th>
                            <th scope='col'>Tipo de mantenimiento</th>
                            <th scope='col'>Frecuencia</th>
                        </tr>
                        <tr>
            
            ";


            while($fila = $resultado->fetch_assoc())
            {
                if ($fila["HaSidoPlaneado"] == 'Si')
                {
                    echo " 
                            <tr class='align-middle table-warning'>
                            <th scope='row'>" .$fila["Aspecto"]. "</th>
                            <td>" .$fila["Descripcion"]. "</td>
                            <td>" .$fila["Beneficios"]. "</td>
                            <td>" .$fila["TipoMantenimiento"]. "</td>
                            <td>" .$fila["Frecuencia"]. "</td>
                        </tr>";
                }
                else
                {
                    echo "
                            <tr class='align-middle'>
                            <th scope='row'>" .$fila["Aspecto"]. "</th>
                            <td>" .$fila["Descripcion"]. "</td>
                            <td>" .$fila["Beneficios"]. "</td>
                            <td>" .$fila["TipoMantenimiento"]. "</td>
                            <td id='tabla'>" .$fila["Frecuencia"]."</td>
                        </tr>
                        <input type='hidden' class='form-control' id='origen' name='origen' value='".$fila["IdMejora"]."' aria-describedby='id de mantenimiento' readonly>";
                }
            }

            echo "
                </tr>
                </thead>
                </table>
                
                ";
        }
        else
        {
            echo "Cero resultados";
        }

        $conexion->cerrar_conxion();
    }


    public function obtener_datos_infraestructuraT2()
    {   
        $conexion = new Crear_Conexion;
        $conexion->crear_conection();
        $sql = "SELECT `IdMejora`, `Aspecto`, `Descripcion`, `Beneficios`, `TipoMantenimiento`, `Frecuencia`, `MesPropuesto`, `AnnoPropuesto`, `Prioridad`, `Costo`, DATE_FORMAT(`UltimaActualizacion`, '%d-%m-%Y') AS UltimaActualizacion, `HaSidoPlaneado` FROM `actualizacionmejoramantenimietos` ORDER BY `UltimaActualizacion` ASC;";
        $resultado = $conexion->conexionBD->query($sql);
        if($resultado->num_rows > 0)
        {

            echo 
            "
            
            <table class='table table-light table-bordered table-hover'>
                    <thead>
                        <tr>
                            <th scope='col'>Fecha propuesta</th>
                            <th scope='col'>Prioridad</th>
                            <th scope='col'>Costo</th>
                            <th scope='col'>Ultima Actualizacion</th>
                            <th scope='col'></th>
                        </tr>
                        <tr>
            ";


            while($fila = $resultado->fetch_assoc())
            {
                if ($fila["HaSidoPlaneado"] == 'Si')
                {
                    echo " 
                            <td>" .$fila["MesPropuesto"]." ".$fila["AnnoPropuesto"]. "</td>
                            <td>" .$fila["Prioridad"]. "</td>
                            <td>$" .$fila["Costo"]. "</td>
                            <td>" .$fila["UltimaActualizacion"]. "</td> 
                            <td>
                                <div class='btn-group'>
                                    <button type='button' class='btn btn-primary dropdown-toggle' data-bs-toggle='dropdown' aria-expanded='false'>Accion</button>
                                    <ul class='dropdown-menu'>
                                        <li><a class='dropdown-item' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasScrolling' onclick='mostrarmejora(\"".$fila["IdMejora"]."\")'>Calendarizar</a></li>
                                        <li><button class='dropdown-item' type='submit'>Editar</button></li>
                                        <li><a class='dropdown-item' type='button' data-bs-toggle='modal' data-bs-target='#eliminar' onclick='mostrarmejora(\"".$fila["IdMejora"]."\")'>Eliminar</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>";
                }
                else
                {
                    echo "
                            <td>" .$fila["MesPropuesto"]." ".$fila["AnnoPropuesto"]. "</td>
                            <td>" .$fila["Prioridad"]. "</td>
                            <td>$" .$fila["Costo"]. "</td>
                            <td>" .$fila["UltimaActualizacion"]. "</td> 
                            <td id='tabla'>
                                <div class='btn-group'>
                                    <button type='button' class='btn btn-primary dropdown-toggle' data-bs-toggle='dropdown' aria-expanded='false'>Accion</button>
                                    <ul class='dropdown-menu'>
                                        <li><a class='dropdown-item' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasScrolling' onclick='mostrarmejora(\"".$fila["IdMejora"]."\")'>Calendarizar</a></li>
                                        <li><button class='dropdown-item' type='submit'>Editar</button></li>
                                        <li><a class='dropdown-item' type='button' data-bs-toggle='modal' data-bs-target='#eliminar' onclick='mostrarmejora(\"".$fila["IdMejora"]."\")'>Eliminar</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <input type='hidden' class='form-control' id='origen' name='origen' value='".$fila["IdMejora"]."' aria-describedby='id de mantenimiento' readonly>";
                }
            }

            echo "
                </tr>
                </thead>
                </table>
                
                ";
        }
        else
        {
            echo "Cero resultados";
        }

        $conexion->cerrar_conxion();
    }

}
?>
