<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian_produk extends Model
{
    // use HasFactory;
    public function pembelian()
    {
        return $this->belongsTo(Pembelian::class);
    }
    public function produk()
    {
        return $this->hasMany(Produk::class);
    }
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }
}
