<?php
//EL SIGUIENTE CODIGO ES PARA MANDAR MENSAJES AUTOMATICOS
//A UN GRUPO DE TELEGRAM PARA QUE SE ESTE AL TANTO DE LO 
//QUE OCURRE EN EL SISTEMA

define('BOT_TOKEN', '7603103126:AAHlAFDoTYpdKys0NWhoY6qIfBxPWfLncxw');
define('CHAT_ID','1688702700');
define('API_URL','https://api.telegram.org/bot'.BOT_TOKEN.'/');

class Enviar_Mensaje{
    function EnviarMensaje($mensaje){
        $queryArray = [
            'chat_id' => CHAT_ID,
            'text'    => $mensaje,
        ];

        $url = 'https://api.telegram.org/bot'.BOT_TOKEN.'/sendMessage?'.http_build_query($queryArray);
        $result = file_get_contents($url);
    }
}
?>