<?php

namespace Selfofficename\Modules\Domain\Transaction\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Selfofficename\Modules\Domain\Card\Models\Card;
use Selfofficename\Modules\Domain\Commission\Models\Commission;
use Selfofficename\Modules\Domain\Transaction\database\factories\TransactionFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['source_card_id', 'destination_card_number', 'amount', 'status'];

    /**
     * @return Factory
     */
    protected static function newFactory(): Factory
    {
        return TransactionFactory::new();
    }

    /**
     * @return BelongsTo
     */
    public function card()
    {
        return $this->belongsTo(Card::class, 'source_card_id', 'id');
    }

    /**
     * @return HasOne
     */
    private function commission(): HasOne
    {
        return $this->hasOne(Commission::class);
    }
}
