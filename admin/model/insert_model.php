<?
include $_SERVER["DOCUMENT_ROOT"]."/connect.php";
if (isset($_POST['insert'])) {
    mysqli_query($db, "INSERT INTO `model` (`Nazvanie`,`idMarka`) VALUES ( '$_POST[insert_model]','$_POST[insert_idMarka]');") or die(mysqli_error($db));
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
mysqli_free_result($_POST($model_row_data));
mysqli_free_result($_POST($marka_row_data));
mysqli_close($db);
header("refresh: 3;");