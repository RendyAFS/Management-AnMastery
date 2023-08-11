<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PictureFabric extends Model
{
    use HasFactory;

    public function fabric()
    {
        return $this->hasMany(Fabric::class);
    }
}
