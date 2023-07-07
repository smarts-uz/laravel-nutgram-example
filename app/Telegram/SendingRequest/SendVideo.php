<?php

namespace App\Telegram\SendingRequest;
use SergiX44\Nutgram\Nutgram;

class SendVideo
{
    public function __invoke(Nutgram $bot)
    {
        $user_id = 1153216;
        $voice = fopen('storage/app/public/files/Rec 0003.mp4', 'r+');
        $bot->sendVideo($voice, ['chat_id' => $user_id]);
    }
}

