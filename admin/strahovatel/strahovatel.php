<link rel="stylesheet" href="../styles/handbooks.css">

<div>
    <?
    include $_SERVER["DOCUMENT_ROOT"]."/connect.php";
    $strahov_of_data = mysqli_query($db, "SELECT * FROM `strahovatel`");
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
        <? while ($avtostrahovatel = mysqli_fetch_array($strahov_of_data)) { ?>
            <tr>
                <form action="delete_strahovatel.php" method="post">
                    <td>
                        <input type="submit" value="✖">
                        <input type="hidden" value=<? echo "$avtostrahovatel[id]" ?> name="avtostrah_id">
                        <input type="hidden" name='delete'>
                    </td>
                </form>
                <form action="update_strahovatel.php" method="post">
                    <td>
                        <input type="submit" value="✓">
                        <input type="hidden" value=<? echo $avtostrahovatel['id'] ?> name="avtostrah_id">
                        <input type="hidden" name='update'>
                    </td>
                    <td><? echo $avtostrahovatel['id'] ?></td>
                    <td><input type="text" name="Surname" value=<? echo $avtostrahovatel['Surname'] ?>></td>
                    <td><input type="text" name="Name" value=<? echo $avtostrahovatel['Name'] ?>></td>
                    <td><input type="text" name="Patronymic" value=<? echo $avtostrahovatel['Patronymic'] ?>></td>
            </tr>
            </form>
        <? } ?>
        <form action="insert_strahovatel.php" method="post">
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
    <?
    ?>
    <input type="submit" name="submit" value="excel" onclick="ex()">
</div>

<script>
    function ex() {
        id = window.open("excel.php");
        id.focus();
        id.document.close();
    }
</script>