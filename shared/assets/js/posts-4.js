const languageCode = document.documentElement.lang;

const languageCategory = {
  ['en']: 'categories=15',
  ['sr']: 'categories=15',
};

const apiUrl = 'https://cvu.hardcode.solutions/wp-json/wp/v2/posts';

const requestUrl = `${apiUrl}?per_page=4&_embed&${languageCategory[languageCode]}`;

fetch(requestUrl)
  .then((response) => response.json())
  .then((posts) => {
    posts.map((post) => {
      console.log(post)
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
      document.getElementById('blog-latest').insertAdjacentHTML('beforeend', postElement);
    });
  })
  .catch((error) => console.error(error));
