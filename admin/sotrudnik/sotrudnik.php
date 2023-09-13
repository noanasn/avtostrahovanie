<link rel="stylesheet" href="../styles/handbooks.css">

<div>
    <?
    include $_SERVER["DOCUMENT_ROOT"]."/connect.php";
    $row_data = mysqli_query($db, "SELECT * FROM `sotrudnik`");
    ?>
    <table>
        <tr>
            <th></th>
            <th></th>
            <th>#</th>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Отчество</th>
            <th>Дата рождения</th>
            <th>Логин</th>
            <th>Пароль</th>
            <th>Статус</th>
        </tr>
        <? while ($data = mysqli_fetch_array($row_data)) { ?>
            <tr>
                <form action="delete_sotrudnik.php" method="post">
                    <td>
                        <input type="submit" value="✖">
                        <input type="hidden" value=<? echo "$data[id]" ?> name="sotrudnik_id">
                        <input type="hidden" name='delete'>
                    </td>
                </form>
                <form action="update_sotrudnik.php" method="post">
                    <td>
                        <input type="submit" value="✓">
                        <input type="hidden" value=<? echo $data['id'] ?> name="sotrudnik_id">
                        <input type="hidden" name='update'>
                    </td>
                    <td><? echo $data['id'] ?></td>
                    <td><input type="text" name="Surname" value=<? echo $data['Surname'] ?>></td>
                    <td><input type="text" name="Name" value=<? echo $data['Name'] ?>></td>
                    <td><input type="text" name="Patronymic" value=<? echo $data['Patronymic'] ?>></td>
                    <td><input type="date" name="Birthday" value=<? echo $data['Birthday'] ?>></td>
                    <td><input type="text" name="Login" value=<? echo $data['Login'] ?>></td>
                    <td><input type="text" name="Password" value=<? echo $data['Password'] ?>></td>
                    <td><input type="text" name="Status" value=<? echo $data['Status'] ?>></td>
            </tr>
            </form>
        <? } ?>
        <form action="insert_sotrudnik.php" method="post">
            <tr>
                <td></td>
                <td><input type="submit" value="+"></td>
                <input type="hidden" name='insert'>
                <td></td>
                <td><input type="text" name="insert_surname"></td>
                <td><input type="text" name="insert_name"></td>
                <td><input type="text" name="insert_patronymic"></td>
                <td><input type="date" name="insert_birthday"></td>
                <td><input type="text" name="insert_login"></td>
                <td><input type="text" name="insert_password"></td>
                <td><input type="text" name="insert_status"></td>
            </tr>
        </form>
    </table>
    </div>