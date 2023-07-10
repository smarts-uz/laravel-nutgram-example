<?php


namespace App\Telegram\SendingRequest;
use SergiX44\Nutgram\Nutgram;

class SendLocation
{
    public function __invoke(Nutgram $bot)
    {
        $bot->sendLocation(latitude:37.7576793 , longitude: -122.5076402,);
    }

}



