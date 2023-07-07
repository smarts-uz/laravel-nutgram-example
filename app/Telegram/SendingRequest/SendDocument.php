<?php

namespace App\Telegram\SendingRequest;
use SergiX44\Nutgram\Nutgram;

class SendDocument
{
    public function __invoke(Nutgram $bot)
    {
        $user_id = 1153216;
        $doc = fopen('storage/app/public/files/slovar.txt', 'r+');
        $bot->sendDocument($doc, ['chat_id' => $user_id]);
    }
}

