<link rel="stylesheet" href="../../mdb/css/mdb.min.css" />
<link rel="stylesheet" href="../../mdb/css/icons.css">
<title>Пользователи-Таблица</title>
<div>
    <?
    include $_SERVER["DOCUMENT_ROOT"] . "/connect.php";
    session_start();
    require "../../header.php";
    $row_data = mysqli_query($db, "SELECT * FROM `user`");
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
<h3 style="margin-top:61.6px; margin-left: 10px;">Таблица - Пользователи</h3>
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
        <? while ($data = mysqli_fetch_array($row_data)) { ?>
            <tr>
                <form action="delete_user.php" method="post">
                    <td>
                        <input type="submit" value="✖" onclick="return confirm('Вы уверены что хотите удалить запись?')">
                        <input type="hidden" value=<? echo "$data[id]" ?> name="user_id">
                        <input type="hidden" name='delete'>
                    </td>
                </form>
                <form action="update_user.php" method="post">
                    <td>
                        <input type="submit" value="✓">
                        <input type="hidden" value=<? echo $data['id'] ?> name="user_id">
                        <input type="hidden" name='update'>
                    </td>
                    <td><? echo $data['id'] ?></td>
                    <td><input type="text" name="Surname" value=<? echo $data['Surname'] ?>></td>
                    <td><input type="text" name="Name" value=<? echo $data['Name'] ?>></td>
                    <td><input type="text" name="Patronymic" value=<? echo $data['Patronymic'] ?>></td>
                    <td><input type="text" name="Login" value=<? echo $data['Login'] ?>></td>
                    <td><input type="text" name="Password" value=<? echo $data['Password'] ?>></td>
                    <td><input type="text" name="Status" value= <? echo $data['Status'] ?>></td>
            </tr>
            </form>
        <? } ?>
        <form action="insert_user.php" method="post">
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
                <td><input type="text" name="insert_status" value="Пользователь"></td>
            </tr>
        </form>
    </table>
</div>
<script src="../../mdb/js/mdb.min.js"></script>