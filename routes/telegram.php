<?php



use App\Enums\ExceptionType;
use App\Telegram\Commands\AboutCommand;
use App\Telegram\Commands\CancelCommand;
use App\Telegram\Commands\HelpCommand;
use App\Telegram\Commands\PrivacyCommand;
use App\Telegram\Commands\OrderCommand;
use App\Telegram\Commands\StartCommand;
use App\Telegram\Commands\StatsCommand;
use App\Telegram\Conversations\DonateConversation;
use App\Telegram\Conversations\FeedbackConversation;
use App\Telegram\Conversations\SettingsConversation;
use App\Telegram\Handlers\DocumentHandler;
use App\Telegram\Handlers\ExceptionsHandler;
use App\Telegram\Handlers\PhotoHandler;
use App\Telegram\Handlers\PreCheckoutQueryHandler;
use SergiX44\Nutgram\Handlers\Type\Command;
use App\Telegram\Handlers\StickerHandler;
use App\Telegram\Handlers\SuccessfulPaymentHandler;
use App\Telegram\Handlers\UpdateChatStatusHandler;
use App\Telegram\Middleware\CheckMaintenance;
use App\Telegram\Middleware\CheckOffline;
use App\Telegram\Middleware\CollectChat;
use App\Telegram\Middleware\SetLocale;
use App\Telegram\Middleware\Throttle;
use App\Telegram\Commands\MapCommand;
use SergiX44\Nutgram\Nutgram;

use App\Telegram\SendingRequest\SendVideo;
use App\Telegram\SendingRequest\SendAudio;
use App\Telegram\SendingRequest\SendMessage;
use App\Telegram\SendingRequest\SendPhoto;
use App\Telegram\SendingRequest\SendDocument;
use App\Telegram\SendingRequest\SendSticker;



use SergiX44\Nutgram\Telegram\Attributes\MessageTypes;
use SergiX44\Nutgram\Telegram\Attributes\UpdateTypes;
use SergiX44\Nutgram\Conversations\Conversation;
use SergiX44\Nutgram\Telegram\Exceptions\TelegramException;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardButton;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardMarkup;


$bot->middleware(CollectChat::class);
$bot->middleware(SetLocale::class);
$bot->middleware(Throttle::class);
$bot->middleware(CheckMaintenance::class);
$bot->middleware(CheckOffline::class);

/*
|--------------------------------- -----------------------------------------
| Bot handlers
|--------------------------------------------------------------------------
*/

$bot->onMyChatMember(UpdateChatStatusHandler::class);
$bot->onSticker(StickerHandler::class);
$bot->onDocument(DocumentHandler::class);
$bot->onPhoto(PhotoHandler::class);
$bot->onPreCheckoutQuery(PreCheckoutQueryHandler::class);
$bot->onSuccessfulPayment(SuccessfulPaymentHandler::class);

/*
|--------------------------------------------------------------------------
| Bot commands
|--------------------------------------------------------------------------
*/

$bot->onCommand('start', StartCommand::class)->description('Welcome message');
$bot->onCommand('help', HelpCommand::class)->description('Help message');
$bot->onCommand('settings', SettingsConversation::class)->description('Bot Settings');



$bot->onCommand('stats', StatsCommand::class)->description('Show bot statistics');
$bot->onCommand('feedback', FeedbackConversation::class)->description('Send a feedback about the bot');
$bot->onCommand('about', AboutCommand::class)->description('About the bot');
$bot->onCommand('privacy', PrivacyCommand::class)->description('Privacy Policy');
$bot->onCommand('cancel', CancelCommand::class)->description('Close a conversation or a keyboard');
$bot->onCommand('order', OrderCommand::class)->description('Order something');

$bot->onCommand('audio', SendAudio::class)->description('Sending audio');
$bot->onCommand('message', SendMessage::class)->description('Sending message');
$bot->onCommand('video', SendVideo::class)->description('Sending video');
$bot->onCommand('photo', SendPhoto::class)->description('Sending photo');
$bot->onCommand('doc', SendDocument::class)->description('Sending document');
$bot->onCommand('sticker', SendSticker::class)->description('Sending sticker');
$bot->onCommand('voice', SendVoice::class)->description('Sending voice');
/*
|--------------------------------------------------------------------------
| Exception handlers
|--------------------------------------------------------------------------
*/

$bot->onApiError(...ExceptionType::USER_BLOCKED->toNutgramException());
$bot->onApiError(...ExceptionType::USER_DEACTIVATED->toNutgramException());
$bot->onApiError(...ExceptionType::SAME_CONTENT->toNutgramException());
$bot->onApiError(...ExceptionType::MSG_TO_EDIT_NOT_FOUND->toNutgramException());
$bot->onApiError(...ExceptionType::MSG_TO_DELETE_NOT_FOUND->toNutgramException());
$bot->onApiError(...ExceptionType::WRONG_FILE_ID->toNutgramException());

$bot->onApiError([ExceptionsHandler::class, 'api']);
$bot->onException([ExceptionsHandler::class, 'global']);



$bot->onCommand('map', PrivacyCommand::class)->description('The map');
