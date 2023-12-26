import {galleryImage} from './gallery-modal.js';

const languageCode = document.documentElement.lang;
// var metaDescription = document.querySelector('meta[name="description"]');
// var metaTitleOg = document.querySelector('meta[property="og:title"]');
// var metaDescriptionOg = document.querySelector('meta[property="og:description"]');
// var metaTitleTwitter = document.querySelector('meta[property="twitter:title"]');
// var metaDescriptionTwitter = document.querySelector('meta[property="twitter:description"]');

const languageCategory = {
  ['en']: 'categories=15',
  ['sr']: 'categories=15',
  ['rs']: 'categories=15',
};

const apiUrl = 'https://cvu.hardcode.solutions/wp-json/wp/v2/posts';

const urlParams = new URLSearchParams(window.location.search);
const myParam = urlParams.get('slug');
const requestUrl = `${apiUrl}?_embed&slug=${myParam}`;
const requestUrl4posts = `${apiUrl}?per_page=4&_embed&${languageCategory[languageCode]}`;

fetch(requestUrl4posts)
  .then((response) => response.json())
  .then((posts) => {
    posts.map((post) => {

      const date = new Date(post.date);
      const day = String(date.getDate()).padStart(2, '0');
      const month = String(date.getMonth() + 1).padStart(2, '0');
      const year = date.getFullYear().toString();
      const formattedDate = `${day}.${month}.${year}.`;

      const featureMediaImage = post._embedded['wp:featuredmedia'] ? post._embedded['wp:featuredmedia'][0].media_details.sizes.medium.source_url : `${rootPathjs}shared/assets/images/no-image.svg`;

      const postElement = `                    
        <article class="post">
            <div class="post-image">
            <img src="${featureMediaImage}" />
            </div>
            <div class="post-body">
                <a href="${post.slug}" class="post-title">${post.title.rendered}</a>
                <div class="post-meta">
                    <span class="post-date">${formattedDate}</span>
                </div>
            </div>
        </article>`;
      document.getElementById('latest-posts').insertAdjacentHTML('beforeend', postElement);
    });
  })
  .catch((error) => console.error(error));


// Loader
// const loader = document.getElementById('loader');
// loader.style.display = 'flex';

fetch(requestUrl)
  .then((response) => response.json())
  .then((data) => {
    const post = data[0];
    
    const date = new Date(post.date);
    const day = String(date.getDate()).padStart(2, '0');
    const month = String(date.getMonth() + 1).padStart(2, '0');
    const year = date.getFullYear().toString();
    const formattedDate = `${day}.${month}.${year}.`;  

    const featureMediaImage = post._embedded['wp:featuredmedia'] ? post._embedded['wp:featuredmedia'][0].source_url : `${rootPathjs}shared/assets/images/no-image.svg`;

    const postElement = `
      <div class="post-wrapper">
        <img class="featured-image" src="${featureMediaImage}" alt="${post.title.rendered ? post.title.rendered : 'article image'}" />
        <h1 class="section-heading">${post.title.rendered}</h1>
        <div class="post-meta">
          <div class="post-date">${formattedDate}</div>
          <div class="post-share">
            <p>Share: </p>
            <div class="share-icons">
              <a href="https://www.facebook.com/sharer.php?u=${window.location.href}&t=Home&v=3" target="_blank"><i class="ri-facebook-line"></i></a>
              <a href="https://www.linkedin.com/shareArticle?mini=true&url=${window.location.href}&title=${post.title.rendered}" target="_blank"><i class="ri-linkedin-line"></i></a>
              <a href="https://twitter.com/intent/tweet?text=${post.title.rendered}%20${window.location.href}" target="_blank"><i class="ri-twitter-line"></i></a>
              <a href="viber://forward?text=${window.location.href}"><img src="assets/icons/viber.svg"></a>
              <a href="whatsapp://send?text=${window.location.href}"><i class="ri-whatsapp-line"></i></a>
            </div>
          </div>
        </div>
        <div>${post.content.rendered}</div>
      </div>`;
    document.getElementById('post').insertAdjacentHTML('beforeend', postElement);
    // document.title = post.title.rendered + ' - CZVU';
    // metaTitleOg.setAttribute('content', post.title.rendered + ' - CZVU');
    // metaTitleTwitter.setAttribute('content', post.title.rendered + ' - CZVU');
    // var cleanExcerpt = post.excerpt.rendered.replace(/<[^>]+>/g, '');
    // metaDescription.setAttribute('content', cleanExcerpt);
    // metaDescriptionOg.setAttribute('content', cleanExcerpt);
    // metaDescriptionTwitter.setAttribute('content', cleanExcerpt);
    galleryImage();
    // loader.style.display = 'none';
  })
  .catch((error) => console.error(error));
