<?php

namespace App\Services;
use Illuminate\Support\Facades\Log;

class SlackService {
    public function sendMessage($message, $recipients) {
        echo "Mensaje enviado a Slack: $message a " . implode(', ', $recipients);
        $logMessage = "Mensaje enviado a Slack: $message a " . implode(', ', $recipients);
        Log::info($logMessage);
        
    }

    public function sendMassMessage($message, $recipients) {
        foreach ($recipients as $recipient) {
            $this->sendMessage($message, [$recipient]);
        }
    }
}