const languageCode = document.documentElement.lang;
const languageCategory = {
  en: 'categories=15',
  sr: 'categories=15',
};
const apiUrl = 'https://cvu.hardcode.solutions/wp-json/wp/v2/posts';

let currentPage = 1;
const perPage = 8;
let isFetching = false;

function fetchPosts(searchTerm = '') {
  if (isFetching) return;
  isFetching = true;

  const requestUrl = `${apiUrl}?page=${currentPage}&per_page=${perPage}&_embed&${
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

          const postElement = `<article class="post">
            <div class="post-image">
              <img src="${
                post._embedded['wp:featuredmedia']?.[0]?.source_url || (languageCode === 'sr' ? 'shared/assets/images/no-image.svg' : languageCode + '/shared/assets/images/no-image.svg')
              }" alt="${post.title.rendered || 'article image'}" />
            </div>
            <div class="post-body">
              <a href="post/${post.slug}" class="post-title">${post.title.rendered}</a>
              <div class="post-meta">
                <span class="post-date">${formattedDate}</span>
              </div>
            </div>
          </article>`;
          document.getElementById('blog').insertAdjacentHTML('beforeend', postElement);
        });
        currentPage++;
        isFetching = false;
      } else {
        // No more posts to fetch
        $(window).off('scroll'); // Remove the scroll event listener
      }
    })
    .catch((error) => {
      console.error(error);
      isFetching = false;
    });
}

window.addEventListener('scroll', function() {
  if (window.scrollY >= document.documentElement.scrollHeight - window.innerHeight - 100) {
    fetchPosts();
  }
});

// Initial fetch
fetchPosts();
