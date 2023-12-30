<?php

namespace Selfofficename\Modules\Domain\Transaction\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Selfofficename\Modules\Domain\Card\Models\Card;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['source_card_id', 'destination_card_number', 'amount', 'status'];

    public function card()
    {
        return $this->belongsTo(Card::class);
    }

//    public function commission()
//    {
//        return $this->hasOne(Commission::class);
//    }
}
