<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * https://www.linkedin.com/in/asror-zakirov
 * https://github.com/asror-z
 *
 */

namespace App\Telegram\SendingRequest;
use SergiX44\Nutgram\Nutgram;

class sendContact
{
    public function __invoke(Nutgram $bot)
    {
        $bot->sendContact('alisher', '+998944116395');
    }
}
