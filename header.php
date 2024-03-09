  <header style="position: fixed; top: 0; left: 0; right: 0; z-index: 1000; width: 100%;">
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
          <!-- Navbar logo -->
          <a class="navbar-brand mt-2 mt-lg-0" href="/index.php">
            <img src="/img/logo.png" height="34" alt="Avtostrahovanie Logo" loading="lazy" />
          </a>
          <!-- Left links -->
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="/index.php">Главная</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/news/news.php">Новости</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/osago.php">ОСАГО</a>
            </li>
            <!-- эксперименты -->
            <!--  Проверить значение переменной 'login' в сессии -->
            <? if ($_SESSION['status_user']  == 'Администратор') {
              // Если 'login' равен 'admin', показать элемент
              echo '
              <ul class="navbar-nav">
              <!-- Раздел таблицы для администратора -->
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown d-flex align-items-center" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                    Таблицы</a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li>
                      <a class="dropdown-item" href="/admin/car/car.php">Автомобили</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="/admin/drivers/drivers.php">Водители</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="/admin/marka/marka.php">Марки</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="/admin/model/model.php">Модели</a>
                    </li> 
                    <li>
                      <a class="dropdown-item" href="/admin/sobstvennic/sobstvennic.php">Собственники</a>
                    </li> 
                    <li>
                      <a class="dropdown-item" href="/admin/sotrudnik/sotrudnik.php">Сотрудники</a>
                    </li> 
                    <li>
                      <a class="dropdown-item" href="/admin/strahovatel/strahovatel.php">Страхователи</a>
                    </li> 
                    <li>
                      <a class="dropdown-item" href="/admin/strah_polis/strah_polis.php">Страховые полиса</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="/admin/user/user.php">Пользователи</a>
                    </li>
                  </ul>
                </li>
                <!-- Раздел отчеты для администратора -->
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown d-flex align-items-center" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                    Отчеты</a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li>
                      <a class="dropdown-item" href="/admin/reports/SP_za_period/SP_za_period.php">СП оформленные за период</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="/admin/reports/SP_po_sotr/SP_po_sotr.php">СП оформленные сотрудником</a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item dropdown">
                      <a class="nav-link dropdown d-flex align-items-center" href="/admin/zhurnal/strah_polis_zh.php" id="navbarDropdownMenuLink" role="button" aria-expanded="false">
                      Журнал операций</a>
                </li>
                <li class="nav-item dropdown">
                      <a class="nav-link dropdown d-flex align-items-center" href="/admin/requests/requests.php" id="navbarDropdownMenuLink" role="button" aria-expanded="false">
                      Заявки</a>
                </li>
              </ul>';
            } else {
              // Если 'login' не равен 'admin', не показывать элемент
            }
            ?>
            <!-- эксперименты -->
          </ul>
          <!-- Left links -->
        </div>
        <!-- Collapsible wrapper -->

        <!-- Right elements -->
        <div class="d-flex align-items-center">
          <!-- Icon -->
          <a class="nav-link mx-3" href="/user/personal_account_strah.php"><? if ($_SESSION['status_user']  == 'Администратор') {
                                                          echo 'Администратор';
                                                        } else {
                                                          echo $_SESSION['login_user'];
                                                        } ?></a>
          <!-- Avatar -->
          <div class="dropdown">
            <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
              <i class="far fa-user fa-2x" style="color: rgb(71, 73, 74);"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
              <li>
                <a class="dropdown-item" href="/auto/auto.php">Вход <i class="fas fa-sign-in-alt" style="color: rgb(71, 73, 74);"></i></a>
              </li>
              <li>
                <a class="dropdown-item" href="/auto/reg2.php">Регистрация</a>
              </li>
              <li>
                <a class="dropdown-item" href="/auto/logout.php">Выход <i class="fas fa-sign-out-alt" style="color: rgb(71, 73, 74);"></i></a>
              </li>
              <? if (($_SESSION['status_user']  == 'Пользователь') or ($_SESSION['status_user']  == 'Страхователь')) {
                echo '<li>
                <a class="dropdown-item" href="/user/personal_account_strah.php">Личный кабинет</a>
              </li>';
              } else {
              } ?>
            </ul>
          </div>
          <!-- </div> -->
          <!-- Right elements -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
  </header>