<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public function fabric()
    {
        return $this->belongsTo(Fabric::class);
    }


    public function priceemployee()
    {
        return $this->belongsTo(PriceEmployee::class);
    }

    public function income()
    {
        return $this->hasMany(Income::class);
    }
}
