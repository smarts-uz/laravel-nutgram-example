<?php

    namespace App\Telegram\Keyboards;

    use Illuminate\Database\Console\Migrations\BaseCommand;
    use SergiX44\Nutgram\Nutgram;
    use SergiX44\Nutgram\Conversations\Conversation;
    use SergiX44\Nutgram\Telegram\Attributes\ParseMode;
    use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardButton;
    use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardMarkup;

    class InlineMenu
    {
        public function __invoke(Nutgram $bot)
        {
            $bot->sendMessage('Choose an option:', [
                'reply_markup' => InlineKeyboardMarkup::make()->addRow(
                    InlineKeyboardButton::make('One', callback_data: 'one'),
                    InlineKeyboardButton::make('Two', callback_data: 'two'),
                    InlineKeyboardButton::make('Cancel', callback_data: 'cancel'),
                )
            ]);


            $bot->onCallbackQueryData('one|two', function (Nutgram $bot) {
                $bot->sendMessage('Nice!');
                $bot->answerCallbackQuery();
            });

            $bot->onCallbackQueryData('cancel', function (Nutgram $bot) {
                $bot->sendMessage('Canceled!');
                $bot->answerCallbackQuery();
            });


        }




    }
