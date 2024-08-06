<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Residential extends Model
{
    use HasFactory;
    
    protected $fillable = ['name'];

    /**
     * The relationships that should always be loaded.
     * @var array
     */
    protected $with = ['sections'];

    /**
     * residential`s sections
     * @return HasMany
     */
    public function sections(): HasMany
    {
        return $this->hasMany(Section::class);
    }
}
