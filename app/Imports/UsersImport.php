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
            'name' => $row[1],
            'email' => $row[2],
            'is_admin' => $row[3],
            'disabled_at' => $row[4],
            'email_verified_at' => $row[5],
            'password' => $row[6],
            'created_at' => $row[8],
            'update_at' => $row[9]

        ]);
    }

        /**
         * Validación
         *
         * @return array
         */
        public function rules(): array
    {
        return [

            'name' => 'required|',
            'email' => 'required|@',
            'is_admin' => '',
            'disabled_at' => '',
            'email_verified_at' => '',
            'password' => 'required|',

        ];
    }
}
