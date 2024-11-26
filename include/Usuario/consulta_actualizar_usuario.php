<?php
include_once 'conexion.php';
include_once 'EnviarMensaje.php';



class Consulta_Actualizar_Usuario{
    public function consultaActualizarUsuario()
    {
        
        $conexion     = new Crear_Conexion;
        $obj_env_mens = new Enviar_Mensaje;
      
        $fila = array();
        $conexion->crear_conection();
        $sql = "SELECT * FROM `mantinfrausuarios` WHERE idusuario = ? ;";
        $stmt = $conexion->conexionBD->prepare($sql);
        $stmt->bind_param("s", $_GET['q']);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($fila[0], $fila[1], $fila[2], $fila[3]);
        $stmt->fetch();
        $stmt->Close();
        $conexion->cerrar_conxion();

        

        $random = rand();//crea un numero aleatorio como codigo de verificacion
        $message = 'El codigo de actualizacion es: ' . $random . ' ingrese el codigo'; //crea el mensaje   
        $obj_env_mens->EnviarMensaje($message);//se envia el mensaje

     

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
            <input type='hidden' class='form-control' id='origen' name='origen' value='".$fila[0]."' aria-describedby='id de mantenimiento' readonly>
            <input type='hidden' class='form-control' id='codigoCreado' name='codigoCreado' value='".$random."' aria-describedby='id de mantenimiento' readonly>";

        
    }
}
?>