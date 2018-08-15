<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asuransi extends Model
{
    protected $table = 'asuransi';
    protected $primaryKey = 'idAsuransi';

    protected $casts = [
        'idAsuransi' => 'string'
    ];

    public function pembayaran(){
        return $this->hasMany('App\Pembayaran', 'idAsuransi');
    }

    public function pelanggan(){
        return $this->belongsTo('App\Pelanggan', 'idPelanggan');
    }

    public function agen(){
        return $this->belongsTo('App\Agen', 'idAgen');
    }
}