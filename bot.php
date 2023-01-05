<?php


$website = 'https://api.telegram.org/bot'.$token;

$input = file_get_contents('php://input');
$update = json_decode($input, TRUE);

$chatId = $update['message']['chat']['id'];
$message = $update['message']['text'];

switch($message){
    case '/start':
        $response = 'Iniciado';
        sendMessage($chatId, $response);
        break;
    case '/info':
        $response = "Olá...";
        sendMessage($chatId,$response);
        break;
    default:
        $response = 'Não entendi...';
        sendMessage($chatId, $response);
        break;
}

function sendMessage($chatId, $response){
    $url = $GLOBALS['website'].'/sendMessage?chat_id='.$chatId.'&parse_mode=HTML&text='.urlencode($response);
    file_get_contents($url);
}

?>