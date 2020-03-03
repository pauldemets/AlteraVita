  <div class="loader d-none mt-5 mb-5">
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
