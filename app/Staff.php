<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    //
    protected $table = 'staffs';
    //protected $table = 'dokters';

	public function pemeriksaans(){
		return $this->hasMany('App\Pemeriksaan');
	}
}
