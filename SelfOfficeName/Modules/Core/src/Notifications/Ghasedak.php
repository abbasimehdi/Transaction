<?php

namespace Selfofficename\Modules\Core\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Http\JsonResponse;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Ghasedak extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['sms'];
    }

    /**
     * @param array $notifiable
     * @param array $provider
     * @return JsonResponse
     */
    public function sendMessage(array $notifiable, array $provider): JsonResponse
    {
        return response()->json([
            'status'  => true,
            'message' => __($provider['message'])
        ]);
    }
}
