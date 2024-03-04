<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="/mdb/css/mdb.min.css">
  <link rel="stylesheet" href="mdb/css/icons.css">
  <title>Document</title>
</head>

<body>
  <?php
  include $_SERVER["DOCUMENT_ROOT"] . "/connect.php";
  session_start();
  $marks_data  = mysqli_query($db, "SELECT * FROM `marka` order by Nazvanie ASC");
  ?>
  <?php include "header.php"; ?>
  <div class="container" style="margin-top: 100px;">
    <h2 class="my-5">Калькулятор страховки</h2>
    <form id="insuranceForm" method="post">
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="marka" class="form-label">Марка авто</label>
          <select class="form-select" name="marka" id="marka" required>
            <option value="" disabled selected hidden>Выберите марку</option>
            <?php while ($marks = mysqli_fetch_array($marks_data)) {
              if ($cars['idMarka'] === $marks['id']) {
                echo "<option value = $marks[id] selected>$marks[Nazvanie]</option>";
              } else {
                echo "<option value = $marks[id]>$marks[Nazvanie]</option>";
              }
            } ?>
          </select>
        </div>
        <div class="col-md-6 mb-3">
          <label for="model" class="form-label">Модель авто</label>
          <select class="form-select" name="model" id="model" required>
            <option value="" disabled selected hidden>Выберите модель</option>
          </select>
        </div>

        <div class="col-md-6 mb-3">
          <label for="carPower" class="form-label">Мощность</label>
          <input type="text" class="form-control" name="carPower" id="carPower" required />
        </div>
        <div class="col-md-6 mb-3">
          <label for="driverAge" class="form-label">Возраст водителя (лет)</label>
          <input type="number" class="form-control" name="driverAge" id="driverAge" min="16" max="100" required>
        </div>
        <div class="col-md-6 mb-3">
          <label for="driverExperience" class="form-label">Стаж водителя (лет)</label>
          <input type="number" class="form-control" name="driverExperience" id="driverExperience" min="0" max="100" required>
        </div>
        <div class="col-md-6 mb-3">
          <label for="usagePeriod" class="form-label">Срок страхования</label>
          <select class="form-select" name="usagePeriod" id="usagePeriod" required>
            <option value="" disabled selected hidden>Выберите срок</option>
            <option value="3">3 месяца</option>
            <option value="4">4 месяца</option>
            <option value="5">5 месяцев</option>
            <option value="6">6 месяцев</option>
            <option value="7">7 месяцев</option>
            <option value="8">8 месяцев</option>
            <option value="9">9 месяцев</option>
            <option value="10">10 месяцев и более</option>
          </select>
        </div>
        <div class="col-md-6 mb-3">
          <label for="city" class="form-label">Город регистрации собственника автомобиля</label>
          <select class="form-select" name="city" id="city" required>
            <option value="" disabled selected hidden>Выберите город</option>
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
      <button type="submit" class="btn btn-primary" name="calc" id="calc">Рассчитать</button>
    </form>
    <div id="result" class="mt-4"></div>
  </div>
  <script src="/mdb/js/mdb.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
  $(document).ready(function() {
    $("#insuranceForm").submit(function(event) {
      event.preventDefault();
      var formData = $(this).serialize();
      $.ajax({
        url: 'calc_sp.php', //путь к файлу, где находится PHP-скрипт для расчета
        method: 'POST',
        data: formData,
        success: function(response) {
          $("#result").html(response); // Выводим результат на экран
        },
        error: function(xhr, status, error) {
          console.error(error);
        }
      });
    });
  });
</script>
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