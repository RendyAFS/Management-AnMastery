<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    public function fabric()
    {
        return $this->hasMany(Fabric::class);
    }
    protected $fillable = [
        'nama_supplier',
        'alamat',
        'HGT',
        'INT',
        'Febri',
        'TC',
        'Biasa',
        'Lebar',
        // Other fields that you want to be mass assignable
    ];
}
