<?php

namespace App\Telegram\Extend;


class Extend
{
    public function sendHelloMessage(): void
    {
        Nugram::macro('sendHelloMessage', function() {
            return $this->sendMessage('Hello!');
        });

        Message::macro('pin', function(array $opt = []) {
            return $this->pinChatMessage($this->chat->id, $this->message_id, $opt);
        });
    }

}
