@extends('layouts.app')

@section('title', 'Modifier informations')
@section('style', asset('css/form.css'))

@section('content')

<div class="ad-infos">
    <h1>Modifier informations</h1>
    <p>Cette page vous permet de modifier vos informations personnelles.
    </p>
</div>

<!-- Formulaire d'ajout d'une nouvelle annonce -->
<div class="form">
    <form class="needs-validation" action="{{ route('editUser') }}" method="post" enctype="multipart/form-data" novalidate>
        @csrf
        <div class="form-group">
            <label>Nom</label>
            <input type="text" name="nom" class="form-control" value="{{$user->nom}}" required>
        </div>
        <div class="form-group">
            <label>Prénom</label>
            <input type="text" name="prenom" class="form-control" value="{{$user->prenom}}" required>
        </div>
        <div class="form-group">
            <label>Ville</label>
            <input type="text" name="ville" class="form-control" value="{{$user->ville}}" required>
        </div>
        <div class="form-group">
            <label>Adresse</label>
            <input type="text" name="adresse1" class="form-control" value="{{$user->adresse1}}" required>
        </div>
        <div class="form-group">
            <label>Description</label>
            <input type="textarea" name="description" class="form-control" value="{{$user->description}}">
        </div>

        <div class="form-after">
            <button type="submit" class="btn btn-primary blue-back row">ENREGISTRER<i class="fa fa-chevron-right fa-lg blue"></i></button>
        </div>
    </form>
</div>

@section('script', asset('js/editUser.js'))
@endsection