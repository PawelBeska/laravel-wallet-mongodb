<?php

declare(strict_types=1);

namespace Bavix\Wallet\Internal\Events;

use Bavix\Wallet\Models\Wallet;
use DateTimeImmutable;
use MongoDB\BSON\ObjectIdInterface;

final class WalletCreatedEvent implements WalletCreatedEventInterface
{
    public function __construct(
        private string $holderType,
        private ObjectIdInterface|int|string $holderId,
        private string $walletUuid,
        private ObjectIdInterface|string|int $walletId,
        private DateTimeImmutable $createdAt,
        private Wallet $wallet
    ) {
    }

    public function getHolderType(): string
    {
        return $this->holderType;
    }

    public function getHolderId(): ObjectIdInterface|int|string
    {
        return $this->holderId;
    }

    public function getWalletUuid(): string
    {
        return $this->walletUuid;
    }

    public function getWalletId(): ObjectIdInterface|int|string
    {
        return $this->walletId;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getWallet(): Wallet
    {
        return $this->wallet;
    }
}
