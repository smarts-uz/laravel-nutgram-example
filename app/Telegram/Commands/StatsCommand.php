<?php

namespace App\Telegram\Commands;

use Illuminate\Support\Facades\Cache;
use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Telegram\Attributes\ParseMode;
use App\Models\Chat;

class StatsCommand
{
    public function __invoke(Nutgram $bot): void
    {
        $bot->sendMessage($this->getMessage(), [
            'parse_mode' => ParseMode::HTML,
            'disable_web_page_preview' => true,
        ]);

        stats('stats', 'command');
    }

    protected function getMessage(): string
    {
        $data = Chat::get('chat_id');

        if ($data === null) {
            return message('stats.empty');
        }

        return message('stats.full', $data);
    }
}
