<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="POST" action="{{ route('password.email') }}">
        @csrf

      <div class="card-body">

            <div class="form-group">
           
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="email" value="{{old('email')}}" required autofocus />
                @if($errors->has('email'))
                 <div class="alert alert-danger mt-2">
                    {{ $errors->first('email') }}
                </div>
                @endif   
          </div>

      </div>
      <!-- /.card-body -->
        <div class="card-footer">

        <button class="btn btn-primary">
            Email Password Reset Link
        </button>
        
    </div>

    </form>
  </div>











