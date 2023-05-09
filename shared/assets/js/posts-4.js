// Set the URL for the WordPress REST API endpoint
const apiUrl = 'https://cvu.hardcode.solutions/wp-json/wp/v2/posts';

// Set the request URL with parameters to retrieve the latest 5 posts
const requestUrl = `${apiUrl}?per_page=5&_embed`;

// Fetch the latest 5 blog posts
fetch(requestUrl)
  .then((response) => response.json())
  .then((posts) => {
    // Loop through the retrieved posts and create HTML for each post
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
      document.getElementByClass('blog-latest').insertAdjacentHTML('beforeend', postElement);
    });
  })
  .catch((error) => console.error(error));
