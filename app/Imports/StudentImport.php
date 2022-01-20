<?php

namespace App\Imports;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Str;
use App\student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
       $user =User::create([
           "role" => "siswa",
           "name" => $row["name"],
           "email" => $row["email"],
          "password" => bcrypt('123456789'),
           "remember_token" => Str::random(60),
       ]);
       
        return new student([
 
                "user_id"=>$user->id,
                "nisn" => $row["nisn"],
                "nama_siswa" => $row["nama_siswa"],
                "alamat" => $row["alamat"],
                "jurusan" => $row["jurusan"],
                "kelas" => $row["kelas"],
                "email" => $row["email"],
        
        ]);
    }
}
