<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
   protected $table = 'siswa';

   protected $fillable = [
   		'nim',
   		'nama_mahasiswa',
   		'id_jurusan'
   		
   ];

   public function getNamaMahasiswaAttribute($nama_mahasiswa){
   	return ucwords($nama_mahasiswa);
   }
   public function jurusan(){
      return $this->belongsTo('App\Jurusan', 'id_jurusan');
   }


   // public function setNamaSiswaAttribute($nama_siswa){
   	// return strtolower($nama_siswa);
   // }  

 
}

