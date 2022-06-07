<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    // protected $guarded = ['id'];
    public $fillable = 
    [
        'user_id', 'produk_id', 'jumlah', 'total', 'status'
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
