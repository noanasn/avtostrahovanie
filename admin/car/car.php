<!-- <link rel="stylesheet" href="../style.css"> -->
<link rel="stylesheet" href="../../mdb/css/mdb.min.css" />
<link rel="stylesheet" href="../../mdb/css/style.css" />
<link rel="stylesheet" href="../../mdb/css/icons.css">
<?
include $_SERVER["DOCUMENT_ROOT"] . "/connect.php";
session_start();
// include $_SERVER["DOCUMENT_ROOT"] . "./admin/admin.html";
require "../../header.php";
$cars_of_data = mysqli_query($db, "SELECT * FROM `avto`");

?>

<style>
    th, td {
  padding: 8px; /* Отступ внутри ячеек */
  text-align: left; /* Выравнивание текста в ячейках */
  border: 1px solid #ddd; /* Граница ячеек */
}

/* Пример для колонок с элементами <input> */
input[type="text"] {
  width: 100%; /* Ширина элементов <input> внутри ячеек */
}

</style>

<table  style="margin-top:61.6px ;">
    <tr>
        <th scope='col'>✖</th>
        <th scope='col'>✓</th>
        <th scope='col'>#</th>
        <th scope='col'>Прицеп</th>
        <th scope='col'>VIN</th>
        <th scope='col'>Гос.Номер</th>
        <th style="width: 25px;" scope='col'>Мощность</th>
        <th scope='col'>Тип документа</th>
        <th scope='col'>Серия документа</th>
        <th scope='col'>Номер документа</th>
        <th scope='col'>idMarka</th>
        <th scope='col'>idModel</th>
        <th scope='col'>idSobstvennic</th>
    </tr>

    <? while ($cars = mysqli_fetch_array($cars_of_data)) { ?>
        <?
        $marks_data  = mysqli_query($db, "SELECT * FROM `marka`");
        $models_data = mysqli_query($db, "SELECT * FROM `model`");
        $sobstv_data  = mysqli_query($db, "SELECT * FROM `sobstvennic`");
        ?>

        <form action="delete_car.php" method="post">
            <tr>
                <td>
                    <input type="submit" value="✖">
                    <input type="hidden" value=<? echo "$cars[id]" ?> name="car_id">
                    <input type="hidden" name='delete'>
                </td>
        </form>
        <form action="update_car.php" method="post">
            <td>
                <input type="submit" value="✓">
                <input type="hidden" value=<? echo $cars['id'] ?> name="car_id">
                <input type="hidden" name='update'>
            </td>
            <td><? echo $cars['id'] ?></td>
            <td><input name="pricep" type='checkbox' <? if ($cars['Pricep']) {
                                                            echo "checked";
                                                        } ?>></td>
            <td><input size="20" name="vin" type='text' value=<? echo $cars['VIN'] ?>></td>
            <td><input name="gos_znak" type='text' value=<? echo $cars['Gos_Znak'] ?>></td>
            <td width=5><input size = "5" name="power" type='text' value=<? echo $cars['Power'] ?>></td>
            <td><input name="doc_type" type='text' value=<? echo $cars['Doc_type'] ?>></td>
            <td><input name="doc_series" type='text' value=<? echo $cars['Doc_series'] ?>></td>
            <td><input name="doc_number" type='text' value=<? echo $cars['Doc_number'] ?>></td>

            <td><select name='idMarka' id='select'>
                    <? while ($marks = mysqli_fetch_array($marks_data)) {
                        if ($cars['idMarka'] === $marks['id']) {
                            echo "<option value = $marks[id] selected>$marks[Nazvanie]</option>";
                        } else {
                            echo "<option value = $marks[id]>$marks[Nazvanie]</option>";
                        }
                    }
                    ?>
                </select></td>

            <td><select name='idModel' id='select'>
                    <? while ($model = mysqli_fetch_array($models_data)) {
                        if ("$cars[idModel]" === "$model[id]") {
                            echo "<option value = $model[id] selected>$model[Nazvanie]</option>";
                        } else {
                            echo "<option value = $model[id]>$model[Nazvanie]</option>";
                        }
                    }
                    ?>
                </select></td>

            <td><select name='idSobstvennic' id='select' class='names'>
                    <? while ($sobstv = mysqli_fetch_array($sobstv_data)) {
                        $fio = $sobstv['Surname'] . " " . mb_substr($sobstv['Name'], 0, 1) . "." . mb_substr($sobstv['Patronymic'], 0, 1) . ".";
                        if ("$cars[idSobstvennic]" === "$sobstv[id]") {
                            echo "<option value = $sobstv[id] selected>$fio</option>";
                        } {
                            echo "<option value = $sobstv[id]>$fio</option>";
                        }
                    }
                    ?>
                </select></td>
            </tr>
        </form>
    <? } ?>
    <form action="insert_car.php" method="post">
        <tr>
            <td></td>
            <td><input type="submit" value="+"></td>
            <input type="hidden" name='insert'>
            <td></td>
            <th scope='col'><input type="checkbox" name="pricep"></th>
            <th scope='col'><input type="text" name="vin"></th>
            <th scope='col'><input type="text" name="gos_znak"></th>
            <th scope='col'><input type="text" name="power"></th>
            <th scope='col'><input type="text" name="doc_type"></th>
            <th scope='col'><input type="text" name="doc_series"></th>
            <th scope='col'><input type="text" name="doc_number"></th>
            <th scope='col'>
                <select name="idMarka">
                    <?
                    $marka_row_data  = mysqli_query($db, "SELECT * FROM `marka`");
                    while ($marka_data = mysqli_fetch_array($marka_row_data)) {
                        echo "<option value = $marka_data[id]>$marka_data[Nazvanie]</option>";
                    }
                    ?>
                </select>
            </th>
            <th scope='col'>
                <select name="idModel">
                    <?
                    $model_row_data = mysqli_query($db, "SELECT * FROM `model`");
                    while ($model_data = mysqli_fetch_array($model_row_data)) {
                        echo "<option value = $model_data[id]>$model_data[Nazvanie]</option>";
                    }
                    ?>
                </select>
            </th>
            <td>
                <select name='idSobstvennic' id='select' class='names'>
                    <?
                    $sobstv_data  = mysqli_query($db, "SELECT * FROM `sobstvennic`");
                    while ($sobstv = mysqli_fetch_array($sobstv_data)) {
                        $fio = $sobstv['Surname'] . " " . mb_substr($sobstv['Name'], 0, 1) . "." . mb_substr($sobstv['Patronymic'], 0, 1) . ".";
                        echo "<option value = $sobstv[id]>$fio</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
    </form>
</table>
<input type="submit" name="submit" value="excel" onclick="ex()">
<script src="../../mdb/js/mdb.min.js"></script>
<script>
    function ex() {
        id = window.open("excel.php");
        id.focus();
        id.document.close();
    }
</script>
