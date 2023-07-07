<?php

namespace App\Telegram\SendingRequest;
use SergiX44\Nutgram\Nutgram;

class SendMessage
{
    public function __invoke(Nutgram $bot)
    {
        $bot->sendMessage('Some message');
    }
}

