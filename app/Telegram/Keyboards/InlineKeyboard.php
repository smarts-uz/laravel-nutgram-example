<?php

namespace App\Telegram\Keyboards;

use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Telegram\Types\Keyboard\ForceReply;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardButton;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardMarkup;
use SergiX44\Nutgram\Telegram\Types\Keyboard\KeyboardButton;
use SergiX44\Nutgram\Telegram\Types\Keyboard\ReplyKeyboardMarkup;
use SergiX44\Nutgram\Telegram\Types\Keyboard\ReplyKeyboardRemove;

class InlineKeyboard
{
    public function __invoke(Nutgram $bot)
    {

        ////////  Inline Keyboard /////////

            $bot->sendMessage('Welcome!', [
                'reply_markup' => InlineKeyboardMarkup::make()
                    ->addRow(
                        InlineKeyboardButton::make('A', callback_data: 'type:a'),
                        InlineKeyboardButton::make('B', callback_data: 'type:b')
                    )
            ]);


        $bot->onCallbackQueryData('type:a', function(Nutgram $bot){
            $bot->answerCallbackQuery([
                'text' => 'You selected A'
            ]);
        });

        $bot->onCallbackQueryData('type:b', function(Nutgram $bot){
            $bot->answerCallbackQuery([
                'text' => 'You selected B'
            ]);
        });

    }


}
