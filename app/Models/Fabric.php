<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fabric extends Model
{
    use HasFactory;

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function typefabric()
    {
        return $this->belongsTo(TypeFabric::class);
    }

    public function typecolor()
    {
        return $this->belongsTo(TypeColor::class);
    }

    public function picturefabric()
    {
        return $this->belongsTo(PictureFabric::class);
    }

    public function payment()
    {
        return $this->hasMany(Payment::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
