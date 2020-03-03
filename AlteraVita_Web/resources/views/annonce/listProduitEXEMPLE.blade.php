@extends('layouts.app')

<style>
th{
    width:400x;
    height:200px;
}
</style>

@section('content')

<div class="container">
    <div class="jumbotron">
    <h1>Liste des annonces</h1>
    <table>
    @foreach($annonce as $key => $value)
    <tr>
        <th>{{ $value->produit->nom }}</th>
        <th>{{ $value->id_produit }}</th>
        <th>{{ $value->date }}</th>
        <th>{{ $value->type_annonce }}</th>
        @foreach($value->produit->photos as $photo)
            <th><img src="{{ URL::to('/') }}/img/annonces/{{ $photo->url }}"></th>
        @endforeach
        
    </tr>
    @endforeach
    </table>
    </div>
</div>

@endsection