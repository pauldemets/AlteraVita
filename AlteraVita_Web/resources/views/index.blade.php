@extends('layouts.app')

@section('title', 'Accueil')

@section('content')

@if (session('addAnnonce'))
<div class="alert alert-success alert-dismissable col-md-2" role="alert">
    Annonce ajoutée !
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <br>
    <a href="{{ route('annonceDetails', ['id'=>$annonce->first->id_annonce]) }}">Voir l'annonce</a>
</div>
@endif

@if (session('login'))
<div class="alert alert-success alert-dismissable col-md-2" role="alert">
    Annonce ajoutée !
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="promo">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ul>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="img/tree.jpg" alt="Colline">
                <div class="carousel-caption">
                    <h3>Faîtes un geste pour l'environnement en donnant une nouvelle vie à vos appareils
                        cassés&nbsp;!</h3>
                    <button>
                        <span class="row">
                            <span class=" col-9 col-md-9 col-sm-9 p-0 mb-2 mt-2 align-self-center">Découvrir</span>
                            <i class="fas fa-chevron-right col-3 col-md-3 col-sm-3 p-0 m-0 align-self-center blue"></i>
                        </span>
                    </button>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="img/brokenPhone.jpeg" alt="Telephone cassé">
                <div class="carousel-caption">
                    <h3>Vous faites de la place dans vos placards en vendant vos appareils inutilisés ou cassés
                        !</h3>
                    <button>
                        <span class="row">
                            <span class=" col-9 col-md-9 col-sm-9 p-0 mb-2 mt-2 align-self-center">Découvrir</span>
                            <i class="fas fa-chevron-right col-3 col-md-3 col-sm-3 p-0 m-0 align-self-center blue"></i>
                        </span>
                    </button>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="img/background_yellow.jpg" alt="tablette tactile">
                <div class="carousel-caption">
                    <h3>Vous avez la possibilité de faire réparer votre appareil cassé par des particuliers ou
                        des professionnels !</h3>
                    <button>
                        <span class="row">
                            <span class=" col-9 col-md-9 col-sm-9 p-0 mb-2 mt-2 align-self-center">Découvrir</span>
                            <i class="fas fa-chevron-right col-3 col-md-3 col-sm-3 p-0 m-0 align-self-center blue"></i>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
</div>

<div class="ads">
    <p>Dernières annonces</p>
    <div class="boxes">
        @php ($a = 0)
        @foreach($annonce as $key => $value)
        @if($a != 3)
        <div class="box">
            @php($first = false)
            @foreach($value->produit->photos as $photo)
            @if($first == false)
            <img src="{{ URL::to('/') }}/imgs/annonces/{{ $photo ->url }}" alt="pc-cassé" class="img-ad">
            @php($first=true)
            @endif
            @endforeach
            @php($first=false)
            <p>{{ $value->produit->nom }}</p>
            @if($value->prix != null)
            <p>{{ $value->prix }} €</p>
            @else
            <p>À réparer</p>
            @endif
            <hr>
            <button class="btn" onclick="window.location.href = '{{ route('annonceDetails', ['id'=>$value->id_annonce]) }}';">Voir l'annonce<img src="img/arrow-right.png" class="arrow" alt="arrow"></button>
        </div>
        @php($a++)
        @endif
        @endforeach
    </div>

</div>

<div class="tests">
    <p>Ils ont testé pour vous</p>
    <div class="boxes">
        <div class="box-test">
            <div class="stars">
                <i class="fas fa-star blue"></i>
                <i class="fas fa-star blue"></i>
                <i class="fas fa-star blue"></i>
                <i class="fas fa-star blue"></i>
                <i class="fas fa-star"></i>
            </div>
            <p>Publié le 06/11/19</p>
            <hr>
            <p>"Très beau site je recommande"</p>
            <p>P.Didier</p>
        </div>
        <div class="box-test">
            <div class="stars">
                <i class="fas fa-star blue"></i>
                <i class="fas fa-star blue"></i>
                <i class="fas fa-star blue"></i>
                <i class="fas fa-star blue"></i>
                <i class="fas fa-star blue"></i>
            </div>
            <p>Publié le 08/11/19</p>
            <hr>
            <p>"Ce site est génial, je suis passionné de réparation et j'ai l'occasion d'exercer ici facilement
                !"</p>
            <p>Paulo</p>
        </div>
        <div class="box-test">
            <div class="stars">
                <i class="fas fa-star blue"></i>
                <i class="fas fa-star blue"></i>
                <i class="fas fa-star blue"></i>
                <i class="fas fa-star blue"></i>
                <i class="fas fa-star"></i>
            </div>
            <p>Publié le 09/11/19</p>
            <hr>
            <p>"pratique"</p>
            <p>AlexAllezOL</p>
        </div>
    </div>
</div>

<div class="form-mail">
    <p>Ne manquez plus rien de notre actualité, abonnez-vous : </p>
    <form id="mc-embedded-subscribe-form" action="https://gmail.us20.list-manage.com/subscribe/post?u=8459dec86c1009cd12a55ba03&amp;amp;id=3bed61517d" method="post" target="_blank">
        <div class="form-row">
            <div class="col-7 mb-md-0 mb-sm-0 offset-1"><input class="form-control form-control-lg" type="email" placeholder="Entrez votre adresse email..." name="EMAIL"></div>
            <div class="col-3 "><button class="btn btn-primary btn-block btn-lg blue-back" type="submit" value="Subscribe">S'abonner</button></div>
        </div>
    </form>
    <p>* pas de spam</p>
</div>

@section('script',asset('js/home.js'))
@endsection