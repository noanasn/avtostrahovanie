<link rel="stylesheet" href="../../mdb/css/mdb.min.css" />
<link rel="stylesheet" href="../../mdb/css/icons.css">
<?
include $_SERVER["DOCUMENT_ROOT"] . "/connect.php";
session_start();
require "../../header.php";
$strahpol_of_data = mysqli_query($db, "SELECT * FROM `strah_polis`");
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

<table style="margin-top:61.6px ;">
    <tr>
        <th scope='col'>✖</th>
        <th scope='col'>✓</th>
        <th scope='col'>#</th>
        <th scope='col'>Серия</th>
        <th scope='col'>Номер</th>
        <th scope='col'>Страхование от</th>
        <th scope='col'>Страхование до</th>
        <th scope='col'>Дата заключения</th>
        <th scope='col'>Дата выдачи</th>
        <th scope='col'>Страх.премия</th>
        <th scope='col'>Страхователь</th>
        <th scope='col'>Водитель</th>
        <th scope='col'>Авто</th>
        <th scope='col'>Сотрудник</th>
    </tr>

    <? while ($strahpol = mysqli_fetch_array($strahpol_of_data)) { ?>
        <?
        $strahovat_data  = mysqli_query($db, "SELECT * FROM `strahovatel`");
        $drivers_data  = mysqli_query($db, "SELECT * FROM `drivers`");
        $cars_data  = mysqli_query($db, "SELECT * FROM `avto`");
        $sotr_data  = mysqli_query($db, "SELECT * FROM `sotrudnik`");
        ?>

        <form action="delete_strah_polis.php" method="post" id="delete_form">
            <tr>
                <td>
                    <input type="submit" value="✖">
                    <input type="hidden" value=<? echo "$strahpol[id]" ?> name="strah_polis_id">
                    <input type="hidden" name='delete' id="delete_btn">
                </td>
        </form>
        <form action="update_strah_polis.php" method="post">
            <td>
                <input type="submit" value="✓">
                <input type="hidden" value=<? echo $strahpol['id'] ?> name="strah_polis_id">
                <input type="hidden" name='update'>
            </td>
            <td><? echo $strahpol['id'] ?></td>
            <td><input name="series" type='text' value=<? echo $strahpol['Series'] ?>></td>
            <td><input name="number" type='text' value=<? echo $strahpol['Number'] ?>></td>
            <td><input name="srok_strah_ot" type='date' value=<? echo $strahpol['Srok_Strah_Ot'] ?>></td>
            <td><input name="srok_strah_do" type='date' value=<? echo $strahpol['Srok_Strah_Do'] ?>></td>
            <td><input name="date_zakluch" type='date' value=<? echo $strahpol['Date_Zakluch'] ?>></td>
            <td><input name="date_vidach" type='date' value=<? echo $strahpol['Date_Vidach'] ?>></td>
            <td><input name="strah_premiya" type='text' value=<? echo $strahpol['Strah_Premiya'] ?>></td>
            <td><select name='idStrahovatel'>
                    <? while ($strahovat = mysqli_fetch_array($strahovat_data)) {
                        $fio = $strahovat['Surname'] . " " . mb_substr($strahovat['Name'], 0, 1) . "." . mb_substr($strahovat['Patronymic'], 0, 1) . ".";
                        if ($strahpol['idStrahovatel'] === $strahovat['id']) {
                            echo "<option value = $strahovat[id] selected>$fio</option>";
                        }
                        echo "<option value = $strahovat[id]>$fio</option>";
                    }
                    ?>
                </select></td>
            <td><select name='idDrivers'>
                    <? while ($drivers = mysqli_fetch_array($drivers_data)) {
                        $fio = $drivers['Surname'] . " " . mb_substr($drivers['Name'], 0, 1) . "." . mb_substr($drivers['Patronymic'], 0, 1) . ".";
                        if ($strahpol['idDrivers'] === $drivers['id']) {
                            echo "<option value = $drivers[id] selected>$fio</option>";
                        }
                        echo "<option value = $drivers[id]>$fio</option>";
                    }
                    ?>
                </select></td>
            <td><select name='idAvto'>
                    <? while ($cars = mysqli_fetch_array($cars_data)) {
                        if ($strahpol['idAvto'] === $cars['id']) {
                            echo "<option value = $cars[id] selected>$cars[VIN]</option>";
                        }
                        echo "<option value = $cars[id]>$cars[VIN]</option>";
                    }
                    ?>
                </select></td>
            <td><select name='idSotrudnik'>
                    <? while ($sotr = mysqli_fetch_array($sotr_data)) {
                        $fio = $sotr['Surname'] . " " . mb_substr($sotr['Name'], 0, 1) . "." . mb_substr($sotr['Patronymic'], 0, 1) . ".";
                        if ($strahpol['idSotrudnik'] === $sotr['id']) {
                            echo "<option value = $sotr[id] selected>$fio</option>";
                        }
                        echo "<option value = $sotr[id]>$fio</option>";
                    }
                    ?>
                </select></td>
            </tr>
        </form>
    <? } ?>
    <form action="insert_strah_polis.php" method="post">
        <tr>
            <td></td>
            <td><input type="submit" value="+"></td>
            <input type="hidden" name='insert'>
            <td></td>
            <th scope='col'><input name="series" type='text'></th>
            <th scope='col'><input name="number" type='text'></th>
            <th scope='col'><input name="srok_strah_ot" type='date'></th>
            <th scope='col'><input name="srok_strah_do" type='date'></th>
            <th scope='col'><input name="date_zakluch" type='date'></th>
            <th scope='col'><input name="date_vidach" type='date'></th>
            <th scope='col'><input name="strah_premiya" type='text'></th>
            <th scope='col'>
                <select name='idStrahovatel'>
                    <?
                    $strahovat_data  = mysqli_query($db, "SELECT * FROM `strahovatel`");
                    while ($strahovat = mysqli_fetch_array($strahovat_data)) {
                        $fio = $strahovat['Surname'] . " " . mb_substr($strahovat['Name'], 0, 1) . "." . mb_substr($strahovat['Patronymic'], 0, 1) . ".";
                        echo "<option value = $strahovat[id]>$fio</option>";
                    }
                    ?>
                </select>
            </th>
            <th scope='col'>
                <select name='idDrivers'>
                    <? $drivers_data  = mysqli_query($db, "SELECT * FROM `drivers`");
                    while ($drivers = mysqli_fetch_array($drivers_data)) {
                        $fio = $drivers['Surname'] . " " . mb_substr($drivers['Name'], 0, 1) . "." . mb_substr($drivers['Patronymic'], 0, 1) . ".";
                        echo "<option value = $drivers[id]>$fio</option>";
                    }
                    ?>
                </select>
            </th>
            <th scope='col'>
                <select name='idAvto'>
                    <? $cars_data = mysqli_query($db, "SELECT * FROM `avto`");
                    while ($cars = mysqli_fetch_array($cars_data)) {
                        echo "<option value = $cars[id]>$cars[VIN]</option>";
                    }
                    ?>
                </select>
            </th>
            <th scope='col'>
                <select name='idSotrudnik'>
                    <? $sotr_data = mysqli_query($db, "SELECT * FROM `sotrudnik`");
                    while ($sotr = mysqli_fetch_array($sotr_data)) {
                        $fio = $sotr['Surname'] . " " . mb_substr($sotr['Name'], 0, 1) . "." . mb_substr($sotr['Patronymic'], 0, 1) . ".";
                        echo "<option value = $sotr[id]>$fio</option>";
                    }
                    ?>
                </select>
            </th>
        </tr>
    </form>
</table>
<script src="../../mdb/js/mdb.min.js"></script>