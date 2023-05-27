<link rel="stylesheet" href="../styles/handbooks.css">

<div>
    <a href="add_sotr.php"><button class="btn button" style>Добавить</button></a>
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
        $sotrud_of_data = mysqli_query($db, "SELECT * FROM `sotrudnik`");
        $sotrud = mysqli_fetch_array($sotrud_of_data);
        ?>

        <?php


        echo "<div id = 'menu'>";
        echo "<table class='table'";
        echo "<tr>";
        echo "<th scope='col'>#</th>";
        echo "<th scope='col'>Фамилия</th>";
        echo "<th scope='col'>Имя</th>";
        echo "<th scope='col'>Отчество</th>";
        echo "<th scope='col'>Дата рождения</th>";
        echo "<th scope='col'>Логин</th>";
        echo "<th scope='col'>Пароль</th>";
        echo "<th scope='col'>Статус</th>";
        echo "</tr>";

        do {
            echo "<tr>
    <form>
    <td>$sotrud[id]</td>
    <td><input type='text' value='$sotrud[Surname]'></td>
    <td><input type='text' value='$sotrud[Name]'></td>
    <td><input type='text' value='$sotrud[Patronymic]'></td>
    <td><input type='date' value='$sotrud[Birthday]'></td>
    <td><input type='text' value='$sotrud[Login]'></td>
    <td><input type='text' value='$sotrud[Password]'></td>
    <td><input type='text' value='$sotrud[Status]'></td>

    </tr>";
        } while ($sotrud = mysqli_fetch_array($sotrud_of_data));
        echo "</table>";
        echo "</div>";
        ?>
        <br>
    </form>
</div>