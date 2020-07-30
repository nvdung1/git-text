$(document).ready(function () {
    // alert("heloo");
  $(window).on("scroll", function () {
      if ($(window).scrollTop() > 550) {
        $("#btn_gotop").show()
        
      }
      else {
        $("#btn_gotop").hide()
      }
    });
    $('#btn_gotop').click(function () {
      $('html, body').animate({scrollTop:0}, 'slow');
    })
  
  })