@extends('dashboard')
@section('section')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Détails du Projet</h1>
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
                <h3 class="card-title">Afficher les Détails du Projet</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

                <div class="card-body">

                  <div class="card card-secondary card-outline">
                    <div class="card-header">
                      <h5 class="card-title m-0">Nom du Projet</h5>
                    </div>
                    <div class="card-body">


                      <p class="card-text">{{$project->Name}}</p>

                    </div>
                  </div>
                  <div class="card card-secondary card-outline">
                    <div class="card-header">
                      <h5 class="card-title m-0">Description du Projet</h5>
                    </div>
                    <div class="card-body">


                      <p class="card-text">{{$project->Description}}</p>

                    </div>
                  </div>
                  <div class="card card-secondary card-outline">
                    <div class="card-header">
                      <h5 class="card-title m-0">Date de Début</h5>
                    </div>
                    <div class="card-body">


                      <p class="card-text">{{$project->Start_Date}}</p>

                    </div>
                  </div>
                  <div class="card card-secondary card-outline">
                    <div class="card-header">
                      <h5 class="card-title m-0">date de fin</h5>
                    </div>
                    <div class="card-body">
                      <p class="card-text">{{$project->End_Date}}</p>
                    </div>
                  </div>


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <div class="d-flex">
                   @if (!Auth::user()->role == "member")
                        <div class="p-2">
                            <a href="{{route('projects.edit', $project->id)}}" class="btn btn-warning">éditer</a>
                        </div>
                        @endif

                        <div class="ml-auto p-2">
                            <a href="{{route('projects.index')}}" class="btn btn-secondary">Annuler</a>
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