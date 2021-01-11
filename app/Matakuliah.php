<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    protected $table ='matakuliah';

    protected $fillable = ['nama_matakuliah','kode_matakuliah'];

    public function dosen() {
    	return $this->belongsToMany('App\Dosen','matakuliah_dosen', 'id_matakuliah','id_dosen');
    }

       public function getNamaMatakuliahAttribute($nama_matakuliah){
   	return ucwords($nama_matakuliah);
   }
}
