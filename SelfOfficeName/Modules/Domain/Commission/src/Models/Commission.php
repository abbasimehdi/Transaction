<?php

namespace Selfofficename\Modules\Domain\Commission\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Selfofficename\Modules\Domain\Commission\database\factories\CommissionFactory;
use Selfofficename\Modules\Domain\Transaction\Models\Transaction;

class Commission extends Model
{
    use HasFactory;

    protected $fillable = ['transaction_id', 'amount'];

    protected static function newFactory(): Factory
    {
        return CommissionFactory::new();
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
