<?php

namespace App\Policies;

use App\Models\Pelanggan;
use App\Models\laporan;
use Illuminate\Auth\Access\HandlesAuthorization;

class LaporanPolicy
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
     * @param  \App\Models\laporan  $laporan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Pelanggan $pelanggan, laporan $laporan)
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
     * @param  \App\Models\laporan  $laporan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Pelanggan $pelanggan, laporan $laporan)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @param  \App\Models\laporan  $laporan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Pelanggan $pelanggan, laporan $laporan)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @param  \App\Models\laporan  $laporan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Pelanggan $pelanggan, laporan $laporan)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @param  \App\Models\laporan  $laporan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Pelanggan $pelanggan, laporan $laporan)
    {
        //
    }
}
