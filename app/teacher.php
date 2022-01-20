<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{
    protected $table='teacher';
    protected $fillable=['user_id','nip','nama_guru','foto_profil','alamat','email'];

    public function mapel()
    {
        return $this->hasMany('App\mapel');
    }
}
