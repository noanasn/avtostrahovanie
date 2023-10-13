<link rel="stylesheet" href="../../mdb/css/mdb.min.css" />
<link rel="stylesheet" href="../../mdb/css/icons.css">
<?
include $_SERVER["DOCUMENT_ROOT"] . "/connect.php";
session_start();
require "../../header.php";
$strahpol_of_data = mysqli_query($db, "SELECT * FROM `strah_polis`");
?>

<div style="margin-top: 65px; padding:12px">
    <form method="post">
        <label class="form-label select-label">Номер страхового полиса</label>
        <select class="select" name='SP_number'>
            <? while ($sp = mysqli_fetch_array($strahpol_of_data)) { 
                echo "<option value = $sp[Number]>$sp[Number]</option>";
            }
            ?>
        </select>
        <input type="submit" name="show_sp" value="Вывести">
    </form>

</div>

<style>
    td {
        padding: 4px;
        text-align: left;
        border: 1px solid #ddd;
    }

    th {
        padding: 4px;
        text-align: center;
        border: 1px solid #ddd;
    }

    input[type="text"] {
        width: 100%;
    }
</style>
<?if (isset($_POST['show_sp'])){
    $strahpol_of_data = mysqli_query($db, "SELECT * FROM `strah_polis` WHERE Number = '$_POST[SP_number]'");
    ?>
<table class="full-width-table">
    <tr>
        <th scope='col'>✖</th>
        <!-- <th scope='col'>✓</th> -->
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

    <?  
    while ($strahpol = mysqli_fetch_array($strahpol_of_data)) {?>
        <?
       $strahovat_data  = mysqli_query($db, "SELECT * FROM `strahovatel`");
       $drivers_data  = mysqli_query($db, "SELECT * FROM `drivers`");
       $cars_data  = mysqli_query($db, "SELECT * FROM `avto`");
       $sotr_data  = mysqli_query($db, "SELECT * FROM `sotrudnik`"); 
        ?>
        <form action="delete_strah_polis_zh.php" method="post" id="delete_form">
            <tr>
                <td>
                    <input type="submit" value="✖">
                    <input type="hidden" value=<? echo "$strahpol[id]" ?> name="strah_polis_id">
                    <input type="hidden" name='delete' id="delete_btn">
                </td>
        </form>
            <td><? echo $strahpol['id'] ?></td>
            <!-- Сделать SELECT на все возможные серии СП-->
            <td><? echo $strahpol['Series'] ?></td>
            <td><? echo $strahpol['Number'] ?></td>
            <td><? echo $strahpol['Srok_Strah_Ot'] ?></td>
            <td><? echo $strahpol['Srok_Strah_Do'] ?></td>
            <td><? echo $strahpol['Date_Zakluch'] ?></td>
            <td><? echo $strahpol['Date_Vidach'] ?></td>
            <td><? echo $strahpol['Strah_Premiya'] ?></td>
            <td><? while ($strahovat = mysqli_fetch_array($strahovat_data)) {
                        $fio = $strahovat['Surname'] . " " . mb_substr($strahovat['Name'], 0, 1) . "." . mb_substr($strahovat['Patronymic'], 0, 1) . ".";
                        if ($strahpol['idStrahovatel'] === $strahovat['id']) {
                            echo "$fio";
                        }
                    }
                    ?>
                </td>
            <td><? while ($drivers = mysqli_fetch_array($drivers_data)) {
                        $fio = $drivers['Surname'] . " " . mb_substr($drivers['Name'], 0, 1) . "." . mb_substr($drivers['Patronymic'], 0, 1) . ".";
                        if ($strahpol['idDrivers'] === $drivers['id']) {
                            echo "$fio";
                        }
                    }
                    ?>
                </td>
            <td><? while ($cars = mysqli_fetch_array($cars_data)) {
                        if ($strahpol['idAvto'] === $cars['id']) {
                            echo "$cars[VIN]";
                        }
                    }
                    ?>
                </td>
            <td><? while ($sotr = mysqli_fetch_array($sotr_data)) {
                        $fio = $sotr['Surname'] . " " . mb_substr($sotr['Name'], 0, 1) . "." . mb_substr($sotr['Patronymic'], 0, 1) . ".";
                        if ($strahpol['idSotrudnik'] === $sotr['id']) {
                            echo "$fio";
                        }
                    }
                    ?>
                </select></td>
            </tr>
            <? } ?>
    <form action="insert_strah_polis_zh.php" method="post">
        <tr>
            <td></td>
            <td><input type="submit" value="+"></td>
            <input type="hidden" name='insert'>
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
<?}?>
<script src="../../mdb/js/mdb.min.js"></script>