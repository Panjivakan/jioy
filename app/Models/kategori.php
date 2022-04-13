<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    // use HasFactory;
    protected $fillable = ['nama_kategori', 'icon_kategori'];
    // protected $guarded = ['id_kategori', 'id_produk'];

    public function produk()
    {
        return $this->hasMany(Produk::class);
    }
}
