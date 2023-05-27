<?
include $_SERVER["DOCUMENT_ROOT"]."/connect.php";
if (isset($_POST['delete'])) {
    mysqli_query($db, "DELETE FROM `strahovatel` WHERE id = $_POST[avtostrah_id];")or die(mysqli_error($db));
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
mysqli_free_result($strahov_of_data);
mysqli_close($db);
?>
