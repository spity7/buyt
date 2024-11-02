// Create form container

import { createAssociationsContent } from "./utils.js";
import { createButtonsAndMapContent } from "./main.js";
async function createDonationsContent() {
  const formContainer = document.createElement("div");
  formContainer.classList.add("content-container");
  formContainer.style.backgroundColor = "transparent";
  formContainer.style.paddingTop = "20px";

  let headerContainer = document.createElement("div");
  headerContainer.classList.add(
    "d-flex",
    "flex-row-reverse",
    "justify-content-between"
  );

  let textContainer = document.createElement("div");
  textContainer.classList.add("d-flex", "flex-column");
  // Create title
  const title = document.createElement("h5");
  title.textContent = "تفاصيل التبرع";
  title.style.textAlign = "right";
  title.style.fontWeight = "600";
  formContainer.appendChild(title);

  // Create subtitle
  const subtitle = document.createElement("p");
  subtitle.textContent = "إملأ الاستمارة للتواصل مع الجهة المعنية";
  subtitle.style.textAlign = "right";
  subtitle.style.fontWeight = "350";
  subtitle.style.color = "#5c6066";
  formContainer.appendChild(subtitle);

  textContainer.appendChild(title);
  textContainer.appendChild(subtitle);
  headerContainer.appendChild(textContainer);

  // create the close button
  let closeButton = document.createElement("i");
  closeButton.classList.add("fa", "fa-times", "fa-2x", "text-secondary");
  closeButton.style.cursor = "pointer";
  closeButton.style.marginRight = "auto";
  closeButton.addEventListener("click", function () {
    let container = document.getElementById("main-container");
    container.innerHTML = "";
    document.getElementById("main").classList.add("active");
    document.getElementById("donations-btn").classList.remove("active");
    createButtonsAndMapContent();
  });

  headerContainer.appendChild(closeButton);
  formContainer.appendChild(headerContainer);

  // Create form element
  const form = document.createElement("form");
  form.style.padding = "20px";
  formContainer.appendChild(form);

  // Create a function for form groups
  function createFormGroup(element) {
    const formGroup = document.createElement("div");
    formGroup.className = "form-group";
    formGroup.appendChild(element);
    return formGroup;
  }

  // Name input
  const nameInput = document.createElement("input");
  nameInput.type = "text";
  nameInput.id = "name";
  nameInput.name = "name";
  nameInput.className = "form-control";
  nameInput.placeholder = "الاسم";
  form.appendChild(createFormGroup(nameInput));

  // Phone number input
  const phoneInput = document.createElement("input");
  phoneInput.type = "number";
  phoneInput.id = "phone";
  phoneInput.name = "phone";
  phoneInput.className = "form-control";
  phoneInput.placeholder = "رقم الهاتف";
  phoneInput.required = true;
  form.appendChild(createFormGroup(phoneInput));

  // Donation type select
  const donationTypeSelect = document.createElement("select");
  donationTypeSelect.id = "donation_type";
  donationTypeSelect.name = "donation_type";
  donationTypeSelect.className = "form-select";
  donationTypeSelect.required = true;
  donationTypeSelect.style.appearance = "none";
  donationTypeSelect.style.backgroundRepeat = "no-repeat";
  donationTypeSelect.style.backgroundPosition = "10px center";
  donationTypeSelect.style.backgroundSize = "10px 10px";
  donationTypeSelect.style.paddingRight = "10px";
  donationTypeSelect.style.backgroundColor = "#f8f8f8";
  // donationTypeSelect.style.border = "1px solid #6b6248";

  donationTypeSelect.required = true;

  // Donation type options
  const donationOptions = [
    { value: "", text: "نوع التبرع" },
    { value: "1", text: "دعم مالي" },
    { value: "2", text: "ملابس" },
    { value: "3", text: "طعام" },
    { value: "4", text: "دواء" },
    { value: "5", text: "دم" },
    { value: "6", text: "أخرى" },
  ];

  donationOptions.forEach((optionData) => {
    const option = document.createElement("option");
    option.value = optionData.value;
    option.textContent = optionData.text;
    donationTypeSelect.appendChild(option);
  });
  form.appendChild(createFormGroup(donationTypeSelect));

  // // Donation purpose select
  // const donationPurposeSelect = document.createElement("select");
  // donationPurposeSelect.style.display = "none"; // temprorary
  // donationPurposeSelect.id = "donation_purpose";
  // donationPurposeSelect.name = "donation_purpose";
  // donationPurposeSelect.className = "form-select";
  // donationPurposeSelect.required = true;
  // donationPurposeSelect.style.appearance = "none";
  // donationPurposeSelect.style.backgroundRepeat = "no-repeat";
  // donationPurposeSelect.style.backgroundPosition = "10px center";
  // donationPurposeSelect.style.backgroundSize = "10px 10px";
  // donationPurposeSelect.style.paddingRight = "10px";
  // donationPurposeSelect.style.backgroundColor = "#f8f8f8";
  // // donationPurposeSelect.style.border = "1px solid #6b6248";

  // // Donation purpose options
  // const purposeOptions = [
  //   { value: "", text: "الجهة للتبرع" },
  //   { value: "charity", text: "Charity" },
  //   { value: "education", text: "Education" },
  //   { value: "health", text: "Health" },
  //   { value: "environment", text: "Environment" },
  // ];
  // purposeOptions.forEach((optionData) => {
  //   const option = document.createElement("option");
  //   option.value = optionData.value;
  //   option.textContent = optionData.text;
  //   donationPurposeSelect.appendChild(option);
  // });
  // form.appendChild(createFormGroup(donationPurposeSelect));

  // Notes textarea
  const notesTextarea = document.createElement("textarea");
  notesTextarea.id = "notes";
  notesTextarea.name = "notes";
  notesTextarea.className = "form-control";
  notesTextarea.rows = 4;
  notesTextarea.placeholder = "تفاصيل إضافية";
  form.appendChild(createFormGroup(notesTextarea));

  // Submit button
  const submitButton = document.createElement("button");
  submitButton.type = "submit";
  submitButton.className = "btn";
  submitButton.textContent = "أرسل ملفك";
  submitButton.style.backgroundColor = "#00b3c8";
  submitButton.style.color = "#fff";
  submitButton.style.fontSize = "16px";
  submitButton.style.width = "100%";

  form.addEventListener("submit", async (e) => {
    e.preventDefault();
    submitButton.disabled = true;

    let name = nameInput.value;
    let phone = phoneInput.value;
    let donationType = donationTypeSelect.value;
    let notes = notesTextarea.value;

    let body = {
      name: name,
      tel: phone,
      categoryId: donationType,
      description: notes,
    };

    let url = "https://api-dev.buytfinder.com/web/donations";

    let response = await fetch(url, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(body),
    });

    if (response.status === 200) {
      submitButton.textContent = "لقد تم إرسال البيانات";
      nameInput.value = "";
      phoneInput.value = "";
      donationTypeSelect.value = "";
      notesTextarea.value = "";

      setTimeout(() => {
        submitButton.textContent = "أرسل ملفك";
        submitButton.disabled = false;
      }, 2000);
    } else {
      submitButton.disabled = false;
    }
  });

  form.appendChild(submitButton);

  let hrContainer = document.createElement("div");
  hrContainer.classList.add("d-flex", "align-items-center", "my-3");

  let leftLine = document.createElement("hr");
  leftLine.classList.add("flex-grow-1", "border-top");
  leftLine.style.backgroundColor = "black";

  let textSpan = document.createElement("span");
  textSpan.classList.add("mx-3");
  textSpan.textContent = "او تواصل مباشرة مع جمعيات";

  let rightLine = document.createElement("hr");
  rightLine.classList.add("flex-grow-1", "border-top");
  rightLine.style.backgroundColor = "black";

  hrContainer.appendChild(leftLine);
  hrContainer.appendChild(textSpan);
  hrContainer.appendChild(rightLine);

  formContainer.appendChild(hrContainer);
  let associationsContainer = document.createElement("div");
  associationsContainer.classList.add("d-flex", "flex-column");

  associationsContainer.style.marginBottom = "30%";
  associationsContainer.style.gap = "20px";

  document.getElementById("main-container").appendChild(formContainer);

  await createAssociationsContent(associationsContainer);

  formContainer.appendChild(associationsContainer);
}

export { createDonationsContent };
