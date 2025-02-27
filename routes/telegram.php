<?php



use App\Enums\ExceptionType;
use App\Telegram\Commands\AboutCommand;
use App\Telegram\Commands\CancelCommand;
use App\Telegram\Commands\HelpCommand;
use App\Telegram\Commands\PrivacyCommand;
use App\Telegram\Commands\OrderCommand;
use App\Telegram\Commands\AdminCommand;
use App\Telegram\Commands\StartCommand;
use App\Telegram\Commands\StatsCommand;
use App\Telegram\Conversations\DonateConversation;
use App\Telegram\Conversations\FeedbackConversation;
use App\Telegram\Conversations\SettingsConversation;
use App\Telegram\Handlers\DocumentHandler;
use App\Telegram\Handlers\ExceptionsHandler;
use App\Telegram\Handlers\PhotoHandler;
use App\Telegram\Handlers\MultimediaHandler;
use App\Telegram\Handlers\PreCheckoutQueryHandler;
<<<<<<< HEAD
use App\Telegram\InlineMenu\ChooseColorMenu;
=======
use App\Telegram\Keyboards\ForceReplyKeyboard;
use App\Telegram\Keyboards\InlineKeyboard;
use App\Telegram\Keyboards\InlineMenu;
use App\Telegram\Keyboards\OptionalKeyboard;
use App\Telegram\Keyboards\RemoveKeyboard;
use App\Telegram\Keyboards\ReplyKeyboard;
>>>>>>> 27349c025ee7de7ccbf1563dacd910fabcd307f3
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
use App\Telegram\SendingRequest\SendVoice;
use App\Telegram\SendingRequest\SendMessage;
use App\Telegram\SendingRequest\SendPhoto;
use App\Telegram\SendingRequest\SendDocument;
use App\Telegram\SendingRequest\SendSticker;
use  App\Telegram\SendingRequest\SendLocation;
use  App\Telegram\SendingRequest\SendContact;
use App\Telegram\Handlers\OnDoc;



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
 $bot->onText('Introduction', HelpCommand::class);
$bot->onText('Settings', SettingsConversation::class);



$bot->onText('Statistics', StatsCommand::class);
$bot->onText('Feedback', FeedbackConversation::class);
$bot->onText('Location', SendLocation::class);
$bot->onCommand('about', AboutCommand::class)->description('About the bot');
//$bot->onCommand('privacy', PrivacyCommand::class)->description('Privacy Policy');
$bot->onCommand('cancel', CancelCommand::class)->description('Close a conversation or a keyboard');
<<<<<<< HEAD
$bot->onText('Multimedia', MultimediaHandler::class);
$bot->onText('Contacts', SendContact::class);
$bot->onCommand('chooseColorText', ChooseColorMenu::class);
=======

$bot->onText('Multimedia', MultimediaHandler::class);
$bot->onText('Contacts', SendContact::class);

$bot->onCommand('order', OrderCommand::class)->description('Order something');

$bot->onCommand('audio', SendAudio::class)->description('Sending audio');
$bot->onCommand('message', SendMessage::class)->description('Sending message');
$bot->onCommand('video', SendVideo::class)->description('Sending video');
$bot->onCommand('photo', SendPhoto::class)->description('Sending photo');
$bot->onCommand('doc', SendDocument::class)->description('Sending document');
$bot->onCommand('sticker', SendSticker::class)->description('Sending sticker');

//// Keyboards //////
$bot->onCommand('inlineMenu', InlineMenu::class)->description('Type something');
$bot->onCommand('', ForceReplyKeyboard::class)->description('Type something');
$bot->onCommand('removeKeyboard', RemoveKeyboard::class)->description('Type something');
$bot->onCommand('optionalKeyboard', OptionalKeyboard::class)->description('Type something');
$bot->onCommand('replyKeyboard', ReplyKeyboard::class)->description('Type something');
$bot->onCommand('inlineKeyboard', InlineKeyboard::class)->description('Type something');

>>>>>>> 27349c025ee7de7ccbf1563dacd910fabcd307f3
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






