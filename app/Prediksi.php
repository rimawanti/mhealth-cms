<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prediksi extends Model
{
    //
    public function pasien()
    {
    	return $this->belongsTo('App\Pasien');
    }
}
