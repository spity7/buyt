import { buildUpHouseFormContent } from "./house-form.js";

document.addEventListener("DOMContentLoaded", function () {
  let confirmationModalYesBtn = document.getElementById(
    "confirmation-modal-yes"
  );
  confirmationModalYesBtn.addEventListener("click", async function () {
    let featureId = document
      .getElementById("confirmation-modal")
      .getAttribute("data-id");

    let isDeleting =
      document
        .getElementById("confirmation-modal")
        .getAttribute("data-is-deleting") === "true";
    if (isDeleting) {
      await deleteFeature(featureId);
      return;
    }

    let isPublishing =
      document
        .getElementById("confirmation-modal")
        .getAttribute("data-is-publishing") === "true";
    await togglePublishFeature(featureId, isPublishing);
  });
});

function createHouseItem(feature, featureDialogContent) {
  let element = document.createElement("div");
  element.addEventListener("click", function () {
    let modal = new bootstrap.Modal(
      document.getElementById("single-house-modal")
    );
    modal.show();
    createSingleHouseItem(feature.getProperties().id);
  });

  element.classList.add("flex-col", "mb-3");

  let firstDiv = document.createElement("div");
  firstDiv.classList.add("flex-row");

  let secondDiv = document.createElement("div");
  secondDiv.classList.add("flex-row");

  let thirdDiv = document.createElement("div");
  thirdDiv.classList.add("flex-row");
  thirdDiv.style.gap = "10px";

  // first div
  let firstDivFirstCol = document.createElement("div");
  firstDivFirstCol.innerHTML = `<span class="element-title">${
    feature.getProperties().title
  }</span>`;

  let firstDivSecondCol = document.createElement("div");
  firstDivSecondCol.innerHTML =
    feature.getProperties().furnitured == 1
      ? '<span class="text-success furnitured-badge" >مفروشة</span>'
      : '<span class="text-danger furnitured-badge" >غير مفروشة</span>';

  let firstDivThirdCol = document.createElement("div");
  firstDivThirdCol.classList.add("text-danger", "rental-price-element");
  firstDivThirdCol.innerHTML =
    feature.getProperties().type === "rental"
      ? `<span class="text-danger fs-3">${
          feature.getProperties().rental
        }$</span>`
      : '<span class="text-secondary fs-3">مجانا</span>';

  firstDiv.append(firstDivFirstCol, firstDivSecondCol, firstDivThirdCol);

  // second div
  let secondDivCol = document.createElement("div");
  secondDivCol.innerHTML = `${
    feature.getProperties().internalAddress
  } <i class="fa fa-map-marker"></i>`;

  secondDiv.append(secondDivCol);

  // third div
  let thirdDivFirstCol = document.createElement("div");
  thirdDivFirstCol.classList.add("nb-of-rooms-element");
  thirdDivFirstCol.textContent = `غرف ${feature.getProperties().numberOfRooms}`;

  let moreDetailsLink = document.createElement("a");
  moreDetailsLink.addEventListener("click", () => {
    createSingleHouseItem(feature.getProperties().id);
  });
  moreDetailsLink.classList.add("more-details-link");
  moreDetailsLink.innerHTML = "...المزيد";

  let whatsAppBtn = document.createElement("a");
  whatsAppBtn.href = `https://wa.me/+961${feature
    .getProperties()
    .phoneNumber.replace(/\s/g, "")}`;
  whatsAppBtn.target = "_blank";
  whatsAppBtn.classList.add("btn", "whatsapp-action-btn");
  whatsAppBtn.innerHTML = `<i class="fa fa-whatsapp"></i>`;

  let callBtn = document.createElement("a");
  callBtn.href = `tel:+961${feature
    .getProperties()
    .phoneNumber.replace(/\s/g, "")}`;
  callBtn.target = "_blank";
  callBtn.classList.add("btn", "call-action-btn");
  callBtn.innerHTML = `<i class="fa fa-phone"></i>`;

  let thirdDivSecondCol = document.createElement("div");
  thirdDivSecondCol.classList.add("area-element");
  thirdDivSecondCol.textContent = `${feature.getProperties().area} sqm`;

  let thirdDivThirdCol = document.createElement("div");
  thirdDivThirdCol.style.marginRight = "auto";
  thirdDivThirdCol.append(callBtn, whatsAppBtn, moreDetailsLink);
  thirdDiv.append(thirdDivFirstCol, thirdDivSecondCol, thirdDivThirdCol);

  // append
  element.append(firstDiv, secondDiv, thirdDiv);
  featureDialogContent.append(element);
}

function createHouseItemFromEndPoint(
  feature,
  index,
  target,
  dataLength,
  myAds = false
) {
  let element = document.createElement("div");
  element.addEventListener("click", () => {
    let modal = new bootstrap.Modal(
      document.getElementById("single-house-modal")
    );
    modal.show();
    createSingleHouseItem(feature.id);
  });
  element.classList.add("flex-col");
  element.style.marginTop = "20px";
  element.id = `item-${feature.id}`;

  let firstDiv = document.createElement("div");
  firstDiv.classList.add("flex-row");

  let secondDiv = document.createElement("div");
  secondDiv.classList.add("flex-row");

  let thirdDiv = document.createElement("div");
  thirdDiv.classList.add("flex-row");
  thirdDiv.style.gap = "10px";

  // first div
  let firstDivFirstCol = document.createElement("div");
  firstDivFirstCol.innerHTML = `<span class="element-title">${feature.title}</span>`;

  let firstDivSecondCol = document.createElement("div");
  firstDivSecondCol.innerHTML =
    feature.furnished == 1
      ? '<span class="text-success furnitured-badge" >مفروشة</span>'
      : '<span class="text-danger furnitured-badge" >غير مفروشة</span>';

  let firstDivThirdCol = document.createElement("div");
  firstDivThirdCol.classList.add("text-danger", "rental-price-element");
  firstDivThirdCol.innerHTML =
    feature.free == "0"
      ? `<span class="text-danger fs-3">${Number(feature.price)}$</span>`
      : '<span class="text-secondary fs-3">مجانا</span>';

  firstDiv.append(firstDivFirstCol, firstDivSecondCol, firstDivThirdCol);

  // second div
  let secondDivCol = document.createElement("div");
  secondDivCol.innerHTML = `${feature.nameAr} <i class="fa fa-map-marker"></i>`;

  secondDiv.append(secondDivCol);

  // third div
  let thirdDivFirstCol = document.createElement("div");
  thirdDivFirstCol.classList.add("nb-of-rooms-element");
  thirdDivFirstCol.textContent = `غرف ${feature.rooms}`;

  let thirdDivSecondCol = document.createElement("div");
  thirdDivSecondCol.classList.add("area-element", "d-none");
  thirdDivSecondCol.textContent = `${feature.area} sqm`;

  thirdDiv.append(thirdDivFirstCol, thirdDivSecondCol);

  let thirdDivThirdCol = document.createElement("div");
  thirdDivThirdCol.style.marginRight = "auto";

  if (!myAds) {
    let moreDetailsLink = document.createElement("a");
    moreDetailsLink.addEventListener("click", () => {});
    moreDetailsLink.classList.add("more-details-link");
    moreDetailsLink.innerHTML = "...المزيد";

    let whatsAppBtn = document.createElement("a");
    whatsAppBtn.href = `https://wa.me/+961${feature.supplierTel.replace(
      /\s/g,
      ""
    )}`;
    whatsAppBtn.target = "_blank";
    whatsAppBtn.classList.add("btn", "whatsapp-action-btn");
    whatsAppBtn.innerHTML = `<i class="fa fa-whatsapp"></i>`;

    let callBtn = document.createElement("a");
    callBtn.href = `tel:+961${feature.supplierTel.replace(/\s/g, "")}`;
    callBtn.target = "_blank";
    callBtn.classList.add("btn", "call-action-btn");
    callBtn.innerHTML = `<i class="fa fa-phone"></i>`;

    thirdDivThirdCol.append(callBtn, whatsAppBtn, moreDetailsLink);
  } else {
    let deleteBtn = document.createElement("a");
    deleteBtn.classList.add("btn", "delete-ad-btn");
    deleteBtn.innerHTML = `<i class="fa fa-trash"></i>`;

    deleteBtn.addEventListener("click", (e) => {
      e.stopPropagation();
      let modal = new bootstrap.Modal(
        document.getElementById("confirmation-modal")
      );

      document.querySelector("#confirmation-modal h4.modal-title").innerHTML =
        "حذف السكن";
      document.querySelector("#confirmation-modal div.modal-body").innerHTML =
        "هل لأنت متأكد؟";

      document.querySelector("#confirmation-modal").dataset.id = feature.id;
      document.querySelector("#confirmation-modal").dataset.isDeleting = true;

      modal.show();
    });

    thirdDivThirdCol.append(deleteBtn);

    let editBtn = document.createElement("a");
    editBtn.classList.add("btn", "edit-ad-btn");
    editBtn.innerHTML = `<i class="fa fa-edit"></i>`;
    editBtn.style.marginLeft = "10px";

    editBtn.addEventListener("click", async (e) => {
      e.stopPropagation();
      await buildUpHouseFormContent("edit", "my_ads", feature.id);
      document.querySelectorAll(".bottom-nav-buttons button").forEach((btn) => {
        if (btn.id == "bottom-nav-add-house") {
          btn.classList.add("active");
        } else {
          btn.classList.remove("active");
        }
      });

      let url = `https://api-dev.buytfinder.com/web/ads/${feature.id}`;
      let response = await fetch(url, {
        method: "GET",
        headers: {
          "Content-Type": "application/json",
        },
        credentials: "include",
      });
      if (response.ok) {
        let data = await response.json();
        document.getElementById("name").value = data.supplierName;
        document.getElementById("phone").value = data.supplierTel;
        document.getElementById("type").value = data.title;
        document.getElementById("rooms-no").value = data.rooms;
        document.getElementById("add-house-governorate").value =
          data.governorateId;
        await populateCities(data.governorateId, "add-house-cities", true);
        document.getElementById("add-house-cities").value = data.cityId + "";
        document.getElementById("free-or-paid").value = data.free;
        document.getElementById("is-furnished").value = data.furnished;
        if (data.free == 1) {
          document.getElementById("price").classList.add("d-none");
        } else {
          document.getElementById("price").value = data.price;
        }
        document.getElementById("notes").value = data.description;
        document.getElementById("category").value = data.categoryId;
        document.getElementById("area").value = data.area;
        document.querySelector(
          "input[type=checkbox].form-check-input"
        ).checked = data.haveWhatsapp == 1;
      }
    });

    thirdDivThirdCol.append(editBtn);

    let unpublishBtn = document.createElement("a");
    unpublishBtn.classList.add("btn", "unpublish-ad-btn");
    if (feature.status == 2) {
      unpublishBtn.classList.add("d-none");
    }
    unpublishBtn.innerHTML = `<i class="fa fa-eye-slash"></i>`;
    unpublishBtn.style.marginLeft = "10px";

    unpublishBtn.addEventListener("click", (e) => {
      e.stopPropagation();
      let modal = new bootstrap.Modal(
        document.getElementById("confirmation-modal")
      );

      document.querySelector("#confirmation-modal h4.modal-title").innerHTML =
        "إلغاء النشر";
      document.querySelector("#confirmation-modal div.modal-body").innerHTML =
        "هل لأنت متأكد؟";
      document.querySelector("#confirmation-modal").dataset.id = feature.id;
      document.querySelector(
        "#confirmation-modal"
      ).dataset.isPublishing = false;
      document.querySelector("#confirmation-modal").dataset.isDeleting = false;

      modal.show();
    });

    thirdDivThirdCol.append(unpublishBtn);
    let publishBtn = document.createElement("a");
    publishBtn.classList.add("btn", "publish-ad-btn");
    if (feature.status == 1) {
      publishBtn.classList.add("d-none");
    }
    publishBtn.innerHTML = `<i class="fa fa-eye"></i>`;
    publishBtn.style.marginLeft = "10px";

    publishBtn.addEventListener("click", (e) => {
      e.stopPropagation();
      let modal = new bootstrap.Modal(
        document.getElementById("confirmation-modal")
      );

      document.querySelector("#confirmation-modal h4.modal-title").innerHTML =
        "نشر السكن";
      document.querySelector("#confirmation-modal div.modal-body").innerHTML =
        "هل أنت متأكد؟";
      document.querySelector("#confirmation-modal").dataset.id = feature.id;
      document.querySelector("#confirmation-modal").dataset.isPublishing = true;
      document.querySelector("#confirmation-modal").dataset.isDeleting = false;

      modal.show();
    });

    thirdDivThirdCol.append(publishBtn);
  }

  thirdDiv.append(thirdDivThirdCol);

  // append
  element.append(firstDiv, secondDiv, thirdDiv);
  target.appendChild(element);
}

async function togglePublishFeature(featureId, isPublishing) {
  let url = `https://api-dev.buytfinder.com/web/ads/${featureId}/${
    isPublishing ? "publish" : "unpublish"
  }`;

  const response = await fetch(url, {
    method: "PUT",
    headers: {
      "Content-Type": "application/json",
    },
    credentials: "include",
  });

  if (response.ok) {
    let selector = `div#item-${featureId}`;
    const featureElement = document.querySelector(selector);
    let publishBtn = featureElement.querySelector(".publish-ad-btn");
    let unpublishBtn = featureElement.querySelector(".unpublish-ad-btn");
    if (isPublishing) {
      publishBtn.classList.add("d-none");
      unpublishBtn.classList.remove("d-none");
    } else {
      publishBtn.classList.remove("d-none");
      unpublishBtn.classList.add("d-none");
    }
  } else {
    document.querySelector("#confirmation-modal div.modal-body").innerHTML =
      "!حدث خطأ ما";
  }
}

async function deleteFeature(featureId) {
  let url = `https://api-dev.buytfinder.com/web/ads/${featureId}`;

  const response = await fetch(url, {
    method: "DELETE",
    headers: {
      "Content-Type": "application/json",
    },
    credentials: "include",
  });

  if (response.ok) {
    document.querySelector(`#item-${featureId}`).remove();
  } else {
    document.querySelector("#confirmation-modal div.modal-body").innerHTML =
      "!حدث خطأ ما";
  }
}

async function createSingleHouseItem(featureId) {
  let container = document.querySelector("#single-house-modal div.modal-body");
  container.innerHTML = "";

  const loader = document.createElement("div");
  loader.classList.add("d-flex", "justify-content-center", "mt-5");
  loader.innerHTML = `<div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                      </div>`;
  container.innerHTML = "";
  container.appendChild(loader);

  const url = `https://api-dev.buytfinder.com/web/public_ads/${featureId}`;

  async function fetchData() {
    const response = await fetch(url);
    const feature = await response.json();
    if (feature == null) {
      alert("هذه الشقة غير متوفرة حاليا");
      container.innerHTML = "";
      return;
    }
    container.innerHTML = "";

    let element = document.createElement("div");
    element.classList.add("flex-col");
    element.style.border = "none";
    element.style.boxShadow = "none";

    let firstDiv = document.createElement("div");
    firstDiv.classList.add("flex-row");

    let secondDiv = document.createElement("div");
    secondDiv.classList.add("flex-row");

    let thirdDiv = document.createElement("div");
    thirdDiv.classList.add("flex-row");
    thirdDiv.style.gap = "10px";

    // first div
    let firstDivFirstCol = document.createElement("div");
    firstDivFirstCol.innerHTML = `<span class="element-title">${feature.title}</span>`;

    let firstDivSecondCol = document.createElement("div");
    firstDivSecondCol.innerHTML =
      feature.furnished == 1
        ? '<span class="text-success furnitured-badge" >مفروشة</span>'
        : '<span class="text-danger furnitured-badge" >غير مفروشة</span>';

    let firstDivThirdCol = document.createElement("div");
    firstDivThirdCol.classList.add("text-danger", "rental-price-element");
    firstDivThirdCol.innerHTML =
      feature.free == "0"
        ? `<span class="text-danger fs-3">${feature.price}$</span>`
        : '<span class="text-secondary fs-3">مجانا</span>';

    firstDiv.append(firstDivFirstCol, firstDivSecondCol, firstDivThirdCol);

    // second div
    let secondDivCol = document.createElement("div");
    secondDivCol.innerHTML = `${feature.cityNameAr} <i class="fa fa-map-marker"></i>`;

    secondDiv.append(secondDivCol);

    // third div
    let thirdDivFirstCol = document.createElement("div");
    thirdDivFirstCol.classList.add("nb-of-rooms-element");
    thirdDivFirstCol.textContent = `غرف ${feature.rooms}`;

    let shareBtn = document.createElement("a");
    shareBtn.href = `https://example.com/share?url=${encodeURIComponent(
      window.location.href
    )}`;
    shareBtn.target = "_blank";
    shareBtn.classList.add("btn", "share-action-btn", "d-none"); // temporary hide
    shareBtn.innerHTML = `<i class="fa fa-share-alt"></i>`;

    let whatsAppBtn = document.createElement("a");
    whatsAppBtn.href = `https://wa.me/+961${feature.supplierTel.replace(
      /\s/g,
      ""
    )}`;
    whatsAppBtn.target = "_blank";
    whatsAppBtn.classList.add("btn", "whatsapp-action-btn");
    whatsAppBtn.innerHTML = `<i class="fa fa-whatsapp"></i>`;

    let callBtn = document.createElement("a");
    callBtn.href = `tel:+961${feature.supplierTel.replace(/\s/g, "")}`;
    callBtn.target = "_blank";
    callBtn.classList.add("btn", "call-action-btn");
    callBtn.innerHTML = `<i class="fa fa-phone"></i>`;

    let thirdDivSecondCol = document.createElement("div");
    thirdDivSecondCol.classList.add("area-element");
    thirdDivSecondCol.style.display = "none"; // temporarily hide
    thirdDivSecondCol.textContent = `${feature.area} sqm`;

    let thirdDivThirdCol = document.createElement("div");
    thirdDivThirdCol.style.marginRight = "auto";
    thirdDivThirdCol.append(callBtn, whatsAppBtn, shareBtn);
    thirdDiv.append(thirdDivFirstCol, thirdDivSecondCol, thirdDivThirdCol);

    // append
    element.append(firstDiv, secondDiv, thirdDiv);
    container.append(element);

    // // Create the image gallery div
    // const imageGallery = document.createElement("div");
    // imageGallery.classList.add("image-gallery");

    // // Create the '3+' div
    // const moreDiv = document.createElement("div");
    // moreDiv.classList.add("more", "fs-1");
    // moreDiv.textContent = "3+";
    // imageGallery.appendChild(moreDiv);

    // // Create the image elements
    // for (let i = 0; i < 3; i++) {
    //   const imgDiv = document.createElement("div");
    //   const img = document.createElement("img");
    //   img.src = "./assets/images/img-placeholder.png";
    //   img.alt = "Image";
    //   img.width = 50;
    //   imgDiv.appendChild(img);
    //   imageGallery.appendChild(imgDiv);
    // }

    // // Append the image gallery to the container
    // container.appendChild(imageGallery);

    //temporarily hide

    // Create the description div
    const descriptionDiv = document.createElement("div");
    descriptionDiv.classList.add("description");

    // Create and append the heading (h2)
    const descriptionHeading = document.createElement("h2");
    descriptionHeading.textContent = "تفاصيل عن الشقة";
    descriptionHeading.classList.add("text-secondary");
    descriptionDiv.appendChild(descriptionHeading);

    // Create and append the description paragraph
    const descriptionParagraph = document.createElement("p");
    descriptionParagraph.id = "description";
    descriptionParagraph.textContent =
      "شقة فسيحة ومشرقة تقع في قلب [اسم المنطقة]. تتميز بإطلالة ساحرة على [البحر/الحديقة/المدينة].";
    descriptionParagraph.style.fontSize = "large";
    descriptionParagraph.style.wordBreak = "break-word";
    descriptionParagraph.style.maxHeight = "200px";
    descriptionParagraph.style.overflowY = "scroll";
    descriptionDiv.appendChild(descriptionParagraph);

    // Append the description div to the container
    container.appendChild(descriptionDiv);

    // Create and append the horizontal rule (hr)
    // const hr = document.createElement("hr");
    // container.appendChild(hr); temporarily hide

    // Create the button
    // const button = document.createElement("button");
    // button.type = "button";
    // button.classList.add(
    //   "btn",
    //   "d-flex",
    //   "justify-content-between",
    //   "flex-row",
    //   "w-100",
    //   "align-items-center",
    //   "text-secondary",
    //   "p-0"
    // );

    // // Create and append the button text (h3)
    // const buttonText = document.createElement("h5");
    // buttonText.textContent = "تقديم بلاغ";
    // button.appendChild(buttonText);

    // // Create and append the Font Awesome icon
    // const buttonIcon = document.createElement("i");
    // buttonIcon.classList.add("fa", "fa-chevron-left");
    // button.appendChild(buttonIcon);

    // // Append the button to the container
    // container.appendChild(button);

    // temporarily hide

    document.getElementById("description").textContent =
      feature.description ?? "لا يوجد";
  }
  await fetchData();
}

function navigateToProfile() {
  if (localStorage.getItem("callerId")) {
    window.location.href = "profile.html";
  } else {
    window.location.href = "signin.html";
  }
}

function getFilters() {
  let filters = {};

  if (document.getElementById("house-type-input").value != "") {
    filters.type = document.getElementById("house-type-input").value;
  }

  if (document.getElementById("get-house-governorates").value != "") {
    filters.governorateId = [
      Number(document.getElementById("get-house-governorates").value),
    ];
  }

  if (document.getElementById("get-house-cities").value != "") {
    filters.cityId = [
      Number(document.getElementById("get-house-cities").value),
    ];
  }

  if (document.getElementById("from-rooms-number").value != "") {
    filters.roomsFrom = Number(
      document.getElementById("from-rooms-number").value
    );
  }

  if (document.getElementById("to-rooms-number").value != "") {
    filters.roomsTo = Number(document.getElementById("to-rooms-number").value);
  }

  if (document.getElementById("from-price-number").value != "") {
    filters.priceFrom = Number(
      document.getElementById("from-price-number").value
    );
  }

  if (document.getElementById("to-price-number").value != "") {
    filters.priceTo = Number(document.getElementById("to-price-number").value);
  }

  return filters;
}

async function populateGovernorates(elementId, getFullRecords, selectedValue) {
  let governoratesUrl = `https://api-dev.buytfinder.com/web/${
    getFullRecords == true ? "governorates" : "governorates_have_ads"
  }`;
  async function getGovernorates() {
    const response = await fetch(governoratesUrl);
    const governorates = await response.json();
    governorates.forEach((governorate) => {
      let optionElement = document.createElement("option");
      optionElement.value = governorate.id;
      optionElement.textContent = governorate.nameAr;
      if (selectedValue && selectedValue == governorate.id) {
        optionElement.selected = true;
      }
      document.getElementById(elementId).appendChild(optionElement);
    });
  }
  getGovernorates();
}

async function populateCities(
  governorateId,
  elementId,
  getFullRecords = false
) {
  document.getElementById(elementId).innerHTML =
    "<option value='' selected>البلدة</option>";
  let citiesUrl = `https://api-dev.buytfinder.com/web/${
    getFullRecords == true ? "cities" : "cities_have_ads"
  }?governorate_id=${governorateId}`;
  const response = await fetch(citiesUrl);
  const cities = await response.json();
  cities.forEach((city) => {
    let optionElement = document.createElement("option");
    optionElement.value = city.id;
    optionElement.textContent = city.nameAr;
    document.getElementById(elementId).appendChild(optionElement);
  });
}

function createAssociationItem(associationData, target) {
  let mainContainer = document.createElement("div");
  mainContainer.classList.add("d-flex");
  mainContainer.style.border = "1px solid #00b3c8";
  mainContainer.style.borderRadius = "5px";
  mainContainer.style.padding = "12px";
  mainContainer.style.boxShadow = "0px 5px 10px rgba(0, 0, 0, 0.2)";
  mainContainer.style.justifyContent = "end";

  let imageContainer = document.createElement("div");
  imageContainer.classList.add("d-flex", "align-items-center");
  let photo = document.createElement("img");
  photo.classList.add("circular-div");
  photo.src = "../assets/images/logo.png";
  photo.style.objectFit = "contain";
  imageContainer.append(photo);

  let detailsContainer = document.createElement("div");
  detailsContainer.classList.add("flex-col");
  detailsContainer.style.border = "none";
  detailsContainer.style.boxShadow = "none";
  detailsContainer.style.alignItems = "end";
  detailsContainer.style.marginBottom = "0px";
  detailsContainer.style.padding = "0px 12px 0px 0px";
  detailsContainer.style.width = "100%";

  let nameDiv = document.createElement("div");
  nameDiv.classList.add("flex-row");
  nameDiv.style.display = "flex";

  let nameSpan = document.createElement("span");
  let nameText = document.createTextNode(associationData.title);
  nameSpan.appendChild(nameText);
  nameSpan.id = "organization-name";
  nameSpan.style.overflow = "hidden";
  nameSpan.style.textOverflow = "ellipsis";
  nameSpan.style.whiteSpace = "nowrap";
  nameSpan.style.maxWidth = "100%";

  nameDiv.appendChild(nameSpan);

  let detailsDiv = document.createElement("div");
  detailsDiv.classList.add("flex-row");
  detailsDiv.style.display = "flex";
  detailsDiv.style.alignItems = "center";
  detailsDiv.style.width = "100%";

  let secondDiv = document.createElement("div");
  secondDiv.classList.add("flex-col");
  secondDiv.style.border = "none";
  secondDiv.style.boxShadow = "none";
  secondDiv.style.alignItems = "end";
  secondDiv.style.marginBottom = "0px";
  secondDiv.style.padding = "0px";

  let associationType = "";

  switch (associationData.categoryId) {
    case "1":
      associationType = "الاغاثة الانسانية";
      break;
    case "2":
      associationType = "الصحية";
      break;
    case "3":
      associationType = "البيئية";
      break;
    case "4":
      associationType = "التعليمية";
      break;
    case "5":
      associationType = "التنموية";
      break;
    case "6":
      associationType = "دعم الاطفال والايتام";
      break;
  }

  let organizationTypeSpan = document.createElement("span");
  organizationTypeSpan.textContent = associationType;
  organizationTypeSpan.id = "organization-type";
  organizationTypeSpan.classList.add("text-secondary");

  let addressSpan = document.createElement("span");
  let mapMarkerIcon = document.createElement("i");
  mapMarkerIcon.classList.add("fa", "fa-map-marker", "mr-2", "text-secondary");
  addressSpan.append(associationData.address);
  addressSpan.append(mapMarkerIcon);
  addressSpan.id = "organization-address";
  addressSpan.style.whiteSpace = "nowrap";

  secondDiv.append(organizationTypeSpan, addressSpan);

  let thirDiv = document.createElement("div");
  thirDiv.id = "social-media-div";
  thirDiv.style.whiteSpace = "nowrap";
  thirDiv.style.marginRight = "auto";

  if (associationData.intaLink != "") {
    let instagramBtn = document.createElement("button");
    instagramBtn.classList.add("btn", "instagram-action-btn");
    instagramBtn.innerHTML = `<i class="fa fa-instagram" aria-hidden="true"></i>`;
    instagramBtn.onclick = () => {
      window.open(
        `https://www.instagram.com/${associationData.intaLink}/`,
        "_blank"
      );
    };
    thirDiv.append(instagramBtn);
  }

  if (associationData.haveWhatsapp == 1) {
    let whatsappBtn = document.createElement("button");
    whatsappBtn.classList.add("btn", "whatsapp-action-btn");
    whatsappBtn.innerHTML = `<i class="fa fa-whatsapp" aria-hidden="true"></i>`;
    whatsappBtn.onclick = () => {
      window.open(
        `https://api.whatsapp.com/send?phone=${associationData.tel}`,
        "_blank"
      );
    };
    thirDiv.append(whatsappBtn);
  }

  if (associationData.donationLink != "") {
    let donationLinkBtn = document.createElement("button");
    donationLinkBtn.classList.add("btn");
    donationLinkBtn.style.marginLeft = "10px";
    donationLinkBtn.style.border = "1px solid #00b3c8";
    donationLinkBtn.style.color = "white";
    donationLinkBtn.style.width = "47px";
    donationLinkBtn.style.height = "43px";
    donationLinkBtn.style.backgroundColor = "#00b3c8";

    donationLinkBtn.innerHTML = `تبرع`;
    donationLinkBtn.onclick = () => {
      window.open(associationData.donationLink, "_blank");
    };
    thirDiv.append(donationLinkBtn);
  }

  detailsDiv.append(secondDiv, thirDiv);

  // append
  detailsContainer.append(nameDiv, detailsDiv);
  mainContainer.appendChild(detailsContainer);
  mainContainer.appendChild(imageContainer);

  target.append(mainContainer);
}

async function createAssociationsContent(target) {
  addLoader(target);
  let associationsUrl = `https://api-dev.buytfinder.com/web/associations`;
  const response = await fetch(associationsUrl);
  const associations = await response.json();
  if (associations instanceof Array) {
    associations.forEach((association, index) => {
      createAssociationItem(association, target);
    });
  } else {
    createAssociationItem(associations, target);
  }

  removeLoader(target);
}

let loader = document.createElement("div");
loader.classList.add("d-flex", "justify-content-center");
loader.innerHTML = `<div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                      </div>`;

function addLoader(target) {
  target.append(loader);
}

function removeLoader(target) {
  target.removeChild(loader);
}

function emptyFormInputs(parent) {
  const inputs = parent.querySelectorAll("input, select, textarea");
  inputs.forEach((input) => {
    if (input.type === "checkbox" || input.type === "radio") {
      input.checked = false;
    } else if (input.tagName === "SELECT") {
      input.selectedIndex = 0;
    } else {
      input.value = "";
    }
  });
}

export {
  removeLoader,
  addLoader,
  createHouseItem,
  navigateToProfile,
  getFilters,
  populateCities,
  populateGovernorates,
  createAssociationsContent,
  emptyFormInputs,
  createHouseItemFromEndPoint,
};
