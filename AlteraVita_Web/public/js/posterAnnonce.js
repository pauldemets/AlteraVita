// Supprime la class 'active' des liens du header afin d'enlever la mise en surbrillance 
$("#header-nav .navbar-nav").find(".active").removeClass("active");
$('#price').hide();


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

  // Vérifie si une des deux checkbox est chochée et, si c'est le cas, enlève l'attribut required des deux checkbox
  $(function(){

    var requiredCheckboxes = $('#typeAnnonce :checkbox[required]');

    requiredCheckboxes.change(function(){

        if(requiredCheckboxes.is(':checked')) {
            requiredCheckboxes.removeAttr('required');
        }

        else {
            requiredCheckboxes.attr('required', 'required');
        }
    });

    var venteCheckbox = $('#vente');
    var reparationCheckbox = $('#reparation');
    var divPrice = $('#price');
    var inputPrice = $('#price input');
    var inputPb = $('#probleme input');

    reparationCheckbox.change(function(){
      if(reparationCheckbox.is(':checked')) {
        inputPb.attr('required','required');
      } else {
        inputPb.removeAttr('required');
      }
    })

    venteCheckbox.change(function(){
      if(venteCheckbox.is(':checked')) {
        inputPrice.attr('required', 'required');
        divPrice.show();
      } else {
        inputPrice.removeAttr('required');
        divPrice.hide();
      }
    })
});