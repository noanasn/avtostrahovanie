<link rel="stylesheet" href="../styles/handbooks.css">
<div>
    <?
    include $_SERVER["DOCUMENT_ROOT"]."/connect.php";
    $row_data = mysqli_query($db, "SELECT * FROM `sobstvennic`");
    ?>
    <table>
        <tr>
            <th></th>
            <th></th>
            <th>#</th>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Отчество</th>
        </tr>
        <? while ($data = mysqli_fetch_array($row_data)) { ?>
            <tr>
                <form action="delete_sobstvennic.php" method="post">
                    <td>
                        <input type="submit" value="✖">
                        <input type="hidden" value=<? echo "$data[id]" ?> name="sobstv_id">
                        <input type="hidden" name='delete'>
                    </td>
                </form>
                <form action="update_sobstvennic.php" method="post">
                    <td>
                        <input type="submit" value="✓">
                        <input type="hidden" value=<? echo $data['id'] ?> name="sobstv_id">
                        <input type="hidden" name='update'>
                    </td>
                    <td><? echo $data['id'] ?></td>
                    <td><input type="text" name="Surname" value=<? echo $data['Surname'] ?>></td>
                    <td><input type="text" name="Name" value=<? echo $data['Name'] ?>></td>
                    <td><input type="text" name="Patronymic" value=<? echo $data['Patronymic'] ?>></td>
            </tr>
                </form>
        <? } ?>
                <form action="insert_sobstvennic.php" method="post">
                    <tr>
                        <td></td>
                        <td><input type="submit" value="+"></td>
                        <input type="hidden" name='insert'>
                        <td></td>
                        <td><input type="text" name="insert_surname"></td>
                        <td><input type="text" name="insert_name"></td>
                        <td><input type="text" name="insert_patronymic"></td>
                    </tr>
                </form>
    </table>
</div>
