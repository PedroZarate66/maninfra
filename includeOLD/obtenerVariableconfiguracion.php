<?php

class Obtener_Variable_Configuracion{
    protected function ObtenerVariableConfiguracion()
    {
        // Nombre del archivo de configuración
        $configFile = '../funciones_php/config.conf';

        // Leer el contenido del archivo de configuración
        $configContent = file_get_contents($configFile);

        // Verificar que el archivo fue leído correctamente
        if ($configContent === false)
        {
        die("Error al leer el archivo de configuración.");
        }

        // Usar una expresión regular para encontrar la asignación
        if (preg_match('/pepper\s*=\s*(.+)/', $configContent, $matches)) {
            // Guardar el valor de la variable en una variable de PHP
            $myVariable = $matches[1];
        } else {
            echo "No se encontró la variable en el archivo de configuración.";
        }
        return $myVariable;
    }
}
?>