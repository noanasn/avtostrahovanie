<?php
include $_SERVER["DOCUMENT_ROOT"] . "/connect.php";

if (isset($_POST['request'])) {
    $carMarka = $_POST['marka'];
    $carPower = $_POST['power'];
    $Age = $_POST['driverAge'];
    $Period = $_POST['usagePeriod'];
    $city = $_POST['city'];
    $date_vidach_vu = $_POST['date_vu'];

    $datetime_vu = strtotime($date_vidach_vu);
    $year = date('Y', $datetime_vu);
    $driverExperience = 2024 - $year;

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


    $ageCoefficient = CalcAgeExpCoeff($Age, $driverExperience);
    $powerCoefficient = CalcPowerCoeff($carPower);
    $usagePeriodCoefficient = CalcPeriodCoeff($Period);
    $baseRate = 7535; // Базовая ставка

    // Расчет страховой премии
    $insurancePremium = $baseRate * $ageCoefficient * $powerCoefficient * $usagePeriodCoefficient * $city;
    $strah_premiya = round($insurancePremium, 2);


    // Обрабатываем данные из формы
    $marka = $_POST['marka'];
    $model = $_POST['model'];
    $power = $_POST['power'];
    $VIN = $_POST['VIN'];
    $gos_znak = $_POST['gos_znak'];
    $doc_type = $_POST['doc_type'];
    $doc_series = $_POST['doc_series'];
    $doc_number = $_POST['doc_number'];
    $sobstv_surname = $_POST['sobstv_surname'];
    $sobstv_name = $_POST['sobstv_name'];
    $sobstv_patronymic = $_POST['sobstv_patronymic'];
    $strah_surname = $_POST['strah_surname'];
    $strah_name = $_POST['strah_name'];
    $strah_patronymic = $_POST['strah_patronymic'];
    $driver_surname = $_POST['driver_surname'];
    $driver_name = $_POST['driver_name'];
    $driver_patronymic = $_POST['driver_patronymic'];
    $series_vu = $_POST['series_vu'];
    $number_vu = $_POST['number_vu'];
    $date_vu = $_POST['date_vu'];
    $driverAge = $_POST['driverAge'];
    $usagePeriod = $_POST['usagePeriod'];
    $pricep = isset($_POST['pricep']) ? 1 : 0; // Проверяем, был ли выбран чекбокс

    // Выполняем запрос на вставку данных в базу данных
    $query = "INSERT INTO `request` 
    (`marka`, `model`, `power`, `VIN`, `gos_znak`, `doc_type`, `doc_series`, `doc_number`, 
    `sobstv_surname`, `sobstv_name`, `sobstv_patronymic`, `strah_surname`, `strah_name`, `strah_patronymic`, 
    `driver_surname`, `driver_name`, `driver_patronymic`, `driver_series_vu`, `driver_number_vu`, `driver_date_vidach_vu`, 
    `pricep`,`strah_premiya`, `srok_strah`, `status`) 
    VALUES 
    ('$marka', '$model', '$power', '$VIN', '$gos_znak', '$doc_type', '$doc_series', '$doc_number', 
    '$sobstv_surname', '$sobstv_name', '$sobstv_patronymic', '$strah_surname', '$strah_name', '$strah_patronymic', 
    '$driver_surname', '$driver_name', '$driver_patronymic', '$series_vu', '$number_vu', '$date_vu', '$pricep','$strah_premiya','$usagePeriod', 'Не рассмотрена')";

    // Попробуем выполнить запрос
    if (mysqli_query($db, $query)) {
        echo '<script>alert("Ваша заявка успешно отправлена");';
        echo 'window.location.href = "' . $_SERVER['HTTP_REFERER'] . '";</script>';
    } else {
        echo "Ошибка: " . mysqli_error($db);
    }
    // Закрываем соединение с базой данных
    mysqli_close($db);
}
