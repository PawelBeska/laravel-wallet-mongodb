<?php

declare(strict_types=1);

namespace Bavix\Wallet\Models;

use Bavix\Wallet\Traits\HasMeta;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Relations\BelongsTo;
use Jenssegers\Mongodb\Relations\MorphTo;

use function config;

/**
 * Class Transfer.
 *
 * @property string      $status
 * @property string      $status_last
 * @property string      $discount
 * @property int         $deposit_id
 * @property int         $withdraw_id
 * @property Wallet      $from
 * @property string      $from_type
 * @property int         $from_id
 * @property Wallet      $to
 * @property string      $to_type
 * @property int         $to_id
 * @property string      $uuid
 * @property string      $fee
 * @property Transaction $deposit
 * @property Transaction $withdraw
 *
 * @method int getKey()
 */
class Transfer extends Model
{
    use HasMeta;
    public const STATUS_EXCHANGE = 'exchange';

    public const STATUS_TRANSFER = 'transfer';

    public const STATUS_PAID = 'paid';

    public const STATUS_REFUND = 'refund';

    public const STATUS_GIFT = 'gift';

    /**
     * @var string[]
     */
    protected $fillable = [
        'status',
        'discount',
        'deposit_id',
        'withdraw_id',
        'from_type',
        'from_id',
        'to_type',
        'to_id',
        'uuid',
        'fee',
        'created_at',
        'updated_at',
    ];

    public function getTable(): string
    {
        if ((string) $this->table === '') {
            $this->table = config('wallet.transfer.table', 'transfers');
        }

        return parent::getTable();
    }

    public function from(): MorphTo
    {
        return $this->morphTo();
    }

    public function to(): MorphTo
    {
        return $this->morphTo();
    }

    public function deposit(): BelongsTo
    {
        return $this->belongsTo(Transaction::class, 'deposit_id');
    }

    public function withdraw(): BelongsTo
    {
        return $this->belongsTo(Transaction::class, 'withdraw_id');
    }
}
