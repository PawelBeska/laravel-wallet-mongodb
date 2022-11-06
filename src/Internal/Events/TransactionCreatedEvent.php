<?php

declare(strict_types=1);

namespace Bavix\Wallet\Internal\Events;

use DateTimeImmutable;

final class TransactionCreatedEvent implements TransactionCreatedEventInterface
{
    public function __construct(
        private int|string $id,
        private string $type,
        private int|string $walletId,
        private DateTimeImmutable $createdAt,
    ) {
    }

    public function getId(): int|string
    {
        return $this->id;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getWalletId(): int|string
    {
        return $this->walletId;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }
}
