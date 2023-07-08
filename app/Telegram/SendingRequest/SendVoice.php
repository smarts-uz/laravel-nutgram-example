<?php


namespace App\Telegram\SendingRequest;
use SergiX44\Nutgram\Nutgram;

class SendVoice
{
    public function __invoke(Nutgram $bot)
    {
        $user_id = 866985442;
        $voice = fopen("storage/app/public/files/a1.mp3", 'r+');
        $bot->sendVoice($voice, ['chat_id' => $user_id]);
    }
}
