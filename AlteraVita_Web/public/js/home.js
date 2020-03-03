
// Supprime la classe 'active' des liens du header et afin de l'ajouter sur le lien d'accueil
$(document).ready(function () {
  $(".navbar-nav").find(".active").removeClass("active");
  $(".nav-item:nth-of-type(2)").addClass("active");
});
