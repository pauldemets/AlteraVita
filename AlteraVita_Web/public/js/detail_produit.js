$(document).ready(function () {

  $("#header-nav .navbar-nav").find(".active").removeClass("active");
  $(".carousel-item").first().addClass("active");
  $(".carousel-indicators li").first().addClass("active");
  setButtonsState();
  checkPrice();

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

  function setButtonsState(){
    $('.btnAd').attr('disabled',true);
    let type_annonce = $('#listButtons').attr('class').split(' ')[2];
    if(type_annonce == 'vente'){
      $('#buyButton').attr('disabled',false);
    }
    else if (type_annonce == 'reparation'){
      $('#repareButton').attr('disabled',false);
    }
    else {
      $('.btnAd').attr('disabled',false);
    }
  }

  function checkPrice(){
    let price = $("#prix").text();
    console.log(price);

    if(price.length > 0){
      $("#prix").text(price + " €");
    }
  }

});
