$(document).ready(function() {

  $("#header-nav .navbar-nav").find(".active").removeClass("active");

  $('.question').on('click',function() {  //when user click on a question show the answer

    if($(this).nextAll(".answer").first().css('display') == 'block'){ //if the answer is already show, hide it
      $(this).nextAll(".answer").first().css('display','none');
      $(this).find('.logo').addClass('fa-chevron-circle-down');
      $(this).find('.logo').removeClass('fa-chevron-circle-up');

    }else { // show answer
      $(this).nextAll(".answer").first().css("display", "block");
      $(this).find('.logo').removeClass('fa-chevron-circle-down');
      $(this).find('.logo').addClass('fa-chevron-circle-up');
    }
  });

});
