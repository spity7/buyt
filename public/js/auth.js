document.addEventListener("DOMContentLoaded", function () {
  const currentUrl = window.location.pathname;
  if (currentUrl.includes("signin")) {
    document
      .querySelector("form#signin-form")
      .addEventListener("submit", (event) => {
        login(event);
      });

    document
      .querySelector("form #togglePassword")
      .addEventListener("click", togglePassword);
  } else if (currentUrl.includes("signup")) {
    const countryCodes = {
      93: "Afghanistan",
      355: "Albania",
      213: "Algeria",
      1684: "American Samoa",
      376: "Andorra",
      244: "Angola",
      1264: "Anguilla",
      672: "Antarctica",
      1268: "Antigua and Barbuda",
      54: "Argentina",
      374: "Armenia",
      297: "Aruba",
      61: "Australia",
      43: "Austria",
      994: "Azerbaijan",
      1242: "Bahamas",
      973: "Bahrain",
      880: "Bangladesh",
      1246: "Barbados",
      375: "Belarus",
      32: "Belgium",
      501: "Belize",
      229: "Benin",
      1441: "Bermuda",
      975: "Bhutan",
      591: "Bolivia",
      387: "Bosnia and Herzegovina",
      267: "Botswana",
      55: "Brazil",
      246: "British Indian Ocean Territory",
      1284: "British Virgin Islands",
      673: "Brunei",
      359: "Bulgaria",
      226: "Burkina Faso",
      257: "Burundi",
      855: "Cambodia",
      237: "Cameroon",
      1: "Canada",
      238: "Cape Verde",
      599: "Caribbean Netherlands",
      1345: "Cayman Islands",
      235: "Central African Republic",
      56: "Chile",
      86: "China",
      61: "Christmas Island",
      672: "Cocos (Keeling) Islands",
      57: "Colombia",
      269: "Comoros",
      682: "Cook Islands",
      506: "Costa Rica",
      385: "Croatia",
      53: "Cuba",
      599: "Cura ao",
      357: "Cyprus",
      420: "Czech Republic",
      45: "Denmark",
      253: "Djibouti",
      1767: "Dominica",
      1809: "Dominican Republic",
      670: "East Timor",
      593: "Ecuador",
      20: "Egypt",
      503: "El Salvador",
      240: "Equatorial Guinea",
      291: "Eritrea",
      372: "Estonia",
      251: "Ethiopia",
      500: "Falkland Islands",
      298: "Faroe Islands",
      679: "Fiji",
      358: "Finland",
      33: "France",
      596: "French Guiana",
      594: "French Polynesia",
      241: "Gabon",
      220: "Gambia",
      995: "Georgia",
      49: "Germany",
      233: "Ghana",
      350: "Gibraltar",
      30: "Greece",
      299: "Greenland",
      1473: "Grenada",
      590: "Guadeloupe",
      1671: "Guam",
      502: "Guatemala",
      224: "Guinea",
      245: "Guinea-Bissau",
      592: "Guyana",
      509: "Haiti",
      504: "Honduras",
      852: "Hong Kong",
      36: "Hungary",
      354: "Iceland",
      91: "India",
      62: "Indonesia",
      98: "Iran",
      964: "Iraq",
      353: "Ireland",
      39: "Italy",
      1876: "Jamaica",
      81: "Japan",
      962: "Jordan",
      77: "Kazakhstan",
      254: "Kenya",
      686: "Kiribati",
      850: "Korea, North",
      82: "Korea, South",
      383: "Kosovo",
      965: "Kuwait",
      996: "Kyrgyzstan",
      856: "Laos",
      371: "Latvia",
      961: "Lebanon",
      266: "Lesotho",
      231: "Liberia",
      218: "Libya",
      423: "Liechtenstein",
      370: "Lithuania",
      352: "Luxembourg",
      853: "Macau",
      389: "Macedonia (FYROM)",
      261: "Madagascar",
      265: "Malawi",
      60: "Malaysia",
      960: "Maldives",
      223: "Mali",
      356: "Malta",
      692: "Marshall Islands",
      596: "Martinique",
      222: "Mauritania",
      230: "Mauritius",
      262: "Mayotte",
      52: "Mexico",
      691: "Micronesia",
      373: "Moldova",
      377: "Monaco",
      976: "Mongolia",
      382: "Montenegro",
      1664: "Montserrat",
      212: "Morocco",
      258: "Mozambique",
      95: "Myanmar (Burma)",
      264: "Namibia",
      674: "Nauru",
      977: "Nepal",
      31: "Netherlands",
      599: "Netherlands Antilles",
      687: "New Caledonia",
      64: "New Zealand",
      505: "Nicaragua",
      227: "Niger",
      234: "Nigeria",
      683: "Niue",
      672: "Norfolk Island",
      1670: "Northern Mariana Islands",
      47: "Norway",
      968: "Oman",
      92: "Pakistan",
      680: "Palau",
      970: "Palestine",
      507: "Panama",
      675: "Papua New Guinea",
      595: "Paraguay",
      51: "Peru",
      63: "Philippines",
      48: "Poland",
      351: "Portugal",
      1787: "Puerto Rico",
      974: "Qatar",
      262: "R union",
      40: "Romania",
      7: "Russia",
      250: "Rwanda",
      378: "Saint Barth lemy",
      508: "Saint Helena, Ascension and Tristan da Cunha",
      354: "Saint Kitts and Nevis",
      590: "Saint Lucia",
      378: "Saint Martin (French part)",
      508: "Saint Pierre and Miquelon",
      784: "Saint Vincent and the Grenadines",
      684: "Samoa",
      378: "San Marino",
      239: "S o Tom  and Principe",
      966: "Saudi Arabia",
      221: "Senegal",
      381: "Serbia",
      248: "Seychelles",
      232: "Sierra Leone",
      65: "Singapore",
      1721: "Sint Maarten (Dutch part)",
      421: "Slovakia",
      386: "Slovenia",
      677: "Solomon Islands",
      252: "Somalia",
      27: "South Africa",
      82: "South Korea",
      211: "South Sudan",
      34: "Spain",
      94: "Sri Lanka",
      597: "Suriname",
      268: "Swaziland",
      46: "Sweden",
      41: "Switzerland",
      963: "Syria",
      886: "Taiwan",
      992: "Tajikistan",
      255: "Tanzania",
      66: "Thailand",
      228: "Timor-Leste",
      676: "Tonga",
      1868: "Trinidad and Tobago",
      216: "Tunisia",
      90: "Turkey",
      993: "Turkmenistan",
      1649: "Turks and Caicos Islands",
      688: "Tuvalu",
      256: "Uganda",
      380: "Ukraine",
      971: "United Arab Emirates",
      44: "United Kingdom",
      1: "United States",
      598: "Uruguay",
      998: "Uzbekistan",
      678: "Vanuatu",
      58: "Venezuela",
      84: "Vietnam",
      1284: "Virgin Islands, British",
      1340: "Virgin Islands, U.S.",
      681: "Wallis and Futuna",
      967: "Yemen",
    };

    const countryCodeElement = document.getElementById("country-code");
    Object.keys(countryCodes).forEach((key) => {
      const option = document.createElement("option");
      if (key == 961) option.selected = true;
      option.value = "+" + key;
      option.textContent = countryCodes[key] + " +" + key;
      countryCodeElement.appendChild(option);
    });

    document
      .querySelector("form#signup-form")
      .addEventListener("submit", (event) => {
        register(event);
      });

    document
      .querySelector("form #togglePassword")
      .addEventListener("click", togglePassword);

    document
      .querySelector("form #toggleConfirmPassword")
      .addEventListener("click", toggleConfirmPassword);
    document
      .querySelector("form #confirmPassword")
      .addEventListener("blur", matchPasswords);
  }
});

function togglePassword() {
  const passwordInput = document.getElementById("password");
  const type =
    passwordInput.getAttribute("type") === "password" ? "text" : "password";
  passwordInput.setAttribute("type", type);
  document.getElementById("togglePassword").classList.toggle("fa-eye-slash");
}

function toggleConfirmPassword() {
  const confirmPasswordInput = document.getElementById("confirmPassword");
  const type =
    confirmPasswordInput.getAttribute("type") === "password"
      ? "text"
      : "password";
  confirmPasswordInput.setAttribute("type", type);
  document
    .getElementById("toggleConfirmPassword")
    .classList.toggle("fa-eye-slash");
}

function matchPasswords() {
  const passwordInput = document.getElementById("password");
  const confirmPasswordInput = document.getElementById("confirmPassword");
  const notMatchedMessage = document.querySelector(
    ".not-matched-password-message"
  );
  if (passwordInput.value !== confirmPasswordInput.value) {
    notMatchedMessage.classList.remove("d-none");
  } else {
    notMatchedMessage.classList.add("d-none");
  }
}

function login(event) {
  event.preventDefault();
  document.getElementById("submit-text").classList.add("d-none");
  document.getElementById("spinner").classList.remove("d-none");

  const usernameInput = document.getElementById("email");
  const passwordInput = document.getElementById("password");

  const url = "https://api-dev.buytfinder.com/web/login";
  const username = usernameInput.value;
  const password = passwordInput.value;
  const credentials = {
    username: username,
    password: password,
  };

  async function fetchData() {
    const response = await fetch(url, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      credentials: "include",
      body: JSON.stringify(credentials),
    });

    const data = await response.json();
    if (data.status && data.status === "error") {
      switch (data.message) {
        case "USERNAME_NOT_FOUND":
          document.getElementById("error-message").textContent =
            "البريد الالكتروني غير صحيح!";
          break;
        case "Incorrect username and/or password.":
          document.getElementById("error-message").textContent =
            "رمز المرور غير صحيح!";
          break;
        case "USERNAME_NOT_ACTIVATED":
          document.getElementById("error-message").textContent =
            "لم يتم تفعيل حسابك، فضلا قم بتفعيله, قم بزيارة بريدك الالكتروني لتفعيل حسابك!";
          break;
      }
    } else {
      window.location.href = "main.html";
    }
  }

  fetchData()
    .catch((error) => {
      console.error("Error:", error);
    })
    .finally(() => {
      document.getElementById("submit-text").classList.remove("d-none");
      document.getElementById("spinner").classList.add("d-none");
    });
}

function register(event) {
  event.preventDefault();

  let firstName = document.getElementById("firstName").value;
  let lastName = document.getElementById("lastName").value;

  let email = document.getElementById("email").value;
  let password = document.getElementById("password").value;

  let countryCode = document.getElementById("country-code").value;
  let phone = document.getElementById("phone").value;
  let tel = countryCode + phone;

  let credentials = {
    firstName: firstName,
    lastName: lastName,
    username: email,
    password: password,
    tel: tel,
    haveWhatsapp: 1,
  };

  let url = "https://api-dev.buytfinder.com/web/register";

  async function registerUser() {
    try {
      const response = await fetch(url, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(credentials),
      });
      if (response.status === 200) {
        // const data = await response.json();
        let modal = new bootstrap.Modal(
          document.getElementById("activate-account-modal")
        );
        modal.show();

        // setTimeout(() => {
        //   let activationUrl = data.activationUrl;
        //   let hashCode = activationUrl.slice(
        //     activationUrl.lastIndexOf("=") + 1
        //   );
        //   window.location.href = "./activate.html?hash=" + hashCode;
        // }, 2000);
      } else if (response.status === 400) {
        const data = await response.json();
        if (data.message === "USERNAME_ALREADY_EXIST") {
          document.querySelector("form div > span.error-message").textContent =
            "البريد الالكتروني مستخدم بالفعل!";
        }
      }
    } catch (err) {
      console.log(err);
    }
  }

  registerUser();
}

async function logout() {
  let url = "https://api-dev.buytfinder.com/web/logout";
  async function logoutUser() {
    try {
      const response = await fetch(url, {
        method: "POST",
        credentials: "include",
      });
      if (response.status === 200) {
        sessionStorage.removeItem("loggedInUser");
        sessionStorage.setItem("loggedIn", false);
        window.location.href = "main.html";
      }
    } catch (err) {
      console.log(err);
    }
  }

  logoutUser();
}

async function checkIfLoggedIn() {
  let url = "https://api-dev.buytfinder.com/web/check";
  async function checkProfile() {
    try {
      const response = await fetch(url, {
        method: "GET",
        credentials: "include",
      });
      if (response.status === 200) {
        const data = await response.json();
        document.getElementById("profile-name").innerHTML = data.firstName;
        sessionStorage.setItem("loggedInUser", JSON.stringify(data));
        sessionStorage.setItem("loggedIn", true);
        return true;
      } else {
        sessionStorage.setItem("loggedIn", false);
        document.getElementById("profile-name").innerHTML = "حسابي";
        return false;
      }
    } catch (error) {
      console.error("Error:", error);
    }
  }

  checkProfile();
}

export {
  login,
  register,
  logout,
  checkIfLoggedIn,
  matchPasswords,
  toggleConfirmPassword,
  togglePassword,
};
