$(document).ready(function () {


    $("#header-nav .navbar-nav").find(".active").removeClass("active");
    //Fonction qui désactive la soumission du formulaire si il reste des inputs vides ou invalides 
    (function() {
        'use strict';
        window.addEventListener('load', function() {
  
          var forms = document.getElementsByClassName('needs-validation');
  
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
  
  });
  