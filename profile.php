<?php
session_start();
if (!isset($_SESSION['email'])) {
  header("location: login.php");
}

$id = $_SESSION['id'];
$email = $_SESSION['email'];

include_once("./config/db.php");
include_once("./app/ProfileController.php");

$Profile = new Profile();
$row = $Profile->getProfileData($conn, $id);
$get_profile_img = $Profile->getProfileImage($conn, $id);

if (isset($_POST['change_profile_img_btn'])) {
  $change_img_message = $Profile->changeProfileImg($conn, $_POST, $id);
}

if (isset($_POST['profile_data'])) {
  $profile_data_message = $Profile->changeProfileData($conn, $_POST, $id);
}

if (isset($_POST['change_password'])) {
  $change_password_message = $Profile->changePassword($conn, $_POST, $id);
}


?>



<?php
$title = 'Profile';
include_once("./header.php");
?>

<script>
  console.log('<?php echo $_SESSION['id']; ?>')
</script>


<body style="overflow-y: scroll;">
  <section class="main-body">
    <div class="profile-main-nav">
      <?php include_once("./navbar.php"); ?>
    </div>

    <!-- New Profile Pages -->

    <div class="profile-body" style="margin-top: 60px;">
      <div class="profile-container" style="align-items: flex-start;">

        <div class="profile-bio">
          <div class="profile-bio-container">
            <div class="message">
              <?php if (isset($change_img_message)) {
                echo "<p class='danger'>$change_img_message</p>";
              } else echo ""; ?>
            </div>
            <img src="<?php echo $get_profile_img; ?>" alt="profile_image">

            <form method="post" enctype="multipart/form-data" class="change-image">
              <label>
                <span>Choose profile photo:</span>
                <input type="file" name="profile_img" />
              </label>

              <div class="profile-change-img-btn" style="display: none;">
                <button type="submit" name="change_profile_img_btn">Save</button>
              </div>
            </form>

            <div class="work-link">
              <h3 class="mini-text"><span class="dash">-----</span>
                Work Link</h3>

              <a href="#"> GitHub </a>
              <a href="#"> Linked In </a>
              <a href="#"> Google Cloud </a>
            </div>

            <div class="profile-details">
              <h3 class="mini-text"><span class="dash">-----</span>
                Working Skill</h3>

              <p class="lh-5"> Web Design </p>
              <p class="lh-4"> Modern Web Design </p>
              <p class="lh-5"> Full Stuck Web Development </p>
              <p class="lh-4"> Single Page Web App Design </p>
              <p class="lh-4">
                Good Skill about <span>React.js</span>, <span>reduxjs</span>,
                <span>jQuery</span> & <span>Laravel with API</span>
              </p>
            </div>
          </div>
        </div>

        <div class="profile-action-body">
          <div class="delete-account">
            <button class="delete-btn"><span>Delete Account</span></button>

            <!-- Delete button Modal -->
            <div class="delete-box active">
              <div class="delete-box-container">
                <h1>Delete Account Permanently</h1>
                <p>Are you want to sure delete your Accounts Permanently? </p>

                <div class="delete-action-btn">
                  <button class="delete-cancel">Cancel</button>
                  <a href="<?php echo "delete.php?id={$id}" ?>" class="delete-submit">Confirm</a>
                </div>
              </div>
            </div>
          </div>
          <div class="profile-action-container">
            <div>
              <div class="message">
                <?php if (isset($profile_data_message)) {
                  echo "<p class='danger'>$profile_data_message</p>";
                } else echo ""; ?>
              </div>
              <div class="message">
                <?php if (isset($change_password_message)) {
                  echo "<p class='danger'>$change_password_message</p>";
                } else echo ""; ?>
              </div>
            </div>

            <div class="heading" style="margin-top: 30px;">
              <h2>
                <?php echo $row['username'] ?>
              </h2>
              <p>
                Web Back-end Developer in PHP & Laravel
              </p>

              <h3 class="mini-text">
                RANKING: <span>8/10</span></h3>

              <div class="mt-9">
                <div class="profile-navbar">
                  <ul class="profile-navbar-ul">
                    <li class="active"><button>Profile</button></li>
                    <li><button>Edit Profile </button></li>
                  </ul>
                </div>
              </div>

              <!-- Showing Profile Data -->
              <div class="profile-data">
                <div class="profile-data-box">
                  <strong>User Id</strong>
                  <span>:</span>
                  <p><?php echo $row['id']; ?></p>
                </div>

                <div class="profile-data-box">
                  <strong>User Name</strong>
                  <span>:</span>
                  <p><?php echo $row['username']; ?></p>
                </div>

                <div class="profile-data-box">
                  <strong>E-mail</strong>
                  <span>:</span>
                  <p><?php echo $row['email']; ?></p>
                </div>

                <div class="profile-data-box">
                  <strong>User Role</strong>
                  <span>:</span>
                  <p><?php echo $row['role']; ?></p>
                </div>
              </div>

              <!-- Update Profile Form -->
              <div class="profile-data-edit" style="display: none;">
                <div class="profile-edit-container">
                  <div class="profile-edit-box">
                    <form class="profile-edit-form" method="post">
                      <h3>Change User Data
                      </h3>
                      <div class="profile-edit-input-box">
                        <label for="username">
                          Username
                        </label>
                        <input class="username" required id="username" name="username" type="text" value="<?php echo $row['username']; ?>">
                      </div>
                      <div class="profile-edit-input-box">
                        <label for="password">
                          E-mail
                        </label>
                        <input class="email" required id="email" name="email" type="email" value="<?php echo $row['email']; ?>">
                      </div>
                      <div class="profile-edit-save-btn">
                        <button type="submit" name="profile_data">
                          Save
                        </button>
                      </div>
                    </form>
                  </div>

                  <div class="profile-edit-box">
                    <form class="profile-edit-form" method="post">
                      <h3>Change User Password
                      </h3>
                      <div class="profile-edit-input-box">
                        <label for="username">
                          New Password
                        </label>
                        <input class="username" required id="new_password" name="new_password" type="password" placeholder="****************">
                        <i class="password-show-hide-icon">
                          <ion-icon name="eye-off-outline" class="eye-off"></ion-icon>
                          <ion-icon name="eye-outline" class="eye"></ion-icon>
                        </i>
                      </div>
                      <div class="profile-edit-input-box">
                        <label for="password">
                          Current Password
                        </label>
                        <input class="email" required id="current_password" name="current_password" type="password" placeholder="****************">
                        <i class="password-show-hide-icon">
                          <ion-icon name="eye-off-outline" class="eye-off"></ion-icon>
                          <ion-icon name="eye-outline" class="eye"></ion-icon>
                        </i>
                      </div>
                      <div class="profile-edit-save-btn">
                        <button type="submit" name="change_password">
                          Change Password
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
      // Profile Edit and View nav Handling
      const profile_data = document.querySelector('.profile-data')
      const profile_data_edit = document.querySelector('.profile-data-edit')
      const profileNav_buttons = document.querySelectorAll('.profile-navbar-ul li');

      profileNav_buttons[0].addEventListener('click', () => {
        profileNav_buttons[0].classList.add('active');
        profileNav_buttons[1].classList.remove('active');
        profile_data.style.display = 'block';
        profile_data_edit.style.display = 'none';
      });

      profileNav_buttons[1].addEventListener('click', () => {
        profileNav_buttons[0].classList.remove('active');
        profileNav_buttons[1].classList.add('active');
        profile_data.style.display = 'none';
        profile_data_edit.style.display = 'block';

      });

      // Password Show and Hide Pattern
      const passwordShowHide = document.querySelectorAll(".password-show-hide-icon");

      passwordShowHide.forEach((icon) => {
        icon.addEventListener("click", () => {
          icon.classList.toggle("active")
          let getPwInput = icon.parentElement.querySelector("input")
          if (getPwInput.type === "password") {
            getPwInput.type = "text"
          } else {
            getPwInput.type = "password"
          }
        });
      });

      // Profile Picture Change Form
      const change_image = document.querySelector('.change-image');
      const change_btn = document.querySelector('.profile-change-img-btn');

      change_image.addEventListener('click', () => {
        change_btn.style.display = 'flex';
      });

      // Delete button Event Handling
      const delete_btn = document.querySelector(".delete-btn");
      const delete_box = document.querySelector(".delete-box");
      const delete_cancel = document.querySelector(".delete-cancel");

      delete_btn.addEventListener('click', () => {
        delete_box.classList.remove("active");
      });

      delete_cancel.addEventListener('click', () => {
        delete_box.classList.add("active");
      });
    </script>

    <!-- New Profile Pages -->

  </section>
  <?php include_once("./footer.php"); ?>