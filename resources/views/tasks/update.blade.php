@extends('dashboard')
@section('section')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Modifier tâche</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="">
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
              <h3 class="card-title">éditer la tâche</h3>
              </div>
              <!-- .card-header -->
              <!-- form start -->
              <form method="post" action="{{route('tasks.update', $task->id)}}">
                @csrf 
                @method("PUT")
                <div class="card-body">
                <input type="hidden" name="project_id" value="{{$task->Project_Id}}">
                  <div class="form-group">
                    <label for="title">Titre du tâche</label>
                    <input type="text" class="form-control" value="{{$task->Title}}" name="title" id="title" placeholder="saisir le Titre du tâche">
                    <div style="color:red">
                        @error("title")
                        {{$message}}
                        @enderror
                        </div>
                  </div>

                  <div class="form-group">
                    <label for="description">Description du tâche</label>
                    <input type="text" class="form-control" value="{{$task->Description}}" id="description" name="description" placeholder="saisir la Description du tâche">
                    <div style="color:red">
                        @error("description")
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
