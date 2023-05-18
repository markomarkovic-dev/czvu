const languageCode = document.documentElement.lang;
const languageCategory = {
  en: 'categories=15',
  sr: 'categories=3',
};

const apiUrl = 'https://cvu.hardcode.solutions/wp-json/wp/v2/posts';
let currentPage = 1;
let isLoading = false;

const loadPosts = () => {
  if (isLoading) return;
  isLoading = true;
  
  const requestUrl = `${apiUrl}?per_page=4&_embed&${languageCategory[languageCode]}&page=${currentPage}`;

  fetch(requestUrl)
    .then((response) => response.json())
    .then((posts) => {
      if (posts.length === 0) {
        // No more posts available
        return;
      }
      
      posts.map((post) => {
        const postElement = `
          <article class="post">
              <div class="post-image">
              <img src="${
                post._embedded['wp:featuredmedia']['0'].source_url
                  ? post._embedded['wp:featuredmedia']['0'].source_url
                  : 'no image'
              }" alt="${post.title.rendered ? post.title.rendered : 'article image'}" />
              </div>
              <div class="post-body">
                  <a href="post/${post.slug}" class="post-title">${post.title.rendered}</a>
                  <div class="post-meta">
                      <span class="post-date">23.02.2023.</span>
                  </div>
              </div>
          </article>`;
        document.getElementById('blog').insertAdjacentHTML('beforeend', postElement);
      });

      currentPage++;
      isLoading = false;
    })
    .catch((error) => {
      console.error(error);
      isLoading = false;
    });
};

const handleScroll = () => {
  const { scrollTop, scrollHeight, clientHeight } = document.documentElement;

  if (scrollTop + clientHeight >= scrollHeight - 10) {
    loadPosts();
  }
};

// Register scroll event listener
window.addEventListener('scroll', handleScroll);

// Initial load
loadPosts();
