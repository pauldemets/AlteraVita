@extends('layouts.app')

@section('title', 'Erreur')

@section('content')

<div class="container" style="background-color: white;
         width:80%;
         margin-top: 5%;
         padding: 5%;
         box-shadow: 0 2px 5px 3px #ccc;
         border-radius: 6px;
        color:#3498DB;">
    <h1 style="text-align: center;
                margin-bottom: 5%;">Page introuvable</h1>
    <p>Oups ! La page demandée n’existe pas sur AlteraVita.</p>
    <p>ERREUR <b>404</b></p>
</div>
@endsection