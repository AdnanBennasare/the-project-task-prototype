<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class MemberImport implements ToModel
{
     protected $password;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
  
        public function model(array $row)
    {
        // dd($row);
        // Print the row for debugging
     

        // Check if 'name' and 'email' columns are not empty in the Excel file
        $name = !empty($row[1]) ? $row[1] : 'Default Name';
        $email = !empty($row[2]) ? $row[2] : 'example@example.com';

        return new User([
            'name'     => $name,
            'email'    => $email,
            'password' => Hash::make($row[4] ?? 'password'),
            'role'     => 'member', 
        ]);
    
    }
    
    
    
    
    
}
