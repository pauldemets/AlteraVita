@extends('layouts.app')

@section('title', 'Propositions')
@section('style', asset('css/form.css'))
@section('content')

<div class="ad-infos">
  <h1>Liste de propositions de l'annonce {{$produit->nom}}</h1>
  <p>Vous pouvez retrouver ici toutes les propositions de réparation de l'annonce en question.</p>
</div>

<div class="form">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Date</th>
        <th scope="col">Utilisateur</th>
        <th scope="col">Prix</th>
        <th scope="col">Valider ?</th>
      </tr>
    </thead>
    <tbody>
      @foreach($reparations as $reparation)
      <tr>
        <th scope="row">{{$reparation->date}}</th>
        <td><a href="{{ route('userDetails', ['id'=>$reparation->id_utilisateur]) }}">{{$reparation->utilisateur->prenom}} {{$reparation->utilisateur->nom}}</a></td>
        <td>{{$reparation->prix}}</td>
        <td>
          <form method="POST" action="{{ route('validateProposition', ['id'=>$reparation->id_reparation]) }}">
            @csrf
            <div class="form-group">
              <button type="submit" class="btn btn-success"><i class="fas fa-check"></i></button>
            </div>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>



@section('script', asset('js/user.js'))
@endsection