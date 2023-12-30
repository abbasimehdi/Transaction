<?php

namespace Selfofficename\Modules\Domain\Card\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Selfofficename\Modules\Domain\Account\Models\Account;
use Selfofficename\Modules\Domain\Card\database\factories\CardFactory;

class Card extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['amount', 'number', 'account_id', 'expire_date', 'cvv2', 'name'];

    protected static function newFactory(): Factory
    {
        return CardFactory::new();
    }
    public function account()
    {
        return $this->belongsTo(Account::class);
    }

//    public function transactions()
//    {
//        return $this->hasMany(Transaction::class);
//    }
}
