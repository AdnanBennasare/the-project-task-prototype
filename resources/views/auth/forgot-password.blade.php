@extends('InscreptionsPage')
@section('section')

  <div class="hold-transition login-page">
    <div class="login-box">
      <div class="card card-outline card-primary">
        <div class="login-logo">
          <a><b>Soli</b>coders</a>
        </div>
        <div class="card-body">
          <p class="login-box-msg">Vous avez oublié votre mot de passe? Ici vous pouvez facilement récupérer un nouveau mot de passe.</p>
          <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="input-group mb-1">
              <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="{{old('email')}}" required autofocus />
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="mb-2" >
              @if($errors->has('email'))
              <div class="text-danger">
                 {{ $errors->first('email') }}
             </div>
             @endif 

            </div>
         
   
            <div class="row">
              <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block">Réinitialiser votre mot de passe</button>
              </div>
              <!-- /.col -->
            </div>
          </form>
          <p class="mt-3 mb-1">
            <a href="{{route('login')}}">connecter</a>
          </p>
        </div>
        <!-- /.login-card-body -->
      </div>
    </div>
    <!-- /.login-box -->
    
    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
  </div>
    @endsection











