<?php

namespace  App\Telegram\Handlers;

use SergiX44\Nutgram\Conversations\InlineMenu;
use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Telegram\Types\Keyboard\ReplyKeyboardMarkup;
use Lukasss93\ModelSettings\Managers\TableSettingsManager;
use App\Telegram\SendingRequest\SendVideo;
use App\Telegram\SendingRequest\SendAudio;
use App\Telegram\SendingRequest\SendVoice;
use App\Telegram\SendingRequest\SendMessage;
use App\Telegram\SendingRequest\SendPhoto;
use App\Telegram\SendingRequest\SendDocument;
use App\Telegram\SendingRequest\SendSticker;
use  App\Telegram\SendingRequest\SendLocation;
use  App\Telegram\SendingRequest\SendContact;
use App\Telegram\Handlers\OnDoc;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardButton;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardMarkup;
use SergiX44\Nutgram\Telegram\Attributes\MessageTypes;
use SergiX44\Nutgram\Telegram\Attributes\UpdateTypes;
use SergiX44\Nutgram\Conversations\Conversation;
use SergiX44\Nutgram\Telegram\Exceptions\TelegramException;


class MultimediaHandler 
{
    public function __invoke(Nutgram $bot)
    {
        $bot->sendMessage('Choose multimedia', [
            'reply_markup' => InlineKeyboardMarkup::make()
                ->addRow(
                    InlineKeyboardButton::make('Music', callback_data: 'audio'),
                    InlineKeyboardButton::make('Book', callback_data: 'doc'),
                    InlineKeyboardButton::make('Video', callback_data: 'video'),
                    InlineKeyboardButton::make('Audio Book', callback_data: 'audio'),
                    InlineKeyboardButton::make('Special Sticers', callback_data: 'sticker'),
                    InlineKeyboardButton::make('Photo', callback_data: 'photo'),
                )
                ->addRow(
                    InlineKeyboardButton::make('Back', callback_data: 'closing'),

                )
            ]
        );

        
        $bot->onCallbackQueryData('audio', SendAudio::class);
        $bot->onCallbackQueryData('voice', SendCoice::class);
        $bot->onCallbackQueryData('video', SendVideo::class);
        $bot->onCallbackQueryData('photo', SendPhoto::class);
        $bot->onCallbackQueryData('doc', SendDocument::class);
        $bot->onCallbackQueryData('sticker', SendSticker::class);
    }

    public function closing(Nutgram $bot): void
    {
        if ($bot->isCallbackQuery() && $bot->callbackQuery()->data === 'closing') {
            $bot->answerCallbackQuery();
            $this->end();
            stats('feedback.cancelled', 'feedback');

            return;
        }

    }
}
