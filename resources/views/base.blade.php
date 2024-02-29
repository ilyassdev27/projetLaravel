<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <!-- Styles -->
    <link rel="stylesheet" href="{{url('css/style.css')}}">
</head>
    <div  class="container">

        @if($errors->any())
        
         <div class="alert alert-danger" role="alert">
            <strong>Errors</strong>
            <ul >
                 @foreach ($errors->all() as $error)
                <li >{{ $error }}</li>
                @endforeach
            </ul>
         </div>
             
       
         @endif 
        {{-- @yield('content') --}}
    </div>
    <body class="antialiased">
        <div class="relative py-4 px-6">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid " style="background-color: ">
    <a class="navbar-brand" href="{{ url('/') }}"> <img class="logo" style="width: 90px; height: 60px;" src="{{ asset('images/LOGO.PNG') }}" alt="Logo" style=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>

        <div class="dropdown">
          <button class="btn btn-light dropdown-toggle" type="button" id="categoryDropdown" data-bs-toggle="dropdown" aria-expanded="false">
              Products
          </button>
          <ul class="dropdown-menu" aria-labelledby="categoryDropdown">
              <li><a class="dropdown-item" href="/produits/Chats">Chats</a></li>
              <li><a class="dropdown-item" href="/produits/Chiens">Chiens</a></li>
              <li><a class="dropdown-item" href="/produits/Oiseaux">Oiseaux</a></li>
              <li><a class="dropdown-item" href="/produits/Autres">Autres</a></li>
          </ul>
      </div>
      
       
        <li class="nav-item">
          <a class="nav-link" href="/cart">cart</a>
        </li>
     
       
        <li class="nav-item">
          <a class="nav-link" href="#about-section">About</a>
      </li>

        @if(Auth::user())

              @if(Auth::user()->role==='ADMIN')
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('index')}}">products</a>
              </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('create')}}">new Product</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="{{ route('categories.index')}}" tabindex="-1" aria-disabled="true">category</a>
                </li>
                <li class="nav-item"> 
                  <a class="nav-link" href="/email">Send Email</a> 
              </li>
               
             @endif
        @if(Auth::user()->role==='USER')
                {{-- <li class="nav-item">
                        <a class="nav-link" href="/espaceclient">Espace Client</a>
                </li> --}}
                <li class="nav-item">
                  <a class="nav-link " href="/espaceclient" tabindex="-1" aria-disabled="true">Espaceclient</a>
                </li>
        @endif
        <li class="nav-item active">

            <form action="/logout" method="POST">
              @csrf
              <button type="submit" class="btn" href="/logout">Deconnexion </button>
            </form>
        </li>
        @else
        <li class="nav-item">
            <a class="nav-link" href="/login">Se Connecter</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/register">S'inscrire</a>
        </li>
    @endif
       
      </ul>
    </div>
  </div>
</nav>
        </div>
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter light:bg-gray-900 selection:bg-red-500 selection:text-white">
        
     
        
        </div>
        @yield('content')
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        @yield('scripts')
    {{-- </body> --}}

</body>
</html>