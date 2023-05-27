<div>
    <a href="add_strah_polis.php"><button class="btn button" style>Добавить</button></a>
    <form method="POST" class="knop">
        <input type="submit" name="submit" value="excel" onclick="ex()" class="button">
        <input type="submit" name="del" value="Удалить" class="button">
        <input type="submit" name="save" value="Изменить" class="button">
        <br>

        <form action="#" method="POST">
            <div class="knop1 div1">
                <input name="login" type="text" placeholder="timpupacov"><br>
                <input type="submit" value="Добавить" name="otpravit" class="button">
            </div>
        </form>

        <?
        include("../connect.php");
        include("admin.php");
        $strahpol_of_data = mysqli_query($db, "SELECT * FROM `strah_polis`");
        $strahpol = mysqli_fetch_array($strahpol_of_data);
        ?>

        <link rel="stylesheet" href="../styles/handbooks.css">

        <?php
        echo "<div id = 'menu'>";
        echo "<table class='table'";
        echo "<tr>";
        echo "<th scope='col'>#</th>";
        echo "<th scope='col'>Серия</th>";
        echo "<th scope='col'>Номер</th>";
        echo "<th scope='col'>Страхование от</th>";
        echo "<th scope='col'>Страхование до</th>";
        echo "<th scope='col'>Дата заключения</th>";
        echo "<th scope='col'>Дата выдачи</th>";
        echo "<th scope='col'>Страх.премия</th>";
        echo "<th scope='col'>Страхователь</th>";
        echo "<th scope='col'>Водитель</th>";
        echo "<th scope='col'>Авто</th>";
        echo "<th scope='col'>Сотрудник</th>";
        echo "</tr>";


        do {
            echo "<tr>
    <form>
    <td>$strahpol[id]</td>
    <td><input type='text' value='$strahpol[Series]'></td>
    <td><input type='text' value='$strahpol[Number]'></td>
    <td><input type='date' value='$strahpol[Srok_Strah_Ot]'></td>
    <td><input type='date' value='$strahpol[Srok_Strah_Do]'></td>
    <td><input type='date' value='$strahpol[Date_Zakluch]'></td>
    <td><input type='date' value='$strahpol[Date_Vidach]'></td>
    <td><input type='text' value='$strahpol[Strah_Premiya]'></td>";
            echo "<td><select name = 'strahovatel' id = 'select' class='names'>";
            $strahovat_data  = mysqli_query($db, "SELECT * FROM `strahovatel`");
            while ($strahovat = mysqli_fetch_array($strahovat_data)) {
                $fio = $strahovat['Surname'] . " " . mb_substr($strahovat['Name'], 0, 1) . "." . mb_substr($strahovat['Patronymic'], 0, 1) . ".";
                if ("$strahpol[idStrahovatel]" === "$strahovat[id]") {
                    echo "<option value = $strahovat[id] selected>$fio</option>";
                }
                echo "<option value = $strahovat[id]>$fio</option>";
            }
            echo "</select></td>";
            echo "<td><select name = 'drivers' id = 'select' class='names'>";
            $drivers_data  = mysqli_query($db, "SELECT * FROM `drivers`");
            while ($drivers = mysqli_fetch_array($drivers_data)) {
                $fio = $drivers['Surname'] . " " . mb_substr($drivers['Name'], 0, 1) . "." . mb_substr($drivers['Patronymic'], 0, 1) . ".";
                if ("$strahpol[idDrivers]" === "$drivers[id]") {
                    echo "<option value = $drivers[id] selected>$fio</option>";
                }
                echo "<option value = $drivers[id]>$fio</option>";
            }
            echo "</select></td>";
            echo "<td><select name = 'avto' id = 'select' class='names'>";
            $cars_data  = mysqli_query($db, "SELECT * FROM `avto`");
            while ($cars = mysqli_fetch_array($cars_data)) {
                if ("$strahpol[idAvto]" === "$cars[id]") {
                    echo "<option value = $cars[id] selected>$cars[VIN]</option>";
                }
                echo "<option value = $cars[id]>$cars[VIN]</option>";
            }
            echo "</select></td>";
            echo "<td><select name = 'sotr' id = 'select' class='names'>";
            $sotr_data  = mysqli_query($db, "SELECT * FROM `sotrudnik`");
            while ($sotr = mysqli_fetch_array($sotr_data)) {
                $fio = $sotr['Surname'] . " " . mb_substr($sotr['Name'], 0, 1) . "." . mb_substr($sotr['Patronymic'], 0, 1) . ".";
                if ("$strahpol[idSotrudnik]" === "$sotr[id]") {
                    echo "<option value = $sotr[id] selected>$fio</option>";
                }
                echo "<option value = $sotr[id]>$fio</option>";
            }
            echo "</select></td>

    </tr>";
        } while ($strahpol = mysqli_fetch_array($strahpol_of_data));
        echo "</table>";
        echo "</div>";
        ?>
        <br>
    </form>
</div>