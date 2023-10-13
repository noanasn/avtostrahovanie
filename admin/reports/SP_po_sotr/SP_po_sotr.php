<head>
    <title>Страховые полиса, оформленные сотрудником</title>
</head>
<link rel="stylesheet" href="../../../mdb/css/mdb.min.css" />
<link rel="stylesheet" href="../../../mdb/css/icons.css">
<?
include $_SERVER["DOCUMENT_ROOT"] . "/connect.php";
session_start();
require "../../../header.php";
$sotr_data  = mysqli_query($db, "SELECT * FROM `sotrudnik`");
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
</style>

<div style="margin-top: 65px; padding:12px">
    <form method="post">
        <label class="form-label select-label">Сотрудник</label>
        <select class="select" name='idSotrudnik'>
            <? while ($sotr = mysqli_fetch_array($sotr_data)) {
                $fio = $sotr['Surname'] . " " . mb_substr($sotr['Name'], 0, 1) . "." . mb_substr($sotr['Patronymic'], 0, 1) . ".";
                if ($strahpol['idSotrudnik'] === $sotr['id']) {
                    echo "<option value = $sotr[id] selected>$fio</option>";
                }
                echo "<option value = $sotr[id]>$fio</option>";
            }
            ?>
        </select>
        <input type="submit" name="show_table" value="Вывести">
    </form>

</div>
<?php
if (isset($_POST['show_table'])) {
    $sotr_all  = mysqli_query($db, "SELECT * FROM `sotrudnik` where `id` = '$_POST[idSotrudnik]'");
    $sotr_all_string = mysqli_fetch_array($sotr_all);
    $sotr_fio = $sotr_all_string['Surname'] . " " . mb_substr($sotr_all_string['Name'], 0, 1) . "." . mb_substr($sotr_all_string['Patronymic'], 0, 1) . ".";
    echo "<h5 style = 'padding: 12px;';>Страховые полиса, оформленные сотрудником $sotr_fio </h5>";

    // SQL-запрос
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
    WHERE sotr.id = '$_POST[idSotrudnik]'";

    // Выполнение запроса
    $result = mysqli_query($db, $sql);

    // Проверка наличия результатов и вывод таблицы
    if (mysqli_num_rows($result) > 0) {
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
    mysqli_close($db);
}
?>
<script src="../../../mdb/js/mdb.min.js"></script>