<link rel="stylesheet" href="../styles/handbooks.css">

<?
include("../../connect.php");
$cars_of_data = mysqli_query($db, "SELECT * FROM `avto`");
?>


<table>
    <tr>
        <th scope='col'>#</th>
        <th scope='col'>Прицеп</th>
        <th scope='col'>VIN</th>
        <th scope='col'>Гос.Номер</th>
        <th scope='col'>Мощность</th>
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

        <tr>
            <td><? echo $cars['id'] ?></td>
            <td><input type='checkbox' <? if ($cars['Pricep']) {
                                            echo "checked";
                                        } ?>></td>
            <td><input type='text' value=<? echo $cars['VIN'] ?>></td>
            <td><input type='text' value=<? echo $cars['Gos_Znak'] ?>></td>
            <td><input type='text' value=<? echo $cars['Power'] ?>></td>
            <td><input type='text' value=<? echo $cars['Doc_type'] ?>></td>
            <td><input type='text' value=<? echo $cars['Doc_series'] ?>></td>
            <td><input type='text' value=<? echo $cars['Doc_number'] ?>></td>

            <td><select name='marka' id='select'>
                    <? while ($marks = mysqli_fetch_array($marks_data)) {
                        if ($cars['idMarka'] === $marks['id']) {
                            echo "<option value = $marks[id] selected>$marks[Nazvanie]</option>";
                        } else {
                            echo "<option value = $marks[id]>$marks[Nazvanie]</option>";
                        }
                    }
                    ?>
                </select></td>

            <td><select name='model' id='select'>
                    <? while ($model = mysqli_fetch_array($models_data)) {
                        if ("$cars[idModel]" === "$model[id]") {
                            echo "<option value = $model[id] selected>$model[Nazvanie]</option>";
                        } else {
                            echo "<option value = $model[id]>$model[Nazvanie]</option>";
                        }
                    }
                    ?>
                </select></td>

            <td><select name='sobstvennic' id='select' class='names'>
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
    <? } ?>
</table>
    <input type="submit" name="submit" value="excel" onclick="ex()">

<script>
    function ex() {
        id=window.open("excel.php");
        id.focus();
        id.document.close();
    }
</script>