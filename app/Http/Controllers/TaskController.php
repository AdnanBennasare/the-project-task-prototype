<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Repositories\TaskRepository;
use App\Http\Requests\CreateTaskRequest;


class TaskController extends Controller
{

    private $taskRepository;
    //

    public function __construct(TaskRepository $TaskRepository)
    {
        $this->taskRepository = $TaskRepository;
    }

    public function update(CreateTaskRequest $request, $id)
    {
    
        $task = Task::find($id);
        if (!$task) {
            return redirect()->route('tasks.index')->with('error', 'task not found');
        }
        $input = $request->all();
        $task->update($input);
        return redirect()->route('tasks.index')->with('success', 'task updated successfully');
    }
 


    public function show($id){
        $task = Task::find($id);
        $projectId = $task->Project_Id;
        $projectName = Project::find($projectId)->Name;   
        return view('tasks.view', compact('projectName', 'task'));

    }

    // public function show(Request $request, $id) {
    //     $task = Task::find($id);
 
    //     $projectId = $request->input('project_id');
    //     $project = Project::find($projectId);
    
    
    //     return view('projects.view', compact('project', 'task'));
    // }
    

    public function edit($id){
        $task = Task::find($id);
        if ($task) {
            # code...
            return view('tasks.update', compact('task'));
        }
       
        return abort(404);
    }
  

    
    public function index(Request $request)
    {
        $query = $request->input('query');
        $tasks = Task::with('project')
            ->where(function($queryBuilder) use ($query) {
                $queryBuilder->where('title', 'like', '%' . $query . '%')
                             ->orWhereHas('project', function($projectQuery) use ($query) {
                                 $projectQuery->where('Name', 'like', '%' . $query . '%');
                             });
            })
            ->paginate(8); // Adjust the pagination limit as per your requirement
    
        if ($request->ajax()) {
            return view('tasks.taskTablePartial', compact('tasks'));
        } else {
            return view('tasks.index', compact('tasks'));
        }
    }
    


    public function create(Request $request)
    {
      
        $projectId = $request->input('project_id');
        $projectName = Project::find($projectId)->Name; 
        return view('tasks.create', compact('projectId', 'projectName'));
    }
    


    public function store(CreateTaskRequest $request)
    {
        $input = $request->all();
        $this->taskRepository->create($input);

        return redirect()->route('tasks.index')->with('success', 'product added successfully');
    }

    public function destroy($id)
{
    // dd($id);
    Task::find($id)->delete();
    return redirect()->route('tasks.index')->with('success', 'task deleted successfully');

}

}
