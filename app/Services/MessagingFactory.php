<?php
namespace App\Services;

class MessagingFactory {
    public static function getService($platform) {
        switch ($platform) {
            case 'Telegram':
                return new TelegramService();
            case 'WhatsApp':
                return new WhatsAppService();
            case 'Discord':
                return new DiscordService();
            case 'Slack':
                return new SlackService();
            default:
                throw new \Exception("Platform not supported");
        }
    }
}