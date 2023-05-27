<?
include $_SERVER["DOCUMENT_ROOT"]."/connect.php";
if (isset($_POST['delete'])) {
    mysqli_query($db, "DELETE FROM `model` WHERE id = $_POST[model_id];")or die(mysqli_error($db));
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
mysqli_free_result($model_row_data);
mysqli_free_result($marka_row_data);
mysqli_close($db);
?>
