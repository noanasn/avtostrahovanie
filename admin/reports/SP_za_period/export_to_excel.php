<?
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=СП оформленные за период.xls");
header("Contente-Transfer-Encoding: binary");
echo "<meta charset='UTF-8'>";
include $_SERVER["DOCUMENT_ROOT"] . "/connect.php";


if (isset($_POST['submit1'])) {
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
    echo "<table border='1'>";
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
}
// Закрытие соединения с базой данных
mysqli_close($db); 
} elseif (isset($_POST['submit2'])) {
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
        echo "<table border='1'>";
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
    }
    // Закрытие соединения с базой данных
    mysqli_close($db); 
}

?>