<?php

namespace App\Telegram\SendingRequest;
use SergiX44\Nutgram\Nutgram;

class SendPhoto
{
    public function __invoke(Nutgram $bot)
    {

        $voice = fopen('storage/app/public/files/6.jfif', 'r+');
        $bot->sendPhoto($voice);
    }
}

