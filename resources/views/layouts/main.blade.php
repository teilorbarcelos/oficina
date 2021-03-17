<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- CSS do Google -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

        <!-- CSS do Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

        <!-- meu CSS e JS -->
        <link rel="stylesheet" href="/css/styles.css">
        <script type="text/javascript" src="/js/jquery.js"></script>
        <script type="text/javascript" src="/js/scripts.js"></script>
        <script type="text/javascript" src="/js/bootstrap.bundle.min.js"></script>

        <title>@yield('title')</title>
    </head>
    <body class="antialiased">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="collapse navbar-collapse" id="navbar">
                    <a href="/" class="navbar-brand">
                        <img src="/img/logo.png" alt="Logo do site">
                    </a>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="/" class="nav-link">Início</a>
                        </li>
                        <li class="nav-item">
                            <a href="/clients" class="nav-link">Clientes</a>
                        </li>
                        <li class="nav-item">
                            <a href="/products" class="nav-link">Produtos</a>
                        </li>
                        <li class="nav-item">
                            <a href="/providers" class="nav-link">Fornecedores</a>
                        </li>
                        <li class="nav-item">
                            <a href="/sales" class="nav-link">Vendas</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="/sales/reports" class="nav-link">Relatórios</a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="/company/show" class="nav-link">Empresa</a>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown show">
                                <a class="btn" href="#" style="margin-right: 20px;" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Opções de Usuário
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a target="_blank" class="dropdown-item" href="/user/profile">Perfil</a>
                                    <a target="_blank" class="dropdown-item" href="/register">Criar usuário</a>
                                    <form class="dropdown-item" action="/logout" method="POST">
                                        @csrf
                                        <a href="/logout" class="nav-link" onclick="event.preventDefault();
                                        this.closest('form').submit();"><ion-icon name="log-out"></ion-icon> Sair</a>
                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <main>
            <div class="container-fluid">
                <div class="row">
                    @if(session('msg'))
                        <p class="msg">{{ session('msg') }}</p>
                    @endif
                    @yield('content')
                </div>
            </div>
        </main>
        <footer>
            <p>Developed by Teilor Productions. e-mail: tsb-@live.com &copy; 2021</p>
        </footer>
        <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    </body>
</html>