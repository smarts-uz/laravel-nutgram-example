<?php

namespace App\Telegram\Commands;

use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Telegram\Attributes\ParseMode;

class HelpCommand
{
    public function __invoke(Nutgram $bot): void
    {
        $bot->sendMessage(('Taking advantage of the PHP8 features, this framework and tries to make the speed, scalability and flexibility of use its strength, allowing to quickly make simple bots, but at the same time, it provides more advanced features to handle even the most complicated flows. Some architectural concepts on which Nutgram is based are heavily influenced by other open source projects such as Botman and Zanzara.'), [
           
        ]);

        stats('help', 'command');
    }
}
