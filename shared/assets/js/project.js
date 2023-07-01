import {galleryImage} from './gallery-modal.js';

const apiUrl = 'https://cvu.hardcode.solutions/wp-json/wp/v2/projekti';
var metaDescription = document.querySelector('meta[name="description"]');

const params = new URLSearchParams(window.location.search);
const url = window.location;
const postSlug = decodeURIComponent(url.pathname.split('/')[window.location.origin === 'http://localhost' ? 3 : 2]);
const requestUrl = `${apiUrl}?slug=${postSlug}`;

// Loader
// const loader = document.getElementById('loader');
// loader.style.display = 'flex';

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
