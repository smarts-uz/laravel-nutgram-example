<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * https://www.linkedin.com/in/asror-zakirov
 * https://github.com/asror-z
 *
 */

namespace App\Telegram\Commands\FileCommands;

use SergiX44\Nutgram\Nutgram;

class PhotoCommands
{
    public function __invoke(Nutgram $bot):void
    {
        $bot->sendMessage('Photo yuklandi');
    }
}
