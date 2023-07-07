<?php

namespace App\Telegram\SendingRequest;
use SergiX44\Nutgram\Nutgram;

class SendDocument
{
    public function __invoke(Nutgram $bot)
    {
        $doc = fopen('storage/app/public/files/slovar.txt', 'r+');
        $bot->sendDocument($doc);
    }
}

