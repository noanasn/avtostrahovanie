<?
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=Автомобили.xls");
header("Contente-Transfer-Encoding: binary");
echo "<meta charset='UTF-8'>";

include $_SERVER["DOCUMENT_ROOT"]."/connect.php";
$cars_of_data = mysqli_query($db, "SELECT * FROM `avto`");
?>

<table border="1">
    <tr>
        <th scope='col'>#</th>
        <th scope='col'>Прицеп</th>
        <th scope='col'>VIN</th>
        <th scope='col'>Гос.Номер</th>
        <th scope='col'>Мощность</th>
        <th scope='col'>Тип документа</th>
        <th scope='col'>Серия документа</th>
        <th scope='col'>Номер документа</th>
        <th scope='col'>Марка</th>
        <th scope='col'>Модель</th>
        <th scope='col'>Собственник</th>
    </tr>

    <? while ($cars = mysqli_fetch_array($cars_of_data)) { ?>
        <?
        $marks_data  = mysqli_query($db, "SELECT * FROM `marka`");
        $models_data = mysqli_query($db, "SELECT * FROM `model`");
        $sobstv_data  = mysqli_query($db, "SELECT * FROM `sobstvennic`");
        ?>

        <tr>
            <td><? echo $cars['id'] ?></td>
            <td><? if ($cars['Pricep']) {
                    echo "✓";
                } ?></td>
            <td><? echo $cars['VIN'] ?></td>
            <td><? echo $cars['Gos_Znak'] ?></td>
            <td><? echo $cars['Power'] ?></td>
            <td><? echo $cars['Doc_type'] ?></td>
            <td><? echo $cars['Doc_series'] ?></td>
            <td><? echo $cars['Doc_number'] ?></td>

                    <? while ($marks = mysqli_fetch_array($marks_data)) { 
                        if ($cars['idMarka'] === $marks['id']) {
                            echo "<td>$marks[Nazvanie]</td>";
                        }
                    }
                    ?>

                    <? while ($models = mysqli_fetch_array($models_data)) { 
                        if ($cars['idModel'] === $models['id']) {
                            echo "<td>$models[Nazvanie]</td>";
                        }
                    }
                    ?>

                    <? while ($sobstv = mysqli_fetch_array($sobstv_data)) { 
                        if ($cars['idSobstvennic'] === $sobstv['id']) {
                        $fio = $sobstv['Surname'] . " " . mb_substr($sobstv['Name'], 0, 1) . "." . mb_substr($sobstv['Patronymic'], 0, 1) . ".";
                            echo "<td>$fio</td>";
                        }
                    }
                    ?>
        </tr>
    <? } ?>
</table>