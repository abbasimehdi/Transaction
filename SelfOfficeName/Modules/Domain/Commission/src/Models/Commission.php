<?php

namespace SelfOfficeName\Modules\Domain\commission\src\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Selfofficename\Modules\Domain\Transaction\Models\Transaction;

class Commission extends Model
{
    use HasFactory;

    protected $fillable = ['transaction_id', 'amount'];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
