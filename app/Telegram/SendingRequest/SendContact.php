<?php

namespace App\Telegram\SendingRequest;
use SergiX44\Nutgram\Nutgram;

class sendContact
{
    public function __invoke(Nutgram $bot)
    {
        $bot->sendContact('SmrtSoft', '+998991112233');
    }
}