<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class catatan extends Model
{
    protected $table='catatan';
    protected $fillable=['catatan','tanggal'];

    public function student()
    {
        return $this->belongsTo('App\student');
    }
}
