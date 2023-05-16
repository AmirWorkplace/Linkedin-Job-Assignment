<nav class="navbar">
  <div class="container">

    <div class="navbar-header">
      <button class="navbar-toggler" data-toggle="open-navbar1">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <a href="#">
        <h4>JOB<span>assignment</span></h4>
      </a>
    </div>

    <div class="navbar-menu" id="open-navbar1">
      <ul class="navbar-nav">
        <?php
        if (isset($_SESSION['email'])) { ?>
          <li><a class="active" href="profile.php">Profile</a></li>
        <?php  } else { ?>
          <li class="active"><a href="#">Home</a></li>
        <?php } ?>
        <li><a href="#">About</a></li>
      </ul>

      <div class="log-reg-btn">
        <?php
        if (isset($_SESSION['email'])) { ?>
          <a href="logout.php?logout=true">Logout</a>
        <?php  } else { ?>
          <a href="login.php">Register/Login</a>
        <?php } ?>
      </div>
    </div>
  </div>
</nav>

<script>
  const nav_icon = document.querySelector('.navbar-toggler');
  const navbar_menu = document.querySelector('.navbar-menu');

  nav_icon.addEventListener('click', () => {
    navbar_menu.classList.toggle('active');
  });
</script>