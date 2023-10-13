<link rel="stylesheet" href="../../mdb/css/mdb.min.css" />
<link rel="stylesheet" href="../../mdb/css/icons.css">
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
    <table style="margin-top:61.6px ;">
        <tr>
            <th>✖</th>
            <th>✓</th>
            <th>#</th>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Отчество</th>
            <th>Дата рождения</th>
            <th>Логин</th>
            <th>Пароль</th>
            <th>Статус</th>
            <th>VIN</th>
        </tr>
        <?php $index = 0; // Инициализируем счетчик индексов для модальных окон ?>
        <? while ($data = mysqli_fetch_array($row_data)) { ?>
            <tr>
                <form action="delete_user.php" method="post" id="deleteForm">
                    <td>
                        <button type="button" class="btn btn-danger" data-mdb-toggle="modal" data-mdb-target="#confirmDeleteModal<?php echo $index; ?>">
                            ✖ Delete
                        </button>
                        <input type="hidden" value="<?php echo $data['id']; ?>" name="user_id">
                        <input type="hidden" name="delete">
                    </td>
                </form>
                <!-- Modal for Confirming Delete -->
                <div class="modal fade" id="confirmDeleteModal<?php echo $index; ?>" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
                                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this user?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-danger" onclick="deleteUser()">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $index++; // Увеличиваем индекс для следующего модального окна ?>


                <form action="delete_user.php" method="post" id="deleteForm<?php echo $index; ?>">
                    <td>
                        <input type="submit" value="✓">
                        <input type="hidden" value=<? echo $data['id'] ?> name="user_id">
                        <input type="hidden" name='update'>
                    </td>
                    <td><? echo $data['id'] ?></td>
                    <td><input type="text" name="Surname" value=<? echo $data['Surname'] ?>></td>
                    <td><input type="text" name="Name" value=<? echo $data['Name'] ?>></td>
                    <td><input type="text" name="Patronymic" value=<? echo $data['Patronymic'] ?>></td>
                    <td><input type="date" name="Birthday" value=<? echo $data['Birthday'] ?>></td>
                    <td><input type="text" name="Login" value=<? echo $data['Login'] ?>></td>
                    <td><input type="text" name="Password" value=<? echo $data['Password'] ?>></td>
                    <!-- <td><input type="text" name="Status" value= echo $data['Status'] ?>></td> -->
                    <td><select name="Status">
                            <?
                            if ($data['Status'] === "Администратор") {
                                echo "<option value = 'Администратор' selected>Администратор</option>";
                                echo "<option value = 'Оператор'>Оператор</option>";
                            } else {
                                echo "<option value = 'Оператор' selected >Оператор</option>";
                                echo "<option value = 'Администратор'>Администратор</option>";
                            }
                            ?>
                        </select></td>
                    <td><input type="text" name="VIN" value=<? echo $data['VIN'] ?>></td>
            </tr>
            </form>

        <? } ?>
        <form action="insert_user.php" method="post">
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
                <!-- <td><input type="text" name="insert_status"></td> -->
                <td><select name="insert_status">
                        <option value="Администратор">Администратор</option>
                        <option value="Оператор">Оператор</option>
                    </select></td>
                <td><input type="text" name="insert_vin"></td>
            </tr>
        </form>
    </table>
</div>


<script src="../../mdb/js/mdb.min.js"></script>
<script>
    function deleteUser(index) {
        document.getElementById("deleteForm" + index).submit();
    }

    // Обработчик клика по кнопке "Delete"
    document.querySelectorAll(".delete-button").forEach((button, index) => {
        button.addEventListener("click", function () {
            deleteUser(index);
        });
    });
</script>
