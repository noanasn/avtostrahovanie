<?
include $_SERVER["DOCUMENT_ROOT"]."/connect.php";
if (isset($_POST['update'])) {
    mysqli_query($db, "UPDATE `sobstvennic` SET `Name` = '$_POST[Name]', `Surname`='$_POST[Surname]', `Patronymic`='$_POST[Patronymic]' WHERE id = $_POST[sobstv_id]") or die(mysqli_error($db));
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
mysqli_free_result($row_data);
mysqli_close($db);