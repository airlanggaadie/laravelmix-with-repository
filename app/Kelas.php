<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = "kelas";
    public $timestamps = false;

    public function siswa()
    {
        return $this->hasMany(Siswa::class,'kelas_id','id');
    }
}
