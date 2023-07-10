<?php

namespace App\Telegram\SendingRequest;
use SergiX44\Nutgram\Nutgram;

class SendPhoto
{
    public function __invoke(Nutgram $bot)
    {

        $voice = fopen('public/img/logo.png', 'r+');
        $bot->sendPhoto($voice);
    }
}

