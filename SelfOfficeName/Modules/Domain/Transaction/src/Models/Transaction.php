<?php

namespace Selfofficename\Modules\Domain\Transaction\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Selfofficename\Modules\Domain\Card\Models\Card;
use Selfofficename\Modules\Domain\Commission\Models\Commission;
use Selfofficename\Modules\Domain\Transaction\database\factories\TransactionFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['source_card_id', 'destination_card_number', 'amount', 'status'];

    protected static function newFactory(): Factory
    {
        return TransactionFactory::new();
    }

    public function card()
    {
        return $this->belongsTo(Card::class, 'source_card_id', 'id');
    }

    public function commission()
    {
        return $this->hasOne(Commission::class);
    }
}
