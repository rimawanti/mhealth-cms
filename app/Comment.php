<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

	public function pasien()
    {
    	return $this->belongsTo('App\Pasien');
    }
}
