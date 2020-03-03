<header>
        <nav class="navbar navbar-light bg-white navbar-expand-lg" id="header-nav">
            <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('img/logoweb.png') }}" alt="Logo pc" id="logo-desktop"><img
                    src="{{ asset('img/logo.svg') }}" alt="Logo pc" id="logo-mobile"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="btn blue-back" id="add-ad" href="{{ route('addAnnonce') }}">
                            <div class="row">
                                <p class=" col-8 col-md-8 col-sm-8 align-self-center ml-3 p-0 mb-0">Poster une
                                    annonce</p>
                                <i class="fas fa-plus col-1 col-md-1 col-sm-1 align-self-center p-0 ml-2"></i>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}"><i class="fas fa-home"></i><br
                                class="br-pc">Accueil</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('showAnnonces') }}#acheter"><i class="fas fa-euro-sign"></i><br
                                class="br-pc">Acheter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('showAnnonces') }}#reparer"><i class="fas fa-tools"></i><br class="br-pc">Réparer</a>
                    </li>

                    <div class="dropdown">


                    @auth
                        <div class="dropdown">
                            <li data-toggle="dropdown" class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-user-alt"></i><br class="br-pc">Mon compte</a>
                            </li>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-item">
                                        <a href="{{ route('userProfile', ['id'=>Auth::id()]) }}">Mon profil</a>
                                    </div>
                                    <div class="dropdown-item">
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                          document.getElementById('logout-form').submit();">Deconnexion
                                        </a>
     
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                             @csrf
                                        </form>
                                    </div>
                                </div>
                        </div>
                    @endauth
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-user-alt"></i><br class="br-pc">Connexion</a>
                        </li>
                    @endguest


                </ul>
            </div>
        </nav>
    </header>