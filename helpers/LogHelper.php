<?php

use Illuminate\Support\Facades\Http;

function logActivity($message)
{
    $botToken = config('telegram.bot_token');
    $chatId = config('telegram.chat_id');
    $url = "https://api.telegram.org/bot{$botToken}/sendMessage";

    Http::post($url, [
        'chat_id' => $chatId,
        'text' => '[LOG PANEL] ' . $message,
    ]);
}
