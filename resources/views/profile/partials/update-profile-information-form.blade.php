   <!-- Main content -->
   <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- jquery validation -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title"> <strong> Informations de Profil </strong></h3>
            </div>
            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                @csrf
            </form>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="{{ route('profile.update') }}" id="quickForm">
                @csrf
                @method('patch')

              <div class="card-body">
                <p>Mettez à jour les informations de profil et l’adresse e-mail de votre compte.</p>
                <div class="form-group">
                    <label for="name">Le Nom</label>         
                    <input type="text" name="name" class="form-control" value="{{old('name', $user->name)}}" id="name" placeholder="Enter name" required autofocus autocomplete="name" >
                    @if($errors->has('name'))
                    <div class="alert alert-danger mt-2">
                       {{ $errors->first('name') }}
                   </div>
                   @endif   
                  </div>
       

                <div class="form-group">
                  <label for="email">Adresse E-mail
                  </label>
                  <input type="email" name="email" class="form-control" id="email" value={{old('email', $user->email)}} required autocomplete="username" placeholder="Enter email">
                  @if($errors->has('email'))
                  <div class="alert alert-danger mt-2">
                     {{ $errors->first('email') }}
                 </div>
                 @endif 

                 @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                 <div>
                     <p class="text-sm mt-2 text-gray-800">
                         {{ __('Your email address is unverified.') }}
 
                         <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                             {{ __('Click here to re-send the verification email.') }}
                         </button>
                     </p>
 
                     @if (session('status') === 'verification-link-sent')
                         <p class="mt-2 font-medium text-sm text-green-600">
                             {{ __('A new verification link has been sent to your email address.') }}
                         </p>
                     @endif
                 </div>
             @endif
                 
                </div>
      
                @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-success"
                >{{ __('Saved.') }}</p>
            @endif

              </div>
              <!-- /.card-body -->
              <div class="card-footer">              
                <button type="submit" class="btn btn-primary">Enregistrer</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
          </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">

        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->

