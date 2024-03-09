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
                padding: 4px;
                text-align: center;
                border: 1px solid #ddd;
                white-space: nowrap;
            }

            th {
                padding: 4px;
                text-align: center;
                border: 1px solid #ddd;

            }
        </style>

        <h4 style="margin-top: 80px;">Не рассмотрены</h4>
        <?php
        $marks_data  = mysqli_query($db, "SELECT * FROM `marka`");
        $models_data = mysqli_query($db, "SELECT * FROM `model`");
        $row_data = mysqli_query($db, "SELECT * FROM `request` WHERE `status`='Не рассмотрена'");
        if (mysqli_num_rows($row_data) > 0) {
        ?>
            <table style="margin-top: 10px;">
                <tr>
                    <th>Комментарий</th>
                    <th>✖</th>
                    <th>✓</th>
                    <th>ID</th>
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
                </tr>
                <?php
                // Преобразование данных о марках в массив для удобства использования
                $marks_array = [];
                while ($mark = mysqli_fetch_array($marks_data)) {
                    $marks_array[$mark['id']] = $mark['Nazvanie'];
                }
                $models_array = [];
                while ($model = mysqli_fetch_array($models_data)) {
                    $models_array[$model['id']] = $model['Nazvanie'];
                }
                while ($data = mysqli_fetch_array($row_data)) {
                ?>
                    <tr>
                        <!-- Формы для отмены и подтверждения заявки -->
                        <form action="deny_request.php" method="post">
                            <td>
                                <input type="text" name="comment" id="comment" maxlength="200" placeholder="Причина отказа" style="width: 140px;">
                            </td>
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
                        </form>
                    </tr>
                <?php }
                ?>
            </table>
        <?php
        }
        ?>

        <h4 style="margin-top: 30px;">Одобрены</h4>
        <?php
        $row_data = mysqli_query($db, "SELECT * FROM `request` WHERE `status`='Одобрена'");
        if (mysqli_num_rows($row_data) > 0) {
        ?>
            <table style="margin-top: 10px;">
                <tr>
                    <th>ID</th>
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
                </tr>
                <?php
                while ($data = mysqli_fetch_array($row_data)) { ?>
                    <tr>
                        <td><?php echo $data['id']; ?></td>
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
                    </tr>
                <?php }
                ?>
            </table>
        <?php
        } else {
            echo "<p style='margin-top: 10px;'>Нет данных</p>";
        }
        ?>

        <h4 style="margin-top: 30px;">Отказаны</h4>
        <?php
        $row_data = mysqli_query($db, "SELECT * FROM `request` WHERE `status`='Отказана'");
        if (mysqli_num_rows($row_data) > 0) {
        ?>
            <table style="margin-top: 10px;">
                <tr>
                    <th>ID</th>
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
                <?php
                while ($data = mysqli_fetch_array($row_data)) { ?>
                    <tr>
                        <td><?php echo $data['id']; ?></td>
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
                <?php }
                ?>
            </table>
        <?php
        } else {
            echo "<p style='margin-top: 10px;'>Нет данных</p>";
        }
        ?>

    </div>
    <script src="/mdb/js/mdb.min.js"></script>
</body>

</html>