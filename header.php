  <header style="position: fixed; top: 0; left: 0; right: 0;">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <!-- Container wrapper -->
      <div class="container-fluid">
        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Navbar brand -->
          <a class="navbar-brand mt-2 mt-lg-0" href="../index.php">
            <img src="/img/logo.png" height="35" alt="Avtostrahovanie Logo" loading="lazy" />
          </a>
          <!-- Left links -->
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="../index.php">Главная</a>
            </li>
          </ul>
          <!-- Left links -->
        </div>
        <!-- Collapsible wrapper -->

        <!-- Right elements -->
        <div class="d-flex align-items-center">
          <!-- Icon -->
          <a class="nav-link mx-3" href="../index.php"><?= $_SESSION['login']; ?></a>
          <!-- Avatar -->
          <div class="dropdown">
            <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
              <i class="far fa-user fa-2x" style="color: rgb(71, 73, 74);"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
              <li>
                <a class="dropdown-item" href="../auto/auto.php">Вход <i class="fas fa-sign-in-alt" style="color: rgb(71, 73, 74);"></i></a>
              </li>
              <li>
                <a class="dropdown-item" href="../auto/reg2.php">Регистрация
                  <!--<i class="fas fa-user-plus"  style="color: rgb(71, 73, 74);"></i>--> </a>
              </li>
              <li>
                <a class="dropdown-item" href="../auto/logout.php">Выход <i class="fas fa-sign-out-alt" style="color: rgb(71, 73, 74);"></i></a>
              </li>
            </ul>
          </div>
          <!-- </div> -->
          <!-- Right elements -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
  </header>