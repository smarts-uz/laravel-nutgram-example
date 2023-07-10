<?php

namespace App\Telegram\SendingRequest;
use SergiX44\Nutgram\Nutgram;

class SendDocument
{
    public function __invoke(Nutgram $bot)
    {
        $doc = fopen('public/Eloquentdars.docx', 'r+');
        $bot->sendDocument($doc);
    }
}

