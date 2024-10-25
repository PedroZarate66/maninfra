<?php
//esta funcion guarda los registros que se han ingresado en el formulario
//de calendarizacion de mantenimiento 
include_once '../../include/conexion.php';
include_once 'obtener_ultimo_Id_calendario.php';
include_once 'tratamiento_calendario.php';
include_once 'consulta_calendario_individual.php';

class Guardar_Reg_Calendario{
        public function guardar_registro_calendario()
        {
            //objetos que son utilizados para llamar a los metodos de las clases que se han incluido
            $conexion        = new Crear_Conexion;
            $obj_obt_id_cal  = new Obtener_Ult_Id_Calendario;
            $obj_trat_cal    = new Trat_Calendario;
            $obj_con_cal_ind = new Consulta_Calend_Individual;
            //Se consulta el ultimo ID de la tabla calendarios
            $idconsulta      = $obj_obt_id_cal->obtener_ultimo_Id_calendario();
            //Se realiza el tratamiento de los datos, ya sea para su insercion o su actualizacion
            $sql = $obj_trat_cal->tratamiento_calendario();
            //Se abre la conexion con la base de datos
            $conexion->crear_conection();

            //Se verifica si es que la conexion ha sido exitosa o fallida
            if ($conexion->conexionBD->multi_query($sql) === TRUE){
                echo "<br>";
            }else {
                echo "Error: ".$sql."<br>".$conexion->conexionBD->error;
            }
            //Se cierra la conexion con la base de datos
            $conexion->cerrar_conxion();
            //Volvemos a consultar el ultimo ID con la base de datos una vez ya ingresado el registro
            $idconsulta = $obj_obt_id_cal->obtener_ultimo_Id_calendario();
            //Aqui se guarda dentro de la variable $resultado la consulta de los datos del ultimo
            //registro ingresado
            $resultado = $obj_con_cal_ind->consulta_calendario_individual($idconsulta);
            //Se retorna la variable $resultados para poder ver los resultados en el index
            return $resultado;//no realiza el retorno de ninguna variable
        }
}

?>