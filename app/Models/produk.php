<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    // use HasFactory;

    // -----untuk data yang mau di isi (kalau tdk ada tidak di isi)
    // protected $table = 'produks';
    protected $fillable = ['nama', 'kategori_id', 'harga', 'stok', 'foto', 'deskripsi'];

    // -----untuk data yg tidak di isi (selain itu isi semua)
    // protected $guarded = ['id'];
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
    public function pembelian_produk()
    {
        return $this->belongsTo(Pembelian_produk::class);
    }
}
