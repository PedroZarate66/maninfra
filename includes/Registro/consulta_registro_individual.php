<?php
include_once '../conexion.php';

class Consulta_Reg_Individual{
    public function consulta_registro_individual($idconsulta)
    {
        
        $conexion = new Crear_Conexion;
        $conexion->crear_conection();
        $sql = "SELECT `IdRegistro`, 
        `DiaSemana`,  
        DATE_FORMAT(`Fecha`, '%d-%m-%Y') AS Fecha, 
        `EntradaoSalida`, 
        `BioAccesoPrincipal`, `BioOficina`, `BioVigilancia`, `BioEsclusa`, `BioTriage`, `BioCpd`, `BioCe`, `BioObservaciones`, 
        `LamparaRecepcion`, `LamparaPasillos`, `LamparaCpdUno`, `LamparaCpdDos`, `LamparaCeUno`, `LamparaCeDos`, `LamparaObservaciones`, 
        `CamaraPasillo`, `CamaraCpduno`, `CamaraCpdDos`, `CamaraRecepcion`, `CamaraCe`, `CamaraEntrada360`, `CamaraSalidaEmergencia`, `CamaraCuartoMaquinas`, `CamaraEntradaPrincipal`, `CamaraEsclusa`, `CamaraObsevaciones`, 
        `AlertAapUnoCpd`, `AlertAapDosCpd`, `AlertAapUnoCe`, `AlertAapDosCe`, `AireAapUnoCpd`, `AireAapDosCpd`, `AireAapUnoCe`, `AireAapDosCe`, `AlertAireObservaciones`, 
        `HidraManometroUnoCpd`, `HidraManometroDosCpd`, `HidraManometroObservaciones`, 
        `IncendioCilindroCpd`, `IncendioCilindroCe`, `IncendioObservaciones`, 
        `AlertaUpsUno`, `AlertaUpsDos`, `KwRedConsumo`, `KVaTotal`, `AlertaUpsObservaciones`, 
        `FugaElectrogenoGenA`, `FugaElectrogenoGenB`, `RuidoElectrogenoGenA`, `RuidoElectrogenoGenB`, `FugaRuidoElectrogenoObservaciones`
        FROM `registrosdiarios` WHERE IdRegistro =".$idconsulta." ;";
        $resultado = $conexion->conexionBD->query($sql);
        $fila = $resultado->fetch_assoc();
        $conexion->cerrar_conxion();
        return $fila;
    }

}
?>