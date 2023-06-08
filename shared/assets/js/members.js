const apiUrl = 'https://cvu.hardcode.solutions/wp-json/wp/v2/clanovi?_embed';

fetch(apiUrl)
  .then((response) => response.json())
  .then((member) => {
    member.map((member) => {

      console.log(member.slug)

      fetch(member._links["wp:featuredmedia"][0].href)
        .then((response) => response.json())
        .then((photo) => {
          const featuredImageUrl = photo.guid.rendered;

          const postElement = `                    
          <a href="clan/${member.slug}" class="members">
              <div class="member">
                <div class="member-photo">
                  <img src="${featuredImageUrl}" alt="" />
                </div>
                <div class="member-data">
                  <p class="member-name">${member.title.rendered}</p>
                  <p class="member-profession">${member.acf.pozicija}</p>
                </div>
              </div>
          </a>`;
  
        document.getElementById(member.acf.clanstvo === "clan" ? "members" : "founders").insertAdjacentHTML('beforeend', postElement);
      })
    });
  })
  .catch((error) => console.error(error));