<?php

declare(strict_types=1);

namespace Bavix\Wallet\Internal\Transform;

use Bavix\Wallet\Internal\Dto\TransactionDtoInterface;
use Bavix\Wallet\Models\Meta;
use Illuminate\Support\Traits\Conditionable;
use MongoDB\BSON\ObjectId;

final class TransactionDtoTransformer implements TransactionDtoTransformerInterface
{
    use Conditionable;

    public function extract(TransactionDtoInterface $dto): array
    {
        return [
            'uuid' => $dto->getUuid(),
            'payable_type' => $dto->getPayableType(),
            'payable_id' => new ObjectId($dto->getPayableId()),
            'wallet_id' => new ObjectId($dto->getWalletId()),
            'type' => $dto->getType(),
            'amount' => $dto->getAmount(),
            'confirmed' => $dto->isConfirmed(),
            'meta' => $this->when($dto->getMeta(), fn() => Meta::query()->create($dto->getMeta())),
            'created_at' => $dto->getCreatedAt(),
            'updated_at' => $dto->getUpdatedAt(),
        ];
    }
}
