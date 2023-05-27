

<div>
    <a href="add_model.php"><button class="btn button" style>Добавить</button></a>
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
        $model_of_data = mysqli_query($db, "SELECT * FROM `model`");
        $model = mysqli_fetch_array($model_of_data);
        ?>
        <link rel="stylesheet" href="../styles/handbooks.css">

        <?php
        echo "<div id = 'menu'>";
        echo "<table class='table'";
        echo "<tr>";
        echo "<th scope='col'>#</th>";
        echo "<th scope='col'>Название</th>";
        echo "<th scope='col'>Марка</th>";
        echo "</tr>";


        do {
            echo "<tr>
    <form>
    <td>$model[id]</td>
    <td><input type='text' value='$model[Nazvanie]'></td>";
    echo "<td><select name = 'idMarka' id = 'select'>";
    $marks_data  = mysqli_query($db, "SELECT * FROM `marka`");
    while ($marks = mysqli_fetch_array($marks_data)) {
        if ("$model[idMarka]" === "$marks[id]") {
        echo "<option value = $marks[id] selected>$marks[Nazvanie]</option>";
        }
        echo "<option value = $marks[id]>$marks[Nazvanie]</option>";
    }
    echo "</select></td></tr>";
        } while ($model = mysqli_fetch_array($model_of_data));
        echo "</table>";
        echo "</div>";
        ?>
        <br>
    </form>
</div>