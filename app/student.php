<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    protected $table='student';
    protected $fillable=['user_id','nisn','nama_siswa','foto_profil','alamat','jurusan','kelas','email'];
    
    public function mapel()
    {
        return $this->hasMany('App\mapel');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function catatan()
    {
        return $this->hasMany('App\catatan');
    }
    
}
