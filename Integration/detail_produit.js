$(document).ready(function () {

  $("#header-nav .navbar-nav").find(".active").removeClass("active");

  $('#confirmPayment').on('click', function () { //when a person click on button to buy a device
    if ($('#paypalCheckbox').is(':checked') == true || $('#paymentCardCheckbox').is(':checked') == true) { //check if the user checked the checkbox
      $('.alert').css('visibility', 'hidden');
      refreshPopUp();
    }
    else {
      $('.alert').css('visibility', 'visible'); //if not show an error message
    }
  });

  $('#buyButton').on('click', function () { //when user click on the button, set the default settings of the popup
    $("#paypalCheckbox").prop("checked", false);
    $("#paymentCardCheckbox").prop("checked", false);
    $('.alert').css('visibility', 'hidden');
  });

  function refreshPopUp() { // set popup view to default view
    $('#popUpBeforePurchase').css('display', 'none');
    $('#popUpAfterPurchase').css('display', 'block');
    $('#confirmPayment').css('display', 'none');
    $('#popUpTitle').text('Félicitations !');
    $('#buyButton').prop('disabled', true);
  }

});
