<!DOCTYPE html>
<html lang="en">
@include('templates.head')
<body>


<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    
@include('templates.navbar')
@include('templates.sidebar')
    
    
 @yield('section')



 </div>
@include('templates.scripts')
@include('templates.footer')
</body>
</html>