<?php

namespace App\Telegram\SendingRequest;
use SergiX44\Nutgram\Nutgram;

class SendSticker
{
    public function __invoke(Nutgram $bot)
    {
        $stickerId = 'CAACAgIAAxkBAAEJneVkp42HHweK8HqkdIeih3EF0Lb61AACZQsAAlGrOEv1AAFZHvnBJqovBA';
        $bot->sendSticker($stickerId);
    }
}

