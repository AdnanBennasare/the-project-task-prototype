<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Requise</title>
    <link rel="icon" href="{{asset("dist\css\imgs\logoedges.png")}}" type="image/png">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="text-center">
        <h1 class="mb-4">Connexion Requise</h1>
        <p>Vous devez d'abord vous connecter pour voir les tâches et les projets.</p>
        @if (Route::has('login'))
            <div class="mt-4">
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn text-black border border-dark">Tableau de bord</a>
                @else
                    <a href="{{ route('login') }}" class="btn text-black border border-dark">Se connecter</a>                
                @endauth
            </div>
        @endif
    </div>
</div>

<!-- Bootstrap JS and Popper.js (required for Bootstrap's JavaScript) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
