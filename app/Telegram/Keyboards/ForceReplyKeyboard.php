<?php

namespace App\Telegram\Keyboards;

use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Telegram\Types\Keyboard\ForceReply;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardButton;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardMarkup;
use SergiX44\Nutgram\Telegram\Types\Keyboard\KeyboardButton;
use SergiX44\Nutgram\Telegram\Types\Keyboard\ReplyKeyboardMarkup;
use SergiX44\Nutgram\Telegram\Types\Keyboard\ReplyKeyboardRemove;

class ForceReplyKeyboard
{
    public function __invoke(Nutgram $bot)
    {


        ///// Force Reply ///////

            $bot->sendMessage('Welcome!', [
                'reply_markup' => ForceReply::make(
                    force_reply: false,
                    input_field_placeholder: 'Ubu narsa yozing !',
                    selective: true,
                ),
            ]);

    }


}

