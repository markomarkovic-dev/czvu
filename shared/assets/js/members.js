const apiUrl = 'https://cvu.hardcode.solutions/wp-json/wp/v2/clanovi?_embed';

fetch(apiUrl)
  .then((response) => response.json())
  .then((member) => {
    member.map((member) => {
      const featureMediaImage = member._embedded['wp:featuredmedia'] ? member._embedded['wp:featuredmedia'][0].media_details.sizes.full.source_url : `${rootPathjs}shared/assets/images/no-image.svg`;

      const postElement = `                    
      <a href="clan/${member.slug}" class="members">
          <div class="member">
            <div class="member-photo">
              <img src="${featureMediaImage}" alt="" />
            </div>
            <div class="member-data">
              <p class="member-name">${member.title.rendered}</p>
              <p class="member-profession">${member.acf.pozicija}</p>
            </div>
          </div>
      </a>`;

    document.getElementById(member.acf.clanstvo === "clan" ? "members" : "founders").insertAdjacentHTML('beforeend', postElement);
    });
  })
  .catch((error) => console.error(error));