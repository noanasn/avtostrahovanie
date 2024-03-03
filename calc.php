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
    <?php
    if (isset($_POST['calc'])) {
      $carMarkId = $_POST['marka'];
      $carModelId = $_POST['model'];
      $carPower = $_POST['carPower'];
      $driverAge = $_POST['driverAge'];
      $driverExperience = $_POST['driverExperience'];
      $usagePeriod = $_POST['usagePeriod'];
      $city = $_POST['city'];

      //Коэффицент возраст-стаж
      function CalcAgeExpCoeff($age, $experience)
      {
        $coefficients = array(
          array(2.27, 1.92, 1.84, 1.65, 1.65, 1.62, 1.62, null, null, null, null, null, null, null, null, null),     // Возраст 16-21
          array(1.88, 1.72, 1.71, 1.13, 1.13, 1.10, 1.10, 1.09, 1.09, 1.09, null, null, null, null, null, null),     // Возраст 22-24
          array(1.72, 1.6, 1.54, 1.09, 1.09, 1.08, 1.08, 1.07, 1.07, 1.07, 1.02, 1.02, 1.02, 1.02, 1.02, null),      // Возраст 25-29
          array(1.56, 1.5, 1.48, 1.05, 1.05, 1.04, 1.04, 1.01, 1.01, 1.01, 0.97, 0.97, 0.97, 0.97, 0.97, 0.95),      // Возраст 30-34
          array(1.54, 1.47, 1.46, 1, 1, 0.97, 0.97, 0.95, 0.95, 0.95, 0.94, 0.94, 0.94, 0.94, 0.94, 0.93),           // Возраст 35-39
          array(1.5, 1.44, 1.43, 0.96, 0.96, 0.95, 0.95, 0.94, 0.94, 0.94, 0.93, 0.93, 0.93, 0.93, 0.93, 0.91),      // Возраст 40-49
          array(1.46, 1.4, 1.39, 0.93, 0.93, 0.92, 0.92, 0.91, 0.91, 0.91, 0.90, 0.90, 0.90, 0.90, 0.90, 0.86),      // Возраст 50-59
          array(1.43, 1.36, 1.35, 0.91, 0.91, 0.90, 0.90, 0.89, 0.89, 0.89, 0.88, 0.88, 0.88, 0.88, 0.88, 0.83)      // Возраст старше 59
        );

        $ageIndex = null;
        $experienceIndex = null;

        if ($age >= 16 && $age <= 21) {
          $ageIndex = 0;
        } elseif ($age >= 22 && $age <= 24) {
          $ageIndex = 1;
        } elseif ($age >= 25 && $age <= 29) {
          $ageIndex = 2;
        } elseif ($age >= 30 && $age <= 34) {
          $ageIndex = 3;
        } elseif ($age >= 35 && $age <= 39) {
          $ageIndex = 4;
        } elseif ($age >= 40 && $age <= 49) {
          $ageIndex = 5;
        } elseif ($age >= 50 && $age <= 59) {
          $ageIndex = 6;
        } else {
          $ageIndex = 7; // Для возраста старше 59
        }

        if ($experience >= 0 && $experience <= 14) {
          $experienceIndex = $experience;
        } else {
          $experienceIndex = 15; // Для стажа более 14 лет
        }

        return $coefficients[$ageIndex][$experienceIndex];
      }

      //Коэффицент мощности двигателя
      function CalcPowerCoeff($power)
      {
        if ($power <= 50) {
          return 0.6;
        } elseif ($power <= 70) {
          return 1.0;
        } elseif ($power <= 100) {
          return 1.1;
        } elseif ($power <= 120) {
          return 1.2;
        } elseif ($power <= 150) {
          return 1.4;
        } else {
          return 1.6;
        }
      }

      //Коэффицент сезонности
      function CalcPeriodCoeff($months)
      {
        if ($months == 3) {
          return 0.5;
        } elseif ($months == 4) {
          return 0.6;
        } elseif ($months == 5) {
          return 0.65;
        } elseif ($months == 6) {
          return 0.7;
        } elseif ($months == 7) {
          return 0.8;
        } elseif ($months == 8) {
          return 0.9;
        } elseif ($months == 9) {
          return 0.95;
        } else {
          return 1;
        }
      }

      

      // echo "Коэффициент для возраста $driverAge лет и стажа $driverExperience лет: $ageCoefficient";
      // echo "<br>";
      // echo "Коэффициент мощности для автомобиля мощностью $carPower л.с.: $powerCoefficient";
      // echo "<br>";
      // echo "Коэффициент периода использования для $usagePeriod месяцев: $usagePeriodCoefficient";
      // echo "<br>";
      // echo "Территориальный коэффициент: $city";
      // echo "<br>";

      // echo "<h4>Сумма страховой премии составила: " . $strah_premiya . " рублей.</h4>";

      $text = "<h4>Сумма страховой премии составила: " . $strah_premiya . " рублей.</h4>";
      // Вывод сообщения о страховой премии
      echo "$text";
      $text = "";
    }


    ?>
  </div>
  <script src="/mdb/js/mdb.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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