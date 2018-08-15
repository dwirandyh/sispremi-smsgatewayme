<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\PenerimaSantunan
 *
 * @mixin \Eloquent
 */
class PenerimaSantunan extends Model
{
    protected $table = 'penerima_santunan';
    protected $primaryKey = 'idPenerima';

    public function pelanggan(){
        return $this->belongsTo('App\Pelanggan', 'idPelanggan');
    }
}