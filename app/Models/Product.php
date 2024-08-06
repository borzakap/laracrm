<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use App\Enums\ProductType;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = ['residential_id', 'section_id', 'type', 'value'];

    protected $with = ['price'];

    protected function casts(): array 
    {
        return [
            'type' => ProductType::class,
        ];
    }

    /**
     * all product`s prices
     * @return HasMany
     */
    public function prices(): HasMany {
        return $this->hasMany(Price::class);
    }

    /**
     * current product`s price
     * @return HasOne
     */
    public function price(): HasOne
    {
        return $this->prices()->one()->ofMany([
                'id' => 'max'
            ], function(Builder $query): void {
                $query->where('from', '<=', Carbon::now())
                    ->whereNull('to');
            });
    }
}
