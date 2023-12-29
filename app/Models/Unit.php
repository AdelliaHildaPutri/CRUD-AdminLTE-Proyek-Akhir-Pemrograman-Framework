<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
  
    protected $fillable = [
        'merek_motor', 'tahun_pembuatan' ,'warna_motor', 'harga', 'image'
    ];
}
