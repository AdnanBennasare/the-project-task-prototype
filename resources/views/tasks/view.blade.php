@extends('dashboard')
@section('section')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Task details</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header   -->

    <!-- Main content -->
   
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <div class="d-flex justify-content-center" >
            <!-- general form elements -->
            <div class="col-md-8 card card-secondary card-create">
              <div class="card-header">
                <h3 class="card-title">Afficher task</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

                <div class="card-body">

                  <div class="card card-secondary card-outline">
                    <div class="card-header">
                      <h5 class="card-title m-0">Title</h5>
                    </div>
                    <div class="card-body">


                      <p class="card-text">{{$task->Title}}</p>

                    </div>
                  </div>
                  <div class="card card-secondary card-outline">
                    <div class="card-header">
                      <h5 class="card-title m-0">Description</h5>
                    </div>
                    <div class="card-body">


                      <p class="card-text">{{$task->Description}}</p>

                    </div>
                  </div>
                  <div class="card card-secondary card-outline">
                    <div class="card-header">
                      <h5 class="card-title m-0">project name</h5>
                    </div>
                    <div class="card-body">


                      <p class="card-text">{{$projectName}}</p>

                    </div>
                  </div>    
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <div class="d-flex">
                        <div class="p-2">
                            <a href="{{route('tasks.edit', $task->id)}}" class="btn btn-warning">Editer</a>
                        </div>

                        <div class="ml-auto p-2">
                            <a href="{{route('tasks.index')}}" class="btn btn-secondary">Anuler</a>
                        </div>
                      </div>

                </div>
            </div>
            <!-- /.card -->

          </div>


      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>




@endsection