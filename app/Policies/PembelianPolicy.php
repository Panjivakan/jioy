<?php

namespace App\Policies;

use App\Models\Pelanggan;
use App\Models\pembelian;
use Illuminate\Auth\Access\HandlesAuthorization;

class PembelianPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @param  \App\Models\pembelian  $pembelian
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Pelanggan $pelanggan, pembelian $pembelian)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @param  \App\Models\pembelian  $pembelian
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Pelanggan $pelanggan, pembelian $pembelian)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @param  \App\Models\pembelian  $pembelian
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Pelanggan $pelanggan, pembelian $pembelian)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @param  \App\Models\pembelian  $pembelian
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Pelanggan $pelanggan, pembelian $pembelian)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @param  \App\Models\pembelian  $pembelian
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Pelanggan $pelanggan, pembelian $pembelian)
    {
        //
    }
}
