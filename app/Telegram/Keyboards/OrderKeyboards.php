<?php

namespace App\Telegram\Keyboards;

use Illuminate\Database\Console\Migrations\BaseCommand;
use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Conversations\Conversation;
use SergiX44\Nutgram\Telegram\Attributes\ParseMode;
use SergiX44\Nutgram\Telegram\Types\Keyboard\ForceReply;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardButton;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardMarkup;
use SergiX44\Nutgram\Telegram\Types\Keyboard\KeyboardButton;
use SergiX44\Nutgram\Telegram\Types\Keyboard\ReplyKeyboardMarkup;
use SergiX44\Nutgram\Telegram\Types\Keyboard\ReplyKeyboardRemove;

class OrderKeyboards
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







        ///////  Reply Keyboard with Optional keyboard parameters  //////////

            $bot->sendMessage('Tanlang', [
                'reply_markup' => ReplyKeyboardMarkup::make
                    (
                    resize_keyboard: true,  /// Agar true da tursa button ni kichraytirib qoyadi
                    one_time_keyboard: false,
                    input_field_placeholder: 'Xoxlagan narsa yozing !',
                    selective: true
                    )
                    ->addRow
                    (
                    KeyboardButton::make('Give me food!'),
                    KeyboardButton::make('Give me animal!'),
                    )
            ]);


        $bot->onText('Give me food!', function (Nutgram $bot) {
            $bot->sendMessage('Apple!');
        });

        $bot->onText('Give me animal!', function (Nutgram $bot) {
            $bot->sendMessage('Dog!');
        });



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
