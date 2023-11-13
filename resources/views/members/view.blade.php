@extends('dashboard')
@section('section')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Détail du Membre</h1>
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
                <h3 class="card-title">Afficher Membre</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

                <div class="card-body">

                  <div class="card card-secondary card-outline">
                    <div class="card-header">
                      <h5 class="card-title m-0">le Nom de Membre</h5>
                    </div>
                    <div class="card-body">


                      <p class="card-text">{{$member->name}}</p>

                    </div>
                  </div>
                  <div class="card card-secondary card-outline">
                    <div class="card-header">
                      <h5 class="card-title m-0">l'email de membre</h5>
                    </div>
                    <div class="card-body">


                      <p class="card-text">{{$member->email}}</p>

                    </div>
                  </div>  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <div class="d-flex">
              

                        <div class="ml-auto p-2">
                            <a href="{{route('members.index')}}" class="btn btn-secondary">Annuler</a>
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