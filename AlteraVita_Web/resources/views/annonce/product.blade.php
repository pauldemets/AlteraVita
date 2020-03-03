@extends('layouts.app')

@section('title', 'Détail')
@section('style', asset('css/detail_produit.css'))

@section('content')

<!-- Div qui contient le fil d'arianne -->
<div class="ArianeFile container">
  <p>
    <a href="{{ route('home') }}">Accueil</a> /
    <a href="{{ route('showAnnonces') }}">Annonces</a> /
    {{ $annonce->produit->nom }}
  </p>
  <hr>
</div>

<!-- Div qui regroupe les informations du produit à afficher -->
<div class="container productInfo">
  <div class="imageView">
    <div id="carouselImgsProduct" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        @foreach($annonce->produit->photos as $photo)
        <li data-target="#carouselImgsProduct" data-slide-to="{{ $loop->iteration }}"></li>
        @endforeach
      </ol>
      <div class="carousel-inner">
        @foreach($annonce->produit->photos as $photo)
        <div class="carousel-item">
          <img class="imgProduct d-block w-100" src="{{ URL::to('/') }}/imgs/annonces/{{ $photo->url }}"
            alt="productPhoto">
        </div>
        @endforeach
      </div>
      <a class="carousel-control-prev" href="#carouselImgsProduct" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselImgsProduct" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>

  <div class="content">
    <h1>{{ $annonce->produit->nom }}</h1>
    <p id="desc">
      Description : {{ $annonce->produit->description }}
    </p>
    <p>
      Postée le : {{ $annonce->date }}
    </p>
    <p id="prix">{{ $annonce->prix }}</p>

    @if($annonce->type_annonce == "reparation")
      @if(count($reparations) === 0)
        <p>Il n'y a actuellement aucune demande de réparation. Vous pouvez faire une proposition en cliquant sur le
          bouton ci-dessous.</p>
      @else
        @if($reparations->first()->estvalidee === 1)
          <p>Cette annonce est en cours de réparation.</p>
        @else
          <p>Liste des 5 dernières propositions de réparations :</p>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Utilisateur</th>
                <th scope="col">Prix</th>
                <th scope="col">Date</th>
              </tr>
            </thead>
            <tbody>
              @if(count($reparations) != null)
                @foreach($reparations as $reparation)
                <tr>
                  <td><a
                      href="{{ route('userDetails', ['id'=>$reparation->id_utilisateur]) }}">{{ $reparation->utilisateur->prenom }}
                      {{ $reparation->utilisateur->nom }}</a></td>
                  <td>{{ $reparation->prix }}</td>
                  <td>{{ $reparation->date }}</td>
                </tr>
                @endforeach
              @endif
            </tbody>
          </table>
        @endif
      @endif  
    @endif
  </div>

  <div class="row float-right {{ $annonce->type_annonce }}" id="listButtons">
    <button class="btn btnAd" id="buyButton" data-toggle="modal" data-target="#confirmationPurchase"
      data-backdrop="false">Acheter <i class="fa fa-chevron-circle-right fa-lg"></i></button>
      @if(count($reparations) > 0 and $reparations->first()->estvalidee === 1)
      <button class="btn btnAd" disabled>Réparer <i class="fa fa-chevron-circle-right fa-lg"></i></button>
      @else 
      <button class="btn btnAd" id="repareButton" data-toggle="modal" data-target="#confirmationRepair"
      data-backdrop="false">Réparer <i
        class="fa fa-chevron-circle-right fa-lg"></i></button>
      @endif
    <button class="btn btnAd" id="buyAfterRepareButton">Acheter après réparation <i
        class="fa fa-chevron-circle-right fa-lg"></i></button>
  </div>
</div>


<!-- Div qui affiche les infos sur le vendeur et les détails du produit -->
<div class="container productInfo" id="viewMoreInfos">
  <ul class="nav nav-tabs" id="tabInfos" role="tablist">
    <li class="nav-item">
      <a class="nav-link active buttonNav" id="avisVendeur-tab" data-toggle="tab" href="#p1" role="tab"
        aria-controls="avisVendeur" aria-selected="true">Détails</a>
    </li>
    <li class="nav-item">
      <a class="nav-link buttonNav" id="avisReparateur-tab" data-toggle="tab" href="#p2" role="tab"
        aria-controls="avisReparateur" aria-selected="false">Propriétaire</a>
    </li>
  </ul>

  <div class="tab-content">
    <div class="tab-pane active" id="p1">
      <h1>Détails du produit&nbsp;:</h1>
      <p><span>Etat&nbsp;: </span>{{ $annonce->produit->etat }}</p>
      <p><span>Marque&nbsp;: </span>{{ $annonce->produit->marque }}</p>
      <p><span>Année&nbsp;: </span>{{ $annonce->produit->annee }}</p>
    </div>

    <div class="tab-pane" id="p2">
      <a href="{{ route('userDetails', ['id'=>$annonce->id_utilisateur]) }}">
        <img src="{{ asset('img/icons8-person-64.png') }}" alt="userImage" id="userProfileImage">
        <span id="userName"> {{ $annonce->utilisateur->prenom}} {{ $annonce->utilisateur->nom}} </span>
      </a>
      <p>{{ $annonce->utilisateur->description}}</p>
      <br>
      <button class="btn">Contacter <i class="fa fa-chevron-circle-right fa-lg"></i></button>
    </div>
  </div>
</div>

<div class="modal fade" id="confirmationRepair" tabindex="-1" role="dialog" aria-labelledby="confirmationRepair"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      @auth
      <div class="modal-header">
        <h5 class="modal-title" id="popUpTitle">Demande de réparation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="popUpBeforePurchase">
          <p>Vous êtes sur le point de faire une demande de réparation.</p>
          <p>Veuillez indiquez ci-dessous votre rémunération souhaitée. Si un réparateur a déjà proposé une réparation
            sur l'objet, vous devez proposer une rémunération plus basse.</p>
          <p>L'utilisateur peut ou non accepter votre demande de réparation. Si il accepte, vous serez notifié de la
            suite du processus (paiement, livraison, etc..).</p>
          <br>
          <form method="POST" action="{{ route('repairAnnonce', $annonce->id_annonce) }}">
            @csrf
            <div class="form-group">
              <input type="text" class="form-control input-sm" name="prix" placeholder="Entrez votre rémunération ici..">
            </div>
            
            <div class="text-center">
              <button type="submit" class="btn btn-primary pull-right">{{ __('Proposer') }}</button>
            </div>
          </form>
        </div>

        <div id="popUpAfterPurchase">
          <h1>Votre demande a été envoyée&nbsp;!</h1>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
      </div>
      @endauth

      @guest
      <div class="modal-header">
        <h5 class="modal-title" id="popUpTitle">Demande de réparation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="popUpBeforePurchase">
          <p>Vous devez être connecté pour faire une demande de réparation.</p>
        </div>
      </div>
      @endguest
    </div>
  </div>
</div>


<!-- PopUp content -->
<div class="modal fade" id="confirmationPurchase" tabindex="-1" role="dialog" aria-labelledby="confirmationPurchase"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      @auth
      <div class="modal-header">
        <h5 class="modal-title" id="popUpTitle">Confirmation d'achat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="popUpBeforePurchase">
          <h1>Récapitulatif achat :</h1>
          <p>Prix&nbsp;: 750€</p>
          <p>Envoie&nbsp;: 3.50€</p>
          <p>Total&nbsp;: 753.50€</p>
          <br>
          <h1>Choix mode de paiement&nbsp;:</h1>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="optradio" id="paypalCheckbox">Paypal
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="optradio" id="paymentCardCheckbox">Carte de paiement
            </label>
          </div>
          <div class="alert alert-warning">
            <strong>Erreur !</strong> Veuillez choisir un moyen de paiement&nbsp;!
          </div>
        </div>

        <div id="popUpAfterPurchase">
          <h1>Votre achat est validé&nbsp;!</h1>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-primary" id="confirmPayment">Valider</button>
      </div>
      @endauth

      @guest
      <div class="modal-header">
        <h5 class="modal-title" id="popUpTitle">Achat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="popUpBeforePurchase">
          <p>Vous devez être connecté pour acheter un produit.</p>
        </div>
      </div>
      @endguest
    </div>
  </div>
</div>


@section('script', asset('js/detail_produit.js'))
@endsection