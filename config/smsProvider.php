<?php

use Selfofficename\Modules\Core\Notifications\Ghasedak;
use Selfofficename\Modules\Core\Notifications\Kavenegar;

return [
       "provider" => [
           [
               'name' => 'kavenegar',
               'is_default' => false,
               'notificatioCalass' => Kavenegar::class,
               "message"     => "Sms sent successfully with kavenegar"
           ],
           [
               'name' => 'ghasedak',
               'is_default' => true,
               'notificatioCalass' => Ghasedak::class,
               "message"     => "Sms sent for users with ghasedak"
           ],
       ],
];
