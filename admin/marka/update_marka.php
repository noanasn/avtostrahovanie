<?
include $_SERVER["DOCUMENT_ROOT"]."/connect.php";
if (isset($_POST['update'])) {
    mysqli_query($db, "UPDATE `marka` SET `Nazvanie` = '$_POST[Nazvanie]' WHERE id = $_POST[marka_id]") or die(mysqli_error($db));
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
mysqli_free_result($row_data);
mysqli_close($db);