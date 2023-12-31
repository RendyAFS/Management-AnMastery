<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceEmployee extends Model
{
    use HasFactory;

    public function payment()
    {
        return $this->hasMany(Payment::class);
    }
}
