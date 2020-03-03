@extends('layouts.app')

@section('title', 'Qui sommes-nous ?')
@section('style', asset('css/about.css'))

@section('content')

<div class="container">
    <div class="thread">
        <h1>Qui sommes-nous ?</h1>
    </div>

    <div class="presentation">

        <div class="d-flex justify-content-center">
            <img src="img/logo.svg" alt="Logo AlteraVita">
        </div>
        <p class="font-weight-bold">AlteraVita donne une nouvelle vie à vos appareils IT</p>
        <p>AlteraVita est issu d'un projet green IT de quatre &eacute;tudiants ( Nicolas ESTEBE, Paul DEMETS, Matéo POTIN, Kenny LEGRAND )
            o&uacute; le but est de lutter contre le gaspillage en mettant en relation des personnes poss&eacute;dant un(ou des) appareil(s) cass&eacute;(s)
            comme un smartphone, une tablette ou autres souhaitant le r&eacute;parer ou le vendre avec des personnes étant capables de r&eacute;parer
            ces mêmes appareils.</p>
    </div>
</div>

@section('script', asset('js/about.js'))
@endsection


