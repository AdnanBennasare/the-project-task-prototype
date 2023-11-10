<!DOCTYPE html>
<html lang="en">
@include('templates.head')
<body>


<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    
@include('templates.navbar')
@include('templates.sidebar')



     <!-- Alert for success message -->
     @if(session('success-login'))

     <div class="content-wrapper">
     
        <div class="alert alert-success mx-1 my-2">
            {{ session('success-login') }}
        </div>

</div>
    @endif
 


@yield('section')


</div>
 @include('templates.scripts')
 @include('templates.footer')
</body>
</html>