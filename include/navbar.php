
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">AICSIS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Setting
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Account</a>
          <a class="dropdown-item" href="#">User Account</a>
        </div>
      </li>
      <li>
        <form action="../logout.php" method="POST"> 
          <button type="submit" name="btn_logout" class="nav-link" id="btn_logout">Logout</button>
        </form>
      </li>
    </ul>
  </div>
</nav>