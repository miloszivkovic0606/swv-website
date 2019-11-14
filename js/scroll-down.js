$(function() {
    $('.ct-js-btn-scroll').click (function() {
      $('html, body').animate({scrollTop: $('#top').offset().top }, 'slow');
      return false;
    });
  });