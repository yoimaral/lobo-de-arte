<?php

namespace App\Imports;

use App\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'name' => $row[0],
            'email' => $row[1],
            'is_admin' => $row[2],
            'disabled_at' => $row[3],
            'email_verified_at' => $row[4],
            'password' => Hash::make($row[5])
        ]);
    }
}
