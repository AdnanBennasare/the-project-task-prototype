<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">reset password</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

      <div class="card-body">
        <div class="form-group">
           
  <!-- Password Reset Token -->
  <input type="hidden" name="token" value="{{ $request->route('token') }}">
        </div>
        <!-- Email Address -->

            <div class="form-group"> 
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="email" value="{{old('email', $request->email)}}" required autofocus autocomplete="username" />
                @if($errors->has('email'))
                 <div class="alert alert-danger mt-2">
                    {{ $errors->first('email') }}
                </div>
                @endif   
          </div>


        <!--  password -->

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
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="password_confirmation" required autocomplete="new-password" />
        @if($errors->has('password_confirmation'))
         <div class="alert alert-danger mt-2">
            {{ $errors->first('password_confirmation') }}
        </div>
        @endif   
  </div>

  
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">reset password</button>
      </div>
    </form>
  </div>
  <!-- /.card -->
  