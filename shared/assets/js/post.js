// Set the URL for the WordPress REST API endpoint
const apiUrl = 'https://cvu.hardcode.solutions/wp-json/wp/v2/posts';

// Get the post ID from the URL query string
const params = new URLSearchParams(window.location.search);
const url = window.location;
const postSlug = decodeURIComponent(url.pathname.split('/')[3]); // "kako-cloud-rjesenja-mogu-pomoci-u-skalabilnosti-vaseg-poslovanja"
// Set the request URL with parameters to retrieve the single post by ID
const requestUrl = `${apiUrl}?slug=${postSlug}`;

// Show loader
const loader = document.getElementById('loader');
loader.style.display = 'flex';

// Fetch the single post by ID
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
        // Create the HTML for the post and append it to the page
        const postElement = `
          <div class="post-wrapper">
            <div class="mb-4">
            <h3>${post.title.rendered}</h3>
            <img src="${featuredImageUrl}" alt="${post.title.rendered ? post.title.rendered : 'article image'}" />
            <div>${post.content.rendered}</div>
            </div>
          </div>`;
        document.getElementById('post').insertAdjacentHTML('beforeend', postElement);
        loader.style.display = 'none';
      })
      .catch((error) => console.error(error));
  })
  .catch((error) => console.error(error));
