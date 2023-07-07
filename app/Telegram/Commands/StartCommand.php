<?php

namespace App\Telegram\Commands;

use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Telegram\Attributes\ParseMode;

class StartCommand
{
    public function __invoke(Nutgram $bot): void
    {
        $bot->sendMessage(('Hello world'), [

        ]);

        stats('start', 'command');
        $bot->onMessage('my name is ', function (Nutgram $bot) {
            $bot->sendMessage("Hi You are");
        });
    }
}
