<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    
	protected $table = 'dokters';

	public function pemeriksaans(){
		return $this->hasMany('App\Pemeriksaan');
	}
}
