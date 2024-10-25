<?php
include_once 'conexion.php';
class Recadelario_Dinamica_Calendatio{
    public final function RecadelarioDinamicaCalendatio()
    {
        $conexion = new Crear_Conexion;

        $fila = array();
        $conexion->crear_conection();
        $sql = "SELECT * FROM `calendarios` WHERE IdCalendario = ? ";
        $stmt = $conexion->conexionBD->prepare($sql);
        $stmt->bind_param("s", $_GET["q"]);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($fila[0], $fila[1], $fila[2], $fila[3], $fila[4], $fila[5], $fila[6], $fila[7], $fila[8], $fila[9], $fila[10], $fila[11], $fila[12]);
        $stmt->fetch();
        $stmt->Close();
        $conexion->cerrar_conxion();
        $anno = date('Y');
        $annomasuno = $anno++;
        echo '<div
                class="table-responsive-xxl"
            >
                <table
                    class="table table-light table-striped align-middle"
                >
                    <thead>
                        <tr>
                            <th scope="col"><label for="num_inventario" class="form-label">No. inventario</label></th>
                            <th scope="col"><label for="Desc_bien" class="form-label">Descripción del bien</label></th>
                            <th scope="col"><label for="marca" class="form-label">Marca</label></th>
                            <th scope="col"><label for="modelo" class="form-label">Modelo</label></th>
                            <th scope="col"><label for="num_serie" class="form-label">No. serie</label></th>
                            <th scope="col"><label for="ubicacion_Desc" class="form-label">Descripción de la ubicación</label></th>
                            <th scope="col"><label for="proveedor" class="form-label">Proveedor</label></th>
                            <th scope="col"><label for="tipo_mantenimiento" class="form-label">Tipo de mantenimiento</label></th>
                            <th scope="col">Fecha de realizacion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">
                                <input
                                    type="text"
                                    class="form-control"
                                    name="num_inventario"
                                    id="num_inventario"
                                    aria-describedby="numero de inventario que recivira mantenimiento"
                                    placeholder="Numero de inventario"
                                    value="'.$fila[1].'"
                                />
                            </td>
                            <td>
                                <textarea class="form-control" name="Desc_bien" id="Desc_bien" rows="3" required>'.$fila[2].'</textarea>
                            </td>
                            <td>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="marca"
                                    id="marca"
                                    aria-describedby="marca de la pieza"
                                    placeholder="Marca"
                                    value="'.$fila[3].'"
                                />
                            </td>
                            <td>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="modelo"
                                    id="modelo"
                                    aria-describedby="modelo de la pieza"
                                    placeholder="Modelo"
                                    value="'.$fila[4].'"
                                />
                            </td>
                            <td>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="num_serie"
                                    id="num_serie"
                                    aria-describedby="numero de serie de la pieza"
                                    placeholder="Numero de serie"
                                    value="'.$fila[5].'"
                                />
                            </td>
                            <td>
                                <textarea class="form-control" name="ubicacion_Desc" id="ubicacion_Desc" rows="3" required>'.$fila[6].'</textarea>
                            </td>
                            <td>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="proveedor"
                                    id="proveedor"
                                    aria-describedby="proveedor de la pieza"
                                    placeholder="Proveedor"
                                    value="'.$fila[7].'"
                                    required
                                />
                            </td>
                            <td>
                                <select class="form-select" name="tipo_mantenimiento" id="tipo_mantenimiento" aria-label="tipo de mantenimiento a realizar" required>
                                    <option selected disabled value="">Porfavor seleccione una opcion</option>
                                    <option value="Correctivo">Correctivo</option>
                                    <option value="Preventivo">Preventivo</option>
                                    <option value="Predictivo">Predictivo</option>
                                </select>
                            </td>
                            <td class="align-top">
                                <div
                                    class="row"
                                >
                                    <div class="col">
                                    <label for="mes" class="form-label">Mes</label>
                                        <select class="form-select" name="mes" id="mes" aria-label="Nivel de prioridad" required>
                                            <option selected disabled value="">Seleccione mes</option>
                                            <option value="1">Enero</option>
                                            <option value="2">Febrero</option>
                                            <option value="3">Marzo</option>
                                            <option value="4">Abril</option>
                                            <option value="5">Mayo</option>
                                            <option value="6">Junio</option>
                                            <option value="7">Julio</option>
                                            <option value="8">Agosto</option>
                                            <option value="9">Septiembre</option>
                                            <option value="10">Octubre</option>
                                            <option value="11">Noviembre</option>
                                            <option value="12">Diciembre</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="anno" class="form-label">Año</label>
                                        <select class="form-select form-select-sm" name="anno" id="anno" required>
                                            <option selected disabled value="">Seleccione año</option>
                                            <option value="'. $annomasuno.'">'.$annomasuno.'</option>
                                            <option value="'.$anno.'">'.$anno.'</option>
                                        </select>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>';
    }
}   
?>