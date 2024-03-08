<link rel="stylesheet" href="../../mdb/css/mdb.min.css" />
<link rel="stylesheet" href="../../mdb/css/icons.css">
<link rel="stylesheet" href="../../mdb/css/style.css">

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
        $user_data = mysqli_query($db, "SELECT * FROM `user` WHERE id = ' $_SESSION[id_user]'"); ?>
        <table class="table">
            <thead class="table-secondary">
                <tr>
                    <th>Фамилия</th>
                    <th>Имя</th>
                    <th>Отчество</th>
                    <th>Дата рождения</th>
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
                        <td><? echo $user['Birthday'] ?></td>
                        <td><? echo $user['Login'] ?></td>
                        <td><? echo $user['Password'] ?></td>
                    </tr>
                </tbody>
            <? } ?>
        </table> <?
                } else if (isset($_POST['my_car'])) {
                    // echo "Машины";
                    $sql = "SELECT a.pricep as 'Прицеп', a.vin as 'VIN', a.Gos_Znak as 'Гос.Номер', a.Power as 'Мощность',
            CONCAT(a.Doc_type, ' ', a.Doc_series, ' ', a.Doc_number, '') as 'Документ',  
            CONCAT(m.Nazvanie, ' ', mo.Nazvanie) as 'Марка и модель',  
            CONCAT(s.surname, ' ', SUBSTRING(s.name, 1, 1), '.', SUBSTRING(s.patronymic, 1, 1), '.') as 'Собственник'
            from avto as a 
            join marka as m on a.idMarka = m.id 
            join model as mo on a.idModel = mo.id 
            join sobstvennic as s on a.idSobstvennic = s.id
            WHERE s.Surname = '$_SESSION[surname_user]' and s.Name = '$_SESSION[name_user]' and s.Patronymic = '$_SESSION[patronymic_user]'";

                    $result = mysqli_query($db, $sql);

                    // Проверка наличия результатов и вывод таблицы
                    if (mysqli_num_rows($result) > 0) {
                        echo "$text";
                        echo "<table class='table';>";
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
                        echo "<h5 style = 'padding: 12px;';>Нет данных об автомобилях.</h5>";
                    } ?>
        <!-- Форма добавления авто -->
        <?
        $marks_data  = mysqli_query($db, "SELECT * FROM `marka`");
        $models_data = mysqli_query($db, "SELECT * FROM `model`");
        ?>
        <form action="insert_my_car.php" method="post" class="d-flex justify-content-center">
            <div style="margin-top: 20px;">
                <h3 class="fw-bold mb-0" style="text-align: center;">Добавить автомобиль</h3><br>
                <!-- марка, модель, мощность -->
                <div class="row">
                    <div class="col">
                        <select class="form-select" id="el1" name="idMarka">
                            <option selected disabled>Марка</option>
                            <? while ($marks = mysqli_fetch_array($marks_data)) {
                                echo "<option value = $marks[id]>$marks[Nazvanie]</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col">
                        <select class="form-select" id="el2" name="idModel">
                            <option selected disabled>Модель</option>
                            <?
                            while ($model = mysqli_fetch_array($models_data)) {
                                echo "<option value = $model[id]>$model[Nazvanie]</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col">
                        <div class="form-outline mb-4">
                            <input type="text" id="el3" class="form-control" name="power" />
                            <label class="form-label" for="el3">Мощность</label>
                        </div>
                    </div>

                </div>

                <!-- VIN, гос номер -->
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-outline mb-4">
                            <input type="text" id="el4" class="form-control" name="vin" />
                            <label class="form-label" for="el4">VIN</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-outline mb-4">
                            <input type="text" id="el5" class="form-control" name="gos_znak" />
                            <label class="form-label" for="el5">Гос.номер</label>
                        </div>
                    </div>
                </div>

                <!-- документ, серия, номер -->
                <div class="row">
                    <div class="col">
                        <select class="form-select" id="el6" name="doc_type">
                            <option selected disabled>Документ</option>
                            <option value="СТС">СТС</option>
                            <option value="ПТС">ПТС</option>
                        </select>
                    </div>

                    <div class="col">
                        <div class="form-outline mb-4">
                            <input type="text" id="el7" class="form-control" name="doc_series" />
                            <label class="form-label" for="el7">Серия</label>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-outline mb-4">
                            <input type="text" id="el8" class="form-control" name="doc_number" />
                            <label class="form-label" for="el8">Номер</label>
                        </div>
                    </div>

                </div>

                <!-- Собственник -->
                <div class="row">
                    <label style="text-align: center; padding-bottom: 5px;">Собственник</label>
                    <div class="col">
                        <div class="form-outline mb-4">
                            <input type="text" id="el9" class="form-control" readonly name="sobstv_surname" value="<?= $_SESSION['surname_user'] ?>" />
                            <label class="form-label" for="el9">Фамилия</label>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-outline mb-4">
                            <input type="text" id="el10" class="form-control" readonly name="sobstv_name" value="<?= $_SESSION['name_user'] ?>" />
                            <label class="form-label" for="el10">Имя</label>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-outline mb-4">
                            <input type="text" id="el11" class="form-control" readonly name="sobstv_patronymic" value="<?= $_SESSION['patronymic_user'] ?>" />
                            <label class="form-label" for="el11">Отчество</label>
                        </div>
                    </div>

                </div>

                <!-- Checkbox -->
                <div class="form-check d-flex justify-content-center mb-4">
                    <input class="form-check-input me-2" type="checkbox" id="el12" name="pricep" />
                    <label class="form-check-label" for="el12">
                        Вы используете прицеп?
                    </label>
                </div>

                <!-- button -->
                <div class="row d-flex justify-content-center">
                    <div class="col-md-4">
                        <div class="text-center" style="width: 250px;">
                            <input class="btn btn-primary btn-lg btn-rounded text-body px-5" type="submit" value="Добавить" name="add_car" />
                        </div>
                    </div>
                </div>

            </div>
        </form>
    <?
                } else if (isset($_POST['my_sp'])) {
                    // echo "СП";
                    $sql = "SELECT sp.Series as 'Серия', sp.Number as 'Номер',  
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
            WHERE (s.Surname = '$_SESSION[surname_user]' and s.Name = '$_SESSION[name_user]' and s.Patronymic = '$_SESSION[patronymic_user]') or 
            (str.surname = '$_SESSION[surname_user]' and str.Name = '$_SESSION[name_user]' and str.Patronymic = '$_SESSION[patronymic_user]');";

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
                        echo "<h5 style = 'padding: 12px;';>Нет данных об оформленных страховых полисах.</h5>";
                    }
                }

    ?>
</body>
<script src="../../mdb/js/mdb.min.js"></script>