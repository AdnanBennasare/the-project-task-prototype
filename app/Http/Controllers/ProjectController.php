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
        $this->authorize('create', Project::class); 
        return view('projects.create');
    }
    

    public function store(CreateProjectRequest $request)
    {
        $this->authorize('store', Project::class);
        $input = $request->all();
        $this->projectRepository->create($input);
        return redirect()->route('projects.index')->with('success', 'project added successfully');
    }

    public function show($id){
        $project = Project::find($id);   
        if($project){
            return view('projects.view', compact('project'));
        }else{
            abort(404);
        }
    }

    public function edit($id){
        $this->authorize('edit', Project::class);
        $project = Project::find($id);   
        if ($project){
            return view('projects.update', compact('project'));
        } else {
            abort(404);
        }
        
    }

    public function update(CreateProjectRequest $request, $id)
{
    $this->authorize('update', Project::class);
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
    $this->authorize('destroy', Project::class);
    Project::find($id)->delete();
    return redirect()->route('projects.index')->with('success', 'Project deleted successfully');
}

}
