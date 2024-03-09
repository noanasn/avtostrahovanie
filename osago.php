<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="/mdb/css/mdb.min.css">
  <link rel="stylesheet" href="mdb/css/icons.css">
  <title>ОСАГО</title>
  <?php
  include $_SERVER["DOCUMENT_ROOT"] . "/connect.php";
  session_start();
  $marks_data  = mysqli_query($db, "SELECT * FROM `marka` order by Nazvanie ASC");
  ?>
</head>

<body>
  <?php include "header.php"; ?>
  <div class="container" style="margin-top: 62px;">
    <div class="row justify-content-start mb-4">
      <div class="col-md-12">
        <h2>Оформление заявки на получение полиса ОСАГО</h2>
        <p>Здесь вы можете быстро и удобно подать заявку на оформление полиса ОСАГО, которая будет рассмотрена нашим специалистом.</p>
        <p>Для этого Вам необходимо:</p>
        <ul>
          <li>Авторизоваться на сайте</li>
          <li>Заполнить все поля формы</li>
          <li>Нажать на кнопку "Отправить заявку"</li>
        </ul>
        <p>После этого, Ваша заявка будет рассмотрена нашим специалистом в течение трёх рабочих дней. При одобрении заявки, вы сможете увидеть данные о страховом полисе и дальнейшие инструкции в Вашем личном кабинете</p>
      </div>
    </div>
    <form id="insuranceForm" action="/add_request.php" method="post">
      <h4>Автомобиль</h4>
      <div class="border border-3 rounded-5" style="padding: 20px;">
        <div class="row">
          <!-- Марка -->
          <div class="col">
            <select class="form-select" name="marka" id="marka" required>
              <option value="" disabled selected hidden>Марка</option>
              <?php while ($marks = mysqli_fetch_array($marks_data)) {
                if ($cars['idMarka'] === $marks['id']) {
                  echo "<option value = $marks[id] selected>$marks[Nazvanie]</option>";
                } else {
                  echo "<option value = $marks[id]>$marks[Nazvanie]</option>";
                }
              } ?>
            </select>
          </div>
          <!-- Модель -->
          <div class="col">
            <select class="form-select" name="model" id="model" required>
              <option value="" disabled selected hidden>Модель</option>
            </select>
          </div>
          <!-- Мощность -->
          <div class="col">
            <div class="form-outline col-md-6 mb-4">
              <input type="number" id="power" class="form-control" name="power" required />
              <label class="form-label" for="power">Мощность двигателя</label>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- VIN -->
          <div class="col">
            <div class="form-outline col-md-6 mb-4">
              <input type="text" class="form-control" name="VIN" id="VIN" maxlength="17" required />
              <label for="VIN" class="form-label">VIN</label>
            </div>
          </div>
          <!-- ГосНомер -->
          <div class="col">
            <div class="form-outline col-md-6 mb-4">
              <input type="text" class="form-control" name="gos_znak" id="gos_znak" maxlength="9" required />
              <label for="gos_znak" class="form-label">Государственный номер</label>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- Тип документа -->
          <div class="col">
            <select class="form-select" name="doc_type" id="doc_type" required>
              <option value="" disabled selected hidden>Тип документа</option>
              <option value="СТС">СТС</option>
              <option value="ПТС">ПТС</option>
            </select>
          </div>
          <!-- Серия документа -->
          <div class="col">
            <div class="form-outline col-md-6 mb-4">
              <input type="text" class="form-control" name="doc_series" id="doc_series" maxlength="4" required />
              <label for="doc_series" class="form-label">Серия документа</label>
            </div>
          </div>
          <!-- Номер документа -->
          <div class="col">
            <div class="form-outline col-md-6 mb-4">
              <input type="number" class="form-control" name="doc_number" id="doc_number" required />
              <label for="doc_number" class="form-label">Номер документа</label>
            </div>
          </div>
        </div>
      </div>

      <h4 style="margin-top: 20px;">Собственник автомобиля</h4>
      <div class="border border-3 rounded-5" style="padding: 20px;">
        <!-- Собственник -->
        <div class="row">
          <div class="col">
            <div class="form-outline mb-4">
              <input type="text" id="sobstv_surname" class="form-control" name="sobstv_surname" maxlength="30" required />
              <label class="form-label" for="sobstv_surname">Фамилия</label>
            </div>
          </div>

          <div class="col">
            <div class="form-outline mb-4">
              <input type="text" id="sobstv_name" class="form-control" name="sobstv_name" maxlength="30" required />
              <label class="form-label" for="sobstv_name">Имя</label>
            </div>
          </div>

          <div class="col">
            <div class="form-outline mb-4">
              <input type="text" id="sobstv_patronymic" class="form-control" name="sobstv_patronymic" maxlength="30" required />
              <label class="form-label" for="sobstv_patronymic">Отчество</label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <select class="form-select" name="city" id="city" required>
              <option value="" disabled selected hidden>Город регистрации собственника автомобиля</option>
              <option value="1.48">Владимир</option>
              <option value="1.24">Волгоград</option>
              <option value="1.4">Воронеж</option>
              <option value="1.64">Екатеринбург</option>
              <option value="1.8">Казань</option>
              <option value="1.08">Калининград</option>
              <option value="1.64">Краснодар</option>
              <option value="1.64">Красноярск</option>
              <option value="1.8">Москва</option>
              <option value="1.64">Нижний Новгород</option>
              <option value="1.63">Новосибирск</option>
              <option value="1.48">Омск</option>
              <option value="1.8">Пермь</option>
              <option value="1.64">Ростов-на-Дону</option>
              <option value="1.48">Самара</option>
              <option value="1.64">Санкт-Петербург</option>
              <option value="1.48">Саратов</option>
              <option value="1.64">Уфа</option>
              <option value="1.88">Челябинск</option>
              <option value="1.16">Якутск</option>
            </select>
          </div>
        </div>
      </div>

      <h4 style="margin-top: 20px;">Страхователь</h4>
      <div class="border border-3 rounded-5" style="padding: 20px;">
        <!-- Страхователь -->
        <div class="row">
          <div class="col">
            <div class="form-outline mb-4">
              <input type="text" id="strah_surname" class="form-control" name="strah_surname" maxlength="30" required />
              <label class="form-label" for="strah_surname">Фамилия</label>
            </div>
          </div>

          <div class="col">
            <div class="form-outline mb-4">
              <input type="text" id="strah_name" class="form-control" name="strah_name" maxlength="30" required />
              <label class="form-label" for="strah_name">Имя</label>
            </div>
          </div>

          <div class="col">
            <div class="form-outline mb-4">
              <input type="text" id="strah_patronymic" class="form-control" name="strah_patronymic" maxlength="30" required />
              <label class="form-label" for="strah_patronymic">Отчество</label>
            </div>
          </div>
        </div>
      </div>

      <h4 style="margin-top: 20px;">Водитель</h4>
      <div class="border border-3 rounded-5" style="padding: 20px;">
        <!-- Водитель -->
        <div class="row">
          <div class="col">
            <div class="form-outline mb-4">
              <input type="text" id="driver_surname" class="form-control" name="driver_surname" maxlength="30" required />
              <label class="form-label" for="driver_surname">Фамилия</label>
            </div>
          </div>

          <div class="col">
            <div class="form-outline mb-4">
              <input type="text" id="driver_name" class="form-control" name="driver_name" maxlength="30" required />
              <label class="form-label" for="driver_name">Имя</label>
            </div>
          </div>

          <div class="col">
            <div class="form-outline mb-4">
              <input type="text" id="driver_patronymic" class="form-control" name="driver_patronymic" maxlength="30" required />
              <label class="form-label" for="driver_patronymic">Отчество</label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="form-outline mb-4">
              <input type="number" id="series_vu" class="form-control" name="series_vu" required />
              <label class="form-label" for="series_vu">Серия ВУ</label>
            </div>
          </div>

          <div class="col">
            <div class="form-outline mb-4">
              <input type="number" id="number_vu" class="form-control" name="number_vu" required />
              <label class="form-label" for="number_vu">Номер ВУ</label>
            </div>
          </div>

          <div class="col">
            <div class="form-outline mb-4">
              <input type="date" id="date_vu" class="form-control" name="date_vu" required />
              <label class="form-label" for="date_vu">Дата выдачи ВУ</label>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="form-outline md-6 mb-3">
            <input type="number" class="form-control" name="driverAge" id="driverAge" min="16" max="100" required>
            <label for="driverAge" class="form-label">Возраст водителя (лет)</label>
          </div>
        </div>
      </div>
      <div class="border border-3 rounded-5" style="padding: 20px; margin-top: 20px; margin-bottom: 20px;">
        <div class="row align-items-center">
          <div class="col">
            <select class="form-select" name="usagePeriod" id="usagePeriod" required>
              <option value="" disabled selected hidden>Выберите срок страхования</option>
              <option value="3">3 месяца</option>
              <option value="4">4 месяца</option>
              <option value="5">5 месяцев</option>
              <option value="6">6 месяцев</option>
              <option value="7">7 месяцев</option>
              <option value="8">8 месяцев</option>
              <option value="9">9 месяцев</option>
              <option value="10">10 месяцев</option>
              <option value="11">11 месяцев</option>
              <option value="12">1 Год</option>
            </select>
          </div>
          <div class="col">
            <div class="form-check d-flex align-items-center">
              <input class="form-check-input me-2" type="checkbox" id="el12" name="pricep" />
              <label class="form-check-label" for="el12">
                Вы используете прицеп?
              </label>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-outline-dark" name="request" id="request">Отправить заявку</button>
      </div>
    </form>
    <div id="result" class="mt-4"></div>
  </div>
  <?php include "footer.php"; ?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="/mdb/js/mdb.min.js"></script>
  <script>
    $("#marka").change(function() {
      var selectedMarkaId = $(this).val();
      $.ajax({
        url: 'get_models.php', //путь к файлу, который будет возвращать данные моделей для выбранной марки
        method: 'GET',
        dataType: 'json',
        data: {
          marka_id: selectedMarkaId
        },
        success: function(response) {
          // Очистите текущие варианты моделей и добавьте новые на основе ответа
          $('#model').empty();
          $.each(response, function(index, model) {
            $('#model').append($('<option>', {
              value: model.id,
              text: model.Nazvanie
            }));
          });
        },
        error: function(xhr, status, error) {
          console.error(error);
        }
      });
    });
  </script>
</body>

</html>