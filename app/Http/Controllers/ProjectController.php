<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Exports\ProjectExport;
use App\Imports\ProjectImport;
use Maatwebsite\Excel\Facades\Excel;
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


    // ======== Index Function ========
    public function index(Request $request)
    {
        $query = $request->input('query');
        $projects = $this->projectRepository->paginate($query);
    
        if ($request->ajax()) {
            return view('projects.projectTablePartial')->with('projects', $projects);
        } 
        return view('projects.index')->with('projects', $projects);
    }



//  =========== Create Function ====
     public function create()
     {
         $this->authorize('create', Project::class);
         return view('projects.create');
     }


     // ===== store ==========
    public function store(CreateProjectRequest $request)
    {
        $this->authorize('create', Project::class);
        $input = $request->all();
        $this->projectRepository->create($input);
        return redirect()->route('projects.index')->with('success', 'projet ajouté avec succès');
    }



    // ======= edit Project ==========

    public function edit($id){
        $this->authorize('update', Project::class);
        $project = Project::find($id);   
        if ($project){
            return view('projects.update', compact('project'));
        } else {
            abort(404);
        }
        
    }

   // ======= update Project ==========
   public function update(Request $request, $id)
   {
       $this->authorize('update', Project::class);
       $project = Project::find($id);
   
       if (!$project) {
           return redirect()->route('projects.index')->with('error', 'Projet introuvable');
       }
   
       $request->validate([
           'name' => 'required|unique:projects,name,' . $id,
           'description' => 'nullable|string|max:1000',
           'start_date' => 'required|date',
           'end_date' => 'required|date|after:start_date',
       ]);
   
       $input = $request->all();
   
       $project->update($input);
   
       return redirect()->route('projects.index')->with('success', 'Projet mis à jour avec succès');
   }



//  =========== show ==========
   public function show($id){
    $project = Project::find($id);   
    if($project){
        return view('projects.view', compact('project'));
    }else{
        abort(404);
    }
}


// ========== destroy ========
public function destroy($id)
{
$this->authorize('destroy', Project::class);
Project::find($id)->delete();
return redirect()->route('projects.index')->with('success', 'Projet supprimé avec succès');
}






     public function export() 
     {
        $this->authorize('export', Project::class);
        return Excel::download(new ProjectExport, 'Projects.xlsx');
     }


     public function import(Request $request)
{
    $this->authorize('import', Project::class);

    $request->validate([
        'projects' => 'required|mimes:xlsx,xls',
    ]);

    $import = new ProjectImport;

    try {
        $importedRows = Excel::import($import, $request->file('projects'));
    
        if($importedRows) {
            $successMessage = 'Fichier importé avec succès.';
        } else {
            $successMessage = 'Pas de nouvelles données à importer.';
        }

        return redirect('/projects')->with('success', $successMessage);
    } catch (\Exception $e) {
        // Handle the exception, e.g., log the error or display an error message.
        return redirect('/projects')->with('error', 'une erreur a été commise, veuillez vérifier les données dublicate');
    }
}

     

 
   
    


    

}
