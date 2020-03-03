  <div class="annonces">
    <ul class="nav nav-tabs" id="annonces-tab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="nav-achat-tab" data-toggle="tab" href="#nav-achat" role="tab"
          aria-controls="nav-achat" aria-selected="true">Acheter ({{ count($annonce)}})</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="nav-reparation-tab" data-toggle="tab" href="#nav-reparation" role="tab"
          aria-controls="nav-reparation" aria-selected="false">R&eacute;parer ({{ count($reparation)}})</a>
      </li>
    </ul>
    <div class="tab-content" id="nav-tabContent">
    <!-- Affichage des Annonces de Vente-->
      <div class="tab-pane fade show active" id="nav-achat" role="tabpanel" aria-labelledby="nav-achat-tab">
        @include('annonce.salesList')
      </div>
      <!--Fin des Annonces de Vente-->
      <!--Affichage des Annoces de Réparation-->
      <div class="tab-pane fade" id="nav-reparation" role="tabpanel" aria-labelledby="nav-reparation-tab">
      @include('annonce.repairList')
      </div>
      <!--Fin des Annoces de Réparation-->
  </div>
  <!--Fin de l'affichage des Annonces-->