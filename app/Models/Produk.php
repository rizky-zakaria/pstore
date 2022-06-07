<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    public $fillabel = 
    [
        'nama', 'deskripsi', 'merk', 'kategori', 'harga', 'stok', 'gambar'
    ];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
