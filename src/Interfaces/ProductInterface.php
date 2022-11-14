<?php

declare(strict_types=1);

namespace Bavix\Wallet\Interfaces;

use Jenssegers\Mongodb\Eloquent\Model;

interface ProductInterface extends Wallet
{
    public function getCountry(): Model;

    public function getAmountProduct(Customer $customer): int|string;

    /**
     * @return array<mixed>|null
     */
    public function getMetaProduct(): ?array;
}
