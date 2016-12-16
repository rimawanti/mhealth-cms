<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Pasien extends Model
{
	protected $table = 'pasiens';

	public function prediksis(){
		return $this->hasMany('App\Prediksi');
	}
	public function pemeriksaans(){
		return $this->hasMany('App\Pemeriksaan');
	}
    /*const THIS_ROLE_USER = 3;
  
   	protected $attributes = [
   		'tempat_lahir' => null,
   		'tanggal_lahir' => Carbon::now()->toDateTimeString(),
	   	'foto' => null,
	   	'role_id' => '3',
   	];*/
   	
}
