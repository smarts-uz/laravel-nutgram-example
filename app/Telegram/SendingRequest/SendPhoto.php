<?php

namespace App\Telegram\SendingRequest;
use SergiX44\Nutgram\Nutgram;

class SendPhoto
{
    public function __invoke(Nutgram $bot)
    {
        $user_id = 1153216;
        $voice = fopen('storage/app/public/files/6.jfif', 'r+');
        $bot->sendPhoto($voice, ['chat_id' => $user_id]);
    }
}

