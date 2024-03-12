<link rel="stylesheet" href="../../mdb/css/mdb.min.css" />
<link rel="stylesheet" href="../../mdb/css/icons.css">
<title>Страхователи-Таблица</title>
<div>
    <?
    include $_SERVER["DOCUMENT_ROOT"] . "/connect.php";
    session_start();
    require "../../header.php";
    $strahov_of_data = mysqli_query($db, "SELECT * FROM `strahovatel`");
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
<h3 style="margin-top:61.6px; margin-left: 10px;">Таблица - Страхователи</h3>
<!-- <table style="margin-top:61.6px ;"> -->
<table style="margin-top:10px ;">
        <tr>
            <th>✖</th>
            <th>✓</th>
            <th>#</th>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Отчество</th>
            <th>Логин</th>
            <th>Пароль</th>
            <th>Статус</th>
        </tr>
        <? while ($avtostrahovatel = mysqli_fetch_array($strahov_of_data)) { ?>
            <tr>
                <form action="delete_strahovatel.php" method="post">
                    <td>
                        <input type="submit" value="✖" onclick="return confirm('Вы уверены что хотите удалить запись?')">
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
                    <td><input type="text" name="Login" value=<? echo $avtostrahovatel['login'] ?>></td>
                    <td><input type="text" name="Password" value=<? echo $avtostrahovatel['password'] ?>></td>
                    <td><input type="text" name="Status" disabled value=<? echo $avtostrahovatel['status'] ?>></td>
            </tr>
            </form>
        <? } ?>
        <form action="insert_strahovatel.php" method="post">
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Отчество</th>
            <th>Логин</th>
            <th>Пароль</th>
            <th>Статус</th>
        </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="+"></td>
                <input type="hidden" name='insert'>
                <td></td>
                <td><input type="text" name="insert_surname"></td>
                <td><input type="text" name="insert_name"></td>
                <td><input type="text" name="insert_patronymic"></td>
                <td><input type="text" name="insert_login"></td>
                <td><input type="text" name="insert_password"></td>
                <td><input type="text" value="Страхователь" disabled></td>
            </tr>
        </form>
    </table>
    <?
    ?>
    <!-- <input type="submit" name="submit" value="excel" onclick="ex()"> -->
</div>

<!-- <script>
    function ex() {
        id = window.open("excel.php");
        id.focus();
        id.document.close();
    }
</script> -->
<script src="../../mdb/js/mdb.min.js"></script>