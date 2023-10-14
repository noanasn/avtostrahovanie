<link rel="stylesheet" href="../../mdb/css/mdb.min.css" />
<link rel="stylesheet" href="../../mdb/css/icons.css">
<div>
    <?
    include $_SERVER["DOCUMENT_ROOT"] . "/connect.php";
    session_start();
    require "../../header.php";
    $model_row_data = mysqli_query($db, "SELECT * FROM `model`");
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
            <th>Модель</th>
            <th>Марка</th>
        </tr>
        <? while ($model_data = mysqli_fetch_array($model_row_data)) { ?>
            <tr>
                <form action="delete_model.php" method="post">
                    <td>
                        <input type="submit" value="✖" onclick="return confirm('Вы уверены что хотите удалить запись?')">
                        <input type="hidden" value=<? echo "$model_data[id]" ?> name="model_id">
                        <input type="hidden" name='delete'>
                    </td>
                </form>
                <form action="update_model.php" method="post">
                    <td>
                        <input type="submit" value="✓">
                        <input type="hidden" value=<? echo $model_data['id'] ?> name="model_id">
                        <input type="hidden" name='update'>
                    </td>
                    <td><? echo $model_data['id'] ?></td>
                    <td><input type="text" name="Nazvanie" value=<? echo $model_data['Nazvanie'] ?>></td>
                    <td><select name='idSelect'><?
                                                $marka_row_data  = mysqli_query($db, "SELECT * FROM `marka`");
                                                while ($marka_data = mysqli_fetch_array($marka_row_data)) {
                                                    if ("$model_data[idMarka]" === "$marka_data[id]") {
                                                        echo "<option value = $marka_data[id] selected>$marka_data[Nazvanie]</option>";
                                                    } else {
                                                        echo "<option value = $marka_data[id]>$marka_data[Nazvanie]</option>";
                                                    }
                                                }
                                                mysqli_free_result($marka_row_data);
                                                ?>
                        </select></td>
            </tr>
            </form>
        <? } ?>
        <form action="insert_model.php" method="post">
            <tr>
                <td></td>
                <td><input type="submit" value="+"></td>
                <input type="hidden" name='insert'>
                <td></td>
                <td><input type="text" name="insert_model"></td>
                <td><select name='insert_idMarka'><?
                                                    $marka_row_data  = mysqli_query($db, "SELECT * FROM `marka`");
                                                    while ($marka_data = mysqli_fetch_array($marka_row_data)) {
                                                        echo "<option value = $marka_data[id]>$marka_data[Nazvanie]</option>";
                                                    }
                                                    mysqli_free_result($model_row_data);
                                                    mysqli_free_result($marka_row_data); ?>
                    </select></td>
            </tr>
        </form>
    </table>
</div>
<script src="../../mdb/js/mdb.min.js"></script>