<?php

namespace App\Telegram\Commands;

use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Telegram\Attributes\ParseMode;
use SergiX44\Nutgram\Telegram\Attributes\MessageTypes;

class StartCommand
{
    public function __invoke(Nutgram $bot): void
    {

        $bot->sendMessage(('Hello world'), [

        ]);

        stats('start', 'command');

        $bot->onMessageType(MessageTypes::PHOTO, function (Nutgram $bot) {
            $photos = $bot->message()->photo;
            $bot->sendMessage('Nice pic!');
        });

        $bot->onText('I want ([0-9]+) pizzas', function (Nutgram $bot, $n) {
            $bot->sendMessage("You will get {$n} pizzas!");
        });
    }
}
