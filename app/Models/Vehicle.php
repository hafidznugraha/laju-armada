<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'nama',
        'kategori',
        'merk',
        'harga',
        'status',
        'foto',
        'deskripsi'
    ];
}