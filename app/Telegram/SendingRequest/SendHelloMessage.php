<?php


namespace App\Telegram\SendingRequest;
use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Telegram\Types\Message\Message;

class SendHelloMessage
{
    public function __invoke(Nutgram $bot)
    {
        Nutgram::macro('sendHelloMessage', function() {
            return $this->sendMessage('Hello!');
        });

        Message::macro('pin', function(array $opt = []) {
            return $this->pinChatMessage($this->chat->id, $this->message_id, $opt);
        });
        $message = $bot->sendHelloMessage();
        $message->pin();
    }
}
