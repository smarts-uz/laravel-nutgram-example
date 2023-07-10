<?php


namespace App\Telegram\SendingRequest;
use SergiX44\Nutgram\Nutgram;

class SendVoice
{
    public function __invoke(Nutgram $bot)
    {
        $voice = fopen("public/1.mp3", 'r+');
        $bot->sendVoice($voice);
    }
}
