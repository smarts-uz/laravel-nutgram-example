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
use SergiX44\Nutgram\Telegram\Attributes\ParseMode;
use SergiX44\Nutgram\Telegram\Types\Message\Message;

class FormattingOptions
{
    public function __invoke(Nutgram $bot)
    {
         $bot->sendMessage('* \Hi*, Xasan', [
            'chat_id' => -1001967077504,
            'parse_mode' => ParseMode::MARKDOWN,
        ]);
    }
}
