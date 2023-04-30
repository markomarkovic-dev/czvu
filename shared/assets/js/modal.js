$(document).ready(function () {
  $('.modal-open').click(function () {
    var dataAtribut = $(this).data('trigger');
    $('.modal[data-modal="' + dataAtribut + '"]').addClass('show');
    $("html").css('overflow','hidden');
  });

  $('.modal-close').click(function () {
    $(this).closest('.modal').removeClass('show');
    if (!$('.modal').hasClass('show')) {
      $('html').removeAttr('style');
    }
  });
});
