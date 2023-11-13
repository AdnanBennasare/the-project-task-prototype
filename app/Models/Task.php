<?php

namespace App\Models;

use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 
        'description',  
        'project_id'
      
    ];

    public static $rules = [
        'title' => 'required|unique:tasks,title',
        'description' => 'nullable|string|max:1000',
        'project_id' => 'required|integer',
    ];
    
    public function project()
    {
        return $this->belongsTo(Project::class, 'Project_Id');
    }
}


