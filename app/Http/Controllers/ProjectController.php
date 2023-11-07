<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Repositories\ProjectRepository;
use App\Http\Requests\CreateProjectRequest;


class ProjectController extends Controller
{

    
    private $projectRepository;
    //

    public function __construct(ProjectRepository $ProjectRepository)
    {
        $this->projectRepository = $ProjectRepository;
    }

       /**
     * Display a listing of the Project.
     */



    public function index(Request $request)
    {
        $query = $request->input('query');
        $projects = $this->projectRepository->paginate($query);
    
        if ($request->ajax()) {
            return view('projects.projectTablePartial')->with('projects', $projects);
        } 
    
        return view('projects.index')->with('projects', $projects);
    }

    

 
    public function create()
    {
        return view('projects.create');
    }

 

    public function store(CreateProjectRequest $request)
    {
        $input = $request->all();

        $this->projectRepository->create($input);

        return redirect()->route('projects.index')->with('success', 'project added successfully');

    }

    public function show($id){
        $project = Project::find($id);   
        return view('projects.view', compact('project'));
    }
    public function edit($id){
        $project = Project::find($id);   
        return view('projects.update', compact('project'));
    }

    public function update(CreateProjectRequest $request, $id)
{
    $project = Project::find($id);

    if (!$project) {
        return redirect()->route('projects.index')->with('error', 'Project not found');
    }

    $input = $request->all();

    $project->update($input);

    return redirect()->route('projects.index')->with('success', 'Project updated successfully');
}


public function destroy($id)
{
    // dd($id);
    Project::find($id)->delete();
    return redirect()->route('projects.index')->with('success', 'Project deleted successfully');

}

}
