<?php
include_once 'Admin_sql.php';

abstract class consulta_usuario extends Admin_sql {
    public final function consulta_usuario()
    {
        $fila = array();
        $this->crear_conexion();
        $sql = "SELECT * FROM `mantinfrausuarios` WHERE idusuario = ? ;";
        $stmt = $this->conexionBD->prepare($sql);
        $stmt->bind_param("s", $_GET['q']);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($fila[0], $fila[1], $fila[2], $fila[3]);
        $stmt->fetch();
        $stmt->Close();
        $this->cerrar_conxion();
        echo "<div class='table-responsive-xxl text-center'>
                <table class='table table-light table-bordered table-hover'>
                    <thead>
                        <tr>
                            <th scope='col'>Id Usuario</th>
                            <th scope='col'>Nombre de usuario</th>
                            <th scope='col'>Tipo de usuario</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class='align-middle'>
                            <th scope='row'>" .$fila[0]. "</th>
                            <td>" .$fila[1]. "</td>
                            <td>" .$fila[2]. "</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <input type='hidden' class='form-control' id='origen' name='origen' value='".$fila[0]."' aria-describedby='id de mantenimiento' readonly>";
    }
}
?>