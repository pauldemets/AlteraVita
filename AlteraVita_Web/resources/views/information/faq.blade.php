@extends('layouts.app')

@section('title', 'FAQ')
@section('style', asset('css/faq.css'))

@section('content')
<div class="container">

    <h1>FAQ - Questions fréquentes&nbsp;:</h1>

    <p class="question"><a>Comment rechercher une annonce ? <i class="fa fa-chevron-circle-down fa-lg logo"></i></a></p>
    <div class="answer">
        <p>Pour rechercher une annonce il faut cliquer sur <strong>Acheter</strong> depuis le menu. </p>
    </div>

    <hr>

    <div class="question">
        <p><a>Combien coûte le dépôt d'une annonce ? <i class="fa fa-chevron-circle-down fa-lg logo"></i></a></p>
    </div>
    <div class="answer">
        <p>Le dépôt d'une annonce est <strong>100% gratuit</strong>. </p>
    </div>

    <hr>

    <div class="question">
        <p><a>Que mettre dans la description de mon annonce ? <i class="fa fa-chevron-circle-down fa-lg logo"></i></a>
        </p>
    </div>
    <div class="answer">
        <p>Lorsque vous déposez une annonce, vous devez remplir un champ <strong>description</strong>. Dans ce champ il
            est
            intéressant d'indiquer pourquoi vous vendez cet objet, si l'objet est sous garantie, si le prix est
            négociable
            ou encore de mettre
            des informations précises sur l'état du produit.</p>
    </div>

    <hr>

    <div class="question">
        <p><a>Comment fonctionne le système de réparation ? <i class="fa fa-chevron-circle-down fa-lg logo"></i></a></p>
    </div>
    <div class="answer">
        <p>Pour faire réparer un de vos objet vous devez poster une <strong>annonce</strong> et sélectionner le type
            <strong>vente</strong>. Ensuite,
            d'autres utilisateurs du site souhaitant réparer votre produit pourront proposer un prix. Vous aurez alors
            le
            choix parmi ces propositions pour faire
            réparer votre appareil.</p>
    </div>

    <hr>

    <div class="question">
        <p><a>Quels sont les types d'appareils que l'on peut mettre en vente sur AlteraVita ? <i
                    class="fa fa-chevron-circle-down fa-lg logo"></i></a></p>
    </div>
    <div class="answer">
        <p>L'ojectif de notre site est de mettre en reation des personnes pour vendre/acheter et reparer des appareils
            IT.
            C'est à dire :</p>
        <ul>
            <li>des téléphones</li>
            <li>des tablettes</li>
            <li>des ordinateurs portables</li>
        </ul>
    </div>

    <hr>

    <div class="question">
        <p><a>Y a-t-il un délai maximum pour la réparation d'un appareil ? <i
                    class="fa fa-chevron-circle-down fa-lg logo"></i></a></p>
    </div>
    <div class="answer">
        <p>Au-delà de 20 jours, contactez notre service clients par mail à l'adresse suivante :
            <strong>av.contactus@gmail.com</strong>.</p>
    </div>

    <hr>

    <div class="question">
        <p><a>Faut-il avoir un compte pour déposer une annonce ou acheter un appareil? <i
                    class="fa fa-chevron-circle-down fa-lg logo"></i></a></p>
    </div>
    <div class="answer">
        <p>Il est <strong>obligatoire</strong> d'être inscrit sur notre site pour <strong>acheter/réparer</strong> un
            produit ou pour
            <strong>déposer une annonce</strong>.</p>
    </div>

    <hr>

    <div class="question">
        <p><a>Je n'ai jamais recu le produit après avoir acheté ? Que faire ? <i
                    class="fa fa-chevron-circle-down fa-lg logo"></i></a></p>
    </div>
    <div class="answer">
        <p>Nous vous invitons à contacter notre service clients par mail à l'adresse mail suivante :
            <strong>av.contactus@gmail.com</strong>.</p>
    </div>

</div>
@section('script', asset('js/faq.js'))
@endsection