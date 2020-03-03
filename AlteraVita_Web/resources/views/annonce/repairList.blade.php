  <div class="loader d-none mt-5 mb-5">
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
 