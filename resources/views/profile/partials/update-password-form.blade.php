   <!-- Main content -->
   <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- jquery validation -->
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title"> <strong> Update Password </strong></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
     
                
    <form method="post" action="{{ route('password.update') }}" id="quickForm">
        @csrf
        @method('put')


              <div class="card-body">
                <p>Ensure your account is using a long, random password to stay secure.</p>


                <div class="form-group">
                  <label for="current_password">Current Password</label>
                  <input type="password" name="current_password" class="form-control" id="current_password" placeholder="current password" autocomplete="current-password">
                <x-input-error :messages="$errors->updatePassword->get('current_password')"  />
                </div>




                <div class="form-group">
                  <label for="password">New Password</label>
                  <input type="password" name="password" class="form-control" id="password" placeholder="new-password" autocomplete="new-password" >
                  <x-input-error :messages="$errors->updatePassword->get('password')" />

                </div>


        <div class="form-group">
            <label for="password_confirmation">password confirmation</label>
            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="password confirmation" autocomplete="new-password" >
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
                <button type="submit" class="btn btn-success">Submit</button>
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






{{-- 
<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="current_password" :value="__('Current Password')" />
            <x-text-input id="current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password" :value="__('New Password')" />
            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section> --}}
