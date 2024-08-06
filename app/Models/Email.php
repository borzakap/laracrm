<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['contact_id', 'email', 'default'];
    
    protected function casts(): array {
        return [
            'default' => 'boolean',
        ];
    }
}
