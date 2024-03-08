<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Заявки</title>
    <link rel="stylesheet" href="/mdb/css/mdb.min.css">
    <link rel="stylesheet" href="/mdb/css/icons.css">
</head>

<body>
    <div>
        <?php
        include $_SERVER["DOCUMENT_ROOT"] . "/connect.php";
        session_start();
        require "../../header.php";
        ?>
        <style>
            td {
                padding: 8px;
                text-align: left;
                border: 1px solid #ddd;
            }

            th {
                padding: 8px;
                text-align: center;
                border: 1px solid #ddd;
            }

            input[type="text"] {
                width: 100%;
            }
        </style>

        <h4 style="margin-top: 100px;">Не рассмотрены</h4>
        <table style="margin-top: 10px;">
            <tr>
                <th>✖</th>
                <th>✓</th>
                <th>ID</th>
                <th>Марка</th>
                <th>Модель</th>
                <th>Мощность</th>
                <th>VIN</th>
                <th>Тип документа</th>
                <th>Серия документа</th>
                <th>Номер документа</th>
                <th>Фамилия владельца</th>
                <th>Имя владельца</th>
                <th>Отчество владельца</th>
                <th>Фамилия страховщика</th>
                <th>Имя страховщика</th>
                <th>Отчество страховщика</th>
                <th>Фамилия водителя</th>
                <th>Имя водителя</th>
                <th>Отчество водителя</th>
                <th>Дата выдачи водительского удостоверения</th>
                <th>Серия водительского удостоверения</th>
                <th>Номер водительского удостоверения</th>
                <th>Государственный знак</th>
                <th>Прицеп</th>
                <th>Cрок страхования (мес.)</th>
                <th>Страховая премия</th>
            </tr>
            <?php
            $row_data = mysqli_query($db, "SELECT * FROM `request` WHERE `status`='Не рассмотрена'");
            while ($data = mysqli_fetch_array($row_data)) { ?>
                <tr>
                    <!-- Формы для отмены и подтверждения заявки -->
                    <form action="deny_request.php" method="post">
                        <td>
                            <input type="submit" value="✖" onclick="return confirm('Вы уверены, что хотите отклонить заявку?')">
                            <input type="hidden" value="<?php echo $data['id']; ?>" name="request_id">
                            <input type="hidden" name="deny">
                        </td>
                    </form>
                    <form action="accept_request.php" method="post">
                        <td>
                            <input type="submit" value="✓">
                            <input type="hidden" value="<?php echo $data['id']; ?>" name="request_id">
                            <input type="hidden" name="accept">
                        </td>
                        <td><?php echo $data['id']; ?></td>
                        <td><?php echo $data['marka']; ?></td>
                        <td><?php echo $data['model']; ?></td>
                        <td><?php echo $data['power']; ?></td>
                        <td><?php echo $data['VIN']; ?></td>
                        <td><?php echo $data['doc_type']; ?></td>
                        <td><?php echo $data['doc_series']; ?></td>
                        <td><?php echo $data['doc_number']; ?></td>
                        <td><?php echo $data['sobstv_surname']; ?></td>
                        <td><?php echo $data['sobstv_name']; ?></td>
                        <td><?php echo $data['sobstv_patronymic']; ?></td>
                        <td><?php echo $data['strah_surname']; ?></td>
                        <td><?php echo $data['strah_name']; ?></td>
                        <td><?php echo $data['strah_patronymic']; ?></td>
                        <td><?php echo $data['driver_surname']; ?></td>
                        <td><?php echo $data['driver_name']; ?></td>
                        <td><?php echo $data['driver_patronymic']; ?></td>
                        <td><?php echo $data['driver_date_vidach_vu']; ?></td>
                        <td><?php echo $data['driver_series_vu']; ?></td>
                        <td><?php echo $data['driver_number_vu']; ?></td>
                        <td><?php echo $data['gos_znak']; ?></td>
                        <td><?php echo $data['pricep']; ?></td>
                        <td><?php echo $data['srok_strah']; ?></td>
                        <td><?php echo $data['strah_premiya']; ?></td>
                    </form>
                </tr>
            <?php } ?>
        </table>

        <h4 style="margin-top: 30px;">Одобрены</h4>
        <table style="margin-top: 10px;">
            <!-- Аналогично выводим заявки со статусом "одобрена" -->
            <tr>

                <th>ID</th>
                <th>Марка</th>
                <th>Модель</th>
                <th>Мощность</th>
                <th>VIN</th>
                <th>Тип документа</th>
                <th>Серия документа</th>
                <th>Номер документа</th>
                <th>Фамилия владельца</th>
                <th>Имя владельца</th>
                <th>Отчество владельца</th>
                <th>Фамилия страховщика</th>
                <th>Имя страховщика</th>
                <th>Отчество страховщика</th>
                <th>Фамилия водителя</th>
                <th>Имя водителя</th>
                <th>Отчество водителя</th>
                <th>Дата выдачи водительского удостоверения</th>
                <th>Серия водительского удостоверения</th>
                <th>Номер водительского удостоверения</th>
                <th>Государственный знак</th>
                <th>Прицеп</th>
                <th>Cрок страхования (мес.)</th>
                <th>Страховая премия</th>
                <!-- Продолжите для остальных полей -->
            </tr>
            <?php
            $row_data = mysqli_query($db, "SELECT * FROM `request` WHERE `status`='Одобрена'");
            while ($data = mysqli_fetch_array($row_data)) { ?>
                <tr>
                    <td><?php echo $data['id']; ?></td>
                    <td><?php echo $data['marka']; ?></td>
                    <td><?php echo $data['model']; ?></td>
                    <td><?php echo $data['power']; ?></td>
                    <td><?php echo $data['VIN']; ?></td>
                    <td><?php echo $data['doc_type']; ?></td>
                    <td><?php echo $data['doc_series']; ?></td>
                    <td><?php echo $data['doc_number']; ?></td>
                    <td><?php echo $data['sobstv_surname']; ?></td>
                    <td><?php echo $data['sobstv_name']; ?></td>
                    <td><?php echo $data['sobstv_patronymic']; ?></td>
                    <td><?php echo $data['strah_surname']; ?></td>
                    <td><?php echo $data['strah_name']; ?></td>
                    <td><?php echo $data['strah_patronymic']; ?></td>
                    <td><?php echo $data['driver_surname']; ?></td>
                    <td><?php echo $data['driver_name']; ?></td>
                    <td><?php echo $data['driver_patronymic']; ?></td>
                    <td><?php echo $data['driver_date_vidach_vu']; ?></td>
                    <td><?php echo $data['driver_series_vu']; ?></td>
                    <td><?php echo $data['driver_number_vu']; ?></td>
                    <td><?php echo $data['gos_znak']; ?></td>
                    <td><?php echo $data['pricep']; ?></td>
                    <td><?php echo $data['srok_strah']; ?></td>
                    <td><?php echo $data['strah_premiya']; ?></td>

                </tr>
            <?php } ?>
        </table>

        <h4 style="margin-top: 30px;">Отказаны</h4>
        <table style="margin-top: 10px;">
            <!-- Аналогично выводим заявки со статусом "отказана" -->
            <tr>
                <th>ID</th>
                <th>Марка</th>
                <th>Модель</th>
                <th>Мощность</th>
                <th>VIN</th>
                <th>Тип документа</th>
                <th>Серия документа</th>
                <th>Номер документа</th>
                <th>Фамилия владельца</th>
                <th>Имя владельца</th>
                <th>Отчество владельца</th>
                <th>Фамилия страховщика</th>
                <th>Имя страховщика</th>
                <th>Отчество страховщика</th>
                <th>Фамилия водителя</th>
                <th>Имя водителя</th>
                <th>Отчество водителя</th>
                <th>Дата выдачи водительского удостоверения</th>
                <th>Серия водительского удостоверения</th>
                <th>Номер водительского удостоверения</th>
                <th>Государственный знак</th>
                <th>Прицеп</th>
                <th>Cрок страхования (мес.)</th>
                <th>Страховая премия</th>
            </tr>
            <?php
            $row_data = mysqli_query($db, "SELECT * FROM `request` WHERE `status`='Отказана'");
            while ($data = mysqli_fetch_array($row_data)) { ?>
                <tr>
                    <td><?php echo $data['id']; ?></td>
                    <td><?php echo $data['marka']; ?></td>
                    <td><?php echo $data['model']; ?></td>
                    <td><?php echo $data['power']; ?></td>
                    <td><?php echo $data['VIN']; ?></td>
                    <td><?php echo $data['doc_type']; ?></td>
                    <td><?php echo $data['doc_series']; ?></td>
                    <td><?php echo $data['doc_number']; ?></td>
                    <td><?php echo $data['sobstv_surname']; ?></td>
                    <td><?php echo $data['sobstv_name']; ?></td>
                    <td><?php echo $data['sobstv_patronymic']; ?></td>
                    <td><?php echo $data['strah_surname']; ?></td>
                    <td><?php echo $data['strah_name']; ?></td>
                    <td><?php echo $data['strah_patronymic']; ?></td>
                    <td><?php echo $data['driver_surname']; ?></td>
                    <td><?php echo $data['driver_name']; ?></td>
                    <td><?php echo $data['driver_patronymic']; ?></td>
                    <td><?php echo $data['driver_date_vidach_vu']; ?></td>
                    <td><?php echo $data['driver_series_vu']; ?></td>
                    <td><?php echo $data['driver_number_vu']; ?></td>
                    <td><?php echo $data['gos_znak']; ?></td>
                    <td><?php echo $data['pricep']; ?></td>
                    <td><?php echo $data['srok_strah']; ?></td>
                    <td><?php echo $data['strah_premiya']; ?></td>

                </tr>
            <?php } ?>
        </table>
    </div>
    <script src="/mdb/js/mdb.min.js"></script>
</body>

</html>