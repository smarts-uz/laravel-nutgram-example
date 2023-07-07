<?php

namespace App\Telegram\SendingRequest;
use SergiX44\Nutgram\Nutgram;

class SendMessage
{
    public function __invoke(Nutgram $bot)
    {
        $user_id = 1153216;
        $bot->sendMessage('Some message', ['chat_id' => $user_id]);
    }
}

