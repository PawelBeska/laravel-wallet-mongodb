<?php

declare(strict_types=1);

namespace Bavix\Wallet\Internal\Events;

use DateTimeImmutable;

interface TransactionCreatedEventInterface extends EventInterface
{
    public function getId(): int|string;

    public function getType(): string;

    public function getWalletId(): int|string;

    public function getCreatedAt(): DateTimeImmutable;
}
