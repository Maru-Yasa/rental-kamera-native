<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"> <i class="bi bi-camera-fill text-white"></i> Rental Kamera Bantul</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-iten">
            <a class="nav-link active" aria-current="page" href="/admin">Admin</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
            <?php if($_SESSION['isAuthenticated'] === true){ ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bi bi-person-fill"></i> <?= $_SESSION['user']['username'] ?>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#"> <i class="bi bi-pencil"></i> Edit</a></li>
                  <li>
                    <form action="logout.php" method="get">
                      <button type="submit" class="btn dropdown-item" value="Logout"><i class="bi bi-box-arrow-right"></i> Logout</button>
                    </form>
                  </li>

                </ul>
              </li>
            <?php } ?>
      </ul>
    </div>
  </div>
</nav>