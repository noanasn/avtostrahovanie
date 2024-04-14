<link rel="stylesheet" href="../../mdb/css/mdb.min.css" />
<link rel="stylesheet" href="../../mdb/css/icons.css">
<title>Автомобили-Таблица</title>
<?
include $_SERVER["DOCUMENT_ROOT"] . "/connect.php";
session_start();
// require "../../header.php";
require "../../nav_panel.php";
$cars_of_data = mysqli_query($db, "SELECT * FROM `avto`");
?>

<style>
    td {
        padding: 8px;
        text-align: center;
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

<body>
    <h3 style="margin-top:61.6px; margin-left: 10px;">Таблица - Автомобили</h3>
    <!-- <table style="margin-top:61.6px ;"> -->
    <table style="margin-top:10px ;">
        <form action="insert_car.php" method="post">
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th>Прицеп</th>
                <th width="200px">VIN</th>
                <th>Гос.Номер</th>
                <th>Мощность</th>
                <th>Тип документа</th>
                <th>Серия документа</th>
                <th>Номер документа</th>
                <th>Марка</th>
                <th>Модель</th>
                <th>Собственник</th>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="+"></td>
                <input type="hidden" name='insert'>
                <td></td>
                <td><input type="checkbox" name="pricep"></td>
                <td><input type="text" name="vin" maxlength="17" required></td>
                <td><input type="text" name="gos_znak" maxlength="9" required></td>
                <td><input type="number" name="power" min="1" required></td>
                <td>
                    <select style="width: 100%;" name="doc_type">
                        <option value="СТС">СТС</option>
                        <option value="ПТС">ПТС</option>
                    </select>
                </td>
                <td><input type="text" name="doc_series" maxlength="4" required></td>
                <td><input type="number" name="doc_number" min="1" required></td>
                <td>
                    <select name="idMarka" id="marka">
                        <?
                        $marka_row_data  = mysqli_query($db, "SELECT * FROM `marka` ORDER BY `marka`.`Nazvanie` ASC;");
                        while ($marka_data = mysqli_fetch_array($marka_row_data)) {
                            echo "<option value = $marka_data[id]>$marka_data[Nazvanie]</option>";
                        }
                        ?>
                    </select>
                </td>
                <td>
                    <select name="idModel" id="model" required style="width: 100%;">
                        <option value="" disabled selected hidden>Модель</option>
                    </select>
                </td>
                <td>
                    <select name='idSobstvennic' id='select' class='names'>
                        <?
                        $sobstv_data  = mysqli_query($db, "SELECT * FROM `sobstvennic` ORDER BY `sobstvennic`.`Surname` ASC;");
                        while ($sobstv = mysqli_fetch_array($sobstv_data)) {
                            $fio = $sobstv['Surname'] . " " . mb_substr($sobstv['Name'], 0, 1) . "." . mb_substr($sobstv['Patronymic'], 0, 1) . ".";
                            echo "<option value = $sobstv[id]>$fio</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
        </form>
        <tr>
            <th>✖</th>
            <th>✓</th>
            <th>#</th>
            <th>Прицеп</th>
            <th style="width: 200px;">VIN</th>
            <th>Гос.Номер</th>
            <th>Мощность</th>
            <th>Тип документа</th>
            <th>Серия документа</th>
            <th>Номер документа</th>
            <th>Марка</th>
            <th>Модель</th>
            <th>Собственник</th>
        </tr>

        <? while ($cars = mysqli_fetch_array($cars_of_data)) { ?>
            <?
            $marks_data  = mysqli_query($db, "SELECT * FROM `marka` ORDER BY `marka`.`Nazvanie` ASC;");
            $models_data = mysqli_query($db, "SELECT * FROM `model` ORDER BY `model`.`Nazvanie` ASC;");
            $sobstv_data  = mysqli_query($db, "SELECT * FROM `sobstvennic` ORDER BY `sobstvennic`.`Surname` ASC;");
            ?>

            <form action="delete_car.php" method="post" id="delete_form">
                <td>
                    <input type="submit" value="✖" onclick="return confirm('Вы уверены что хотите удалить запись?')">
                    <input type="hidden" value=<? echo "$cars[id]" ?> name="car_id">
                    <input type="hidden" name='delete' id="delete_btn">
                </td>
            </form>
            <form action="update_car.php" method="post">
                <td>
                    <input type="submit" value="✓">
                    <input type="hidden" value=<? echo $cars['id'] ?> name="car_id">
                    <input type="hidden" name='update'>
                </td>
                <td><? echo $cars['id'] ?></td>
                <td class="align-middle text-center"><input name="pricep" type='checkbox' <? if ($cars['Pricep']) {
                                                                                                echo "checked";
                                                                                            } ?>></td>
                <td><input type='text' name="vin" maxlength="17" value=<? echo $cars['VIN'] ?>></td>
                <td><input type='text' name="gos_znak" maxlength="9" value=<? echo $cars['Gos_Znak'] ?>></td>
                <td><input type='number' name="power" value=<? echo $cars['Power'] ?>></td>
                <td><select style="width: 100%;" name="doc_type">
                        <?
                        if ($cars['Doc_type'] === "СТС") {
                            echo "<option value = 'СТС' selected>СТС</option>";
                            echo "<option value = 'ПТС'>ПТС</option>";
                        } else {
                            echo "<option value = 'ПТС' selected >ПТС</option>";
                            echo "<option value = 'СТС'>СТС</option>";
                        }
                        ?>
                    </select></td>
                <td><input type='text' name="doc_series" maxlength="4" value=<? echo $cars['Doc_series'] ?>></td>
                <td><input type='number' name="doc_number" value=<? echo $cars['Doc_number'] ?>></td>

                <td> <select name='idMarka' id='idMarka' class='marka_select'<?php echo $cars['id']; ?>>
                        <?php
                        while ($marks = mysqli_fetch_array($marks_data)) {
                            if ($cars['idMarka'] === $marks['id']) {
                                echo "<option value='{$marks['id']}' selected>{$marks['Nazvanie']}</option>";
                            } else {
                                echo "<option value='{$marks['id']}'>{$marks['Nazvanie']}</option>";
                            }
                        }
                        ?>
                    </select></td>

                <td><select name='idModel' id='idModel' class='model_select' <?php echo $cars['id']; ?>required style="width: 100%;">
                        <?php
                        while ($model = mysqli_fetch_array($models_data)) {
                            if ($cars['idModel'] === $model['id']) {
                                echo "<option value='{$model['id']}' selected>{$model['Nazvanie']}</option>";
                            } else {
                                echo "<option value='{$model['id']}'>{$model['Nazvanie']}</option>";
                            }
                        }
                        ?>
                    </select></td>

                <td><select name='idSobstvennic'>
                        <? while ($sobstv = mysqli_fetch_array($sobstv_data)) {
                            $fio = $sobstv['Surname'] . " " . mb_substr($sobstv['Name'], 0, 1) . "." . mb_substr($sobstv['Patronymic'], 0, 1) . ".";
                            $selected = ($cars['idSobstvennic'] == $sobstv['id']) ? "selected" : "";
                            echo "<option value='{$sobstv['id']}' $selected>$fio</option>";
                        }
                        ?>
                    </select></td>
                </tr>
            </form>
        <? } ?>
    </table>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../../mdb/js/mdb.min.js"></script>
    <script>
        $("#marka").change(function() {
            var selectedMarkaId = $(this).val();
            $.ajax({
                url: '../../get_models.php', //путь к файлу, который будет возвращать данные моделей для выбранной марки
                method: 'GET',
                dataType: 'json',
                data: {
                    marka_id: selectedMarkaId
                },
                success: function(response) {
                    // Очистите текущие варианты моделей и добавьте новые на основе ответа
                    $('#model').empty();
                    $.each(response, function(index, model) {
                        $('#model').append($('<option>', {
                            value: model.id,
                            text: model.Nazvanie
                        }));
                    });
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    </script>
    <script>
        function loadModels(markaSelect, modelSelect) {
    var selectedMarkaId = markaSelect.val();
    $.ajax({
        url: '../../get_models.php',
        method: 'GET',
        dataType: 'json',
        data: {
            marka_id: selectedMarkaId
        },
        success: function(response) {
            modelSelect.empty();
            $.each(response, function(index, model) {
                modelSelect.append($('<option>', {
                    value: model.id,
                    text: model.Nazvanie
                }));
            });
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}
    </script>
    <script>
        $(document).ready(function() {
    $('.marka_select').each(function() {
        var markaSelect = $(this);
        var modelSelect = markaSelect.closest('tr').find('.model_select');
        loadModels(markaSelect, modelSelect);
    });

    $('.marka_select').change(function() {
        var markaSelect = $(this);
        var modelSelect = markaSelect.closest('tr').find('.model_select');
        loadModels(markaSelect, modelSelect);
    });
});

    </script>
    <script>
$(document).ready(function() {
    $('.marka_select').change(function() {
        var selectedMarkaId = $(this).val();
        var modelSelect = $(this).closest('tr').find('.model_select'); // Находим элемент select модели в этой же строке таблицы
        $.ajax({
            url: '../../get_models.php',
            method: 'GET',
            dataType: 'json',
            data: {
                marka_id: selectedMarkaId
            },
            success: function(response) {
                modelSelect.empty();
                $.each(response, function(index, model) {
                    modelSelect.append($('<option>', {
                        value: model.id,
                        text: model.Nazvanie
                    }));
                });
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
});

    </script>
</body>