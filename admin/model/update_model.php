<?
include $_SERVER["DOCUMENT_ROOT"]."/connect.php";
if (isset($_POST['update'])) {
    mysqli_query($db, "UPDATE `model` SET `Nazvanie` = '$_POST[Nazvanie]', `idMarka` = '$_POST[idSelect]' WHERE id = $_POST[model_id]") or die(mysqli_error($db));
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
mysqli_free_result($_POST($model_row_data));
mysqli_free_result($_POST($marka_row_data));
mysqli_close($db);
header("refresh: 3;");