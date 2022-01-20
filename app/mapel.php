<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mapel extends Model
{
    protected $table='mapel';
    protected $fillable=['nama_mapel','status','ttd'];

    public function student()
    {
        return $this->belongsTo('App\student');
    }
}
