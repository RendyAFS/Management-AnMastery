<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

    public function pricesupplier()
    {
        return $this->belongsTo(PriceSupplier::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
