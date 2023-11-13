@extends('dashboard')
@section('section')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-6">
                  <h1>Profile</h1>
                </div>  
              </div>
            </div><!-- /.container-fluid -->
          </section>
 
  
                    @include('profile.partials.update-profile-information-form')
        
  
                    @include('profile.partials.update-password-form')
       

       
                    @include('profile.partials.delete-user-form')
    
</div>
@endsection