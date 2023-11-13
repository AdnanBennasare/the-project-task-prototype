<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use App\Exports\TaskExport;
use App\Imports\TaskImport;
use Illuminate\Http\Request;
use App\Repositories\TaskRepository;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\CreateTaskRequest;


class TaskController extends Controller
{

    private $taskRepository;
    //

    public function __construct(TaskRepository $TaskRepository)
    {
        $this->taskRepository = $TaskRepository;
    }


    public function import(Request $request)
    {
        $this->authorize('import', Task::class);
    
        $request->validate([
            'tasks' => 'required|mimes:xlsx,xls',
        ]);
    
        $import = new TaskImport;
    
        try {
            $importedRows = Excel::import($import, $request->file('tasks'));
        
            if($importedRows) {
                $successMessage = 'Fichier importé avec succès.';
            } else {
                $successMessage = 'Pas de nouvelles données à importer.';
            }
    
            return redirect('/tasks')->with('success', $successMessage);
        } catch (\Exception $e) {
            // Handle the exception, e.g., log the error or display an error message.
            return redirect('/tasks')->with('error', 'une erreur a été acourd vérifier la syntaxe');
        }
    }
    
    public function export() 
    {
       $this->authorize('export', Task::class);
       return Excel::download(new TaskExport, 'Tasks.xlsx');
    }


    public function update(Request $request, $id)
    {
        $this->authorize('update', Task::class);
    
        $task = Task::find($id);
        if (!$task) {
            return redirect()->route('tasks.index')->with('error', 'tâche introuvable');
        }
        $request->validate([
            'title' => 'required|unique:tasks,title,' . $id,
            'description' => 'nullable|string|max:1000',
            'project_id' => 'required|integer',
           
        ]);

        $input = $request->all();
        $task->update($input);
        return redirect()->route('tasks.index')->with('success', 'tâche mise à jour avec succès');
    }
 


    public function show($id){
        $task = Task::find($id);
        if($task){
            $projectId = $task->Project_Id;
            $projectName = Project::find($projectId)->Name;   
            return view('tasks.view', compact('projectName', 'task'));
        }else {
            return abort(404);
        }
    }
    

    public function edit($id){
        $this->authorize('edit', Task::class); 
        $task = Task::find($id);
        if ($task) {

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
            $projects = Project::all(); // Fetch all projects
            return view('tasks.index', compact('tasks', 'projects'));       
        }
    }
    


    public function create(Request $request)
    {
        $this->authorize('create', Task::class); 
        $projectId = $request->input('project_id');
        $projectName = Project::find($projectId)->Name; 
        return view('tasks.create', compact('projectId', 'projectName'));
    }
    

    public function store(CreateTaskRequest $request)
    {
        $this->authorize('store', Task::class);
        $input = $request->all();
        $this->taskRepository->create($input);
        return redirect()->route('tasks.index')->with('success', 'produit ajouté avec succès');
    }

    public function destroy($id)
{
    $this->authorize('destroy', Task::class);
    Task::find($id)->delete();
    return redirect()->route('tasks.index')->with('success', 'tâche supprimée avec succès');

}

}
