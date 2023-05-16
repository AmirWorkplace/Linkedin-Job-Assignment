<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="./assets/css/style.css"> -->
  <link rel="stylesheet" href="./assets/css/custom_style.css">
  <link rel="stylesheet" href="./assets/css/profile.css">
  <title>
    <?php
    echo $title;


    ?>
  </title>
  <!-- <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" /> -->

  <!-- Delete modal Styles -->
  <style>
    .delete-btn {
      display: flex;
      width: 100%;
      align-items: center;
      justify-content: end;
      height: auto;

    }

    .delete-btn span {
      margin: 20px;
      padding: 6px 18px;
      font-size: 18px;
      font-weight: 700;
      text-transform: uppercase;
      background-color: #ce150f;
      color: #cdcdcd;
      border-radius: 24px;
      border: 2px solid #ccc;
      transition: 0.5s;
      position: relative;
      box-shadow: 0px 4px 6px 0px rgba(0, 0, 0, 0.12);
    }

    .delete-btn span:hover {
      letter-spacing: 0.02rem;
      background-color: #000;
      color: #fff;
    }

    .profile-main-nav {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      z-index: 10;
    }

    .delete-box {
      position: fixed;
      background: transparent;
      top: 0;
      left: 0;
      width: 100%;
      min-height: 90vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .delete-box.active {
      display: none !important;
    }

    .delete-box-container {
      padding: 12px;
      width: 320px;
      height: 200px;
      background: #fff;
      color: #000;
      border-radius: 8px;
      text-align: start;
      border: 2px solid #ccc;
      box-shadow: 0px 4px 6px 0px rgba(0, 0, 0, 0.12);
    }

    .delete-box-container p {
      font-size: 16px;
      font-weight: 400;
      padding: 10px 20px;
      line-height: 1;
      color: #ce150f;
      text-align: justify;
    }

    .delete-box h1 {
      color: #000;
      font-size: 18px;
      text-align: center;
      padding: 0 5px;
      text-decoration: underline;
      font-weight: 800;
    }

    .delete-action-btn {
      display: flex;
      align-items: center;
      justify-content: end;
      gap: 12px;
      height: 100%;
      width: 100%;
      padding: 5px;
    }

    .delete-action-btn a,
    .delete-action-btn button {
      font-size: 16px;
      font-family: 'Roboto Mono', sans-serif;
      font-weight: 600;
      width: 100px;
      height: 30px;
      display: flex;
      align-items: center;
      justify-content: center;
      border: 2px solid #ccc;
      transition: 0.35s;
      border-radius: 6px;
      outline: none;
      text-decoration: none;
      margin-bottom: 20px;
    }

    .delete-action-btn .delete-cancel {
      color: #000;
      background-color: #cdcdcd;
    }

    .delete-action-btn .delete-submit:hover {
      color: #ce150f;
      background-color: #fff;
      letter-spacing: 0.1rem;
    }

    .delete-action-btn .delete-cancel:hover {
      color: #cdcdcd;
      background-color: #000;
      letter-spacing: 0.1rem;
    }

    .delete-action-btn .delete-submit {
      color: #fff;
      background-color: #ce150f;
    }

    @media all and (max-width:1024px) {
      .profile-body {
        height: auto;
      }

      .profile-container {
        flex-direction: column;
      }

      .profile-action-body,
      .profile-bio {
        width: 100%;
      }
    }

    @media all and (max-width:844px) {
      .profile-edit-container {
        max-height: fit-content;
        height: auto;
        flex-direction: column;
      }
    }

    @media all and (max-width:644px) {
      .profile-body {
        padding: 0;
      }

      .heading p {
        word-break: break-all;
      }

      .delete-box-container {
        width: auto;
        height: auto;
      }
    }
  </style>
</head>