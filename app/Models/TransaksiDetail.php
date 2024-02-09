<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiDetail extends Model
{
    use HasFactory;
    protected $fillable = ['transaksi_id', 'produk_id', 'produk_name','qty','subtotal'];
    public function produk()
    {
        return $this->belongsTo('App\Models\Produk', 'produk_id');
    }
}
