<?php

declare(strict_types=1);

namespace Bavix\Wallet\Internal\Events;

use Bavix\Wallet\Models\Transaction;
use DateTimeImmutable;
use MongoDB\BSON\ObjectIdInterface;

final class TransactionCreatedEvent implements TransactionCreatedEventInterface
{
    public function __construct(
        private ObjectIdInterface|int|string $id,
        private string $type,
        private ObjectIdInterface|int|string $walletId,
        private DateTimeImmutable $createdAt,
        private Transaction $transaction,
    ) {
    }

    public function getId(): ObjectIdInterface|int|string
    {
        return $this->id;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getWalletId(): ObjectIdInterface|int|string
    {
        return $this->walletId;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getTransaction(): Transaction
    {
        return $this->transaction;
    }
}
