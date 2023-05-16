<?php

session_start();
if (isset($_SESSION['email'])) {
  header("location: profile.php");
  // echo $_SESSION['email'];
}

include_once("./config/db.php");
include_once("./app/AuthenticationController.php");

$Auth = new Auth();

if (isset($_POST['register_btn'])) {
  $message = $Auth->register($conn, $_POST);
}


?>


<?php
$title = 'Registration';
include_once("./header.php");
?>



<body style="overflow: hidden;">
  <section class="main-body">

    <?php include_once("./navbar.php"); ?>



    <div class="form-container">
      <section class="home">
        <div class="form_container active">
          <!-- <i class="uil uil-times"></i> -->
          <div class="form">
            <form method="post">
              <h2>Signup</h2>
              <div class="message"><?php echo $message; ?></div>
              <div class="input_box">
                <input type="text" placeholder="Username" name="username" required />
                <i class="username"><ion-icon name="person-add-outline"></ion-icon></i>
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
              <div class="input_box">
                <input type="password" id="confirm_password" placeholder="Confirm password" required />
                <i class="password"><ion-icon name="lock-closed-outline"></ion-icon></i>
                <i class="pw_hide">
                  <ion-icon class="eye" name="eye-outline"></ion-icon>
                  <ion-icon class="eye-off" name="eye-off-outline"></ion-icon>
                </i>
              </div>
              <div class="action-btn">
                <p class="button disabled">Required all the filed</p>
              </div>
              <div class="login_signup">Already have an account? <a href="./login.php" id="login">Login</a></div>
            </form>
          </div>
        </div>
      </section>
    </div>
  </section>

  <script>
    document.querySelector('form').reset();
    const pass = document.querySelector("#password")
    const message = document.querySelector(".message")
    const action_btn = document.querySelector(".action-btn")
    const con_pass = document.querySelector("#confirm_password")

    const reg_btn_enabled = `<p class="button disabled">Required all the filed</p>`;
    const reg_btn_disabled = `<button class="button" type="submit" name="register_btn">Register Now</button>`;

    pass.addEventListener('keyup', passwordVerify);
    con_pass.addEventListener('keyup', passwordVerify);

    // Password Validation to match Password and Confirm Password
    function passwordVerify() {
      const pass_value = pass.value;
      const c_pass_value = con_pass.value;

      if (pass_value.length < 8 && c_pass_value.length < 8) {
        action_btn.innerHTML = reg_btn_enabled;
        message.innerHTML = `<p class='danger'>Your password length is less than 8 character!</p>`;
      } else {
        if (pass_value !== c_pass_value && c_pass_value !== pass_value) {
          action_btn.innerHTML = reg_btn_enabled;
          message.innerHTML = `<p class='danger'>Your password and confirm password doesn't match!</p>`;
        } else {
          message.innerHTML = "";
          action_btn.innerHTML = reg_btn_disabled;
        }
      }
    }

    // Password Showing and Hide Icons
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