@extends('dashboard')
@section('section')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ajouter des tâches au projet</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="">
            <!-- general form elements -->
            <div class="card card-success">
              <div class="card-header">
              <h3 class="card-title">Créer une tâche pour le projet <strong>"{{$projectName}}"</strong>.</h3>
              </div>
              <!-- .card-header -->
              <!-- form start -->
              <form method="post" action="{{route('tasks.store')}}">
                @csrf
                <div class="card-body">
                    <input type="hidden" value="{{$projectId}}" name="project_id">
                  <div class="form-group">
                    <label for="title">Titre du tâche</label>
                    <input type="text" class="form-control" value="{{ old('title') }}" name="title" id="title" placeholder="saisir le Titre du tâche">
                    <div style="color:red">
                        @error("title")
                        {{$message}}
                        @enderror
                        </div>
                  </div>

                  <div class="form-group">
                    <label for="description">Description du tâche</label>
                    <input type="text" class="form-control" value="{{ old('description') }}" id="description" name="description" placeholder="saisir un Description">
                    <div style="color:red">
                        @error("description")
                        {{$message}}
                        @enderror
                        </div>                   
                  </div>
               
               
        
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-success">créer le task</button>
           
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
