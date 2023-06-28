const apiUrl = 'https://cvu.hardcode.solutions/wp-json/wp/v2/projekti';
var metaDescription = document.querySelector('meta[name="description"]');

const params = new URLSearchParams(window.location.search);
const url = window.location;
const postSlug = decodeURIComponent(url.pathname.split('/')[window.location.origin === 'http://localhost' ? 3 : 2]);
const requestUrl = `${apiUrl}?slug=${postSlug}`;

// Loader
// const loader = document.getElementById('loader');
// loader.style.display = 'flex';

function galleryImage() {

  var galleryLinks = $('.gallery-item a img');
  var currentIndex;

  galleryLinks.click(function(event) {
    event.preventDefault();
    currentIndex = galleryLinks.index(this);

    let imageUrlWidth = $(this).attr('width');
    let imageUrlHeight = $(this).attr('height');
    var prevBigImage = $(this).attr("src").replace(`-${imageUrlWidth}x${imageUrlHeight}`, "");

    openImageModal(prevBigImage);
  });

  function openImageModal(imageUrl) {
    var modal = $(
      `<div class="image-modal">
          <i class="ri-close-line image-close"></i>
          <div class="next-prev-image">
            <div class="prev-image">
            <i class="ri-arrow-left-s-line"></i>
            </div>
            <div class="next-image">
            <i class="ri-arrow-right-s-line"></i>
            </div>
          </div>
      </div>`);
    var modalImage = $('<img>').attr('src', imageUrl);

    modal.prepend(modalImage);

    $('body').append(modal);

    $('.prev-image').click(function(){
      showPrevImage();
    })

    $('.next-image').click(function(){
      showNextImage();
    })

    $('.image-close').click(function(){
      $(modal).remove();
    })
  }

  function showPrevImage() {
    currentIndex = (currentIndex - 1 + galleryLinks.length) % galleryLinks.length;
    var prevImageUrl = galleryLinks.eq(currentIndex).attr('src');
    var prevImageWidth = galleryLinks.eq(currentIndex).attr('width');
    var prevImageheight = galleryLinks.eq(currentIndex).attr('height');
    var prevBigImage = prevImageUrl.replace(`-${prevImageWidth}x${prevImageheight}`, "");
    $('.image-modal img').attr('src', prevBigImage);
  }

  function showNextImage() {
    currentIndex = (currentIndex + 1) % galleryLinks.length;
    var nextImageUrl = galleryLinks.eq(currentIndex).attr('src');
    var nextImageWidth = galleryLinks.eq(currentIndex).attr('width');
    var nextImageheight = galleryLinks.eq(currentIndex).attr('height');
    var nextBigImage = nextImageUrl.replace(`-${nextImageWidth}x${nextImageheight}`, "");
    $('.image-modal img').attr('src', nextBigImage);
  }
}

fetch(requestUrl)
  .then((response) => response.json())
  .then((data) => {
    const post = data[0];
    const featuredMediaId = post.featured_media;
    const mediaUrl = `https://cvu.hardcode.solutions/wp-json/wp/v2/media/${featuredMediaId}`;

    fetch(mediaUrl)
      .then((response) => response.json())
      .then((data) => {
        const featuredImageUrl = data.guid.rendered;
        const postElement = `
          <div class="post-wrapper">
            <div class="project-header">
              <div class="project-title">
                <h1>${post.title.rendered}</h1>
                <h2>${post.acf.podnaslov}</h2>
              </div>
              <i class="ri-arrow-down-line"></i>
              <img src="${featuredImageUrl}" alt="${post.title.rendered ? post.title.rendered : 'article image'}" />
            </div>
            <div>${post.content.rendered}</div>
          </div>`;
        document.getElementById('project').insertAdjacentHTML('beforeend', postElement);
        document.title = post.title.rendered + ' - CZVU';
        var cleanExcerpt = post.excerpt.rendered.replace(/<[^>]+>/g, '');
        metaDescription.setAttribute('content', cleanExcerpt);
        // loader.style.display = 'none';
        
        galleryImage();
      })
      .catch((error) => console.error(error));
  })
  .catch((error) => console.error(error));
