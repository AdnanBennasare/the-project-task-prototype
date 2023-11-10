@extends('dashboard')
@section('section')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ajouter un Membre</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
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
                <h3 class="card-title">Ajouter un Membre</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{ route('members.store') }}">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="Name">le nom de Member</label>
                    <input type="text" class="form-control" value="{{ old('name') }}" name="name" id="Name" placeholder="Enter Project Name">
                    <div style="color:red">
                        @error("name")
                        {{$message}}
                        @enderror
                        </div>
                  </div>
                  <input type="hidden" value="member" name="role">

                  <div class="form-group">
                    <label for="email">L'email de Member</label>
                    <input type="text" class="form-control" value="{{ old('email') }}" id="email" name="email" placeholder="Enter L'email de Member">
                    <div style="color:red">
                        @error("email")
                        {{$message}}
                        @enderror
                        </div>
                    
                  </div>
               
                  <div class="form-group">            
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required autocomplete="new-password" />
                    @if($errors->has('password'))
                     <div class="alert alert-danger mt-2">
                        {{ $errors->first('password') }}
                    </div>
                    @endif   
              </div>
        
        
              <div class="form-group">                  
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="password_confirmation" value="{{old('password_confirmation')}}" required autocomplete="new-password" />
                @if($errors->has('password_confirmation'))
                 <div class="alert alert-danger mt-2">
                    {{ $errors->first('password_confirmation') }}
                </div>
                @endif   
          </div>
               
        
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Ajouter Un membre</button>
           
                    <a href="{{route('members.index')}}" type="submit" class="btn btn-secondary">Annuler</a>
  
                </div>
              </form>
            </div>
        </div>
    </div>
    </section>
</div>

            <!-- /.card -->

@endsection
