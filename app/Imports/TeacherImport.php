<?php

namespace App\Imports;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Str;
use App\teacher;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TeacherImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $user =User::create([
            "role" => "guru",
            "name" => $row["name"],
            "email" => $row["email"],
           "password" => bcrypt('123456789'),
            "remember_token" => Str::random(60),
        ]);

        return new teacher([
            "user_id"=>$user->id,
            "nip" => $row["nip"],
            "nama_guru" => $row["nama_guru"],
            "alamat" => $row["alamat"],
            "email" => $row["email"],

        ]);
    }
}
