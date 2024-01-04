document.addEventListener("DOMContentLoaded", function () {

  $('.artist-profile').click(function(){
    $('.modal .member-name, .modal .member-desc, .modal .member-profession').empty();

    const artistName = $(this).find('.member-name').text();
    const artistDesc = $(this).find('.member-desc').html();
    const artistPhoto = $(this).find('img').prop('src');
    const artistProject = $(this).find('.member-profession').text();

    $('.artist-modal h1.section-heading').text(artistName);
    $('.artist-modal h2.section-heading').text(artistProject);
    $('.artist-modal .member-desc').html(artistDesc);
    $('.artist-modal .artist-photo').prop('src', artistPhoto);
  })
});

