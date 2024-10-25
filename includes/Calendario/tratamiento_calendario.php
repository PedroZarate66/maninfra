<?php 
include_once 'obtener_ultimo_Id_calendario.php';

class Trat_Calendario{
    public function tratamiento_calendario()
    {
        $obj_obt_ult_id_cal = new Obtener_Ult_Id_Calendario;

        $identrada = $obj_obt_ult_id_cal->obtener_ultimo_Id_calendario();
        $identrada++;
        $calendarioEntrada = array();
        $calendarioEntrada[0] = $identrada;
        if (empty($_POST["num_inventario"])){$calendarioEntrada[1] = "N/A";}else{$calendarioEntrada[1] = $_POST["num_inventario"];}
        $calendarioEntrada[2] = $_POST["Desc_bien"];
        if (empty($_POST["marca"])){$calendarioEntrada[3] = "N/A";}else{$calendarioEntrada[3] = $_POST["marca"];}
        if (empty($_POST["modelo"])){$calendarioEntrada[4] = "N/A";}else{$calendarioEntrada[4] = $_POST["modelo"];}
        if (empty($_POST["num_serie"])){$calendarioEntrada[5] = "N/A";}else{$calendarioEntrada[5] = $_POST["num_serie"];}
        $calendarioEntrada[6] = $_POST["ubicacion_Desc"];
        $calendarioEntrada[7] = $_POST["proveedor"];
        $calendarioEntrada[8] = $_POST["tipo_mantenimiento"];
        if (empty($_POST["origen"])){$calendarioEntrada[9] = "N/A";}else{$calendarioEntrada[9] = $_POST["origen"];}
        $calendarioEntrada[10] = $_POST["mes"];
        $calendarioEntrada[11] = $_POST["anno"];
        $calendarioEntrada[12] = "Pendiente";
        if (empty($_POST["origen"]))
        {
            $consultasql = "INSERT INTO `calendarios` (`IdCalendario`, `NumInventario`, `DescBien`, `Marca`, `Modelo`, `NumSerie`, `DescUbicacion`, `Proveedor`, `TipoMantenimiento`, `Origen`, `FechaMes`, `FechaAnno`, `Estatus`) 
                            VALUES ('$calendarioEntrada[0]', '$calendarioEntrada[1]', '$calendarioEntrada[2]', '$calendarioEntrada[3]', '$calendarioEntrada[4]', '$calendarioEntrada[5]', '$calendarioEntrada[6]', '$calendarioEntrada[7]', '$calendarioEntrada[8]', '$calendarioEntrada[9]', '$calendarioEntrada[10]', '$calendarioEntrada[11]','$calendarioEntrada[12]');";
        }
        else
        {
            $consultasql = "UPDATE actualizacionmejoramantenimietos SET HaSidoPlaneado= 'Si' WHERE IdMejora= '$calendarioEntrada[9]'; INSERT INTO `calendarios` (`IdCalendario`, `NumInventario`, `DescBien`, `Marca`, `Modelo`, `NumSerie`, `DescUbicacion`, `Proveedor`, `TipoMantenimiento`, `Origen`, `FechaMes`, `FechaAnno`, `Estatus`) 
                            VALUES ('$calendarioEntrada[0]', '$calendarioEntrada[1]', '$calendarioEntrada[2]', '$calendarioEntrada[3]', '$calendarioEntrada[4]', '$calendarioEntrada[5]', '$calendarioEntrada[6]', '$calendarioEntrada[7]', '$calendarioEntrada[8]', '$calendarioEntrada[9]', '$calendarioEntrada[10]', '$calendarioEntrada[11]','$calendarioEntrada[12]');";
        }
        return $consultasql;
    }
}
?>