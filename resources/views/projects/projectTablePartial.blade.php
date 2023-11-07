<div class="card" id="tablecontainer">
    <div class="card-body p-0 table-data">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Project Name</th>
                    <th>Project Description</th>
                    <th>Start Date</th>
                    <th>End Date</th>
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
        <a  class="btn btn-success btn-sm" style="font-size: 15px;" href='{{ route('tasks.create', ['project_id' => $project->id]) }}'>
            <i class="fas fa-plus"></i>
        </a>
        <a class="btn btn-primary btn-sm" href="{{route('projects.show', $project->id)}}">
            <i class="fas fa-folder"></i>
            
        </a>
        <a class="btn btn-info btn-sm" href="{{route('projects.edit', $project->id)}}">
            <i class="fas fa-pencil-alt"></i>    
        </a>
  
        <button type="button" class="btn btn-danger delete-project" style="font-size: 11px;" data-bs-toggle="modal" data-bs-target="#exampleModal" data-project-id="{{ $project->id }}" data-project-name="{{ $project->Name }}" >
            <i class="fa-solid fa-trash-can"></i>
        </button>
              
    </td>
</tr>
@endforeach
            </tbody>
        </table>
    </div>








    <div class="card-footer clearfix">
        <div class="row">
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
        </div>        
    </div>

</div>



