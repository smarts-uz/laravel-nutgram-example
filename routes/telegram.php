<?php
/** @var SergiX44\Nutgram\Nutgram $bot */

use SergiX44\Nutgram\Nutgram;

/*
|--------------------------------------------------------------------------
| Nutgram Handlers
|--------------------------------------------------------------------------
|
| Here is where you can register telegram handlers for Nutgram. These
| handlers are loaded by the NutgramServiceProvider. Enjoy!
|
*/

//$bot->onCommand('start', function (Nutgram $bot) {
//    return $bot->sendMessage('Hello, world!');
//})->description('The start command!');




////    Inline Keyboard   ///////

$bot->onCommand('start', function(Nutgram $bot){
    $bot->sendMessage('Welcome!', [
        'reply_markup' => InlineKeyboardMarkup::make()
            ->addRow(
                InlineKeyboardButton::make('A', callback_data: 'type:a'),
                InlineKeyboardButton::make('B', callback_data: 'type:b')
            )
    ]);
});

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

//////////////////////////   Reply Keyboard    //////////////////////////////////////

$bot->onCommand('start', function(Nutgram $bot){
    $bot->sendMessage('Welcome!', [
        'reply_markup' => ReplyKeyboardMarkup::make()->addRow(
            KeyboardButton::make('Give me food!'),
            KeyboardButton::make('Give me animal!'),
        )
    ]);
});

$bot->onText('Give me food!', function (Nutgram $bot) {
    $bot->sendMessage('Apple!');
});

$bot->onText('Give me animal!', function (Nutgram $bot) {
    $bot->sendMessage('Dog!');
});

/////////////////////////////////  Remove the Reply Keyboard   //////////////////////////////////////

$bot->onCommand('cancel', function (Nutgram $bot) {
    $bot->sendMessage('Removing keyboard...', [
        'reply_markup' => ReplyKeyboardRemove::make(true),
    ])?->delete();
});

////////////////////////////////         Force Reply             ///////////////////////////////////////

$bot->onCommand('start', function(Nutgram $bot){
    $bot->sendMessage('Welcome!', [
        'reply_markup' => ForceReply::make(
            force_reply: true,
            input_field_placeholder: 'sdosiwoeiwoeiwoei',
            selective: true,
        ),
    ]);
});
