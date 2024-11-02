import { logout } from "./auth.js";
import { createMyAdsContent } from "./my_ads.js";

function createProfileContent(data) {
  let container = document.getElementById("main-container");
  container.innerHTML = "";

  // Create user info div
  const userInfoDiv = document.createElement("div");
  userInfoDiv.classList.add(
    "d-flex",
    "justify-content-start",
    "align-items-center",
    "p-3"
  );

  userInfoDiv.style.direction = "rtl";

  // Create profile image div
  const profileImageDiv = document.createElement("div");
  const profileImage = document.createElement("img");
  profileImage.src = "./assets/images/profile-photo.png"; // Path to profile image
  profileImage.classList.add("rounded-circle", "profile-image");
  profileImage.width = 50;
  profileImageDiv.appendChild(profileImage);

  // Append profile image to user info div
  userInfoDiv.appendChild(profileImageDiv);

  // Create user info text (name and email)
  const userTextDiv = document.createElement("div");
  userTextDiv.style.paddingRight = "15px";
  const userName = document.createElement("h5");
  userName.innerText = `${data.firstName || "لا يوجد أسم"} ${
    data.lastName || "لا يوجد أسم"
  }`; // User's name
  userName.style.paddingTop = "15px";
  const userEmail = document.createElement("p");
  userEmail.innerText = data.username || "لا يوجد مستخدم"; // User's email
  userEmail.classList.add("text-secondary");
  userTextDiv.appendChild(userName);
  userTextDiv.appendChild(userEmail);

  // Append user text to user info div
  userInfoDiv.appendChild(userTextDiv);

  // Add user info div to container
  container.appendChild(userInfoDiv);
  container.appendChild(document.createElement("hr"));

  let bodyContainer = document.createElement("div");

  bodyContainer.id = "profile-body-container";

  // Append settings list to container
  container.appendChild(bodyContainer);

  loadDefaultProfileContent();
}

function loadDefaultProfileContent() {
  document.querySelector("#profile-body-container").innerHTML = "";
  // Create the settings list
  const settingsList = document.createElement("ul");
  settingsList.classList.add("list-group", "list-group-flush");
  settingsList.style.direction = "rtl";
  settingsList.style.paddingRight = "1rem";
  settingsList.style.paddingLeft = "1rem";
  settingsList.style.marginTop = "20px";
  settingsList.style.gap = "5px";

  // Settings items array
  const settings = [
    { text: "السكن المضاف", icon: "fa-chevron-left" },
    { text: "تغيير كلمة المرور", icon: "fa-chevron-left" },
    { text: "تغيير رقم الهاتف", icon: "fa-chevron-left" },
    { text: "الإعدادات العامة", icon: "fa-chevron-left" },
  ];

  // Loop to create list items
  settings.forEach((setting) => {
    const listItem = document.createElement("li");
    listItem.classList.add(
      "list-group-item",
      "d-flex",
      "justify-content-between",
      "align-items-center"
    );
    listItem.style.border = "none";

    const settingText = document.createElement("span");
    settingText.classList.add("text-secondary");
    settingText.innerText = setting.text;

    const chevronIcon = document.createElement("i");
    chevronIcon.classList.add("text-secondary");
    chevronIcon.classList.add("fa", setting.icon);

    listItem.appendChild(settingText);
    listItem.appendChild(chevronIcon);
    listItem.style.padding = "0px";

    listItem.addEventListener("click", () => {
      switch (setting.text) {
        case "السكن المضاف":
          createMyAdsContent("profile");
          break;
        case "تغيير كلمة المرور":
          // createChangePasswordContent();
          break;
        case "تغيير رقم الهاتف":
          // createChangePhoneContent();
          break;
        case "الإعدادات العامة":
          // createSettingsContent();
          break;
      }
    });

    settingsList.appendChild(listItem);
    settingsList.appendChild(document.createElement("hr"));
  });

  let logoutBtn = document.createElement("button");
  logoutBtn.classList.add("btn", "btn-danger", "w-100");
  logoutBtn.innerText = "تسجيل الخروج";
  logoutBtn.addEventListener("click", async () => {
    await logout();
  });
  settingsList.appendChild(logoutBtn);
  document.querySelector("#profile-body-container").appendChild(settingsList);
}

export { createProfileContent, loadDefaultProfileContent };
