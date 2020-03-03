// Supprime la classe 'active' des liens du header afin d'enlever la mise en surbrillance
$(document).ready(function () {

    $("#header-nav .navbar-nav").find(".active").removeClass("active");
    $("#header-nav .dropdown").addClass("active");
  
  });