<?php

namespace App\Telegram\Keyboards;

use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Telegram\Types\Keyboard\ForceReply;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardButton;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardMarkup;
use SergiX44\Nutgram\Telegram\Types\Keyboard\KeyboardButton;
use SergiX44\Nutgram\Telegram\Types\Keyboard\ReplyKeyboardMarkup;
use SergiX44\Nutgram\Telegram\Types\Keyboard\ReplyKeyboardRemove;

class ReplyKeyboard
{
    public function __invoke(Nutgram $bot)
    {

            $bot->sendMessage('Welcome!', [
                'reply_markup' => ReplyKeyboardMarkup::make()->addRow(
                    KeyboardButton::make('Give me food!'),
                    KeyboardButton::make('Give me animal!'),
                )
            ]);

        $bot->onText('Give me food!', function (Nutgram $bot) {
            $bot->sendMessage('watermelon!');
        });

        $bot->onText('Give me animal!', function (Nutgram $bot) {
            $bot->sendMessage('cat!');
        });

    }



    }
