<?php 

namespace app;

class ApiController
{

    public static function getChatId(string $token): ?string
    {

        $endpoint = "https://api.telegram.org/bot{$token}/getUpdates";

        $content = file_get_contents($endpoint);

        if($content == '' || $content == null){
            return null;
        }

        $arr = json_decode($content, true);

       
        $resultId = $arr['result'][0]['message']['chat']['id'];
        if(!$resultId){
            return null;
        }
            
    return $resultId;
        
        
    }

    public static function sendMessage(string $mensagem): bool
    {
        try{
            
            $bot = new \TelegramBot\Api\BotApi(TOKEN);

            $bot->sendMessage(CHAT_ID, $mensagem);

            return true;
        }catch(\Exception $ex){
        
            return false;
        }
    }

}

?>