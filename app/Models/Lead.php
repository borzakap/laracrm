<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use App\Enums\LeadStatus;

class Lead extends Model
{
    use HasFactory;
    
    protected $fillable = ['residential_id','stage_id','user_id','name','status'];
    
    protected function casts(): array {
        return [
            'status' => LeadStatus::class,
        ];
    }

    /**
     * residential lead belongs to
     * @return BelongsTo
     */
    public function residential(): BelongsTo
    {
        return $this->belongsTo(Residential::class);
    }

    /**
     * stage lead belongs to
     * @return BelongsTo
     */
    public function stage(): BelongsTo
    {
        return $this->belongsTo(Stage::class);
    }

    /**
     * responsible user lead belongs to
     * @return BelongsTo
     */
    public function responsible(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
