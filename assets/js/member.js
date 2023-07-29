const languageCode = document.documentElement.lang;
var metaDescription = document.querySelector('meta[name="description"]');

const backButton = {
  ['sr']: `<a class="back-to" href="/upoznajte-tim"><i class="ri-arrow-left-line"></i> Nazad na osnivače i ćlanove</a>`,
  ['en']: `<a class="back-to" href="/meet-members"><i class="ri-arrow-left-line"></i> Back to founders and members</a>`,
};

const transMember = {
  ['sr']: [
    "pozicija",
    "opis"
  ],
  ['en']: [
    "position",
    "description"
  ]
}

// console.log(transMember[languageCode][0]);

const apiUrl = 'https://cvu.hardcode.solutions/wp-json/wp/v2/clanovi';

const params = new URLSearchParams(window.location.search);
const url = window.location;
const postSlug = decodeURIComponent(url.pathname.split('/')[window.location.origin === 'http://localhost' ? 3 : 2]);
const requestUrl = `${apiUrl}?slug=${postSlug}&_embed`;

// Loader
// const loader = document.getElementById('loader');
// loader.style.display = 'flex';

fetch(requestUrl)
  .then((response) => response.json())
  .then((data) => {
    const post = data[0];
    const featureMediaImage = post._embedded['wp:featuredmedia'] ? post._embedded['wp:featuredmedia'][0].source_url : `assets/images/no-image.svg`;

    const postElement = `
    <div class="profile-aside">
      <img src="${featureMediaImage}" alt="${post.title.rendered ? post.title.rendered : 'article image'}" />
      ${backButton[languageCode]}
    </div>
    <div class="post-wrapper">
      <h1 class="section-heading">${post.title.rendered}</h1>
      <h2 class="section-heading">${post.acf[transMember[languageCode][0]]}</h2>
      <div>${post.acf[transMember[languageCode][1]]}</div>
    </div>`;
    document.getElementById('member').insertAdjacentHTML('beforeend', postElement);
    document.title = post.title.rendered + ' - CZVU';
    var cleanExcerpt = post.excerpt.rendered.replace(/<[^>]+>/g, '');
    metaDescription.setAttribute('content', cleanExcerpt);
  // loader.style.display = 'none';
  })
  .catch((error) => console.error(error));
