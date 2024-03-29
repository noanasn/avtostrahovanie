<!DOCTYPE html>
<html lang="ru">

<head>
  <title>Регистрация</title>
  <link rel="stylesheet" href="../mdb/css/mdb.min.css">
  <link rel="stylesheet" href="../mdb/css/style.css">
  <link rel="stylesheet" href="../mdb/css/icons.css">
</head>

<body>
  <section class="intro">
    <div class="mask d-flex align-items-center h-100" style="background-color: #D6D6D6">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-lg-9 col-xl-7">
            <div class="card">
              <?php require "../header.php"; ?>
              <div class="card-body p-4 p-md-5">
                <h1 class="fw-bold mb-0" style="text-align: center;">Регистрация</h1><br>

                <form action="add_user.php" method="post">

                  <div class="row">
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <input type="text" id="firstName" name="famu" class="form-control" maxlength="30" required/>
                        <label class="form-label" for="firstName">Фамилия</label>
                      </div>
                    </div>

                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <input type="text" id="login" name="log" class="form-control" maxlength="30" required/>
                        <label class="form-label" for="login">Логин</label>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <input type="text" id="lastName" name="nameu" class="form-control" maxlength="30" required/>
                        <label class="form-label" for="lastName">Имя</label>
                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <input type="password" id="password" name="pass" class="form-control" maxlength="30" required/>
                        <label class="form-label" for="password">Пароль</label>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <input type="text" id="patronymic" name="otchu" class="form-control" maxlength="30" required/>
                        <label class="form-label" for="patronymic">Отчество</label>
                      </div>
                    </div>
                    <!-- <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <input type="date" id="birthday" name="birth" class="form-control" required/>
                        <label class="form-label" for="birthday">Дата рождения</label>
                      </div>
                    </div> -->
                  </div>

                  <!-- <div class="row">
                    <div class="col-md-12 mb-4">
                      <div class="form-outline">
                        <input type="tel" id="numberavto" name="VIN" class="form-control" maxlength="17"/>
                        <label class="form-label" for="numberavto">VIN автомобиля</label>
                      </div>
                    </div>
                  </div> -->

                  <div class="row text-center">
                    <div class="col-12">
                      <div class="mx-auto">
                        <input class="btn btn-outline-dark" type="submit" value="Зарегистрироваться" />
                      </div>
                    </div>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="../mdb/js/mdb.min.js"></script>
</body>

</html>