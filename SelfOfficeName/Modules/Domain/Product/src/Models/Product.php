<?php

namespace Selfofficename\Modules\Domain\Product\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Selfofficename\Modules\Domain\Product\database\factories\ProductFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'image'];

    /**
     * @return Factory|ProductFactory
     */
    protected static function newFactory(): \Illuminate\Database\Eloquent\Factories\Factory|ProductFactory
    {
        return ProductFactory::new();
    }
}
