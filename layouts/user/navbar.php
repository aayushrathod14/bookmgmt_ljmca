<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" href="#">LJMCA A48-49-50</a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?=current_file()==''?'active':''?>" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?=current_file()=='cart.php'?'active':''?>" href="/cart.php">Cart</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?=current_file()=='myorder.php'?'active':''?>" href="/myorder.php">Orders</a>
        </li>
      </ul>
      <form class="d-flex">
        <?php
          if(!auth_user()){ ?>
          <a href="signup.php" class="btn btn-outline-primary signupBtn" type="button">Sign Up</a>
          <a href="login.php" class="btn btn-outline-success" type="button">Log In</a>
        <?php } else{ ?>
          <span class="user_logged_text">Logged In  : <?=auth_user()['firstname']?></span>
          <a href="logout.php" class="btn btn-outline-primary signupBtn" type="button">Logout</a>
        <?php } ?>
      </form>
    </div>
  </div>
</nav>