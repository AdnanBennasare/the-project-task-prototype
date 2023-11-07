<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Document</title>
</head>


<body>
<div class="container">
    @if (Route::has('login'))
    <div class="float-right mx-5 my-5">
        @auth
            <a href="{{ url('/dashboard') }}" class="btn btn-info">Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="btn btn-primary" style="margin-right: 10px;">Log in</a>

            {{-- @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn btn-success">Register</a>
            @endif --}}
        @endauth
    </div>
@endif

</div>
</body>
</html>