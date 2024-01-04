const languageCode = document.documentElement.lang;
const languageCategory = {
  en: 'categories=15',
  sr: 'categories=35',
  rs: 'categories=3',
};

const apiUrl = `${backendUrl}/wp-json/wp/v2/posts`;

let currentPage = 1;
const perPage = 4;
let isFetching = false;
let hasMorePosts = true; // Add a flag to track if there are more posts to fetch

function fetchPosts() {
  if (isFetching || !hasMorePosts) return;
  isFetching = true;

  document.querySelector('#loader').style.display = "flex";

  const requestUrl = `${apiUrl}?_embed&page=${currentPage}&per_page=${perPage}&${
    languageCategory[languageCode]
  }`;

  fetch(requestUrl)
    .then((response) => response.json())
    .then((posts) => {
      if (posts.length > 0) {
        posts.map((post) => {
          const date = new Date(post.date);
          const day = String(date.getDate()).padStart(2, '0');
          const month = String(date.getMonth() + 1).padStart(2, '0');
          const year = date.getFullYear().toString();
          const formattedDate = `${day}.${month}.${year}.`;

          const featureMediaImage = post._embedded['wp:featuredmedia'] ? post._embedded['wp:featuredmedia'][0].media_details.sizes.medium.source_url : `assets/images/no-image.svg`;

          const postElement = `<article class="post">
            <div class="post-image">
              <img src="${featureMediaImage}" alt="${post.title.rendered || 'article image'}" />
            </div>
            <div class="post-body">
              <a href="post?id=${post.slug}" class="post-title">${post.title.rendered}</a>
              <div class="post-meta">
                <span class="post-date">${formattedDate}</span>
              </div>
            </div>
          </article>`;
          document.getElementById('blog').insertAdjacentHTML('beforeend', postElement);
        });
        currentPage++;
        document.querySelector('#loader').style.display = "none";
        isFetching = false;
      } else {
        document.querySelector('#loader').style.display = "none";
        // No more posts to fetch
        $(window).off('scroll', handleScroll); // Remove the scroll event listener
      }
    })
    .catch((error) => {
      console.error(error);
      isFetching = false;
    });
}

function handleScroll() {
  if (window.scrollY >= document.documentElement.scrollHeight - window.innerHeight - 100) {
    fetchPosts();
  }
}

window.addEventListener('scroll', handleScroll); // Add the event listener

// Initial fetch
fetchPosts();
