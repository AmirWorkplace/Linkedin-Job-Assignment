<?php

class Auth
{
  public function register($conn, $data)
  {
    $name = $data['username'];
    $email = $data['email'];
    $password = $data['password'];
    $role = 'user';
    $created_at = gmdate('Y-m-d\TH:i:s\Z', strtotime('now'));
    $updated_at = gmdate('Y-m-d\TH:i:s\Z', strtotime('now'));
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $check_unique_user = mysqli_query($conn, "SELECT * FROM `users` WHERE `email`='$email'");
    $query = "INSERT INTO `users`(`username`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES ( '$name','$email','$hashed_password','$role','$created_at','$updated_at')";


    if (mysqli_num_rows($check_unique_user) > 0) {
      return "<p class='danger'>{$email} this email is already exist, Please log in!</p>";
    } else {
      if (mysqli_query($conn, $query)) {

        session_start();

        $_SESSION['id'] = mysqli_insert_id($conn);
        $_SESSION['role'] = $role;
        $_SESSION['email'] = $email;

        header("location: profile.php");
        return "<p class='success'>Registration Successful! Password is = {$hashed_password}</p>";
      } else {
        return "<p class='danger'>Something went wrong, Please fill all the required fields!</p>";
      }
    }
  }

  public function login($conn, $data)
  {
    $email = $data['email'];
    $password = $data['password'];

    $check_exist_user = mysqli_query($conn, "SELECT * FROM `users` WHERE `email`='$email'");

    if (mysqli_num_rows($check_exist_user) > 0) {
      $result = mysqli_fetch_assoc($check_exist_user);
      $res_id = $result['id'];
      $res_role = $result['role'];
      $res_email = $result['email'];
      $hashed_password = $result['password'];

      if (password_verify($password, $hashed_password)) {

        session_start();
        $_SESSION['id'] = $res_id;
        $_SESSION['role'] = $res_role;
        $_SESSION['email'] = $res_email;

        header("location: profile.php");
        return "<p class='success'>Your are successfully Logged in!</p>";
      } else {
        return "<p class='danger'>Your password is incorrect!</p>";
      }
    } else {

      return "<p class='danger'>Your E-mail is not registered, Please register an account!</p>";
    }
  }

  public function logout()
  {
    session_destroy();
    session_reset();

    header("location: login.php");
    return "<p class='success'>You are successfully logged Out!</p>";
  }

  public function deleteUserAccount($conn, $id)
  {
    $user_img = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `profile_img` FROM `profile` WHERE `user_id` = $id"))['profile_img'];

    $delete_user_query = "DELETE FROM `users` WHERE `id`=$id";
    $delete_profile_query = "DELETE FROM `profile` WHERE `user_id`=$id";

    if (mysqli_query($conn, $delete_user_query) && mysqli_query($conn, $delete_profile_query)) {
      $message = "Your Account Data Permanently Deleted!";

      if (file_exists($user_img)) {
        unlink($user_img);
        $message = "Your Profile Images Deletes Successfully!";
      } else {
        $message = "Your Account Images not Found!";
      }

      session_destroy();
      session_reset();

      header("location: login.php");
      return $message;
    }
  }
}
