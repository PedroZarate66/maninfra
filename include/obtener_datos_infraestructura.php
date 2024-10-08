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
            while($fila = $resultado->fetch_assoc())
            {
                if ($fila["HaSidoPlaneado"] == 'Si')
                {
                    echo "<tr class='align-middle table-warning'>
                            <th scope='row'>" .$fila["Aspecto"]. "</th>
                            <td>" .$fila["Descripcion"]. "</td>
                            <td>" .$fila["Beneficios"]. "</td>
                            <td>" .$fila["TipoMantenimiento"]. "</td>
                            <td>" .$fila["Frecuencia"]. "</td>
                            <td>" .$fila["MesPropuesto"]." ".$fila["AnnoPropuesto"]. "</td>
                            <td>" .$fila["Prioridad"]. "</td>
                            <td>$" .$fila["Costo"]. "</td>
                            <td>" .$fila["UltimaActualizacion"]. "</td> 
                            <td>
                                <div class='btn-group'>
                                    <button type='button' class='btn btn-primary dropdown-toggle' data-bs-toggle='dropdown' aria-expanded='false'>Accion</button>
                                    <ul class='dropdown-menu'>
                                        <li><a class='dropdown-item' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasScrolling' onclick='mostrarmejora(\"".$fila["IdMejora"]."\")'>Calendarizar</a></li>
                                        <li><a class='dropdown-item' type='button' data-bs-toggle='modal' data-bs-target='#editar' onclick='mostrarmejora(\"".$fila["IdMejora"]."\")'>Editar</a></li>
                                        <li><a class='dropdown-item' type='button' data-bs-toggle='modal' data-bs-target='#eliminar' onclick='mostrarmejora(\"".$fila["IdMejora"]."\")'>Eliminar</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>";
                }
                else
                {
                    echo "<tr class='align-middle'>
                            <th scope='row'>" .$fila["Aspecto"]. "</th>
                            <td>" .$fila["Descripcion"]. "</td>
                            <td>" .$fila["Beneficios"]. "</td>
                            <td>" .$fila["TipoMantenimiento"]. "</td>
                            <td>" .$fila["Frecuencia"]. "</td>
                            <td>" .$fila["MesPropuesto"]." ".$fila["AnnoPropuesto"]. "</td>
                            <td>" .$fila["Prioridad"]. "</td>
                            <td>$" .$fila["Costo"]. "</td>
                            <td>" .$fila["UltimaActualizacion"]. "</td> 
                            <td>
                                <div class='btn-group'>
                                    <button type='button' class='btn btn-primary dropdown-toggle' data-bs-toggle='dropdown' aria-expanded='false'>Accion</button>
                                    <ul class='dropdown-menu'>
                                        <li><a class='dropdown-item' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasScrolling' onclick='mostrarmejora(\"".$fila["IdMejora"]."\")'>Calendarizar</a></li>
                                        <li><a class='dropdown-item' type='button' data-bs-toggle='modal' data-bs-target='#editar' onclick='mostrarmejora(\"".$fila["IdMejora"]."\")'>Editar</a></li>
                                        <li><a class='dropdown-item' type='button' data-bs-toggle='modal' data-bs-target='#eliminar' onclick='mostrarmejora(\"".$fila["IdMejora"]."\")'>Eliminar</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>";
                }
            }
        }
        else
        {
            echo "Cero resultados";
        }

        $conexion->cerrar_conxion();
    }
    
}
?>