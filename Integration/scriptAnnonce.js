$(document).ready(function () {

//grabs the hash tag from the url
var hash = window.location.hash;
//checks whether or not the hash tag is set


window.onhashchange = function () {
  window.location.reload();
}
/**
 * Change le flex-direction en column si l'appareil st un smartphone ou tablette
 * Si non le flex-direction en row
 */  
$(window).on('resize', function () {
  var width = $(window).width();
  if (width <= 480) {
    $(".d-flex").addClass("flex-column");
    $(".card").css("width", "100%")
  } else if (480 <= width && width <= 900) {
    $(".d-flex").removeClass("flex-column");
    $(".card").css("width", "50%");
  } else {
    $(".d-flex").removeClass("flex-column");
    $(".card").css("width", "30%");
  }
});
//Fonction qui gère le click sur les onglets
function clickTab() {
  $("#nav-reparation-tab").click(function () {
    $("#nav-achat-tab").css("background-color", "gray");
    $("#nav-achat-tab").css("color", "white");
    $("#nav-reparation-tab").css("color", "#3498db");
    $("#nav-reparation-tab").css("background-color", "white");

  });
  $("#nav-achat-tab").click(function () {
    $("#nav-reparation-tab").css("background-color", "gray");
    $("#nav-reparation-tab").css("color", "white")
    $("#nav-achat-tab").css("color", "#3498db");
    $("#nav-achat-tab").css("background-color", "white");
  });
}




  if (hash != "") {
    if (hash == "#reparer") {
      $('#nav-reparation').addClass('active');
      $('#nav-reparation').addClass('show');
      $('#nav-reparation-tab').addClass('active');
      $('#nav-achat').removeClass('active');
      $('#nav-achat').removeClass('show');
      $('#nav-achat-tab').removeClass('active');

      $("#header-nav .navbar-nav").find(".active").removeClass("active");
      $("#header-nav .nav-item:nth-of-type(4)").addClass("active");


    } else {
      $('#nav-achat').addClass('active');
      $('#nav-achat').addClass('show');
      $('#nav-achat-tab').addClass('active');
      $('#nav-reparation').removeClass('active');
      $('#nav-reparation').removeClass('show');
      $('#nav-reparation-tab').removeClass('active');
      $(" #header-nav .navbar-nav").find(".active").removeClass("active");
      $("#header-nav .nav-item:nth-of-type(3)").addClass("active");

    }
  }


/**
 * Change le flex-direction en column au chargement de la page si l'appareil st un smartphone ou tablette
 * Si non le flex-direction en row
 */  
  var width = $(window).width();
  if (width <= 480) {
    $(".d-flex").addClass("flex-column");
    $(".card").css("width", "100%")
  } else if (480 <= width && width <= 900) {
    $(".d-flex").removeClass("flex-column");
    $(".card").css("width", "50%");
  } else {
    $(".d-flex").removeClass("flex-column");
    $(".card").css("width", "32%");
  }
  if (hash != "") {
    if (hash == "#reparer") {
      //Modifier l'onglet active au chargement de la page si l'url contient #reparer
      $("#nav-achat-tab").css("background-color", "gray");
      $("#nav-achat-tab").css("color", "white");
      $("#nav-reparation-tab").css("color", "#3498db");
      $("#nav-reparation-tab").css("background-color", "white");
      $('#nav-reparation-tab').addClass('active');
      $('#nav-achat-tab').removeClass('active');
    } else {
       //Modifier l'onglet active au chargement de la page si l'url contient #acheter
      $("#nav-reparation-tab").css("background-color", "gray");
      $("#nav-reparation-tab").css("color", "white")
      $("#nav-achat-tab").css("color", "#3498db");
      $("#nav-achat-tab").css("background-color", "white");
    }
  } else {
    //affiche Acheter en onglet active si l'url ne contient ni #reparer ni #acheter
    $("#nav-reparation-tab").css("background-color", "gray");
    $("#nav-reparation-tab").css("color", "white")
    $("#nav-achat-tab").css("color", "#3498db");
    $("#nav-achat-tab").css("background-color", "white");
  }
  clickTab();

});
//Fonction de recherche des annonces
function searchFunction() {
  var input, filter, card, title, txtValue;
  input = document.getElementById('search-annonce-bar');
  filter = input.value.toUpperCase();
  card = document.getElementsByClassName("card");
  for (let element of card) {
    title = element.getElementsByTagName("h5");
    txtValue = $(title).text();

    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      element.style.display = "";
    } else {
      element.style.display = "none";
    }
  }
}
