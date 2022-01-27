<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pelanggan extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = ['id'];

    // protected $fillable = [
    //     'nama',
    //     'email',
    //     'password',
    //     'telepon',
    //     'alamat',
    // ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function pembelian_produk()
    {
        return $this->hasMany(Pembelian_produk::class);
    }
    public function pembelian()
    {
        return $this->hasMany(Pembelian_produk::class);
    }
}
