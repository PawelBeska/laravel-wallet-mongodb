<?php

declare(strict_types=1);

namespace Bavix\Wallet\Internal\Events;

use Bavix\Wallet\Models\Wallet;
use DateTimeImmutable;

final class WalletCreatedEvent implements WalletCreatedEventInterface
{
    public function __construct(
        private string $holderType,
        private int|string $holderId,
        private string $walletUuid,
        private string|int $walletId,
        private DateTimeImmutable $createdAt,
        private Wallet $wallet
    ) {
    }

    public function getHolderType(): string
    {
        return $this->holderType;
    }

    public function getHolderId(): int|string
    {
        return $this->holderId;
    }

    public function getWalletUuid(): string
    {
        return $this->walletUuid;
    }

    public function getWalletId(): int|string
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
