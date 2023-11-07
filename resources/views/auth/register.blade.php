{{-- @extends('InscreptionsPage')
 @section('section')
  <div class="container " style="margin-top: 10%;">
    <div class="row h-100 justify-content-center align-items-center">
      <div class="card card-primary col-md-6">
        <div class="card-header">
          <h3 class="card-title">register</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('register') }}">
          @csrf
  
          <div class="card-body">
            <!-- Form fields go here -->
            <div class="form-group">
           
              <label for="name">Name</label>
              <input type="text" name="name" id="name" class="form-control" placeholder="name" value="{{old('name')}}" required autofocus autocomplete="name" />
              @if($errors->has('name'))
               <div class="alert alert-danger mt-2">
                  {{ $errors->first('name') }}
              </div>
              @endif
  
  
          </div>
              <div class="form-group">
             
                  <label for="email">Email</label>
                  <input type="email" name="email" id="email" class="form-control" placeholder="email" value="{{old('email')}}" required autocomplete="username" />
                  @if($errors->has('email'))
                   <div class="alert alert-danger mt-2">
                      {{ $errors->first('email') }}
                  </div>
                  @endif   
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
          <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="password_confirmation" value="{{old('email')}}" required autocomplete="new-password" />
          @if($errors->has('password'))
           <div class="alert alert-danger mt-2">
              {{ $errors->first('password_confirmation') }}
          </div>
          @endif   
    </div>
    <button type="submit" class="btn btn-primary w-100">Register</button>

          </div>
          <!-- /.card-body -->
        <div class="card-footer">
        <a href="{{ route('login') }}">already have an acount loging</a>
      </div>
        </form>
      </div>
    </div>
  </div>
  @endsection --}}