<link rel="stylesheet" href="../../mdb/css/mdb.min.css" />
<link rel="stylesheet" href="../../mdb/css/icons.css">
<?
include $_SERVER["DOCUMENT_ROOT"] . "/connect.php";
session_start();
require "../header.php";
?>

<head>
    <title>Личный кабинет</title>
</head>

<style>
    .table>:not(caption)>*>* {
        padding: 10px;
        /* background-color:var(--mdb-table-bg); */
        border-bottom-width: 1px;
        box-shadow: inset 0 0 0 9999px var(--mdb-table-accent-bg)
    }

    td {
        padding: 0px;
        text-align: center;
        border: 1px solid #ddd;
    }

    th {
        padding: 0px;
        text-align: center;
        border: 1px solid #ddd;
    }

    .btn {
        color: black;
    }
</style>

<body>
    <? if ($_SESSION['role'] == 'Пользователь') {
        echo '<script>document.location.href = "personal_account_user.php"</script>';
    } else {
    }
    ?>
    <div class="d-flex justify-content-center" style="margin-top: 65px;">
        <ul class="list-group list-group-horizontal">
            <!-- <form method="post"><li class="list-group-item"><input type="submit" name="my_data" class="btn btn-link" data-mdb-ripple-color="dark">Личные данные</li></form> -->
            <form method="post">
                <li class="list-group-item"><input type="submit" name="my_data" class="btn btn-link" data-mdb-ripple-color="dark" value="Личные данные"></li>
            </form>
            <form method="post">
                <li class="list-group-item"><input type="submit" name="my_car" class="btn btn-link" data-mdb-ripple-color="dark" value="Автомобили"></li>
            </form>
            <form method="post">
                <li class="list-group-item"><input type="submit" name="my_sp" class="btn btn-link" data-mdb-ripple-color="dark" value="Страховые полиса"></li>
            </form>
        </ul>
    </div>
    <?
    // echo (var_dump($_SESSION));

    if (isset($_POST['my_data'])) {
        //    echo "Данные";
        $strahov_of_data = mysqli_query($db, "SELECT * FROM `strahovatel` WHERE id = ' $_SESSION[id_strahovatel]'"); ?>
        <table class="table">
            <thead class="table-secondary">
                <tr>
                    <th>Фамилия</th>
                    <th>Имя</th>
                    <th>Отчество</th>
                    <th>Логин</th>
                    <th>Пароль</th>
                </tr>
            </thead>
            <? while ($strahovat = mysqli_fetch_array($strahov_of_data)) { ?>
                <tbody>
                    <tr>
                        <td><? echo $strahovat['Surname'] ?></td>
                        <td><? echo $strahovat['Name'] ?></td>
                        <td><? echo $strahovat['Patronymic'] ?></td>
                        <td><? echo $strahovat['login'] ?></td>
                        <td><? echo $strahovat['password'] ?></td>

                    </tr>
                </tbody>
            <? } ?>
        </table> <?
                } else if (isset($_POST['my_car'])) {
                    // echo "Машины";
                    $sql = "SELECT a.pricep as 'Прицеп', a.vin as 'VIN', a.Gos_Znak as 'Гос.Номер', a.Power as 'Мощность',
            CONCAT(a.Doc_type, ' ', a.Doc_series, ' ', a.Doc_number, '') as 'Документ',  
            CONCAT(m.Nazvanie, ' ', mo.Nazvanie) as 'Марка и модель',  
            CONCAT(s.surname, ' ', SUBSTRING(s.name, 1, 1), '.', SUBSTRING(s.patronymic, 1, 1), '.') as 'Собственник',
            CONCAT(str.surname, ' ', SUBSTRING(str.name, 1, 1), '.', SUBSTRING(str.patronymic, 1, 1), '.') as 'Страхователь'
            FROM avto as a
            JOIN marka as m ON a.idMarka = m.id
            JOIN model as mo ON a.idmodel = mo.id
            JOIN sobstvennic as s ON a.idSobstvennic = s.id
            JOIN strah_polis as sp ON sp.idAvto = a.id
            JOIN strahovatel as str ON sp.idStrahovatel = str.id
            WHERE sp.idStrahovatel = '$_SESSION[id_strahovatel]'";

                    $result = mysqli_query($db, $sql);

                    // Проверка наличия результатов и вывод таблицы
                    if (mysqli_num_rows($result) > 0) {
                        echo "$text";
                        echo "<table class='table'>";
                        echo "<thead class='table-secondary'>";
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
                            echo "</thead>";
                            foreach ($row as $key => $value) {
                                if ($key == 'Прицеп') {
                                    if ($value == 1) {
                                        echo "<td>" . 'да' . "</td>";
                                    } else {
                                        echo "<td>" . 'нет' . "</td>";
                                    }
                                    continue;
                                }
                                echo "<td>" . $value . "</td>";
                            }
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        // echo "Нет данных.";
                        echo "<h5 style = 'padding: 12px;';>Нет данных.</h5>";
                    }
                } else if (isset($_POST['my_sp'])) {
                    // echo "СП";
                    $sql = "SELECT sp.Series as 'Серия', sp.Number as 'Номер',  
            sp.Srok_Strah_Ot as 'Страхование от', sp.Srok_Strah_Do as 'Страхование до', 
            sp.Date_Zakluch as 'Дата заключения', sp.Date_Vidach as 'Дата выдачи',
            sp.Strah_Premiya as 'Страх. премия',  
            CONCAT(str.surname, ' ', SUBSTRING(str.name, 1, 1), '. ', SUBSTRING(str.patronymic, 1, 1), '.') as 'Страхователь',  
            CONCAT(sob.surname, ' ', SUBSTRING(sob.name, 1, 1), '. ', SUBSTRING(sob.patronymic, 1, 1), '.') as 'Собственник',  
            CONCAT(d.surname, ' ', SUBSTRING(d.name, 1, 1), '. ', SUBSTRING(d.patronymic, 1, 1), '.') as 'Водитель',
            CONCAT(m.nazvanie, ' ', mo.nazvanie) as 'Авто',
            CONCAT(sotr.surname, ' ', SUBSTRING(sotr.name, 1, 1), '. ', SUBSTRING(sotr.patronymic, 1, 1), '.') as 'Сотрудник'   
            FROM strah_polis AS sp 
            JOIN avto AS a ON sp.idAvto = a.id 
            JOIN marka AS m ON a.idmarka = m.id 
            JOIN model AS mo ON a.idmodel = mo.id  
            JOIN strahovatel AS str ON sp.idstrahovatel = str.id 
            JOIN drivers AS d ON sp.iddrivers = d.id 
            JOIN sobstvennic AS sob ON a.idsobstvennic = sob.id 
            JOIN sotrudnik AS sotr ON sp.idSotrudnik = sotr.id
            WHERE str.surname = '$_SESSION[surname]'";

                    $result = mysqli_query($db, $sql);

                    // Проверка наличия результатов и вывод таблицы
                    if (mysqli_num_rows($result) > 0) {
                        echo "$text";
                        echo "<table class='table'>";
                        echo "<thead class='table-secondary'>";
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
                            echo "</thead>";
                            foreach ($row as $value) {
                                echo "<td>" . $value . "</td>";
                            }
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        // echo "Нет данных.";
                        echo "<h5 style = 'padding: 12px;';>Нет данных.</h5>";
                    }
                }

                    ?>
</body>


<script src="../../mdb/js/mdb.min.js"></script>