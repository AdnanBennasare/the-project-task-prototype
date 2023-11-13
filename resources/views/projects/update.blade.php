@extends('dashboard')
@section('section')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Modifier Projet</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="d-flex justify-content-center">
            <!-- general form elements -->
            <div class="col-md-8 card card-info">
              <div class="card-header">
                <h3 class="card-title">éditer le Projet</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{route('projects.update', $project->id)}}">
                @csrf
                @method("PUT")
                <div class="card-body">
                  <div class="form-group">
                    <label for="Name">Nom du Projet</label>
                    <input type="text" class="form-control" value="{{ $project->Name }}" name="name" id="Name" placeholder="saisir le nom du projet">
                    <div style="color:red">
                        @error("name")
                        {{$message}}
                        @enderror
                        </div>
                  </div>

                  <div class="form-group">
                    <label for="description">Description du Projet</label>
                    <input type="text" class="form-control" value="{{ $project->Description }}" id="description" name="description" placeholder="saisir la Description du Projet">
                    <div style="color:red">
                        @error("description")
                        {{$message}}
                        @enderror
                        </div>
                    
                  </div>
               

                  <div class="form-group">
                    <label for="start_date">Date de Début</label>
                    <input type="date" class="form-control" value="{{$project->Start_Date }}" name="start_date" id="start_date" placeholder="saisir la Date de Début">
                    <div style="color:red">
                        @error("start_date")
                        {{$message}}
                        @enderror
                        </div>
                  </div>

                  <div class="form-group">
                    <label for="end_date">date de fin</label>
                    <input type="date" class="form-control" value="{{$project->End_Date}}" name="end_date" id="end_date" placeholder="saisir la date de fin">
                    <div style="color:red">
                      @error("end_date")
                      {{$message}}
                      @enderror
                      </div>
                  </div>
               
        
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-info">modifier</button>
           
                    <a href="{{route('projects.index')}}" type="submit" class="btn btn-secondary">Annuler</a>
  
                </div>
              </form>
            </div>
        </div>
    </div>
    </section>
</div>

            <!-- /.card -->

@endsection
