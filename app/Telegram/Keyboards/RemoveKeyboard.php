<?php

namespace App\Telegram\Keyboards;

use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Telegram\Types\Keyboard\ForceReply;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardButton;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardMarkup;
use SergiX44\Nutgram\Telegram\Types\Keyboard\KeyboardButton;
use SergiX44\Nutgram\Telegram\Types\Keyboard\ReplyKeyboardMarkup;
use SergiX44\Nutgram\Telegram\Types\Keyboard\ReplyKeyboardRemove;

class RemoveKeyboard
{
    public function __invoke(Nutgram $bot)
    {
        /////////  Reply Keyboard with Remove the Reply Keyboard  //////////

        $bot->sendMessage('Tanlang', [
            'reply_markup' => ReplyKeyboardMarkup::make
            (
                resize_keyboard: true,  /// Agar true da tursa button ni kichraytirib qoyadi
                one_time_keyboard: false,
                input_field_placeholder: 'Type something',
                selective: true
            )
                ->addRow
                (
                    KeyboardButton::make('Give me food!'),
                    KeyboardButton::make('Give me animal!'),
                    KeyboardButton::make('Stop!'),
                )

        ]);
        $bot->onText('Stop!', function (Nutgram $bot) {
            $bot->sendMessage('Removing keyboard...', [
                'reply_markup' => ReplyKeyboardRemove::make(true),
            ])?->delete();
        });


        $bot->onText('Give me food!', function (Nutgram $bot) {
            $bot->sendMessage('Apple!');
        });

        $bot->onText('Give me animal!', function (Nutgram $bot) {
            $bot->sendMessage('Dog!');
        });



    }


}
