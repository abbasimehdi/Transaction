<?php

namespace Selfofficename\Modules\Domain\Transaction\Patterns;

use Illuminate\Http\JsonResponse;
use Selfofficename\Modules\Core\Models\Schemas\Constants\BaseConstants;
use Selfofficename\Modules\Core\Notifications\Kavenegar;
use Selfofficename\Modules\Core\Traits\GetDefaultSmsProvider;
use Selfofficename\Modules\Domain\Transaction\Contracts\SendInterface;

class SmsStrategy implements SendInterface
{
    use GetDefaultSmsProvider;

    public function __construct(protected $data)
    {
        $this->data = $data;
    }

    public function send(): JsonResponse
    {
        $provider = $this->getActiveProvide();

        return $this->sendMessageToUser($provider);
    }

    /**
     * @param array $provider
     * @return JsonResponse
     */
    private function sendMessageToUser(array $provider): JsonResponse
    {

        return (new $provider['notificatioCalass'])->sendMessage($this->data, $provider);

        if (
            $provider['name'] ==
            BaseConstants::KAVENEGAR_SMS_PROVIDER
        ) {
            return (new Kavenegar())->sendMessage($this->data, $provider);
        }
    }
}
