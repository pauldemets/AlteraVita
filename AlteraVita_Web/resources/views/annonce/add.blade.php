@extends('layouts.app')

@section('title', 'Ajouter une annonce')
@section('style', asset('css/form.css'))

@section('content')

<div class="ad-infos">
    <h1>Poster une annonce </h1>
    <p>Vous pouvez ajouter un produit cassé. Pour cela, veuillez préciser le nom du produit, une description,
        une image ainsi que le problème à résoudre.
        <br>
        <br>
        Vous avez la possibilité de le faire réparer ou de le revendre. Dans le dernier cas, veuillez indiquer
        un prix de vente.
    </p>
</div>

<!-- Formulaire d'ajout d'une nouvelle annonce -->
<div class="form">
    <form class="needs-validation" action="{{ route('addAnnonce') }}" method="post" enctype="multipart/form-data" novalidate>
        @csrf
        <div class="form-group">
            <label>Catégorie</label>
            <br />
            <select name="intitule">
                @foreach($type as $key => $value)
                <option value="{{ $value->id_type }}" required>{{ $value->intitule }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Nom du produit</label>
            <input type="text" name="nom" class="form-control" placeholder="Entrez un nom" required>
            @error('nom')
            <span class="invalid-feedback" role="alert">
                <strong>erreur</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label>Marque</label>
            <input type="text" name="marque" class="form-control" placeholder="Entrez une marque" required>
            @error('marque')
            <span class="invalid-feedback" role="alert">
                <strong>erreur</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label>Année du produit</label>
            <input type="text" name="annee" class="form-control" placeholder="Entrez une année" required>
            @error('annee')
            <span class="invalid-feedback" role="alert">
                <strong>erreur</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label>Description du produit</label>
            <input type="text" name="description" class="form-control" placeholder="Entrez une description" required>
            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>erreur</strong>
            </span>
            @enderror
        </div>
        <div class="input-group">
            <div class="custom-file">
                <label for="photosAd">Photo(s)</label>
                <input type="file" name="photos[]" class="form-control-file" id="photosAd" multiple="multiple" required>
                @error('photos')
                <span class="invalid-feedback" role="alert">
                    <strong>erreur</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label>État</label>
            <br />
            <select name="etat">
                <option value="neuf" selected>Neuf</option>
                <option value="très bon">Très bon</option>
                <option value="bon">Bon</option>
                <option value="mauvais">Mauvais</option>
                <option value="très mauvais">Très mauvais</option>
            </select>
        </div>

        <div class="form-group" id="probleme">
            <label>Problème</label>
            <input type="text" name="pb" class="form-control" placeholder="Entrez un problème">
            @error('pb')
            <span class="invalid-feedback" role="alert">
                <strong>erreur</strong>
            </span>
            @enderror
        </div>

        <div class="form-group" id="typeAnnonce">
            <input type="checkbox" name="type_reparation" value="reparation" id="reparation" required>
            <label>Réparation</label>
            @error('type_reparation')
            <span class="invalid-feedback" role="alert">
                <strong>erreur</strong>
            </span>
            @enderror

            <input type="checkbox" name="type_vente" value="vente" id="vente" required>
            <label>Vente</label>
            @error('type_vente')
            <span class="invalid-feedback" role="alert">
                <strong>erreur</strong>
            </span>
            @enderror
        </div>

        <div class="form-group" id="price">
            <label>Prix</label>
            <input type="number" name="prix" class="form-control" placeholder="Entrez un prix">
            @error('prix')
            <span class="invalid-feedback" role="alert">
                <strong>erreur</strong>
            </span>
            @enderror
        </div>

        <div class="form-after">
            <input type="checkbox" class="form-control-input" id="ok" name="ok" required>
            <label for="ok"> @lang('J\'accepte les termes et conditions de la politique
                de confidentialité.')</label><br/>
            <button type="submit" class="btn btn-primary blue-back row">POSTER<i
                    class="fa fa-chevron-right fa-lg blue"></i></button>
        </div>

        <div class="form-group row col-md-6">
            <label><span id="etoile">*</span> champs obligatoires</label>
        </div>
    </form>
</div>

@section('script', asset('js/posterAnnonce.js'))
@endsection