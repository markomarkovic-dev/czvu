const languageCode = document.documentElement.lang;

const languageCategory = {
  ["en"]: "categories=24",
  ["sr"]: "categories=24",
};

const apiUrl = "https://cvu.hardcode.solutions/wp-json/wp/v2/projekti";

const requestUrl = `${apiUrl}?${languageCategory[languageCode]}&_embed`;

// Loader
// const loader = document.getElementById('loader');
// loader.style.display = 'flex';

function galleryImage() {
  $(document).ready(function () {
    $(".gallery-item a").click(function (event) {
      event.preventDefault();

      var imageUrl = $(this).children("img").attr("src");

      openImageModal(imageUrl);
    });

    function openImageModal(imageUrl) {
      var modal = $('<div class="image-modal"></div>');
      var modalImage = $("<img>").attr("src", imageUrl);

      modal.append(modalImage);
      $("body").append(modal);

      modal.click(function () {
        $(this).remove();
      });
    }
  });
}

fetch(requestUrl)
  .then((response) => response.json())
  .then((data) => {
    const post = data[0];
    const featureMediaImage = post._embedded['wp:featuredmedia'] ? post._embedded['wp:featuredmedia'][0].source_url : `${rootPathjs}shared/assets/images/no-image.svg`;

    const postElement = `
    <a href="${languageCode === "en" ? "project" : "projekat"}/${
      post.slug
    }" class="block-link" id="theatre-festival">
      <div class="block-link-left">
        <h2>${post.title.rendered}</h2>
          <h3>${post.acf.podnaslov}</h3>
        </div>
        <div class="block-link-right">
            <i class="ri-arrow-right-up-line"></i>
        </div>
        <img src="${featureMediaImage}" class="image-background"/>
    </a>`;
    document
      .getElementById("projects")
      .insertAdjacentHTML("beforeend", postElement);
    // loader.style.display = 'none';
    galleryImage();
  })
  .catch((error) => console.error(error));
