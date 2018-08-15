<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Pelanggan
 *
 * @mixin \Eloquent
 */
class Pelanggan extends Model
{
    protected $table = 'pelanggan';
    protected $primaryKey = 'idPelanggan';

    public function penerimaSantunan(){
        return $this->hasMany('App\PenerimaSantunan', 'idPelanggan');
    }
}
