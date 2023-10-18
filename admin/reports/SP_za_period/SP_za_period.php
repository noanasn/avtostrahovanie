<head>
    <title>Страховые полиса, оформленные за период</title>
</head>
<link rel="stylesheet" href="../../../mdb/css/mdb.min.css" />
<link rel="stylesheet" href="../../../mdb/css/icons.css">
<?
include $_SERVER["DOCUMENT_ROOT"] . "/connect.php";
session_start();
require "../../../header.php";
?>

<style>
    td {
        padding: 4px;
        text-align: left;
        border: 1px solid #ddd;
    }

    th {
        padding: 8px;
        text-align: center;
        border: 1px solid #ddd;
        white-space: nowrap;
    }

    .full-width-table {
        width: 100%;
        table-layout: auto;
    }

    h5 {
        padding: 12px;
    }
</style>

<div style="margin-top: 65px; padding:12px">
    <form method="post">
        <label class="form-label select-label">Год</label>
        <select class="select" name="year">
            <?php
            for ($year = 2023; $year >= 1982; $year--) {
                if ($_POST['year'] == $year) {
                    echo "<option value='$year' selected>$year</option>";
                }
                echo "<option value='$year'>$year</option>";
            }
            ?>
        </select>
        <?
        $periods = [
            '1' => '1 Квартал',
            '2' => '2 Квартал',
            '3' => '3 Квартал',
            '4' => '4 Квартал',
            'first_half_year' => '1 Полугодие',
            'second_half_year' => '2 Полугодие',
            '9_mnth' => '9 месяцев',
            'year' => 'Год',
        ];
        ?>
        <label class="form-label select-label">Период</label>
        <select class="select" name="period">
            <?
            foreach ($periods as $period => $value) {
                if (isset($_POST['period']) && $_POST['period'] == $period) {
                    echo "<option value='$period' selected>$value</option>";
                    continue;
                }
                echo "<option value='$period'>$value</option>";
            }
            ?>
        </select>
        <input type="submit" name="show_table" value="Вывести">
    </form>
    <form method="post">
        <label for="start_date" class="form-label select-label">Начальная дата:</label>
        <input type="date" id="start_date" name="start_date">
        <label for="end_date" class="form-label select-label">Конечная дата:</label>
        <input type="date" id="end_date" name="end_date">
        <input type="submit" name="show_table_period" value="Вывести">
    </form>
</div>
<?php
$sql = "";
$text = "";
if (isset($_POST['show_table'])) {
    // Если выбран период : квартал
    if ($_POST['period'] == '1' || $_POST['period'] == '2' || $_POST['period'] == '3' || $_POST['period'] == '4') {
        $sql = "SELECT sp.id as '#', sp.Series as 'Серия', sp.Number as 'Номер',
        sp.Srok_Strah_Ot as 'Страхование от', sp.Srok_Strah_Do as 'Страхование до',
        sp.Date_Zakluch as 'Дата заключения', sp.Date_Vidach as 'Дата выдачи' ,
        sp.Strah_Premiya as 'Страх. премия' ,
        CONCAT(str.surname, ' ', SUBSTRING(str.name, 1, 1), '. ', SUBSTRING(str.patronymic, 1, 1), '.') as 'Страхователь',
        CONCAT(sob.surname, ' ', SUBSTRING(sob.name, 1, 1), '. ', SUBSTRING(sob.patronymic, 1, 1), '.') as 'Собственник',
        CONCAT(d.surname, ' ', SUBSTRING(d.name, 1, 1), '. ', SUBSTRING(d.patronymic, 1, 1), '.') as 'Водитель',
        CONCAT(m.nazvanie, ' ', mo.nazvanie) as 'Авто',
        CONCAT(sotr.surname, ' ', SUBSTRING(sotr.name, 1, 1), '. ', SUBSTRING(sotr.patronymic, 1, 1), '.') as 'Сотрудник'
        FROM strah_polis as sp
        JOIN avto as a ON sp.idAvto = a.id
        JOIN marka as m ON a.idmarka = m.id
        JOIN model as mo ON a.idmodel = mo.id
        JOIN strahovatel as str ON sp.idstrahovatel = str.id
        JOIN drivers as d ON sp.iddrivers = d.id
        JOIN sobstvennic as sob ON a.idsobstvennic = sob.id
        JOIN sotrudnik as sotr ON sp.idSotrudnik = sotr.id
        WHERE YEAR(sp.Date_Vidach) = '$_POST[year]' AND QUARTER(sp.Date_Vidach) = '$_POST[period]'";

        $text = "<h5>Страховые полиса, оформленные за $_POST[period] квартал $_POST[year] года.</h5>";

        // Если выбран период : 1 полугодие
    } else if ($_POST['period'] == 'first_half_year') {
        $sql = "SELECT sp.id as '#', sp.Series as 'Серия', sp.Number as 'Номер',
        sp.Srok_Strah_Ot as 'Страхование от', sp.Srok_Strah_Do as 'Страхование до',
        sp.Date_Zakluch as 'Дата заключения', sp.Date_Vidach as 'Дата выдачи' ,
        sp.Strah_Premiya as 'Страх. премия' ,
        CONCAT(str.surname, ' ', SUBSTRING(str.name, 1, 1), '. ', SUBSTRING(str.patronymic, 1, 1), '.') as 'Страхователь',
        CONCAT(sob.surname, ' ', SUBSTRING(sob.name, 1, 1), '. ', SUBSTRING(sob.patronymic, 1, 1), '.') as 'Собственник',
        CONCAT(d.surname, ' ', SUBSTRING(d.name, 1, 1), '. ', SUBSTRING(d.patronymic, 1, 1), '.') as 'Водитель',
        CONCAT(m.nazvanie, ' ', mo.nazvanie) as 'Авто',
        CONCAT(sotr.surname, ' ', SUBSTRING(sotr.name, 1, 1), '. ', SUBSTRING(sotr.patronymic, 1, 1), '.') as 'Сотрудник'
        FROM strah_polis as sp
        JOIN avto as a ON sp.idAvto = a.id
        JOIN marka as m ON a.idmarka = m.id
        JOIN model as mo ON a.idmodel = mo.id
        JOIN strahovatel as str ON sp.idstrahovatel = str.id
        JOIN drivers as d ON sp.iddrivers = d.id
        JOIN sobstvennic as sob ON a.idsobstvennic = sob.id
        JOIN sotrudnik as sotr ON sp.idSotrudnik = sotr.id
        WHERE YEAR(sp.Date_Vidach) = '$_POST[year]' AND MONTH(sp.Date_Vidach) BETWEEN 1 AND 6";

        $text = "<h5>Страховые полиса, оформленные за 1 полугодие $_POST[year] года.</h5>";
    }
    // Если выбран период : 2 полугодие
    else if ($_POST['period'] == 'second_half_year') {
        $sql = "SELECT sp.id as '#', sp.Series as 'Серия', sp.Number as 'Номер',
        sp.Srok_Strah_Ot as 'Страхование от', sp.Srok_Strah_Do as 'Страхование до',
        sp.Date_Zakluch as 'Дата заключения', sp.Date_Vidach as 'Дата выдачи' ,
        sp.Strah_Premiya as 'Страх. премия' ,
        CONCAT(str.surname, ' ', SUBSTRING(str.name, 1, 1), '. ', SUBSTRING(str.patronymic, 1, 1), '.') as 'Страхователь',
        CONCAT(sob.surname, ' ', SUBSTRING(sob.name, 1, 1), '. ', SUBSTRING(sob.patronymic, 1, 1), '.') as 'Собственник',
        CONCAT(d.surname, ' ', SUBSTRING(d.name, 1, 1), '. ', SUBSTRING(d.patronymic, 1, 1), '.') as 'Водитель',
        CONCAT(m.nazvanie, ' ', mo.nazvanie) as 'Авто',
        CONCAT(sotr.surname, ' ', SUBSTRING(sotr.name, 1, 1), '. ', SUBSTRING(sotr.patronymic, 1, 1), '.') as 'Сотрудник'
        FROM strah_polis as sp
        JOIN avto as a ON sp.idAvto = a.id
        JOIN marka as m ON a.idmarka = m.id
        JOIN model as mo ON a.idmodel = mo.id
        JOIN strahovatel as str ON sp.idstrahovatel = str.id
        JOIN drivers as d ON sp.iddrivers = d.id
        JOIN sobstvennic as sob ON a.idsobstvennic = sob.id
        JOIN sotrudnik as sotr ON sp.idSotrudnik = sotr.id
        WHERE YEAR(sp.Date_Vidach) = '$_POST[year]' AND MONTH(sp.Date_Vidach) BETWEEN 7 AND 12";

        $text = "<h5>Страховые полиса, оформленные за 2 полугодие $_POST[year] года.</h5>";
    }
    // Если выбран период : 9 месяцев
    else if ($_POST['period'] == '9_mnth') {
        $sql = "SELECT sp.id as '#', sp.Series as 'Серия', sp.Number as 'Номер',
        sp.Srok_Strah_Ot as 'Страхование от', sp.Srok_Strah_Do as 'Страхование до',
        sp.Date_Zakluch as 'Дата заключения', sp.Date_Vidach as 'Дата выдачи' ,
        sp.Strah_Premiya as 'Страх. премия' ,
        CONCAT(str.surname, ' ', SUBSTRING(str.name, 1, 1), '. ', SUBSTRING(str.patronymic, 1, 1), '.') as 'Страхователь',
        CONCAT(sob.surname, ' ', SUBSTRING(sob.name, 1, 1), '. ', SUBSTRING(sob.patronymic, 1, 1), '.') as 'Собственник',
        CONCAT(d.surname, ' ', SUBSTRING(d.name, 1, 1), '. ', SUBSTRING(d.patronymic, 1, 1), '.') as 'Водитель',
        CONCAT(m.nazvanie, ' ', mo.nazvanie) as 'Авто',
        CONCAT(sotr.surname, ' ', SUBSTRING(sotr.name, 1, 1), '. ', SUBSTRING(sotr.patronymic, 1, 1), '.') as 'Сотрудник'
        FROM strah_polis as sp
        JOIN avto as a ON sp.idAvto = a.id
        JOIN marka as m ON a.idmarka = m.id
        JOIN model as mo ON a.idmodel = mo.id
        JOIN strahovatel as str ON sp.idstrahovatel = str.id
        JOIN drivers as d ON sp.iddrivers = d.id
        JOIN sobstvennic as sob ON a.idsobstvennic = sob.id
        JOIN sotrudnik as sotr ON sp.idSotrudnik = sotr.id
        WHERE YEAR(sp.Date_Vidach) = '$_POST[year]' AND MONTH(sp.Date_Vidach) BETWEEN 1 AND 9";

        $text = "<h5>Страховые полиса, оформленные за 9 месяцев $_POST[year] года.</h5>";
    }
    // Если выбран период : год
    else if ($_POST['period'] == 'year') {
        $sql = "SELECT sp.id as '#', sp.Series as 'Серия', sp.Number as 'Номер',
        sp.Srok_Strah_Ot as 'Страхование от', sp.Srok_Strah_Do as 'Страхование до',
        sp.Date_Zakluch as 'Дата заключения', sp.Date_Vidach as 'Дата выдачи' ,
        sp.Strah_Premiya as 'Страх. премия' ,
        CONCAT(str.surname, ' ', SUBSTRING(str.name, 1, 1), '. ', SUBSTRING(str.patronymic, 1, 1), '.') as 'Страхователь',
        CONCAT(sob.surname, ' ', SUBSTRING(sob.name, 1, 1), '. ', SUBSTRING(sob.patronymic, 1, 1), '.') as 'Собственник',
        CONCAT(d.surname, ' ', SUBSTRING(d.name, 1, 1), '. ', SUBSTRING(d.patronymic, 1, 1), '.') as 'Водитель',
        CONCAT(m.nazvanie, ' ', mo.nazvanie) as 'Авто',
        CONCAT(sotr.surname, ' ', SUBSTRING(sotr.name, 1, 1), '. ', SUBSTRING(sotr.patronymic, 1, 1), '.') as 'Сотрудник'
        FROM strah_polis as sp
        JOIN avto as a ON sp.idAvto = a.id
        JOIN marka as m ON a.idmarka = m.id
        JOIN model as mo ON a.idmodel = mo.id
        JOIN strahovatel as str ON sp.idstrahovatel = str.id
        JOIN drivers as d ON sp.iddrivers = d.id
        JOIN sobstvennic as sob ON a.idsobstvennic = sob.id
        JOIN sotrudnik as sotr ON sp.idSotrudnik = sotr.id
        WHERE YEAR(sp.Date_Vidach) = '$_POST[year]'";

        $text = "<h5>Страховые полиса, оформленные за $_POST[year] год.</h5>";
    }

    // Выполнение запроса
    $result = mysqli_query($db, $sql);

    // Проверка наличия результатов и вывод таблицы
    if (mysqli_num_rows($result) > 0) {
        echo "$text";
        echo "<div class='container-fluid'>";
        echo "<div class='table-responsive'>";
        echo "<table class='full-width-table' border='1'>";
        // Вывод заголовка таблицы только один раз
        $headerPrinted = false;
        while ($row = mysqli_fetch_assoc($result)) {
            if (!$headerPrinted) {
                echo "<tr>";
                foreach ($row as $key => $value) {
                    echo "<th>" . $key . "</th>";
                }
                echo "</tr>";
                $headerPrinted = true;
            }
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>" . $value . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
        echo "</div>";
    } else {
        // echo "Нет данных.";
        echo "<h5 style = 'padding: 12px;';>Нет данных.</h5>";
    }
    // Закрытие соединения с базой данных
    mysqli_close($db); ?>
    <!-- Форма экспорта в excel -->
    <div class="float-end" style="padding: 12px;">
        <form action="export_to_excel.php" method="post">
            <input type="hidden" name="year" value="<?= $_POST['year'] ?>">
            <input type="hidden" name="period" value="<?= $_POST['period'] ?>">
            <button type="submit" name="submit1" class="btn btn-dark btn-floating"><i class="fas fa-print fa-lg"></i>
        </form>
    </div>
<?
} else if (isset($_POST['show_table_period'])) {
    $sql = "SELECT sp.id as '#', sp.Series as 'Серия', sp.Number as 'Номер',
sp.Srok_Strah_Ot as 'Страхование от', sp.Srok_Strah_Do as 'Страхование до',
sp.Date_Zakluch as 'Дата заключения', sp.Date_Vidach as 'Дата выдачи' ,
sp.Strah_Premiya as 'Страх. премия' ,
CONCAT(str.surname, ' ', SUBSTRING(str.name, 1, 1), '. ', SUBSTRING(str.patronymic, 1, 1), '.') as 'Страхователь',
CONCAT(sob.surname, ' ', SUBSTRING(sob.name, 1, 1), '. ', SUBSTRING(sob.patronymic, 1, 1), '.') as 'Собственник',
CONCAT(d.surname, ' ', SUBSTRING(d.name, 1, 1), '. ', SUBSTRING(d.patronymic, 1, 1), '.') as 'Водитель',
CONCAT(m.nazvanie, ' ', mo.nazvanie) as 'Авто',
CONCAT(sotr.surname, ' ', SUBSTRING(sotr.name, 1, 1), '. ', SUBSTRING(sotr.patronymic, 1, 1), '.') as 'Сотрудник'
FROM strah_polis as sp
JOIN avto as a ON sp.idAvto = a.id
JOIN marka as m ON a.idmarka = m.id
JOIN model as mo ON a.idmodel = mo.id
JOIN strahovatel as str ON sp.idstrahovatel = str.id
JOIN drivers as d ON sp.iddrivers = d.id
JOIN sobstvennic as sob ON a.idsobstvennic = sob.id
JOIN sotrudnik as sotr ON sp.idSotrudnik = sotr.id
WHERE sp.Date_Vidach BETWEEN '$_POST[start_date]' AND '$_POST[end_date]' ";

    $text = "<h5>Страховые полиса, оформленные за период с $_POST[start_date] по $_POST[end_date].</h5>";
    // Выполнение запроса
    $result = mysqli_query($db, $sql);

    // Проверка наличия результатов и вывод таблицы
    if (mysqli_num_rows($result) > 0) {
        echo "$text";
        echo "<div class='container-fluid'>";
        echo "<div class='table-responsive'>";
        echo "<table class='full-width-table' border='1'>";
        // Вывод заголовка таблицы только один раз
        $headerPrinted = false;
        while ($row = mysqli_fetch_assoc($result)) {
            if (!$headerPrinted) {
                echo "<tr>";
                foreach ($row as $key => $value) {
                    echo "<th>" . $key . "</th>";
                }
                echo "</tr>";
                $headerPrinted = true;
            }
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>" . $value . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
        echo "</div>";
    } else {
        // echo "Нет данных.";
        echo "<h5 style = 'padding: 12px;';>Нет данных.</h5>";
    }
    // Закрытие соединения с базой данных
    mysqli_close($db); ?>
    <!-- Форма экспорта в excel -->
    <div class="float-end" style="padding: 12px;">
        <form action="export_to_excel.php" method="post">
            <input type="hidden" name="start_date" value="<?= $_POST['start_date'] ?>">
            <input type="hidden" name="end_date" value="<?= $_POST['end_date'] ?>">
            <button type="submit" name="submit2" class="btn btn-dark btn-floating"><i class="fas fa-print fa-lg"></i>
        </form>
    </div>

<?
}
?>

<script src="../../../mdb/js/mdb.min.js"></script>