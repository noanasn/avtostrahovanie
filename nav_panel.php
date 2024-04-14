<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <title>Автострахование</title>
  <link rel="stylesheet" href="/mdb/css/mdb.min.css">
  <link rel="stylesheet" href="mdb/css/icons.css">
</head>
<style>
  body {
    background-color: #fbfbfb;
  }

  @media (min-width: 991.98px) {
    main {
      padding-left: 240px;
    }
  }

  .sidebar {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    padding: 58px 0 0;
    box-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%);
    width: 240px;
    z-index: 600;
  }

  @media (max-width: 991.98px) {
    .sidebar {
      width: 100%;
    }
  }

  .sidebar .active {
    border-radius: 5px;
    box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
  }

  .sidebar-sticky {
    position: relative;
    top: 0;
    height: calc(100vh - 48px);
    padding-top: 0.5rem;
    overflow-x: hidden;
    overflow-y: auto;
  }
</style>

<body>
  <!--Main Navigation-->
  <header>
    <!-- Button to toggle sidebar -->
    <button class="btn btn-secondary" style="position: fixed; top: 20px; left: 20px; z-index: 1000;" type="button" id="sidebarToggle" aria-label="Toggle sidebar">
      <i class="fas fa-bars fa-lg"></i>
    </button>


    <!-- Sidebar -->
    <nav id="sidebarMenu" class="collapse sidebar collapse bg-white">
      <div class="position-sticky">
        <div class="list-group list-group-flush mx-3 mt-4">
          <!-- Collapse 1 -->
          <a class="list-group-item list-group-item-action py-2 ripple" aria-current="true" data-mdb-toggle="collapse" href="#collapseExample1" aria-expanded="false" aria-controls="collapseExample1">
            <i class="fas fa-chart-area fa-fw me-3"></i><span>Таблицы</span>
          </a>
          <!-- Collapsed content 1 -->
          <div id="collapseExample1" class="collapse list-group list-group-flush">
            <li class="list-group-item py-1">
              <a class="text-reset" href="/admin/car/car.php">Автомобили</a>
            </li>
            <li class="list-group-item py-1">
              <a class="text-reset" href="/admin/drivers/drivers.php">Водители</a>
            </li>
            <li class="list-group-item py-1">
              <a class="text-reset" href="/admin/marka/marka.php">Марки</a>
            </li>
            <li class="list-group-item py-1">
              <a class="text-reset" href="/admin/model/model.php">Модели</a>
            </li>
            <li class="list-group-item py-1">
              <a class="text-reset" href="/admin/sobstvennic/sobstvennic.php">Собственники</a>
            </li>
            <li class="list-group-item py-1">
              <a class="text-reset" href="/admin/sotrudnik/sotrudnik.php">Сотрудники</a>
            </li>
            <li class="list-group-item py-1">
              <a class="text-reset" href="/admin/strahovatel/strahovatel.php">Страхователи</a>
            </li>
            <li class="list-group-item py-1">
              <a class="text-reset" href="/admin/strah_polis/strah_polis.php">Страховые полиса</a>
            </li>
            <li class="list-group-item py-1">
              <a class="text-reset" href="/admin/user/user.php">Пользователи</a>
            </li>
          </div>
          <!-- Collapse 1 -->
          <!-- Collapse 2 -->
          <a class="list-group-item list-group-item-action py-2 ripple" aria-current="true" data-mdb-toggle="collapse" href="#collapseExample2" aria-expanded="false" aria-controls="collapseExample2">
            <i class="fas fa-chart-area fa-fw me-3"></i><span>Отчеты</span>
          </a>
          <!-- Collapsed content 2 -->
          <div id="collapseExample2" class="collapse list-group list-group-flush">
            <li class="list-group-item py-1">
              <a class="text-reset" href="/admin/reports/SP_za_period/SP_za_period.php">СП оформленные за период</a>
            </li>
            <li class="list-group-item py-1">
              <a class="text-reset" href="/admin/reports/SP_po_sotr/SP_po_sotr.php">СП оформленные сотрудником</a>
            </li>
          </div>
          <!-- Collapse 2 -->
        </div>
      </div>
    </nav>
    <!-- Sidebar -->
  </header>
  <!--Main Navigation-->
  <script src="mdb/js/mdb.min.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var sidebarToggle = document.getElementById("sidebarToggle");
      var sidebarMenu = document.getElementById("sidebarMenu");

      if (sidebarToggle && sidebarMenu) {
        sidebarToggle.addEventListener("click", function() {
          if (sidebarMenu.classList.contains("show")) {
            sidebarMenu.classList.remove("show");
          } else {
            sidebarMenu.classList.add("show");
          }
        });
      }
    });
  </script>
</body>

</html>