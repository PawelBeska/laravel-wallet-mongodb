<?php

declare(strict_types=1);

namespace Bavix\Wallet\Internal\Events;

use Bavix\Wallet\Models\Wallet;
use DateTimeImmutable;
use MongoDB\BSON\ObjectIdInterface;

interface WalletCreatedEventInterface extends EventInterface
{
    public function getHolderType(): string;

    public function getHolderId(): ObjectIdInterface|int|string;

    public function getWalletId(): ObjectIdInterface|int|string;

    public function getWalletUuid(): string;

    public function getCreatedAt(): DateTimeImmutable;

    public function getWallet(): Wallet;
}
