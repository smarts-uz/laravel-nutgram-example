<?php

namespace App\Telegram\SendingRequest;
use SergiX44\Nutgram\Nutgram;

class SendAudio
{
    public function __invoke(Nutgram $bot)
    {
        $user_id = 1153216;
        $audio = fopen('storage/app/public/files/a1.mp3', 'r+');
        $bot->sendAudio($audio, ['chat_id' => $user_id]);
    }
}

