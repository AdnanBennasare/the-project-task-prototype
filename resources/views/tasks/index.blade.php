@extends('dashboard')
@section('section')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Les tâches</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header   -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

        @if(session('success'))
         <div class="alert alert-success">
        {{ session('success') }}
         </div>
           @endif  

           @if(session('error'))
           <div class="alert alert-danger">
          {{ session('error') }}
           </div>
           
             @endif 


            <!-- Small boxes (Stat box) -->
            <div class="card">
                <div class="card-header">
                  {{-- search input  --}}
                  <div class=""> <!-- Use d-flex and justify-content-between classes -->
                    <div class="float-left"> <!-- Set width for select element -->
                        <select id="filter_by_projects" class="js-example-basic-single" style="width:250px;" name="project">
                            <option value=""> -- Tous les Projets --</option>
                            @foreach($projects as $project)
                                <option value="{{ $project->Name }}">{{ $project->Name }}</option>
                            @endforeach
                        </select>                   
                    </div>
                    <div class="input-group input-group-sm float-right search-container" style="width: 190px;">
                        <!-- SEARCH input -->
                        <input style="height: 35px;" type="text" name="search" id="searchInput" class="form-control" placeholder="Rechercher...">
                        <div class="search-icon"><i class="fa-solid fa-magnifying-glass"></i></div>
                    </div>
                </div>
                
                </div>
            <div id="resulthtml">
                    @include('tasks.taskTablePartial')
              </div>
            </div>
            </div>

    </section>
    <!-- /.content -->
</div>



@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
// In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
    $('.js-example-basic-single').select2();
});


$(document).ready(function() {
    $(document).on('click', '.delete-task', function () {
        var taskId = $(this).data('task-id');
        var taskName = $(this).data('task-title'); // Retrieve task name
        console.log(taskId);
        console.log(taskName); // Log the task name to verify

        var deleteUrl = "{{ route('tasks.destroy', ':id') }}";
        deleteUrl = deleteUrl.replace(':id', taskId);
        console.log(deleteUrl);

        // Update modal content with the task name
        $('#exampleModal .modal-body').html('<div>Si vous êtes sûr de vouloir supprimer ce tâche <strong>"' + taskName + '"</strong> cliquez sur Supprimer pour continuer</div>');          
        // Update form action URL
        $('#deleteForm').attr('action', deleteUrl);
    });
});



    const tableContainer = $('#table-container');
    var searchQuery = '';
    const search = (query = '', page = 1) => {
        $.ajax('{{ route('tasks.index') }}', {
            data: {
                query: query,
                page: page
            },
            success: (data) => updateTable(data)
        });
        history.pushState(null, null, '?query=' + query + '&page=' + page);
    };



const updateTable = (html) => {
    try {
        $('#resulthtml').html(html); // Target the tbody element and update its content
        updatePaginationLinks();
        console.log(html);
    } catch (error) {
        // console.error('Error updating table:', error);
    }
};


const updatePaginationLinks = () => {
    // console.log('updatePaginationLinks');

            $('button[page-number]').each(function() {
                $(this).on('click', function() {
                // console.log('click');

                    pageNumber = $(this).attr('page-number')
                    search(searchQuery, pageNumber)
                })
            })
        }
     

        
    $(document).ready(() => {
    // console.log('hey')
  
        $('#searchInput').on('input', function() {
            searchQuery = $('#searchInput').val();
            // searchQuery = $(this).val();
    console.log(searchQuery)

            search(searchQuery);
        });

        updatePaginationLinks();
        
    });

    $(document).ready(() => {
    // console.log('hey')
  
        $('#filter_by_projects').on('input', function() {
            searchQuery = $('#filter_by_projects').val();
            // searchQuery = $(this).val();
    console.log(searchQuery)

            search(searchQuery);
        });

        updatePaginationLinks();
        
    });
  
</script>