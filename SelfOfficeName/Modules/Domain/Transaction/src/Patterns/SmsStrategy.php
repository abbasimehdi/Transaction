<?php

namespace Selfofficename\Modules\Domain\Transaction\Patterns;

use Illuminate\Http\JsonResponse;
use Selfofficename\Modules\Core\Traits\GetDefaultSmsProvider;
use Selfofficename\Modules\Domain\Transaction\Contracts\SendInterface;

class SmsStrategy implements SendInterface
{
    use GetDefaultSmsProvider;

    /**
     * @param $data
     */
    public function __construct(protected $data)
    {
        $this->data = $data;
    }

    /**
     * @return JsonResponse
     */
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
    }
}
