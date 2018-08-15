<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agen extends Model
{
    protected $table = 'agen';
    protected $primaryKey = 'idAgen';

    protected $casts = [
        'idAgen' => 'string'
    ];

    public function asuransi(){
        $this->hasMany('App\Asuransi', 'idAgen');
    }

    public function pembayaran(){
        $this->hasMany('App\Pembayaran', 'idAgen');
    }
}
