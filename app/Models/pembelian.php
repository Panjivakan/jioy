<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembelian extends Model
{
    public function pembelian_produk()
    {
        return $this->hasMany(Pembelian_produk::class);
    }
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }
}
