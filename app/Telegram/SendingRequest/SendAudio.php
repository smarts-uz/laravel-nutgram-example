<?php

namespace App\Telegram\SendingRequest;
use SergiX44\Nutgram\Nutgram;

class SendAudio
{

    public function __invoke(Nutgram $bot)
    {
        $audio = fopen('public/1.mp3', 'r+');
        $bot->sendAudio($audio);
    }

        

}

