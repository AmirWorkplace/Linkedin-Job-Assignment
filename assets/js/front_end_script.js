const pwShowHide = document.querySelectorAll(".pw_hide")

pwShowHide.forEach((icon) => {
  icon.addEventListener("click", () => {
    icon.classList.toggle("active")
    let getPwInput = icon.parentElement.querySelector("input")
    if (getPwInput.type === "password") {
      getPwInput.type = "text"
    } else {
      getPwInput.type = "password"
    }
  })
})

// icon.classList.add("active")
// icon.classList.replace("uil-eye-slash", "uil-eye")
// icon.classList.remove("active")

// , formOpenBtn = document.querySelector("#form-open"),
// home = document.querySelector(".home"),
// formContainer = document.querySelector(".form_container"),
// formCloseBtn = document.querySelector(".form_close"),
// signupBtn = document.querySelector("#signup"),
// loginBtn = document.querySelector("#login"),

// formOpenBtn.addEventListener("click", () => home.classList.add("show"))
// formCloseBtn.addEventListener("click", () => home.classList.remove("show"))

// signupBtn.addEventListener("click", (e) => {
//   e.preventDefault()
//   formContainer.classList.add("active")
// })
// loginBtn.addEventListener("click", (e) => {
//   e.preventDefault()
//   formContainer.classList.remove("active")
// })
