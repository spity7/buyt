document.addEventListener("DOMContentLoaded", async function () {
  const globalUrl = new URL(window.location.href);
  const params = new URLSearchParams(globalUrl.search);
  let hash = params.get("hash");

  let url = `https://api-dev.buytfinder.com/web/activate`;
  let body = {
    hash: hash,
  };

  let response = await fetch(url, {
    method: "POST",
    body: JSON.stringify(body),
    headers: {
      "Content-Type": "application/json",
    },
    credentials: "include",
  });
  if (response.status === 200) {
    document.querySelector("div>img.activate-img").src =
      "./assets/images/successful.png";
    document.querySelector("div>h3.response-result").innerHTML =
      "تم التفعيل بنجاح, سوف يتم تحويلك لصفحة تسجيل الدخول...";
    setTimeout(() => {
      window.location.href = "signin.html";
    }, 2000);
  } else {
    const parsedResponse = await response.json();
    switch (parsedResponse.message) {
      case "PLEASE_CONTACT_SUPPORT":
        document.querySelector("div>img.activate-img").src =
          "./assets/images/failed.png";
        document.querySelector("div>h3.response-result").innerHTML =
          "يرجى التواصل مع الدعم الفني الخاص بنا لتفعيل حسابك";
        break;
      case "ACCOUNT_ALREADY_ACTIVATED":
        document.querySelector("div>img.activate-img").src =
          "./assets/images/info.png";
        document.querySelector("div>h3.response-result").innerHTML =
          "تم التفعيل من قبل";
        setTimeout(() => {
          window.location.href = "signin.html";
        }, 3000);
        break;
    }
  }
  document.querySelector("div>img.activate-img").classList.remove("d-none");
});
