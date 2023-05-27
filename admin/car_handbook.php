<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/handbooks.css">
    <title>Document</title>у
    
</head>

<body>
    <div class="knop">
        <a href="add_car.php"><button class="btn button" style>Добавить</button></a>
        <form method="POST">
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
        </form>
    </div>

    <?
    include("../connect.php");
    include("admin.php");
    $cars_data = mysqli_query($db, "SELECT * FROM `avto`");

    $marks = 0;
    $cars = 0;
    ?>

    <div id="menu">
        <table>
            <tr>
                <th scope='col'>#</th>
                <th scope='col'>Прицеп</th>
                <th scope='col'>VIN</th>
                <th scope='col'>Гос.Номер</th>
                <th scope='col'>Серия документа</th>
                <th scope='col'>Тип документа</th>
                <th scope='col'>Номер документа</th>
                <th scope='col'>idMarka</th>
                <th scope='col'>Мощность</th>
                <th scope='col'>idModel</th>
                <th scope='col'>idSobstvennic</th>
            </tr>
            <tr>
                <?
                while ($cars = mysqli_fetch_array($cars_data)) {
                    echo "<tr>";
                    echo "<form>";
                    echo "<td>$cars[id]</td>";
                    echo "<td><input type='text' value='$cars[Pricep]'></td>";
                    echo "<td><input type='text' value='$cars[VIN]'></td>";
                    echo "<td><input type='text' value='$cars[Gos_Znak]'></td>";
                    echo "<td><input type='text' value='$cars[Power]'></td>";
                    echo "<td><input type='text' value='$cars[Doc_type]'></td>";
                    echo "<td><input type='text' value='$cars[Doc_series]'></td>";
                    echo "<td><input type='text' value='$cars[Doc_number]'></td>";
                    echo "<td><select name = 'marka' id = 'select'>";
                    $marks_data  = mysqli_query($db, "SELECT * FROM `marka`");
                    while ($marks = mysqli_fetch_array($marks_data)) {
                        if ("$cars[idMarka]" === "$marks[id]") {
                        echo "<option value = $marks[id] selected>$marks[Nazvanie]</option>";
                        }
                        echo "<option value = $marks[id]>$marks[Nazvanie]</option>";
                    }
                    echo "</select></td>";
                    echo "<td><input type='text' value='$cars[idModel]'></td>";
                    echo "<td><input type='text' value='$cars[idSobstvennic]'></td>";
                    echo "</form> ";
                    echo "<tr>";
                }
                ?>
            </tr>
        </table>
    </div>
</body>

</html>