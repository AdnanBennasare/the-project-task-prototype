<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">This is a secure area of the application. Please confirm your password before continuing.</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

      <div class="card-body">

            <div class="form-group">
           
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="email" value="{{old('email')}}" required autocomplete="current-password" />
                @if($errors->has('email'))
                 <div class="alert alert-danger mt-2">
                    {{ $errors->first('email') }}
                </div>
                @endif   
          </div>
          <div class="form-group">

          @if($errors->has('password'))
          <div class="alert alert-danger mt-2">
             {{ $errors->first('password') }}
         </div>
         @endif   
        </div>

      </div>
      <!-- /.card-body -->
        <div class="card-footer">

        <button class="btn btn-primary">
            Confirm
        </button>
        
    </div>

    </form>
  </div>











