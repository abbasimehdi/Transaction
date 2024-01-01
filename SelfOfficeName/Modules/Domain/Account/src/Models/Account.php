<?php

namespace Selfofficename\Modules\Domain\Account\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Selfofficename\Modules\Domain\Account\database\factories\AccountFactory;
use Selfofficename\Modules\Domain\Card\Models\Card;
use Selfofficename\Modules\InfraStructure\Models\User;


class Account extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['user_id', 'number'];

    protected static function newFactory(): Factory
    {
        return AccountFactory::new();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }

    public function cards()
    {
        return $this->hasMany(Card::class,  'id', 'account_id');
    }

}
