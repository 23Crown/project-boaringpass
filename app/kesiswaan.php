<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kesiswaan extends Model
{
    protected $table='kesiswaan';
    protected $fillable=['user_id','nama'];


   public function user()
    {
        return $this->belongsTo(User::class);
    }
}
