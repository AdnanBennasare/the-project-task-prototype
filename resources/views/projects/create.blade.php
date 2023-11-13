@extends('dashboard')
@section('section')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ajouter Un Projet</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">créer un projet</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{route('projects.store')}}">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="Name">Nom du Projet</label>
                    <input type="text" class="form-control" value="{{ old('name') }}" name="name" id="Name" placeholder="saisir le nom du projet">
                    <div style="color:red">
                        @error("name")
                        {{$message}}
                        @enderror
                        </div>
                  </div>

                  <div class="form-group">
                    <label for="description">Description du Projet</label>
                    <input type="text" class="form-control" value="{{ old('description') }}" id="description" name="description" placeholder="saisir la description du projet">
                    <div style="color:red">
                        @error("description")
                        {{$message}}
                        @enderror
                        </div>
                    
                  </div>
               

                  <div class="form-group">
                    <label for="start_date">Date de Début</label>
                    <input type="date" class="form-control" value="{{ old('start_date') }}" name="start_date" id="start_date" placeholder="saisir la Date de Début">
                    <div style="color:red">
                        @error("start_date")
                        {{$message}}
                        @enderror
                        </div>
                  </div>

                  <div class="form-group">
                    <label for="end_date">date de fin</label>
                    <input type="date" class="form-control" value="{{ old('end_date') }}" name="end_date" id="end_date" placeholder="saisir la date de fin">
                    <div style="color:red">
                      @error("end_date")
                      {{$message}}
                      @enderror
                      </div>
                  </div>
               
        
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Ajouter le Projet</button>
           
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
