   <!-- Main content -->
   <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- jquery validation -->
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title"> <strong> Mettre à jour le mot de passe </strong></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
     
                
    <form method="post" action="{{ route('password.update') }}" id="quickForm">
        @csrf
        @method('put')


              <div class="card-body">
                <p>Assurez-vous que votre compte utilise un mot de passe long et aléatoire pour rester sécurisé.</p>


                <div class="form-group">
                  <label for="current_password">mot de passe actuel</label>
                  <input type="password" name="current_password" class="form-control" id="current_password" placeholder="mot de passe actuel" autocomplete="current-password">
                <x-input-error :messages="$errors->updatePassword->get('current_password')"  />
                </div>




                <div class="form-group">
                  <label for="password">nouveau mot de passe</label>
                  <input type="password" name="password" class="form-control" id="password" placeholder="nouveau mot de passe" autocomplete="new-password" >
                  <x-input-error :messages="$errors->updatePassword->get('password')" />

                </div>


        <div class="form-group">
            <label for="password_confirmation">confirmation du mot de passe</label>
            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="confirmation du mot de passe" autocomplete="new-password" >
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" />
          </div>

          <div class="flex items-center gap-4">

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-success"
                >{{ __('Saved.') }}</p>
            @endif
        </div>

         
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-success">Modifier le mot du pass</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
          </div>
        <!--/.col (left) -->
        <!-- right column -->

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->


