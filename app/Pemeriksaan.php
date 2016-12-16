<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemeriksaan extends Model
{
    public function pasien()
    {
    	return $this->belongsTo('App\Pasien');
    }
    public function dokter()
    {
    	return $this->belongsTo('App\Dokter');
    }
    public function petugas()
    {
    	return $this->belongsTo('App\Staff');
    }
    public function kategori()
    {
        return $this->belongsTo('App\Kategori');
    }
}
