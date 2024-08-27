<?php
include_once 'conexion.php';

class Generar_Tabla_Usu{
    public function generar_tabla_usuarios()
    {
        $conexion = new Crear_Conexion;
        $conexion->crear_conection();
        $sql = "SELECT * FROM `mantinfrausuarios`;";
        $resultado = $conexion->conexionBD->query($sql);
        if ($resultado->num_rows > 0)
        {
            while($fila = $resultado->fetch_assoc())
            {
                echo "<tr class='align-middle'>
                            <th scope='row'>" .$fila["idusuario"]. "</th>
                            <td>" .$fila["nombreUsuario"]. "</td>
                            <td>" .$fila["tipoUsuario"]. "</td>
                            <td>" .$fila["contrasennaUsuario"]. "</td>
                            <td>
                                <div class='btn-group'>
                                    <button type='button' class='btn btn-primary dropdown-toggle' data-bs-toggle='dropdown' aria-expanded='false'>Accion</button>
                                    <ul class='dropdown-menu'>
                                        <li><a class='dropdown-item' type='button' data-bs-toggle='modal' data-bs-target='#actualizar' onclick='mostrarusuario(\"".$fila["idusuario"]."\")'>Actualizar Contraseña</a></li>
                                        <li><a class='dropdown-item' type='button' data-bs-toggle='modal' data-bs-target='#eliminaruser' onclick='mostrarusuario(\"".$fila["idusuario"]."\")'>Eliminar</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>";
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