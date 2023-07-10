<?php

namespace App\Telegram\SendingRequest;
use SergiX44\Nutgram\Nutgram;

class SendVideo
{
    public function __invoke(Nutgram $bot)
    {
        $voice = fopen('public/1.mp4', 'r+');
        $bot->sendVideo($voice);
    }
}

