
@extends('dashboard')
@section('section')

    
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Les projets</h1>
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
                  
                      {{-- Add new project button  --}}
            
                @can('create', App\Models\Project::class)
                <div class="float-left">
                <a href="{{ route('projects.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i></a>
                </div>
                @endcan

                      {{-- search input  --}}
                      
                      <div class="input-group input-group-sm float-right search-container" style="width: 190px;">
                        <!-- SEARCH input -->
                        <input style="height: 35px;" type="text" name="search" id="searchInput" class="form-control" placeholder="Rechercher...">
                        <div class="search-icon"><i class="fa-solid fa-magnifying-glass"></i></div>
                    </div>
              
                </div>
                <div id="resulthtml">

                    @include('projects.projectTablePartial')
                </div>



              </div>
            </div>
        
              
    </section>
    <!-- /.content -->
</div>

@endsection


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>



$(document).ready(function() {
    $(document).on('click', '.delete-project', function () {
        var projectId = $(this).data('project-id');
        var projectName = $(this).data('project-name'); // Retrieve project name
        console.log(projectId);
        console.log(projectName); // Log the project name to verify

        var deleteUrl = "{{ route('projects.destroy', ':id') }}";
        deleteUrl = deleteUrl.replace(':id', projectId);
        console.log(deleteUrl);

        // Update modal content with the project name
        $('#exampleModal .modal-body').html('<div>Si vous êtes sûr de vouloir supprimer ce projet <strong>"' + projectName + '"</strong> cliquez sur Supprimer pour continuer</div>');          
        // Update form action URL
        $('#deleteForm').attr('action', deleteUrl);
    });
});


    // const tableContainer = $('#table-container');
    var searchQuery = '';
    const search = (query = '', page = 1) => {
        $.ajax('{{ route('projects.index') }}', {
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
        // console.log(html);
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
  
    
   

</script>
