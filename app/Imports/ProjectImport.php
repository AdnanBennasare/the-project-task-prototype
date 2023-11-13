<?php

namespace App\Imports;

use App\Models\Project;
use Maatwebsite\Excel\Concerns\ToModel;

class ProjectImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Project([
            'name' => $row[1],
            'description' => $row[2], 
            'start_date' => $row[3],
            'end_date' => $row[4],
        ]);
    }
    
}
