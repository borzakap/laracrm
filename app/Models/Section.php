<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    
    protected $fillable = ['residential_id','name'];

    /**
     * residential section belongs to
     * @return BelongsTo
     */
    public function residential(): BelongsTo
    {
        return $this->belongsTo(Residential::class);
    }
}
