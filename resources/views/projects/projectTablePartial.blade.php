<div class="" id="tablecontainer">
    <div class="card-body p-0 table-data">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nom du Projet</th>
                    <th>Description du Projet</th>
                    <th>Date de Début</th>
                    <th>date de fin</th>
                   <th class="text-center" >Actions</th>

                </tr>
            </thead>
            <tbody id="tbodyresults">
                @foreach($projects->items() as $project)
<tr>
    <td>{{ $project->Name }}</td>
    <td>
        @php
            $words = explode(' ', $project->Description);
            $shortenedDescription = implode(' ', array_slice($words, 0, 4));
            $remainingWords = count($words) - 4;
        @endphp
    
        {{ $shortenedDescription }} @if ($remainingWords > 0) ... @endif
    </td>
    <td>{{ $project->Start_Date }}</td>
    <td>{{ $project->End_Date }}</td>

    <td class="text-center">
        <a class="btn btn-primary btn-sm" href="{{route('projects.show', $project->id)}}">
            <i class="fas fa-folder"></i>          
        </a>
        @if (Auth::user()->role == "project_leader")

        <a  class="btn btn-success btn-sm" style="font-size: 15px;" href='{{ route('tasks.create', ['project_id' => $project->id]) }}'>
            <i class="fas fa-plus"></i>
        </a>
      
        <a class="btn btn-info btn-sm" href="{{route('projects.edit', $project->id)}}">
            <i class="fas fa-pencil-alt"></i>    
        </a>
  
        <button type="button" class="btn btn-danger delete-project" style="font-size: 11px;" data-bs-toggle="modal" data-bs-target="#exampleModal" data-project-id="{{ $project->id }}" data-project-name="{{ $project->Name }}" >
            <i class="fa-solid fa-trash-can"></i>
        </button>
          @endif    
    </td>
</tr>
@endforeach
            </tbody>
        </table>
    </div>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="deleteForm" style="display: inline-block;" action="" method="post">
                @csrf
                @method("DELETE")

                <div class="modal-header">
                    <h3 class="modal-title fs-5" id="exampleModalLabel">vous êtes sûr de vouloir supprimer ce Project ?</h3>
                    <div type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" >
                        <i class="fa-solid fa-x"></i>
                    </div>
                </div>
                <div class="modal-body">
                
                    <!-- Modal body content here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-danger">Suprimer le projet</button>
                </div>
            </form>
        </div>
    </div>
</div>



    <div class="card-footer clearfix">
            <div class="float-right">
            <div id="paginationContainer">                 
                @if ($projects->count() > 0)
                <ul class="pagination m-0">
                    @if ($projects->onFirstPage())
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                            <span class="page-link" aria-hidden="true">«</span>
                        </li>
                    @else
                        <li class="page-item">
                            <button class="page-link" page-number="{{ $projects->currentPage() - 1 }}" rel="prev"
                                aria-label="@lang('pagination.previous')">«</button>
                        </li>
                    @endif
        
                    @for ($i = 1; $i <= $projects->lastPage(); $i++)
                        @if ($i == $projects->currentPage())
                            <li class="page-item active" aria-current="page"><span class="page-link">{{ $i }}</span></li>
                        @else
                            <li class="page-item"><button class="page-link" page-number="{{ $i }}">{{ $i }}</button></li>
                        @endif
                    @endfor
        
                    @if ($projects->hasMorePages())
                        <li class="page-item">
                            <button class="page-link" page-number="{{ $projects->currentPage() + 1 }}" rel="next"
                                aria-label="@lang('pagination.next')">»</button>
                        </li>
                    @else
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                            <span class="page-link" aria-hidden="true">»</span>
                        </li>
                    @endif
                </ul>
            @endif              
            </div>
        </div>
        @if (Auth::user()->role == "project_leader")
        <div class="float-left d-flex">
            <a href="{{route('export.project')}}"style="height: 38px;" class="btn text-black border border-dark">
                Exporter <i class="fa-solid fa-upload pl-2"></i>
            </a>
            
  
            
            <form action="{{ route('import.project') }}" class="pl-1" method="post" enctype="multipart/form-data" id="importForm">
                @csrf 
                <input type="file" name="projects" id="formFileInput" style="position: absolute; left: -9999px;">
                <button type="button" id="fileButton" class="btn text-black border border-dark">importer <i class="fa-solid fa-download pl-2"></i></button>
            </form>

            
        </div>

        <script>
        $(document).ready(function() {
            $('#fileButton').click(function() {
                $('#formFileInput').click();
            });
        
            $('#formFileInput').change(function() {
                // Assuming you want to submit the form when a file is selected
                $('#importForm').submit();
            });
        });
        </script>
        @endif
 
        
    </div>
  
</div>



