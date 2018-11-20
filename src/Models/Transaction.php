<?php

namespace Bavix\Wallet\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * Class Transaction
 * @package Bavix\Wallet\Models
 *
 * @property string $payable_type
 * @property int $payable_id
 * @property string $uuid
 * @property string $type
 * @property int $amount
 * @property bool $confirmed
 * @property array $meta
 */
class Transaction extends Model
{

    /**
     * @var array
     */
    protected $fillable = [
        'payable_type',
        'payable_id',
        'uuid',
        'type',
        'amount',
        'confirmed',
        'meta',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'amount' => 'int',
        'confirmed' => 'bool',
        'meta' => 'json'
    ];

    /**
     * @return string
     */
    public function getTable(): string
    {
        if (!$this->table) {
            $this->table = \config('wallet.transaction.table');
        }

        return parent::getTable();
    }

    /**
     * @return MorphTo
     */
    public function payable(): MorphTo
    {
        return $this->morphTo();
    }

}
