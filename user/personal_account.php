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
        border-bottom-width: 1px;
        box-shadow: inset 0 0 0 9999px var(--mdb-table-accent-bg)
    }

    td {
        padding: 0px;
        text-align: center;
        border: 1px solid #ddd;
        vertical-align: middle;
    }

    th {
        padding: 0px;
        text-align: center;
        border: 1px solid #ddd;
        vertical-align: middle;
    }
</style>

<body>
    <div class="d-flex justify-content-center" style="margin-top: 65px;">
        <ul class="list-group list-group-horizontal">
            <form method="post">
                <li class="list-group-item"><input style="color: black;" type="submit" name="my_data" class="btn btn-link" data-mdb-ripple-color="dark" value="Личные данные"></li>
            </form>
            <form method="post">
                <li class="list-group-item"><input style="color: black;" type="submit" name="my_sp" class="btn btn-link" data-mdb-ripple-color="dark" value="Страховые полиса"></li>
            </form>
        </ul>
    </div>
    <?
    // echo (var_dump($_SESSION));
    $marks_data  = mysqli_query($db, "SELECT * FROM `marka`");
    $models_data = mysqli_query($db, "SELECT * FROM `model`");
    $marks_array = [];
    while ($mark = mysqli_fetch_array($marks_data)) {
        $marks_array[$mark['id']] = $mark['Nazvanie'];
    }
    $models_array = [];
    while ($model = mysqli_fetch_array($models_data)) {
        $models_array[$model['id']] = $model['Nazvanie'];
    }

    if (isset($_POST['my_data'])) {
        if ($_SESSION['status_user']  == 'Пользователь') {
            $user_data = mysqli_query($db, "SELECT * FROM `user` WHERE id = ' $_SESSION[id_user]'"); ?>
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
                <? while ($user = mysqli_fetch_array($user_data)) { ?>
                    <tbody>
                        <tr>
                            <td><? echo $user['Surname'] ?></td>
                            <td><? echo $user['Name'] ?></td>
                            <td><? echo $user['Patronymic'] ?></td>
                            <td><? echo $user['Login'] ?></td>
                            <td><? echo $user['Password'] ?></td>
                        </tr>
                    </tbody>
                <? } ?>
            </table>
        <? } else if ($_SESSION['status_user']  == 'Страхователь') {
            $strahov_of_data = mysqli_query($db, "SELECT * FROM `strahovatel` WHERE id = ' $_SESSION[id_user]'"); ?>
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
            </table><? }
            } else if (isset($_POST['my_sp'])) {
                // echo var_dump($_SESSION);
                if ($_SESSION['status_user']  == 'Пользователь') {
                    $row_data = mysqli_query($db, "SELECT * FROM `request` WHERE strah_surname = '$_SESSION[surname_user]' and strah_name = '$_SESSION[name_user]' and strah_patronymic = '$_SESSION[patronymic_user]';");
                    if (mysqli_num_rows($row_data) > 0) {
                    ?>
                <table class="table">
                    <thead class="table-secondary">
                        <tr>
                            <th>Авто</th>
                            <th>Мощность</th>
                            <th>VIN</th>
                            <th>Документ на авто</th>
                            <th>Собственник</th>
                            <th>Страхователь</th>
                            <th>Водитель</th>
                            <th>Данные о ВУ</th>
                            <th>Гос. номер</th>
                            <th>Прицеп</th>
                            <th>Cрок страхования (мес.)</th>
                            <th>Страховая премия</th>
                            <th>Комментарий</th>
                        </tr>
                    </thead>
                    <?php
                        while ($data = mysqli_fetch_array($row_data)) { ?>
                        <tbody>
                            <tr>
                                <td><?php echo isset($marks_array[$data['marka']]) ? $marks_array[$data['marka']] . ' ' . (isset($models_array[$data['model']]) ? $models_array[$data['model']] : '') : ''; ?></td>
                                <td><?php echo $data['power']; ?></td>
                                <td><?php echo $data['VIN']; ?></td>
                                <td><?php echo $data['doc_type'] . ' ' . $data['doc_series'] . ' ' . $data['doc_number']; ?></td>
                                <td><?php echo $data['sobstv_surname'] . ' ' . mb_substr($data['sobstv_name'], 0, 1, 'UTF-8') . '. ' . mb_substr($data['sobstv_patronymic'], 0, 1, 'UTF-8') . '.'; ?></td>
                                <td><?php echo $data['strah_surname'] . ' ' . mb_substr($data['strah_name'], 0, 1, 'UTF-8') . '. ' . mb_substr($data['strah_patronymic'], 0, 1, 'UTF-8') . '.'; ?></td>
                                <td><?php echo $data['driver_surname'] . ' ' . mb_substr($data['driver_name'], 0, 1, 'UTF-8') . '. ' . mb_substr($data['driver_patronymic'], 0, 1, 'UTF-8') . '.'; ?></td>
                                <td><?php echo $data['driver_date_vidach_vu'] . ' ' . $data['driver_series_vu'] . ' ' . $data['driver_number_vu']; ?></td>
                                <td><?php echo $data['gos_znak']; ?></td>
                                <td><?php echo $data['pricep']; ?></td>
                                <td><?php echo $data['srok_strah']; ?></td>
                                <td><?php echo $data['strah_premiya']; ?></td>
                                <td><?php echo $data['comment']; ?></td>
                            </tr>
                        </tbody>
                    <?php
                            $comment = $data['comment'];
                            $status = $data['status'];
                        }
                    ?>
                </table>
                <?php if ($status == 'Отказана') {
                            echo "<h5 style = 'padding: 12px;';>К сожалению Ваша заявка была отклонена, попробуйте отправить заявку повторно.</h5>";
                            echo "<h5 style='padding: 12px;'>Причина отмены: <p style = 'color:red;'> " . $comment . ".</p></h5>";
                        }
                    } else if ($status == 'Не рассмотрена') {
                        echo "<h5 style = 'padding: 12px;';>Ваша заявка на рассмотрении</h5>";
                    } else {
                        echo "<h5 style = 'padding: 12px;';>Нет данных о поданных заявках</h5>";
                    }
                } else if ($_SESSION['status_user']  == 'Страхователь') {
                    $sql = "SELECT sp.id, sp.Series as 'Серия', sp.Number as 'Номер',  
            sp.Srok_Strah_Ot as 'Страхование от', sp.Srok_Strah_Do as 'Страхование до', 
            sp.Date_Zakluch as 'Дата заключения', sp.Date_Vidach as 'Дата выдачи',
            sp.Strah_Premiya as 'Страх. премия',  
            CONCAT(str.surname, ' ', SUBSTRING(str.name, 1, 1), '. ', SUBSTRING(str.patronymic, 1, 1), '.') as 'Страхователь',  
            CONCAT(s.surname, ' ', SUBSTRING(s.name, 1, 1), '. ', SUBSTRING(s.patronymic, 1, 1), '.') as 'Собственник',  
            CONCAT(d.surname, ' ', SUBSTRING(d.name, 1, 1), '. ', SUBSTRING(d.patronymic, 1, 1), '.') as 'Водитель',
            CONCAT(m.nazvanie, ' ', mo.nazvanie) as 'Авто',
            CONCAT(sotr.surname, ' ', SUBSTRING(sotr.name, 1, 1), '. ', SUBSTRING(sotr.patronymic, 1, 1), '.') as 'Сотрудник'   
            FROM strah_polis AS sp 
            JOIN avto AS a ON sp.idAvto = a.id 
            JOIN marka AS m ON a.idmarka = m.id 
            JOIN model AS mo ON a.idmodel = mo.id  
            JOIN strahovatel AS str ON sp.idstrahovatel = str.id 
            JOIN drivers AS d ON sp.iddrivers = d.id 
            JOIN sobstvennic AS s ON a.idsobstvennic = s.id 
            JOIN sotrudnik AS sotr ON sp.idSotrudnik = sotr.id
            WHERE str.surname = '$_SESSION[surname_user]' and str.Name = '$_SESSION[name_user]' and str.Patronymic = '$_SESSION[patronymic_user]';";

                    $result = mysqli_query($db, $sql);

                    // Проверка наличия результатов и вывод таблицы
                    if (mysqli_num_rows($result) > 0) {
                        echo "<table class='table'>";
                        echo "<thead class='table-secondary'>";
                        // Вывод заголовка таблицы только один раз
                        $headerPrinted = false;
                        while ($row = mysqli_fetch_assoc($result)) {
                            if (!$headerPrinted) {
                                echo "<tr>";
                                // Пропускаем вывод столбца id
                                foreach ($row as $key => $value) {
                                    if ($key !== 'id') {
                                        echo "<th>" . $key . "</th>";
                                    }
                                }
                                echo "</tr>";
                                echo "</thead>"; // Перемещаем закрытие тега thead здесь
                                $headerPrinted = true;
                            }
                            echo "<tr>";
                            foreach ($row as $key => $value) {
                                // Пропускаем вывод значения, если это столбец id
                                if ($key !== 'id') {
                                    echo "<td>" . $value . "</td>";
                                }
                            }
                            echo "</tr>";
                            $id = $row['id'];
                        }
                        echo "</table>"; ?>
                <form action="export_to_word.php" method="post">
                    <td>
                        <button style="margin-left: 10px;" type="submit" name="export" class="btn btn-dark btn-floating"><i class="fas fa-print fa-lg"></i>
                            <input type="hidden" name="strah_polis_id_for_export" value=<? echo $id; ?>>
                            <input type="hidden" name="export" id="export_btn">
                    </td>
                </form>

    <? } else {
                        // echo "Нет данных.";
                        echo "<h5 style = 'padding: 12px;';>Нет данных об оформленных страховых полисах.</h5>";
                    }
                }
            }

    ?>
</body>
<script src="../../mdb/js/mdb.min.js"></script>