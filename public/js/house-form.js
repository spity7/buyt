import { populateGovernorates, populateCities } from "./utils.js";
import { createButtonsAndMapContent } from "./main.js";
import { createProfileContent } from "./profile.js";

async function buildUpHouseFormContent(mode, targetAfterSubmit, houseId) {
  // Create the container for the form
  const container = document.querySelector("#main-container");
  container.innerHTML = "";

  let contentContainer = document.createElement("div");
  contentContainer.classList.add("content-container");
  contentContainer.style.padding = "20px";
  contentContainer.style.overflow = "scroll";
  const footerHeight = document.querySelector("footer").offsetHeight * 2;
  contentContainer.style.maxHeight = window.innerHeight - footerHeight + "px";

  // Create and append the header
  const header = document.createElement("h5");
  header.textContent = "تفاصيل السكن";
  header.style.textAlign = "right";
  header.style.fontWeight = "600";
  contentContainer.appendChild(header);

  // Create and append the description
  const description = document.createElement("p");
  description.textContent =
    mode === "edit" ? "تعديل سكن" : "أضف سكن في المناطق الامنة";
  description.style.textAlign = "right";
  description.style.fontWeight = "350";
  description.style.color = "#5c6066";
  description.style.margin = "-10px 0px 40px";

  contentContainer.appendChild(description);

  // Create the form
  const form = document.createElement("form");
  form.setAttribute("action", "/submit-donation");
  form.setAttribute("method", "POST");

  // Function to create form groups
  function createFormGroup(type, id, name, placeholder, required, options) {
    const formGroup = document.createElement("div");
    formGroup.className = "form-group";

    if (type === "input") {
      const input = document.createElement("input");
      input.setAttribute(
        "type",
        id === "phone" || id === "price" || id === "rooms-no" || id === "area"
          ? "number"
          : "text"
      );
      input.setAttribute("id", id);
      input.setAttribute("name", name);
      input.className = "form-control";
      input.setAttribute("placeholder", placeholder);
      if (required) input.setAttribute("required", "required");
      formGroup.appendChild(input);
    } else if (type === "select") {
      const select = document.createElement("select");
      select.style.appearance = "none";
      select.style.backgroundRepeat = "no-repeat";
      select.style.backgroundPosition = "10px center";
      select.style.backgroundSize = "10px 10px";
      select.style.paddingRight = "10px";
      select.style.backgroundColor = "#f8f8f8";
      select.setAttribute("id", id);
      select.setAttribute("name", name);
      select.className = "form-select";
      if (required) select.setAttribute("required", "required");

      const defaultOption = document.createElement("option");
      defaultOption.value = "";
      defaultOption.textContent = placeholder;
      select.appendChild(defaultOption);

      options.forEach((option) => {
        const opt = document.createElement("option");
        opt.value = option.value;
        opt.textContent = option.text;
        select.appendChild(opt);
      });

      formGroup.appendChild(select);
    }

    form.appendChild(formGroup);
  }

  // Create form elements
  createFormGroup("input", "name", "name", "الاسم", false);
  createFormGroup("input", "phone", "phone", "رقم الهاتف", true);

  createFormGroup("select", "category", "category", "نوع السكن", true, [
    { value: 1, text: "بيت" },
    { value: 2, text: "شقة" },
    { value: 3, text: "شاليه" },
    { value: 4, text: "مركز" },
  ]);

  createFormGroup("input", "type", "type", "تفصيل نوع السكن", true);
  createFormGroup("input", "rooms-no", "rooms-no", "عدد الغرف", true);
  createFormGroup("input", "area", "area", "المساحة", true);

  createFormGroup(
    "select",
    "add-house-governorate",
    "add-house-governorate",
    "المحافظة",
    true,
    []
  );

  createFormGroup(
    "select",
    "add-house-cities",
    "add-house-cities",
    "البلدة",
    true,
    []
  );

  createFormGroup(
    "select",
    "free-or-paid",
    "free-or-paid",
    "(مجاني / مدفوع)",
    true,
    [
      { value: 1, text: "مجاني" },
      { value: 0, text: "مدفوع" },
    ]
  );

  createFormGroup(
    "select",
    "is-furnished",
    "is-furnished",
    "(مفروش / غير مفروش)",
    true,
    [
      { value: 1, text: "مفروش" },
      { value: 0, text: "غير مفروش" },
    ]
  );

  createFormGroup("input", "price", "price", "السعر", false);

  // Create and append the whatsapp checkbox
  const whatsappLabel = document.createElement("label");
  whatsappLabel.className = "form-check-label";
  whatsappLabel.textContent = "هل لديك whatsApp؟";
  const whatsappCheckbox = document.createElement("input");
  whatsappCheckbox.type = "checkbox";
  whatsappCheckbox.className = "form-check-input";
  const formCheck = document.createElement("div");
  formCheck.className = "form-check";
  formCheck.appendChild(whatsappLabel);
  formCheck.appendChild(whatsappCheckbox);
  form.appendChild(formCheck);

  // // Create and append the file input
  // const photoLabel = document.createElement("label");
  // photoLabel.setAttribute("for", "photo");
  // photoLabel.className = "form-label";
  // photoLabel.textContent = "أضف صورة السكن";
  // let formGroup = document.createElement("div");
  // formGroup.className = "form-group";
  // formGroup.appendChild(photoLabel);

  // const photoInput = document.createElement("input");
  // photoInput.setAttribute("type", "file");
  // photoInput.setAttribute("id", "photo");
  // photoInput.setAttribute("name", "photo");
  // photoInput.className = "form-control";
  // photoInput.setAttribute("accept", "image/*");
  // photoInput.setAttribute("required", "required");
  // formGroup.appendChild(photoInput);
  // form.appendChild(formGroup);
  // temporary hide

  // Create and append the textarea
  const notesGroup = document.createElement("div");
  notesGroup.className = "form-group";
  const notes = document.createElement("textarea");
  notes.setAttribute("id", "notes");
  notes.setAttribute("name", "notes");
  notes.className = "form-control";
  notes.setAttribute("rows", "3");
  notes.required = true;
  notes.setAttribute("placeholder", "وصف السكن");
  notesGroup.appendChild(notes);
  form.appendChild(notesGroup);

  // Create and append the submit button
  const submitButton = document.createElement("button");
  submitButton.setAttribute("type", "submit");
  submitButton.className = "btn btn-confirm";
  submitButton.textContent = mode === "edit" ? "تعديل" : "أرسل ملفك";
  submitButton.style.backgroundColor = "#00b3c8";
  submitButton.style.color = "#fff";
  submitButton.style.fontSize = "16px";
  submitButton.style.width = "100%";

  form.addEventListener("submit", async (event) => {
    event.preventDefault();
    const name = document.getElementById("name").value;
    const phone = document.getElementById("phone").value;
    const houseType = document.getElementById("type").value;
    const rooms = document.getElementById("rooms-no").value;
    const cityId = document.getElementById("add-house-cities").value;
    const freeOrPaid = document.getElementById("free-or-paid").value;
    const isFurnished = document.getElementById("is-furnished").value;
    const price = document.getElementById("price").value ?? 0;
    const notes = document.getElementById("notes").value;
    const categoryId = document.getElementById("category").value;
    const area = document.getElementById("area").value;
    const haveWhatsapp = document.querySelector(
      "input[type=checkbox].form-check-input"
    ).checked;

    const body = {
      supplierName: name,
      supplierTel: phone,
      title: houseType,
      rooms: rooms,
      cityId: cityId,
      free: freeOrPaid,
      description: notes,
      furnished: isFurnished,
      price: Number(price),
      type: 1,
      categoryId: categoryId,
      area: area,
      haveWhatsapp: haveWhatsapp ? 1 : 0,
    };

    try {
      const response = await fetch(
        `https://api-dev.buytfinder.com/web/ads${
          mode === "edit" ? `/${houseId}` : ""
        }`,
        {
          method: mode === "edit" ? "PUT" : "POST",
          body: JSON.stringify(body),
          headers: {
            "Content-Type": "application/json",
          },
          credentials: "include",
        }
      );

      if (response.ok) {
        document.querySelector("div.modal-header > img").src =
          "./assets/images/successful.png";
        document.querySelector(
          "div.modal-body > p.add-house-success-text"
        ).textContent =
          mode === "edit" ? "تم تعديل السكن بنجاح" : "تم اضافة السكن بنجاح";

        let modal = new bootstrap.Modal(
          document.getElementById("add-house-success-modal")
        );
        modal.show();

        setTimeout(() => {
          modal.hide();
          if (targetAfterSubmit === "home") {
            createButtonsAndMapContent();
          } else if (targetAfterSubmit === "my_ads") {
            createProfileContent(
              JSON.parse(sessionStorage.getItem("loggedInUser"))
            );
          }
        }, 2000);
      } else {
        document.querySelector("div.modal-header > img").src =
          "./assets/images/failed.png";
        document.querySelector(
          "div.modal-body > p.add-house-success-text"
        ).textContent = "حدث خطأ ما ، يرجى المحاولة مرة اخرى";

        let modal = new bootstrap.Modal(
          document.getElementById("add-house-success-modal")
        );
        modal.show();
      }
    } catch (error) {
      console.error(error);
    }
  });

  form.appendChild(submitButton);
  contentContainer.appendChild(form);

  // Append the form to the container
  container.appendChild(contentContainer);
  await populateGovernorates("add-house-governorate", true, "04");
  if (mode === "create") {
    await populateCities("04", "add-house-cities", true);
  }
  document
    .getElementById("add-house-governorate")
    .addEventListener("change", async function () {
      await populateCities(this.value, "add-house-cities", true);
    });

  document
    .getElementById("free-or-paid")
    .addEventListener("change", function () {
      if (this.value === "1") {
        document.getElementById("price").classList.add("d-none");
      } else {
        document.getElementById("price").classList.remove("d-none");
      }
    });
}

export { buildUpHouseFormContent };
