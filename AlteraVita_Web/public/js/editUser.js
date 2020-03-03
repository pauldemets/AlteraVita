
// Supprime la classe 'active' des liens du header afin d'enlever la mise en surbrillance
$(document).ready(function () {

    $("#header-nav .navbar-nav").find(".active").removeClass("active");
    $("#header-nav .dropdown").addClass("active");
  
  });


// Remplace la validation de formulaire par défaut 
(function() {
    'use strict';
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
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