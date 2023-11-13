<div class="" id="tablecontainer">
    <div class="card-body p-0 table-data">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Le Nom de Membre</th>
                    <th>L'email Membre</th>             
                   <th class="text-center" >Actions</th>

                </tr>
            </thead>
    

            <tbody id="tbodyresults">
                @foreach($members as $member)
                @if($member->role !== 'project_leader')
                <tr>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->email }}</td>
            
                    <td class="text-center">
                        <a class="btn btn-primary btn-sm" href="{{route('members.show', $member->id)}}">
                            <i class="fas fa-folder"></i>
                        </a>
                        <button type="button" class="btn btn-danger delete-member" style="font-size: 11px;" data-bs-toggle="modal" data-bs-target="#exampleModal" data-member-id="{{ $member->id }}" data-member-name="{{ $member->name }}" >
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </td>
                </tr>
                @endif
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
                    <h3 class="modal-title fs-5" id="exampleModalLabel">vous êtes sûr de vouloir supprimer ce Membre ?</h3>
                    <div type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" >
                        <i class="fa-solid fa-x"></i>
                    </div>
                </div>
                <div class="modal-body">
                
                    <!-- Modal body content here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete projet</button>
                </div>
            </form>
        </div>
    </div>
</div>




    <div class="card-footer clearfix">
        
            <div class="float-right">
            <div id="paginationContainer">                 
                @if ($members->count() > 0)
                <ul class="pagination m-0">
                    @if ($members->onFirstPage())
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                            <span class="page-link" aria-hidden="true">«</span>
                        </li>
                    @else
                        <li class="page-item">
                            <button class="page-link" page-number="{{ $members->currentPage() - 1 }}" rel="prev"
                                aria-label="@lang('pagination.previous')">«</button>
                        </li>
                    @endif
        
                    @for ($i = 1; $i <= $members->lastPage(); $i++)
                        @if ($i == $members->currentPage())
                            <li class="page-item active" aria-current="page"><span class="page-link">{{ $i }}</span></li>
                        @else
                            <li class="page-item"><button class="page-link" page-number="{{ $i }}">{{ $i }}</button></li>
                        @endif
                    @endfor
        
                    @if ($members->hasMorePages())
                        <li class="page-item">
                            <button class="page-link" page-number="{{ $members->currentPage() + 1 }}" rel="next"
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
            <a href="{{route('export.member')}}" style="height: 38px;" class="btn text-black border border-dark">
                Exporter <i class="fa-solid fa-upload pl-2"></i>
            </a>
            
            <form action="{{ route('import.member') }}" class="pl-1" method="post" enctype="multipart/form-data" id="importForm">
                @csrf 
                <input type="file" name="members" id="formFileInputmembers" style="position: absolute; left: -9999px;">
                <button type="button" id="fileButtonmembers" class="btn text-black border border-dark">Importer <i class="fa-solid fa-download pl-2"></i></button>
            </form>

            
        </div>

        <script>
        $(document).ready(function() {
            $('#fileButtonmembers').click(function() {
                $('#formFileInputmembers').click();
            });
        
            $('#formFileInputmembers').change(function() {
              
                $('#importForm').submit();
            });
        });
        </script>
        @endif                                        
           
    </div>

</div>



