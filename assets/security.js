import "bootstrap";

import "./styles/security.scss";
import "./styles/select2.scss";
import "./styles/register.scss";

document.addEventListener("DOMContentLoaded", (event) => {
  const isPract = document.querySelector("#isPractitionner_0");
  const specilities = document.querySelector("#specilities");
  const inputPassword = document.querySelector("#inputPassword");
  const eyeSlashFill = document.querySelector(".bi-eye-slash-fill");
  const eyeFill = document.querySelector(".bi-eye-fill");
  // $("specilities").select2();

  // console.log(eyeSlash);

  if (!(typeof isPract !== undefined || typeof isPract != null)) {
    isPract.addEventListener("change", () => {
      if (isPract.checked) {
        specilities.classList.remove("d-none");
      } else {
        specilities.classList.add("d-none");
      }
    });
  }

  if (typeof eyeSlashFill !== undefined || typeof eyeSlashFill !== null) {
    eyeSlashFill.addEventListener("click", () => {
      eyeSlashFill.classList.add("d-none");
      eyeFill.classList.remove("d-none");
      inputPassword.type = "text";
    });
  }
  if (typeof eyeFill !== undefined || typeof eyeFill !== null) {
    eyeFill.addEventListener("click", () => {
      eyeFill.classList.add("d-none");
      eyeSlashFill.classList.remove("d-none");
      inputPassword.type = "password";
    });
  }
});
