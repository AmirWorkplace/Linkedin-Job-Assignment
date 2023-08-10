<?php

$title = "Login Page";

session_start();
if (isset($_SESSION['email'])) {
  header("location: profile.php");
}

include_once("./config/db.php");
include_once("./app/AuthenticationController.php");

$Auth = new Auth();


if (isset($_POST['login_btn'])) {
  $message = $Auth->login($conn, $_POST);
}


?>


<?php include_once("./header.php"); ?>

<body style="overflow: hidden;">
  <section class="main-body">

    <?php include_once("./navbar.php"); ?>

    <div class="form-container">
      <section class="home">
        <div class="form_container">
          <!-- <i class="uil uil-times form_close"></i> -->
          <div class="form">
            <form method="post">
              <h2>Login</h2>
              <div class="message">
                <?php if (isset($message)) {
                  echo "<p class='danger'>{$message}</p>";
                } ?>
              </div>
              <div class="input_box">
                <input type="email" placeholder="E-mail" name="email" required />
                <i class="email"><ion-icon name="mail-outline"></ion-icon></i>
              </div>
              <div class="input_box">
                <input name="password" type="password" id="password" placeholder="Password" required />
                <i class="password"><ion-icon name="lock-closed-outline"></ion-icon></i>
                <i class="pw_hide">
                  <ion-icon class="eye" name="eye-outline"></ion-icon>
                  <ion-icon class="eye-off" name="eye-off-outline"></ion-icon>
                </i>
              </div>

          </div>
          <div class="action-btn">
            <button class="button" type="submit" name="login_btn">Login Now</button>
          </div>
          <div class="login_signup">Already have an account? <a href="./register.php" id="login">Register</a></div>
          </form>
        </div>
    </div>
  </section>
  </div>
  </section>

  <script>
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
  </script>

  <?php include_once("./footer.php"); ?>