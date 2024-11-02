import { createHouseItemFromEndPoint } from "./utils.js";
import { loadDefaultProfileContent } from "./profile.js";

async function createMyAdsContent(targetWhenNavBack) {
  let headerContainer = document.createElement("div");
  headerContainer.classList.add(
    "d-flex",
    "flex-row-reverse",
    "justify-content-between"
  );
  headerContainer.style.padding = "10px";

  let title = document.createElement("h5");
  title.classList.add("text-secondary");
  title.textContent = "السكن المضاف";
  title.style.textAlign = "right";
  title.style.fontWeight = "600";
  headerContainer.appendChild(title);

  let backButton = document.createElement("i");
  backButton.classList.add("fa", "fa-chevron-left", "text-secondary");
  backButton.style.cursor = "pointer";
  backButton.addEventListener("click", () => {
    switch (targetWhenNavBack) {
      case "profile":
        loadDefaultProfileContent();
        break;
      case "my_ads":
        window.location.href = "my_ads.html";
        break;
    }
  });
  headerContainer.appendChild(backButton);

  let target = document.querySelector("#profile-body-container");
  target.innerHTML = "";
  target.appendChild(headerContainer);

  let adsContainer = document.createElement("div");
  adsContainer.classList.add("d-flex", "flex-column");
  const footerHeight = document.querySelector("footer").offsetHeight;
  const marginBottom = footerHeight * 2 + "px";
  adsContainer.style.marginBottom = marginBottom;

  let url = "https://api-dev.buytfinder.com/web/ads";

  async function fetchData() {
    try {
      const response = await fetch(url, {
        method: "GET",
        credentials: "include",
      });
      if (response.ok) {
        const data = await response.json();
        if (data.ads.length > 0) {
          for (let i = 0; i < data.ads.length; i++) {
            let ad = data.ads[i];
            createHouseItemFromEndPoint(
              ad,
              i,
              adsContainer,
              data.ads.length,
              true
            );
          }
        } else {
          adsContainer.innerHTML = "لا يوجد لديك أي مسكن";
        }
      }
    } catch (error) {
      console.error(error);
    }
  }

  await fetchData();

  target.appendChild(adsContainer);
}

export { createMyAdsContent };
