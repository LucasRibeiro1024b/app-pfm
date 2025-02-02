<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    {{-- CSS Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    {{-- Material Icons --}}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    {{-- Fonte Schibsted Grotesk--}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Schibsted+Grotesk:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    

    <link rel="stylesheet" href="/css/main/index.css">
    <link rel="stylesheet" href="/css/main/navbar.css">
    
    @stack('style')
    @stack('script')
    {{-- importa apenas os links do css e js indicados no 'content' pela diretiva 'push' --}}

</head>
<body>

    <header>
        <nav class="navbar navbar-expand navbar-light">

            <div class="collapse navbar-collapse" id="navbar">

                <a href="/dashboard" class="navbar-brand">
                    <img src="/img/logo.jpeg" alt="SF" style="border-radius: 50%">
                </a>

                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a href="/dashboard" class="nav-link">Dashboard</a>
                    </li>

                    <li class="nav-item">
                        <a href="" class="nav-link">Financeiro</a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('projects.index') }}" class="nav-link">Projetos</a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('clients.index') }}" class="nav-link">Clientes</a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('users.index') }}" class="nav-link">Usuários</a>
                    </li>
                    
                    <li class="nav-item">
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ auth()->user()->name }}
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="#">Perfil</a></li>
                              <li><form action="/logout" method="POST">
                                @csrf
                                <a href="/logout" 
                                    class="nav-link" 
                                    onclick="event.preventDefault();this.closest('form').submit();">Sair</a>
                                </form></li>
                            </ul>
                          </div>
                    </li>
                    
                </ul>
            </div>
        </nav>

    </header>

    @if(session('msg'))
        <p class="msg"> {{ session('msg') }}</p>
    @endif

    <main>
        <div class="container-fluid col-md-10">
  
            @yield('content')
            
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>