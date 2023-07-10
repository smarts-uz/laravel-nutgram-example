<?php

namespace App\Telegram\Commands;

use SergiX44\Nutgram\Nutgram;
use App\Telegram\Commands\Exception;
use SergiX44\Nutgram\Telegram\Attributes\ParseMode;
use SergiX44\Nutgram\Telegram\Types\Message\Message;
use SergiX44\Nutgram\Telegram\Attributes\MessageTypes;
use SergiX44\Nutgram\Telegram\Exceptions\TelegramException;
use SergiX44\Nutgram\Telegram\Types\Media\File;
use SergiX44\Nutgram\Conversations\InlineMenu;

class StartCommand
{
    public function __invoke(Nutgram $bot): void
    {
        $kb = ['reply_markup'=>[
            'keyboard' => [
                [
                    ['text' =>'Introduction'],
                    ['text' => 'Feedback']
                ],
                [
                    ['text' => 'Multimedia'],
                    ['text' => 'Location']
                ],
                [
                     ['text' => 'Contacts'],
                     ['text' => 'Settings']
                ],
                [
                    ['text' => 'Statistics'],
                    
                ],
                
            ], 'resize_keyboard' => true
        ]];
     $bot->sendMessage('Choose option', $kb);
            


     
   
        $bot->fallback(function (Nutgram $bot) {
            $bot->sendMessage('Sorry, I don\'t understand.');
        });

        $bot->onMessageType(MessageTypes::PHOTO, function (Nutgram $bot) {
            $photos = $bot->message()->photo;
            $bot->sendMessage('Nice pic!');
        });
        
        

        $bot->onDocument( function(Nutgram $bot){
            $voice = fopen("public/1.mp3", 'r+');
            $bot->sendVoice($voice);
        });

        $bot->onText('I want ([0-9]+) pizzas', function (Nutgram $bot, $n) {
            $bot->sendMessage("You will get {$n} pizzas!");
            
        });

        
        
    }
}
