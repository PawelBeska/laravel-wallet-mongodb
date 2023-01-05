<?php

declare(strict_types=1);

namespace Bavix\Wallet\Traits;

use Bavix\Wallet\Models\Meta;
use Jenssegers\Mongodb\Relations\EmbedsOne;

trait HasMeta
{
    public function meta(): EmbedsOne
    {
        return $this->embedsOne(Meta::class);
    }
}
