<?php
include_once 'Admin_sql.php';

abstract class generar_consulta_calendario extends Admin_sql{
    public final function generar_consulta_calendario()
    {
        $fila = array();
        $this->crear_conexion();
        $sql = "SELECT IdMejora, Aspecto, Descripcion, Beneficios,TipoMantenimiento,Frecuencia,MesPropuesto,AnnoPropuesto,Prioridad,Costo,DATE_FORMAT(`UltimaActualizacion`, '%d-%m-%Y') AS UltimaActualizacion FROM `actualizacionmejoramantenimietos` WHERE IdMejora = ? ";
        $stmt = $this->conexionBD->prepare($sql);
        $stmt->bind_param("s", $_GET['q']);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($fila[0], $fila[1], $fila[2], $fila[3], $fila[4], $fila[5], $fila[6], $fila[7], $fila[8], $fila[9], $fila[10]);
        $stmt->fetch();
        $stmt->Close();
        $this->cerrar_conxion();
        if (is_null($fila[0]))
        {
            echo "La entrada de infraestructura no existe o ha sido eliminado.";
        }
        else{
        echo "<div class='table-responsive-xxl text-center'>
                <table class='table table-light table-bordered table-hover'>
                    <thead>
                        <tr>
                            <th scope='col'>Aspecto</th>
                            <th scope='col'>Descripción</th>
                            <th scope='col'>Beneficios</th>
                            <th scope='col'>Tipo de mantenimiento</th>
                            <th scope='col'>Frecuencia</th>
                            <th scope='col'>Fecha propuesta</th>
                            <th scope='col'>Prioridad</th>
                            <th scope='col'>Costo</th>
                            <th scope='col'>Ultima Actualizacion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class='align-middle'>
                            <th scope='row'>" .$fila[1]. "</th>
                            <td>" .$fila[2]. "</td>
                            <td>" .$fila[3]. "</td>
                            <td>" .$fila[4]. "</td>
                            <td>" .$fila[5]. "</td>
                            <td>" .$fila[6]." ".$fila[7]. "</td>
                            <td>" .$fila[8]. "</td>
                            <td>$" .$fila[9]. "</td>
                            <td>" .$fila[10]. "</td> 
                        </tr>
                    </tbody>
                </table>
            </div>
            <input type='hidden' class='form-control' id='origen' name='origen' value='".$fila[0]."' aria-describedby='id de mantenimiento' readonly>";}
    }
}
?>