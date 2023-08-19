$(document).ready(function ($) {
  $('.open-menu').click(function () {
    $('.slide-menu').removeClass('show');
    var dataAtribut = $(this).data('slide');
    $('.slide-menu[data-menu="' + dataAtribut + '"]').addClass('show');
    if ($(document).width() >= 992) {
      calcMenuPosition('.open-menu[data-slide="' + dataAtribut + '"]', '.slide-menu[data-menu="' + dataAtribut + '"]');
    } else if ($(document).width() <= 991 && dataAtribut === 'main-menu') {
      $('html').css('overflow', 'hidden');
    }
  });

  $('.close-menu').click(function () {
    $(this).closest('.slide-menu').removeClass('show');
    $('.slide-menu').children('.accordion-body').slideUp();
  });

  $('.accordion').click(function () {
    if (!$(this).hasClass('expanded')) {
      $(this).siblings('.accordion').removeClass('expanded');
      $(this).siblings('.accordion').children('.accordion-body').slideUp();
      $(this).addClass('expanded');
      $(this).children('.accordion-body').slideDown();
    } else {
      $(this).removeClass('expanded');
      $(this).children('.accordion-body').slideUp();
    }
  });

  $('.slide-menu .ri-close-line').click(function (e) {
    e.stopPropagation();
    $('.slide-menu.show').find('.accordion-body').slideUp();
    $('.slide-menu.show').removeClass('show');
    $('.accordion').removeClass('expanded');
    $('html').removeAttr('style');
  });

  $('.copy-link').click(function () {
    let thisLink = $(this).data('link');
    navigator.clipboard.writeText(thisLink);
    $('.slide-menu.show').removeClass('show');
    $('.slide-menu .accordion').removeClass('expanded');
    $('.slide-menu .accordion').children('.accordion-body').slideUp();
  });

  $('div.copy-link').click(function () {
    if (document.documentElement.lang !== 'sr') {
      $(`<div class="copy-notif"><i class="ri-checkbox-circle-line"></i> Link copied</div>`).appendTo('body');
    } else {
      $(`<div class="copy-notif"><i class="ri-checkbox-circle-line"></i> Link kopiran</div>`).appendTo('body');
    }

    $('.slide-menu').removeClass('show');

    setTimeout(function () {
      $('.copy-notif').remove();
    }, 3100);
  });

  termsBanner();
  $('#accept-cookie').click(function () {
    window.localStorage.setItem('marketing', 'allow');
    $('.cookie-consent-banner').remove();
  });

  $('#decline-cookie').click(function () {
    window.localStorage.setItem('marketing', 'decline');
    $('.cookie-consent-banner').remove();
  });

  $('.channel-list-lang img').click(function () {
    var thisData = $(this).data('channel');
    var thisSrc = $(this).prop('src');
    $(`.${thisData}`).addClass('active');
    $(`.modal-tabs span#${thisData}`).addClass('active').siblings().removeClass('active');
    $('.logo-lang').removeClass('hidden');
    $('.state-img').prop('src', thisSrc);
    $('.modal-tabs').removeClass('hidden');
    $('.channel-list-lang').addClass('hidden');
    $('.modal-channels h2').addClass('hidden');
    $('.modal-list-lang').addClass('modal-l-full-h').removeClass('modal-list-lang');
  });

  $('[data-modal="channel-list"] .modal-close').click(function () {
    $(this).parent().addClass('modal-list-lang').removeClass('modal-l-full-h');
    $('.channel-list-lang').removeClass('hidden');
    $('.logo-lang').addClass('hidden');
    $('.modal-tabs').addClass('hidden');
    $('.modal-channels h2').removeClass('hidden');
    $('.channels-list').removeClass('active');
  });

  $('.modal-tabs span').click(function () {
    var thisId = $(this).prop('id');
    var thisLangImgSrc = $(`.channel-list-lang img[data-channel="${thisId}"]`).prop('src');
    $(this).addClass('active').siblings().removeClass('active');
    $(`.${thisId}`).addClass('active').siblings().removeClass('active');
    $('.state-img').prop('src', thisLangImgSrc);
  });

  $('.submenu').click(function () {
    $(this).toggleClass('show');
  });

  if ($(document).scrollTop() >= 30) {
    $('header').addClass('transparent-disabled');
  } else {
    $('header').removeClass('transparent-disabled');
  }

  $(document).scroll(function () {
    if ($(this).scrollTop() >= 30) {
      $('header').addClass('transparent-disabled');
    } else {
      $('header').removeClass('transparent-disabled');
    }
  });
});

function termsBanner() {
  const srAllow = `<div class="cookie-consent-banner">
    <div class="cookie-wrapper">
    <p>Da bismo pružili najbolje iskustvo, koristimo tehnologije poput kolačića za čuvanje i/ili pristup informacijama o uređaju. Saglasnost sa ovim tehnologijama će nam omogućiti da obrađujemo podatke kao što su ponašanje pri pregledanju ili jedinstveni ID-ovi na ovoj veb lokaciji. Nepristanak ili povlačenje saglasnosti može negativno uticati na određene karakteristike i funkcije.</p>
    <div class="btn-wrapper">
    <button class="btn btn-primary" id="accept-cookie">Prihvatam</button>
    <button class="btn btn-white" id="decline-cookie">Odbijam</button>
    </div>
    </div>
    </div>`;

  const enAllow = `<div class="cookie-consent-banner">
    <div class="cookie-wrapper">
    <p>To provide the best experiences, we use technologies like cookies to store and/or access device information. Consenting to these technologies will allow us to process data such as browsing behaviour or unique IDs on this site. Not consenting or withdrawing consent, may adversely affect certain features and functions.</p>
    <div class="btn-wrapper">
        <button class="btn btn-white" id="accept-cookie">Accept</button>
        <button class="btn btn-white" id="decline-cookie">Decline</button>
        </div>
        </div>
    </div>`;

  if (window.localStorage.getItem('marketing') !== 'allow' && window.localStorage.getItem('marketing') !== 'decline') {
    $(document.documentElement.lang === 'sr' ? srAllow : enAllow).appendTo('body');
  }
}

$(document).mouseup(function (e) {
  let container = $('.slide-menu');
  if (!container.is(e.target) && container.has(e.target).length === 0) {
    $('.slide-menu.show').removeClass('show');
    $('.slide-menu.show').children('.accordion-body').slideUp();
    $('.slide-menu .accordion').removeClass('expanded');
    $('.slide-menu .accordion').children('.accordion-body').slideUp();
  }
});

$(document).mouseup(function (e) {
  let container = $('.submenu');
  if (!container.is(e.target) && container.has(e.target).length === 0) {
    container.removeClass('show');
  }
});

function calcMenuPosition(clickItem, menuTarget) {
  let menuPositionCalc = $(clickItem).offset().left - $(menuTarget).width() + $(clickItem).width() - 15;
  $(menuTarget).css('left', menuPositionCalc);
}
