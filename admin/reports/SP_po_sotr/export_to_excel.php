<?
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=СП оформленные сотрудником.xls");
header("Contente-Transfer-Encoding: binary");
echo "<meta charset='UTF-8'>";
include $_SERVER["DOCUMENT_ROOT"] . "/connect.php";


if (isset($_POST['submit'])) {

    $sotr_all  = mysqli_query($db, "SELECT * FROM `sotrudnik` where `id` = '$_POST[idSotrudnik]'");
    $sotr_all_string = mysqli_fetch_array($sotr_all);
    $sotr_fio = $sotr_all_string['Surname'] . " " . mb_substr($sotr_all_string['Name'], 0, 1) . "." . mb_substr($sotr_all_string['Patronymic'], 0, 1) . ".";
    echo "<h3 >Страховые полиса, оформленные сотрудником $sotr_fio </h3>";
    
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