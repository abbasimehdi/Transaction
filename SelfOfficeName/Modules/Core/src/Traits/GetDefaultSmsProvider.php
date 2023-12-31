<?php

namespace Selfofficename\Modules\Core\Traits;

trait GetDefaultSmsProvider
{
    /**
     * @return mixed|void
     */
    public function getActiveProvide()
    {
        foreach (config('smsProvider.provider') as $provider)
        {
            if ($provider['is_default']) {
                return $provider;
            }
        }
    }
}
