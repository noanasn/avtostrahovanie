<?php
include $_SERVER["DOCUMENT_ROOT"] . "/connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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


    $ageCoefficient = CalcAgeExpCoeff($driverAge, $driverExperience);
    $powerCoefficient = CalcPowerCoeff($carPower);
    $usagePeriodCoefficient = CalcPeriodCoeff($usagePeriod);
    $baseRate = 7535; // Базовая ставка

    // Расчет страховой премии
    $insurancePremium = $baseRate * $ageCoefficient * $powerCoefficient * $usagePeriodCoefficient * $city;
    $strah_premiya = round($insurancePremium, 2);

    echo "<h4>Сумма страховой премии составила: " . $strah_premiya . " рублей.</h4>";
    // Вывод сообщения о страховой премии
}
