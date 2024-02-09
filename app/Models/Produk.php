<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'kategori_id', 'harga', 'stok', 'gambar','diskon'];
    public function transaksiDetails()
    {
        return $this->hasMany('App\Models\TransaksiDetail', 'produk_id');
    }
}
