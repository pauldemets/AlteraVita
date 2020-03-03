@extends('layouts.app')

@section('title', 'Annonces')
@section('style', asset('css/products.css'))

@section('content')

<div class="container">
    <div class="ArianeFile">
        <p> <a href="{{route('home')}}">Accueil</a> / Annonces</p>
  </div>
  <!--Formulaire du filtre des annonces-->
  <div class="searchbox">
  <form action="{{ route('search')}}" class="form" method="GET">
      <div class="input-group mb-3" id="search-annonce-bar">
        <input type="text" class="form-control" name="search" placeholder="Ordinateur, Tablette, ..." aria-label="Rechercher">
        <div class="input-group-append">
          <button class="btn" type="submit"><i class="fas fa-search"></i></button>
        </div>
      </div>
  </form>
      
      <div class="form-row">
        <div class="form-group col-md-6">
          <label class="sr-only" for="marque">Marque</label>
          <span class="chevron"></span>
          <select id="brand" name="brand" class="form-control">
            <option disabled selected>Marque</option>
            <option>Apple</option>
            <option>Samsung</option>
          </select>
        </div>
        <div class="form-group col-md-6">
          <label class="sr-only" for="etat">&Eacute;tat</label>
          <span class="chevron"></span>
          <select id="state" name="state" class="form-control">
            <option disabled selected>&Eacute;tat</option>
            <option>Neuf</option>
            <option>Tr&egrave;s Bon</option>
            <option>Bon</option>
            <option>Satisfaisant</option>
            <option>Mauvais</option>
            <option>Tr&egrave;s Mauvais</option>
          </select>
        </div>
      </div>
      <!--Filtre avec le prix minimun et maximum-->
      <div class="form-row prix">
        <div class="input-group col-md-4">
          <label class="sr-only" for="price_from">De</label>
          <div class="input-group-prepend">
            <span class="input-group-text">€</span>
          </div>
          <input type="number" id="price_from_input" class="form-control" aria-label="Prix Min" placeholder="Min">
        </div>
        <div class=" col-md-2 text-center">
          <p> - </p>
        </div>
        <div class="input-group col-md-4">
          <label class="sr-only" for="price_to">&Agrave;</label>
          <div class="input-group-prepend">
            <span class="input-group-text">€</span>
          </div>
          <input type="number" id="price_to_input" aria-label="Prix Max" class="form-control" placeholder="Max">
        </div>
      </div>
      <!--Fin du Filtre avec le prix minimun et maximum-->
      <div id="filter" class="d-flex h-75 flex-wrap flex-row ml-1 mr-1"></div>
  </div>
  <!-- Fin du formulaire-->
  <!--Affichage des annonces-->
  <div class="annonces">
    <ul class="nav nav-tabs" id="annonces-tab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="nav-achat-tab" data-toggle="tab" href="#nav-achat" role="tab"
          aria-controls="nav-achat" aria-selected="true">Acheter</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="nav-reparation-tab" data-toggle="tab" href="#nav-reparation" role="tab"
          aria-controls="nav-reparation" aria-selected="false">R&eacute;parer</a>
      </li>
    </ul>
    <div class="tab-content" id="nav-tabContent">
    <!-- Affichage des Annonces de Vente-->
      <div class="tab-pane fade show active" id="nav-achat" role="tabpanel" aria-labelledby="nav-achat-tab">
        <div class="loader d-none">
          <div class="spinner-border text-primary" role="status">
            <span class="sr-only">Chargement...</span>
          </div>
        </div>
        @if (count($annonce)>0)
          <div class="d-flex contains flex-row flex-wrap justify-content-between bg-light">
            @foreach($annonce as $key => $value)
            <div class="card">
                @if($value->produit->photos->get(0)!== null)
                <img class="card-img-top" height="265" src="{{ asset('imgs/annonces/'.$value->produit->photos->get(0)->url ) }}" alt="{{ $value->produit->nom }}">
                @endif
                <div class="card-body">
                  <h5 class="card-title">{{ $value->produit->nom }}</h5>
                  <p class="card-text"> {{ $value->prix }} €</p>
                  <a href="{{ route('annonceDetails', ['id'=>$value->id_annonce]) }}" class="btn-annonce">Voir l'annonce <i
                    class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              @endforeach 
          </div>
          @else 
            <div class="d-flex contains justify-content-center mt-5 mb-5">
                
            </div>
          @endif
          {{ $annonce->links() }}
      </div>
      <!--Fin des Annonces de Vente-->
      <!--Affichage des Annoces de Réparation-->
      <div class="tab-pane fade" id="nav-reparation" role="tabpanel" aria-labelledby="nav-reparation-tab">
        <div class="loader d-none">
          <div class="spinner-border text-primary" role="status">
            <span class="sr-only">Chargement...</span>
          </div>
        </div>
        @if (count($reparation)>0)
          <div class="d-flex contains flex-wrap flex-row justify-content-between mt-5 mb-5 bg-light ">
          @foreach($reparation as $key => $value)
            <div class="card">
              @if($value->produit->photos->get(0)!== null)
            <img class="card-img-top" height="265" src="{{ asset('imgs/annonces/'.$value->produit->photos->get(0)->url ) }}"  alt="{{ $value->produit->nom }}">
              @endif
              <div class="card-body">
                <h5 class="card-title"> {{ $value->produit->nom }} </h5>
                @if ($value->prix != null)
                <p class="card-text">{{ $value->prix }} €</p>
                @endif
                <a href="{{ route('annonceDetails', ['id'=>$value->id_annonce]) }}" class="btn-annonce">Voir l'annonce <i class="fas fa-wrench"></i></a>
              </div>
            </div>
            @endforeach
          </div>
          @else 
            <div class="d-flex contains justify-content-center mt-5 mb-5">
                
            </div>
          @endif
          {{ $reparation->links() }}
      </div>
      <!--Fin des Annoces de Réparation-->
  </div>
  <!--Fin de l'affichage des Annonces-->
</div>
@section('script', asset('js/scriptAnnonce.js'))
@endsection