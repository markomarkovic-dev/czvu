const apiUrl = 'https://cvu.hardcode.solutions/wp-json/wp/v2/clanovi';

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
            <div class="mb-4">
            <h3>${post.title.rendered}</h3>
            <img src="${featuredImageUrl}" alt="${post.title.rendered ? post.title.rendered : 'article image'}" />
            <div>${post.content.rendered}</div>
            </div>
          </div>`;
          document.getElementById('member').insertAdjacentHTML('beforeend', postElement);
        // loader.style.display = 'none';
      })
      .catch((error) => console.error(error));
  })
  .catch((error) => console.error(error));
