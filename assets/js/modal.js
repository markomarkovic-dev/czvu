document.addEventListener("DOMContentLoaded", function () {
  var modalOpenButtons = document.querySelectorAll(".modal-open");
  var modalCloseButtons = document.querySelectorAll(".modal-close");

  modalOpenButtons.forEach(function (button) {
    button.addEventListener("click", function () {
      event.preventDefault();
      var dataAttribute = this.getAttribute("data-trigger");
      var modal = document.querySelector('.modal[data-modal="' + dataAttribute + '"]');
      modal.classList.add("show");
      
      if (window.innerWidth <= 991) {
        document.documentElement.style.overflow = "hidden";
      }
    });
  });

  modalCloseButtons.forEach(function (button) {
    button.addEventListener("click", function () {
      var modal = this.closest(".modal");
      modal.classList.remove("show");

      if (window.innerWidth <= 991 && !document.querySelector(".modal.show")) {
        document.documentElement.style.overflow = "";
      }
    });
  });

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
