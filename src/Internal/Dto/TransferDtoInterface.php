<?php

declare(strict_types=1);

namespace Bavix\Wallet\Internal\Dto;

use DateTimeImmutable;

interface TransferDtoInterface
{
    public function getUuid(): string;

    public function getDepositId(): int|string;

    public function getWithdrawId(): int|string;

    public function getStatus(): string;

    public function getFromType(): string;

    public function getFromId(): int|string;

    public function getToType(): string;

    public function getToId(): int|string;

    public function getDiscount(): int;

    public function getFee(): string;

    public function getCreatedAt(): DateTimeImmutable;

    public function getUpdatedAt(): DateTimeImmutable;
}
