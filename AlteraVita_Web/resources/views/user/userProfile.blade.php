@extends('layouts.app')

@section('title', 'Profil utilisateur')
@section('style', asset('css/user.css'))

@section('content')

<!-- Div qui regroupe les informations de l'utilisateur -->
<div class="infosUser">
    <img src="{{ asset('img/icons8-person-64.png') }}" alt="Photo utilisateur" id="userImg">
    <p>{{$user->prenom}} {{$user->nom}}</p>
    <p><i class="fas fa-search-location"></i>{{$user->ville}}</p>
    <p><i class="fas fa-question"></i>{{$user->description}}</p>
    <div class="btn-left">
        <a href="{{ route('editUser')}}">
            <button class="blue-back">Modifier<i class="fa fa-chevron-right fa-lg blue"></i></button>
        </a>
    </div>
    <div class="tabsAvis">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active buttonNav" id="avisVendeur-tab" data-toggle="tab" href="#avisVendeur" role="tab" aria-controls="avisVendeur" aria-selected="true">Avis vendeur</a>
            </li>
            <li class="nav-item">
                <a class="nav-link buttonNav" id="avisReparateur-tab" data-toggle="tab" href="#avisReparateur" role="tab" aria-controls="avisReparateur" aria-selected="false">Avis réparateur</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active row" id="avisVendeur" role="tabpanel" aria-labelledby="avisVendeur-tab">
                <div class='line'>
                    <div class="box-avis">
                        <div class="stars">
                            <i class="fas fa-star blue"></i>
                            <i class="fas fa-star blue"></i>
                            <i class="fas fa-star blue"></i>
                            <i class="fas fa-star blue"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p>Publié le 09/11/19</p>
                        <hr>
                        <p>"Vendeur efficace et agréable"</p>
                        <p>AlexAllezOL</p>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="avisReparateur" role="tabpanel" aria-labelledby="avisReparateur-tab">

            </div>
        </div>
    </div>
</div>

<!-- liste des annonces postées par l'utilisateur -->
<div class="ads-user">
    <h2>Gérer mes annonces </h2>
    <div class="line">
        @foreach($user->annonces as $key => $value)
        <div class="ad">
            @php($first = false)
            @foreach($value->produit->photos as $photo)
            @if($first == false)
            <img class="ad-img-top" height="265" src="{{ URL::to('/') }}/imgs/annonces/{{ $photo ->url }}" alt="image produit">
            @php($first=true)
            @endif
            @endforeach
            @php($first=false)
            <div class="ad-details">
                <h5>{{$value->produit->nom}}</h5>
                @if($value->prix != null)
                <p>{{ $value->prix }} €</p>
                <br>
                @else
                <p>À réparer</p>
                @php($valide=false)
                @foreach($value->produit->reparations as $reparation)
                @if($value->produit->id_produit == $reparation->id_produit)
                @if($reparation->estvalidee)
                @php($valide=true)
                @endif
                @endif
                @endforeach
                @if($valide != true)
                <a href="{{ route('propositionsReparation', ['id'=>$value->id_annonce]) }}">Accéder aux propositions <i class="fas fa-arrow-circle-right"></i></a>
                <br>
                @else
                <p class="mb-0">Réparation : en cours</p>
                @endif
                @endif
                <a href="{{ route('annonceDetails', ['id'=>$value->id_annonce]) }}">Voir l'annonce <i class="fas fa-arrow-circle-right"></i></a>
                <br>

                <form method="POST" action="{{ route('deleteAd', ['id'=>$value->id_annonce]) }}">
                    @csrf
                    <div class="form-group">
                        <button type="submit" class="btn btn-danger delete-user float-right mb-3 ml-3"><i class="fas fa-times"></i></button>
                    </div>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@section('script', asset('js/user.js'))
@endsection