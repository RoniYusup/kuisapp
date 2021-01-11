<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'dosen';

   protected $fillable = [
   		'nip',
   		'nama_dosen',
   		'id_matakuliah'
   		
   ];

   public function getNamaDosenAttribute($nama_dosen){
   	return ucwords($nama_dosen);
   }
   public function matakuliah(){
      return $this->belongsToMany('App\Matakuliah','matakuliah_dosen', 'id_dosen', 'id_matakuliah')->withTimeStamps();
   }
   public function getMatakuliahDosenAttribute(){
      return $this->matakuliah->pluck('id')->toArray();
   }

}
