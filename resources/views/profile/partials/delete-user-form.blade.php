   <!-- Main content -->
   <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- jquery validation -->
          <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-title"> <strong> Supprimer le compte </strong></h3>
            </div>
            <div class="card-body">
              Une fois votre compte supprimé, toutes ses ressources et données seront définitivement supprimées. Avant de supprimer votre compte, <br>
              Veuillez télécharger toutes les données ou informations que vous souhaitez conserver.
              <x-input-error :messages="$errors->userDeletion->get('password')" />
            </div>

            <!-- /.card-header -->
            <!-- form start -->
     

     <div class="card-footer">
       <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmModal">Supprimer le compte</button>
     </div>
          </div>
          <!-- /.card -->
          </div>

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->


   



  <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true"  name="confirm-user-deletion">
      <div class="modal-dialog">
          <div class="modal-content">
              <form method="post" action="{{ route('profile.destroy') }}">
                  @csrf
                  @method('delete')

                  <div class="modal-header">
                      <h2 class="modal-title" id="confirmModalLabel">Are you sure you want to delete your account?</h2>
                  </div>

                  <div class="modal-body">
                      <p class="mt-1 text-sm text-muted">
                          Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.
                      </p>

                      <div class="mb-3">
                          <label for="password" class="form-label sr-only">Password</label>
                          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                      </div>

                      <x-input-error :messages="$errors->userDeletion->get('password')" class="text-danger" />

                  </div>

                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-danger">Delete Account</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
