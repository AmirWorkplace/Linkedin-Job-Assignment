<?php

class Profile
{
  public function changeProfileImg($conn, $data, $id)

  {
    $get_img = $_FILES['profile_img']['name'];
    $tmp_name = $_FILES['profile_img']['tmp_name'];

    $created_at = gmdate('Y-m-d\TH:i:s\Z', strtotime('now'));
    $updated_at = gmdate('Y-m-d\TH:i:s\Z', strtotime('now'));

    $extension = pathinfo($get_img, PATHINFO_EXTENSION);
    $img_name = uniqid() . bin2hex(random_bytes(8)) . '.' . $extension;
    $img = "uploads/images/" . $img_name;
    $allowed_img_ext =  array("jpeg", "jpg", "png", "gif", "svg", "bmp", "webp", "JPEG", "JPG", "PNG", "GIF", "SVG", "BMP", "WEBP");

    $check_existing_profile = mysqli_query($conn, "SELECT * FROM `profile` WHERE `user_id`=$id");

    if (in_array($extension, $allowed_img_ext)) {
      if (mysqli_num_rows($check_existing_profile) == 0) {

        $query = "INSERT INTO `profile`(`user_id`, `profile_img`, `created_at`, `updated_at`) VALUES ($id,'$img','$created_at','$updated_at')";

        if (mysqli_query($conn, $query)) {

          move_uploaded_file($tmp_name, $img);
          header("location: profile.php");

          return "Image saved successfully!";
        } else {
          return "Something went wrong, Please try Again!";
        }
      } else {
        $result = mysqli_query($conn, "SELECT `profile_img` FROM `profile` WHERE `user_id` = $id");
        $get_profile_data = mysqli_fetch_assoc($result);
        $current_images = $get_profile_data['profile_img'];

        if (file_exists($current_images)) {
          unlink($current_images);
        }

        $update_query = "UPDATE `profile` SET  `profile_img`='$img',`updated_at`='$updated_at' WHERE `user_id` = $id";

        if (mysqli_query($conn, $update_query)) {

          move_uploaded_file($tmp_name, $img);
          header("location: profile.php");

          return "Image saved successfully!";
        } else {
          return "Something went wrong, Please try Again!";
        }
      }
    } else {
      return 'Your images are not valid, please try to select `"jpeg", "svg", "jpg", "png", "gif", "bmp", "webp", "JPEG", "JPG", "PNG", "GIF", "SVG", "BMP", "WEBP"` this type of file.';
    }
  }

  public function changeProfileData($conn, $data, $id)

  {
    $username = mysqli_real_escape_string($conn, $data['username']);
    $email = mysqli_real_escape_string($conn, $data['email']);
    $updated_at = gmdate('Y-m-d\TH:i:s\Z', strtotime('now'));

    $check_existing_email = mysqli_query($conn, "SELECT * FROM `users` WHERE `email`='$email'");
    $query = "UPDATE `users` SET `username`='$username', `email`='$email', `updated_at`='$updated_at' WHERE `id`=$id";

    if (mysqli_num_rows($check_existing_email) > 1) {
      return "Sorry, email not updated. This E-mail already exist";
    } else {
      if (mysqli_query($conn, $query)) {
        session_start();
        $_SESSION['email'] = $email;

        header("Refresh: 0");
        return "Your Data updated successfully!";
      } else {
        return "Something went wrong, Please try Again!";
      }
    }
  }

  public function getProfileData($conn, $id)
  {
    $query = "SELECT * FROM `users` WHERE `id`=$id";
    if (mysqli_query($conn, $query)) {
      $result = mysqli_fetch_assoc(mysqli_query($conn, $query));
      return $result;
    } else {
      return "No Users Founded!";
    }
  }

  public function getProfileImage($conn, $id)
  {
    $query = "SELECT `profile_img` FROM `profile` WHERE `user_id`=$id";
    $demo_img = "./assets/imgs/demo_image.png";

    if (mysqli_query($conn, $query)) {
      $result = mysqli_query($conn, $query);
      if (mysqli_num_rows($result) <= 0) {
        return $demo_img;
      } else {
        return mysqli_fetch_assoc($result)['profile_img'];
      }
    } else {
      return $demo_img;
    }
  }

  public function changePassword($conn, $data, $id)
  {
    $new_password = $data['new_password'];
    $current_password = $data['current_password'];
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    $get_current_password = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `password` FROM `users` WHERE `id`=$id"))['password'];

    if ($get_current_password) {
      if (password_verify($current_password, $get_current_password)) {
        $query = "UPDATE `users` SET `password`='$hashed_password' WHERE `id`=$id";
        if (mysqli_query($conn, $query)) {
          header("Refresh: 0");
          return "Your Password updated Successfully!";
        } else {
          return "Your Password couldn't updated!";
        }
      } else {
        return "Your Password your Current Password didn't Match!";
      }
    } else {
      return "Something happened Wrong! Please try again!";
    }

    return $get_current_password;
  }
}
