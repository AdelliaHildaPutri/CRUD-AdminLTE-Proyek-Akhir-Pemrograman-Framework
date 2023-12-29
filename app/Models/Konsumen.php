<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsumen extends Model
{
    use HasFactory;

    protected $fillable = ['tanggal', 'nama', 'alamat', 'telp', 'kendaraan', 'harga', 'metode_pembayaran'];
}
