<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fabric extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'suppliers_id');
    }

    public function typefabric()
    {
        return $this->belongsTo(TypeFabric::class, 'type_fabrics_id');
    }

    public function typecolor()
    {
        return $this->belongsTo(TypeColor::class, 'type_colors_id');
    }

    public function picturefabric()
    {
        return $this->belongsTo(PictureFabric::class, 'picture_fabrics_id');
    }

    public function payment()
    {
        return $this->hasMany(Payment::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class,'employees_id');
    }

}
