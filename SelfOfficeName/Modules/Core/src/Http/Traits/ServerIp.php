<?php

namespace Selfofficename\Modules\Core\Http\Traits;

trait ServerIp
{
    /**
     * @return array|string|string[]|null
     */
    public function removeDotFromIp(): string
    {
        return str_replace('.', '', request()->ip());
    }
}
