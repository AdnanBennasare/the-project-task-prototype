@extends('InscreptionsPage')
 @section('section')
<div class="container" style="margin-top: 10%;">
  <div class="row h-100 justify-content-center align-items-center">
    <div class="card card-primary col-md-6">
      <div class="card-header">
        <h3 class="card-title">login</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form method="POST" action="{{ route('login') }}">
          @csrf
  
        <div class="card-body">
  
              <div class="form-group">          
                  <label for="email">Email</label>
                  <input type="email" name="email" id="email" class="form-control" placeholder="email" value="{{old('email')}}"  required autofocus autocomplete="username" />
                  @if($errors->has('email'))
                   <div class="text-danger">
                      {{ $errors->first('email') }}
                  </div>
                  @endif   
            </div>
  
  
  
            <div class="form-group">
             
              <label for="password">Password</label>
              <input type="password" name="password" id="password" class="form-control" placeholder="Password" required autocomplete="new-password" />
              @if($errors->has('password'))
               <div class="text-danger">
                  {{ $errors->first('password') }}
              </div>
              @endif   
        </div>
  
          <!-- Remember Me -->
          <div class="form-group">
              <label for="remember_me">
                  <input id="remember_me" type="checkbox" name="remember">
                  <span class="ml-2 text-sm text-gray-600">remeber me</span>
              </label>
          </div>
          <button class="btn btn-primary w-100">
            Log in
         </button>
    
        </div>
        <!-- /.card-body -->
  
  
        <div class="card-footer">
          @if (Route::has('password.request'))
              <a class="" href="{{ route('password.request') }}">
                  Forgot your password?
              </a>
          @endif
  
          
      </div> 
      </form>
    </div>
  </div>

</div>

@endsection



 