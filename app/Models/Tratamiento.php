<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    use HasFactory;
    
    public function diagnostico(): HasMany
    {
        return $this->hasMany(Diagnostico::class);
    }
}
