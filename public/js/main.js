// Import OL
let Map = ol.Map;
let View = ol.View;
let TileLayer = ol.layer.Tile;
let VectorLayer = ol.layer.Vector;
let OSM = ol.source.OSM;
let Cluster = ol.source.Cluster;
let VectorSource = ol.source.Vector;
let Feature = ol.Feature;
let Point = ol.geom.Point;
let CircleStyle = ol.style.Circle;
let Fill = ol.style.Fill;
let Stroke = ol.style.Stroke;
let Style = ol.style.Style;
let Text = ol.style.Text;
let fromLonLat = ol.proj.fromLonLat;
let map;
let clusterSource;
let pageNumber = 1;

import {
  createAssociationsContent,
  createHouseItem,
  getFilters,
  populateCities,
  populateGovernorates,
  createHouseItemFromEndPoint,
} from "./utils.js";
import { createDonationsContent } from "./donations.js";
import { checkIfLoggedIn } from "./auth.js";
import { buildUpHouseFormContent } from "./house-form.js";
import { createProfileContent } from "./profile.js";

let houses = [];
document.addEventListener("DOMContentLoaded", async function (event) {
  createButtonsAndMapContent();

  document.getElementById("main").addEventListener("click", function () {
    if (this.classList.contains("active")) {
      return;
    }
    createButtonsAndMapContent();
  });

  document
    .getElementById("organizations-btn")
    .addEventListener("click", function () {
      if (this.classList.contains("active")) {
        return;
      }
      createSearchContent("organizations");
    });

  document
    .getElementById("donations-btn")
    .addEventListener("click", function () {
      if (this.classList.contains("active")) {
        return;
      }
      document.getElementById("main-container").innerHTML = "";
      createDonationsContent();
    });

  document.getElementById("profile-btn").addEventListener("click", function () {
    if (this.classList.contains("active")) {
      return;
    }

    if (
      sessionStorage.getItem("loggedIn") != null &&
      sessionStorage.getItem("loggedIn") == "false"
    ) {
      window.location.href = "signin.html";
      return;
    }

    const container = document.getElementById("main-container");
    const loader = document.createElement("div");
    loader.classList.add("d-flex", "justify-content-center", "mt-5");
    loader.innerHTML = `<div class="spinner-border text-primary" role="status">
                          <span class="visually-hidden">Loading...</span>
                        </div>`;
    container.innerHTML = "";
    container.appendChild(loader);

    let url = "https://api-dev.buytfinder.com/web/profile";
    async function fetchProfileData() {
      try {
        const response = await fetch(url, {
          method: "GET",
          credentials: "include",
        });

        if (response.status === 200) {
          const data = await response.json();
          createProfileContent(data);
        }
      } catch (error) {
        console.error("Error:", error);
      }
    }

    fetchProfileData();
  });

  // document
  //   .querySelector(".container .add-house-btn")
  //   .addEventListener("click", function () {
  //     addHouseBtnAction();
  //   });

  document
    .querySelector(".bottom-nav-buttons button#bottom-nav-add-house")
    .addEventListener("click", function () {
      if (this.classList.contains("active")) return;
      addHouseBtnAction();
    });

  // document
  //   .querySelector(".bottom-nav-buttons button#bottom-nav-get-house")
  //   .addEventListener("click", function () {
  //     if (this.classList.contains("active")) return;

  //     createSearchContent("houses");
  //   });

  function addHouseBtnAction() {
    if (sessionStorage.getItem("loggedInUser") == null) {
      if (
        sessionStorage.getItem("loggedIn") != null &&
        sessionStorage.getItem("loggedIn") == "false"
      )
        window.location.href = "signin.html";
    } else {
      buildUpHouseFormContent("create", "home");
      document.querySelectorAll(".bottom-nav-buttons button").forEach((btn) => {
        if (btn.id == "bottom-nav-add-house") {
          btn.classList.add("active");
        } else {
          btn.classList.remove("active");
        }
      });
    }
  }

  if (
    sessionStorage.getItem("loggedIn") != null &&
    sessionStorage.getItem("loggedIn") == "true"
  ) {
    let user = JSON.parse(sessionStorage.getItem("loggedInUser"));
    document.getElementById("profile-name").innerHTML =
      user.firstName + " " + user.lastName;
  } else {
    // Check if user is logged in
    await checkIfLoggedIn();
  }
  document.querySelectorAll(".bottom-nav-buttons button").forEach((btn) => {
    btn.addEventListener("click", function () {
      if (this.classList.contains("active")) return;
      this.classList.add("active");
      this.parentElement.querySelectorAll("button").forEach((sibling) => {
        if (sibling !== this) sibling.classList.remove("active");
      });
    });
  });

  document.querySelectorAll(".dialog-filter-btn").forEach((button) => {
    button.addEventListener("click", function () {
      this.classList.add("active");
      document.querySelectorAll(".dialog-filter-btn").forEach((sibling) => {
        if (sibling !== this) sibling.classList.remove("active");
      });
      console.log(this.id);
    });
  });

  // Close the dialog
  document
    .getElementById("close-dialog")
    .addEventListener("click", function () {
      document.getElementById("feature-dialog").classList.remove("active");
    });
});

async function createButtonsAndMapContent() {
  // Clear the container first
  const container = document.getElementById("main-container");
  container.innerHTML = "";
  houses = [];

  // Create the button container div
  const btnsContainer = document.createElement("div");
  btnsContainer.classList.add("btns-container", "py-3");

  // Button data array
  const buttonsData = [
    { id: "shelters", text: "مراكز", filter: [4] },
    { id: "house", text: "سكن", filter: [1, 2, 3] },
    { id: "all", text: "الكل", filter: "all", isActive: true },
    { id: "search", icon: "fa-search", title: "search", isModal: true },
  ];

  // Create and append buttons based on the data
  buttonsData.forEach((buttonData) => {
    const button = document.createElement("button");
    button.classList.add("btn", "filter-btn");
    button.id = buttonData.id;

    if (buttonData.isActive) {
      button.classList.add("active");
    }

    if (buttonData.isModal) {
      button.setAttribute("title", buttonData.title);
      button.setAttribute("data-toggle", "modal");
      button.setAttribute("data-target", "#myModal");
      const icon = document.createElement("i");
      icon.classList.add("fa", buttonData.icon);
      const searchText = document.createElement("span");
      searchText.textContent = "أطلب سكن";
      searchText.classList.add("text-secondary");
      button.appendChild(searchText);
      button.appendChild(icon);
    } else {
      button.setAttribute("data-filter", buttonData.filter);
      button.textContent = buttonData.text;
    }

    if (buttonData.id === "search") {
      button.style.width = "100%";
      button.style.textAlign = "right";
      button.style.backgroundColor = "#f8f9fa";
      button.style.display = "flex";
      button.style.flexDirection = "row";
      button.style.alignItems = "center";
      button.style.justifyContent = "end";
      button.style.gap = "10px";
      button.style.borderRadius = "18px";
      button.addEventListener("click", () => {
        createSearchContent("houses");
      });
    }

    // Append the button to the button container
    btnsContainer.appendChild(button);
  });

  // Append the button container to the main container
  container.appendChild(btnsContainer);

  // Create the map div
  const mapDiv = document.createElement("div");
  mapDiv.id = "map";
  mapDiv.classList.add("map", "pb-3");
  const headerHeight = document.querySelector("header").clientHeight;
  const footerHeight = document.querySelector("footer").clientHeight;
  const filterButtonsHeight = btnsContainer.clientHeight;
  mapDiv.style.height = `calc(100vh - ${
    headerHeight + footerHeight + filterButtonsHeight
  }px)`;

  // Create the floating button
  const floatingBtn = document.createElement("button");
  floatingBtn.addEventListener("click", function () {
    createSearchContent("houses");
  });
  floatingBtn.classList.add("floating-btn");
  floatingBtn.setAttribute("data-toggle", "modal");
  floatingBtn.setAttribute("data-target", "#myModal");

  // Create and append the image
  const floatingBtnImage = document.createElement("img");
  floatingBtnImage.src = "assets/images/stream-signal.png";
  floatingBtnImage.alt = "stream-signal-image";
  floatingBtnImage.width = 35;
  floatingBtnImage.height = 30;
  floatingBtn.appendChild(floatingBtnImage);

  // Add text for the floating button
  floatingBtn.innerHTML += "<br>أطلب <br>سكن";

  // Append the floating button to the map div
  mapDiv.appendChild(floatingBtn);

  // Append the map div to the main container
  container.appendChild(mapDiv);

  // Handle filter buttons
  document.querySelectorAll(".filter-btn").forEach((button) => {
    button.addEventListener("click", function () {
      this.classList.add("active");
      document.querySelectorAll(".filter-btn").forEach((sibling) => {
        if (sibling !== this) sibling.classList.remove("active");
      });
      if (button.id === "search") return;
      filterMap();
    });
  });

  await initializeMap();
}

async function createSearchContent(type) {
  pageNumber = 1;
  document.getElementById("main").classList.remove("active");
  let container = document.getElementById("main-container");
  container.innerHTML = "";

  let headerDiv = document.createElement("div");
  headerDiv.classList.add(
    "d-flex",
    "justify-content-start",
    "align-items-center"
  );
  headerDiv.style.padding = "20px";
  headerDiv.style.paddingBottom = "0px";
  headerDiv.style.direction = "rtl";

  // Create the icon

  let iconElement = document.createElement("img");
  iconElement.src = "../assets/images/stream-signal.png";
  iconElement.width = 50;
  iconElement.style.borderRadius = "50%";
  iconElement.style.backgroundColor = "#f5f5f5";

  // Create the heading text
  let headingTextContainer = document.createElement("div");
  headingTextContainer.classList.add("d-flex", "flex-column");
  headingTextContainer.style.marginRight = "10px";

  let headingText = document.createElement("h5");
  headingText.innerText = "إبحث";

  let normalText = document.createElement("p");
  normalText.innerText = "إبحث عن طلبك في المناطق الآمنة";
  normalText.style.fontWeight = "bold";
  normalText.style.fontSize = "small";
  normalText.classList.add("text-secondary");

  headingTextContainer.appendChild(headingText);
  headingTextContainer.appendChild(normalText);

  // create the close button
  let closeButton = document.createElement("i");
  closeButton.classList.add("fa", "fa-times", "fa-2x", "text-secondary");
  closeButton.style.cursor = "pointer";
  closeButton.style.marginRight = "auto";
  closeButton.addEventListener("click", function () {
    container.innerHTML = "";
    document.getElementById("main").classList.add("active");
    document.getElementById("organizations-btn").classList.remove("active");

    createButtonsAndMapContent();
  });

  headerDiv.appendChild(iconElement);
  headerDiv.appendChild(headingTextContainer);
  headerDiv.appendChild(closeButton);

  let hr = document.createElement("hr");

  container.appendChild(headerDiv);
  container.appendChild(hr);

  let buttonsContainer = document.createElement("div");
  buttonsContainer.classList.add("d-flex", "justify-content-start");
  buttonsContainer.style.direction = "rtl";
  buttonsContainer.style.gap = "10px";
  buttonsContainer.style.paddingRight = "20px";

  const houseButton = document.createElement("button");
  houseButton.classList.add("btn", "houses-btn");
  houseButton.id = "houses-btn";
  houseButton.textContent = "سكن";
  houseButton.addEventListener("click", async function () {
    type = "houses";
    pageNumber = 1;
    this.classList.toggle("active");
    document.getElementById("organizations-btn").classList.remove("active");
    document.getElementById("input-divs-container").innerHTML = "";
    await createHousesContent(document.getElementById("input-divs-container"));
    await populateGovernorates("get-house-governorates", false, null);
    await populateCities("04", "get-house-cities");
  });

  const associationsButton = document.createElement("button");
  associationsButton.classList.add("btn", "associations-btn");
  associationsButton.id = "organizations-btn";
  associationsButton.textContent = "جمعيات";
  associationsButton.addEventListener("click", async function () {
    type = "organizations";
    this.classList.toggle("active");
    document.getElementById("houses-btn").classList.remove("active");
    document.getElementById("input-divs-container").innerHTML = "";
    await createOrganizationsContent(
      document.getElementById("input-divs-container")
    );
    await populateGovernorates("get-house-governorates", false, null);
    await populateCities("04", "get-house-cities");
  });

  if (type === "houses") {
    houseButton.classList.add("active");
  } else if (type === "organizations") {
    associationsButton.classList.add("active");
  }

  buttonsContainer.appendChild(houseButton);
  buttonsContainer.appendChild(associationsButton);
  container.appendChild(buttonsContainer);

  let inputsDivContainer = document.createElement("div");
  inputsDivContainer.id = "input-divs-container";
  inputsDivContainer.style.gap = "20px";
  inputsDivContainer.style.marginBottom = "100px";
  inputsDivContainer.classList.add("d-flex", "flex-column");

  container.appendChild(inputsDivContainer);
  switch (type) {
    case "houses":
      await createHousesContent(inputsDivContainer);
      break;
    case "organizations":
      await createOrganizationsContent(inputsDivContainer);
      break;
  }

  if (type === "houses" && houses.length > 20) {
    let loadMoreBtn = document.createElement("button");
    loadMoreBtn.id = "load-more-btn";
    loadMoreBtn.classList.add("btn");
    loadMoreBtn.style.width = "100%";
    loadMoreBtn.style.backgroundColor = "rgb(0 179 201)";
    loadMoreBtn.style.color = "white";
    loadMoreBtn.textContent = "اظهار المزيد";
    loadMoreBtn.style.margin = "20px auto";
    loadMoreBtn.style.position = "relative";
    loadMoreBtn.style.bottom = "95px";
    loadMoreBtn.addEventListener("click", async function () {
      if (type === "houses") {
        this.innerHTML = `<div class="d-flex justify-content-center"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>`;
        this.disabled = true;
        await fetchHousesPaginated(
          getFilters(),
          document.getElementById("houses-container"),
          pageNumber
        );
        this.innerHTML = "اظهار المزيد";
        this.disabled = false;
      } else if (type === "organizations") {
        await createOrganizationsContent(inputsDivContainer);
      }
    });
    container.appendChild(loadMoreBtn);
  }

  await populateGovernorates("get-house-governorates", false, null);
  //await populateCities("04", "get-house-cities"); // temporary hide
}

function hidePriceInputs() {
  let priceInputs = document.getElementById("price-input");
  let priceSpan = document.getElementById("price-label");

  if (!priceInputs.classList.contains("d-none")) {
    priceInputs.classList.add("d-none");
  }
  if (!priceSpan.classList.contains("d-none")) {
    priceSpan.classList.add("d-none");
  }
}

function showPriceInputs() {
  let priceInputs = document.getElementById("price-input");
  let priceSpan = document.getElementById("price-label");

  if (priceInputs.classList.contains("d-none")) {
    priceInputs.classList.remove("d-none");
  }
  if (priceSpan.classList.contains("d-none")) {
    priceSpan.classList.remove("d-none");
  }
}

function hideRoomsInputs() {
  let roomsInputs = document.getElementById("rooms-input");
  let roomsSpan = document.getElementById("rooms-label");

  if (!roomsInputs.classList.contains("d-none")) {
    roomsInputs.classList.add("d-none");
  }
  if (!roomsSpan.classList.contains("d-none")) {
    roomsSpan.classList.add("d-none");
  }
}

function showRoomsInputs() {
  let roomsInputs = document.getElementById("rooms-input");
  let roomsSpan = document.getElementById("rooms-label");

  if (roomsInputs.classList.contains("d-none")) {
    roomsInputs.classList.remove("d-none");
  }
  if (roomsSpan.classList.contains("d-none")) {
    roomsSpan.classList.remove("d-none");
  }
}

async function createHousesContent(target) {
  let loadMoreBtn = document.querySelector(
    "#main-container > button#load-more-btn"
  );
  if (loadMoreBtn) {
    loadMoreBtn.style.display = "block";
  }
  if (document.getElementById("load-more-btn")) {
    document.getElementById("load-more-btn").style.display = "none";
  }
  let inputDiv = document.createElement("div");
  inputDiv.classList.add(
    "text-secondary",
    "d-flex",
    "flex-column",
    "form-group",
    "gap-2",
    "text-secondary"
  );
  inputDiv.style.marginTop = "20px";
  inputDiv.style.direction = "rtl";
  inputDiv.style.padding = "0px 20px 20px 20px";

  let houseTypeInput = document.createElement("select");
  houseTypeInput.classList.add("form-control", "text-secondary", "d-none"); //temporary hide
  houseTypeInput.id = "house-type-input";
  houseTypeInput.innerHTML =
    "<option class='text-secondary' value= '' selected>نوع السكن(مجاني/مدفوع/مركز)</option>" +
    "<option class='text-secondary' value='free'>مجاني</option>" +
    "<option class='text-secondary' value='paid'>مدفوع</option>" +
    houseTypeInput.addEventListener("change", () => {
      if (houseTypeInput.value === "free") {
        hidePriceInputs();
        showRoomsInputs();
      } else if (houseTypeInput.value === "paid") {
        showPriceInputs();
        showRoomsInputs();
      }
    });

  let governoratesSelect = document.createElement("select");
  governoratesSelect.classList.add("form-control", "text-secondary");
  governoratesSelect.id = "get-house-governorates";
  governoratesSelect.innerHTML =
    "<option value = '' selected>المحافظة</option>";

  // governoratesSelect.addEventListener("change", () => {
  //   populateCities(
  //     document.getElementById("get-house-governorates").value,
  //     "get-house-cities"
  //   );
  // }); // temporary hide

  let citiesSelect = document.createElement("select");
  citiesSelect.classList.add("form-control", "text-secondary", "d-none"); // temporary hide
  citiesSelect.id = "get-house-cities";
  citiesSelect.innerHTML = "<option value = '' selected>البلدة</option>";

  let roomsNumberInput = document.createElement("span");
  roomsNumberInput.classList.add("text-secondary", "d-none"); // temporary hide
  roomsNumberInput.id = "rooms-label";
  roomsNumberInput.textContent = "عدد الغرف";

  let fromToDiv = document.createElement("div");
  fromToDiv.classList.add("d-flex", "gap-2", "align-items-center", "d-none"); // temporary hide
  fromToDiv.id = "rooms-input";
  fromToDiv.style.direction = "rtl";

  let fromRoomsNumber = document.createElement("input");
  fromRoomsNumber.classList.add("form-control", "text-secondary");
  fromRoomsNumber.type = "number";
  fromRoomsNumber.id = "from-rooms-number";

  let fromRoomsSpan = document.createElement("span");
  fromRoomsSpan.classList.add("text-secondary");
  fromRoomsSpan.textContent = "من";

  fromToDiv.appendChild(fromRoomsSpan);
  fromToDiv.appendChild(fromRoomsNumber);

  let toRoomsNumber = document.createElement("input");
  toRoomsNumber.classList.add("form-control", "text-secondary");
  toRoomsNumber.type = "number";
  toRoomsNumber.id = "to-rooms-number";

  let toRoomsSpan = document.createElement("span");
  toRoomsSpan.classList.add("text-secondary");
  toRoomsSpan.textContent = "الى";

  fromToDiv.appendChild(toRoomsSpan);
  fromToDiv.appendChild(toRoomsNumber);

  let priceNumberSpan = document.createElement("span");
  priceNumberSpan.classList.add("text-secondary", "d-none"); // temporary hide
  priceNumberSpan.id = "price-label";
  priceNumberSpan.textContent = "السعر";

  let fromToPriceDiv = document.createElement("div");
  fromToPriceDiv.classList.add(
    "d-flex",
    "gap-2",
    "align-items-center",
    "d-none"
  ); // temporary hide
  fromToPriceDiv.id = "price-input";
  fromToPriceDiv.style.direction = "rtl";

  let fromPriceInput = document.createElement("input");
  fromPriceInput.classList.add("form-control", "text-secondary");
  fromPriceInput.type = "number";
  fromPriceInput.id = "from-price-number";

  let fromPriceSpan = document.createElement("span");
  fromPriceSpan.classList.add("text-secondary");
  fromPriceSpan.textContent = "من";

  fromToPriceDiv.appendChild(fromPriceSpan);
  fromToPriceDiv.appendChild(fromPriceInput);

  let toPriceInput = document.createElement("input");
  toPriceInput.classList.add("form-control", "text-secondary");
  toPriceInput.type = "number";
  toPriceInput.id = "to-price-number";

  let toPriceSpan = document.createElement("span");
  toPriceSpan.classList.add("text-secondary");
  toPriceSpan.textContent = "الى";

  fromToPriceDiv.appendChild(toPriceSpan);
  fromToPriceDiv.appendChild(toPriceInput);

  inputDiv.appendChild(houseTypeInput);
  inputDiv.appendChild(governoratesSelect);
  inputDiv.appendChild(citiesSelect);
  inputDiv.appendChild(roomsNumberInput);
  inputDiv.appendChild(fromToDiv);
  inputDiv.appendChild(priceNumberSpan);
  inputDiv.appendChild(fromToPriceDiv);

  target.appendChild(inputDiv);

  const button = document.createElement("button");
  button.classList.add("btn", "text-light", "w-100", "fs-6");
  button.textContent = "إبحث عن طلبك";
  button.type = "button";
  button.style.backgroundColor = "rgb(0 179 201)";
  button.style.marginBottom = "30px";

  button.addEventListener("click", async () => {
    pageNumber = 1;
    let filters = getFilters();

    fetchHousesPaginated(
      filters,
      document.getElementById("houses-container"),
      pageNumber
    );
  });
  target.appendChild(button);

  let housesParentElement = document.createElement("div");
  housesParentElement.id = "houses-container";
  housesParentElement.style.textAlign = "center";
  const loader = document.createElement("div");
  loader.classList.add("d-flex", "justify-content-center", "mt-5");
  loader.innerHTML = `<div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                      </div>`;
  target.appendChild(loader);

  await fetchHousesPaginated({}, housesParentElement, pageNumber);

  target.removeChild(loader);

  target.appendChild(housesParentElement);
  if (document.getElementById("load-more-btn") != null) {
    document.getElementById("load-more-btn").style.display = "block";
  }
}

async function fetchHousesPaginated(filters, target, page) {
  let url = `https://api-dev.buytfinder.com/web/filtered_public_ads?filters=${JSON.stringify(
    filters
  )}&page=${page}`;
  try {
    const response = await fetch(url);
    if (response.status == 200) {
      const data = await response.json();
      if (page != null && page == 1) {
        if (data.ads.length == 0) {
          target.innerHTML = "لا يوجد نتائج للبحث";
          if (
            document.getElementById("load-more-btn").style.display != "none"
          ) {
            document.getElementById("load-more-btn").style.display = "none";
          }
          return;
        } else {
          target.innerHTML = "";
        }
      }
      data.ads.forEach((feature, index) => {
        createHouseItemFromEndPoint(feature, index, target, data.ads.length);
      });
      if (page == data.totalPages) {
        document.getElementById("load-more-btn").style.display = "none";
        return;
      } else if (document.getElementById("load-more-btn") != null) {
        document.getElementById("load-more-btn").style.display = "block";
      }
      pageNumber++;
    }
  } catch (error) {
    console.error(error);
  }
}

async function createOrganizationsContent(target) {
  let loadMoreBtn = document.querySelector(
    "#main-container > button#load-more-btn"
  );
  if (loadMoreBtn) {
    loadMoreBtn.style.display = "none";
  }

  let inputDiv = document.createElement("div");
  inputDiv.classList.add(
    "text-secondary",
    "d-flex",
    "flex-column",
    "form-group",
    "gap-2",
    "text-secondary"
  );
  inputDiv.style.marginTop = "20px";
  inputDiv.style.direction = "rtl";
  inputDiv.style.padding = "0px 20px 20px 20px";

  let governoratesSelect = document.createElement("select");
  governoratesSelect.classList.add("form-control", "text-secondary", "d-none"); //temporary hide
  governoratesSelect.id = "get-house-governorates";
  governoratesSelect.innerHTML =
    "<option value = '' selected>المحافظة</option>";

  governoratesSelect.addEventListener("change", () => {
    populateCities(
      document.getElementById("get-house-governorates").value,
      "get-house-cities"
    );
  });

  let citiesSelect = document.createElement("select");
  citiesSelect.classList.add("form-control", "text-secondary", "d-none"); //temporary hide
  citiesSelect.id = "get-house-cities";
  citiesSelect.innerHTML = "<option value='' selected>البلدة</option>";

  inputDiv.appendChild(governoratesSelect);
  inputDiv.appendChild(citiesSelect);

  target.appendChild(inputDiv);

  const button = document.createElement("button");
  button.classList.add("btn", "text-light", "w-100", "fs-6", "d-none"); // temporary hide
  button.textContent = "إبحث عن طلبك";
  button.type = "button";
  button.id = "organizations-search-btn";
  button.style.backgroundColor = "rgb(0 179 201)";
  button.style.marginBottom = "30px";

  button.addEventListener("click", () => {});
  target.appendChild(button);

  createAssociationsContent(target);
}

function createFeature(ad) {
  let longitude = Number(ad.longitude.replace(",", "."));
  let latitude = Number(ad.latitude.replace(",", "."));
  const feature = new Feature(new Point(fromLonLat([longitude, latitude])));
  feature.set("id", ad.id);
  feature.set("type", ad.free == 1 ? "free" : "rental");
  feature.set("isFree", ad.free == 1 ? true : false);
  feature.set("categoryId", ad.categoryId);
  feature.set("title", ad.title);
  feature.set("governorate", ad.governorateNameAr);
  feature.set("internalAddress", ad.nameAr);
  feature.set("numberOfRooms", ad.rooms);
  feature.set("country", feature.country);
  feature.set("phoneNumber", ad.supplierTel);
  feature.set("area", ad.area);
  feature.set("furnitured", ad.furnished);
  feature.set("rental", Number(ad.price));

  return feature;
}

async function initializeMap() {
  let url = "https://api-dev.buytfinder.com/web/public_ads";
  const response = await fetch(url);
  const features = await response.json();
  for (const house of features.ads) {
    houses.push(createFeature(house));
  }

  // Coordinates center for the example (let's use Lebanon as an example center)
  const centerCoordinates = [35.507754, 33.893791]; // longitude, latitude

  // Transform center coordinates to map projection
  const center = fromLonLat(centerCoordinates);

  // Vector source holding the points
  const source = new VectorSource({
    features: houses,
  });

  // Cluster source
  clusterSource = new Cluster({
    distance: 50, // Pixels between points to cluster
    source: source,
  });

  // Style for clustered features
  const clusterStyle = (feature) => {
    const size = feature.get("features").length;
    const style = new Style({
      image: new CircleStyle({
        radius: size > 1 ? 15 : 15,
        fill: new Fill({ color: size > 1 ? "#FF5733" : "#3388FF" }),
        stroke: new Stroke({
          color: "#fff",
          width: 2,
        }),
      }),
      text: new Text({
        text:
          size > 1
            ? size.toString()
            : feature.getProperties().features[0].getProperties().type ===
              "free"
            ? "مجانا"
            : feature
                .getProperties()
                .features[0].getProperties()
                .rental.toString() + "$",
        fill: new Fill({ color: "#fff" }),
      }),
    });
    return style;
  };

  // Layer for the clustered points
  const clusterLayer = new VectorLayer({
    source: clusterSource,
    style: clusterStyle,
  });

  // Base map layer (OpenStreetMap)
  const baseLayer = new TileLayer({
    source: new OSM(),
  });

  // View
  const view = new View({
    center: center,
    zoom: 7,
  });

  // Initialize map
  map = new Map({
    target: "map",
    layers: [baseLayer, clusterLayer],
    view: view,
  });

  if (houses.length > 0) {
    const extent = source.getExtent();
    view.fit(extent, { padding: [20, 20, 20, 20], maxZoom: 15 });
  }
  // Handle click on cluster points
  map.on("click", function (event) {
    map.forEachFeatureAtPixel(event.pixel, function (feature) {
      const clusteredFeatures = feature.get("features");
      if (clusteredFeatures && clusteredFeatures.length > 0) {
        // Open the dialog and populate the select element with features in the cluster
        openFeatureDialog(clusteredFeatures);
      }
    });
  });
}

async function filterMap() {
  let activeButton = document.querySelector(".filter-btn.active");

  let selectedFilter = activeButton.getAttribute("data-filter");
  let url = "https://api-dev.buytfinder.com/web/public_ads";

  if (selectedFilter === "all") {
    const response = await fetch(url);
    const features = await response.json();
    houses = [];
    for (const house of features.ads) {
      houses.push(createFeature(house));
    }

    clusterSource.getSource().clear();
    clusterSource.getSource().addFeatures(houses);
  } else {
    selectedFilter = selectedFilter.split(",");
    url = `${url}?filters={"categoryId":[${selectedFilter}]}`;
    const response = await fetch(url);
    const features = await response.json();
    houses = [];
    for (const house of features.ads) {
      houses.push(createFeature(house));
    }
    clusterSource.getSource().clear();
    clusterSource.getSource().addFeatures(houses);
  }
  map.render();
  if (houses.length > 0) {
    map.getView().fit(clusterSource.getSource().getExtent(), {
      padding: [20, 20, 20, 20],
      maxZoom: 15,
    });
  }
  // Update the map to reflect the changes
}

function openFeatureDialog(features) {
  const featureDialog = document.getElementById("feature-dialog");
  const featureDialogContent = document.getElementById(
    "feature-dialog-content"
  );
  const dialogTitle = document.getElementById("dialog-title");
  if (features.length !== 0) {
    const feature = features[0];
    const governorate = feature.get("governorate");
    dialogTitle.textContent = `${governorate} (${features.length})`;
  }

  // Clear previous options
  featureDialogContent.innerHTML = "";
  featureDialogContent.scrollTo({ top: 0, behavior: "instant" });
  // Add each feature to the dialog content
  features.forEach((feature, index) => {
    createHouseItem(feature, featureDialogContent);
  });

  // Show the dialog
  featureDialog.classList.add("active");
}

export { createButtonsAndMapContent };
