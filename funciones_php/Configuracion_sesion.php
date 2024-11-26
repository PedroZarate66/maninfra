<?php
session_start();

// Establecer el tiempo de vida de la sesión en 30 minutos (1800 segundos)
$tiempoExpiracion = 3600;

if (!isset($_SESSION['usuario'])) {
    header("Location: /maninfrax/?mensaje=sesion_no_iniciada");
    exit();
}

// Comprobar si la variable de inicio de la sesión está establecida
if (isset($_SESSION['ultima_actividad'])) {
    // Calcular el tiempo de inactividad
    $tiempoInactividad = time() - $_SESSION['ultima_actividad'];
    
    // Si el tiempo de inactividad es mayor al tiempo de expiración, destruir la sesión
    if ($tiempoInactividad > $tiempoExpiracion) {
        session_unset();
        session_destroy();
        header("Location: /maninfrax/funciones_php/Login.php?mensaje=sesion_expirada");
        exit();
    }
}

// Actualizar la última actividad a la hora actual
$_SESSION['ultima_actividad'] = time();

// Regenerar el ID de la sesión cada 5 minutos para mayor seguridad
if (!isset($_SESSION['creacion_sesion'])) {
    $_SESSION['creacion_sesion'] = time();
} else if (time() - $_SESSION['creacion_sesion'] > 300) { // 300 segundos = 5 minutos
    session_regenerate_id(true);
    $_SESSION['creacion_sesion'] = time();
}
?>
