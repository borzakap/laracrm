<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Traits\Filterable;

class Contact extends Model
{
    use HasFactory, Filterable;
    
    protected $fillable = ['name', 'user_id'];

    /**
     * The relationships that should always be loaded.
     * @var array
     */
    protected $with = ['responsible'];

    /**
     * contact`s phones
     * @return HasMany
     */
    public function phones(): HasMany
    {
        return $this->hasMany(Phone::class)->orderBy('default', 'desc');
    }

    /**
     * default contact`s phone
     * @return HasOne
     */
    public function phone(): HasOne
    {
        return $this->phones()->one()->ofMany([
                'id' => 'max'
            ], function (Builder $query): void {
                $query->where('default', true);
            });
    }

    /**
     * contact`s emails
     * @return HasMany
     */
    public function emails(): HasMany
    {
        return $this->hasMany(Email::class)->orderBy('default', 'desc');
    }

    /**
     * contact`s default email
     * @return HasOne
     */
    public function email(): HasOne 
    {
        return $this->emails()->one()->ofMany([
                'id' => 'max'
            ], function (Builder $query): void {
                $query->where('default', true);
            });
    }

    /**
     * contact`s responsible user
     * @return BelongsTo
     */
    public function responsible(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
