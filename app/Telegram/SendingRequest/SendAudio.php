<?php

namespace App\Telegram\SendingRequest;
use SergiX44\Nutgram\Nutgram;

class SendAudio
{
    public function __invoke(Nutgram $bot)
    {
        $audio = fopen('storage/app/public/files/a1.mp3', 'r+');
        $bot->sendAudio($audio);
    }
}

