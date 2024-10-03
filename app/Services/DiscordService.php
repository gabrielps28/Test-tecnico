<?php

namespace App\Services;
use Illuminate\Support\Facades\Log;

class DiscordService {
    public function sendMessage($message, $recipients) {
        echo "Mensaje enviado a Discord: $message a " . implode(', ', $recipients);
        $logMessage = "Mensaje enviado a Discord: $message a " . implode(', ', $recipients);
        Log::info($logMessage);
    }

    public function sendMassMessage($message, $recipients) {
        foreach ($recipients as $recipient) {
            $this->sendMessage($message, [$recipient]);
        }
    }
}